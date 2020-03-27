<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Model
{
	// function show_all_category()
	// {
	// 	$this->db->select('cat_id,name');
	// 	$this->db->from('categories');
	// 	$this->db->where('parent_id',0);
	// 	$this->db->where('parent_sub_id',0);
	// 	$this->db->where('status','Y');
	// 	$this->db->where('deleted','N');
	// 	$this->db->group_by('name');
	// 	$this->db->order_by('name asc');
	// 	$query = $this->db->get();
	// 	//echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }
	
	// function show_meta_detail($cat_id,$field,$type)
	// {
	// 	$this->db->select($field);
	// 	$this->db->from('metadata');
	// 	$this->db->where('data_id',$cat_id);
	// 	$this->db->where('type',$type);
	// 	$this->db->limit(1);
	// 	$query = $this->db->get();
	// 	//echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }
	
	// function show_sub_category($cat_id)
	// {
	// 	$this->db->select('name,cat_id');
	// 	$this->db->from('categories');
	// 	$this->db->where('parent_id',$cat_id);
	// 	$this->db->where('status','Y');
	// 	$this->db->where('deleted','N');
	// 	$this->db->group_by('name');
	// 	$this->db->order_by('name asc');
	// 	$query = $this->db->get();
	// 	//echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }
	
	// function show_next_sub_category($cat_id) 
	// {
	// 	$this->db->select('name,cat_id');
	// 	$this->db->from('categories');
	// 	$this->db->where('parent_sub_id',$cat_id);
	// 	$this->db->where('status','Y');
	// 	$this->db->where('deleted','N');
	// 	$this->db->group_by('name');
	// 	$this->db->order_by('name asc');
	// 	$query = $this->db->get();
	// 	//echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }

	// function get_client_category_new($id)
	// {
	// 	$this->db->select('users.id,categories.name,categories.cat_id');
	// 	$this->db->from('users');
	// 	$this->db->join('categories', 'categories.cat_id=users.cat_id', 'left');
	// 	$this->db->where('users.id',$id);
	// 	$query = $this->db->get();
	// 	// echo  $this->db->last_query();exit(); 
	// 	return $query->result();
	// }

	// /*==============get data from pages table===================*/
	// function getPagesById($id)
	// {
	// 	$this->db->Select('*');
	// 	$this->db->from('pages');
	// 	$this->db->where('status','Y');
	// 	$this->db->where('deleted','N');
	// 	$this->db->where('id',$id);
	// 	$query = $this->db->get();
	// 	return $query;
	// }
	// function get_country()
	// {
	// 	$where = "search_keyword != ''";
	// 	$where2=array('state'=>'','city'=>'','status'=>'Y','deleted'=>'N');
	// 	$this->db->select('*');
	// 	$this->db->where($where);
	// 	$this->db->where($where2);
	// 	$query = $this->db->get('country');
	// 	$result = $query->result();
	// 	return $result;
	// }
	// function get_country_and_banner($country_id)
	// {
	// 	$where=array('search_keyword'=>$country_id,'state'=>'','city'=>'','status'=>'Y','deleted'=>'N');
	// 	$this->db->select('country,banner');
	// 	$this->db->where($where);
	// 	$query = $this->db->get('country');
	// 	$result = $query->result();
	// 	return $result;
	// }
}
?>