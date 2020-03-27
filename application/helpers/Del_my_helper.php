<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * This function used to get the CI instance
 */
if(!function_exists('siteDetail'))
{
    function siteDetail()
    {
		$CI = get_instance();
        $CI->load->model('site_config_model');
        $siteRecord = $CI->site_config_model->getsite_configInfo(1);
       
       return  $siteRecord[0];
    }
}




?>