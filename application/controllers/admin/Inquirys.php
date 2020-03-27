<?php
defined('BASEPATH') OR exit('Not direct script access allowed');
class Inquirys extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$adminLoggedIn = $this->session->userdata('adminLoggedIn');
      	if($adminLoggedIn=='' || $adminLoggedIn!=TRUE)
      	{   
          redirect(base_url().'admin.php','refresh');
      	}
		$this->load->model('admin/inquiry');
		$this->load->config('Globvariable');
		
	}
	function customersmail($page=NULL)
	{
		$page = intval($page);
        if($page<=0)
        {
            $page = 0;
            $start_r = $page;
        }
        else
        {
            $start_r = $page;
        }
        $gPageRow = $this->config->item('gPerPage');
		$query=$this->inquiry->get_email_enquiry($start_r,$gPageRow);
		$userdata=$query->result();
		$data['customerdata']=$userdata;
		$total_rows = $this->inquiry->get_email_enquiry()->num_rows;
		$URI_SEGMENT = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $returns = $this->mylibrary->paginationCompress("MailView", $total_rows,2);
        $data['num']= $page;
        $data['showPagination'] = $this->pagination->create_links();
		$this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/inquiry/customersmail',$data);
        $this->load->view('admin/footer.php');		
		
		
		
	}
	function deleteEmailInquiry($id=NULL)
	{
		$this->inquiry->update_email_enquiry($id);
		redirect($_SERVER['HTTP_REFERER']);
	}
	function viewinquiry($id=NULL)
	{
		$data['enqury_detail']=$this->inquiry->view_email_enquiry($id);
		$this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/inquiry/viewinquiry',$data);
        $this->load->view('admin/footer.php');
	}
	function adminInquiry($page=NULL)
	{
		$page = intval($page);
        if($page<=0)
        {
            $page = 0;
            $start_r = $page;
        }
        else
        {
            $start_r = $page;
        }
        $gPageRow = $this->config->item('gPerPage');
		$query=$this->inquiry->get_enquiry($start_r,$gPageRow);
		$userdata=$query->result();
		$data['customerdata']=$userdata;
		$total_rows = $this->inquiry->get_enquiry()->num_rows;
		$URI_SEGMENT = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $returns = $this->mylibrary->paginationCompress("AdminInquiry", $total_rows,2);
        $data['num']= $page;
        $data['showPagination'] = $this->pagination->create_links();
		$this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/inquiry/adminInquiry',$data);
        $this->load->view('admin/footer.php');
	}
	function deleteInquiry($id=NULL)
	{
		$this->inquiry->update_enquiry($id);
		redirect($_SERVER['HTTP_REFERER']);
	}
	function showTemplates()
	{
		$data['mailsdata']=$this->inquiry->get_mails();
		//echo $this->db->last_query();
		$this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/inquiry/showTemplates',$data);
        $this->load->view('admin/footer.php');
		
	}
	function addEmail($id=NULL)
	{
		$data["recordExistForLang"]=0;
		if($id!="")
		{
			$data["recordExistForLang"] = hCheckRecordExistForLang($id, $this->session->userdata("data_update_lang"), "mails");
			$data['mailsdata']=$this->inquiry->get_mails($id);
			$data['mailsdata_curr_lang']=$this->inquiry->get_mails2($id);
		}
		
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('msg', 'Message', 'required');
            if($this->form_validation->run())
            {
				$msg=str_replace('\r\n','',$_POST['msg']);
				$msg = stripslashes($msg) ;
				$msg=addslashes($msg);
				$details['subject']=valid_input_data($_REQUEST['subject'],'A');
				$details['msg']=$msg;
				
				if($id=="")
				{
					$details['id'] = time();            		
					$this->inquiry->insert_mails($details);
					redirect(base_url('EMailTemplates'));
				}
				else
				{
					$details['id'] = $id;
					$details['title'] = $_POST['hid_title'];
					$details['lang_type'] = $this->session->userdata("data_update_lang");
					if ($data["recordExistForLang"]=="0")
						$this->inquiry->insert_mails($details);
					else
					{						
						$this->inquiry->update_mails($id,$details);//$this->news->updateNews($where,$details);
					}
					redirect(base_url('EMailTemplates'));
				}
            }
		}
		$this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/inquiry/addEmail',$data);
        $this->load->view('admin/footer.php');

	}
	
}