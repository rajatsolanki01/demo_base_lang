<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_model extends CI_Model
{
	/*===========get primery product group===============*/
	// function primery_pro_group($primery_name,$cust_id)
	// {
	// 	$this->db->select('primery');
	// 	$this->db->from('pro_group');
	// 	$this->db->where('id',$primery_name);
	// 	$this->db->where('cust_id',$cust_id);
	// 	$this->db->where('deleted','N');
	// 	$this->db->where('status','Y');
	// 	$query = $this->db->get();
	// 		//echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }
	// /*===========get secoandry product group===============*/
	// function secoandry_pro_group($sel_primary,$cust_id)
	// {
	// 	$this->db->select('secoandry,id');
	// 	$this->db->from('pro_group');
	// 	$this->db->where('primery',$sel_primary);
	// 	$this->db->where('cust_id',$cust_id);
	// 	$where = '(secoandry !=" ")';
	// 	$this->db->where($where);
	// 	$this->db->where('deleted','N');
	// 	$this->db->where('status','Y');
	// 	$query = $this->db->get();
	// 		//echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }

	// /*========get subcategory================*/
	// function getSubCategoryDropdown($parent_id)
	// {
	// 	$where = array('parent_id'=>$parent_id,'deleted'=>'N','status'=>'Y');
	// 	$this->db->select('name,cat_id,parent_id,parent_sub_id');
	// 	$this->db->from('categories');
	// 	$this->db->where($where);
	// 	$this->db->order_by('name');
	// 	$query = $this->db->get();
	// 	$result = $query->result();
	// 	return $result;
	// }
	// /*========get next subcategory================*/
	// function getSubnextCategoryDropdown($parent_id)
	// {
		
	// 	$where = array('sub_cat_id'=>$parent_id,'deleted'=>'N','status'=>'Y');
	// 	$this->db->select('id,type_name');
	// 	$this->db->from('classified_type');
	// 	$this->db->where($where);
	// 	$query = $this->db->get(); 
	// 	$result = $query->result();
	// 	return $result;
	// }

	// function getSubcateory($parent_id)
	// {
	// 	$where = array('parent_id'=>$parent_id,'deleted'=>'N','status'=>'Y');
	// 	$this->db->select('category_name,id');
	// 	$this->db->from('category');
	// 	$this->db->where($where);
	// 	$this->db->order_by('category_name');
	// 	$query = $this->db->get();
	// 	$result = $query->result();
	// 	return $result;
	// }

	// function checkSubdomain($sub_domain,$frm_id)
	// {
	// 	$this->db->select('sub_domain');
	// 	$this->db->from('customer');
	// 	if($frm_id!='')
	// 		$this->db->where("id !=",$frm_id);
	// 	$this->db->where('sub_domain',$sub_domain);
	// 	$this->db->where('deleted','N');
	// 	$this->db->where('status','Y');
	// 	$query = $this->db->get();
	// 	// print_r($this->db->last_query());exit;
	// 	if($query->num_rows()>0)
	// 		return 1;
	// 	else
	// 		return '';
	// }
	
}
?>