<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController_front.php';
class Categorys extends BaseController_front
{		
		function __construct()
		{
			parent::__construct();
		 	$this->load->model('category');		
		}
	/*=======show business identity==========*/
		// public function showPage($page,$id=null)  
		// {
		//  	$show_page=$this->category->getPagesById($id);
		//  	$show_page_listing['show_page_listing'] = $show_page->row();
		//  	$this->loadviews('show_page', $show_page_listing);
		// }
		// function country_list()
		// {
		// 	$data['show_banner_data']=$this->category->get_country();
		//  	$this->loadviews('country_list',$data);
		// }
		// function country_home()
		// {
		// 	$country_id=$_REQUEST['country'];
		// 	$show_banner_data=$this->category->get_country_and_banner($country_id);
		// 	$data['country'] = $show_banner_data[0]->country;
		// 	$data['show_banner_data'] = $show_banner_data;
		// 	$this->loadviews('country_home', $data);
		// }
} 