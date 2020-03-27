<?php
defined('BASEPATH') OR exit('Not direct script access allowed');
class GeneralSettings extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $adminLoggedIn = $this->session->userdata('adminLoggedIn');
        if($adminLoggedIn=='' || $adminLoggedIn!=TRUE)
        {   
            redirect(base_url().'admin.php','refresh');
        }
        $this->load->model("admin/generalsetting");
        $this->load->config('Globvariable');
    }

    public function generalSetting()
    {        
        if(isset($_REQUEST['messge']))
        {
            $error=$_REQUEST['messge'];
            
            $objSmarty->assign("error", $error);
        }
        $data["recordExistForLang"]=0;
        $data["recordExistForLang"] = hCheckRecordExistForLang("1", $this->session->userdata("data_update_lang"), "site_config");
        $SiteConfigData = $this->generalsetting->getSiteConfig();
        $data['site_config'] = $SiteConfigData;
        $data['site_config_curr_lang'] = $this->generalsetting->getSiteConfig2();
       
        $time_zone_dropdown = $this->generalsetting->getTimeZoneDropdown($SiteConfigData->default_time_zone);
        $data['time_zone_dropdown'] = $time_zone_dropdown;
     
        $generalsettingData = $this->generalsetting->getGeneralSetting();
        $data['generalsetting'] = $generalsettingData;
        
        
        //===================for smtp configuration=======================//
        $smtpsetting = $this->generalsetting->getSmtpConfiguration();
        $data['smtpsetting'] = $smtpsetting;
        
        if(isset($_REQUEST['btn_sitconfig']))
        { 
            $this->form_validation->set_rules('company_name', 'Company Name', 'required');
            $this->form_validation->set_rules('company_address', 'Company Address', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|min_length[10]');
            $this->form_validation->set_rules('fax', 'Fax', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('support_email', 'Support Email', 'required|valid_email');
            $this->form_validation->set_rules('webmaster_email', 'Webmaster Email', 'required|valid_email');
            $this->form_validation->set_rules('page_row', 'Page Row', 'required|numeric');
            $this->form_validation->set_rules('default_time_zone', 'Set Default Time Zone', 'required');
            $this->form_validation->set_rules('auto_approval', 'Auto Approval', 'required');
            if($this->form_validation->run()==true)//if validation get errors
            {//print_r($this->input->post());exit();
                $data_input = $this->input->post();
                $data_input['id'] = 1;
                $data_input['lang_type'] = $this->session->userdata("data_update_lang");
                if ($data["recordExistForLang"]=="0")
                    $this->generalsetting->insertSiteConfig($data_input);
                else
                {                    
                    $site_config = $this->generalsetting->updateSiteConfig($data_input);                    
                }                
                $this->session->set_flashdata('GeneralSettingsMsg', 'Successfully Update Site Details');
            }
        }
        
        if(isset($_REQUEST['btn_payment']))
        {

            if($this->config->item('gPaypal')=='true')
            {
                $this->form_validation->set_rules('paypal_no_off', 'Paypal ON/off', 'required');
                $this->form_validation->set_rules('paypalemail', 'paypal email', 'required|valid_email');
            }
            if($this->config->item('gCcavanue')=='true')
            {
                $this->form_validation->set_rules('cc_avenue_onoff', 'CC Avenue ON/off', 'required');
                $this->form_validation->set_rules('cc_working_key', 'CC Avenue WorkingKey', 'required');
                $this->form_validation->set_rules('cc_merchant_id', 'CC Avenue Merchant Id', 'required');
            }
            if($this->config->item('gCheckout')=='true')
            {
                $this->form_validation->set_rules('chekout_onoff', '2Chek ON/off', 'required');
                $this->form_validation->set_rules('chekout_email', '2Chek Out email', 'required|valid_email');
                $this->form_validation->set_rules('2chekout_key', '2Chek Out Key', 'required');
                $this->form_validation->set_rules('2chekout_sid', '2Chek Out Sid', 'required');
            }
            if($this->config->item('gPayuMoney')=='true')
            {
                $this->form_validation->set_rules('payumoney_on_off', 'PayuMoney ON/OFF', 'required');
                $this->form_validation->set_rules('payu_key', 'Merchant Key', 'required');
                $this->form_validation->set_rules('payu_salt', 'Merchant Salt', 'required');
            }

            $this->form_validation->set_rules('bankdetail_editor', 'Your Bank Details', 'required');
            
            if($this->form_validation->run()==true)//if validation get errors
            {
                $data_input = $this->input->post();
                $data_input['id'] = 1;
                $data_input['lang_type'] = $this->session->userdata("data_update_lang");
                if ($data["recordExistForLang"]=="0")
                    $this->generalsetting->insertSiteConfigPayment($data_input);
                else
                {                    
                    $site_config = $this->generalsetting->updateSiteConfigPayment($data_input);                    
                }
                //$site_config = $this->generalsetting->updateSiteConfigPayment($data_input);
                $this->session->set_flashdata('PaymentSettingsMsg', 'Successfully Update Payment Details');
                redirect(base_Url()."GeneralSetting");
            }
        }
                
        if(isset($_REQUEST['btn_social']))
        {
            $data_input = $this->input->post();
            $site_config = $this->generalsetting->updateGeneralSocialSetting($data_input);
            $this->session->set_flashdata('SocialSettingsMsg', 'Successfully Update Social Link Setting');
            redirect(base_Url()."GeneralSetting");
        }
        
        if(isset($_REQUEST['btn_google']))
        {
            $data_input = $this->input->post();
            $site_config = $this->generalsetting->updateGeneralGoogleMapSetting($data_input);
            $this->session->set_flashdata('GoogleSettingsMsg', 'Successfully Update Google Setting');
            redirect(base_Url()."GeneralSetting");
        }
        if(isset($_REQUEST['btn_email']))
        {
            $data_input = $this->input->post();
            $site_config = $this->generalsetting->updateGeneralEmailConSetting($data_input);
            $this->session->set_flashdata('EmailSettingsMsg', 'Successfully Update Conformation Email');
            redirect(base_Url()."GeneralSetting");
        }
        
        if(isset($_REQUEST['btn_sitestatus']))
        {
            $data_input = $this->input->post();
            $data_input['id'] = 1;
            $data_input['lang_type'] = $this->session->userdata("data_update_lang");
            if ($data["recordExistForLang"]=="0")
                $this->generalsetting->insertSiteConfigStatus($data_input);
            else
            {                    
                $site_config = $this->generalsetting->updateSiteConfigStatus($data_input);                    
            }
            $this->session->set_flashdata('SiteStatusSettingsMsg', 'Successfully Update Site Status');
            redirect(base_Url()."GeneralSetting");
        }
        
        //================smtp setting details submit=========================//
        if(isset($_REQUEST['btn_smtp_setting']))
        {
            $data_input = $this->input->post();
            $site_config = $this->generalsetting->updateSmtpConfiguration($data_input);
            $this->session->set_flashdata('SMTPSettingsMsg', 'Successfully Update SMTP Mail Configuration');
            redirect(base_Url()."GeneralSetting");
        }
        //========================================================================//
        if(isset($_REQUEST['btn_logo']))
        {
            if(isset($_FILES) && $_FILES['logo']['name'] !='')
            {
                $file_details = array('upload_path'=> "images/logofolder/", 'allowed_types' => "gif|jpg|png|bmp|jpeg", 'max_size'=>"10000",'max_width'=>"10000", 'max_height'=>"10000", 'filename'=>'logo');
                $fileupload = $this->uploadfile($file_details);
                
                if($fileupload !='')
                {
                    if(isset($_REQUEST['hiddenlogo']) && $_REQUEST['hiddenlogo'] != ''){
                        $imgPath = base_url()."images/logofolder/".$_REQUEST['hiddenlogo']; 
                        if(file_exists($imgPath)){
                            unlink($imgPath) or die('failed deleting: ' . $imgPath);
                        }
                    }
                    $this->generalsetting->updateSiteConfigFileUpload($fileupload);
                    $this->session->set_flashdata('LogoSettingsMsg', 'Successfully Update Logo');
                    redirect(base_Url()."GeneralSetting");
                }
            }
        }

        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/generalsetting/general_setting_view',$data);
        $this->load->view('admin/footer.php');
    }

    public function changeAdminPassword()
    {
        if(isset($_REQUEST['btn_changepassword']))
        {  
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('cur_password', 'Current password', 'trim|required|callback_password_check');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('ret_password', 'Retype Password', 'trim|required|matches[password]');
            if($this->form_validation->run()==true)
            { 
                $data_input = $this->input->post();
                $this->generalsetting->updateAdminPass($_REQUEST['username'],$_REQUEST['password']);
                $this->session->set_flashdata('ChangePassMsg', $this->lang->line('lang_sucessfully_change_your_password'));
                redirect(base_Url()."ChangeAdminPassword");
            }
        }
        
        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/generalsetting/change_password_view');
        $this->load->view('admin/footer.php');
    }

    public function password_check($oldpass)
    {
        $pass = $this->generalsetting->getPassword();
        if(isset($pass) && $pass->password !== md5($oldpass)) {
            $this->form_validation->set_message('password_check', 'The %s does not match');
            return false;
        }
        return true;
    }

    // Uploading file
    public function uploadfile($file_details = array())
    { 

        $config = array();
        $config['upload_path'] = $file_details['upload_path'];
        $config['allowed_types'] = $file_details['allowed_types'];
        $config['max_size']  = $file_details['max_size'];
        if(isset($file_details['max_width']) && isset($file_details['max_height']))
        {
            $config['max_width']  = $file_details['max_width'];
            $config['max_height']  = $file_details['max_height'];
        }
        $file_name = $file_details['filename'];
        $new_name = mktime(date('h'),date('i'),date('s'),date('m'),date('d'),date('y'));
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config); 
        
        if( ! $this->upload->do_upload($file_details['filename']))
        {
            $this->session->set_flashdata('LogoUploadingError', "<div class='alert alert-danger'><i data-dismiss='alert' class='icon-remove close'></i><b>Oops!!</b> File format not supported.</div>");         
            redirect($_SERVER['HTTP_REFERER']); 
        }
        $file_data = $this->upload->data(); 
        
        return $file_data['file_name'];
    }
}
?>