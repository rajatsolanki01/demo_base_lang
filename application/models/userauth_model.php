<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class UserAuth_model extends CI_Model
{

	// function select_login($user_name,$password)
	// {
	// 	$this->db->select('`id`, `user_name`, `password`');
	// 	$this->db->from('users');
	// 	$this->db->where('user_name',$user_name);
	// 	$this->db->where('password',$password);
	// 	$this->db->where('deleted','N');
	// 	$query = $this->db->get();
	// 	//echo  $this->db->last_query(); 
	// 	return $query->result();	
	// }
	function loginUser($user_name,$password)
	{
		$this->db->select('users.*');
		$this->db->from('users');
		$this->db->where('users.email',$user_name);
		$this->db->where('users.password',$password);
		//$this->db->where('users.buyer',"Y"); // add by RS, dated 26 02 2020
		$this->db->where('users.deleted','N');
		$query = $this->db->get();
		// echo  $this->db->last_query();exit(); 
		return $query;
	}

	// function profile_complite($id)
	// {
	// 	$this->db->select('profile_complite');
	// 	$this->db->from('customer');
	// 	$this->db->where('deleted','N');
	// 	$this->db->where('id',$id);
	// 	$query = $this->db->get();
	// 	$row = $query->row();
	// 	//echo  $this->db->last_query(); 
	// 	return $row;
	// }

	function add_registration($userInfo)
	{
		$this->db->trans_start();
		if (!isset($userInfo['lang_type']))
			$userInfo['lang_type'] = $this->session->userdata("user_lang");
		$this->db->insert('users', $userInfo);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		//echo  $this->db->last_query();
		return $insert_id;
	}
	
	// function add_registration1($userInfo,$cust_Info)
	// {
	// 	$this->db->trans_start();
	// 	$this->db->insert('users', $userInfo);
	// 	$this->db->insert('customer', $cust_Info);
	// 	$insert_id = $this->db->insert_id();
	// 	$this->db->trans_complete();
	// 	//echo  $this->db->last_query();
	// 	return $insert_id;
	// }
}
