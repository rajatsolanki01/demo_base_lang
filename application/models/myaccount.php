<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Myaccount extends CI_Model 
{
	function show_customer($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$id);
		$query = $this->db->get(); 
		return $query->result();	
	}

	// function show_account($uId)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('account');
	// 	$this->db->where('deleted','N');
	// 	$this->db->where('status','Y');
	// 	$this->db->where('approved','Y');
	// 	$this->db->where('pack_status','Y');
	// 	$this->db->where('user_id',$uId);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// }

	function show_user($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('deleted','N');
		$this->db->where('status','Y');
		$this->db->where('id',$id);
		$query = $this->db->get();
		//	echo  $this->db->last_query();  exit;  
		return $query;	
	}

	function listing_Qry_email($id)
	{
		$this->db->select('id,entry_date, count(id) as count');
		$this->db->from('email_enquiry');
		$this->db->where('rec_user_id',$id);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		// echo  $this->db->last_query();  exit;  
		return $query;	
	}
	/*---------------show customer with field---------*/
	// function get_customer($id,$field)
	// {
	// 	$this->db->select($field);
	// 	$this->db->from('customer');
	// 	$this->db->where('id',$id);
	// 	$this->db->where('deleted','N');
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// }
	/********************Update customer***********************************/
	/* remove
	function update_customer($where,$data)
	{
		$this->db->where($where);  
		$this->db->update('customer', $data);
		return $this->db->affected_rows();		
	}*/

	/*==================show information policies=========================*/
	// function show_information_policies($cust_id)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('information_policies');
	// 	$this->db->where('deleted','N');
	// 	$this->db->where('status','Y');
	// 	$this->db->where('cust_id',$cust_id);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// }
	/*-------------Add New Information Policies---------------------------*/	
	// function add_information_policies($insertData)
	// {
	// 	$this->db->trans_start();
	// 	$this->db->insert('information_policies', $insertData);
	// 	$insert_id = $this->db->insert_id();
	// 	$this->db->trans_complete();
	// 	//echo  $this->db->last_query();
	// 	return $insert_id;
	// }
	/********************Update information policies***********************************/
	// function update_information_policies($where,$data)
	// {
	// 	$this->db->where($where);  
	// 	$this->db->update('information_policies', $data);
	// 	return $this->db->affected_rows();		
	// }

	/*==================show image gallery=========================*/
	// function show_image_gallery($cust_id)
	// {
	// 	$this->db->select('id,img_name');
	// 	$this->db->from('image_gallery');
	// 	$this->db->where('cust_id',$cust_id);
	// 	$this->db->where('deleted','N');
	// 	$this->db->order_by('id','DESC');
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// } 
	/*-------------Add New image in gallery---------------------------*/	
	// function add_image_gallery($insertData)
	// {
	// 	$this->db->trans_start();
	// 	$this->db->insert('image_gallery', $insertData);
	// 	$insert_id = $this->db->insert_id();
	// 	$this->db->trans_complete();
	// 	return $insert_id;
	// }
	/*==================get image gallery=========================*/
	// function get_image_gallery($cust_id)
	// {
	// 	$this->db->select('id,status_process');
	// 	$this->db->from('image_gallery');
	// 	$this->db->where('cust_id',$cust_id);
	// 	$this->db->where('status_process','Y');
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// }
	/********************Update Image Gallery***********************************/
	// function update_image_gallery($where,$data)
	// {
	// 	$this->db->where($where);  
	// 	$this->db->update('image_gallery', $data);
	// 	return $this->db->affected_rows();		
	// } 
	/*-------------Add New image in certification---------------------------*/	
	// function add_certification_img($insertData)
	// {
	// 	$this->db->insert('certification_img', $insertData);
	// }
	/*==================get image certification=========================*/
	// function get_certification_img($cust_id)
	// {
		
	// 	$this->db->select('id,status_process');
	// 	$this->db->from('certification_img');
	// 	$this->db->where('cust_id',$cust_id);
	// 	$this->db->where('status_process','Y');
	// 	$this->db->where('deleted','N');
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// }
	/********************Update Image certification***********************************/
	// function update_certification_img($where,$data)
	// {
	// 	$this->db->where($where);  
	// 	$this->db->update('certification_img', $data);
	// 	return $this->db->affected_rows();		
	// }

	// function add_registration($userInfo)
	// {
	// 	$this->db->trans_start();
	// 	$this->db->insert('users', $userInfo);
	// 	$insert_id = $this->db->insert_id();
	// 	$this->db->trans_complete();
	// 	//echo  $this->db->last_query();
	// 	return $insert_id;
	// }

	/*-------------Add New Customer---------------------------*/	
	/* remove
	function add_customer($userInfo)
	{
		$this->db->insert('customer', $userInfo);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}*/
	/*******************Get Customer max id*************************************/
	/* remove
	function show_customer_max_id($email)
	{
		$this->db->select('max(id) as maxid');
		$this->db->from('customer');
		$this->db->where('email',$email);
		$this->db->where('deleted','N');
		$query = $this->db->get();
		//echo  $this->db->last_query();  exit;  
		return $query->result();
	}*/
	/*********************delete cust_cat table data**************************************/
	/* remove
	function delete_cust_cat($id)
	{
	   $this->db->where('cust_id', $id);
	   $this->db->delete('cust_cat'); 
	}*/
	/********************Update User***********************************/
	/* remove
	function update_user($where,$data)
	{
		$this->db->where($where);  
		$this->db->update('users', $data);
		return $this->db->affected_rows();		
	}*/
	/*-------------Add New Customer---------------------------*/	
	function add_cust_cat($userInfo)
	{
		$this->db->trans_start();
		$this->db->insert('cust_cat', $userInfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		//echo  $this->db->last_query();
		return $insert_id;
	}
	/*-------------Add New Meta Data---------------------------*/	
	/* remove
	function add_metadata($metaInfo)
	{
		$this->db->trans_start();
		$this->db->insert('metadata', $metaInfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		//echo  $this->db->last_query();
		return $insert_id;
	}*/
	
	/*======================update metadata=====================================*/
	/*remove
	function update_metadata($where,$data)
	{
		$this->db->where($where);  
		$this->db->update('metadata', $data);
		return $this->db->affected_rows();	
	}*/

	/* remove
	function show_seller_user_Alldetail($id)
	{
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('id',$id);
		$this->db->where('deleted','N');
		$this->db->where('status','Y');
		$query = $this->db->get();
		//echo  $this->db->last_query();  exit;  
		return $query->result();
	}*/
	
	/* remove
	function show_user_detail($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$id);
		$query = $this->db->get();
		//echo  $this->db->last_query();  exit;  
		return $query->result();
	}*/

	/* remove
	function show_user_data($email,$field)
	{
		$this->db->select($field);
		$this->db->from('users');
		$this->db->where('user_name',$email);
		$query = $this->db->get();
		//echo  $this->db->last_query();  exit;  
		return $query->result();	
	}*/
	/*-----------------End cilent details-------------------*/

	/*******************************/
	/* remove
	function categories_fileds($id,$field)
	{
		$this->db->select($field);
		$this->db->from('categories');
		$this->db->where('cat_id',$id);
		$query = $this->db->get();
		//echo  $this->db->last_query();  exit;  
		return $query->result();
	}*/
	/*----------------- user update profile ----------------*/
	function getUserdata($user_id)
	{
		$this->db->select('users.*,country.country,country.state');
		$this->db->from('users');
		$this->db->join('country','users.city=country.id','inner');
		$this->db->where(array('users.id'=>$user_id, 'users.status'=>'Y', 'users.deleted'=>'N'));
		$query = $this->db->get();
		//echo  $this->db->last_query();  exit;  
		return $query->result();
	}

	function updateUserProfile($where,$data)
	{
		if (!empty($where['lang_type']))
			$where['lang_type'] = $this->session->userdata("user_lang");
		$this->db->where($where);  
		$this->db->update('users', $data);
	}
	/*-----------------end user update profile ----------------*/


	function getChangePassData($where)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($where);
		$query = $this->db->get();
		$result = $query->row();
		//echo  $this->db->last_query();  exit;  
		return $result;
	}

	function updatePassword($selQry,$where)
	{
		$this->db->set($selQry);
		$this->db->where($where);  
		$this->db->update('users', $data);
		//echo  $this->db->last_query();  exit;
		return $this->db->affected_rows();		
	}

	function insertCustCat($values)
	{
		$this->db->trans_start();
		$this->db->insert('cust_cat', $values);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		//echo  $this->db->last_query();
		return $insert_id;
	}

	function getCustType($where)
	{
		$this->db->select('cat_type');
		$this->db->from('categories');
		$this->db->where($where);
		$query = $this->db->get();
		$result = $query->row();
		//echo  $this->db->last_query();  exit;  
		return $result->cat_type;
	}

	function updateList($set,$where)
	{
		$this->db->set($set);
		$this->db->where($where);  
		$this->db->update('customer', $data);
		//echo  $this->db->last_query();  exit;
		return $this->db->affected_rows();
	}

	function updateCustomerList($set,$where)
	{
		$this->db->set($set);
		$this->db->where($where);  
		$this->db->update('customer', $data);
		//echo  $this->db->last_query();  exit;
		return $this->db->affected_rows();
	}
}