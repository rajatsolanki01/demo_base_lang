<?php
defined('BASEPATH') OR exit('no direct script access allowed');
class Seos extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
      $adminLoggedIn = $this->session->userdata('adminLoggedIn');
      if($adminLoggedIn=='' || $adminLoggedIn!=TRUE)
      {   
          redirect(base_url().'admin.php','refresh');
      }
      $this->load->model("admin/seo");
      $this->load->config('Globvariable');
	  }
    
    public function seo($page=null)
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
        $query = $this->seo->get_seo($start_r,$gPageRow);
        $usersdata =  $query->result();
        $data['seodata'] = $usersdata;

        //for show total searched 
        $total_rows = $this->seo->get_seo()->num_rows;
        
        //pagination start
        $URI_SEGMENT = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $returns = $this->mylibrary->paginationCompress("SEO", $total_rows,2);
        $data['num']= $page;
        $data['showPagination'] = $this->pagination->create_links();
       
        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/seo/seo_view',$data);
        $this->load->view('admin/footer.php');
         
    }	
    function add_seo($id=NULL)
    {
      $data["recordExistForLang"]=0;
        if($id!='')
        {
          $data["recordExistForLang"] = hCheckRecordExistForLang($id, $this->session->userdata("data_update_lang"), "seo");
          $data['seoedit']=$this->seo->get_seo_data($id);
          $data['seoedit_curr_lang']=$this->seo->get_seo_data2($id);
        }
        if(isset($_REQUEST['submit']))
        {

            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('keyword', 'keyword', 'required');
            $this->form_validation->set_rules('des', 'Descrition', 'required');
            if($this->form_validation->run())
            {
              $details['name']=$_REQUEST['name'];
              $details['title']=$_REQUEST['title'];
              $details['keyword']=$_REQUEST['keyword'];
              $details['des']=$_REQUEST['des'];
              if($id=="")
              {
                $details['id'] = time();
                $details['lang_type'] = $this->session->userdata("user_lang");
                $this->seo->insert_seo($details);
                redirect($_SERVER['HTTP_REFERER']);
              }
              else
              {
                $details['id'] = $id;  
                $details['lang_type'] = $this->session->userdata("data_update_lang");
                if ($data["recordExistForLang"]=="0")
                  $this->seo->insert_seo($details);
                else     
                    $this->seo->update_seo($details,$id);//$this->news->update_seo($where,$details);
                redirect(base_url('SEO'));
              }
            }
        }
        
        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/seo/seo_add',$data);
        $this->load->view('admin/footer.php');
    }
    function show_seo_detail($id=NULL)
    {
      $data['seodetail']=$this->seo->get_seo_data($id);
      $this->load->view('admin/header.php');
      $this->load->view('admin/leftpanel.php');
      $this->load->view('admin/seo/seo_show',$data);
      $this->load->view('admin/footer.php');
    } 
}
?>