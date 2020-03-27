<?php
/*
 * process.php
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
include_once( '../includes/global_value.php' );
global $site_url;

?> 

<html>
<head><title>::PHP PayPal::</title></head>
<body onLoad="document.paypal_form.submit();">


<!--	<form method="post" name="paypal_form" action="https://www.paypal.com/cgi-bin/webscr">-->	 
  <form method="post" name="paypal_form" action="https://www.sandbox.paypal.com/cgi-bin/webscr">	
	

<?php 
//show paypal hidden variables

//showVariables(); 

?>
<input type="hidden" name="business" value="<?PHP echo $_REQUEST['email']; ?>">

<input type="hidden" name="payment_status" value="<?PHP echo $_REQUEST['payment_status']; ?>">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="return" value="<?php echo $site_url;?>/pay_return-s-P-<?php echo $_REQUEST['oid'];?>.html">
<input type="hidden" name="cancel_return" value="<?php echo $site_url;?>/pay_cancel-c-P-<?php echo $_REQUEST['oid'];?>.html">
<input type="hidden" name="notify_url" value="<?php echo $site_url;?>/pay_notify-s-P-<?php echo $_REQUEST['oid'];?>.html">
<input type="hidden" name="item_name" value="<?PHP echo $_REQUEST['package'];?>">
<input type="hidden" name="amount" value="<?PHP echo $_REQUEST['amount'];?>">
<input type="hidden" name="order_id" value="<?php echo $_REQUEST['oid'];?>">
<input type="hidden" name="currency_code" value="USD">

<center><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="333333">Processing Transaction . . . </font></center>

</form>
</body>   
</html>
