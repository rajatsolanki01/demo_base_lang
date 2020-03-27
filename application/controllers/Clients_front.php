<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController_front.php';
class Clients_front extends BaseController_front 
{
	 function  __construct()
	 {
        parent::__construct();
        $this->load->model('registration');
        $this->load->model('function_model');
     }
	public function registration($package_id=null)
	{	
		$data["package_id"] = $package_id; 
		$fetch_site_config = $this->function_model->site_config();
		$auto_approval = $fetch_site_config->auto_approval;
		
		if($auto_approval=='Y')
			$approved='Y';
		else
			$approved='N';

		if(isset($this->session->userdata['user_id']) && $this->session->userdata['user_id']!="")
		{
		  redirect("view_personal_profile.html");
		}

		$data["succ"]= "0";
		
		if(isset($_REQUEST['submit']))
		{
			$this->form_validation->set_rules('uname', 'Username', 'required');
			
            if($_REQUEST['type']=='C')
            {
				$data['type'] = $_REQUEST['type'];
            	$this->form_validation->set_rules('company_name', 'Companyname', 'required');
            }
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|max_length[10]|min_length[10]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('email2', 'Confirm Email', 'required|matches[email]');
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('pass', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('repass', 'Confrim Password', 'required|matches[pass]');
            $this->form_validation->set_rules('security_code', 'Securitycode', 'required');

			$new_user = false;
			if($this->form_validation->run()!=false)
            {
            	if(isset($_REQUEST['security_code']))
				{
			    	if(validateCaptcha($_REQUEST['security_code']))	//check captcha is correct or not
			    	{
			    		$chk_captcha =true;
			    	}
			    	else
			    	{
			    		$chk_captcha =false;
			    		$cap_error = "Enter Correct Code";
			    		$captcha = $this->gen_captcha(); //call captcha function	
						$this->loadViews('registration',['captcha'=>$captcha,'data'=>$data,'package_id'=>$package_id,'cap_error'=>$cap_error]);
			        	// $this->loadViews('registration',['cap_error'=>$cap_error,'captcha'=>$captcha]);
			    	}
		    	}
		    	
            	$new_user =true;
            	$name=$_REQUEST['uname'];
				$company=$_REQUEST['company_name'];
				$mobile=$_REQUEST['mobile'];
				$email=$_REQUEST['email'];
				$country=$_REQUEST['country'];
				$state=$_REQUEST['state'];
				$city=$_REQUEST['city'];
				$pass=$_REQUEST['pass'];
				$rpass=$_REQUEST['repass'];
				$vcode=$_REQUEST['security_code'];
            }

			// $check_userQuery 
			if($new_user)
			{	
				if($chk_captcha)
				{	
					$date=date('Y-m-d');
					 $flage=chk_email_ofoff();
					
					if($flage==1)
			 			$statusonoff_val='N';
					else
						$statusonoff_val='Y';
						
					
					$date=date("Y-m-d");
					
					 $end_date = strtotime(date("Y-m-d", strtotime($date)) . "+".$valid_day." days");
			         $exp_date=date("Y-m-d", $end_date); 
					
						/*==============create company========================*/
						$add_user = array('email'=>$_REQUEST['email'],'password'=>md5($_REQUEST['pass']),'name'=>$_REQUEST['uname'],'mobile_no'=>$_REQUEST['mobile'],'login_id'=>md5($_REQUEST['email']),'user_type'=>'B','join_date'=>$date,'status'=>$approved,'city'=>$_REQUEST['city']);
						$this->registration->add_user($add_user);
						
						/*=============send mail to user===================*/

						if($flage==1)
							{
								$Click="<a href='".base_url()."register-active-".md5($_REQUEST['email']).".html'>Click Here</a>";
								$Info=Email_Info(1);
								
								$Subject=$Info->subject;
								$msgBody=$Info->msg;
								$msgBody=stripslashes($msgBody);
								$msgBody=str_replace("\"", "'", $msgBody);
								eval("\$msgBody = \"$msgBody\";");	
								$msgBody=stripslashes($msgBody);
								$msgBody1="<html><body><table><tr><td>".$msgBody."</td></tr></table></body></html>";

								$CompanyName=$fetch_site_config->company_name;
								$CompanyEmail=$fetch_site_config->email;
								SendMail($CompanyEmail,$CompanyName,$_REQUEST['email'],$Subject,$msgBody1);
							}	
				
							/*=============insert into customer table===================*/
							/*====insert into badge======*/
							// $custdata_sql= array('cust_id'=>$custid);
							// $this->registration->custdata_sql($custdata_sql);
							
							/*====metadata======*/
							$title=$_REQUEST['company_name'].'-'.$_REQUEST['city'].'-'.$_REQUEST['state'];
							$keywoird=$_REQUEST['company_name'].'-'.$_REQUEST['city'].'-'.$_REQUEST['state'];
							$meta_dis=$_REQUEST['company_name'].'-'.$_REQUEST['city'].'-'.$_REQUEST['state'];
								
							$metadata_sql= array('data_id'=>$custid,'meta_title'=>$title,'meta_desc'=>$meta_dis,'meta_keywords'=>$keywoird,'type'=>'customer');
							$this->registration->metadata_sql($metadata_sql);
											
							  $upQry=array("cust_id"=>$custid);
							  $where = array('user_name'=>$_REQUEST['email'],'deleted'=>'N');
							 $this->registration->upQry($upQry,$where);
							
							/*for product group*/
							$grpQry=$this->registration->grpQry($custid);
					 		$datauser=$grpQry->row();
							$userid=$datauser->id;

				
					$userid=$this->registration->user($_REQUEST['email']);	
					$user_data = $userid->row();
					//session values
					$user_id=$user_data->id;	
						
				
					if($package_id)
					{	
						$this->session->set_flashdata('msg','Your account has been Created sucessfully! Login Now.!');
						redirect(base_url('login.html'));exit;
						
						$sqlResult="select max(order_id) as order_id from account where deleted='N'";
						$fetchsqlResult=$this->registration->__callMasterquery($sqlResult);
						$sqlResult = $fetchsqlResult->row();
						$ord_id=$sqlResult->order_id;
						if($ord_id<1)
							$ord_id=1000;
						else
							$ord_id=$ord_id+1;

						redirect("process-".$ord_id.".html");exit;

						$date=date('Y-m-d');		
						$qrySavePage=array('user_id'=>$user_id,'package'=>$pack_name,'amount'=>$amount,'amount_inr'=>$amount_inr,'payment_opt'=>'p','entrydate'=>$date,'order_id'=>$ord_id,'pack_validat_day'=>$valid_day,'pack_status'=>'Y','pack_type'=>$pack_type);
						$this->registration->qrySavePage($qrySavePage);
						if($amount!=0)
						{	
							redirect("process-".$ord_id.".html");
					 	}
						else
						{
							$qry=$this->registration->select_account($ord_id);
							$Data = $qry->row();
							$package_upgrade=$this->registration->select_account_multiple($Data->user_id);
							
							if($package_upgrade->num_rows)
							{
								$data_package_upgrade=$package_upgrade->row();
								$sqlquery_upgrade=array("pack_status"=>'N');
								$where = array('user_id'=>$data_package_upgrade->user_id,'id'=>$data_package_upgrade->id, 'lang_type'=>$this->session->userdata("user_lang"));
								$this->registration->update_account($where,$sqlquery_upgrade);
							}
							
							$valid_days=10;	
							$sqlquery=array('paystatus'=>'TRUE','pack_validat_day'=>$valid_days,'pack_status'=>'Y','approved'=>'Y');
							$where=array('order_id'=>$ord_id, 'lang_type'=>$this->session->userdata("user_lang"));
							$this->registration->update_account($where,$sqlquery);
							$sql_user_query=array('package_type'=>$Data->pack_type);
							$where = array('id'=>$Data->user_id, 'lang_type'=>$this->session->userdata("user_lang"));
						 	$this->registration->update_user($where,$sql_user_query);
						    $qry1=$this->registration->user_id($Data->user_id);
						    $Data1 = $qry1->row();
					        
						 	$sql_custmer_query=array('paid'=>'Y','package_type'=>$Data->pack_type);
						 	$where =array('id'=>$Data1->cust_id, 'lang_type'=>$this->session->userdata("user_lang"));
							$this->registration->update_customer($where,$sql_custmer_query);
							$this->session->set_flashdata('msg','Your account has been Created sucessfully! Login Now.!');
							redirect(base_url('login.html'));
						}
					}
		
				}
						
			}
			else
			{
			$captcha = $this->gen_captcha(); //call captcha function				
			$this->loadViews('registration',['captcha'=>$captcha,'data'=>$data,'package_id'=>$package_id]);
			}

		}
		else
		{
			$captcha = $this->gen_captcha(); //call captcha function	
			$this->loadViews('registration',['captcha'=>$captcha,'data'=>$data,'package_id'=>$package_id]);
		}
	}

	// select state

function select_state()
	{
		$drop="";

	if(isset($_POST['country']))
		{
			extract($_POST);
		$this->load->model('function_model');	 
	  
	  $siteQry=$this->function_model->state($country);
	  $statedata=$siteQry->result();
		$drop.='<select name="state" id="state" onchange="select_city(this.value);" class="form-control">
			     <option value="" selected="selected" class="le-input">Select State</option>';
		 		
			foreach($statedata as $key=>$val)
			{

			$drop.='<option value="'.$statedata[$key]->state.'" class="le-input">'.$statedata[$key]->state.'</option>';
			}
         
		$drop.='</select>';
				
	echo json_encode($drop);
	exit();
	  }
	}

	function select_city()
	{
		$drop="";

	if(isset($_POST['state']))
		{
			extract($_POST);
		$this->load->model('function_model');	 
	  
	  $siteQry=$this->function_model->city($state);
	  $statedata=$siteQry->result();

		$drop.='<select name="city" id="city" class="form-control">
			     <option value="" selected="selected" class="le-input">Select City</option>';
		 		
			foreach($statedata as $key=>$val)
			{

			$drop.='<option value="'.$statedata[$key]->id.'" class="le-input">'.$statedata[$key]->city.'</option>';
			}
         
		$drop.='</select>';
				
	echo json_encode($drop);
	exit();
	  }
	}		
	
	function reloadCaptcha()	//for reload captcha
	{
			$captcha = $this->gen_captcha(); //call captcha function			
			echo $captcha;
	}

	function show_clients($id)
	{
		
		if(isset($_REQUEST['id']))
			$id=$_REQUEST['id']; 
		else 
		   $id=$id;
	
		$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$data['actual_link']=$actual_link;	
		
		if(isset($_REQUEST['ts']))
			$data['ts'] = $_REQUEST['ts'];
			
		$selQry="select `users`.*, `country`.`country`, `country`.`state` FROM (`users`) INNER JOIN `country` ON `users`.`city`=`country`.`city` WHERE `users`.`user_type` != 'B' AND `users`.`approved` = 'Y' AND `users`.`deleted` = 'N' AND `users`.`status` = 'Y' AND `users`.`id`='".$id."'";
		$user_data = $this->db->query($selQry);
		$clientDetail = $user_data->result_array();
		$clientDetail[0]['address']=nl2br($clientDetail[0]['address']);
		$data['clientDetail'] = $clientDetail;		
		
		$cl_add=$clientDetail[0]['name'].', '.$clientDetail[0]['address'].', '.$clientDetail[0]['city'];
		$data['cl_add'] = $cl_add;
		

		$selQry="select * from users where id='".$id."' and status='Y' and deleted='N'";
		$userdata=$this->db->query($selQry);
		$userdata=$userdata->result();
		$data['userdata'] = $userdata;
		
		
		$this->loadViews('show_clients',$data);
	}

}