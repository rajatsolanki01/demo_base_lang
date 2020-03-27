<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class payment_getway extends CI_Model
{
	function account($oid)
	{
		$this->db->select('*');
		$this->db->from('account');
		$this->db->where('status','Y');
		$this->db->where('deleted','N');
		$this->db->where('order_id',$oid);
		$query = $this->db->get();
		return $query;	
	}

	//select bankdetail from site config
	function bankDetail()
	{
		$this->db->select('bankdetail');
		$this->db->from('site_config');
		$this->db->where('id','1');
		$query = $this->db->get();
		return $query;	
	}

	//update account 
	function updateAccount($data,$where)
	{
		$this->db->where($where);  
		$this->db->update('account', $data);
		return $this->db->affected_rows();
	}
	
	//select account using user id
	function account_user($uid)
	{
		$this->db->select('*');
		$this->db->from('account');
		$this->db->where('pack_status','Y');
		$this->db->where('paystatus','TRUE');
		$this->db->where('approved','Y');
		$this->db->where('status','Y');
		$this->db->where('deleted','N');
		$this->db->where('user_id',$uid);
		$query = $this->db->get();
		return $query;	
	}

	function member_package($name)
	{
		$this->db->select('valid_day');
		$this->db->from('member_package');
		$this->db->where('package_name',$name);
		$query = $this->db->get();
		return $query;	
	}

	//update users 
	function updateusers($data,$where)
	{
		$this->db->where($where);  
		$this->db->update('users', $data);
		return $this->db->affected_rows();
	}

	//update customer 
	function updatecustomer($data,$where)
	{
		$this->db->where($where);  
		$this->db->update('customer', $data);
		return $this->db->affected_rows();
	}
	
	function users($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query;	
	}	


	function getMembetPackageDetails($package_id)
	{
		$where = array('deleted'=>'N', 'status'=>'Y', 'id'=>$package_id);
		$this->db->select('*');
		$this->db->from('member_package');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row();
	}

	function getAccountMaxOrderId()
	{
		$this->db->select('max(order_id) as order_id');
		$this->db->from('account');
		$this->db->where('deleted','N');
		$query = $this->db->get();
		return $query->row();
	}

	function inseertAccountPayment($qrySavePage)
	{
		$this->db->insert('account',$qrySavePage);
	}
	
	function getAccountOrderId($ord_id) 
	{
		$this->db->select('*');
		$this->db->from('account');
		$this->db->where('order_id',$ord_id);
		$query = $this->db->get();
		return $query->row();
	}

	function getAccountData($where)
	{
		$this->db->select('*');
		$this->db->from('account');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row();
		
	}

	function updateAccounts($set,$where)
	{	
		$this->db->set($set);
		$this->db->where($where);  
		$this->db->update('account');
		return $this->db->affected_rows();
	}

	function getValidDay($where) 
	{
		$this->db->select('valid_day');
		$this->db->from('member_package');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row();
	}
	function updateAccountPayStatus($setpay,$where)
	{
		$this->db->set($setpay);
		$this->db->where($where);  
		$this->db->update('account');
		return $this->db->affected_rows();
                    
	}

	function updateUserPackageType($setpayuser,$where)
	{
		$this->db->set($setpayuser);
		$this->db->where($where);  
		$this->db->update('users');
		return $this->db->affected_rows();
            
	}

	function updateCustomerPackageTypeAndPaid($setpaycustomer,$where)
	{
		$this->db->set($setpaycustomer);
		$this->db->where($where);  
		$this->db->update('customer');
		return $this->db->affected_rows();
		 
	}
	
}
