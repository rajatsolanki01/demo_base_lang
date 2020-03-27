<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

/*nik 11 1 2020 */
$route['admin.php']='admin/UsersAuth/login';
$route['Dashboard'] = 'admin/dashboard/home';
$route['logout'] = 'admin/UsersAuth/logout';
/*nik 15-1-20*/
$route['GeneralSetting'] = 'admin/GeneralSettings/generalSetting';
$route['ChangeAdminPassword'] = 'admin/GeneralSettings/changeAdminPassword';
$route['UserView'] = 'admin/Users/userView';
/*nik 20-1-20*/
$route['UserView/(:num)'] = 'admin/Users/userView/$1';
$route['UserApprove/(:any)/(:num)'] = 'admin/Users/userApprove/$1/$2';
$route['UserDetail/(:num)'] = 'admin/Users/userDetail/$1';
$route['DeleteUser/(:num)'] = 'admin/Users/deleteUser/$1';
/*nik 21-1-20*/
// $route['CustomerView'] = 'admin/Users/customerView';
$route['CustomerView/(:num)'] = 'admin/Users/customerView/$1';
$route['StatusCustomer/(:any)/(:num)'] = 'admin/Users/statusCustomer/$1/$2';
$route['CustomerDetails/(:num)'] = 'admin/Users/customerDetails/$1';
$route['DeleteCustomer/(:num)'] = 'admin/Users/deleteCustomer/$1';
$route['AJAXCustomerModel'] = 'admin/Users/aJAXCustomerModel';
/*nik 22-1-20*/
$route['PerDayUser'] = 'admin/Users/perDayUser';
$route['PerDayUser/(:num)'] = 'admin/Users/perDayUser/$1';
/*nik 23-1-20*/
$route['AddStaffUser'] = 'admin/Users/addStaffUser';
/*nik 24-1-20*/
$route['AJAXState'] = 'admin/Users/aJAXState';
$route['AJAXCity'] = 'admin/Users/AJAXCity';
$route['ViewStaffUsers'] = 'admin/Users/viewStaffUsers';
$route['ViewStaffUsers/(:num)'] = 'admin/Users/viewStaffUsers/$1';
$route['StaffUserApprove/(:any)/(:num)'] = 'admin/Users/staffUserApprove/$1/$2';
$route['EditStaffUser/(:num)'] = 'admin/Users/addStaffUser/$1';
$route['DeleteStaffUser/(:num)'] = 'admin/Users/deleteStaffUser/$1';
/*nik 25-1-20*/
$route['StaffUserDetail/(:num)'] = 'admin/Users/staffUserDetail/$1';
$route['ClassifiedProducts'] = 'admin/ClassifiedProducts/classifiedProductView';
/*nik 27-1-20*/
$route['CategoryApprove/(:any)/(:num)'] = 'admin/Categories/categoryApprove/$1/$2';
$route['CategoryDelete/(:num)'] = 'admin/Categories/categoryDelete/$1';
$route['CategoryEdit/(:num)'] = 'admin/Categories/categoryEdit/$1';

$route['StaticPage'] = 'admin/Staticpages/addStaticPage';
$route['StaticPage/(:num)'] = 'admin/Staticpages/addStaticPage/$1';
$route['StaticPageList'] = 'admin/Staticpages/sraticPageListing';
$route['StaticPageList/(:num)'] = 'admin/Staticpages/sraticPageListing/$1';
$route['CmsShowPages'] = 'admin/Staticpages/cmsShowPages';
$route['CmsPagesEdit/(:num)'] = 'admin/Staticpages/cmsPagesEdit/$1';
$route['Deleted/(:num)'] = 'admin/Staticpages/cmsDeleted/$1';
$route['NewslLst'] = 'admin/Newses/newsShow';
$route['NewslLst/(:num)'] = 'admin/Newses/newsShow/$1';
$route['NewsApproved/(:any)/(:num)'] = 'admin/Newses/newsApprove/$1/$2';
$route['NewsDelete/(:num)'] = 'admin/Newses/newsDelete/$1';
$route['NewsAdd'] = 'admin/Newses/newsAdd';
$route['NewsEdit/(:num)'] = 'admin/Newses/newsAdd/$1';

