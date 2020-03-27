<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Category extends CI_Model
{
    function getCategories($condition =null,$start=null, $page_row=null)
    {
        extract($condition);
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where("deleted","N");
        if($type !='')
            $this->db->where("cat_type",$type);
        if($cat_id !='')
            $cat_id = $cat_id;
        else
            $cat_id = 0;
        if($sub_cat_id !='')
            $sub_cat_id = $sub_cat_id;
        else
            $sub_cat_id = 0;
        $this->db->where("parent_id",$cat_id);
        $this->db->where("parent_sub_id",$sub_cat_id);
        
        if($search_val !='')
            $this->db->like("name", $_REQUEST['search_val'], "both");
        $this->db->where(array("lang_type"=>$this->session->userdata("user_lang")));
        $this->db->group_by('cat_id');    
        $this->db->order_by('cat_id','desc');
         
     	if($start>=0 && $page_row!=null)
		{
			$this->db->limit($page_row,$start);			
		}
        $rec = $this->db->get();
        return $rec->result();
    }
    function insertCategories($data_input =null)
    {
        extract($data_input);
    
        $catname=ucwords(trim($name));
        $data_insert = array('name' => $catname, 'parent_id' => $cat_id, 'cat_type' => $cat_type, 'parent_sub_id' => $sub_cat_id, 'category_image' => $uploaded_file, "lang_type"=>$this->session->userdata("user_lang"));
        $this->db->insert('categories', $data_insert);

        /* adding additional meta values in metedata*/  
        $data_id=$this->db->insert_id();  

        // $data_insert = array('data_id' => $data_id, 'meta_title' => $catname, 'meta_desc' => $meta_desc, 'meta_keywords' => $meta_keywords, 'type' => 'category', 'cat_image' => $uploaded_file, "lang_type"=>$this->session->userdata("user_lang"));
        // $query = $this->db->insert('metadata', $data_insert);
        // return $query;
    }
    function getCategoriesById($id=null)
    {
        $this->db->select('*');
        $this->db->from('categories');
        // $this->db->join('metadata',"metadata.data_id=categories.cat_id and metadata.type='category'",'left');
        $this->db->where('categories.deleted','N');
        
        $this->db->where(array("categories.cat_id"=>$id, "lang_type"=>$this->session->userdata("user_lang")));
        $query = $this->db->get();
        return $query->result();
    }
    function getCategoriesById2($id=null)
    {
        $this->db->select('*');
        $this->db->from('categories');
        // $this->db->join('metadata',"metadata.data_id=categories.cat_id and metadata.type='category'",'left');
        $this->db->where('categories.deleted','N');
        // $this->db->where('metadata.deleted','N');
        $this->db->where(array("categories.cat_id"=>$id, "lang_type"=>$this->session->userdata("data_update_lang")));
        
        $query = $this->db->get();
        return $query->result();
    }

    function updateCategories($data_input =null)
    {
        extract($data_input);
        $catname=ucwords(trim($name));
        $data_insert = array('name' => $catname, 'cat_type' => $cat_type, 'cat_icon' => $icon, 'category_image' => $uploaded_file);
        $where = array('cat_id'=>$id, "lang_type"=>$this->session->userdata("user_lang"));
        $this->db->where($where);
        $this->db->update('categories', $data_insert);        
    }
    function insertCategories2($data_input =null)
    {
        extract($data_input);
        $catname=ucwords(trim($name));
        $data_insert = array('cat_id' => $id, 'name' => $catname, 'cat_type' => $cat_type, 'cat_icon' => $icon, 'category_image' => $uploaded_file, "lang_type"=>$this->session->userdata("data_update_lang"));
        
        $this->db->insert('categories', $data_insert);        
    }
    
}
?>