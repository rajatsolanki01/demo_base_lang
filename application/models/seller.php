<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Seller extends CI_Model
{     
	function getsellerDetail($name=Null,$input=NULL,$page=NULL , $segment=NULL)
	{
		$this->db->select('users.*,country.country,country.state');
		$this->db->from('users');
		$this->db->join('country','users.city=country.city','inner');
		$this->db->where("users.user_type !=",'B');
		$this->db->where(array("users.approved"=>'Y',"users.deleted"=>"N","users.status"=>"Y"));
		
		if(isset($input['country']))
		{
			if($input['country']!="" )
			{
				$this->db->where('country.country',$input['country']);
			}
			if($input['state']!="")
			{
				$this->db->where('country.state',$input['state']);
			}
			if($input['city']!="")
			{
				$this->db->where('users.city',$input['city']);
			}
		}
		
		if(isset($input['id']))
		{
			if($input['id']!="")
			{
				// $this->db->where("FIND_IN_SET($input['id'], `customer.catid`)");
			}
			if($input['select_sub_catgory']!="")
			{
				// $this->db->where("FIND_IN_SET($input['select_sub_catgory'], `sub_cat_id.catid`)");
			}
			// if($input['select_type']!="")
			// {
				// $this->db->where("FIND_IN_SET($input['select_type'], `sub_cat_id.next_cat_id`)");
			// }
		}
		
		/* remove by RS if(isset($input['star']))
		{
			$this->db->where('seller_feedback.star',$input['star']);
		} */

		// if(isset($input['package_type']))
		// {
		// 	$this->db->where('customer.package_type',$input['package_type']);
		// }
			
	
		if($page!= NULL)
		{	
		$this->db->limit($page, $segment);
		}
		// if($name!='')
		// {
		// $this->db->like('customer.frm_name',$name);
		// }
		// if(isset($id))
		// {
	
		// $this->db->like('customer.catid',$id,'before');
		// $this->db->like('customer.catid',$id,'after');
		// $this->db->like('customer.catid',$id,'both');
		// }
		$query = $this->db->get();
		
		// echo  $this->db->last_query();//exit(); 
		
		return $query->result();
	}
	
	// function getsellerDetailByPackage($pack_type , $page=NULL , $segment=NULL)
	// {
	// 	$this->db->select('customer.*');
	// 	$this->db->from('customer');
	// 	/* remove by RS $this->db->join('seller_feedback','customer.id=seller_feedback.seller_id','left');*/
	// 	$this->db->where(array("customer.package_type"=>$pack_type,"customer.approved"=>'Y',"customer.deleted"=>"N","customer.status"=>"Y"));
	// 	if($page!= NULL)
	// 	{	
	// 	$this->db->limit($page, $segment);
	// 	}
	// 	$query = $this->db->get();
		
	// 	//echo  $this->db->last_query();exit(); 
		
	// 	return $query->result();
	// }
	
	function getsubdomainDetail($cust_id)
	{
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where(array("id"=>$cust_id,"approved"=>'Y',"deleted"=>"N","status"=>"Y","deleted"=>"N"));
		 $query = $this->db->get();
        $result = $query->result(); 
		 return $result;
		
	}

	function getcategoryName($customer_id)
	{
		$this->db->select('users.id,categories.name,categories.cat_id');
		$this->db->from('users');
		$this->db->join('categories','categories.cat_id=users.cat_id','left');
		$this->db->where('users.id',$customer_id);
		 $query = $this->db->get();
        $result = $query->result(); 
		$all_cats="";
		foreach($result as $cat_name)
			{
				if($all_cats=="")
						$all_cats=$cat_name->name;
					else
						$all_cats .=' , '.$cat_name->name.'';
			}
		return $all_cats; 
	}	
}?>