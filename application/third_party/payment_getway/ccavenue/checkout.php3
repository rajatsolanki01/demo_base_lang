<?php
/*
 *
 */
	//include_once( '../includes/global_value.php' );
	//global $site_url,$cc_working_key,$cc_merchant_id;

	require("../ccavenue/libfuncs.php3");

	$Merchant_Id = $cc_merchant_id ;
	//$Merchant_Id = "M_var18886_18886" ;//This id(also User Id)  available at "Generate Working Key" of "Settings & Options" 
	$Amount = $_REQUEST['amount']; //your script should substitute the amount in the quotes provided here
	$Order_Id = $_REQUEST['oid'] ;//your script should substitute the order description in the quotes provided here
	//$Redirect_Url = "http://www.xyz.com/xyz.asp" ;//your redirect URL where your customer will be redirected after authorisation from CCAvenue
	
	$Redirect_Url = $site_url."/cc_redirecturl.html" ;
	//$Redirect_Url = $site_url."/cc_pay_detail.html" ;//your redirect URL where your customer will be redirected after authorisation from CCAvenue

	$WorkingKey = $cc_working_key  ;	
	//$WorkingKey = "4vov7acfrixw9sadwl0zsrk6vw9h90x3"  ;//put in the 32 bit alphanumeric key in the quotes provided here.Please note that get this key ,login to your CCAvenue merchant account and visit the "Generate Working Key" section at the "Settings & Options" page. 
	$Checksum = getCheckSum($Merchant_Id,$Amount,$Order_Id ,$Redirect_Url,$WorkingKey);

?> 
<HTML>
<HEAD>
<TITLE>::CC Avenue::</TITLE>
</HEAD>
<body onLoad="document.ccavenue_form.submit();">


<BODY>
<?php

	$billing_cust_name="";
	$billing_cust_address="";
	$billing_cust_state="";
	$billing_cust_country="";
	$billing_cust_tel="";
	$billing_cust_email="";
	$delivery_cust_name="";
	$delivery_cust_address="";
	$delivery_cust_state = "";
	$delivery_cust_country = "";
	$delivery_cust_tel="";
	$delivery_cust_notes="";
	$Merchant_Param="" ;
	$billing_city = "";
	$billing_zip = "";
	$delivery_city = "";
	$delivery_zip = "";

?>
	<form name="ccavenue_form" method="post" action="https://www.ccavenue.com/shopzone/cc_details.jsp">
	<input type="text" name="Merchant_Id" value="<?php echo $Merchant_Id; ?>">
	<input type="text" name="Amount" value="<?php echo $Amount; ?>">
	<input type="text" name="Order_Id" value="<?php echo $Order_Id; ?>">
	<input type="text" name="Redirect_Url" value="<?php echo $Redirect_Url; ?>">
	<input type="text" name="Checksum" value="<?php echo $Checksum; ?>">
    <input type="hidden" name=Currency value="USD"> 
	<input type="hidden" name="billing_cust_name" value="<?php echo $billing_cust_name; ?>"> 
	<input type="hidden" name="billing_cust_address" value="<?php echo $billing_cust_address; ?>"> 
	<input type="hidden" name="billing_cust_country" value="<?php echo $billing_cust_country; ?>"> 
	<input type="hidden" name="billing_cust_state" value="<?php echo $billing_cust_state; ?>"> 
	<input type="hidden" name="billing_zip" value="<?php echo $billing_zip; ?>"> 
	<input type="hidden" name="billing_cust_tel" value="<?php echo $billing_cust_tel; ?>"> 
	<input type="hidden" name="billing_cust_email" value="<?php echo $billing_cust_email; ?>"> 
	<input type="hidden" name="delivery_cust_name" value="<?php echo $delivery_cust_name; ?>"> 
	<input type="hidden" name="delivery_cust_address" value="<?php echo $delivery_cust_address; ?>"> 
	<input type="hidden" name="delivery_cust_country" value="<?php echo $delivery_cust_country; ?>"> 
	<input type="hidden" name="delivery_cust_state" value="<?php echo $delivery_cust_state; ?>"> 
	<input type="hidden" name="delivery_cust_tel" value="<?php echo $delivery_cust_tel; ?>"> 
	<input type="hidden" name="delivery_cust_notes" value="<?php echo $delivery_cust_notes; ?>"> 
	<input type="hidden" name="Merchant_Param" value="<?php echo $Merchant_Param; ?>"> 
	<input type="hidden" name="billing_cust_city" value="<?php echo $billing_city; ?>"> 
	<input type="hidden" name="billing_zip_code" value="<?php echo $billing_zip; ?>"> 
	<input type="hidden" name="delivery_cust_city" value="<?php echo $delivery_city; ?>"> 
	<input type="hidden" name="delivery_zip_code" value="<?php echo $delivery_zip; ?>"> 
	
<center><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="333333">CC Avenue Processing Transaction . . . </font></center>
	</form>
</BODY>
</HTML>
