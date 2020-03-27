<?php
defined('BASEPATH') OR exit('Not direct script access allowed');
class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $adminLoggedIn = $this->session->userdata('adminLoggedIn');
        if($adminLoggedIn=='' || $adminLoggedIn!=TRUE)
        {   
            redirect(base_url().'admin.php','refresh');
        }
        $this->load->model("admin/user");
        $this->load->config('Globvariable');
    }

    public function userView($page=null)
    {
        //search start
        if(isset($_REQUEST['search_val']))
        {  
            $condition['search_val'] = $_REQUEST['search_val']; 
            $data['search_val'] = $_REQUEST['search_val'];
        }
        else
        {
            $data['search_val'] ='';
            $condition['search_val'] ='';
        }
        //search stop
        
        if(isset($_GET['JoinDate']))
            $condition['JoinDate'] = $_GET['JoinDate']; 
        else
            $condition['JoinDate'] = ''; 

        //for show total searched 
        $total_rows = $this->user->getUsersData($condition)->num_rows;
        
        //pagination start
        $URI_SEGMENT = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $returns = $this->mylibrary->paginationCompress('UserView', $total_rows,2);
        $data['num']= $page;
        $data['showPagination'] = $this->pagination->create_links();

        $gPageRow = $this->config->item('gPerPage');
        $query = $this->user->getUsersData($condition,$URI_SEGMENT,$gPageRow);
        $usersdata =  $query->result();
        $data['usersdata'] = $usersdata;

        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/users/user_view',$data);
        $this->load->view('admin/footer.php');
    }
    public function userApprove($status,$id)
    {
        $arr_data = array();
        if($status=="Y")
            $arr_data = array("status"=>"N");
        else if ($status=="N")
            $arr_data = array("status"=>"Y");
        $this->db->where(array("id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
        $rec = $this->db->update("users", $arr_data);
        redirect($_SERVER['HTTP_REFERER']); 
    }
    public function userDetail($id)
    {
        $userdetail = $this->user->getUsersById($id);
        $data['userdetail'] = $userdetail;
        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/users/user_detail',$data);
        $this->load->view('admin/footer.php');
    }
    public function deleteUser($id)
    {
        $this->user->deleteUsersById($id);
        redirect($_SERVER['HTTP_REFERER']); 
    }


    public function PerDayUser()
    {
        $total_rows = count($this->user->getusersGroupByJoinDate());

        $URI_SEGMENT = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $returns = $this->mylibrary->paginationCompress('PerDayUser', $total_rows,2);
        $data['num']= $URI_SEGMENT;
        $data['showPagination'] = $this->pagination->create_links();

        $gPageRow = $this->config->item('gPerPage');
        $usercount = $this->user->getusersGroupByJoinDate($URI_SEGMENT,$gPageRow);
        $data['usercount'] = $usercount;
        
        
        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/users/user_per_day',$data);
        $this->load->view('admin/footer.php');
    }
    function addStaffUser($id=null)
    {
        $data = array();
        if($id!='')
        {
            $useredit = $this->user->getAdminById($id);
            $data['useredit'] = $useredit;
        }
        if(isset($_REQUEST['submit']))
        {
            if($_REQUEST['id'] =='')
            {
                $this->form_validation->set_rules('user_name', 'Email Address', 'trim|required|valid_email|is_unique[admin.user_name]');
                $this->form_validation->set_rules('new_pass', 'Password', 'trim|required');
            }
            else
            {
                $id = $_REQUEST['id'];
                $this->form_validation->set_rules('user_name', 'Email Address', 'trim|required|valid_email|callback_edit_unique[admin.user_name.'.$id.']');
                $this->form_validation->set_message('edit_unique', 'This %s is already exists');
                $this->form_validation->set_rules('old_pass', 'Password', 'trim|required');
            }
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
            $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|min_length[10]');
            $this->form_validation->set_rules('country', 'Country', 'trim|required');
            $this->form_validation->set_rules('state', 'State', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            if($this->form_validation->run()==true)//if validation get errors
            {
                if($_REQUEST['submit'] == 'Submit' && $_REQUEST['id'] == "")
                {   
                    $data_input = $this->input->post();
                    $this->user->insertAdmin($data_input); 
                    $this->session->set_flashdata('StaffUserMsg', 'Successfully Add Staff User');        
                }
                else
                {              
                    $data_input = $this->input->post();
                    $this->user->updateAdmin($data_input);
                    $this->session->set_flashdata('StaffUserMsg', 'Successfully Update Staff User');
                }

                redirect(base_url()."ViewStaffUsers");
            }
        }
        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/users/user_staff_add',$data);
        $this->load->view('admin/footer.php');
    }
    function aJAXState()
    {
        $countryName = $_POST['country'];
        $html = $this->user->getAJAXState($countryName);
        echo $html;
    }
    function AJAXCityByName()
    {
        $stateName = $_POST['state'];
        $html = $this->user->getAJAXCity($stateName);
        echo $html;
    }
    function viewStaffUsers()
    {
        //search start
        if(isset($_REQUEST['search_val']))
        {  
            $condition['search_val'] = $_REQUEST['search_val']; 
            $data['search_val'] = $_REQUEST['search_val'];
        }
        else
        {
            $data['search_val'] ='';
            $condition['search_val'] ='';
        }
        //search stop

        //for show total searched 
        $total_rows = count($this->user->getAdminData($condition));
        
        //pagination start
        $URI_SEGMENT = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $returns = $this->mylibrary->paginationCompress('ViewStaffUsers', $total_rows,2);
        $data['num']= $URI_SEGMENT;
        $data['showPagination'] = $this->pagination->create_links();

        $gPageRow = $this->config->item('gPerPage');
        $usersdata = $this->user->getAdminData($condition,$URI_SEGMENT,$gPageRow);
        $data['usersdata'] = $usersdata;

        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/users/user_staff_view',$data);
        $this->load->view('admin/footer.php');
    }
    public function staffUserApprove($status,$id)
    {
        $arr_data = array();
        if($status=="Y")
            $arr_data = array("status"=>"N");
        else if ($status=="N")
            $arr_data = array("status"=>"Y");
        $this->db->where(array("id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
        $rec = $this->db->update("admin", $arr_data);
        redirect($_SERVER['HTTP_REFERER']); 
    }
    public function deleteStaffUser($id=null)
    {
        $arr_data = array("deleted"=>"Y");
        $this->db->where(array("id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
        $rec = $this->db->update("admin", $arr_data);
        redirect($_SERVER['HTTP_REFERER']); 
    }
    public function staffUserDetail($id=null)
    {            
        $data['user_id'] = $id;

        $userdetail = $this->user->getAdminById($id);
        $data['userdetail'] = $userdetail;

        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/users/user_staff_detail',$data);
        $this->load->view('admin/footer.php');
    }

    public function edit_unique($str, $field)
    {
        sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $id);
        return isset($this->db)
            ? ($this->db->limit(1)->get_where($table, array($field => $str, 'id !=' => $id))->num_rows() === 0)
            : FALSE;
    }
    function EditUser($id)
    {
        $data['useredit'] = $this->user->getUsersEditData($id);
        if(isset($_REQUEST['submit']))
        {
            if($_REQUEST['id'] =='')
            {
                $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[admin.user_name]');
            }
            else
            {
                $id = $_REQUEST['id'];
                $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|callback_edit_unique[admin.user_name.'.$id.']');
            }
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|min_length[10]');
            $this->form_validation->set_rules('country', 'Country', 'trim|required');
            $this->form_validation->set_rules('state', 'State', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            if($this->form_validation->run()==true)//if validation get errors
            {   

                $details['name'] = valid_input_data($_REQUEST['name'], 'A');
                $details['mobile_no'] = valid_input_data($_REQUEST['mobile_no'], 'A');
                $details['address'] = valid_input_data($_REQUEST['address'], 'B');
                $details['email'] = valid_input_data(trim($_REQUEST['email']), 'B');
                $details['login_id'] = valid_input_data(md5(trim($_REQUEST['user_name'])),'B');
                $details['city'] = $_REQUEST['city'];

                $this->user->updateeditusers($details,$id);                
                $this->session->set_flashdata('UserSuccess', '<div class="alert alert-success" > User Update Successfully !</div>');
                redirect(base_url('UserView'));
            }
        }
        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/users/EditUser',$data);
        $this->load->view('admin/footer.php');
    }

    public function changePassword()
    {
        if(isset($_REQUEST['changepassword']))
        {
            $this->form_validation->set_rules('new_pass', 'Password', 'trim|required');
            if($this->form_validation->run()==true)
            { 
                if($_REQUEST['new_pass']!='')
                   $pass=md5($_REQUEST['new_pass']);
                $this->user->updateAdminPassword($pass,$_REQUEST['id']);
                $this->session->set_flashdata('ChangePassMsg', '<div class="alert alert-success" role="alert">'.$this->lang->line('lang_sucessfully_change_your_password').'</div>');
               redirect($_SERVER['HTTP_REFERER']); 
            }
            else
            {
                 $this->session->set_flashdata('ChangePassMsg','<div class="alert alert-danger" role="alert">'.validation_errors().'</div>');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
}
?>