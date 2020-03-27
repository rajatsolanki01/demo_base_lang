<?php
class news_show extends CI_Model
{
	function getnewslist($page=NULL,$segment=NULL)
	{
		$where = array('status'=> 'Y', 'deleted'=> 'N');
		$this->db->select("*");
		$this->db->from("news");
		$this->db->where($where);
		if($page!='')
		{
			$this->db->limit($page,$segment);
		}
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		$result = $query->result();
		return $result;		
	}
}
?>