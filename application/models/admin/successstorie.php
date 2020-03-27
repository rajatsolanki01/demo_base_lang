<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Successstorie extends CI_Model
{
	function getSuccessStorieData($condition=null,$start=null,$page_row=null)
    {
       	extract($condition);
    	$this->db->select('*');
        $this->db->from('success_stories');
        $this->db->where('deleted','N');
        if($search_val !='')
        	$this->db->where("title like '%".$search_val."%' or  description like '%".$search_val."%'");
        $this->db->order_by('id','desc');
        if($start>=0 && $page_row!=null)
		{
			$this->db->limit($page_row,$start);			
		}
        return $this->db->get(); 
    }

    function getSuccessStorieDataById($id)
    {
    	$this->db->select('*');
    	$this->db->from('success_stories');
    	$this->db->where('id',$id);
    	$query = $this->db->get();
    	return $query->row();
    }

    function updateSuccessStorie($data_edit,$where)
	{
     	$this->db->set($data_edit);
    	$this->db->where($where);
    	$this->db->update('success_stories');
    	return $this->db->affected_rows();
	}

}?>