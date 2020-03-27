<?php
defined('BASEPATH') OR exit('Not direct script access allowed');
class UsersAuth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('languageswitcher');
        $this->load->model("admin/userauth");
    }

    public function login()
    {
        $adminLoggedIn = $this->session->userdata('adminLoggedIn');
        if($adminLoggedIn!='' || $adminLoggedIn==TRUE)
        {   
            redirect(base_url().'Dashboard','refresh');
        }
        if(isset($_REQUEST['submit']))
        {   
            $data_input = $this->input->post();
            $Status = $this->userauth->adminLogin($data_input);

            if($Status == 'True')
                redirect(base_url().'Dashboard', 'refresh');
            else
            {
                $this->session->set_flashdata('adminLogin', $this->lang->line('lang_user_password_combination_wrong'));
            }
        }
        $this->load->view('admin/login');
    }

    public function logout()
    {
        $this->session->userdata('');
        $this->session->sess_destroy();
        $this->load->model('languageswitcher');
        $this->languageswitcher->switchLang("admin","english");
        redirect(base_url().'admin.php', 'refresh');
    }
}