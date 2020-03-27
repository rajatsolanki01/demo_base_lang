<?php if ( ! defined('BASEPATH')) exit('Direct access allowed');
class LanguageSwitcher extends CI_Controller
{
   public function __construct() {
       parent::__construct();
   }

   function switchUpdateLang()
   {
        $language = $_REQUEST['lang'];
        $language = ($language != "") ? $language : "english";       
        $this->session->set_userdata('data_update_lang', $language);
   }

   function switchLang() 
   {
   	$language = $_REQUEST['lang'];
    $language = ($language != "") ? $language : "english";       
    $this->session->set_userdata('user_lang', $language);
   }
   function switchCountryType() 
   {
	   	if(isset($_REQUEST['c_type']))
		{
			$this->session->set_userdata('select_currency', $_REQUEST['c_type']);
		}
   }
}