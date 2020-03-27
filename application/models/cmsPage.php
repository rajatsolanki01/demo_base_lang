<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class CMSPage extends CI_Model
{
	function getData($val)
	{
		$where = array('id'=> $val, 'status'=> 'Y', 'deleted'=> 'N');
		$this->db->select("*");
		$this->db->from("cms_pages");
		$this->db->where($where);
		$query = $this->db->get();
		$result = $query->row();
		return $result;		
	}
	function getcontactsus()
	{
		$this->db->select("*");
		$this->db->from("site_config");
		$this->db->where('id','1');
		$query = $this->db->get();
		$result = $query->row();
		return $result;	
	}
	function insert_enquiry($data)
	{
		if (!isset($data['lang_type']))
			$data['lang_type'] = $this->session->userdata("user_lang");
		$this->db->insert('enquiry',$data);
	}					
}