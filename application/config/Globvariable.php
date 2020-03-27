<?php
	/* Dated 17 03 20 By RS */
	if (liveName != "beediv")
	{
		echo "Alert Message and we can send a mail or any alert to Company.";
		exit();
	}
	/*nik 11-1-20*/
	$CI = get_instance();
	$curr_page_name = $CI->uri->segment(1);
	$curr_page_name = explode("-", $curr_page_name)[0];
	$gAction = $CI->router->fetch_method();
	$config['gAction'] = $gAction;
	$config['gcurrPageName'] = $curr_page_name;
	$livemode=liveMode;
	$demo_mode=demoMode;
	$config['gAdminCurrency'] = AdminCurrency;
	$config['gStaffPrivilege'] = StaffPrivilege;
	$config['gServiceNoOff'] = serviceNoOff;
	
	
	
	$serviceNoOff='NO';
	$config['gServiceNoOff'] = $serviceNoOff;
	
	$CI->db->select("*");
	$CI->db->where(array("id"=>"1"));
	$query = $CI->db->get("generalsetting");
	
	if(count($query->result()))
	{
		$config['gGeneralSetting'] = $query->result();
		$generalsetting = $query->row();
		$config['gFacebookOnOff'] = $generalsetting->facebook_status;
		$config['gTwitterOnOff'] = $generalsetting->twitter_status;
		$config['gGpluseOnOff'] = $generalsetting->gpluse_status;
		$config['gFacebookLink'] = $generalsetting->facebook;
		$config['gTwitterLink'] = $generalsetting->twitter;
	 	$config['gGpluseLink'] = $generalsetting->gpluse;
	 	$config['gGVerification'] = $generalsetting->google_verification;
	 	$config['gGoogleMapKey'] = $generalsetting->google_map_key;
	 	$config['gGoogleAnalytic'] = $generalsetting->google_analytic;
	
		 // define('twitter_onOff', $config['gTwitterOnOff']);
		 // define('gpluse_onOff', $config['gGpluseOnOff']);
		 // define('facebook_Link', $config['gFacebookLink']);
		 // define('twitter_Link', $config['gTwitterLink']);
		 // define('gpluse_Link', $config['gGpluseLink']);
	}
	 
	// SMTP CONFIGRATION DATA INFO - Dated 14 02 2020 By Rajat
	$q="select * from smtp_configuration where id=1";
	$rec=$CI->db->Query($q);
	$smtp_data=$rec->result_array();
	//id smtp_onoff smtp_port smtp_secure smtp_host smtp_user_name smtp_password 
	if($smtp_data[0]['smtp_onoff']=='Y')
	{		
		$config['smtp_port'] = $smtp_data[0]['smtp_port']; //  Sets the default SMTP server port.
		$config['smtp_secure'] = $smtp_data[0]['smtp_secure']; //  Options are "", "ssl" or "tls"
		$config['smtp_host'] = $smtp_data[0]['smtp_host']; // SMTP server
		$config['smtp_user_name'] = $smtp_data[0]['smtp_user_name'];  // Sets SMTP username.
		$config['smtp_password'] = $smtp_data[0]['smtp_password'];  //Sets SMTP password.
	}
	else
	{
		$config['smtp_port'] = "";
		$config['smtp_secure'] = "";
		$config['smtp_host'] = "";
		$config['smtp_user_name'] = "";
		$config['smtp_password'] = "";
	}

	//set title, keyword, description
	$gclassname = $CI->router->fetch_class();
	$CI->db->select("*");
	if($gclassname=='Classifieds')
		$CI->db->where(array("id"=>"6"));
	elseif($gclassname=='FrontProducts')
		$CI->db->where(array("id"=>"5"));
	elseif($gclassname=='Sellers')
		$CI->db->where(array("id"=>"2"));
	elseif($gclassname=='Trades_show')
		$CI->db->where(array("id"=>"4"));
	elseif($gclassname=='Buy_requirement_front')
		$CI->db->where(array("id"=>"3"));
	elseif($gclassname=='Categorys')
		$CI->db->where(array("id"=>"1"));
	else
		$CI->db->where(array("id"=>"7"));
	$query = $CI->db->get("seo");
	if(count($query->result()))
	{
		$item = $query->result();
		$config['gMetaTitle'] = $item[0]->title;
		$config['gMetaKey'] = $item[0]->keyword;
		$config['gMetaDesc'] = $item[0]->des;
	}

	$max=15;
	$config['gCurrentdate'] = date("Y-m-d");
	// There define global variables for domail company details	
	$CI->db->select("*");
	$CI->db->where(array("id"=>"1"));
	$query = $CI->db->get("site_config");
	
	if(count($query->result()))
	{
		$configdata = $query->row();
		$default_time_zone=$configdata->default_time_zone;
		$company_name=$configdata->company_name;
		$company_address=$configdata->company_address;
		$phone=$configdata->phone;
		$fax=$configdata->fax;
		$SITE_EMAIL=$configdata->email;
		$LOGO=$configdata->logo;
		$langitude=$configdata->langitude;
		$latitude=$configdata->latitude;
		$support_email=$configdata->support_email;
		$webmaster_email=$configdata->webmaster_email;
		$page_row=$configdata->page_row;
		$site_onoff=$configdata->site_onoff;
		$cc_avenue_onoff=$configdata->cc_avenue_onoff;
		$chekout_onoff=$configdata->chekout_onoff;
		$interswitch_on_off=$configdata->interswitch_on_off;
		$payumoney_on_off=$configdata->payumoney_on_off;
		$paypal_no_off=$configdata->paypal_no_off;
		$under_construction=$configdata->under_construction;
		$paid_amt=$configdata->paid_amt;
		$Paypal_Email=$configdata->paypalemail;
		$chekout_email=$configdata->chekout_email;
		$cc_working_key=$configdata->cc_working_key;
		$cc_merchant_id=$configdata->cc_merchant_id;
		// $two_chekout_key="$configdata->2chekout_key";
		// $two_chekout_sid="$configdata->2chekout_sid";
		$payu_key=$configdata->payu_key;
		$payu_salt=$configdata->payu_salt;
		$auto_approval=$configdata->auto_approval;
		$perPage=$configdata->page_row;

		$config['gDefaultTimeZone'] = $default_time_zone;
		$config['gDemoMode'] = $demo_mode;
		$config['gAutoApproval'] = $auto_approval;
		$config['gCCAvenueOnOff'] = $configdata->cc_avenue_onoff;
		$config['gChekoutOnOff'] = $configdata->chekout_onoff;
		$config['gInterswitchOnOff'] = $configdata->interswitch_on_off;
		$config['gPayukey'] = $configdata->payu_key;
		$config['gPayuSalt'] = $configdata->payu_salt;
		$config['gCompanyName'] = $configdata->company_name;
		$config['gLangitude'] = $configdata->langitude;
		$config['gLatitude'] = $configdata->latitude;
		$config['gPayumoneyOnOff'] = $configdata->payumoney_on_off;
		$config['gPaypalNoOff'] = $configdata->paypal_no_off;
		$config['gCompanyAddress'] = $configdata->company_address;
		$config['gPhone'] = $configdata->phone;
		$config['gFax'] = $configdata->fax;
		$config['gSiteEmail'] = $configdata->email;
		// $config['g admin_url'] = $admin_url);
		
		$config['gSupportEmail'] = $configdata->support_email;
		$config['gWebmasterEmail'] = $configdata->webmaster_email;
		$config['gPageRow'] = $configdata->page_row;
		$config['gPaidAmt'] = $configdata->paid_amt;
		$config['gLOGO'] = $configdata->logo;
		// $config['gWebName'] = $web_name;
		$config['gPaypalEmail'] = $Paypal_Email;
		$config['gChekoutEmail'] = $chekout_email;
		$config['gCCWorkingKey'] = $configdata->cc_working_key;
		$config['gCCMerchantId'] = $configdata->cc_merchant_id;
		$config['gPerPage'] = $perPage;
		$site_url = base_url();
		$config['gSiteUrl'] = $site_url;

		date_default_timezone_set($default_time_zone);
		$config['gCurrentDate']=date("Y-m-d");
		$config['gCurrentTime']=date("h:m");	
		
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on")
			$ssl_set = "s";
		else
			$ssl_set = "";
		if($livemode==true)
		{		
			$subdomain= '';
			// $site_url="http://beediv.com"; //"http://www.aliclonepro.biz";
			if(SUBDOMAIN !='')
			{
				$CI->db->select("sub_domain");
				$CI->db->where(array("sub_domain"=>SUBDOMAIN,"deleted"=>'N'));
				$query = $CI->db->get("customer");
				if($query->num_rows())
				{
					$sub_domain_data = $query->row();
					$subdomain=$sub_domain_data->sub_domain.'.';
				}
				else{
					$subdomain= '';
				}				
			}
				//echo $subdomain;exit;
				$web_name="http".$ssl_set."://".$subdomain.liveDomainName."/";//".aliclonepro.biz"; 
				$sub_url=liveDomainName; //"aliclonepro.biz";
		}
		else
		{
			$subdomain= '';
			//echo "rsSUBDOMAIN";exit;
			if(SUBDOMAIN !='')
			{
				$CI->db->select("sub_domain");
				$CI->db->where(array("sub_domain"=>SUBDOMAIN,"deleted"=>'N'));
				$query = $CI->db->get("customer");
				if($query->num_rows())
				{
					$sub_domain_data = $query->row();
					$subdomain=$sub_domain_data->sub_domain.'.';
				}
				else{
					$subdomain= '';
				}				
			}
				// echo $subdomain;exit;
				$web_name="http".$ssl_set."://".$subdomain.liveDomainName."/";//".aliclonepro.biz"; 
				$sub_url=liveDomainName; 
		}
		$config['gSubUrl'] = $sub_url;
		$config['gWebname'] = $web_name;
	
		// define('company_email', $config['gSiteEmail']);
		// define('auto_approval', $config['gAutoApproval']);
		// define('company_name', $config['gCompanyName']);
	}

	
	
	$CURRENCY_JSON=file_get_contents('currency_management.json');
	$CURRENCY_DATA=json_decode($CURRENCY_JSON,true);
	// print_r($CURRENCY_DATA);
	if(empty($CI->session->userdata['select_currency']))
		$CI->session->userdata['select_currency']=1;

	$C_MULTY=$CURRENCY_DATA[$CI->session->userdata['select_currency']]['USD_VALUE'];
	if($config['gAdminCurrency']!='yes')
	{
		$DEFAULTCURRENCY=$CURRENCY_DATA[$CI->session->userdata('select_currency')]['SYMBOL'];
		$config['gDEFAULTCURRENCY'] = $DEFAULTCURRENCY;
	}
	$config['gCURRENCYDATA'] = $CURRENCY_DATA;
	// $config['C_MULTY'] = $C_MULTY;

	/**  Default Currency **/
	if($config['gAdminCurrency']=='yes')
	{
		$CI->db->select("symbol");
		$CI->db->where(array("defcurr_val"=>'Y','status'=>'Y','deleted'=>'N'));
		$query = $CI->db->get("currency");
		$DEFAULTCURRENCY = $query->row();
		$DEFAULTCURRENCY = $DEFAULTCURRENCY->symbol;
		$config['gDEFAULTCURRENCY'] = $DEFAULTCURRENCY; 
	}
	// define('DEFAULTCURRENCY',$DEFAULTCURRENCY);
	



