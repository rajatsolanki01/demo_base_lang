 <?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class News extends CI_Model
{
    function getNewsData($condition=null,$start=null,$page_row=null)
    {
    	// print_r($condition);exit;
    	extract($condition);
    	$this->db->select('*');
        $this->db->from('news');
        $this->db->where('deleted','N');
        if($search_val !='')
            $this->db->where("title like '%".$search_val."%' or  description like '%".$search_val."%'");
        $this->db->where(array("lang_type"=>$this->session->userdata("user_lang")));
        $this->db->order_by('id','desc');
        if($start>=0 && $page_row!=null)
		{
			$this->db->limit($page_row,$start);			
		}
        return $this->db->get();
    }

    function getNewsDataById($id)
    {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where(array("id"=>$id, "lang_type"=>$this->session->userdata("user_lang")));
        $query = $this->db->get();
        return $query->result();
    }

    function getNewsDataById2($id)
    {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where(array("id"=>$id, "lang_type"=>$this->session->userdata("data_update_lang")));
        $query = $this->db->get();
        return $query->result();
    }

    public function checkRecordExistForLang($id=null, $lang_name=null)
    {
        $this->db->select('id');
        $this->db->from('news');
        $this->db->where(array('id'=>$id, "lang_type"=>$lang_name));
        $query = $this->db->get();
        return $query->num_rows();//exit();
    }

    function insertNews($data)
    {
        //ALTER TABLE `news` ADD `lang_type` ENUM('English','Arabic','Chinese') NOT NULL DEFAULT 'English' AFTER `id`;
        if (!isset($data['lang_type']))
            $data['lang_type'] = $this->session->userdata("user_lang");
        $this->db->insert('news',$data);
    }

    function updateNews($where,$data)
    {
        if (!isset($where['lang_type']))
			$where['lang_type'] = $this->session->userdata("user_lang");
        $this->db->where($where);
        $this->db->set($data);  
        $this->db->update('news');
        // echo  $this->db->last_query();  exit;
        return $this->db->affected_rows();
    }

} 
?>