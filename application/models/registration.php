<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Registration extends CI_Model 
{
	function add_user($userInfo)
	{
		if (!isset($userInfo['lang_type']))
			$userInfo['lang_type'] = $this->session->userdata("user_lang");
		$this->db->insert('users', $userInfo);
	}

	// function add_customer($userInfo)
	// {
	// 	$this->db->insert('customer', $userInfo);
	// 	$insert_id = $this->db->insert_id();
	// 	return $insert_id;
	// }

	// function check_userQuery($user_name)
 //    {
 //        $this->db->select('cust_id');
 //        $this->db->from('users');	
 //        $this->db->where('user_name',$user_name);
 //        $this->db->where('deleted','N');
 //        $query = $this->db->get();
 //         return $query;
 //    }

	// function selQry($email)
	// {
	// 	$this->db->select('id');
	// 	$this->db->from('customer');
	// 	$this->db->where('email',$email);
	// 	$query = $this->db->get();
	// 	return $query;
	// }
	// function custdata_sql($data)
	// {
	// 	$this->db->insert('badge', $data);
	// 	return $this->db->insert_id();
	// }
	function metadata_sql($data)
	{
		$this->db->insert('metadata',$data);
			return $this->db->insert_id();
	}

	function upQry($data,$where)
	{
		$this->db->where($where);  
		$this->db->update('users', $data);
		return $this->db->affected_rows();
	}

	function grpQry($cust_id)
	{
		$this->db->select('id,cust_id');
		$this->db->from('users');
		$this->db->where('cust_id',$cust_id);
		$this->db->where('deleted','N');	
		$query = $this->db->get();
		return $query;
	}

	// function insertQry($data)
	// {
	// 	$this->db->insert('cust_cat',$data);
	// 	return $this->db->insert_id();
	// }
	// function alt_table($data)
	// {
	// 	$this->db->insert('user_alt_detail',$data);
	// 	return $this->db->insert_id();
	// }

	// function user($email)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('users');
	// 	$this->db->where('user_name',$email);
	// 	$query = $this->db->get();
	// 	return $query;
	// }
	function user_id($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query;
	}

	function __callMasterquery($query)
	{
		$result = $this->db->query($query);
		return $result;
	}

	function qrySavePage($data)
	{
		$this->db->insert('account',$data);
		return $this->db->insert_id();
	}

	function select_account($order_id)
	{
		$this->db->select('*');
		$this->db->from('account');
		$this->db->where('order_id',$order_id);
		$query = $this->db->get();
		return $query;
	}	
	function select_account_multiple($user_id)
	{
		$this->db->select('*');
		$this->db->from('account');
		$this->db->where('pack_status','Y');
		$this->db->where('user_id',$user_id);
		$this->db->where('paystatus','true');
		$this->db->where('approved','Y');
		$this->db->where('status','Y');
		$this->db->where('deleted','N');
		$query = $this->db->get();
		return $query;
	}

	function update_user($where,$data)
	{
		$this->db->where($where);  
		$this->db->update('users', $data);
		return $this->db->affected_rows();		
	}
	function update_customer($where,$data)
	{
		$this->db->where($where);  
		$this->db->update('customer', $data);
		return $this->db->affected_rows();		
	}
	
}
