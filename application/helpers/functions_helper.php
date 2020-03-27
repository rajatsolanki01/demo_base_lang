<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/* nik 12-2-20 hgenCaptcha*/
if(!function_exists('hgenCaptcha'))
{
	/*=================Genrate Captcha=======================*/
	function hgenCaptcha()
    {
    	$CI = get_instance();
        array_map('unlink', glob("./assets/captcha/*.jpg"));    //delete old files

        $a_z = explode(" ","a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z");
        shuffle($a_z);
        $string_rand="";        //string rand
        foreach(array_rand($a_z,4) as $key=>$value)
        {
                $string_rand.=$a_z[$key];
        }

        $number_rand = rand(1000,9999); //number rand
        
        $random =  strtoupper($string_rand).$number_rand; //concat random aphabat and number

    	$CI->load->helper('captcha');
    	$vals = array(
            'word'          => $random,
            'img_path'      => './assets/captcha/',
            'img_url'       => base_url().'assets/captcha/',
            'font_path'     => './assets/fonts/texb.ttf');

        $cap = create_captcha($vals);
        $CI->session->set_userdata('security_code',md5($cap['word']));
        // echo $CI->session->userdata('security_code');exit;
        // $this->session->userdata['security_code'] =md5($cap['word']); 
        //print_r($cap['word']);exit();
        return $cap['image'];
    }
}
/* nik 12-2-20 hgetCertificationImgByCustId*/
/* remove
if(!function_exists('hgetCertificationImgByCustId'))
{
	function hgetCertificationImgByCustId($cust_id=null)
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$dataList = $CI->function_model->getCertificationImgByCustId($cust_id);
		return  $dataList;
	}
} */
/* nik 12-2-20 hgetImageGalleryByCustId*/
// if(!function_exists('hgetImageGalleryByCustId'))
// {
// 	function hgetImageGalleryByCustId($cust_id=null)
// 	{
// 		$CI = get_instance();
// 		$CI->load->model('function_model');
// 		$dataList = $CI->function_model->getImageGalleryByCustId($cust_id);
// 		return  $dataList;
// 	}
// }
/* nik 12-2-20 hgetInformationPoliciesDetailByCustId*/
/* remove by RS if(!function_exists('hgetInformationPoliciesDetailByCustId'))
{
	function hgetInformationPoliciesDetailByCustId($cust_id=null)
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$dataList = $CI->function_model->getInformationPoliciesDetailByCustId($cust_id);
		return  $dataList;
	}
} */
/* nik 12-2-20 hgetTradeProductionsDetailByCustId*/
/* remove by RS if(!function_exists('hgetTradeProductionsDetailByCustId'))
{
	function hgetTradeProductionsDetailByCustId($cust_id=null)
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$dataList = $CI->function_model->getTradeProductionsDetailByCustId($cust_id);
		return  $dataList;
	}
}*/
/* nik 12-2-20 hgetCustomerDetailById*/
// if(!function_exists('hgetCustomerDetailById'))
// {
// 	function hgetCustomerDetailById($cust_id=null)
// 	{
// 		$CI = get_instance();
// 		$CI->load->model('function_model');
// 		$dataList = $CI->function_model->getCustomerDetailById($cust_id);
// 		return  $dataList;
// 	}
// }
/* nik 11-2-20 hgetUserDetailByCustId*/
// if(!function_exists('hgetUserDetailByCustId'))
// {
// 	function hgetUserDetailByCustId($cust_id=null,$field=null)
// 	{
// 		$CI = get_instance();
// 		$CI->load->model('function_model');
// 		$dataList = $CI->function_model->getUserDetailByCustId($cust_id,$field);
// 		return  $dataList;
// 	}
// }

/*  16-03-20 admin test1*/
if(!function_exists('hCheckRecordExistForLang'))
{
	function hCheckRecordExistForLang($id = NULL, $lang_name=null, $table=null)
	{
		$CI = get_instance();
		$CI->db->select("id");
        $CI->db->from($table);
        $CI->db->where(array('id'=>$id, "lang_type"=>$lang_name));
        $query = $CI->db->get();
		return $query->num_rows();
	}
}

/* nik 24-1-20 admin hgetCountrySelect*/
if(!function_exists('hgetCountrySelect'))
{
	function hgetCountrySelect($selCountryName = NULL)
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$dataList = $CI->function_model->getCountrySelect($selCountryName);
		return  $dataList;
	}
}
/* nik 24-1-20 admin hgetStateSelect*/
if(!function_exists('hgetStateSelect'))
{
	function hgetStateSelect($selCountryName = NULL,$selStateName = NULL)
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$dataList = $CI->function_model->getStateSelect($selCountryName,$selStateName);
		return  $dataList;
	}
}
/* nik 24-1-20 admin hgetCitySelect*/
if(!function_exists('hgetCitySelect'))
{
	function hgetCitySelect($selStateName = NULL,$selCityId = NULL)
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$dataList = $CI->function_model->getCitySelect($selStateName, $selCityId);
		return  $dataList;
	}
}
/* tarun 31-1-20 admin hgetCitySelectby name*/
if(!function_exists('hgetCitySelectbyname'))
{
	function hgetCitySelectbyname($selStateName = NULL,$selCityId = NULL)
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$dataList = $CI->function_model->getCitySelectname($selStateName, $selCityId);
		return  $dataList;
	}
}
/* nik 21-1-20 admin hgetSubCategoriesByCatIdCustId*/
if(!function_exists('hgetSubCategoriesByCatIdCustId'))
{
    function hgetSubCategoriesByCatIdCustId($catId=null,$custId=null)
    {
		$CI = get_instance();
        $CI->load->model('Function_model');
        $dataList = $CI->Function_model->getSubCategoriesByCatIdCustId($catId, $custId);
       	return  $dataList;
    }
}
/* nik 15-1-20 admin hmenuIdExitsInPrivilageArray*/
if(!function_exists('hmenuIdExitsInPrivilageArray'))
{
    function hmenuIdExitsInPrivilageArray($id=null)
    {
		$CI = get_instance();
        $CI->load->model('Function_model');
        $dataList = $CI->Function_model->menuIdExitsInPrivilageArray($id);
       	return  $dataList;
    }
}
/* nik 15-1-20 admin hcreatePrivilageSessForStaffLeftPanel*/
if(!function_exists('hcreatePrivilageSessForStaffLeftPanel'))
{
    function hcreatePrivilageSessForStaffLeftPanel()
    {
		$CI = get_instance();
        $CI->load->model('Function_model');
        $dataList = $CI->Function_model->createPrivilageSessForStaffLeftPanel();
       	return  $dataList;
    }
}
/* nik 14-1-20 admin hgetEnquiry*/
if(!function_exists('hgetEnquiry'))
{
    function hgetEnquiry()
    {
		$CI = get_instance();
        $CI->load->model('Function_model');
        $dataList = $CI->Function_model->getEnquiry();
       	return  $dataList;
    }
}
/* nik 14-1-20 admin hgetCountAppCustomers*/
if(!function_exists('hgetCountAppCustomers'))
{
    function hgetCountAppCustomers()
    {
		$CI = get_instance();
        $CI->load->model('Function_model');
        $dataList = $CI->Function_model->getCountAppCustomers();
       	return  $dataList;
    }
}
/* nik 14-1-20 admin hgetCountUnAppCustomers*/
if(!function_exists('hgetCountUnAppCustomers'))
{
    function hgetCountUnAppCustomers()
    {
		$CI = get_instance();
        $CI->load->model('Function_model');
        $dataList = $CI->Function_model->getCountUnAppCustomers();
       	return  $dataList;
    }
}
/* nik 14-1-20 admin hgetCountEmails*/
if(!function_exists('hgetCountEmails'))
{
    function hgetCountEmails()
    {
		$CI = get_instance();
        $CI->load->model('Function_model');
        $dataList = $CI->Function_model->getCountEmails();
       	return  $dataList;
    }
}
/* nik 14-1-20 admin hgetCountUsers*/
if(!function_exists('hgetCountUsers'))
{
    function hgetCountUsers()
    {
		$CI = get_instance();
        $CI->load->model('Function_model');
        $dataList = $CI->Function_model->getCountUsers();
       	return  $dataList;
    }
}


