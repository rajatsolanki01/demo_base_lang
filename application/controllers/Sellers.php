<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController_front.php';
class Sellers extends BaseController_front 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("seller");
	}
	
	function ShowCustomer()
	{
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
		}
		else
		{
			$id = '';
		}

		if($this->input->post())
		{
			$input=$this->input->post();
			$input['delivery_method']=implode(',', $input['delivery_method']);
			
			$link="";
			foreach($input as $key=>$value)
			{
				print_r($key."=".$value);
				if(!empty($value))
				{ 
					$link.= $key."=".$value."&";
				}
			}
			$link =substr($link, 0, -1);
			if($link!="") { redirect("Customer.html"."?".$link); } 
			else
			{
			 redirect("Customer.html",'reload');
			}
		} 

		if(isset($_GET['name']))
			$name = $_GET['name'];
		else
			$name = '';
				
		$count = count($this->seller->getsellerDetail($name,$_REQUEST));
		$URI_SEGMENT = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0 ;
    	$returns = $this->paginationCompress ("Customer.html",$count, 10,$URI_SEGMENT);
		$data['seller_data']=$this->seller->getsellerDetail($name,$_REQUEST,$returns["page"],$returns["segment"]);
		$this->loadViews('show_seller', $this->global, $data, NULL);
	}
}
?>