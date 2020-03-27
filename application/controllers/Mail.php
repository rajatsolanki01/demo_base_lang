<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/MyaccountController_front.php';

class Mail extends MyaccountController_front 
{
	function __construct()
	{ 
		parent::__construct();
		$this->load->model('mail_details');
	}
	public function show_mail_status()
	{
		$data['email_data']=$this->mail_details->get_mail_status();
		$this->loadViews('mail_status', $data, NULL);
	}
	public function view_mail($pro_id=null, $snd_user_id=null, $rec_user_id=null, $chat_id=null)
	{
		$data['unred_count']=$this->mail_details->get_email_id();
		$data['viewmail']=$this->mail_details->get_email($pro_id,$rec_user_id);
		$data['viewData']=$this->mail_details->get_email_data($pro_id,$rec_user_id);
		$this->mail_details->update_email($pro_id,$rec_user_id);
		$this->loadViews('view_mail',$data);
		
		if(isset($_REQUEST['contact_submit']))
		{
			date_default_timezone_set('Asia/Kolkata');
			$date=date("Y-m-d");
			$time=date("H:i:s");
			$msg['snd_user_id']=$_REQUEST['snd_user_id'];
			$msg['rec_user_id']=$_REQUEST['rec_user_id'];
			$msg['subject']=$_REQUEST['subject'];
			$msg['message']=$_REQUEST['msg_data'];
			$msg['unread']='Y';
			$msg['entry_date']=$date;
			$msg['time']=gmdate("jS \of F Y h:i:s A");
			$msg['rec_deleted']='N';
			$msg['sen_deleted']='N';
			$msg['pro_id']=$_REQUEST['pro_id'];
			$msg['msg_id']=$_REQUEST['msg_id'];
			$msg['email_type']=$_REQUEST['email_type'];
			$msg['send_url']=$_REQUEST['send_url'];
			$msg['lang_type']=$this->session->userdata("user_lang");
			$this->mail_details->insert_email($msg);
			redirect(base_url()."mail_detail/".$pro_id."/".$snd_user_id."/".$rec_user_id."/".$chat_id); 
		}
	
	}
}
