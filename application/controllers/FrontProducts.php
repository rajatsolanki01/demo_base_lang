<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController_front.php';

class FrontProducts extends BaseController_front
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('front_product');
		$this->load->helper('functions');
	}
	/*=======show product details in product category================*/

	function show_products($cat_name=Null,$id=Null,$sub_cat_id=Null,$next_sub_cat_id=Null)
	{
	
		$linkcount = all_product_cate();
		 
		if($cat_name==Null)
		{
			$data['categories'] = true;
		}
		else
		{
			$data['categories'] = false;
		}
		
		$data['type'] ="sell";
		 //===========type ==============			

		if(isset($_REQUEST['page_num']))
		{
			$cnt=$pagination->show * ($_REQUEST['page_num']-1);
		}
		else
		{
			$cnt=0;	
		}
		
		/********* for latest products ****************/		
		if($id!=null)
		{
			$selqry=$this->front_product->category($id);
			if($selqry->num_rows)
			{
				$catlist=$selqry->row();
				$catname= $catlist->name; 
			}
			else 
			$catname="Categories";
		}
		
	  	$data['action'] = 'show_products';+
	  	//print_r($data);
		$this->loadViews('show_products',$data,$linkcount,Null);
	}
}