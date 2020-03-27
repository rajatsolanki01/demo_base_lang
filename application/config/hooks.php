<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/



/* End of file hooks.php */
/* Location: ./application/config/hooks.php */

 // create hook for multi langunage

$hook['post_controller_constructor'] = array(
    'class'    => 'Languageloader',
    'function' => 'initialize',
    'filename' => 'languageloader.php',
    'filepath' => 'hooks'
 );
$hook['pre_controller'] = array(
    'class'    => 'Check_Satff_Route',
    'function' => 'Check_Route',
    'filename' => 'Check_Satff_Route.php',
    'filepath' => 'hooks',
    'params'   => ''
 );