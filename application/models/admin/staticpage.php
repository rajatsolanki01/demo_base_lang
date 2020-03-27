<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class StaticPage extends CI_Model
{
	function getStaticPageListing($start=null,$page_row=null)
	{
		$this->db->select('*');
      	$this->db->from('pages');
		 $this->db->where('deleted','N');
		 $this->db->where(array("lang_type"=>$this->session->userdata("user_lang")));
     	$this->db->order_by('id','desc');
     	if($start>=0 && $page_row!=null)
		{
			$this->db->limit($page_row,$start);			
		}
        return $this->db->get();
	}
	function getStaticData($id)
	{
		$this->db->select('*');
	    $this->db->from('pages');
		$this->db->where('id',$id);
		$this->db->where(array("id"=>$id, "lang_type"=>$this->session->userdata("user_lang")));
	    $query= $this->db->get();
	    //print_r($this->db->last_query());exit;
	    $userdata=$query->row();
	    return $userdata;
	}
	function getStaticData2($id)
	{
		$this->db->select('*');
	    $this->db->from('pages');
		$this->db->where('id',$id);
		$this->db->where(array("id"=>$id, "lang_type"=>$this->session->userdata("data_update_lang")));
	    $query= $this->db->get();
	    //print_r($this->db->last_query());exit;
	    $userdata=$query->row();
	    return $userdata;
	}

	function insertStaticPage($data)
	{
		if (!isset($data['lang_type']))
			$data['lang_type'] = $this->session->userdata("user_lang");
		$this->db->insert('pages',$data);
	}

	function updateinsertStaticPage($where,$data)
	{
		$this->db->where($where);
		$this->db->set($data);  
		$this->db->update('pages');
		// echo  $this->db->last_query();  exit;
		return $this->db->affected_rows();
		
	}

	function getCmsPages()
	{
		$this->db->select('*');
	    $this->db->from('cms_pages');
		$this->db->where('deleted','N');
		$this->db->where(array("lang_type"=>$this->session->userdata("user_lang")));
	    $this->db->order_by('id desc');
	    $query= $this->db->get();
	    //print_r($this->db->last_query());exit;
	    $userdata=$query->result();
	    return $userdata;
	}

	function getCmspagesData($id)
	{
		$this->db->select('*');
	    $this->db->from('cms_pages');
		
		$this->db->where(array("id"=>$id, "lang_type"=>$this->session->userdata("user_lang")));
	    $query= $this->db->get();
	    // print_r($this->db->last_query());exit;
	    $userdata=$query->result();
	    return $userdata;
	}
	function getCmspagesData2($id)
	{
		$this->db->select('*');
	    $this->db->from('cms_pages');
	    $this->db->where(array("id"=>$id, "lang_type"=>$this->session->userdata("data_update_lang")));
	    $query= $this->db->get();
	    // print_r($this->db->last_query());exit;
	    $userdata=$query->result();
	    return $userdata;
	}

	function getCmsPagesEdit($where,$data)
	{
		$this->db->where($where);
		$this->db->set($data);  
		$this->db->update('cms_pages');
		// echo  $this->db->last_query();  exit;
		return $this->db->affected_rows();
	}
	
	function getCmsPagesInsert($data)
	{	
		if (!isset($data['lang_type']))
			$data['lang_type'] = $this->session->userdata("user_lang");	 
		$this->db->insert('cms_pages', $data);
		return $this->db->affected_rows();
	}

} 
?>