<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Footer extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Footer_data');
	}
	public function index()
	{
		$this->load->view('welcome_message');	 
	}
	public function Show_Footer()
	{
	     $prt=$this->input->post('prt');
	     $result = $this->Footer_data->show_footer($prt);
		 print_r( $result); 
	}
	public function Footer_category()
	{
	     $result = $this->Footer_data->show_footer_category();
		 print_r( $result); 
	}
	public function Footer_social()
	{
	     $result = $this->Footer_data->show_footer_social();
		 print_r( $result); 
	}
}