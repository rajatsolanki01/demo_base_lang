<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class   Footer_data extends CI_Model
{
	function show_footer($prt)
	{
		$this->db->select('title');
		$this->db->from('pages');
		$this->db->where('priorty',$prt);
		$this->db->where('status','Y');
		$this->db->where('deleted','N');
		$query = $this->db->get();
		return $query->result();
	}
	
	function show_footer_category()
	{
		$this->db->select('name');
		$this->db->from('categories');
		$this->db->where('parent_id',0);
		$this->db->where('parent_sub_id',0);
		$this->db->where('cat_type','sell');
		$this->db->where('status','Y');
		$this->db->where('deleted','N');
		$this->db->group_by('name');
		$this->db->order_by('name');
		$query = $this->db->get();
		return $query->result();
	}
	
	function show_footer_social()
	{
		$this->db->select('copyright,facebook_status,facebook,twitter_status,twitter,gpluse_status,gpluse,youtube_on_off,youtube,linkedin_on_off,linkedin');
		$this->db->from('generalsetting');
		$this->db->where('id',1);
		$query = $this->db->get();
		return $query->result();
	}
}
?>