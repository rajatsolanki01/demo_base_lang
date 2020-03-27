<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Inquiry extends CI_Model
{
    function get_email_enquiry($start=null,$page_row=null)
    {
      $this->db->select('*');
      $this->db->from('email_enquiry');
     	$this->db->where('admin_deleted','N');
     	$this->db->order_by('id','desc');
     	if($start>=0 && $page_row!=null)
		  {
			 $this->db->limit($page_row,$start);			
		  }
      return $this->db->get();
    }
    function update_email_enquiry($id)
    { 
      $update=array('admin_deleted'=>'Y');
      $this->db->where('id',$id);
      $this->db->where(array('lang_type'=>$this->session->userdata("user_lang")));
      $this->db->update('email_enquiry',$update);
    }
    function view_email_enquiry($id)
    {
      $this->db->select('*');
      $this->db->from('email_enquiry');
      $this->db->where('id',$id);
      $query = $this->db->get();
      $query=$query->row(); 
      return $query;
    }
    function get_enquiry($start=null,$page_row=null)
    {
      $this->db->select('*');
      $this->db->from('enquiry');
      $this->db->where('deleted','N');
      $this->db->order_by('id','desc');
      if($start>=0 && $page_row!=null)
      {
       $this->db->limit($page_row,$start);      
      }
      return $this->db->get();
    }
    function update_enquiry($id)
    { 
      $update=array('deleted'=>'Y');
      $this->db->where('id',$id);
      $this->db->where(array('lang_type'=>$this->session->userdata("user_lang")));
      $this->db->update('enquiry',$update);
    }
    function get_mails($id=NULL)
    {
      if($id!="")
      {
        $this->db->where('id',$id);
      }
      $this->db->select('*');
      $this->db->where(array("lang_type"=>$this->session->userdata("user_lang")));
      $query = $this->db->get('mails');
      return $query->result();
    }
    function get_mails2($id=NULL)
    {
      if($id!="")
      {
        $this->db->where('id',$id);
      }
      $this->db->select('*');
      $this->db->where(array("lang_type"=>$this->session->userdata("data_update_lang")));
      $query = $this->db->get('mails');
      return $query->result();
    }


    function insert_mails($data)
    {
      if (!isset($data['lang_type']))
			  $data['lang_type'] = $this->session->userdata("user_lang");
      $this->db->insert('mails',$data);
    }
    function update_mails($id,$data)
    {
      $where = array('id'=>$id, "lang_type"=>$this->session->userdata("data_update_lang"));
      $this->db->where($where);
      $this->db->update('mails',$data);
    }
}