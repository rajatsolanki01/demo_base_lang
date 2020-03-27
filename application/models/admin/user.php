<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class user extends CI_Model
{
	function getCustomerData($search_val=null,$start=null,$page_row=null)
    {
    	$this->db->select('*');
        $this->db->from('users');
        $this->db->where('deleted','N');
        if($search_val !='')
        	$this->db->where("frm_name like '%".$search_val."%' or  email like '%".$search_val."%'");
        $this->db->order_by('id','desc');
        if($start>=0 && $page_row!=null)
		{
			$this->db->limit($page_row,$start);			
		}
        $query = $this->db->get();
        return $query->result();
    }
    function getCustomerDataById($id=null)
    {
    	$this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    function getCategoriesJoinCustCatById($id=null)
    {
    	$this->db->select('categories.*,cust_cat.cust_id');
        $this->db->from('categories');
        $this->db->join('cust_cat',"categories.cat_id=cust_cat.cat_id and cust_cat.cust_id='".$id."'",'left');
        $this->db->where('categories.status','Y');
        $this->db->where('categories.deleted','N');
        $this->db->where('categories.parent_id','0');
        $this->db->order_by('categories.name','asc');
        $query = $this->db->get();
        return $query->result();
    }
    function getUsersData($condition=null,$start=null,$page_row=null)
    {
    	extract($condition);
    	$this->db->select('*');
        $this->db->from('users');
        $this->db->where('deleted','N');
        if($search_val !='')
        	$this->db->where("name like '%".$search_val."%' and  email like '%".$search_val."%'");
        if($JoinDate !='')
        	$this->db->where("join_date",$JoinDate);
        $this->db->order_by('id','desc');
        if($start>=0 && $page_row!=null)
		{
			$this->db->limit($page_row,$start);			
		}
        return $this->db->get();
    }
    function getUsersById($id=null)
    {
    	$this->db->select('*');
        $this->db->from('users');
        $this->db->join('country','users.city=country.id','inner');
        $this->db->where('users.id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    function getusersGroupByJoinDate($start=null,$page_row=null)
    {
    	$this->db->select('id,join_date, count(join_date) as count');
        $this->db->from('users');
        $this->db->group_by('join_date');
        $this->db->where('deleted','N');
        $this->db->where('join_date !=',''); 
        $this->db->order_by('id','desc');
        if($start>=0 && $page_row!=null)
		{
			$this->db->limit($page_row,$start);			
		}
        $query = $this->db->get();
        return $query->result();
    }
    function deleteCustomerById($id=null)
    {
    	$arr_data = array("deleted"=>"Y");
        $this->db->where(array("id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
        $rec = $this->db->update("customer", $arr_data);
        return $rec;	
    }
    function deleteUsersById($id=null)
    {
    	$this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        $query = $this->db->get();
        
        if($query->num_rows > 0)
        {
	        $userdata=$query->row();
	        $uid = $userdata->id;
	        $cust_id = $userdata->cust_id;

	        $arr_data = array("deleted"=>"Y");
	        $this->db->where(array("id"=>$cust_id, 'lang_type'=>$this->session->userdata("user_lang")));
	        $rec = $this->db->update("customer", $arr_data);
                
	        $arr_data = array("deleted"=>"Y");
	        $this->db->where(array("cust_id"=>$cust_id, 'lang_type'=>$this->session->userdata("user_lang")));
	        $rec = $this->db->update("cust_cat", $arr_data);
            
             
         	$this->db->select('*');
	        $this->db->from('classified_lisiting_details');
	        $this->db->where('user_id',$uid);
	        $query = $this->db->get();
	        
	        if($query->num_rows > 0)
	        {
		        $classifieddata=$query->row();   
                $unique_id=$classifieddata->unique_id;
                
                $arr_data = array("deleted"=>"Y");
		        $this->db->where(array("unique_id"=>$unique_id));
		        $rec = $this->db->update("classified_lisiting_details", $arr_data);

		        $arr_data = array("deleted"=>"Y");
		        $this->db->where(array("classified_unique_id"=>$unique_id));
		        $rec = $this->db->update("classified_lisiting_images", $arr_data);

		        $arr_data = array("deleted"=>"Y");
		        $this->db->where(array("classified_id"=>$unique_id));
		        $rec = $this->db->update("classified_other_details", $arr_data);
            }                  

            $arr_data = array("deleted"=>"Y");
	        $this->db->where(array("id"=>$id));
	        return $this->db->update("users", $arr_data);    
        }
	}
	function updateAJAXCustomerModel($data)
	{
		if($data['type']=='trade_assurance')
			$arr_data = array("trade_assurance"=>$data['chk']);

		if($data['type']=='trust_seal')
			$arr_data = array("trust_seal"=>$data['chk']);

		if($data['type']=='assessed_supplier')
			$arr_data = array("assessed_supplier"=>$data['chk']);

		if($data['type']=='onsite_checked_a')
			$arr_data = array("onsite_checked_a"=>$data['chk']);

		if($data['type']=='production_varified')
			$arr_data = array("production_varified"=>$data['chk']);

		if($data['type']=='store_favorite')
			$arr_data = array("store_favorite"=>$data['chk']);

		if($data['type']=='email_verified')
			$arr_data = array("email_verified"=>$data['chk']);

		if($data['type']=='mobile_number_verified')
			$arr_data = array("mobile_number_verified"=>$data['chk']);

		if($data['type']=='category_best')
			$arr_data = array("category_best"=>$data['chk']);

		if($data['type']=='secure')
			$arr_data = array("secure"=>$data['chk']);

		if($data['type']=='secure_transaction')
			$arr_data = array("secure_transaction"=>$data['chk']);

		$this->db->where(array("cust_id"=>$data['id']));
	    return $this->db->update("badge", $arr_data);
	}
    function getAJAXState($countryName=null)
    {
        $this->db->select("state");
        $this->db->where(array("status"=>"Y", "deleted"=>"N", "country"=>$countryName));
        $this->db->where("city = '' AND state != ''");
        $this->db->order_by("city");
        $query = $this->db->get('country'); 
        $statedata = $query->result();
        $drop='<select name="state" id="state" onchange="select_city(this.value);" class="form-control">
            <option value="" selected="selected">please select</option>';       
        foreach($statedata as $val)
        {
            $drop.='<option value="'.$val->state.'">'.$val->state.'</option>';
        }
        $drop.='</select>';
        return $drop;
    }
   
    function getAJAXCity($stateName=null)
    {
        $this->db->select("city,id");
        $this->db->where(array("status"=>"Y", "deleted"=>"N", "state"=>$stateName));
        $this->db->where("city != ''");
        $this->db->order_by("city");
        $query = $this->db->get('country'); 
        $citydata = $query->result();
        $drop='<select name="city" id="city" class="form-control">
            <option value="" selected="selected">please select</option>';       
        foreach($citydata as $val)
        {
            $drop.='<option value="'.$val->id.'">'.$val->city.'</option>';
        }
        $drop.='</select>';
        return $drop;
    }
    function insertAdmin($data=null)
    {
        extract($data);
        $date=date("Y-m-d"); 
        $data_insert = array('user_name'=> $user_name,'password'=>md5($new_pass),'name'=>$name,'designation'=> $designation,'mobile_no'=>$mobile_no,'address'=>$address,'user_type'=> 'S','join_date'=>$date,'country'=>$country,'state'=>$state,'city'=>$city, 'lang_type'=>$this->session->userdata("user_lang"));
        return $this->db->insert('admin', $data_insert);
    }
    function getAdminData($condition=null,$start=null,$page_row=null)
    {
        extract($condition);
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('user_type','S');
        $this->db->where('deleted','N');
        if($search_val !='')
        {
            $where = "(name LIKE '%".$search_val."%' OR user_name LIKE '%".$search_val."%')";
            $this->db->where($where);
        }
        $this->db->order_by('id','desc');
        if($start>=0 && $page_row!=null)
        {
            $this->db->limit($page_row,$start);         
        }
        $query = $this->db->get();
        return $query->result();
    }
    function getAdminById($id=null)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('user_type','S');
        $this->db->where('deleted','N');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    function updateAdmin($data=null)
    {
        extract($data);
        if($new_pass!='')
            $pass=md5($new_pass);
        else
            $pass=$old_pass;

        $arr_data = array('name'=>$name, 'designation' => $designation, 'mobile_no' => $mobile_no, 'address' => $address, 'user_name' => $user_name,  'password' => $pass, 'country' => $country, 'state' => $state, 'city' => $city);
        $this->db->where(array("id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
        return $this->db->update("admin", $arr_data);
    }
    function getUsersEditData($id=null)
    {
        $this->db->select('users.*,country.country,country.state');
        $this->db->from('users');
        $this->db->join('country','users.city=country.id','inner');
        $this->db->where('users.id',$id);
        $query = $this->db->get();
        return $query->row();
    }
     function updateeditusers($data,$id=null)
    {
        $this->db->where('id',$id);
        $this->db->update('users', $data);
    }

    function updateAdminPassword($pass,$id)
    {  
        $newpass = md5($pass);
        $data_edit = array('password' => $newpass);
        $this->db->where(array("id"=>$id));
        $query = $this->db->update('users', $data_edit);
    }
    
}
?>