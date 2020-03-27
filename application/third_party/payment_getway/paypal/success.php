<?php
/*
 * success.php
 *
 * PHP Toolkit for PayPal v0.51
 * http://www.paypal.com/pdn
 *
 * Copyright (c) 2004 PayPal Inc
 *
 * Released under Common Public License 1.0
 * http://opensource.org/licenses/cpl.php
 *
 */
 ////////////////////////////////////////////////////////////////////////////////////////////////
	 $config="select * from site_config where id=1";
	 $configdata=mysql_fetch_object($config);


		$company_name=$configdata['company_name'];
		$company_address=$configdata['company_address'];
		$phone=$configdata['phone'];
		$fax=$configdata['fax'];
		$SITE_EMAIL=$configdata['email'];
		$LOGO=$configdata['logo'];
		$site_url=$configdata['site_url'];
		$admin_url=$site_url;
		$support_email=$configdata['support_email'];
		$webmaster_email=$configdata['webmaster_email'];
		$admin_image=$site_url."/templates/admin/images";
		$page_row=$configdata['page_row'];
		
		$site_onoff=$configdata['site_onoff'];
		$under_construction=$configdata['under_construction'];
		$paid_amt=$configdata['paid_amt'];
		$Paypal_Email=$configdata['paypalemail'];
		$cc_working_key=$configdata['cc_working_key'];
		$cc_merchant_id=$configdata['cc_merchant_id'];
		
		$objSmarty->assign('admin_image',$admin_image);
		$objSmarty->assign('company_name',$configdata['company_name']);
		$objSmarty->assign('company_address',$configdata['company_address']);
		$objSmarty->assign('phone',$configdata['phone']);
		$objSmarty->assign('fax',$configdata['fax']);
		$objSmarty->assign('SITE_EMAIL',$configdata['email']);
		$objSmarty->assign('admin_url',$admin_url);
		$objSmarty->assign('site_url',$configdata['site_url']);
		$objSmarty->assign('support_email',$configdata['support_email']);
		$objSmarty->assign('webmaster_email',$configdata['webmaster_email']);
		$objSmarty->assign('page_row',$configdata['page_row']);
		$objSmarty->assign('paid_amt',$configdata['paid_amt']);
		$objSmarty->assign('LOGO',$configdata['logo']);
		
		$objSmarty->assign('cc_working_key',$configdata['cc_working_key']);
		$objSmarty->assign('cc_merchant_id',$configdata['cc_merchant_id']);
	
 ////////////////////////////////////////////////////////////////////////////////////////////////

	$req = 'cmd=_notify-validate';
	foreach ($HTTP_POST_VARS as $key => $value) 
	{
			$value = urlencode(stripslashes($value));
		  $req .= "&$key=$value";
	}

	// post back to PayPal system to validate
	$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= 'Content-Length: ' . strlen($req) . "\r\n\r\n";
	$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);

// assign posted variables to local variables
// note: additional IPN variables also available -- see IPN documentation

		$custom =$HTTP_POST_VARS["custom"];
		$payment_status = $HTTP_POST_VARS['payment_status'];
		$payer_email = $HTTP_POST_VARS['payer_email'];
		//$amount =$HTTP_POST_VARS["amount"];
		//$user_id=$_SESSION['SESSIONUSERID'];
	//FETCH USER_ID AND AMOUNT FROM core_order_details TABLE
		$SelectInfo1=$dbh->query("select * from core_order_details  where order_id='$custom'");
		$FetchInfo1=mysql_fetch_object($SelectInfo1);
		$amount=$fetch_amt=$FetchInfo1->total_price;
		$user_id=$fetch_amt=$FetchInfo1->user_id;  
		

	//$user_id =$HTTP_POST_VARS["user_id"];
	//$item_name = $HTTP_POST_VARS['item_name'];
	//$payment_gross = $HTTP_POST_VARS['payment_gross'];
	// $txn_id = $HTTP_POST_VARS['txn_id'];

		
				
	$strPP ="$req";
	$TODAY = date("Y-m-j");
