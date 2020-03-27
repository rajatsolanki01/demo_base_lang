<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/MyaccountController_front.php';
class Buy_requirement_myaccount extends MyaccountController_front
{
	function __construct()
	{
		parent::__construct();
	 	$this->load->model('Buy_requirement');
	}
	/*--------- Show Buy Requirement List---------*/ 
	// function buyerRequirement() 
	// {  
	//  	$session_data = $this->session->userdata;
	//  	$linkcounts['all_product_cate'] = all_product_cate();
	//  	$data['reqi_data'] = $this->Buy_requirement->getRfqRequirment($session_data['user_id']);
	//  	$this->loadViews('buyer_requirement_my_account_list', $this->global, $data, NULL);
	// }
	// /*----------show buy requirement requiest details(user approval)---------*/ 
	// function quoteList($req_id)
	// {
	//   	$linkcounts['all_product_cate'] = all_product_cate();
	//   	$data['reqi_data'] = $this->Buy_requirement->getQutoe($req_id);
	//   	$this->loadViews('get_qutoe', $this->global, $data, NULL);
	//   	if($_REQUEST['Approve'])
	//   	{	
	// 	  	$values = array("booked"=>"Y");
	// 	  	$where = array("deleted"=>"N","saller_id"=>$_REQUEST['saller_id'],"req_id"=>$req_id);
 //  		 	$this->Buy_requirement->updateBuyQuote($values, $where);
	// 	  	$values = array("booked"=>"C");
	// 	  	$where = array("deleted"=>"N","req_id"=>$req_id);
 //  		 	$where2 = "saller_id !=".$_REQUEST['saller_id'];
 //  		 	$this->Buy_requirement->updateBuyQuote($values, $where,$where2);
 //  		 	$this->Buy_requirement->updateBuyRequirement($req_id);
	// 		redirect('buyer-requirement-list.html');
	//   	}
	// }
	// /*--------- Show Approv Buy requierments---------*/
	// function approvQuote($user_id)
	// {
	//   	$session_data = $this->session->userdata;
	//   	$req_data['reqi_data'] = $this->Buy_requirement->getApproveData($session_data['user_id']);
	//   	$this->loadViews('my_quote_list', $this->global, $req_data, NULL);
	// }
}
?>