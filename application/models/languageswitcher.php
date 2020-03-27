<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Languageswitcher extends CI_Model
{
    function switchLang($user_type = null, $language = "") {
    	$language = ($language != "") ? $language : "english";  
            $this->session->set_userdata('user_lang', $language);
            $this->session->set_userdata('user_type', $user_type);
    }
}