/* payment_sitting */
$config['gPaypal'] = Paypal;
$config['gCcavanue'] = Ccavanue;
$config['gCheckout'] = Checkout;
$config['gPayuMoney'] = PayuMoney;
// $config['gPayubiz'] = false;
	


/*  Custom_constants helper file work*/
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$config['gActualLink'] = $actual_link;
/*===================End site Config==========================*/

/*==========listing include File=============*/	
	$reg_yrs=array("2018","2017","2016","2015","2014","2013","2012","2011","2010", "2009", "2008", "2007", "2006", "2005", "2004", "2003", "2002", "2002", "2001", "2000", "1999", "1998", "1997", "1996", "1995", "1994", "1993", "1992", "1991", "1990", "1989", "1988", "1987", "1986", "1985", "1984", "1983", "1982", "1981", "1980", "1979", "1978", "1977", "1976", "1975", "1974", "1973", "1972", "1971", "1970", "1969", "1968", "1967", "1966", "1965", "1964", "1963", "1962", "1961", "1960", "1959", "1958", "1957", "1956", "1955", "1954", "1953", "1952", "1951", "1950", "1949", "1948", "1947", "1946", "1945", "1944", "1943", "1942", "1941", "1940", "1939", "1938", "1937", "1936", "1935", "1934", "1933", "1932", "1931", "1930", "1929", "1928", "1927", "1926", "1925", "1924", "1923", "1922", "1921", "1920", "1919", "1918", "1917", "1916", "1915", "1914", "1913", "1912", "1911", "1910", "1909", "1908", "1907", "1906", "1905", "1904", "1903", "1902", "1901", "1900");
$config['gRegYrs'] = $reg_yrs;

/************ emp_det *******************/	
	$emp_det=array("Less than 5 People", "5-10 Pecitydataople", "11-50 People", "51-100 People", "101-500 People", "501-1000 People", "Above 1000 People");
$config['gEmpDet'] = $emp_det;
/************ Own Type *******************/	
	$own_type=array("Corporation/Limited Liability Company", "Partnership", "LLC (Ltd Liability Corp)", "Individual (Sole proprietorship)", "Professional Association", "Others");
$config['gOwnType'] = $own_type;
/************ Certification *******************/
	$certification=array("HACCP", "ISO 9001:2000", "ISO 9001:2008", "QS-9000", "ISO 14001:2004", "ISO/TS 16949", "SA8000", "ISO 17799", "OHSAS 18001", "TL 9000", "Others");	
$config['gCertification'] = $certification;

?>