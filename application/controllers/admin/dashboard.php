<?php
defined('BASEPATH') OR exit('no direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
      $adminLoggedIn = $this->session->userdata('adminLoggedIn');
      if($adminLoggedIn=='' || $adminLoggedIn!=TRUE)
      {   
          redirect(base_url().'admin.php','refresh');
      }
	  }
    
    public function home()
    {
      $this->load->view('admin/header.php');
      $this->load->view('admin/leftpanel.php');
      $this->load->view('admin/dashboard_view');
      $this->load->view('admin/footer.php');
    }	
}
?>