<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController_front.php';
class Payments_getway extends BaseController_front {

    function  __construct()
    {
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('payment_getway');
    }

	function index($oid=null)	//show to payment's option page with details
    {
        $data["succ"]="";
		if($oid!="")
		{
			$sqlResult=$this->payment_getway->account($oid);
			$sqlResult=$sqlResult->row();
			if($sqlResult!=null)
			{
				$amount=$sqlResult->amount;
				$amount_inr=$sqlResult->amount_inr;
				$package=$sqlResult->package;
				$price_sym_sec=$sqlResult->price_sym_sec;
                
                if (isset($_GET['succ']))
                    $data["succ"]=$_GET['succ'];
                $data["oid"]=$oid;
				//$data["Paypal_Email"]=$Paypal_Email;
				$data["amount"]=$amount;
				$data["amount_inr"]=$amount_inr;
				$data["package"]=$package;
				$data["price_sym_sec"]=$price_sym_sec;
			}	
		}
		
		$qry_siteconfig=$this->payment_getway->bankDetail();
		$site_config=$qry_siteconfig->row();
		$bankdetail=str_replace(['/','/p','p'],'',$site_config->bankdetail);
		
		$data["bankdetail"]=$bankdetail;
		$this->loadviews('process',['data'=>$data]);
	}

	function process()		//check payment option and process to pay
    { 
     	if($_POST['payment_opt'] == 'P')
     	{
	        $returnURL = base_url().'paypal/success-p-'.$_POST['ord_id'];
	        $cancelURL = base_url().'paypal/cancel-'.$_POST['ord_id'];
	        $notifyURL = base_url().'paypal/ipn';
	        $this->paypal_lib->add_field('return', $returnURL);
	        $this->paypal_lib->add_field('cancel_return', $cancelURL);
	        $this->paypal_lib->add_field('notify_url', $notifyURL);
	        $this->paypal_lib->add_field('order_id', $_POST['ord_id']);
	        $this->paypal_lib->add_field('amount',  $_POST['amount']);
	        $this->paypal_lib->paypal_auto_form();
    	}
    }

    function updgrade_package($package_id=null,$msg=null)
    { 
        $session_data = $this->session->userdata;
        //print_r($session_data);echo "rs".$msg;exit();
        $this->load->config('Globvariable');
        $company_name = $this->config->item('gCompanyName');
        $Paypal_Email = $this->config->item('gPaypalEmail');
         
        if($msg==2)
        {
            echo $data["succ1"] = ("<strong>Upgrade Package Successfully</strong>.<br> <div style='font-size:13px'> your updated package first you logout and login agian</div> ");
        }
            
        if(isset($package_id))
        {
            $sqlResult = $this->payment_getway->getMembetPackageDetails($package_id);
            echo '<pre>';
            echo $amount=$sqlResult->price;
            echo  $amount1=$sqlResult->price_sec;//echo $package_id.$msg;exit();
            $price_sym_sec=$sqlResult->price_sym_sec;
            $pack_name=$sqlResult->package_name;
            $pack_type=$sqlResult->pack_type;
            $date=date("Y-m-d");            
            $valid_day=$sqlResult->valid_day;
        
            $end_date = strtotime(date("Y-m-d", strtotime($date)) . "+".$valid_day." days");
            $exp_date=date("Y-m-d", $end_date); 
            
            $sqlResult = $this->payment_getway->getAccountMaxOrderId();
            $ord_id=$sqlResult->order_id;
            if($ord_id<1)
                $ord_id=1000;
            else
                $ord_id=$ord_id+1;
                    
            if($session_data['user_id']=='' && $session_data['fre_exp_id']!='')
                $usr_ses_id=$session_data['fre_exp_id'];
            else
                $usr_ses_id=$session_data['user_id'];
                        
            $date=date('Y-m-d');

            $qrySavePage=array('user_id' =>$usr_ses_id ,'package' =>$pack_name ,'amount' =>$amount ,'amount_inr' =>$amount1 ,'price_sym_sec' =>$price_sym_sec ,'payment_opt' =>'P' ,'entrydate' =>$date ,'order_id' =>$ord_id ,'pack_type' =>$pack_type);
            $this->payment_getway->inseertAccountPayment($qrySavePage);
                    
            if ($msg == 2)   
                redirect("process-".$ord_id.".html?succ=1");
            else if($amount!='0' || $amount1!='0')
            {
                redirect("process-".$ord_id.".html");
            }
            else
            {
                $Data = $this->payment_getway->getAccountOrderId($ord_id);
                $where = array('pack_status'=>'Y','user_id'=>$Data->user_id,'paystatus'=>'TRUE','approved'=>'Y','status'=>'Y','deleted'=>'N');
                $package_upgrade = $this->payment_getway->getAccountData($where);
                if($package_upgrade!='')
                {
                    $set = array('pack_status' => 'N');
                    $where = array('lang_type'=>$this->session->userdata("user_lang"), 'user_id' =>$package_upgrade->user_id, 'id'=>$package_upgrade->id);
                    $this->payment_getway->updateAccounts($set,$where);
                }
                $where = array('package_name' =>$Data->package, );
                $Data_mem_pack_query=$this->payment_getway->getValidDay($where);
                    
                if($session_data['rem_days']>=0)
                {
                    $rem=$session_data['rem_days'] + 1;
                    $valid_days=$rem + $Data_mem_pack_query->valid_day;
                }
                else
                {
                    $valid_days=$Data_mem_pack_query->valid_day;
                }
                        
                $setpay = array('paystatus' =>'TRUE','pack_validat_day'=>$valid_days,'pack_status'=>'Y','approved'=>'Y'); 
                $where = array('order_id'=>$ord_id, 'lang_type'=>$this->session->userdata("user_lang"));           
                $this->payment_getway->updateAccountPayStatus($setpay,$where);
                $setpayuser = array('package_type' =>$Data->pack_type,'exp_date'=>$exp_date,'vaild_days'=>$valid_day); 
                $where = array('id'=>$Data->user_id, 'lang_type'=>$this->session->userdata("user_lang"));
                $this->payment_getway->updateUserPackageType($setpayuser,$where);
                redirect("package_success-".$package_id."-2.html");
            }
        }    
    }

