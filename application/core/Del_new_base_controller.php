<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class New_base_controller extends CI_Controller {
	protected $role = '';
	protected $vendorId = '';
	protected $name = '';
	protected $roleText = '';
	protected $global = array ();
	
	
	function currencyData() {
		
		 $this->load->helper('functions_helper');
	 $companyRecord=siteDetail();	
	$default_currency=$companyRecord->default_currency;
	}
}