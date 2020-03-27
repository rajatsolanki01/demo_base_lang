<?php
defined('BASEPATH') OR exit('no direct script access allowed');
class Categories extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
      $adminLoggedIn = $this->session->userdata('adminLoggedIn');
      if($adminLoggedIn=='' || $adminLoggedIn!=TRUE)
      {   
          redirect(base_url().'admin.php','refresh');
      }
      $this->load->model("admin/category");
      $this->load->config('Globvariable');
    }
    public function categoryView($type=null, $page=null)
    {
        $cat_id=0;
        if(isset($_REQUEST['cat_id']))
          $cat_id=$_REQUEST['cat_id'];

        $sub_cat_id=0;    
        if(isset($_REQUEST['sub_cat_id']))
          $sub_cat_id=$_REQUEST['sub_cat_id'];

        if(isset($_REQUEST['search_val']))
          $search_val=$_REQUEST['search_val'];
        else
          $search_val ='';

        $data['cat_type']=$type; 
        $data['cat_id']=$cat_id; 
        $data['sub_cat_id']=$sub_cat_id;
        $data['search_val']=$search_val; 
           
        $condition['cat_id'] = $cat_id;
        $condition['type'] = $type;
        $condition['sub_cat_id'] = $sub_cat_id;
        $condition['search_val'] = $search_val;
        
        

        //for show total searched 
        $total_rows = count($this->category->getCategories($condition));
         //pagination start
        $URI_SEGMENT = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $returns = $this->mylibrary->paginationCompress("CategoryView/".$type, $total_rows,3);
        $data['num']= $URI_SEGMENT;
        $data['showPagination'] = $this->pagination->create_links();
        $gPageRow = $this->config->item('gPerPage');
        $data['categoriesdata'] = $this->category->getCategories($condition,$URI_SEGMENT,$gPageRow);


      if(isset($_REQUEST['submit']))
      {
        if($cat_id !=0)
          $msg= 'Sub ';
        elseif($sub_cat_id !=0)
          $msg= 'Next Sub ';
        else
          $msg ='';
        $this->form_validation->set_rules('name', $msg.'Category Name', 'trim|required|callback_cat_unique[categories.name.'.$_POST['cat_id'].'.'.$_POST['sub_cat_id'].']');
        $this->form_validation->set_message('cat_unique', 'This %s is already exists');
      
        if($this->form_validation->run()==true)
        {
          // print_r($_POST);exit;
          if(isset($_FILES) && $_FILES['cat_img']['name'] !='')
          {
            $file_details = array('upload_path'=> "images/category_images/", 'allowed_types' => "gif|jpg|png|jpeg", 'max_size'=>"10000",'max_width'=>"10000", 'max_height'=>"10000", 'filename'=>'cat_img');
            $fileupload = $this->uploadfile($file_details);
          }
          else
          {
            $fileupload = '';
          }
          
          $_POST['uploaded_file'] = $fileupload;
          $data_input = $this->input->post();
          $this->category->insertCategories($data_input);

          
          $this->session->set_flashdata('CategoriesMsg', 'Successfully Add '.$msg.'Category');
          redirect($_SERVER['HTTP_REFERER']); 
        }
      }

    $this->load->view('admin/header.php');
    $this->load->view('admin/leftpanel.php');
    $this->load->view('admin/category/category_view',$data);
    $this->load->view('admin/footer.php');
  }
  public function categoryEdit($id)
  {
    $data["recordExistForLang"]=0;
    $data["recordExistForLang"] = hCheckRecordExistForLang($id, $this->session->userdata("data_update_lang"), "news");
    $data1 = $this->category->getCategoriesById($id);
    $data['data1_curr_lang'] = $this->category->getCategoriesById2($id);
    $data['data1']= $data1;
    if(isset($_REQUEST['submit']))
    {
      // print_r($_REQUEST);
      if(isset($_FILES) && $_FILES['cat_img']['name'] !='')
      {
        $file_details = array('upload_path'=> "images/category_images/", 'allowed_types' => "gif|jpg|png|jpeg", 'max_size'=>"10000",'max_width'=>"10000", 'max_height'=>"10000", 'filename'=>'cat_img');
        $fileupload = $this->uploadfile($file_details);
          
          if(isset($_REQUEST['old_photo']) && $_REQUEST['old_photo'] != '')
          {
              $imgPath = base_url()."images/category_images/".$_REQUEST['old_photo']; 
              if(file_exists($imgPath))
              {
                unlink($imgPath) or die('failed deleting: ' . $imgPath);
              }
          }
      }
      else
      {
        $fileupload = $_REQUEST['old_photo'];
      }
      $_POST['uploaded_file'] = $fileupload;
      $data_input = $this->input->post();
      $data_input['id'] = $id;
      $data_input['lang_type'] = $this->session->userdata("data_update_lang");//print_r($data_input);exit;
      if ($data["recordExistForLang"]=="0")
          $this->category->insertCategories2($data_input);
      else
      {          
          $this->category->updateCategories($data_input);
      }
      //$this->category->updateCategories($data_input);
      if($data1->parent_id !=0)
      {
        $msg= 'Sub ';
        $path = '/?cat_id='.$data1->parent_id;
      }
      elseif($data1->parent_sub_id !=0)
      {
        $msg= 'Next Sub ';
        $path = '/?sub_cat_id='.$data1->parent_sub_id;
      }
      else
      {
        $msg ='';
        $path = 'sell';
      }
      //print_r($data1);exit;
      $this->session->set_flashdata('CategoriesMsg', 'Successfully Update '.$msg.'Category');
      redirect('CategoryView/'.$data1->cat_type.$path); 
    }

    $this->load->view('admin/header.php');
    $this->load->view('admin/leftpanel.php');
    $this->load->view('admin/category/category_edit',$data);
    $this->load->view('admin/footer.php');
  }
  public function categoryApprove($status,$id)
  {
    $arr_data = array();
    if ($status=="N")
      $arr_data = array("status"=>"Y");
    elseif($status=="Y")
      $arr_data = array("status"=>"N");
    $this->db->where(array("cat_id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
    $rec = $this->db->update("categories", $arr_data);
    redirect($_SERVER['HTTP_REFERER']); 
  }
  public function categoryDelete($id)
  {
    $arr_data = array("deleted"=>"Y"); 
    $this->db->where(array("cat_id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
    $rec = $this->db->update("categories", $arr_data);
    $arr_data = array("deleted"=>"Y"); 
    $this->db->where(array("data_id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
    $rec = $this->db->update("metadata", $arr_data);
    redirect($_SERVER['HTTP_REFERER']); 
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
        
        if(!$this->upload->do_upload($file_details['filename']))
        {
            $this->session->set_flashdata('imageUploadingError', "<i data-dismiss='alert' class='icon-remove close'></i><b>Oops!!</b>". $this->upload->display_errors().".");         
            redirect($_SERVER['HTTP_REFERER']); 
        }
        $file_data = $this->upload->data();         
        return $file_data['file_name'];
    }
    public function cat_unique($str, $field)
    {
        sscanf($field, '%[^.].%[^.].%[^.].%[^.]', $table, $field, $cat_id, $sub_cat_id);
        return isset($this->db)
            ? ($this->db->limit(1)->get_where($table, array($field => $str, 'parent_id' => $cat_id,'parent_sub_id' => $sub_cat_id))->num_rows() === 0)
            : FALSE;
    }
}
?>