    function success($option,$id)
    {

        $this->load->model('payment_getway');
        global $SITE_EMAIL,$Paypal_Email,$webmaster_email;
    
        $option = $option;
        $oid = $id;
        
        if($option=='A')
        {   
            //$pay_title=$lang['anet'].' '.$lang['conf'];
            $pay_title='';
            if($payment_status =="TRUE")
                {
                    $qry=$this->payment_getway->account($oid); 
                    $Data=$qry->row();
                    if($Data->paystatus!="TRUE")
                    {
                        /*========select acount detail using order_id======*/
                        $qry=$this->payment_getway->account($oid); 
                        $Data=$qry->row();

                       /*===select acount detail using paystatus ,pack_status etc....===*/
                        $package_upgrade=$this->payment_getway->account_user($Data->user_id);
                       
                        if($package_upgrade->num_rows)
                        {
                            $result_package_upgrade=$package_upgrade->row();
                            /*========update account details=========*/
                            $data_upgrade = array('pack_status'=>'N');
                            $where =array('user_id'=>$result_package_upgrade->user_id,'id'=>$result_package_upgrade->id);
                            $this->payment_getway->updateAccount($data_upgrade,$where);
                        }
                        /*========select member package using package name========*/
                        $member_package=$this->payment_getway->member_package($Data->package);
                        $data_member_package=$member_package->row();
                        
                        $valid_days=$data_member_package->valid_day;
                        $date=date("Y-m-d");
                
                        $end_date = strtotime(date("Y-m-d", strtotime($date)) . "+".$valid_days." days");
                        $exp_date=date("Y-m-d", $end_date); 

                         /*========update account details in account table======*/
                        $updatedata=array('paystatus'=>'TRUE','pack_validat_day'=>$valid_days,'pack_status'=>'Y','approved'=>'Y');
                        $where = array('order_id'=>$oid, 'lang_type'=>$this->session->userdata("user_lang"));
                        $this->payment_getway->updateAccount($updatedata,$where);

                        /*========update users data in users table========*/
                        $update_user_data=array('package_type'=>$Data->pack_type,'exp_date'=>$exp_date,'vaild_days'=>$valid_days); 
                        $where = array('id'=>$Data->user_id, 'lang_type'=>$this->session->userdata("user_lang"));
                        $this->payment_getway->updateusers($update_user_data,$where);

                        /*===========Select users data===========*/
                        $fetch_user_Data=$this->payment_getway->users($Data->user_id);
                        $user_data=$fetch_user_Data->row();
                  
                        if($Data->pack_type=='A_G' || $Data->pack_type=='A_P' || $Data->pack_type=='A_S' || $Data->pack_type=='A_F')
                        {
                            $update_custmer_data=array('paid'=>'Y','package_type'=>$Data->pack_type);
                            $where =array ('id'=>$user_data->cust_id, 'lang_type'=>$this->session->userdata("user_lang"));
                            $this->payment_getway->updatecustomer($update_custmer_data,$where);
                        }
                        $message2="<p>Your Payment Transection successfully completed.</p><br />Your Amount Transfer  : ".$Data->amount;

                        $Subject  =  $subject2;                 // subject of mail
                        $msgBody1     =  $message2;             // body of mail
                        
                        SendMail($SITE_EMAIL,company_name,$user_data->user_name,$Subject,$msgBody1);
                        SendMail($SITE_EMAIL,company_name,$webmaster_email,$Subject,$msgBody1);
                         $heading="Payment Transaction Success Completed";
                        $this->loadviews('success',['heading'=>$heading]);
                    }
                    else
                    {
                        $heading="Payment Transaction Success Completed";
                        $this->loadviews('success',['heading'=>$heading]);
                    }
                }
            else
                {
                    $heading="Payment Transaction Not Success Completed";
                    $objSmarty->assign("heading",$heading);
                    $retry='<td align="center"><input type="submit" class="sub_button" value="Retry" name="retry"></td>';
                    $objSmarty->assign("retry",$retry);
                }
                
        }
        if($option=='p')   /*====paypal=====*/
        {   
            $pay_title='';
            if(1)   //$payment_status !="S"
            {     
                $qry=$this->payment_getway->account($oid); 
                $Data=$qry->row();
                if($Data->paystatus!="TRUE")
                {
                    /*========select acount detail using order_id======*/
                    $qry=$this->payment_getway->account($oid); 
                    $Data=$qry->row();

                   /*===select acount detail using paystatus ,pack_status etc....===*/
                    $package_upgrade=$this->payment_getway->account_user($Data->user_id);
                   
                    if($package_upgrade->num_rows)
                    {
                        $result_package_upgrade=$package_upgrade->row();
                        /*========update account details=========*/
                        $data_upgrade = array('pack_status'=>'N');
                        $where =array('user_id'=>$result_package_upgrade->user_id,'id'=>$result_package_upgrade->id, 'lang_type'=>$this->session->userdata("user_lang"));
                        $this->payment_getway->updateAccount($data_upgrade,$where);
                    }
                    /*========select member package using package name========*/
                    $member_package=$this->payment_getway->member_package($Data->package);
                    $data_member_package=$member_package->row();
                    
                    $valid_days=$data_member_package->valid_day;
                    $date=date("Y-m-d");
            
                    $end_date = strtotime(date("Y-m-d", strtotime($date)) . "+".$valid_days." days");
                    $exp_date=date("Y-m-d", $end_date); 

                     /*========update account details in account table======*/
                    $updatedata=array('paystatus'=>'TRUE','pack_validat_day'=>$valid_days,'pack_status'=>'Y','approved'=>'Y');
                    $where = array('order_id'=>$oid, 'lang_type'=>$this->session->userdata("user_lang"));
                    $this->payment_getway->updateAccount($updatedata,$where);

                    /*========update users data in users table========*/
                    $update_user_data=array('package_type'=>$Data->pack_type,'exp_date'=>$exp_date,'vaild_days'=>$valid_days); 
                    $where = array('id'=>$Data->user_id, 'lang_type'=>$this->session->userdata("user_lang"));
                    $this->payment_getway->updateusers($update_user_data,$where);

                    /*===========Select users data===========*/
                    $fetch_user_Data=$this->payment_getway->users($Data->user_id);
                    $user_data=$fetch_user_Data->row();
              
                    if($Data->pack_type=='A_G' || $Data->pack_type=='A_P' || $Data->pack_type=='A_S' || $Data->pack_type=='A_F')
                    {
                        $update_custmer_data=array('paid'=>'Y','package_type'=>$Data->pack_type);
                        $where =array ('id'=>$user_data->cust_id, 'lang_type'=>$this->session->userdata("user_lang"));
                        $this->payment_getway->updatecustomer($update_custmer_data,$where);
                    }
                    $message2="<p>Your Payment Transection successfully completed.</p><br />Your Amount Transfer  : ".$Data->amount;

                    $Subject  =  $subject2;                 // subject of mail
                    $msgBody1     =  $message2;             // body of mail
                    
                    SendMail($SITE_EMAIL,company_name,$user_data->user_name,$Subject,$msgBody1);
                    SendMail($SITE_EMAIL,company_name,$webmaster_email,$Subject,$msgBody1);
                     $heading="Payment Transaction Success Completed";
                    $this->loadviews('success',['heading'=>$heading]);
                }
                else
                {
                    $heading="Payment Transaction Success Completed";
                    $this->loadviews('success',['heading'=>$heading]);
                }
            }
            else
            {
                $heading="Payment Transaction Not Success Completed";
                $retry='<td align="center"><input type="submit" class="sub_button" value="Retry" name="retry"></td>';
                 $this->loadViews('success',['heading'=>$heading,'retry'=>$retry]);
           
            }
                        
        }
    }


    function cancel($oid)
    {        // Load payment failed view
        $heading = 'Payment Not Successfull';
        $this->loadViews('success',['heading'=>$heading]);
    }

    function ipn()
    {
        // Paypal posts the transaction data
        $paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            // Validate and get the ipn response
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            // Check whether the transaction is valid
            if($ipnCheck){
                // Insert the transaction data in the database
                $data['user_id']        = $paypalInfo["custom"];
                $data['product_id']        = $paypalInfo["item_number"];
                $data['txn_id']            = $paypalInfo["txn_id"];
                $data['payment_gross']    = $paypalInfo["mc_gross"];
                $data['currency_code']    = $paypalInfo["mc_currency"];
                $data['payer_email']    = $paypalInfo["payer_email"];
                $data['payment_status'] = $paypalInfo["payment_status"];
                $data['lang_type']=$this->session->userdata("user_lang");
                $this->product->insertTransaction($data);
            }
        }
    }
	
}
?>