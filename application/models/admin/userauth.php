<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Userauth extends CI_Model
{
	function adminLogin($data = NULL)
	{
		extract($data);
        $pass=md5($password);
            
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('user_name',$loginname);
        $this->db->where('password',$pass);
        $this->db->where('status','Y');
        $this->db->where('deleted','N');
        $query = $this->db->get();
        
        if($query->num_rows())
        {  
            $userdata = $query->row(); 
            $userData = array(
                'adminUserId' => $userdata->id,
                'adminUserType' => $userdata->user_type,
                'adminName' => $userdata->user_name,
                'adminLoggedIn' => TRUE,
                'user_lang'=>'english',
                'data_update_lang'=>'english'
            );
            $this->session->set_userdata($userData);
            return 'True';
        }
        else
        {
            return 'False';
        }
	}
	
}
?>