<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH .'/libraries/BaseController_front.php';
class Mart_Home extends BaseController_front
{ 
	 function  __construct()
	 {
        parent::__construct();
        
        $this->load->model('CMSPage');
        $this->load->helper('functions');
     
     }
     /*---------- show member package Details--------*/
	/*---------- show about_us page--------*/
	function about_us()
	{
		$data['show_data'] = $this->CMSPage->getData('1');
		$this->loadViews('aboutus', $this->global, $data, NULL);
	}
	/*---------- show terms and condition page--------*/
	function termsconditions()
	{
		$data['show_data'] = $this->CMSPage->getData('2');
		$this->loadViews('termscondition', $this->global, $data, NULL);
	}
	/*---------- show perivacy_policys page--------*/
	function privacy_policys()
	{
		$data['show_data'] = $this->CMSPage->getData('3');
		$this->loadViews('privacy_policy', $this->global, $data, NULL);
	}
	function contactsus()
	{
		$data['contact_data']=$this->CMSPage->getcontactsus();
		$this->loadViews('contactus', $data, NULL);
		if(isset($_REQUEST['submit']))
		{
			$Details['name']=valid_input_data($_REQUEST['name'], 'A');
			$Details['email']=valid_input_data($_REQUEST['email'], 'B');
			$Details['mobile']=valid_input_data($_REQUEST['mobile'], 'A');
			$Details['subject']=valid_input_data($_REQUEST['subject'], 'A');
			$Details['message']=valid_input_data($_REQUEST['message'], 'A');
			$Details['date']=date("Y-m-d");
			$Details['status']='Y';
			$Details['deleted']='N';
			$Details['lang_type']=$this->session->userdata("user_lang");
			
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('message', 'Message', 'required');
			if($this->form_validation->run())
			{
					$this->CMSPage->insert_enquiry($Details);
					$this->session->set_flashdata('Success', 'Your Message has been Sent successfully.');
					redirect("contactus.html");
			}
			else
			{
				redirect("contactus.html");
			}
		}
 	}
 	function forgot()
	{
		$data['msg']="";
		if(isset($_REQUEST['submit']))
		{	
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			if($this->form_validation->run())
			{
		        $this->load->config('Globvariable');
		        $SITE_EMAIL = $this->config->item('gSiteEmail');
				$pass=get_rand_letters(10);
				$Info=Email_Info(2);
				$Subject=$Info->subject;
				$msgBody=$Info->msg;
				$msgBody=stripslashes($msgBody);
				$msgBody=str_replace("\"", "'", $msgBody);
				eval("\$msgBody = \"$msgBody\";");	
				$msgBody=stripslashes($msgBody);
				$msgBody1='<html><body><table><tr><td>'.$msgBody.'</td></tr></table></body></html>';
				$update_pass= "update users set	password='".md5($pass)."' where user_name='".$_REQUEST['email']."' and user_type='C' and lang_type='".$this->session->userdata("user_lang")."' and status='Y'";
				$this->db->Query($update_pass);
				$this->load->config('Globvariable');
				$company_name = $this->config->item('gCompanyName');
				//echo $SITE_EMAIL.",".$company_name.",".$_REQUEST['email'].",".$Subject.",".$msgBody1;exit();
				SendMail($SITE_EMAIL,$company_name,$_REQUEST['email'],$Subject,$msgBody1);
				$data['msg']="Your new Password Send Successfully On Your Email";
				//redirect("forgot-1.html");
			}
		}
		$this->loadViews('forgot',$data);
	}
}