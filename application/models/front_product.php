<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Front_Product extends CI_Model
{	
	/*=======get categories with field==============YES*/
	function category($cat_id)
	{
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('cat_id',$cat_id);
		$this->db->where('deleted','N');
		$query = $this->db->get();
		return $query->row();
	}

}
?>