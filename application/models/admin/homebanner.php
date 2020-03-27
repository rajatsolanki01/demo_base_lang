<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Homebanner extends CI_Model
{
	function homeBannerImagesRowFirst($id=null)
	{
		$this->db->select('*');
		$this->db->from('homepage_banner');
		$this->db->where('type','home_banner');
		$this->db->where(array("id"=>$id, "lang_type"=>$this->session->userdata("user_lang")));
		$query = $this->db->get();
		return $query->row();
	}

	function homeBannerImagesRowFirst2($id=null)
	{
		$this->db->select('*');
		$this->db->from('homepage_banner');
		$this->db->where('type','home_banner');
		$this->db->where(array("id"=>$id, "lang_type"=>$this->session->userdata("data_update_lang")));
		$query = $this->db->get();
		return $query->row();
	}

	function updateBannerById1($data_edit=null, $id=null)
	{
		$where = array('id'=>$id, "lang_type"=>$this->session->userdata("data_update_lang"));
     	$this->db->set($data_edit);
    	$this->db->where($where);
    	$this->db->update('homepage_banner');
    	return $this->db->affected_rows();
	}
	function insertBannerById1($data_edit=null)
	{
		$this->db->insert('homepage_banner', $data_edit);
	}

} 
?>