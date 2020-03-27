<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Currency extends CI_Model
{
    function getcurrency($start=null,$page_row=null)
    {
      $this->db->select('*');
      $this->db->from('currency');
     	$this->db->where('deleted','N');
     	$this->db->order_by('id','desc');
     	if($start>=0 && $page_row!=null)
		{
			$this->db->limit($page_row,$start);			
		}
        return $this->db->get();
    }
    function getcurrencydata($id)
    {
      $this->db->where('id',$id);
      $query=$this->db->get('currency');
      $query=$query->row();
      return $query;
    }
    function insrtcurrencydata($data)
    {
      if (!isset($data['lang_type']))
			  $data['lang_type'] = $this->session->userdata("user_lang");
      $this->db->insert('currency',$data);
    }
    function updatecurrencydata($id,$data)
    {
      $this->db->where('id',$id);
      $this->db->update('currency',$data);
    }
}