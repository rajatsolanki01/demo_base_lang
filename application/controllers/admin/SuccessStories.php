<?php
defined('BASEPATH') OR exit('no direct script access allowed');
class SuccessStories extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
      $adminLoggedIn = $this->session->userdata('adminLoggedIn');
      if($adminLoggedIn=='' || $adminLoggedIn!=TRUE)
      {   
          redirect(base_url().'admin.php','refresh');
      }
      $this->load->model("admin/successstorie");
      $this->load->config('Globvariable');
	  }
    
    function successStorie($page=NULL)
    {     
        if($this->input->post('search_val'))
        {
            $inputKeywords = $this->input->post('search_val');
            $searchKeyword = strip_tags($inputKeywords);
            if(!empty($searchKeyword)){
                $this->session->set_userdata('searchKeyword',$searchKeyword);
            }else{
                $this->session->unset_userdata('searchKeyword');
            }
        }elseif($this->input->post('submit')=='Search'){
            $this->session->unset_userdata('searchKeyword');
            // redirect('UserView'); 
        }
        $data['searchKeyword'] = $this->session->userdata('searchKeyword');
        $search_val = $data['searchKeyword'];
        $data['search_val'] = $search_val;
        $condition['search_val'] = $search_val;
        //search stop
         $total_rows = $this->successstorie->getSuccessStorieData($condition)->num_rows;
        //pagination start
        
        $URI_SEGMENT = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $returns = $this->mylibrary->paginationCompress('SuccessStorie', $total_rows,2);
        $data['num']= $page;
        $data['showPagination'] = $this->pagination->create_links();

        $gPageRow = $this->config->item('gPerPage');
        $query = $this->successstorie->getSuccessStorieData($condition,$URI_SEGMENT,$gPageRow);
        $usersdata =  $query->result();
        $data['success_stories_data'] = $usersdata;
      
        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/success_stories/show_success_stories',$data);
        $this->load->view('admin/footer.php');     
    }


  public function approveStorie($status,$id)
    {
        $arr_data = array();
        if($status=="Y")
            $arr_data = array("status"=>"N");
        else if ($status=="N")
            $arr_data = array("status"=>"Y");
        $this->db->where(array("id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
        $rec = $this->db->update("success_stories", $arr_data);
        redirect($_SERVER['HTTP_REFERER']); 
    }
    public function storieDelete($id)
    { 
          $arr_data = array("deleted"=>"Y");
          $this->db->where(array("id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
          $rec = $this->db->update("success_stories", $arr_data);
          redirect($_SERVER['HTTP_REFERER']); 
    }


    function editStorie($id)
    {
      $data[]='';
        if($id!='')
        {
            $data['success_stories_data']=$this->successstorie->getSuccessStorieDataById($id);
        }
        if(isset($_REQUEST['submit']))
        {
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required|max_length[500]');
        if($this->form_validation->run())
        {
             if(isset($_FILES) && $_FILES['sucess_img']['name'] !='')
            {
                $file_details = array('upload_path'=> "images/Success_Stories/", 'allowed_types' => "gif|jpg|png|jpeg", 'max_size'=>"10000",'max_width'=>"10000", 'max_height'=>"10000", 'resize'=>TRUE, 'filename'=>'sucess_img');
                $fileupload = $this->uploadfile($file_details);
                 if(isset($_REQUEST['photo']) && $_REQUEST['photo'] != ''){
                        $imgPath = base_url()."images/Success_Stories/".$_REQUEST['photo']; 
                        if(file_exists($imgPath)){
                            unlink($imgPath) or die('failed deleting: ' . $imgPath);
                        }
                    }
            }
            elseif ($_REQUEST['photo']!='') {
                $fileupload = $_REQUEST['photo'];
            }
            else
            {
                
                $this->session->set_flashdata('LogoUploadingError', "<i data-dismiss='alert' class='icon-remove close'></i><b>Oops!!</b> File format not supported.");
            redirect(base_url('EditStorie'));         
            } 

             $data_edit = array('image_path'=>$fileupload,
                'title'=>$_REQUEST['title'],
                'description'=>$_REQUEST['description'],
                'entry_date'=>$_REQUEST['entry_date']);
            $where = array('id'=>$id);
            $this->successstorie->updateSuccessStorie($data_edit,$where);
            redirect(base_url("SuccessStorie"));
          }
        }
        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/success_stories/add_success_stories',$data);
        $this->load->view('admin/footer.php');  
    }


     // Uploading file
    public function uploadfile($file_details = array())
    {   
        
        $config = array();
        $config['upload_path'] = $file_details['upload_path'];
        $config['allowed_types'] = $file_details['allowed_types'];
        $config['max_size']  = $file_details['max_size'];
        if(isset($file_details['max_width']) && isset($file_details['max_height']))
        {
            $config['max_width']  = $file_details['max_width'];
            $config['max_height']  = $file_details['max_height'];
        }
        $file_name = $file_details['filename'];
        $new_name = mktime(date('h'),date('i'),date('s'),date('m'),date('d'),date('y'));
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config); 
        
        if( ! $this->upload->do_upload($file_details['filename']))
        {
            $this->session->set_flashdata('LogoUploadingError', "<i data-dismiss='alert' class='icon-remove close'></i><b>Oops!!</b> File format not supported.");         
            redirect($_SERVER['HTTP_REFERER']); 
        }
        else
        {
            $image_data =   $this->upload->data();
            if($file_details['resize']==TRUE)
            {
                $configer =  array(
                    'image_library'   => 'gd2',
                    'source_image'    =>  $image_data['full_path'],
                    'maintain_ratio'  =>  TRUE,
                    'width'           =>  120,
                    'height'          =>  120,
                  );
                  $this->image_lib->clear();
                  $this->image_lib->initialize($configer);
                  $this->image_lib->resize();
            }
        }
        // echo "<pre>"; print_r($file_data);exit();
        
        return $image_data['file_name'];
    }

  }
  ?>