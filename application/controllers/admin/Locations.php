<?php
defined('BASEPATH') OR exit('no direct script access allowed');
class Locations extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
      $adminLoggedIn = $this->session->userdata('adminLoggedIn');
      if($adminLoggedIn=='' || $adminLoggedIn!=TRUE)
      {   
          redirect(base_url().'admin.php','refresh');
      }
      $this->load->model("admin/location");
      $this->load->config('Globvariable');
	  }
    function showLocation($page=NULL)
    {     
      //$this->location->updateCountryByPID();


        $state_condition='';
        $city_condition=''; 
        $condition_SERCH=''; 
        $gPageRow = $this->config->item('gPerPage');
        

          if(isset($_REQUEST['cont_name']))
            $cont_name=$_REQUEST['cont_name'];
          else
            $cont_name='';
          $data['cont_name'] = $cont_name;
          
          if(isset($_REQUEST['state_name']))
            $state_name=$_REQUEST['state_name'];
          else
            $state_name='';
          $data['state_name'] = $state_name;
          
          if(isset($_REQUEST['city']))
            $city=$_REQUEST['city'];
          else
            $city='';
          $data['city'] = $city;
          
          if(isset($_REQUEST['city_id']))
            $city_id=$_REQUEST['city_id'];
          else
            $city_id='';
          
          $data['city_id'] = $city_id;
        
          if(isset($_REQUEST['editid']))
            $editid=$_REQUEST['editid'];
          else
            $editid=''; 
          $data['editid'] = $editid;  
        
         $condition['cont_name'] = $cont_name; 
         $condition['state_name'] = $state_name; 
         $condition['city'] = $city;  
         $condition['city_id'] = $city_id;  
         $condition['editid'] = $editid;  

          
          if(isset($_REQUEST['search_val']))
          {
            $condition['search_val']= $_REQUEST['search_val'];
            $data['filter_searching'] = $_REQUEST['search_val'];
          }
          else
          {
            $data['filter_searching'] = '';
          }
          
        if(isset($_REQUEST['submit']))
        {
          $this->form_validation->set_rules('new_location', 'Location Name', 'required');
          $this->form_validation->set_rules('search_keyword', 'Search Keyword', 'required');
          $this->form_validation->set_rules('flage', 'Flage', 'required');
          if($this->form_validation->run()!= False)
          {

          if(isset($_REQUEST['edit_id']) && $_REQUEST['edit_id']=='')
          {
            if(isset($_FILES['flage']))
            { 
              $config['upload_path']          = './images/flageimage/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['overwrite']        = 'TRUE';
                $this->load->library('upload', $config);
                $this->upload->do_upload('flage');
                $userdata=$this->upload->data();
                $uploaded_file = $userdata['file_name'];
            }
            
            if(isset($_FILES['banner']))
            { 
              $config['upload_path']          = './images/country_banner/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['overwrite']        = 'TRUE';
                $this->load->library('upload', $config);
                $this->upload->do_upload('banner');
                $userdata=$this->upload->data();
                $banner = $userdata['file_name'];
            }
            $details['country'] =valid_input_data($_REQUEST['new_location'], 'A');
            $details['flage'] =$uploaded_file;
            $details['banner'] =$banner;
            $details['lang_type'] = $this->session->userdata("user_lang");
            $details['search_keyword'] =$_REQUEST['search_keyword'];
            $this->db->insert('country',$details);
            redirect($_SERVER['HTTP_REFERER']); 
          }
          
          
      
            $flage_qry="select flage from country where country='".$cont_name."' and deleted='N'"; 
            $result = $this->db->query($flage_qry);
            $flage_row = $result->row(); 
            $flage=$flage_row->flage; 
            
          if($_REQUEST['edit_id']=='1')
          {
            if(isset($_FILES['banner']))
            { 
              $config['upload_path']          = './images/country_banner/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['overwrite']        = 'TRUE';
                $this->load->library('upload', $config);
                $this->upload->do_upload('banner');
                $userdata=$this->upload->data();
                $banner = $userdata['file_name'];
            }

            $details['country'] =$_REQUEST['cont_name'];
            $details['state'] =valid_input_data($_REQUEST['new_location'], 'A');
            $details['flage'] =$flage;
            $details['banner'] =$banner;
            $this->db->insert('country',$details);
            redirect($_SERVER['HTTP_REFERER']); 
          }
          if($_REQUEST['edit_id']=='2')
          {
            $cont_qry="select country from country where state='".$_REQUEST['state_name']."' and deleted='N'"; 
            $result = $this->db->query($cont_qry);
            $row = $result->row(); 
            $cont=$row->country; 

            $details['country'] =$cont;
            $details['state'] =$_REQUEST['state_name'];
            $details['city'] =valid_input_data($_REQUEST['new_location'], 'A');
            $details['flage'] =$flage;
            $this->db->insert('country',$details);
            redirect($_SERVER['HTTP_REFERER']); 
          }
          
        }
        } 
       
        $total_rows =  $this->location->getLocation($condition)->num_rows;
        $URI_SEGMENT = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $returns = $this->mylibrary->paginationCompress('ShowLocation', $total_rows,2);
        $data['num']= $page;
        $data['showPagination'] = $this->pagination->create_links(); 
        $userdata = $this->location->getLocation($condition,$URI_SEGMENT,$gPageRow);
        $data['showlocation'] = $userdata->result(); 

      $this->load->view('admin/header.php');
      $this->load->view('admin/leftpanel.php');
      $this->load->view('admin/Locations/showLocation',$data);
      $this->load->view('admin/footer.php');
    }
    function editLocation()
      {   
        $data["recordExistForLang"]=0;
        if(isset($_REQUEST['editid']))
        {
        $data['editid'] = $_REQUEST['editid'];
        }
        if(isset($_REQUEST['cont_name']) && isset($_REQUEST['cont_edit']))
        {
          $sql="select flage,banner,search_keyword from country where country='".$_REQUEST['cont_edit']."' and state=' ' and city=''  ";
          $query=$this->db->query($sql);
          $show_flage=$query->row();
          
          $show_flage=$show_flage;
          $showflage=$show_flage->flage;
          $data['showflage'] = $showflage;
          
          $banner=$show_flage->banner;
          $data['banner'] = $banner;
          
          $search_keyword=$show_flage->search_keyword;
          $data['search_keyword'] = $search_keyword;
          
          $data['showlocation'] = $_REQUEST['cont_edit']; 
        }
        if(isset($_REQUEST['editid'])=='1' && isset($_REQUEST['state_edit']))
        {
          $data['showlocation'] = $_REQUEST['state_edit']; 
        }
        if(isset($_REQUEST['editid'])=='2' && isset($_REQUEST['city_edit']))
        {
          $data['showlocation'] = $_REQUEST['city_edit'];  
        }
        if(isset($_REQUEST['editid'])=='3' && isset($_REQUEST['city_id']) && isset($_REQUEST['location_edit']))
        {
          $data['showlocation'] = $_REQUEST['location_edit'];  
          $listingQry="select zipcode from locality where location='".$_REQUEST['location_edit']."' and status='Y' and deleted='N' ";
          $query = $this->db->query($listingQry);
          $showzipcode=$query->result();
          $data['showzipcode'] = $showzipcode;
        }
        
        if(isset($_REQUEST['btn_editlocation']))
        { 
            if(!isset($_REQUEST['editid']))
            {
                if(isset($_FILES) && $_FILES['flage']['name']!='')
                {
                  $config['upload_path']          = './images/flageimage/';
                  $config['allowed_types']        = 'gif|jpg|png';
                  $config['overwrite']        = 'TRUE';
                  $this->load->library('upload', $config);
                  $this->upload->do_upload('flage');
                  $userdata=$this->upload->data();
                  $newflage = $userdata['file_name'];
                }
                else
                {
                $newflage = $_REQUEST['flage_image'];
                }            
                if(isset($_FILES) && $_FILES['banner']['name']!='')
                {
                  $config['upload_path']          = './images/country_banner/';
                  $config['allowed_types']        = 'gif|jpg|png';
                  $config['overwrite']        = 'TRUE';
                  $this->load->library('upload', $config);
                  $this->upload->do_upload('banner');
                  $userdata=$this->upload->data();
                  $banner = $userdata['file_name'];
                }
                else
                {
                   $banner=$_REQUEST['banner_image']; 
                }
               $updateqry = "update country set country='".valid_input_data($_REQUEST['location_name'],'A')."', flage='".$newflage."',search_keyword='".$_REQUEST['search_keyword']."',banner='".$banner."' where country='".$_REQUEST['cont_edit']."' and state='' and city=''";
                $this->db->query($updateqry);
                return redirect(base_url("ShowLocation"));           
            }
            
              if(isset($_REQUEST['editid']) && $_REQUEST['editid']=='1')
              {
                $updateqry = "update country set state='".valid_input_data($_REQUEST['location_name'], 'A')."' where state='".$_REQUEST['state_edit']."'"; 
                $this->db->query($updateqry);
                return redirect(base_url("ShowLocation?editid=1&cont_name=".$_REQUEST['cont_name']));
              }
              
              if(isset($_REQUEST['editid']) && $_REQUEST['editid']=='2')
              {
                $updateqry = "update country set city='".valid_input_data($_REQUEST['location_name'], 'A')."',city_latitude='".$_REQUEST['city_latitude']."',city_longitude='".$_REQUEST['city_longitude']."' where city='".$_REQUEST['city_edit']."'"; 
                $this->db->query($updateqry);
                return redirect(base_url("ShowLocation?editid=2&state_name=".$_REQUEST['state_name']."&cont_name=".$_REQUEST['cont_name'].""));
              }
              
              if(isset($_REQUEST['editid']) && $_REQUEST['editid']=='3')
              {
                $updateqry = "update locality set location='".valid_input_data($_REQUEST['location_name'], 'A')."',zipcode='".valid_input_data($_REQUEST['zipcode'], 'A')."' where location='".$_REQUEST['location_edit']."'"; 
                $this->db->query($updateqry); 
              }
        }
        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/Locations/editLocation',$data);
        $this->load->view('admin/footer.php');
      }
      function DeleteLocation($type,$id)
      {
        $arr_data = array("deleted"=>"Y");
        if(isset($type) && $type=='country')
        $this->db->where(array("country"=>$id));
        if(isset($type) && $type=='state')
        $this->db->where(array("state"=>$id));
        if(isset($type) && $type=='city')
        $this->db->where(array("city"=>$id));
        $this->db->update("country", $arr_data);
        redirect($_SERVER['HTTP_REFERER']); 
      }
      public function LocationApprove($approved,$id)
      {
        $arr_data = array();
        if($approved=="Y")
            $arr_data = array("avilable_home_search"=>"N");
        else if ($approved=="N")
            $arr_data = array("avilable_home_search"=>"Y");
        $this->db->where(array("country"=>$id));
        $rec = $this->db->update("country", $arr_data);
        redirect($_SERVER['HTTP_REFERER']); 
      }
}
?>