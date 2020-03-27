<?php 
	require("../ccavenue/libfuncs.php3");
	include_once( '../includes/global_value.php' );
	global $site_url,$cc_working_key;
/*

	This is the sample RedirectURL PHP script. It can be directly used for integration with CCAvenue if your application is developed in PHP. You need to simply change the variables to match your variables as well as insert routines for handling a successful or unsuccessful transaction.

	return values i.e the parameters namely Merchant_Id,Order_Id,Amount,AuthDesc,Checksum,billing_cust_name,billing_cust_address,billing_cust_country,billing_cust_tel,billing_cust_email,delivery_cust_name,delivery_cust_address,delivery_cust_tel,billing_cust_notes,Merchant_Param POSTED to this page by CCAvenue. 

*/

	$WorkingKey = $cc_working_key;
	$Merchant_Id= $_REQUEST['Merchant_Id'];
	$Amount= $_REQUEST['Amount'];
	$Order_Id= $_REQUEST['Order_Id'];
	$Merchant_Param= $_REQUEST['Merchant_Param'];
	$Checksum= $_REQUEST['Checksum'];
	$AuthDesc=$_REQUEST['AuthDesc'];
	$user_email=$_REQUEST['billing_cust_email'];
	
    $Checksum = verifyChecksum($Merchant_Id, $Order_Id , $Amount,$AuthDesc,$Checksum,$WorkingKey);

	$Checksum=="true";
	$AuthDesc=="Y";

	if($Checksum=="true" && $AuthDesc=="Y")
	{
		$mess="Thank you for Join with us. Your credit card has been charged and your transaction is successful.";
		
		
		//Here you need to put in the routines for a successful 
		//transaction such as sending an email to customer,
		//setting database status, informing logistics etc etc
	}
	else if($Checksum=="true" && $AuthDesc=="B")
	{
		$mess="Thank you for Join with us.We will keep you posted regarding the status of your order through e-mail";
		
		//Here you need to put in the routines/e-mail for a  "Batch Processing" order
		//This is only if payment for this transaction has been made by an American Express Card
		//since American Express authorisation status is available only after 5-6 hours by mail from ccavenue and at the "View Pending Orders"
	}
	else if($Checksum=="true" && $AuthDesc=="N")
	{
		$mess="Thank you for Join with us.However,the transaction has been declined.";
		
		//Here you need to put in the routines for a failed
		//transaction such as sending an email to customer
		//setting database status etc etc
	}
	else
	{
		$mess="Security Error. Illegal access detected";
		
		//Here you need to simply ignore this and dont need
		//to perform any operation in this condition
	}
	
	echo $mess;
	
?>