$route['Setlanguage'] = 'LanguageSwitcher/switchLang';

$route['HomeBanner/(:any)'] = 'admin/HomeBanners/homeBanner/$1';
$route['SuccessStorie'] = 'admin/SuccessStories/successStorie';
$route['ApproveStorie/(:any)/(:num)'] = 'admin/SuccessStories/approveStorie/$1/$2';
$route['StorieDelete/(:num)'] = 'admin/SuccessStories/storieDelete/$1';
$route['EditStorie/(:num)'] = 'admin/SuccessStories/editStorie/$1';
$route['userChangePassword'] = 'admin/Users/changePassword';

/***********tarun 1/20/2020*******************/
$route['SEO'] = 'admin/Seos/seo';
$route['SEO/(:num)'] = 'admin/Seos/seo/$1';
$route['edit_seo/(:num)'] = 'admin/Seos/add_seo/$1';
$route['show_seo_detail/(:num)'] = 'admin/Seos/show_seo_detail/$1';
$route['MailView'] = 'admin/Inquirys/customersmail';
$route['MailView/(:num)'] = 'admin/Inquirys/customersmail/$1';
$route['ViewInquiry/(:num)'] = 'admin/Inquirys/viewinquiry/$1';
$route['DeleteEmailInquiry/(:num)'] = 'admin/Inquirys/deleteEmailInquiry/$1';
$route['AdminInquiry'] = 'admin/Inquirys/adminInquiry';
$route['DeleteInquiry/(:num)'] = 'admin/Inquirys/deleteInquiry/$1';
$route['EMailTemplates'] = 'admin/Inquirys/showTemplates';
$route['EditMail/(:num)'] = 'admin/Inquirys/addEmail/$1';
$route['ShowCurrency'] = 'admin/Currencys/ShowCurrency';
$route['ShowCurrency/(:num)'] = 'admin/Currencys/ShowCurrency/$1';
$route['DeleteCurrency/(:num)'] = 'admin/Currencys/DeleteCurrency/$1';
$route['CurrencyApprove/(:any)/(:num)'] = 'admin/Currencys/CurrencyApprove/$1/$2';
$route['DefaultCurrency'] = 'admin/Currencys/DefaultCurrency';
$route['EditCurrency'] = 'admin/Currencys/ShowCurrency';
$route['AddCurrency'] = 'admin/Currencys/ShowCurrency';
$route['ShowLocation'] = 'admin/Locations/showLocation';
$route['ShowLocation/(:num)'] = 'admin/Locations/showLocation/$1';
$route['EditLocation'] = 'admin/Locations/editLocation';
/* Dated 24 03 2020 By RS */
$route['ViewCountry'] = 'admin/Locations/viewCountry';

$route['DeleteLocation/(:any)/(:any)'] = 'admin/Locations/DeleteLocation/$1/$2';
$route['LocationApprove/(:any)/(:any)'] = 'admin/Locations/LocationApprove/$1/$2';
$route['EditUser/(:num)'] = 'admin/Users/EditUser/$1';
$route['AJAXCityByName'] = 'admin/Users/AJAXCityByName';
$route['EditCustomer/(:num)'] = 'admin/Users/addCustomer/$1';
$route['EditCustomer'] = 'admin/Users/addCustomer';
// $route['resume/(:any)'] = 'admin/jobapplicants/downloadresume/$1';

/* Dated 22 01 2020 by Rajat */
$route['CategoryView/(:any)/(:num)'] = 'admin/Categories/categoryView/$1/$2';
$route['CategoryView/(:any)'] = 'admin/Categories/categoryView/$1';
?>