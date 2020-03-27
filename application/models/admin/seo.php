<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Seo extends CI_Model
{
    function get_seo($start=null,$page_row=null)
    {
      $this->db->select('*');
      $this->db->from('seo');
      $this->db->where('deleted','N');
      $this->db->where(array("lang_type"=>$this->session->userdata("user_lang")));
     	$this->db->order_by('id','desc');
     	if($start>=0 && $page_row!=null)
      {
        $this->db->limit($page_row,$start);			
      }
        return $this->db->get();
    }
    
    function get_seo_data($id)
    {
      $this->db->select('*');
      $this->db->from('seo');
      $this->db->where(array("id"=>$id, "lang_type"=>$this->session->userdata("user_lang")));
      $query= $this->db->get();
      $query=$query->row();
      return $query;
    }

    function get_seo_data2($id)
    {
      $this->db->select('*');
      $this->db->from('seo');
      $this->db->where(array("id"=>$id, "lang_type"=>$this->session->userdata("data_update_lang")));
      $query= $this->db->get();
      return $query->result();
    }



    function insert_seo($data)
    {
      if (!isset($data['lang_type']))
			  $data['lang_type'] = $this->session->userdata("user_lang");
      $this->db->insert('seo',$data);
    }
    function update_seo($data,$id)
    {
      $where = array('id'=>$id, "lang_type"=>$this->session->userdata("data_update_lang"));
      $this->db->where($where);
      $this->db->update('seo',$data);
    }
}