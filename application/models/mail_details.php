<?php 
class mail_details extends CI_Model
{
	function get_mail_status()
	{
		$Session=$this->session->userdata;
		$where = array('rec_user_id'=> $Session['user_id'], 'rec_deleted'=> 'N');
		$this->db->select("*");
		$this->db->from("email_enquiry");
		$this->db->where($where);
		$this->db->group_by('pro_id'); 
		$this->db->order_by("id desc");
		$query = $this->db->get();
		$result = $query->result();
		return $result;		
	}
	function get_email_id()
	{
		$Session=$this->session->userdata;
		$where = array('rec_user_id'=> $Session['user_id'], 'rec_deleted'=> 'N','unread'=>'Y');
		$this->db->select("count(id) as id");
		$this->db->from("email_enquiry");
		$this->db->where($where);
		$this->db->order_by("entry_date asc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;		
	}
	function get_email_data($pro_id,$rec_user_id)
	{
		$Session=$this->session->userdata;
		$this->db->where('pro_id', $pro_id);
		$this->db->where('rec_deleted', 'N');
		$where = "(rec_user_id= $rec_user_id or snd_user_id = $rec_user_id)";
		$this->db->where($where);
		$this->db->select("*");
		$this->db->from("email_enquiry");
		$this->db->order_by("id desc");
		$query = $this->db->get();
		return $query->result();		
	}
	function get_email($pro_id,$rec_user_id)
	{
		$Session=$this->session->userdata;
		$this->db->where('pro_id', $pro_id);
		$this->db->where('rec_deleted', 'N');
		$where = "(rec_user_id= $rec_user_id or snd_user_id = $rec_user_id)";
		$this->db->where($where);
		$this->db->select("*");
		$this->db->from("email_enquiry");
		$this->db->order_by("id asc");
		$query = $this->db->get();
		return $query->result();		
	}
	function insert_email($email)
	{
		$this->db->insert('email_enquiry',$email);
	}
	function update_email($pro_id,$rec_user_id)
	{
		$this->db->where('pro_id', $pro_id);
		$this->db->where('snd_user_id', $this->session->userdata('user_id'), 'lang_type'=>$this->session->userdata("user_lang"));
		$where = "(rec_user_id= $rec_user_id or snd_user_id = $rec_user_id)";
		$this->db->where($where);
		$this->db->set('unread', 'N');
		$this->db->update('email_enquiry');
	}
}