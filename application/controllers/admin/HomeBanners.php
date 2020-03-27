<?php
defined('BASEPATH') OR exit('Not direct script access allowed');
class HomeBanners extends CI_Controller
{
	function __construct()
	{
		 parent::__construct();
		 $adminLoggedIn = $this->session->userdata('adminLoggedIn');
      if($adminLoggedIn=='' || $adminLoggedIn!=TRUE)
      {   
          redirect(base_url().'admin.php','refresh');
      }
			$this->load->model('admin/Homebanner');
		 	$this->load->config('Globvariable');
		 	$this->load->library('image_lib');
		
	}

	function Homebanner($id=NULL)
	{
        $data[]='';
        $data["recordExistForLang"]=0;
        $data["recordExistForLang"] = hCheckRecordExistForLang($id, $this->session->userdata("data_update_lang"), "homepage_banner");

        $data['banner_data'] = $this->Homebanner->homeBannerImagesRowFirst($id);
        //echo $this->db->last_query();
        $data['banner_data_curr_lang'] = $this->Homebanner->homeBannerImagesRowFirst2($id);

		if(isset($_REQUEST['btn_banner']))
        {
            if(isset($_FILES) && $_FILES['banner1']['name'] !='')
            {
                $file_details = array('upload_path'=> "images/homebanner/", 'allowed_types' => "gif|jpg|png|bmp|jpeg", 'max_size'=>"10000",'max_width'=>"10000", 'max_height'=>"10000", 'resize'=>TRUE, 'filename'=>'banner1');
                $banner1 = $this->uploadfile($file_details);
                
                if($banner1!= '')
                 {                       
                    $imgPath = base_url()."images/product_images/450X450/".$_REQUEST['hid_banner1'];
                    if(file_exists($imgPath))
                        unlink($imgPath) or die('failed deleting: ' . $imgPath);
                 }
            }
            else 
            {
            	$banner1 = $_REQUEST['hid_banner1'];
            }
            $BannerData = array('image'=>$banner1,
              	'text'=>$_REQUEST['banner1_text'],
              	'link'=>$_REQUEST['banner1_link'],
                'type'=>'home_banner');
            //$where = array('id'=>1);            
            $BannerData['id'] = $id;            
            $BannerData['lang_type'] = $this->session->userdata("data_update_lang");
            if ($data["recordExistForLang"]=="0")
                $this->Homebanner->insertBannerById1($BannerData);
            else
            {                
                $this->Homebanner->updateBannerById1($BannerData, $id);
                //$this->news->updateNews($where,$details);
            }
            redirect(base_Url()."HomeBanner/1");
        }

		$this->load->view('admin/header.php');
       	$this->load->view('admin/leftpanel.php');
      	$this->load->view('admin/homepagemanagement/show_homebanner',$data);
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
					'width'           =>  1500,
	        		'height'          =>  300,
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
