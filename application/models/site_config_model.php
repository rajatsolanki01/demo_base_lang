<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Site_config_model extends CI_Model
{
	function getsite_configInfo($id)
	{
		$this->db->select('*');
		$this->db->from('site_config');
		$this->db->where('id',$id);
		$query = $this->db->get();
		//echo  $this->db->last_query(); 
		return $query->result();	
	}
}

?>