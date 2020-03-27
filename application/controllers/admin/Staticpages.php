<?php
defined('BASEPATH') OR exit('Not direct script access allowed');
class StaticPages extends CI_Controller
{
	function __construct()
	{
		 parent::__construct();
		 $adminLoggedIn = $this->session->userdata('adminLoggedIn');
      if($adminLoggedIn=='' || $adminLoggedIn!=TRUE)
      {   
          redirect(base_url().'admin.php','refresh');
      }
			$this->load->model('admin/staticpage');
		 	$this->load->config('Globvariable');
		
	}
	function addStaticPage($id=NULL)
	{
      
    $data[]='';
    $data["recordExistForLang"]=0;
		if($id!='')
    {
      $data["recordExistForLang"] = hCheckRecordExistForLang($id, $this->session->userdata("data_update_lang"), "pages");
      $data['pagedata']=$this->staticpage->getStaticData($id);
      $data['pagedata_curr_lang']=$this->staticpage->getStaticData2($id);
    }
    if(isset($_REQUEST['submit']))
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('priorty', 'priorty', 'required');
        if($this->form_validation->run())
        {
          $details['title']=valid_input_data($_REQUEST['title'], 'A');
          $details['matter']=valid_input_data($_REQUEST['matter'], 'C');
          $details['priorty'] = $_REQUEST['priorty'];
          $details['entry_date'] = date("Y-m-d");
          if($id=="")
          {
            $details['id'] = time();
            $details['lang_type'] = $this->session->userdata("user_lang");
            $this->staticpage->insertStaticPage($details);
            redirect(base_url("StaticPageList"));
          }
          else
          {
            $details['id'] = $id;
            $details['lang_type'] = $this->session->userdata("data_update_lang");
            if ($data["recordExistForLang"]=="0")
              $this->staticpage->insertStaticPage($details);
            else
            {
              $where = array('id'=>$id, "lang_type"=>$this->session->userdata("data_update_lang"));
              $this->staticpage->updateinsertStaticPage($where,$details);
            }            
            redirect(base_url("StaticPageList"));
          }
        }
    }

		    $this->load->view('admin/header.php');
       	$this->load->view('admin/leftpanel.php');
      	$this->load->view('admin/web_page_creater/static_page_add',$data);
       	$this->load->view('admin/footer.php');
		
	}

  function sraticPageListing($page=null)
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
        $query = $this->staticpage->getStaticPageListing($start_r,$gPageRow);
        $usersdata =  $query->result();
        $data['all_matter'] = $usersdata;

        //for show total searched 
        $total_rows = $this->staticpage->getStaticPageListing()->num_rows;
        
        //pagination start
        $URI_SEGMENT = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $returns = $this->mylibrary->paginationCompress("StaticPageList", $total_rows,2);
        $data['num']= $page;
        $data['showPagination'] = $this->pagination->create_links();
        // print_r($data['all_matter']);exit;
        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/web_page_creater/static_page_listing',$data);
        $this->load->view('admin/footer.php');

  }

  public function cmsDeleted($id)
    {
          $arr_data = array("deleted"=>"Y");
          $this->db->where(array("id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
          $rec = $this->db->update("pages", $arr_data);
        redirect($_SERVER['HTTP_REFERER']); 
    }

  function cmsShowPages()
  {
        $data['all_mattercms'] = $this->staticpage->getCmsPages();
        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/web_page_creater/cms_show_pages',$data);
        $this->load->view('admin/footer.php');   
  }

  function cmsPagesEdit($id=NULL)
  {
    $data["recordExistForLang"]=0;
    $data["recordExistForLang"] = hCheckRecordExistForLang($id, $this->session->userdata("data_update_lang"), "cms_pages");
    $data['pagedata1'] = $this->staticpage->getCmspagesData($id);
    $data['pagedata1_curr_lang'] = $this->staticpage->getCmspagesData2($id);
    if(isset($_REQUEST['submit']))
    {
       //print_r($_REQUEST);exit;
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('mail_editor', 'Mail Editor', 'required');
        if($this->form_validation->run())
        {
            $where = array('id'=>$id);
            $msg = stripslashes( $_REQUEST['mail_editor'] ) ;
            $msg=str_replace('rn','',$msg);
            $msg=addslashes($msg);
            $Details['matter']=valid_input_data($msg, 'B');
            $Details['title']=valid_input_data($_REQUEST['title'], 'A');
            $Details['entry_date'] = date("Y-m-d");

            //print_r($details);exit;
            $Details['lang_type'] = $this->session->userdata("data_update_lang");
            if ($data["recordExistForLang"]=="0")
            {
                $Details['id'] = time();  
                $this->staticpage->getCmsPagesInsert($Details);
            }
            else
            {
                $where = array('id'=>$id, "lang_type"=>$this->session->userdata("data_update_lang"));
                $this->staticpage->getCmsPagesEdit($where,$Details);
            }

            
            redirect(base_url('CmsShowPages'));
        }
      }
        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/web_page_creater/cms_page_edit',$data);
        $this->load->view('admin/footer.php'); 
  }
}
?>