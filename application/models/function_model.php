<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Function_model extends CI_Model
{
	/*==================show Gallery Image=========================*/
	function getImageGalleryByCustId($cust_id)
	{
		$this->db->select('id,img_name');
		$this->db->from('image_gallery');
		$this->db->where('deleted','N');
		$this->db->where('cust_id',$cust_id);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result();	
	}
	/***********users detail*************/
	function getCustomerDetailById($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->row();
	}
	/***********user_detail*************/
	function getUserDetailByCustId($id,$field)
	{
		$this->db->select($field.' as field');
		$this->db->from('users');
		$this->db->where('id',$id);
		$query=$this->db->get();
		$dataField = $query->row();
		return $dataField->field;
	}
	
	function getCountrySelect($selCountryName = null)
	{
		$this->db->select("country, id");
        $this->db->where(array("status"=>"Y", "deleted"=>"N"));
        $this->db->where(array("city"=>'', "state"=>''));
        $this->db->order_by("country");
        $this->db->group_by("country");
        $query = $this->db->get('country'); 
		$Countrydata = $query->result();
		$drop="";
		// onchange="select_state(this.value);"
		$drop.='<select name="country" id="countryName" class="form-control" >
			     <option value="">Please Select</option>';
		
		foreach($Countrydata as $val)
		{
			if($selCountryName == $val->country)
			{
				$drop.='<option value="'.$val->id.'" selected="selected" >'.$val->country.'</option>';
			}
			else
			{
				$drop.='<option value="'.$val->id.'" class="le-input">'.$val->country.'</option>';
			}
		}
		$drop.='</select>';
		return $drop;
	}
	function getStateSelect($selCountryName = NULL,$selStateName = NULL)
	{
		$this->db->select("state");
        $this->db->where(array("status"=>"Y", "deleted"=>"N", "country"=>$selCountryName));
        $this->db->where("city = '' AND state != ''");
        $this->db->order_by("city");
        $query = $this->db->get('country'); 
        $statedata = $query->result();
        $drop='<select name="state" id="state" onchange="select_city(this.value);" class="form-control">
            <option value="" selected="selected">please select</option>';       
        foreach($statedata as $val)
        {
        	if($selStateName==$val->state)
				$drop.='<option value="'.$val->id.'" selected="selected" >'.$val->state.'</option>';
			else
            	$drop.='<option value="'.$val->id.'">'.$val->state.'</option>';
        }
        $drop.='</select>';
        return $drop;
	}
	function getCitySelect($selStateName = NULL,$selCityId = NULL)
	{
		$this->db->select("city,id");
        $this->db->where(array("status"=>"Y", "deleted"=>"N", "state"=>$selStateName));
        $this->db->where("city != ''");
        $this->db->order_by("city");
        $query = $this->db->get('country'); 
        $citydata = $query->result();
        $drop='<select name="city" id="city" class="form-control">
            <option value="" selected="selected">please select</option>';       
        foreach($citydata as $val)
        {
        	if($selCityId==$val->id)
				$drop.='<option value="'.$val->id.'" selected="selected" >'.$val->city.'</option>';
			else
            	$drop.='<option value="'.$val->id.'">'.$val->city.'</option>';
        }
        $drop.='</select>';
        return $drop;
	}
	function getCitySelectname($selStateName = NULL,$selCityId = NULL)
	{
		$this->db->select("city,id");
        $this->db->where(array("status"=>"Y", "deleted"=>"N", "state"=>$selStateName));
        $this->db->where("city != ''");
        $this->db->order_by("city");
        $query = $this->db->get('country'); 
        $citydata = $query->result();
        $drop='<select name="city" id="city" class="form-control">
            <option value="" selected="selected">please select</option>';       
        foreach($citydata as $val)
        {
        	if($selCityId==$val->city)
				$drop.='<option value="'.$val->id.'" selected="selected" >'.$val->city.'</option>';
			else
            	$drop.='<option value="'.$val->id.'">'.$val->city.'</option>';
        }
        $drop.='</select>';
        return $drop;
	}
	function getSubCategoriesByCatIdCustId($catId=null,$custId=null)
	{
		if($custId=="")
		{
			$this->db->select('*');
			$this->db->from('categories');
			$this->db->where("deleted",'N');
			$this->db->where("status",'Y');
			$this->db->where('parent_id',$catId);
			$this->db->order_by('cat_id','asc');
			$query = $this->db->get();
		}
		else
		{
			$this->db->select('categories.*,cust_cat.cust_id');
			$this->db->from('categories');
			$this->db->join('cust_cat',"categories.cat_id=cust_cat.cat_id and cust_cat.cust_id='".$custId."'",'left');
			$this->db->where("categories.deleted",'N');
			$this->db->where("categories.status",'Y');
			$this->db->where('categories.parent_id',$catId);
			$this->db->order_by('categories.name','asc');
			$query = $this->db->get();
		}	

		$cats="";
		if($query->num_rows())
		{
			$userdata = $query->result();
			foreach ($userdata as $val) 
			{
				if($val->cust_id!="")
				{
					$cats.='&raquo;&nbsp; '.$val->name.'<br>';
				}
			}
		}
		return $cats;
	}
	function menuIdExitsInPrivilageArray($id)
	{
		$privielage_array=explode(',',$this->session->userdata('STAFF_PRIVILAGE_ARRAY'));
		if(in_array($id, $privielage_array)) 
			return "Y";
		else
			return "N";
	}
	function createPrivilageSessForStaffLeftPanel()
	{
		if($this->session->userdata('STAFF_PRIVILAGE_ARRAY')=='')
		{
			$this->db->select('privilage_array');
			$this->db->from('set_user_privilage');
			$this->db->where("deleted",'N');
			$this->db->where('customer_id',$this->session->userdata('adminUserId'));
			$query = $this->db->get();
			$row = $query->row();
			$this->session->set_userdata('STAFF_PRIVILAGE_ARRAY',$row->privilage_array);
		}
	}
	function getEnquiry()
	{
		$this->db->select('*');
		$this->db->from('enquiry');
		$this->db->where("deleted",'N');
		$this->db->order_by('id','desc');
		$this->db->limit(3,0);
		$query = $this->db->get();
		return $query->result();
	}
	function getCountAppCustomers()
	{
		$currentdate = date("Y-m-d");
		$this->db->select('id,join_date, count(join_date)as count');
		$this->db->from('users');
		$this->db->where("join_date",$currentdate);
		$this->db->where("approved",'Y');
		$this->db->where("deleted",'N');
		// $this->db->where("seller",'Y');
		$this->db->group_by('join_date');
		$query = $this->db->get();
		$row = $query->row();
		if($row)
			return $row->count;
		else
			return 0;
	}
	function getCountUnAppCustomers()
	{
		$currentdate = date("Y-m-d");
		$this->db->select('id,join_date, count(join_date)as count');
		$this->db->from('users');
		$this->db->where("join_date",$currentdate);
		$this->db->where("approved",'N');
		$this->db->where("deleted",'N');
		$this->db->group_by('join_date');
		$query = $this->db->get();
		// echo $this->db->last_query();exit;
		$row = $query->row();
		if($row)
			return $row->count;
		else
			return 0;
	}
	
	function getCountEmails()
	{
		$currentdate = date("Y-m-d");
		$this->db->select('id,entry_date, count(entry_date) as count');
		$this->db->from('email_enquiry');
		$this->db->where("entry_date",$currentdate);
		$this->db->where("admin_deleted",'N');
		$this->db->group_by('entry_date');
		$query = $this->db->get();
		$row = $query->row();
		if($row)
			return $row->count;
		else
			return 0;
	}
	
	function getCountUsers()
	{
		$currentdate = date("Y-m-d");
		$this->db->select('id,join_date, count(join_date)as count');
		$this->db->from('users');
		$this->db->where("join_date",$currentdate);
		$this->db->group_by('join_date');
		$query = $this->db->get();
		$row = $query->row();
		if($row)
			return $row->count;
		else
			return 0;
	}
	function show_header_list($prt)
	{
		$this->db->select('*');
		$this->db->from('pages');
		$this->db->where('status','Y');
		$this->db->where('deleted','N');
		$this->db->where('id',$prt);
		$query = $this->db->get();
		//	echo  $this->db->last_query();  exit;  
		return $query->result();	
	}
	
	function package_detail($type)
	{
		$this->db->select('package_name');
		$this->db->from('member_package');
		$this->db->where('pack_type',$type);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result();
		
		}
	function home_banner()
	{
		$this->db->select('*');
		$this->db->from('homepage_banner');
		// $this->db->where('id',1);
		$this->db->where('type','home_banner');
		$query = $this->db->get();
		//echo  $this->db->last_query();  exit;  
		return $query->result();
		
	}
	function page_list($prt)
	{
		$this->db->select('*');
		$this->db->from('pages');
		$this->db->where('status','Y');
		$this->db->where('deleted','N');
		$this->db->where('priorty',$prt);
		$query = $this->db->get();
		//	echo  $this->db->last_query();  exit;  
		return $query->result();
	}	
				
	function show_product_image($pro_id)
	{
		$this->db->select('photo');	
		$this->db->from('images');
		$this->db->where('pro_id',$pro_id);
		// $this->db->limit(1);
		$query = $this->db->get();
		//echo  $this->db->last_query();  exit; 
		if($query->num_rows()>0) 
			return $query->result();
		else
			return 0;
	}	
		/*---------------------User Details--------------*/
	function show_client_detail($id)
	{
		
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('metadata','users.id=metadata.data_id','left');
		$this->db->where('id',16);
		$this->db->where('metadata.type','users');
		$query = $this->db->get();
		//echo  $this->db->last_query();  exit;  
		return $query->result();
	}
	/* nik 12-3-20 */
	/*-----------country fuction-----------*/
	function getCountryFieldById($field,$id)
	{
		$this->db->select($field.' as field');
		$this->db->from("country");
		$this->db->where("id",$id);
		$this->db->where("deleted","N");
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->row()->field;
		else
			return '';
	}
	/*-----------country fuction-----------*/
	
	function country()
	{
		$this->db->select("*");
		$this->db->from("country");
		$this->db->where("state","");
		$this->db->where("city","");
		$this->db->where("deleted","N");
		$this->db->order_by('country');
		$query = $this->db->get();
		return $query;
	}
	/************get_state******************/
	function state($sel_country)
	{
		$this->db->select('id,state');
		$this->db->from('country');
		$this->db->where('country',$sel_country);
		$this->db->where('city',"");
		$where = '(state !=" ")';
		$this->db->where($where);
		$this->db->where('deleted','N');
		$this->db->order_by('state');
		$query = $this->db->get();
		return $query;
	}
	/***********get_city*******************/
	function city($state)
	{
		$this->db->select('id,city');
		$this->db->from('country');
		$this->db->where('state',$state);
		$where = '(city !=" ")';
		$this->db->where($where);
		$this->db->where('deleted','N');
		$this->db->order_by('city');
		$query = $this->db->get();
		return $query;
	}

	/***********get genral setting data for email confirmation*************/
	function conformatioemail()
	{
		$this->db->select('conformatioemail_onoff');
		$this->db->from('generalsetting');
		$this->db->where('id','1');
		$query=$this->db->get();
		return $query;
	}

	/***********user_detail*************/
	function user_detail($id,$field)
	{
		$this->db->select($field.' as field');
		$this->db->from('users');
		$this->db->where('id',$id);
		$query=$this->db->get();
		// print_r($this->db->last_query());

		if($query->num_rows() > 0)
			return $query->row()->field;
		else
			return '';
	}
	
	function subdomain_video($id)
	{

		$this->db->select('*');
		$this->db->from('set_design_micro');
		$this->db->where('cust_id',$id);
		$query=$this->db->get();
		return $query;
	}

	function sub_domain_qry($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$id);
		$this->db->where('status','Y');
		$this->db->where('deleted','N');
		$query=$this->db->get();
		return $query;
	}
	/*-------get mails--------*/
	function email($id)
	{
		$this->db->select('*');
		$this->db->from('mails');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query;
	}

	/*---------site_config----------------*/
	function site_config()
	{
		$this->db->select('*');
		$this->db->from('site_config');
		$query = $this->db->get();
		$fetch_data = $query->row();
		return $fetch_data;
	}
	function getsite_configInfo($id)
	{
		$this->db->select('*');
		$this->db->from('site_config');
		$this->db->where('id',$id);
		$query = $this->db->get();
		//echo  $this->db->last_query(); 
		return $query->result();	
	}
	/*===show currency symbol in custom_constants_helper.php=======*/
	function show_currency()
	{
		$this->db->select('symbol');
		$this->db->from('currency');
		$this->db->where('defcurr_val','Y');
		$this->db->where('status','Y');
		$this->db->where('deleted','N');
		$query = $this->db->get();
		return $query->result();
	}
	function currencySymbol($id)
	{
		$this->db->select("symbol");
		$this->db->from("currency");
		$this->db->where("id",$id);
		$query = $this->db->get();
		return $query;
	} 

	/******************get Product Company Detail********************/
	
	function Product_Company_Detail($id)
	{
		$this->db->select('address, name,  mobile_no, user_photo,skype_name, email, city, cat_id, sub_cat_id, detail, status, deleted, join_date,  approved, pin_code');
		$this->db->from('users');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query;
	}

	/*============show unread mails===============*/

	function unread_mails($id,$pro_id)
	{
		$this->db->select('count(id) id');
		$this->db->from('email_enquiry');
		$this->db->where('unread','Y');
		$this->db->where('rec_user_id',$id);
		$this->db->where('rec_deleted','N');
		if($pro_id=='0' || $pro_id=='')
		{
			$pro_con="";
		}
		else
		{
			$this->db->where('pro_id',$pro_id);
		}
			$this->db->order_by('entry_date');
		$query=$this->db->get();
		// print_r($this->db->last_query());exit;
		return $query;
	}

	/*============show Categories name & Id =========*/
	function categorie_name($type= Null)
	{
		$this->db->select('name,cat_id');
		$this->db->from('categories');
		$this->db->where('parent_id','0');
		$where = '(parent_sub_id !="0")';
		$this->db->where($where);
		$this->db->where('deleted','N');
		$this->db->where('status','Y');
		if($type != Null)
			$this->db->where('cat_type',$type);
		else
			$this->db->where('cat_type','sell');

		$this->db->order_by('name','ASC');
			
		$query=$this->db->get();
		return $query->result();
	}
	/*===============users files select=================*/
	function show_customer_field($id,$field)
	{
		$this->db->select($field);
		$this->db->from('users');
		$this->db->where('id',$id);
		$this->db->where('deleted','N');
		$query = $this->db->get();
		return $query->result();
	}
	/***********user_detail*************/
	function user_seller_detail($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$id);
		$query=$this->db->get();
		// print_r($this->db->last_query());exit;
		return $query->row();
	}

	/*========show customer sub domain====*/
	/* remove
	function show_customer_sub_domain($id,$field)
	{
		$this->db->select('sub_domain');
		$this->db->from('customer');
		$this->db->where('id',$id);
			
		$query=$this->db->get();
		return $query->result();
	}*/
	/*===========get country flage===============*/
	function flage($country)
	{
		$this->db->select('flage');
		$this->db->from('country');
		$this->db->where('country',$country);
		$this->db->where('state',"");
		$this->db->group_by('flage');
		$query = $this->db->get();
		return $query;
	}
	/*==================select categories details=========================*/
	function categories($id)
	{
		$this->db->select("*");
		$this->db->from('categories');
		$this->db->where('cat_id',$id);
		$this->db->where('deleted','N');
		$query = $this->db->get();
		return $query;

	}
	/*==================select custmer_category =========================*/
	function customer_category($id,$parent_id=Null)
	{
		$this->db->select('cust_cat.*');
		$this->db->from('cust_cat');
		$this->db->join('categories','cust_cat.cat_id=categories.cat_id','left');
		if($parent_id==0)
		{
			$this->db->where('categories.parent_id',0);			
		}
		$this->db->where('cust_cat.cust_id',$id);
		$query=$this->db->get();
		return $query;
	}
	/*======product_feedback========*/
	function product_feedback($id)
	{
		$this->db->select('count(id) as id,sum(star) as total_star');
		$this->db->from('product_feedback');
		$this->db->where('pro_id',$id);
		$query = $this->db->get();
		return $query;

	}
	/*==================select categories using parent id details=========================*/
	function categoriesWithparent($pid,$type=null)
	{
		$this->db->select("*");
		$this->db->from('categories');
		if($type!=null)
		{	$this->db->where('parent_sub_id',$pid);
			$this->db->where('cat_type',$type);			
		}
		else
		{
			$this->db->where('parent_id',$pid);
		}
		$this->db->where('deleted','N');
		$this->db->where('status','Y');
		$this->db->group_by('name');
		$this->db->order_by('name','asc');
		$query = $this->db->get();
		return $query;
	}
	/*=========update banner table=========*/
	function updateBanner($table,$where,$data)
	{
		if (!empty($where['lang_type']))
			$where['lang_type'] = $this->session->userdata("user_lang");
		$this->db->where($where);
		$this->db->update($table,$data);
		return $this->db->affected_rows();
	}
	/*==================select categories details=========================*/
	function parentIdFromCategories($id)
	{
		$where= array('cat_id'=>$id,'delete'=>'N','status'=>'Y');

		$this->db->select("parent_id");
		$this->db->from('categories');
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}
	/*============get  Categories name & Id for dropdown=========*/
	function getCategoryForDropdown($type= Null)
	{
		$where = array('parent_sub_id'=>'0','parent_id'=>'0','status'=>'Y','deleted'=>'N');
		$this->db->select('name,cat_id');
		$this->db->from('categories');
		$this->db->where($where);
		if($type!='')
		{
			$this->db->where('cat_type',$type);
		}
		$this->db->order_by('name','ASC');
		$query=$this->db->get();
		return $query->result();
	}

	/*============get  category name & Id for dropdown=========*/
	function CategoryForDropdown()
	{
		$where = array('parent_id'=>'0','status'=>'Y','deleted'=>'N');
		$this->db->select('id,category_name');
		$this->db->from('category');
		$this->db->where($where);
		$this->db->order_by('category_name','ASC');
		$query=$this->db->get();
		return $query->result();
	}
	function getlastmsg($msg_id,$rec_user_id)
	{
		$where = array('rec_user_id'=> $rec_user_id, 'msg_id'=> $msg_id,'rec_deleted'=>'N');
		$this->db->select("*");
		$this->db->from("email_enquiry");
		$this->db->where($where);
		$this->db->order_by("id desc");
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
    function getlastmsgid($msg_id,$recv_id)
	{
		$where = array('rec_user_id'=> $recv_id, 'msg_id'=> $msg_id,'rec_deleted'=>'N');
		$this->db->select("*");
		$this->db->from("email_enquiry");
		$this->db->where($where);
		$this->db->order_by("id desc");
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function get_cust_detail($id,$field)
	{
		$this->db->where('id',$id);
		$this->db->select($field);
		$query = $this->db->get('users');
		$listingQry = $query->result();
		return $listingQry[0]->$field;	
	}
	function get_field_guest_enquiry($id,$field)
	{
		$this->db->select($field);
		$this->db->where('mail_enq_id',$id);
		$query = $this->db->get('guest_enquiry');
		$listingQry = $query->row();
		return $listingQry->$field;
	}
	function __callMasterquery($query)
	{
		$result = $this->db->query($query);
		return $result;
	}
}

?>