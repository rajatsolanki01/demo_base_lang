<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


include('routes_admin.php');

$route['user/(:any)'] = "home/userhome";
$route['default_controller'] = "home/show_home";
$route['404_override'] = '';
$route['home'] = 'home/show_home';

$route['send_inq'] = 'Mail_index/send_inq';
$route['Customer.html'] = 'Sellers/ShowCustomer';
$route['Customer.html/(:num)'] = 'Sellers/ShowCustomer/$1';
$route['aboutus.html'] = 'Mart_Home/about_us'; 
$route['termscondition.html'] = 'Mart_Home/termsconditions';
$route['privacy_policy.html'] = 'Mart_Home/privacy_policys';
$route['show_news_list.html'] = 'News/show_list';
$route['contactus.html'] = 'Mart_Home/contactsus';
$route['email_account.html'] = 'Mail/show_mail_status';
$route['mail_detail/(:num)/(:num)/(:num)/(:any)'] = 'Mail/view_mail/$1/$2/$3/$4';
$route['forgot.html'] = 'Mart_Home/forgot';
$route['forgot-(:num).html'] = 'Mart_Home/forgot';
$route['login.html'] = 'Usersauth/login';
$route['logout.html'] = 'Usersauth/logout';
$route['login-(:num).html'] = 'Usersauth/login/$1';

$route['ShowSellerCompnayProfile-(:any)'] = 'Clients_front/show_clients/$1';

$route['registration-(:num).html'] = 'Clients_front/registration/$1';
$route['show_myaccount-.html'] = 'Myaccounts/show_myaccount';
$route['show_myaccount.html'] = 'Myaccounts/show_myaccount';
$route['show_myaccount-(:num).html'] = 'Myaccounts/show_myaccount/$1';
$route['view_company_profile.html'] = 'Myaccounts/view_company_profile';
$route['edit_company_profile.html'] = 'Myaccounts/edit_company_profile';
$route['change_password.html'] = 'Myaccounts/change_password';
$route['view_trade_productions.html'] = 'Myaccounts/view_trade_productions';
$route['myaccount_gallery.html'] = 'Myaccounts/myaccount_gallery';
$route['myaccount_gallery-(:num).html'] = 'Myaccounts/myaccount_gallery/$1';
$route['edit_personal_profile.html'] = "Myaccounts/edit_personal_profile";
$route['view_personal_profile.html'] = "Myaccounts/view_personal_profile";
$route['state'] = 'Clients_front/select_state';
$route['city'] = 'Clients_front/select_city';	
// $route['micro_design.html'] = 'Setmicrodesigns/set_design_micro';
$route['reload_captcha'] = 'Clients_front/reloadCaptcha';
$route['country_list.html'] = 'Categorys/country_list'; 
$route['get_quote/(:num).html'] = 'Buy_requirement_myaccount/quoteList/$1';
$route['all_categories.html'] = "FrontProducts/show_products";
$route['search.html'] = 'home_searchs/home_search'; 
$route['Setlanguage'] = 'LanguageSwitcher/switchLang';
$route['SetUpdatelanguage'] = 'LanguageSwitcher/switchUpdateLang';
$route['SetCountyType'] = 'LanguageSwitcher/switchCountryType';
?>
