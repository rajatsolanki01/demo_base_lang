<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class BaseController_front extends CI_Controller {
	protected $role = '';
	protected $vendorId = '';
	protected $name = '';
	protected $roleText = '';
	protected $global = array ();
	
	public function __construct()
    {
        parent::__construct();	
      	//$this->lang->load('message','english');
      	// $this->load->model('languageswitcher');
        // $this->languageswitcher->switchLang("front","english");
      	// $this->load->helper('custom_constants');
	}
	
	
	
	/**
	 * Takes mixed data and optionally a status code, then creates the response
	 *
	 * @access public
	 * @param array|NULL $data
	 *        	Data to output to the user
	 *        	running the script; otherwise, exit
	 */
	public function response($data = NULL) {
		$this->output->set_status_header ( 200 )->set_content_type ( 'application/json', 'utf-8' )->set_output ( json_encode ( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) )->_display ();
		exit ();
	}
	
	/**
	 * This function used to check the user is logged in or not
	 */
	function userisLoggedIn() {
		$userisLoggedIn = $this->session->userdata ( 'userisLoggedIn' );
		
		if (! isset ( $userisLoggedIn ) || $userisLoggedIn != TRUE) {
			redirect ( 'login' );
		} else {
			$this->role = $this->session->userdata ( 'role' );
			$this->vendorId = $this->session->userdata ( 'userId' );
			$this->name = $this->session->userdata ( 'name' );
			$this->roleText = $this->session->userdata ( 'roleText' );
			
			$this->global ['name'] = $this->name;
			$this->global ['role'] = $this->role;
			$this->global ['role_text'] = $this->roleText;
		}
	}
	
	/**
	 * This function is used to check the access
	 */
	function isAdmin() {
		if ($this->role != ROLE_ADMIN) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * This function is used to check the access
	 */
	function isTicketter() {
		if ($this->role != ROLE_ADMIN || $this->role != ROLE_MANAGER) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * This function is used to load the set of views
	 */
	function loadThis() {
		$this->global ['pageTitle'] = 'Admin : Access Denied';
		$this->load->view ( 'includes/header', $this->global );
		$this->load->view ( 'access' );
		$this->load->view ( 'includes/footer' );
	}
	
	/**
	 * This function is used to logged out user from system
	 */
	function logout() {
		$this->session->sess_destroy ();
		
		redirect ( 'login' );
	}

	/**
     * This function used to load views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
    function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){


        $this->load->view('includes/header', $headerInfo);
		
        if($viewName=='show_products' || $viewName=='show_seller' || $viewName=='trade_lead_cats')
        {	
        	$this->load->view('left_menu',$pageInfo);
        }
        $this->load->view($viewName, $pageInfo);
        $this->load->view('includes/footer', $footerInfo);
    }
	
	function company_data($column){

     $this->load->helper('functions_helper');
	 $companyRecord=siteDetail();
	 foreach ($companyRecord as $key => $val) {
       if ($key==$column) {
           return $val;
       }
   }
   return NULL;	
	
    }
	
	/**
	 * This function used provide the pagination resources
	 * @param {string} $link : This is page link
	 * @param {number} $count : This is page count
	 * @param {number} $perPage : This is records per page limit
	 * @return {mixed} $result : This is array of records and pagination data
	 */
	function paginationCompress($link, $count, $perPage = 10,$URI_SEGMENT,$segment=NULL) {
		$this->load->library ( 'pagination' );
		 $this->load->helper('functions_helper');
	 $companyRecord=siteDetail();
	 if(isset($companyRecord->page_rows))
	 {
		$perPage=$companyRecord->page_rows;

	 }	
	$config['reuse_query_string'] = true;
	if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
	else
	$config['suffix']='';
		$config ['base_url'] = base_url () . $link;
		$config ['total_rows'] = $count;
		$config ['uri_segment'] = SEGMENT;
		$config ['per_page'] = $perPage;
		$config ['num_links'] = 5;
		$config ['full_tag_open'] = '<nav><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li class="arrow">';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="arrow">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li class="arrow">';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li class="arrow">';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';
		$config['first_url'] = $config['base_url'] . $config['suffix'];
	
		$this->pagination->initialize ( $config );
		$page = $config ['per_page'];
		$segment = $this->uri->segment ( SEGMENT );
	
		return array (
				"page" => $page,
				"segment" => $segment
		);
	}
	function paginationCompressDemo($link, $count, $perPage = 10,$URI_SEGMENT) {
		$this->load->library ( 'pagination' );
		$this->load->helper('functions_helper');
  		$companyRecord=siteDetail(); 
 		$perPage=$companyRecord->page_rows;
		$config ['base_url'] = base_url () . $link;
		$config ['total_rows'] = $count;
		$config ['uri_segment'] = 4;
		$config ['per_page'] = $perPage;
		$config ['num_links'] = 5;
		$config ['full_tag_open'] = '<nav><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li class="arrow">';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="arrow">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li class="arrow">';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li class="arrow">';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';
	
		$this->pagination->initialize ( $config );
		$page = $config ['per_page'];
		$segment = $this->uri->segment ($URI_SEGMENT);
		$segment = $URI_SEGMENT;
	
		return array (
				"page" => $page,
				"segment" => $segment
		);
	}
	
	
	// Check user login or not
	function is_index_login()
	{
		// echo "string";exit();
		if($this->session->userdata['user_id']=='')
		{
			redirect("login.html");
		}
	}

	/*=========================Genrate Captcha=========================================*/
	public function gen_captcha()
        {
	        array_map('unlink', glob("./assets/captcha/*.jpg"));    //delete old files

            $a_z = explode(" ","a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z");
            shuffle($a_z);
            $string_rand="";        //string rand
            foreach(array_rand($a_z,4) as $key=>$value)
            {
                    $string_rand.=$a_z[$key];
            }

            $number_rand = rand(1000,9999); //number rand
            
            $random =  strtoupper($string_rand).$number_rand; //concat random aphabat and number

        	$this->load->helper('captcha');
        	$vals = array(
                'word'          => $random,
                'img_path'      => './assets/captcha/',
                'img_url'       => base_url().'assets/captcha/',
                'font_path'     => './assets/fonts/texb.ttf');

        $cap = create_captcha($vals);
        $this->session->set_userdata('security_code',md5($cap['word']));

        // $this->session->userdata['security_code'] =md5($cap['word']); 
        //print_r($cap['word']);exit();
        return $cap['image'];
        }
	/*=========================END=========================================*/
	
}