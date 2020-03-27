<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController_front.php';
class Mail_index extends BaseController_front
{
	public function send_inq()
	{	
		$this->load->model('buy_requirement');
		global $site_url,$global ,$SITE_EMAIL,$web_name;
		$page1=$_REQUEST['page1'];
		$action1=$_REQUEST['action1'];
		if($action1=='view_product_detail')
		{
			$type='Product';
		}
		if($action1=='show_client')
		{
			$type='Company Detail';
		}
		if($action1=='show_listing_detail')
		{
			$type='classified';
		}
		
		if($action1=='show_trade_lead_buy')
		{
			$type='Buy Lead';
		}
		if($action1=='view_trade_lead_detail')
		{
			$type='Sell Lead';
		}
		if($action1=='view_requirement_details')
		{
			$type='Buy Requirement';
		}
		if($action1=='get_qutoe')
		{
			$type='Buy Requirement';
		}
		
		if($action1=='seller_contact')
		{
			$type='Micro Site';
			
		}
		
		
		if($_REQUEST['id']!='') 
		{
			$uid=$_REQUEST['id'];
		}
		else 
		{
	 		$sql_uid=$this->buy_requirement->select_users($_REQUEST['cl_id']);
		 	$res_uid=$sql_uid->row();
			$uid=$res_uid->id;
		}

		if($uid!=0 || isset($this->session->userdata['id']))
		{			
			$fetch_userdata=$this->buy_requirement->users($uid);
			$user_data=$fetch_userdata->row();

			if($page1=='buyer')  
				$custID=$uid;
			else
			  if($page1=='classifieds')
				$custID=$_REQUEST['cl_id'];
			else
			   if($page1=='product')
			     $custID=$_REQUEST['pro_id'];
			else
			   if($page1=='buy_lead')
			     $custID=$_REQUEST['cl_id'];	 
			else
				$custID=$user_data->cust_id;

			//for subscribe and unsubscribe mail
			 $subs_mail=$user_data->subs_mail;

			/*===========normal validaitons===*/
			if(isset($_POST['name']))
			{
	            $this->form_validation->set_rules('name', 'Name', 'required');	
			}
			if(isset($_POST['mobile']))
			{
				$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|max_length[10]|min_length[10]');
            	
			}
			if(isset($_POST['email']))
			{
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			}
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('message', 'Message', 'required');
            $this->form_validation->set_rules('security_code', 'Security code', 'required');
			
			if($this->form_validation->run()==false)
            {
            	$this->session->set_userdata('name_error',form_error('name'));
            	$this->session->set_userdata('mobile_error',form_error('mobile'));
            	$this->session->set_userdata('email_error',form_error('email'));
            	$this->session->set_userdata('subject_error',form_error('subject'));
            	$this->session->set_userdata('message_error',form_error('message'));
            	$this->session->set_userdata('security_code_error',form_error('security_code'));
            	$form_error = false;
            }
            else
            {
            	$form_error = true;
            }
			/*========captcha validation============*/
			if(isset($_REQUEST['security_code']))
			{
		    	if(validateCaptcha($_REQUEST['security_code']))	//check captcha is correct or not
		    	{
		    		$chk_captcha =true;
		    	}
		    	else
		    	{
		    		$chk_captcha =false;
		 
		    	}
			}
    		if($form_error){

				/*========captcha validation true or false============*/
				if($chk_captcha)
				{	
					$tomail=$user_data->user_name;

					$data["tomail"] = $tomail;
					
					if(isset($_REQUEST['title']) && $_REQUEST['title'] != '')
					{
						$title = $_REQUEST['title'];
					}
					else{
						$this->load->config('Globvariable');
            			$title = $this->config->item('gWebname');
					}


					$title=$title; 
					
					if(isset($this->session->userdata['user_id']) && $this->session->userdata['user_id']!=0 )
					{
						$userid=$this->session->userdata['user_id'];
					}
					else
					{					
						$userid=0;
					}
					
					if($userid==0)
					{	

						$string = '1234567890';
						$shuffle = str_shuffle($string);
						$random_chars = substr($shuffle, 0, 6);
						$mes_id=strtoupper($random_chars);
						
						date_default_timezone_set('Asia/Kolkata');
						$date=date("Y-m-d");
						

						/*=========email Enquiry table insert==============*/
						if(!isset($_REQUEST['email_type']) && !$_REQUEST['email_type'])
						{
							$type='';
						}
					 	 $send_user2=array('snd_user_id'=>$userid,'rec_user_id'=>$uid,'subject'=>$_REQUEST['subject'],'message'=>$_REQUEST['message'],'unread'=>'Y','entry_date'=>$date,'time'=>gmdate("jS \of F Y h:i:s A"),'rec_deleted'=>'N','sen_deleted'=>'N','pro_id'=>$_REQUEST['pro_id'],'msg_id'=>$mes_id,'email_type'=>$type,'send_url'=>$_REQUEST['link'], 'lang_type'=>$this->session->userdata("user_lang"));
					 	 // print_r($send_user2);exit;
						 $mail_id = $this->buy_requirement->email_enquiry($send_user2);

						$data['mail_id']=$mail_id;
						
						/*=========guest Enquiry table insert==============*/
						$send_user=array('lang_type'=>$this->session->userdata("user_lang"), 'name'=>$_REQUEST['name'],'email'=>$_REQUEST['email'],'mobile_no'=>$_REQUEST['mobile'],'mail_enq_id'=>$mail_id,'deleted'=>'N', 'lang_type'=>$this->session->userdata("user_lang"));
						 
						$this->buy_requirement->guest_enquiry($send_user);
						
						//send email to guest
					}
					else
					{	
						$string = '1234567890';
						$shuffle = str_shuffle($string);
						$random_chars = substr($shuffle, 0, 6);
						$mes_id=strtoupper($random_chars);

						/*=========email Enquiry table insert==============*/
						if(empty($_REQUEST['email_type']))
						{
							$type='';
						}
					 	$send_user=array('snd_user_id'=>$userid,'rec_user_id'=>$uid,'subject'=>$_REQUEST['subject'],'message'=>$_REQUEST['message'],'unread'=>'Y','time'=>gmdate("jS \of F Y h:i:s A"),'rec_deleted'=>'N','sen_deleted'=>'N','pro_id'=>$_REQUEST['pro_id'],'msg_id'=>$mes_id,'email_type'=>$type,'send_url'=>$_REQUEST['link'],'entry_date'=>date('Y-m-d'), 'lang_type'=>$this->session->userdata("user_lang"));
			 			$this->buy_requirement->email_enquiry($send_user);

					}	
				
					
					//send email to client
					
					if($subs_mail!='N')
					{
						$Info=Email_Info(4);
						$Subject=$Info->subject;
						$msgBody=$Info->msg;
						$msgBody=stripslashes($msgBody);
						$msgBody=str_replace("\"", "'", $msgBody);
						eval("\$msgBody = \"$msgBody\";");	
						$msgBody=stripslashes($msgBody);
						$msgBody1='<html><body><table border="0"><tr><td>'.$msgBody.'</td></tr></table></body></html>';

						SendMail($SITE_EMAIL,$title,$tomail,$Subject,$msgBody1);
					}		
					
					$this->session->set_userdata('message',"Sent Successfully");
					if($user_data->cust_id!=0)
					{ 
					
						if($_REQUEST['type']=='Micro' )
						{
							redirect($_REQUEST['link']); exit;
						}
						
						if($_REQUEST['type']=='product_detail' && $_REQUEST['type_id']!='')
						{
							redirect($_SERVER['HTTP_REFERER']);
							
						}
						 
					 	if($_REQUEST['type']=='buy_requirement' && $_REQUEST['type_id']!='')
						{
					 		redirect(base_url().'get_quote/'.$_REQUEST['pro_id'].'.html');exit();		
						}		 
						if($_REQUEST['type']=='requirement' && $_REQUEST['type_id']!='')
						{
							redirect(base_url().'requirement/'.$_REQUEST['pro_id'].'/success');exit;				  
						}
						else
						{
							redirect($_SERVER['HTTP_REFERER']);
						}
						
					}
					else
				 	{	
				 			
						if($_REQUEST['type']=='Micro' )
						{
							redirect($_REQUEST['link']); exit;
						}	
						if($_REQUEST['type']=='requirement' && $_REQUEST['type_id']!='')
						{

						  redirect(base_url()."requirement/".$_REQUEST['pro_id']."/success");exit;
						}
						
						else
						{ 
							if(empty($this->session->userdata['user_id']))
							{
								redirect($_SERVER['HTTP_REFERER']); 
							}
							else
							{
								// redirect(base_url()."send_inq-".$custid);
								redirect(base_url('buyer-requirement-list.html'));
							}
						}
				 	}
			  	}
			  	else
			    { 
				 	$this->session->set_userdata('caperror', "Please Enter Correct Captcha Code");
				 
		    		if($_REQUEST['type']=='product_detail' && $_REQUEST['type_id']!='')
					{
						redirect(base_url()."product-category".productname_url($_REQUEST['type_id'])."/".$_REQUEST['type_id']."#Inquiry");
					}
					if($_REQUEST['type']=='requirement' && $_REQUEST['type_id']!='')
					{
					   redirect(base_url()."requirement/".$_REQUEST['pro_id']."/error");exit;
					}
					else
					{
						redirect($_SERVER['HTTP_REFERER']); 
					}
				 
				}
			}
			else
			{

			 	if($_REQUEST['type']=='product_detail' && $_REQUEST['type_id']!='')
					{
						redirect(base_url()."product/category".productname_url($_REQUEST['type_id'])."-".$_REQUEST['type_id']."#Inquiry");
					}
				if($_REQUEST['type']=='requirement' && $_REQUEST['type_id']!='')
					{
					   redirect(base_url()."requirement/".$_REQUEST['pro_id']."/error");exit;
					}
					else
					{
						redirect($_SERVER['HTTP_REFERER']); 
					}
			}
  		}
  		else{
  			$this->session->set_userdata('caperror', "Mail Not Send");
  			redirect($_SERVER['HTTP_REFERER']); 
  		}
  		

	
	}
}
?>