<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Generalsetting extends CI_Model
{
    function getSiteConfig()
    {
        $this->db->select('*, 2chekout_key as chekoutKey2,2chekout_sid as chekoutSId2');
        $this->db->from('site_config');        
        $this->db->where(array("id"=>1, "lang_type"=>$this->session->userdata("user_lang")));
        $query = $this->db->get();
        return $query->row(); 
    }
    function getSiteConfig2()
    {
        $this->db->select('*, 2chekout_key as chekoutKey2,2chekout_sid as chekoutSId2');
        $this->db->from('site_config');        
        $this->db->where(array("id"=>1, "lang_type"=>$this->session->userdata("data_update_lang")));
        $query = $this->db->get();
        return $query->row(); 
    }

    function getGeneralSetting()
    {
        $this->db->select('*');
        $this->db->from('generalsetting');
        $this->db->where('id',1);
        $query = $this->db->get();
        return $query->row(); 
    }
    function getSmtpConfiguration()
    {        
        $this->db->select('*');
        $this->db->from('smtp_configuration');
        $this->db->where('id',1);
        $query = $this->db->get();
        return $query->row(); 
    }
    public function getPassword()
    {
        $this->db->select('password');
        $this->db->where('id', 1);
        $query = $this->db->get('admin');
        return $query->row();
    }
    function updateAdminPass($userName,$pass)
    {  
        $newpass = md5($pass);
        $data_edit = array('user_name' => $userName, 'password' => $newpass);
        $this->db->where(array("id"=>1));
        $query = $this->db->update('admin', $data_edit);
    }
    
    function insertSiteConfig($data_input)
    {       
        extract($data_input);
        $data_edit = array('company_name' => $company_name, 'company_address' => $company_address, 'phone' => $phone, 'fax' => $fax, 'email' => $email, 'site_url' => $site_url, 'support_email' => $support_email, 'webmaster_email' => $webmaster_email, 'page_row' => $page_row, 'auto_approval' => $auto_approval, 'langitude' => "", 'latitude' => "", 'default_time_zone' => $default_time_zone, "lang_type"=>$this->session->userdata("data_update_lang"), "id"=>"1");
        $query = $this->db->insert('site_config', $data_edit);
        return $query;
    }

    function updateSiteConfig($data_input)
    {       
        extract($data_input);
        $data_edit = array('company_name' => $company_name, 'company_address' => $company_address, 'phone' => $phone, 'fax' => $fax, 'email' => $email, 'site_url' => $site_url, 'support_email' => $support_email, 'webmaster_email' => $webmaster_email, 'page_row' => $page_row, 'auto_approval' => $auto_approval, 'langitude' => "", 'latitude' => "", 'default_time_zone' => $default_time_zone);
        $where = array('id'=>1, "lang_type"=>$this->session->userdata("data_update_lang"));
        $this->db->where($where);
        $query = $this->db->update('site_config', $data_edit);
        return $query;
    }
    function updateSiteConfigPayment($data_input)
    {   
        extract($data_input);
        
        $bank_matter=str_replace('\r\n','',$_POST['bankdetail_editor']);
        $bank_matter = stripslashes($bank_matter) ;
        $bank_matter=addslashes($bank_matter);

        $data_edit = array('bankdetail' => $bank_matter);
        
        if(isset($paypalemail))
        {
            $data_edit += ['paypalemail' => $paypalemail, 'paypal_no_off' => $paypal_no_off];
        }
        if(isset($cc_avenue_onoff))
        {
            $data_edit += ['cc_avenue_onoff' => $cc_avenue_onoff, 'cc_working_key' => $cc_working_key , 'cc_merchant_id' => $cc_merchant_id];
        }
        if(isset($chekout_onoff))
        {
            $data_edit += ['chekout_onoff' => $chekout_onoff, 'chekout_email' => $chekout_email , '2chekout_key' => $data_input['2chekout_key'], '2chekout_sid' => $data_input['2chekout_sid']];
        }
        if(isset($payumoney_on_off))
        {
            $data_edit += ['payumoney_on_off' => $payumoney_on_off, 'payu_key' => $payu_key , 'payu_salt' => $payu_salt];
        }
        $where = array('id'=>1, "lang_type"=>$this->session->userdata("data_update_lang"));
        $this->db->where($where);// ()  (array("id"=>1));
        $query = $this->db->update('site_config', $data_edit);
        return $query;
    }

    function insertSiteConfigPayment($data_input)
    {   
        extract($data_input);
        
        $bank_matter=str_replace('\r\n','',$_POST['bankdetail_editor']);
        $bank_matter = stripslashes($bank_matter) ;
        $bank_matter=addslashes($bank_matter);

        $data_edit = array('bankdetail' => $bank_matter);
        
        if(isset($paypalemail))
        {
            $data_edit += ['paypalemail' => $paypalemail, 'paypal_no_off' => $paypal_no_off];
        }
        if(isset($cc_avenue_onoff))
        {
            $data_edit += ['cc_avenue_onoff' => $cc_avenue_onoff, 'cc_working_key' => $cc_working_key , 'cc_merchant_id' => $cc_merchant_id];
        }
        if(isset($chekout_onoff))
        {
            $data_edit += ['chekout_onoff' => $chekout_onoff, 'chekout_email' => $chekout_email , '2chekout_key' => $data_input['2chekout_key'], '2chekout_sid' => $data_input['2chekout_sid']];
        }
        if(isset($payumoney_on_off))
        {
            $data_edit += ['payumoney_on_off' => $payumoney_on_off, 'payu_key' => $payu_key , 'payu_salt' => $payu_salt];
        }
        $data_edit +=["lang_type"=>$this->session->userdata("data_update_lang"), "id"=>"1"];
        $query = $this->db->insert('site_config', $data_edit);
        return $query;
    }

    function updateGeneralSocialSetting($data_input)
    {   
        extract($data_input);
        $data_edit = array('facebook' => $facebook,  'twitter' => $twitter, 'gpluse' => $gpluse, 'facebook_status' => $facebook_status, 'twitter_status' => $twitter_status, 'gpluse_status' => $gpluse_status, 'pinterest' => $pinterest, 'pinterest_status' => $pinterest_status, 'linkedin' => $linkedin, 'linkedin_on_off' => $linkedin_on_off, 'youtube_on_off' => $youtube_on_off, 'youtube' => $youtube);
        $this->db->where(array("id"=>1));
        $query = $this->db->update('generalsetting', $data_edit);
    }
    function updateSmtpConfiguration($data_input)
    {   
        extract($data_input);
        $data_edit = array('smtp_onoff' => $smtp_onoff, 'smtp_port' => $smtp_port, 'smtp_secure' => $smtp_secure, 'smtp_host' => $smtp_host, 'smtp_user_name' => $smtp_user_name, 'smtp_password' => $smtp_password);
        $this->db->where(array("id"=>1));
        $query = $this->db->update('smtp_configuration', $data_edit);
    }
    function updateGeneralGoogleMapSetting($data_input)
    {  
        extract($data_input);
        $data_edit = array('google_map_key' => $google_map_key, 'google_verification' => $google_verification, 'google_analytic' => $google_analytic, 'google_addsense' => $google_addsense, 'copyright' => $copyright);
        $this->db->where(array("id"=>1));
        $query = $this->db->update('generalsetting', $data_edit);
    }
    function insertSiteConfigStatus($data_input)
    {  
        extract($data_input);
        $data_edit = array('site_onoff' => $site_onoff, 'under_construction' => $under_construction, "lang_type"=>$this->session->userdata("data_update_lang"), "id"=>"1");
        $query = $this->db->insert('site_config', $data_edit);
    }
    function updateSiteConfigStatus($data_input)
    {  
        extract($data_input);
        $data_edit = array('site_onoff' => $site_onoff, 'under_construction' => $under_construction);
        $where = array('id'=>1, "lang_type"=>$this->session->userdata("data_update_lang"));
        $this->db->where($where);
        $query = $this->db->update('site_config', $data_edit);
    }
    function updateGeneralEmailConSetting($data_input)
    {  
        extract($data_input);
        $data_edit = array('conformatioemail_onoff' => $conformatioemail_onoff);
        $this->db->where(array("id"=>1));
        $query = $this->db->update('generalsetting', $data_edit);
    }
    function updateSiteConfigFileUpload($fileName)
    {  
        extract($data_input);
        $data_edit = array('logo' => $fileName);
        $this->db->where(array("id"=>1));
        $query = $this->db->update('site_config', $data_edit);
    }
	
    function getTimeZoneDropdown($last_Set_time_zone=null)
	{
        //===============set time zone array===============
        $timezone_arr = array("Kwajalein" => "(GMT -12:00) Eniwetok, Kwajalein",
        "Pacific/Midway" => "(GMT -11:00) Midway Island, Samoa",
        "Pacific/Honolulu" => "(GMT -10:00) Hawaii",
        "America/Anchorage" => "(GMT -9:00) Alaska",
        "America/Los_Angeles" => "(GMT -8:00) Pacific Time (US &amp; Canada)",
        "America/Denver" => "(GMT -7:00) Mountain Time (US &amp; Canada)",
        "America/Tegucigalpa" => "(GMT -6:00) Central Time (US &amp; Canada), Mexico City",
        "America/New_York" => "(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima",
        "America/Halifax" => "(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz",
        "America/St_Johns" => "(GMT -3:30) Newfoundland",
        "America/Argentina/Buenos_Aires" => "(GMT -3:00) Brazil, Buenos Aires, Georgetown",
        "Atlantic/South_Georgia" => "(GMT -2:00) Mid-Atlantic",
        "Atlantic/Azores" => "(GMT -1:00 hour) Azores, Cape Verde Islands",
        "Europe/Dublin" => "(GMT) Western Europe Time, London, Lisbon, Casablanca",
        "Europe/Belgrade" => "(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris",
        "Europe/Minsk" => "(GMT +2:00) Kaliningrad, South Africa",
        "Asia/Kuwait" => "(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg",
        "Asia/Tehran" => "(GMT +3:30) Tehran",
        "Asia/Muscat" => "(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi",
        "Asia/Kabul" => "(GMT +4:30) Kabul",
        "Asia/Yekaterinburg" => "(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent",
        "Asia/Kolkata" => "(GMT +5:30) Bombay, Calcutta, Madras, New Delhi",
        "Asia/Dhaka" => "(GMT +6:00) Almaty, Dhaka, Colombo",
        "Asia/Krasnoyarsk" => "(GMT +7:00) Bangkok, Hanoi, Jakarta",
        "Asia/Brunei" => "(GMT +8:00) Beijing, Perth, Singapore, Hong Kong",
        "Asia/Seoul" => "(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk",
        "Australia/Darwin" => "(GMT +9:30) Adelaide, Darwin",
        "Australia/Canberra" => "(GMT +10:00) Eastern Australia, Guam, Vladivostok",
        "Asia/Magadan" => "(GMT +11:00) Magadan, Solomon Islands, New Caledonia",
        "Pacific/Fiji" => "(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka"
        );

        $output='';
        foreach( $timezone_arr as $key=>$value) 
        {
            if($last_Set_time_zone==$key)
                $output .= '<option value="'.$key.'" selected="selected">'.$value.'</option>';
            else
                $output .= '<option value="'.$key.'">'.$value.'</option>';
        }
        
        return $output;
	}
}
?>