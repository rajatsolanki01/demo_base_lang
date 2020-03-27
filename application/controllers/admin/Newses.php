<?php
defined('BASEPATH') OR exit('Not direct script access allowed');
class Newses extends CI_Controller
{
	function __construct()
	{
		 parent::__construct();
		 $adminLoggedIn = $this->session->userdata('adminLoggedIn');
      if($adminLoggedIn=='' || $adminLoggedIn!=TRUE)
      {   
          redirect(base_url().'admin.php','refresh');
      }
			$this->load->model('admin/news');
		 	$this->load->config('Globvariable');
			$this->load->library('image_lib');
	}

	function newsShow($page=null)
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
         $total_rows = $this->news->getNewsData($condition)->num_rows;
        //pagination start
        
        $URI_SEGMENT = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $returns = $this->mylibrary->paginationCompress('NewslLst', $total_rows,2);
        $data['num']= $page;
        $data['showPagination'] = $this->pagination->create_links();

        $gPageRow = $this->config->item('gPerPage');
        $query = $this->news->getNewsData($condition,$URI_SEGMENT,$gPageRow);
        $usersdata =  $query->result();
        $data['news_show_data'] = $usersdata;


		$this->load->view('admin/header.php');
       	$this->load->view('admin/leftpanel.php');
      	$this->load->view('admin/news/news_show',$data);
       	$this->load->view('admin/footer.php');
	}

	 public function newsApprove($status,$id)
    {
        $arr_data = array();
        if($status=="Y")
            $arr_data = array("status"=>"N");
        else if ($status=="N")
            $arr_data = array("status"=>"Y");
        $this->db->where(array("id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
        $rec = $this->db->update("news", $arr_data);
        redirect($_SERVER['HTTP_REFERER']); 
    }
    public function newsDelete($id)
    { 
          $arr_data = array("deleted"=>"Y");
          $this->db->where(array("id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
          $rec = $this->db->update("news", $arr_data);
        	redirect($_SERVER['HTTP_REFERER']); 
    }


    function newsAdd($id=NULL)
	{   
        $data[]='';
        $data["recordExistForLang"]=0;
		if($id!='')
        {
            $data["recordExistForLang"] = hCheckRecordExistForLang($id, $this->session->userdata("data_update_lang"), "news");
            $data['show_news_edit']=$this->news->getNewsDataById($id);
            $data['show_news_edit_curr_lang']=$this->news->getNewsDataById2($id);
        }//echo $data["recordExistForLang"];
    if(isset($_REQUEST['submit']))
    {
            //echo $data["recordExistForLang"]."rs";exit();
        	$this->form_validation->set_rules('title', 'Title', 'required');
        	$this->form_validation->set_rules('description', 'Description', 'required');
        	
        if($this->form_validation->run())
        {
        	 if(isset($_FILES) && $_FILES['news_img']['name'] !='')
            {
                $file_details = array('upload_path'=> "images/news/", 'allowed_types' => "gif|jpg|png|bmp|jpeg", 'max_size'=>"10000",'max_width'=>"10000", 'max_height'=>"10000", 'resize'=>TRUE, 'filename'=>'news_img');
                $fileupload = $this->uploadfile($file_details);
                 if(isset($_REQUEST['photo']) && $_REQUEST['photo'] != ''){
                        $imgPath = base_url()."images/news/".$_REQUEST['photo']; 
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
           	    redirect(base_url('NewsAdd'));         
            }


        	$details['image_path'] = $fileupload;
            $details['title']=valid_input_data($_REQUEST['title'], 'A');
            $details['url'] = valid_input_data($_REQUEST['url'], 'B');
            $details['description']=valid_input_data($_REQUEST['description'], 'B');
            $details['entry_date'] = date("Y-m-d");

          if($id=="")
          {
            $details['id'] = time();
            $details['lang_type'] = $this->session->userdata("user_lang");
            $this->news->insertNews($details);
            redirect(base_url("NewslLst"));
          }
          else
          {
            $details['id'] = $id;
            $details['lang_type'] = $this->session->userdata("data_update_lang");
            if ($data["recordExistForLang"]=="0")
                $this->news->insertNews($details);
            else
            {
                $where = array('id'=>$id, "lang_type"=>$this->session->userdata("data_update_lang"));
                $this->news->updateNews($where,$details);
            }
            redirect(base_url("NewslLst"));
          }
        }
    }
		$this->load->view('admin/header.php');
       	$this->load->view('admin/leftpanel.php');
      	$this->load->view('admin/news/news_add',$data);
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
	        'height'          =>  100,
				  );
				  $this->image_lib->clear();
				  $this->image_lib->initialize($configer);
				  $this->image_lib->resize();
	        }
        }
        return $image_data['file_name'];
    }
	
	}
	?>