/** 
 * This function used to get the CI instance
 */
if(!function_exists('siteDetail'))
{
    function siteDetail()
    {
		 $CI = get_instance();
        $CI->load->model('Function_model');
        $siteRecord = $CI->Function_model->getsite_configInfo(1);
       
       return  $siteRecord[0];
    }
}

	// function show_page_list_for_header($prt)
	// {
	// 	$CI = get_instance();
	// 	$CI->load->model('Function_model');
	// 	$Show_header_list = $CI->Function_model->show_header_list($prt);
	// 	return  $Show_header_list;
	// }
	/*----------------------Start All category-------------------*/	
	// function show_list_for_header()
	// {
	// 	$CI = get_instance();
	// 	$CI->load->model('home_model');
	// 	$Show_list = $CI->home_model->show_left_category();
	// 	return  $Show_list;
	// }
	// function Sub_list_for_header($cat_id)
	// {
	// 	$CI = get_instance();
	// 	$CI->load->model('category');
	// 	$Show_Sub_list = $CI->category->show_sub_category($cat_id);
	// 	return  $Show_Sub_list;
	// }

	// function Next_Sub_list_for_header($cat_id)
	// {
	// 	$CI = get_instance();
	// 	$CI->load->model('category');
	// 	$next_sub_list = $CI->category->show_next_sub_category($cat_id);
	// 	return  $next_sub_list;
	// }
	/*----------------------End All category-------------------*/	
 // 	function get_package_name($type)
	// {
	// 	$CI = get_instance();
	// 	$CI->load->model('Function_model');
	// 	$package_detail = $CI->Function_model->package_detail($type);
	// 	return $package_detail;
	// }

 	function show_homepage_banner()
 	{
		$CI = get_instance();
		$CI->load->model('Function_model');
		$home_banner = $CI->Function_model->home_banner();
		return $home_banner;
	}

	/* nik 12 03 2020*/
	function hGetCountryFieldById($field, $id)
	{
		$CI = get_instance();
		$CI->load->model('Function_model');
		$data = $CI->Function_model->getCountryFieldById($field,$id);
		return $data;
	}
	
	function show_page_list($prt)
	{
		$CI = get_instance();
		$CI->load->model('Function_model');
		$page_list = $CI->Function_model->page_list($prt);
		return   $page_list;
	}	
	function show_img($pro_id) 
	{
		$CI = get_instance();
		$CI->load->model('Function_model');
		$show_pro_img = $CI->Function_model->show_product_image($pro_id);
		if($show_pro_img!=0)
			$show_pro_img = $show_pro_img[0]->photo;
		else
			$show_pro_img = '';
		return   $show_pro_img;
	}
	// function show_img_for_inq($pro_id) 
	// {
	// 	$CI = get_instance();
	// 	$qry_images="select photo from images where pro_id='".$pro_id."'";
	// 	$qry_images=$CI->db->query($qry_images);
	// 	$qry_images=$qry_images->result_array();
	// 	$pro_img=$qry_images[0]['photo'];
	// 	return $pro_img;
	// }
	/*remove manish
	function user_category($cust_id)
	{
		$CI = get_instance();
	 	$selQry="select * from cust_cat where cust_id='".$cust_id."' ";
		$count = $CI->db->query($selQry);
		$count = $count->result();
		$total=count($count);
		$cats="";
		if($total>0)
		{
			$data=$CI->db->query($selQry);
			$data=$data->result_array();
			$i=0;
			while($i<$total)
			{
				if($cats=="")
					$cats=category_detail_for_inq($data[$i]['cat_id'],"name");
				else
					$cats.=', '.category_detail_for_inq($data[$i]['cat_id'],"name");
					
				$i++;
			}
		}
		return $cats;
	}*/
	// function category_detail_for_inq($id,$field)
	// {
	// 	$CI = get_instance();
	// 	$selQry="select ".$field." from categories where deleted='N' and cat_id='".$id."'";
	// 	$data=$CI->db->query($selQry);
	// 	$data=$data->result();//echo $CI->db->last_query();
	// 	return $data[0]->$field;
	// }

	// /* Dated 13 02 2020 By Rajat*/
	// function getNameById($id, $conditionField, $field, $table)
	// {
	// 	$CI = get_instance();
	// 	$selQry="select ".$field." AS name from ".$table." where deleted='N' and ".$conditionField."='".$id."'";
	// 	$data=$CI->db->query($selQry);
	// 	$data=$data->result();//echo $CI->db->last_query();
	// 	return $data[0]->name;
	// }



	/*****------------country select-----------*/
	function country_select1($sel_country = NULL)
	{
		$CI = get_instance();
		$CI->load->model('function_model');

		$siteQry = $CI->function_model->country();
		$statedata = $siteQry->result();
		$drop="";
		$drop.='<select name="country" id="country" class="form-control" onchange="select_state(this.value);">
			     <option class="le-input">Select Country</option>';
		
		foreach($statedata as $key=>$val)
		{
			if($sel_country==$statedata[$key]->country)
				$drop.='<option value="'.$statedata[$key]->country.'" selected="selected" >'.$statedata[$key]->country.'</option>';
			else
				$drop.='<option value="'.$statedata[$key]->country.'" class="le-input">'.$statedata[$key]->country.'</option>';
		}
		$drop.='</select>';
		echo $drop;
	}
	/*****------------State select-----------*/
	function state_selected1($sel_country=NULL,$sel_state=NULL)
	{ 
	 	$CI = get_instance();
		$CI->load->model('function_model');
	 
	 	$siteQry = $CI->function_model->state($sel_country);

	  	$statedata=$siteQry->result();
		$drop = '';
		$drop.='<select name="state" id="state" onchange="state_selected1(this.value);" class="form-control">
			     <option value="" selected="selected" class="le-input">'.$CI->lang->line('1197_oth_lang').'</option>';
		 		
			foreach($statedata as $row)
			{
				if($sel_state==$row->state)
					$drop.='<option value="'.$row->state.'" selected="selected" class="le-input">'.$row->state.'</option>';
				else
					$drop.='<option value="'.$row->state.'" class="le-input">'.$row->state.'</option>';
			}
         
		$drop.='</select>';
		echo $drop;
	  
	}
	/*****------------city select-----------*/
	function city_select1($sel_state,$sel_city)
	{	
		$CI = get_instance();
		$CI->load->model('function_model');
	
	   $citydata=$CI->function_model->city($sel_state);
	   $citydata=$citydata->result();
	   // print_r($citydata);exit();
	   $drop = '';
	   $drop.='<select name="city" id="city"  onchange="city_selected1(this.value);" class="form-control">
							<option value="" selected="selected" class="le-input">'.$CI->lang->line('1198_oth_lang').'</option>';
					
		if($sel_state!="")
		{			
			foreach($citydata as $row)
			  {
				if($sel_city==$row->id)
					$drop.='<option value="'.$row->id.'" selected="selected" >'.$row->city.'</option>';
				else
					$drop.='<option value="'.$row->id.'">'.$row->city.'</option>';
			  }
		}
		$drop.='</select>';
		echo $drop;	
	}

	// function show_buyer_category($id=0)
	// {
	// 	$CI = get_instance();	
	// 	// $CI->load->model('Registration_model');
	// 	global $client;
	// 	$cats = "";
	// 	if($id==0)
	// 		$listingQry="select * from categories where status='Y' and deleted='N' and parent_id=0 and parent_sub_id=0  order by name asc ";
	// 	else
	// 		$listingQry="select categories.*,buyer_cat.user_id from categories left join buyer_cat on categories.cat_id=buyer_cat.cat_id and buyer_cat.user_id='".$id."' WHERE categories.status='Y' and categories.deleted='N' and categories.parent_id=0 order by categories.name asc";
		
	// 	// $fetchdata = $CI->registration_model->__callMasterquery($listingQry);
	// 	$fetchdata = $CI->db->query($listingQry);
	// 	// $fetchdata = $fetchdata->result();	

	// 	$total=$fetchdata->num_rows;
	// 	$categories=$fetchdata->result();
	// 	$cats.='<div class="main_list">';  
	// 	$i=0;
	// 	while($i<$total)
	// 	{
	// 		$cats.='<input type="checkbox" name="cat[]"  value="'.$categories[$i]->cat_id.'"  id="chk_'.$categories[$i]->cat_id.'" ';
	// 		if(isset($categories[$i]->user_id) && $categories[$i]->user_id!='')
	// 			$cats.='checked="checked"';
	// 		$cats.='onclick="showcats('.$categories[$i]->cat_id.');"/> '.$categories[$i]->name.'<br>
	// 					<div class="list" id="cat_'.$categories[$i]->cat_id.'"';
	// 		if(isset($categories[$i]->user_id) && $categories[$i]->user_id!='')
	// 			$cats.='style="display:block;"';
	// 		else
	// 			$cats.='style="display:none;"';
				
	// 		$cats.='>'.make_buyer_sub($categories[$i]->cat_id,$id).'</div>';
	// 		$i++;
	// 	}
	// 	$cats.='</div>';	
		
	// 	return $cats;
	// }

	function make_buyer_sub($id,$user_id=NULL)
	{	
		$CI = get_instance();	
		// $CI->load->model('Registration_model');
		
		if($user_id=="")
			$listingQry="select * from categories where deleted='N' and status='Y' and parent_id='".$id."' order by cat_id asc ";
		else
		{
			// $listingQry="select categories.*,buyer_cat.user_id from categories left join buyer_cat on categories.cat_id=buyer_cat.cat_id and buyer_cat.user_id='".$user_id."' WHERE categories.status='Y' and categories.deleted='N' and categories.parent_id='".$id."' order by categories.name asc";
		}	
		// $fetchdata = $CI->Registration_model->__callMasterquery($listingQry);
		$fetchdata = $CI->db->query($listingQry);
		// $fetchdata = $fetchdata->result();
		$cats="";
		if($fetchdata->num_rows)
		{
			$userdata=$fetchdata->result();
			$total=$fetchdata->num_rows;
			while($total>0)
			{
				$total--;
				
				$cats.='<input type="checkbox" name="sub_cat[]" value="'.$userdata[$total]->cat_id.'" id="chk_'.$userdata[$total]->cat_id.'" ';
				if(isset($userdata[$total]->user_id) && $userdata[$total]->user_id!="")
					$cats.='checked="checked"';
					$cats.='onclick="showcats('.$userdata[$total]->cat_id.');" /> '.$userdata[$total]->name.'<br>
					<div class="list" id="cat_'.$userdata[$total]->cat_id.'" ';
					
					if(isset($userdata[$total]->user_id) && $userdata[$total]->user_id=="")
					$cats.='style="display:none;"';
					else
					$cats.='style="display:block;"';
					
					$cats.='>  '.make_buyer_sub($userdata[$total]->cat_id,$user_id).' </div>'; 
			}
		}
		return $cats;
	}

	/* remove
	function show_package_name($pack_type)
	{
		$CI = get_instance();	
		$CI->load->model('function_model');
		$package_qry_data=$CI->function_model->show_package_name($pack_type);
	
		$package_name=$package_qry_data->package_name;
		  return $package_name;
	} */

	function chk_email_ofoff()
	{
		$CI = get_instance();	
		$CI->load->model('function_model');
		// global $objSmarty;
		$show_page=$CI->function_model->conformatioemail();
		$list_page=$show_page->row();
		if($list_page->conformatioemail_onoff=='on')
			return 1;
		if($list_page->conformatioemail_onoff=='off')
			return 0;	
	}
	/***************show myaccount********************/
	function user_detail($id,$field)
	{ 
		$CI = get_instance();	
		$CI->load->model('function_model');
		$selQry=$CI->function_model->user_detail($id,$field);
		return $selQry;
	}
	function get_seller_detail($cus_id)
	{ 
		$CI = get_instance();	
		$CI->load->model('function_model');
		$sub_domain_qry1=$CI->function_model->user_seller_detail($cus_id);
		// print_r($sub_domain_qry1);exit;
	    return $sub_domain_qry1;  
	}
	function get_subdomain_video($cust_id)
	{ 
		$CI = get_instance();	
		$CI->load->model('function_model');

	 	$sub_domain_video_qry=$CI->function_model->subdomain_video($cust_id);
	    $SUB_DOMIN_VIDEO_DETAILS = $sub_domain_video_qry->row();
	    // echo $SUB_DOMIN_VIDEO_DETAILS->whatsapp_onoff;exit();
		return $SUB_DOMIN_VIDEO_DETAILS;     
	}

	function get_subdomain($cus_id)
	{ 
		$CI = get_instance();	
		$CI->load->model('function_model');
		$sub_domain_qry=$CI->function_model->sub_domain_qry($cus_id);
		$sub_domain_data = $sub_domain_qry->row();
		return $sub_domain_data;
	}
	function getProductCompanyDetail($ser_id)
	{
			
			$CI = get_instance();	
			$CI->load->model('function_model');

		    $service_query=$CI->function_model->Product_Company_Detail($ser_id);
			$service_query_data=$service_query->row();
			return $service_query_data;		
	}
	
	/*------------Email_info----------------*/
	// call for email information
	function Email_Info($id)
	{
		$CI= get_instance();
		$CI->load->model('function_model');
		$selQry=$CI->function_model->email($id);	
		$maildata=$selQry->row();
		return $maildata;
	}

	/*=================validate captcha==================*/
	function validateCaptcha($captcha)
	{
		$CI = get_instance();
        // $CI->load->model('category');
		 $security_code = strtoupper($captcha);
		 $to_check = md5($security_code);
		 $security_code = $CI->session->userdata('security_code');
		if($to_check == $security_code)
		{
		 	return true;
		}
		else
		{
		return false;
		}
	}

	/*==============Send mail==================*/
	function SendMail($from,$title,$to,$subject,$message)
	{
		$CI = get_instance();
		$CI->load->config('Globvariable');
		$smtp_port = $CI->config->item('smtp_port');
		$smtp_secure = $CI->config->item('smtp_secure');
		$smtp_host = $CI->config->item('smtp_host');
		$smtp_user_name = $CI->config->item('smtp_user_name');
		$smtp_password = $CI->config->item('smtp_password');

		$config['protocol']    = 'smtp';
	    $config['smtp_host']    = $smtp_host; //'ssl://smtp.gmail.com';
	    $config['smtp_port']    = $smtp_port; //'465';
	    $config['smtp_timeout'] = '60';
	    $config['smtp_user']    = $smtp_user_name;
	    $config['smtp_pass']    = $smtp_password;
	    $config['charset']    = 'utf-8';
	    $config['newline']    = "\r\n";
	    $config['mailtype'] = 'text'; // or html
	    $config['validation'] = TRUE; // bool whether to validate email or not      

    	$CI->email->initialize($config);

		$CI->email->from($from, $title);
		$CI->email->to($to);
		$CI->email->subject($subject);
		$CI->email->message($message);
		$result = $CI->email->send();
		return $result;
	}

	//=================================show mail status in header=======================================//
	function show_unread_mails($id,$pro_id)
	{
		$CI = get_instance();
        $CI->load->model('function_model');	
	 	$listingQry=$CI->function_model->unread_mails($id,$pro_id);
	 	// print_r($listingQry->result());exit();
			$unred_count=$listingQry->result();
			$result=$unred_count[0]->id;
			return $result;
	}

	/*=========get currency symbol=================*/
	// function getCurrencySyomble($id)
	// {	
	// 	$CI = get_instance();
 //        $CI->load->model('function_model');	
	// 	$currency=$CI->function_model->currencySymbol($id); 
	// 	$currSyomble=$currency->row();
	// 	return $currSyomble->symbol;
	// }

	/*======== stripslesh ===========*/
	function stripslesh($str)
	{
		return stripcslashes($str);
	}
	/*=============meta detail===============*/
	/* remove
	function meta_detail($id,$field,$type)
	{
		$CI = get_instance();
        $CI->load->model('function_model');	
		$selQry=$CI->function_model->show_meta_detail($id,$field,$type);
		if($selQry)
			return $selQry[0]->$field;
		else
			return '';
	} */
	/*===============show user category=========================*/
	function show_user_category($cust_id)
	{
		
		$CI = get_instance();
	    $CI->load->model('category');
	    $siteRecord = $CI->category->get_client_category_new($cust_id);

			$allCats='';
			foreach($siteRecord as $cname)
			{
				if($cname->name !='')	
				{
				if($allCats=="")
					$allCats.=$cname->name;
				//$allCats .='';	
				else
					$allCats.=', '.$cname->name;
				}
			}
			
		return $allCats;
	}
	function user_certification($user_certification)
	{
		$CI = get_instance();
		$CI->load->config('Globvariable');
		$certification = $CI->config->item('gCertification');

		$cer=explode(',',$user_certification);
		$str="";
		foreach($cer as $key=>$val)
		{
			if($str=='')
				$str=$certification[$val];
			else
				$str.=', '.$certification[$val];
		}
		// print_r($str);exit();
		return $str;
	}

	function get_image($path,$image,$size)
	{
		$site_url = base_url();
		
		if($image=="")
			$image="empty";
		if(file_exists('.'.$path.$image))
			$imageinfo=getimagesize('.'.$path.$image);
		$width=$imageinfo[0];
		$height=$imageinfo[1];
		
		if($size<=$width && $size<=$height)
		{
			if($width<=$height)
			{
				$iheight=$size;
				$per=($size/$height)*100;
				$iwidth=($per*$width)/100;
			}
			else if($height<=$width)
			{
				$iwidth=$size;
				$per=($size/$width)*100;
				$iheight=($per*$height)/100;
			}
		}
		else if($size<=$width && $size>=$height)
		{
			$iwidth=$size;
			$per=($size/$width)*100;
			$iheight=($per*$height)/100;
		}
		else if($size<=$height && $size>=$width)
		{
			$iheight=$size;
			$per=($size/$height)*100;
			$iwidth=($per*$width)/100;
		}
		else if($size>=$height && $size>=$width)
		{
			$iheight=$height;
			$iwidth=$width;
		}
		//echo $iheight.'//'.$iwidth;
		return '<img src="'.$site_url.$path.$image.'" class="img-responsive"/>';
	}

	/*=====================Sub Categories edit_company_profile====================*/
	function subcateforsearch($sel_country,$userId=NULL)
   	{
	 
		$CI = get_instance();
		$CI->load->model('function_model');
		
		$drop = '';

		$drop.='<div id="sell_cat_drop" ><select  multiple name="cat[]" class="multipleSelect" id="catgoryid">';

		$statedata = $CI->function_model->categorie_name();
		foreach($statedata as $key=>$val)
		{	
			if($userId!="")
			{
				
				$nextData=$CI->function_model->show_customer_field($userId,'next_cat_id');
		
				$catData=explode(',',$nextData[0]->next_cat_id);
		
			
				if(in_array($statedata[$key]->cat_id,$catData))
				{
					$drop.='<option selected value="'.$statedata[$key]->cat_id.'">'.$statedata[$key]->name.'</option>';
				}
				else
					$drop.='<option value="'.$statedata[$key]->cat_id.'">'.$statedata[$key]->name.'</option>';
			}
		}
		
		$drop.='</select></div>';
		return $drop;
	}

	function reg_yrs($sel)
	{
		$CI = get_instance();
		$CI->load->config('Globvariable');
		$reg_yrs = $CI->config->item('gRegYrs');
		$drop = '';
		$drop.='<select name="reg_yrs" class="form-control">
					<option value="" selected="selected">'.$CI->lang->line('136_oth_lang').'</option>';
		
		foreach($reg_yrs as $key=>$val)
		{
			if($sel==$val)
				$drop.='<option value="'.$val.'" selected="selected">'.$val.'</option>';
			else
				$drop.='<option value="'.$val.'">'.$val.'</option>';
		}
		$drop.='</select>';
		return $drop;
	}

	function emp_det($sel)
	{
		$CI = get_instance();
		$CI->load->config('Globvariable');
		$emp_det = $CI->config->item('gEmpDet');

		$drop = '';
		$drop.='<select name="emp_det" class="form-control">
					<option value="" selected="selected">'.$CI->lang->line('136_oth_lang').'</option>';
		
		foreach($emp_det as $key=>$val)
		{
			if($sel==$val)
				$drop.='<option value="'.$val.'" selected="selected">'.$val.'</option>';
			else
				$drop.='<option value="'.$val.'">'.$val.'</option>';
		}
		$drop.='</select>';
		return $drop;
	}

	function own_type($sel)
	{
		$CI = get_instance();
		$CI->load->config('Globvariable');
		$own_type = $CI->config->item('gOwnType');
		$drop = '';
		$drop.='<select name="own_type" class="form-control">
					<option value="" selected="selected">'.$CI->lang->line('136_oth_lang').'</option>';
		
		foreach($own_type as $key=>$val)
		{
			if($sel==$val)
				$drop.='<option value="'.$val.'" selected="selected">'.$val.'</option>';
			else
				$drop.='<option value="'.$val.'">'.$val.'</option>';
		}
		$drop.='</select>';
		return $drop;
	}

	function certification($sel)
	{
		// echo $sel; exit();
		$CI = get_instance();
		$CI->load->config('Globvariable');
		$certification = $CI->config->item('gCertification');

		$sel = explode(',', $sel);
		$cer_list = '';
		$cer_list.='<table cellpadding="2" cellspacing="2" border="0" width="100%">';
		
		foreach($certification as $key=>$val)
		{
			// echo $key;
			$isval= in_array($key, $sel);

			// echo $isval;
			if($isval==true)
				$cer_list.='<tr><td><input type="checkbox" name="certification[]" value="'.$key.'" checked="0"/></td><td>'.$val.'</td></tr>';
			else
				$cer_list.='<tr><td><input type="checkbox" name="certification[]" value="'.$key.'" /></td><td>'.$val.'</td></tr>';
		}
		$cer_list.='</table>';
		return $cer_list;
	}

	/*===========Replace word with gloabal value=============*/
	// function replace_word($rep_str)
	// {	
	// 	// global $web_name;
	// 	$web_name ='web_name';
	// 	$rep_str=str_replace('indiamart',$web_name,$rep_str);
	// 	$rep_str=str_replace('tradeindia',$web_name,$rep_str);
	// 	$rep_str=str_replace('b2bb2b','b2b',$rep_str);
	// 	return $rep_str;
	// }

	/*===========get flage img=============*/
	function flageimage($country)
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$image=$CI->function_model->flage($country);
		$flagename=$image->row();
		return $flagename->flage;
	}
	/* remove by RS function catname2_url($id)
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$listingQry=$CI->function_model->category2($id);
		$catlist=$listingQry->row();
		$cat_name=spacial_chr_blank($catlist->cat_name);
		$exname=explode(' ',$cat_name);
		$rename="";
		foreach($exname as $key=>$val)
		{
			if($rename=="")
				$rename=strtolower($exname[$key]);
			else
			{
				$rename.='-'.strtolower($exname[$key]);
				$rename=str_replace('--','-',$rename);
			}
		}
		return $rename;
	} */
	function catname_url($id)
	{
		$CI = get_instance();
		$CI->load->model('function_model');

 	 	$listingQry=$CI->function_model->categories($id);

		$catlist=$listingQry->row();
		if($listingQry->num_rows>0)
		{
			$cat_name=spacial_chr_blank($catlist->name);
			$exname=explode(' ',$cat_name);

			$rename="";
			foreach($exname as $key=>$val)
			{
				if($rename=="")
					$rename=strtolower($exname[$key]);
				else
				{
					$rename.='-'.strtolower($exname[$key]);
					$rename=str_replace('--','-',$rename);
				}
			}
			return accentRemoval($cat_name);
		}
		else
		{
			return "";
		}
		
		
	}
	/*------------------spacial chr blank -----------------*/
	function spacial_chr_blank($cat_name)
	{	
		$cat_name=str_replace('  ',' ',$cat_name);
		$cat_name=str_replace('&','',$cat_name);
		$cat_name=str_replace(',','',$cat_name);
		$cat_name=str_replace('.','',$cat_name);
		$cat_name=str_replace('(','',$cat_name);
		$cat_name=str_replace(')','',$cat_name);
		$cat_name=str_replace('*','',$cat_name);
		$cat_name=str_replace('+','',$cat_name);
		$cat_name=str_replace('=','',$cat_name);
		$cat_name=str_replace('%','',$cat_name);
		$cat_name=str_replace('#','',$cat_name);
		$cat_name=str_replace('/','',$cat_name);
		$cat_name=str_replace('\\','',$cat_name);
		$cat_name=str_replace(':','',$cat_name);
		$cat_name=str_replace('-','',$cat_name);
		$cat_name=str_replace("'",'',$cat_name);
		$cat_name=str_replace("|",'',$cat_name);
		$cat_name=str_replace("!",'',$cat_name);
		$cat_name=str_replace("?",'',$cat_name);
		$cat_name=str_replace(";",'',$cat_name);
		$cat_name=str_replace("$",'',$cat_name);
		$cat_name=str_replace("^",'',$cat_name);
		$cat_name=str_replace('@','',$cat_name);
		$cat_name=str_replace('"','',$cat_name);
		$cat_name=str_replace(' ','_',$cat_name);
		return $cat_name;
	}
	/*------------------product name url -----------------*/
	function productname_url($id)
	{
		$CI = get_instance();
		$CI->load->model('function_model');

		/* remove by RS $listingQry=$CI->function_model->products($id);*/
		$clientlist=$listingQry->row();
		
		 $listingQry=$CI->function_model->customer_category($clientlist->cust_id,0);
		 if($listingQry->num_rows==0)
		 {
			 $listingQry=$CI->function_model->customer_category($clientlist->cust_id,0);
		 }
		$catlist=$listingQry->row();
		$catname=catname_url($catlist->cat_id);
		
		$client_name=spacial_chr_blank($clientlist->pro_name);
		
		$exname=explode(' ',$client_name);
		$rename="";
		foreach($exname as $key=>$val)
		{
			if($rename=="")
				$rename=strtolower($exname[$key]);
			else
			{
				$rename.='-'.strtolower($exname[$key]);
				$rename=str_replace('--','-',$rename);
			}
		}
		return $catname.'/'.$rename;
	}
	/*------------------accentromve -----------------*/
	function accentRemoval($str)
	{ 
		$unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', ':'=>'-', '/'=>'_' );
		return $str = strtr( $str, $unwanted_array );
	}

   /*========select category files===========*/
   function category_detail($id)
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$selQry=$CI->Function_model->categories($id);
		$data=$selQry->row();
		return $data;
	}
	/*=====star rating view of feddbacl=================*/
	function ShowAverageratingstar($val)
	{
		//global $objSmarty,$site_url,$functions;
		
		$aa='<div class="col-sm-10">';
      if($val==5)
	  {
		  $aa.='<div class="review-block-rate">
				<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
				<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
				<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
				<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
				<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
				</div>';
		}
		if($val>'4' && $val<5 )
		{
		$aa.='		<div class="review-block-rate">
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-half-o" aria-hidden="true"></i> </button>
					</div>';
		}
		if($val=='4')
		{
		$aa.='	<div class="review-block-rate">
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
		</div>';
		}
		if($val>'3' && $val<4 )
		{
		$aa.='		<div class="review-block-rate">
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-half-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
					</div>';
		}
		
		if($val==3)
		{
		$aa.='		<div class="review-block-rate">
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
					</div>';
		}
		
		if($val>'2' && $val<3 )
		{
		$aa.='		<div class="review-block-rate">
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <i class="fa fa-star" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-half-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i></button>
					</div>';
		}
		
		if($val==2)
		{
		$aa.='	<div class="review-block-rate">
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
					</div>';
		}
		
		if($val>'1' && $val<2 )
		{
		$aa.='		<div class="review-block-rate">
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-half-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
					</div>';
		}
            if($val==1)
		{
		$aa.='	<div class="review-block-rate">
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
					</div>';
		}
		  $aa.="</div>";
		echo $aa;
	}
	/*==========get file extension=============*/
	 function getExtension($str) 
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l); 
		return $ext;
	}
	/*========get badge details=================*/
	/* remove by RS function getbadgedetail($id)
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$badgeqry=$CI->function_model->badgedetails($id);
		$badgedata=$badgeqry->result();
		return $badgedata;
	} */

	/*=-=-=-=-=-=-=-=-=valid input data-=-=-=-=--=-=-=-=-=-=-=-=*/
	function valid_input_data($search_str, $type='A')
	{	
		
		if($type=='A')
		{
			
			//$search_str = preg_replace('!,+!', '', $search_str); // remove repeated special characters
			$search_str = preg_replace('#<(.*?)script(.*?)>(.*?)<(.*?)/script(.*?)>#is', '', $search_str);
			$search_str=str_replace('  ',' ',$search_str);
			$search_str=str_replace('&','',$search_str);
			$search_str=str_replace(',','',$search_str);
			$search_str=str_replace('.','',$search_str);
			$search_str=str_replace('(','',$search_str);
			$search_str=str_replace(')','',$search_str);
			$search_str=str_replace('*','',$search_str);
			$search_str=str_replace('+','',$search_str);
			$search_str=str_replace('=','',$search_str);
			$search_str=str_replace('%','',$search_str);
			$search_str=str_replace('#','',$search_str);
			$search_str=str_replace('/','',$search_str);
			$search_str=str_replace('\\','',$search_str);
			$search_str=str_replace(':','',$search_str);
			$search_str=str_replace('-','',$search_str);
			$search_str=str_replace("'",'',$search_str);
			$search_str=str_replace("|",'',$search_str);
			$search_str=str_replace("!",'',$search_str);
			$search_str=str_replace("?",'',$search_str);
			$search_str=str_replace(";",'',$search_str);
			$search_str=str_replace("$",'',$search_str);
			$search_str=str_replace("^",'',$search_str);
			$search_str=str_replace('@','',$search_str);
			$search_str=str_replace('"','',$search_str);
			$search_str=str_replace('','_',$search_str);
			$search_str=str_replace('<','',$search_str);
			$search_str=str_replace('>','',$search_str);
			$search_str=str_replace('{','',$search_str);
			$search_str=str_replace('}','',$search_str);
			$search_str=str_replace('[','',$search_str);
			$search_str=str_replace(']','',$search_str);
			$search_str=str_replace('`','',$search_str);
			$search_str=str_replace('_','',$search_str);
			$search_str=str_replace('~','',$search_str);			
			$search_str=str_replace("PHP",'',$search_str);
			$search_str=str_replace("PHP3",'',$search_str);
			$search_str=str_replace("javascript",'',$search_str);
			$search_str=str_replace("script",'',$search_str);
		}
		if($type=='B')
		{
			//$search_str = preg_replace('!,+!', '', $search_str); // remove repeated special characters
			$search_str = preg_replace('#<(.*?)script(.*?)>(.*?)<(.*?)/script(.*?)>#is', '', $search_str);
			$search_str=str_replace(";",' ',$search_str);
			$search_str=str_replace("$",' ',$search_str);
			$search_str=str_replace('=',' ',$search_str);
			$search_str=str_replace("'",' ',$search_str);
			$search_str=str_replace("!",' ',$search_str);
			$search_str=str_replace("?",' ',$search_str);
			$search_str=str_replace("<",' ',$search_str);
			$search_str=str_replace(">",' ',$search_str);
			
			$search_str=str_replace("PHP",'',$search_str);
			$search_str=str_replace("PHP3",'',$search_str);
			$search_str=str_replace("javascript",'',$search_str);
			$search_str=str_replace("script",'',$search_str);

		}
		
		
		if($type=='C')  //Editor validation
		{
			//$search_str = preg_replace('!,+!', '', $search_str); // remove repeated special characters
			$search_str=str_replace("$",' ',$search_str);
			$search_str=str_replace("!",' ',$search_str);
			$search_str=str_replace("?",' ',$search_str);
			
			$search_str=str_replace("PHP",'',$search_str);
			$search_str=str_replace("PHP3",'',$search_str);
			$search_str=str_replace("javascript",'',$search_str);
			$search_str=str_replace("script",'',$search_str);
		}
		
		return $search_str;
	}

	/*=========show sub category=============*/
	function show_sub_cate($id)
	{
		$CI = get_instance();
		$CI->load->model('function_model');

		$selQry=$CI->function_model->categoriesWithparent($id);
		
		$subCats=$selQry->result();
	
		return $subCats;
	}

	/*=========show next sub category=============*/
    function show_next_sub_cate($id,$type)//seller category
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$selQry=$CI->function_model->categoriesWithparent($id,$type);
		$subCats=$selQry->result();
		return $subCats;
	}

	/*============show seller total  rating===========================*/
	// function show_totalsellerRating($id)
	// {
	// 	$CI = get_instance();
	// 	$CI->load->model('function_model');
	//  	$fetchdata=$CI->function_model->sellerFeedback($id);
	// 	$result=$fetchdata->row();
	// 	$total_id=$result->id;
	// 	$total_star=$result->total_star;
	// 	if($total_star>0)
	// 	{
	// 		$abc=$total_star/$total_id;
	// 		if($abc!=0)
	// 		return $abc;
	// 		else 
	// 		return 0;
	// 	}
	// 	else
	// 	{
	// 		return 0;
	// 	}
	// }
	/*=======get customer contry flage====*/
	// function get_flage_country($cust_id)
 //   	{	
	// 	$CI = get_instance();
	// 	$CI->load->model('function_model');
	//  	$fetchdata=$CI->function_model->show_customer_field($cust_id,'country');
	//    	$country=$fetchdata[0]->country;

	// 	$social=$CI->function_model->flage($country);
	// 	$show_banner=$social->row();
		
	// 	if($show_banner->flage)
	// 	  return $show_banner->flage;
	//   	else 
	// 	  return "-";
	//  return $flage_country;
 //   	}
	/*------------------Category Name-----------------*/
	// function cate_name($cat_id)
 //    {
 //   	  $CI = get_instance();
 //   	  $CI->load->model('function_model');
	//   $sql=$CI->function_model->categories($cat_id);
	//   $cate_name=$sql->row();
	 
	//   if($cate_name->name!="")
	// 	  return $cate_name->name;
	//   else 
	// 	  return "-";	  
 //    }
	/*============get category drop down=================*/
	function getMainCategoryDropdownFromCategories($sel_id,$type)
	{ 	//echo $type;exit();
		$drop = "";
		$CI = get_instance();
		$CI->load->model('function_model');

	
		    $statedata=$CI->function_model->getCategoryForDropdown($type);
				
			$drop.='<select name="id" id="select_main_catgory" onchange="getSubCategoryDropdownCategory(this.value);" class="form-control">';
			$drop.='<option value="" selected="selected">'.$CI->lang->line('136_oth_lang').'</option>';
			foreach($statedata as $key=>$val)
			{
				
				if($sel_id==$val->cat_id)
					$drop.='<option value="'.$val->cat_id.'" selected="selected">'.$val->name.'</option>';
				else
				$drop.='<option value="'.$val->cat_id.'">'.$val->name.'</option>';
			}
			
			$drop.='</select>';
			return $drop;
		
	}

	// function getMainCategoryDropdown($sel_id = NULL)
	// { 
	// 	$drop = "";
	// 	$CI = get_instance();
	// 	$CI->load->model('function_model');
	// 	$category_data = $CI->function_model->CategoryForDropdown();
	// 	// $fetchdata = $CI->function_model->CategoryForDropdowns($sel_id);
	// 	//print_r($category_data);
	// 	$drop.='<select name="select_main_catgory" id="select_main_catgory" onchange="getSubCategoryDropdown1(this.value);" class="form-control" required>';
	// 	// chang this line nik 30-1-20 for admin classified_type
	// 	// $drop.='<option value="'.$fetchdata[0]->category.'" selected="selected">Please Select</option>';
	// 	$drop.='<option value="" selected="selected">Please Select</option>';
	// 	foreach($category_data as $key=>$val)
	// 	{
	// 		if($sel_id==$val->id)
	// 			$drop.='<option value="'.$val->id.'" selected="selected">'.$val->category_name.'</option>';
	// 		else
	// 			$drop.='<option value="'.$val->id.'">'.$val->category_name.'</option>';
	// 	}
	// 	$drop.='</select>';
	// 	echo $drop;
	// }
	/*============get category drop down=================*/ 
	/* remove
	function getSubCategoryDropdown($sel_id,$main_cat_id)
	{ 
		$drop = "";
		$CI = get_instance();
		$CI->load->model('function_model');
		$statedata = $CI->function_model->SubCategoryDropdown($main_cat_id);
		//echo $CI->db->last_query();//exit();
		$drop.='<select name="select_sub_catgory" id="select_main_catgory" onchange="getSubnextdropdowntype($this.value);" class="form-control">';
		$drop.='<option value="" selected="selected">'.$CI->lang->line('1240_oth_lang').'</option>';
		if($main_cat_id!='')
		{
			foreach($statedata as $key=>$val)
			{
				if($sel_id==$val->id)
					$drop.='<option value="'.$val->id.'" selected="selected">'.$val->category_name.'</option>';
				else
					$drop.='<option value="'.$val->id.'">'.$val->category_name.'</option>';
			}
		}
			$drop.='</select>';
			echo $drop;
	} */
	function get_last_msg($msg_id,$rec_user_id)
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$query=$CI->function_model->getlastmsg($msg_id,$rec_user_id);
		return $query->message;
	}
	function get_last_msg_id($msg_id,$recv_id)
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$query= $CI->function_model->getlastmsgid($msg_id,$recv_id);
		return $query->id;
	}
	function get_rand_letters($length)
	{
		if($length>0) 
		{ 
			$rand_id="";
			for($i=1; $i<=$length; $i++)
			{
				mt_srand((double)microtime() * 1000000);
				$num = mt_rand(1,26);
				$rand_id .= assign_rand_value($num);
			}
		}
		return $rand_id;
	}
	function assign_rand_value($num)
	{
		// accepts 1 - 36
	  	switch($num)
	  	{
		    case "1":
		     $rand_value = "a";
		    break;
		    case "2":
		     $rand_value = "b";
		    break;
		    case "3":
		     $rand_value = "c";
		    break;
		    case "4":
		     $rand_value = "d";
		    break;
		    case "5":
		     $rand_value = "e";
		    break;
		    case "6":
		     $rand_value = "f";
		    break;
		    case "7":
		     $rand_value = "g";
		    break;
		    case "8":
		     $rand_value = "h";
		    break;
		    case "9":
		     $rand_value = "i";
		    break;
		    case "10":
		     $rand_value = "j";
		    break;
		    case "11":
		     $rand_value = "k";
		    break;
		    case "12":
		     $rand_value = "l";
		    break;
		    case "13":
		     $rand_value = "m";
		    break;
		    case "14":
		     $rand_value = "n";
		    break;
		    case "15":
		     $rand_value = "o";
		    break;
		    case "16":
		     $rand_value = "p";
		    break;
		    case "17":
		     $rand_value = "q";
		    break;
		    case "18":
		     $rand_value = "r";
		    break;
		    case "19":
		     $rand_value = "s";
		    break;
		    case "20":
		     $rand_value = "t";
		    break;
		    case "21":
		     $rand_value = "u";
		    break;
		    case "22":
		     $rand_value = "v";
		    break;
		    case "23":
		     $rand_value = "w";
		    break;
		    case "24":
		     $rand_value = "x";
		    break;
		    case "25":
		     $rand_value = "y";
		    break;
		    case "26":
		     $rand_value = "z";
		    break;
		    case "27":
		     $rand_value = "0";
		    break;
		    case "28":
		     $rand_value = "1";
		    break;
		    case "29":
		     $rand_value = "2";
		    break;
		    case "30":
		     $rand_value = "3";
		    break;
		    case "31":
		     $rand_value = "4";
		    break;
		    case "32":
		     $rand_value = "5";
		    break;
		    case "33":
		     $rand_value = "6";
		    break;
		    case "34":
		     $rand_value = "7";
		    break;
		    case "35":
		     $rand_value = "8";
		    break;
		    case "36":
		     $rand_value = "9";
		    break;
  		}
		return $rand_value;
	}
	// function cust_detail($id,$field) 
	// {
	// 	$CI = get_instance();
	// 	$CI->load->model('function_model');
	// 	$query= $CI->function_model->get_cust_detail($id,$field);
	// 	return $query;
	// }
	function guest_detail($id,$field)
	{
		$CI = get_instance();
		$CI->load->model('function_model');
		$query= $CI->function_model->get_field_guest_enquiry($id,$field);
		return $query;
	}
    function Get_latitude_longitude($city_name)
	{
		$CI = get_instance();
		$langlongQry="select city_latitude,city_longitude from  country where city='".$city_name."' and status='Y' and deleted='N' ";
		$query = $CI->db->query($langlongQry);
		$show_lang_long = $query->row();
		return $show_lang_long;
	}
	function make_sub($id,$cust_id=NULL)
	{	
		$CI = get_instance();
		
		if($cust_id=="")
			$listingQry="select * from categories where deleted='N' and status='Y' and parent_id='".$id."' order by name desc ";
		else
		{		
			$listingQry="select categories.*,cust_cat.cust_id from categories left join cust_cat on categories.cat_id=cust_cat.cat_id and cust_cat.cust_id='".$cust_id."' WHERE categories.status='Y' and categories.deleted='N' and categories.parent_id='".$id."' order by categories.name desc";
		}	
			$userdata = $CI->db->query($listingQry);
		$cats="";
			
		$userdata= $userdata->result();
		$total= count($userdata); 
		while($total>0)
		{
			$total--;
			
			$cats.='<input type="checkbox" name="sub_cat[]" value="'.$userdata[$total]->cat_id.'" id="chk_'.$userdata[$total]->cat_id.'" ';
			if($userdata[$total]->cust_id!="")
				$cats.='checked="checked"';
				$cats.='onclick="showcats('.$userdata[$total]->cat_id.');" /> '.$userdata[$total]->name.'<br>
				<div class="list" id="cat_'.$userdata[$total]->cat_id.'" ';
				
				if($userdata[$total]->cust_id=="")
				$cats.='style="display:none;"';
				else
				$cats.='style="display:block;"';
				
				$cats.='>  '.make_sub($userdata[$total]->cat_id,$cust_id).' </div>'; 	
		}
		
		return $cats;
	}
	/* remove by RS function show_sellerStar($id,$star)
	{
		$CI = get_instance();
	 	$listingQry="select count(id) id from seller_feedback where seller_id='".$id."' and star='".$star."' ";
		$unred_count=$CI->db->query($listingQry);
		$unred_count=$unred_count->result_array();
		$result=$unred_count[0]['id'];
		return $result;
	} 
	function get_sellerFeedback($id)
 	{	$CI = get_instance();
		$qry="select * from seller_feedback where deleted='N' and seller_id='".$id."'"; 
		$feedback_data=$CI->db->query($qry);
		$feedback_data=$feedback_data->result();
		return $feedback_data;
	}
	function feedback_seller_chk($seller_id,$user_id)
	{
		$CI = get_instance();
		$listingQry="select id from seller_feedback where seller_id='".$seller_id."' and user_id='".$user_id."' ";
		$CI->db->query($listingQry);
		if($CI->db->num_rows)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}*/
	function all_product_cate()
	{	
		$CI = get_instance();
		$CI->load->model('function_model');
		if(isset($_GET['main_cat_id']))
			$main_cat_id = $_GET['main_cat_id']; 
        else
			$main_cat_id = 0;      
		
		if(isset($_GET['parent_sub_id']))
			$parent_sub_id = $_GET['parent_sub_id']; 
        else
        	$parent_sub_id = 0;    
		
		if (isset($_REQUEST['type']))
		{
			$cattype=" and cat_type='".$_REQUEST['type']."'";
			$data['cattype']= $cattype;
			$data['type']= $_REQUEST['type'];		
		}
		else{
			$cattype="";
		}
		$catqry="select * from categories where parent_id=0  and parent_sub_id='0' and status='Y' and deleted='N' ".$cattype."  group by name order by  name asc limit 0,16";
		$query = $CI->function_model->__callMasterquery($catqry);

		if($query->num_rows() > 0)
		{
			$product_catlist=$query->result();
			$data['product_catlist'] = $product_catlist;
		}
		
		$catqry1="select * from categories where parent_id='".$main_cat_id."' and parent_sub_id='".$parent_sub_id."' and status='Y' and deleted='N' ".$cattype."  group by name order by  name  ";
		$query1 = $CI->function_model->__callMasterquery($catqry1);
		if($query1->num_rows() > 0)
		{
			$product_catlist1=$query1->result();
			$data['product_catlist1'] = $product_catlist1;
            $data['main_cat_id'] = $main_cat_id;
            $data['parent_sub_id'] = $parent_sub_id;
		}
		// print_r($data);exit();
		return $data;
	}
	function client_category_new($id)
	{
		$CI = get_instance();
	    $CI->load->model('Category');
	    $siteRecord = $CI->Category->get_client_category_new($id);

			$allCats='';
			foreach($siteRecord as $cname)
			{
				if($cname->name !='')	
				{
				if($allCats=="")
					$allCats.='<span class="tags">'.$cname->name.'</span>';
				//$allCats .='';	
				else
					$allCats.='&nbsp;<span class="tags">'.$cname->name.'</span>';
				}
			}
			
		return $allCats;
	}
?>