if (!$fp) 
{ 
		//IF ERROR then put all the data into a log text file
		#set your logfile directory path here
        #for example on a unix platform it may be "/www/logs"
	        $log_dir="./log";
			$str_ERROR .="**Error:$errstr ($errno)\n";
        #the following date format can be changed to suit your requirements
      	    $timestamp=date("d-m-y--H-i-s");
	        $FILE=fopen("$log_dir/$timestamp-ER-$custom.txt","a"); 
			fwrite($FILE,$str_ERROR);               
	        fwrite($FILE,"Transaction  Status - $payment_status\n");
        	fwrite($FILE,"Transaction  No. - $custom\n");		
	        fwrite($FILE,"TotalAmount - $amount \n");
	        fwrite($FILE,"UserID - $user_id\n");
	        fwrite($FILE,"Transaction Time Stamp - $timestamp\n");
	        fclose($FILE);
			chmod("$log_dir/$timestamp-ER-$custom.txt",0777);
}
else 
{	
	//put all the data into a log text file
	       #set your logfile directory path here
        #for example on a unix platform it may be "/www/logs"
	        $log_dir="./log";
        #the following date format can be changed to suit your requirements
    	    $timestamp=date("d-m-y--H-i-s");
	        $FILE=fopen("$log_dir/$timestamp-$custom.txt","a");                
	        fwrite($FILE,"Transaction  Status - $payment_status\n");
        	fwrite($FILE,"Transaction  No. - $custom\n");		
	        fwrite($FILE,"TotalAmount - $amount \n");
	        fwrite($FILE,"UserID - $user_id\n");
	        fwrite($FILE,"Transaction Time Stamp - $timestamp\n");
	        fclose($FILE);
			chmod("$log_dir/$timestamp-$custom.txt",0777);
	fputs ($fp, $header . $req);
	while (!feof($fp)) 
	{
		$res = fgets ($fp, 1024);
		if (strcmp ($res, "VERIFIED") == 0) 
		{
			$heading="Confirmation of payment";
			//if(($payment_status =="Completed"))
			if(($payment_status =="Completed"))						
			{				
			 //CHECK THAT TXN_ID HAS NOT BEEN PREVIOUSLY PROCESSED
			
				$msg ="<p>Congratulation, your payment has been transferred successfully. We will get back to you very soon. Please check your mail for more details.</p>";
				
			//CODE TO SEND E-MAIL TO USER
				//call event_mailer() function to fetch record from core_emailomaster table
				$arr=$camfun->event_mailer($var='UserPaymentCompleted');				
				$msgBody=$arr["body"];
				eval("\$msgBody = \"$msgBody\";");	
					
				//send mail to user					
				$camfun->Send_mail($payer_email,$arr["subject"],$msgBody,$arr["from_name"],$arr["from_email"]);			

			//CODE TO SEND E-MAIL TO ADMIN
				//call event_mailer() function to fetch record from core_emailomaster table
				$arr=$camfun->event_mailer($var='NewPaymentAdmin');				
				$msgBody=$arr["body"];
				eval("\$msgBody = \"$msgBody\";");			
				//send mail to admin	
				$sendto1=$SITE_EMAIL;		
				$camfun->Send_mail($sendto1,$arr["subject"],$msgBody,$arr["from_name"],$arr["from_email"]);	

				//$duplicate_trans = mysql_affected_rows($db);
				if($duplicate_trans) 
				{	//exit;
				}
				else
				{	//makePaymentEntries($db);
				
				}
			}//COMPLETE
			else if(($payment_status =="Pending"))
				{	
					$msg ="<p>Sorry, your payment transaction has been failed. We will get back to you very soon. Please check your mail for more details.</p>";
			//CODE TO SEND E-MAIL TO USER
				//call event_mailer() function to fetch record from core_emailomaster table
				$arr=$camfun->event_mailer($var='UserPaymentPending');				
				$msgBody=$arr["body"];
				eval("\$msgBody = \"$msgBody\";");	
					
				//send mail to user					
				$camfun->Send_mail($payer_email,$arr["subject"],$msgBody,$arr["from_name"],$arr["from_email"]);			

			//CODE TO SEND E-MAIL TO ADMIN
				//call event_mailer() function to fetch record from core_emailomaster table
				$arr=$camfun->event_mailer($var='PendingPaymentAdmin');				
				$msgBody=$arr["body"];
				eval("\$msgBody = \"$msgBody\";");			
				//send mail to admin	
				$sendto1="$SITE_EMAIL";				
				$camfun->Send_mail($sendto1,$arr["subject"],$msgBody,$arr["from_name"],$arr["from_email"]);	
				
				}
				
				
		}//VERIFIED
		else if (strcmp ($res, "INVALID") == 0) 
		{
			// log for manual investigation
		}
	}
	fclose ($fp);
}
							
?>