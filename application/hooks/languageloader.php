<?php
class Languageloader
{
   function initialize() {
       $ci =& get_instance();
        //$ci->load->helper('language');
       $siteLang = $ci->session->userdata('user_lang');
       if ($siteLang=='arabic') {
          $ci->lang->load('arabic',$siteLang);
       } else {
           $ci->lang->load('message','english');
       }
   }
}
?>