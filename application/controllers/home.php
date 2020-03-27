<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
require APPPATH . '/libraries/BaseController_front.php';

class Home extends BaseController_front 
{
	function __construct(){
		parent::__construct();
		$this->load->model('Home_model');
		// $this->load->model('HomeProducts_model');

	}

	public function show_home()
	{ 
		if(isset($_REQUEST['submit']))
		{
			if($_POST['search_list']=='product')
			{
				redirect(base_url()."product.html?name=".$_POST['ser_val_product']."&search_list=".$_POST['search_list']);
			}
			if($_POST['search_list']=='seller')
			{
				redirect(base_url()."Customer.html?name=".$_POST['ser_val_product']."&search_list=".$_POST['search_list']);
			}
			if($_POST['search_list']=='classified')
			{
				redirect(base_url()."classified.html?name=".$_POST['ser_val_product']."&search_list=".$_POST['search_list']);	
			}
		}
	
		$data['show_feature'] = $this->Home_model->show_feature_brand1();
		
		$data['home_banner2'] = $this->Home_model->show_home_page_banner();
		
		$data['show_news'] = $this->Home_model->show_news();
		
		$data['left_category'] = $this->Home_model->show_left_category();
		
		$data['top_suppliers'] = $this->Home_model->show_top_suppliers();
		
		$data['show_spotlight_store'] = $this->Home_model->show_spotlight_store();
		$this->loadViews('home', $this->global, $data , NULL);
	} 
	
}