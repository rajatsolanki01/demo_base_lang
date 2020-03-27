<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script id="qtScript" type="text/javascript" src="https://sandbox.interswitchng.com/quickteller.js/v1" onload="Quickteller.initialize()"></script>

<script type="text/javascript">
document.onreadystatechange = function() {

if(document.readyState === "complete"){

Quickteller.checkout({

"paymentCode" : "111",

"buttonSize": "small | medium | large",

"redirectUrl": "http://192.168.1.10/sourcingmx_com_ali_pro_v2/process-1211.html",

"amount": "500",

"customerId": "12111",

"mobileNumber": "9772462399",

"emailAddress": "bimal40571@gmail.com"

}, "btn_div", function(){

//fn called before loading payment pop-up.

}, function (status) {

//fn called just before closing payment pop-up.

});

}

}
</script> 
<div id="main-body">
	<div class="container">
		<div class="row">
			<div id="main-col" class="col-md-12 col-xs-12">
				<div id="content" class="table-s">
					<div class="panel panel-default">
						<!-- <div class="panel-heading">
							<div class="sidebar-title"> <?php if($succ1==''){echo $this->lang->line('455_oth_lang'); } else {echo $this->lang->line('799_oth_lang');} ?> </div>
						</div> -->
						<div class="panel-body">
							<div class="box"> <?php if($data['succ']=="1"){?>
								<div class="box-heading"><?php echo "<strong>Upgrade Package Successfully</strong>.<br> <div style='font-size:13px'> your updated package first you logout and login agian</div>";?></div>
								<?php }else{?>
								<form name="payment" method="post" action="pay_option.html" >
									<table width="75%" border="0" cellspacing="2" cellpadding="2" align="center" style="background:none;" class="table table-striped table-hover table-bordered table-responsive">
										<input type="hidden" name="amount" value="<?php echo $data['amount']; ?>" />
										<input type="hidden" name="amount_inr" value="<?php echo $data['amount_inr']; ?>" />
										<input type="hidden" name="ord_id" value="<?php echo $data['oid']; ?>" />
										<tr class="odd">
											<td width="147" align="right" class="reg_align" valign="top"><?php echo $this->lang->line('456_oth_lang');?>&nbsp;&nbsp;&nbsp;:&nbsp;</td>
											<td align="left" colspan="3"	class="form1"><table border="0" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered">
													$<?php echo $data['amount'];?>&nbsp;/&nbsp;<!-- {$functions->getCurrencySyomble($price_sym_sec)} --><?php  echo $data['amount_inr']; ?>
												</table></td>
											  </tr>
                         			
                       					<?php if($gPaypal){?>
										<tr class="odd">
												<td align="right" class="reg_align"><?php echo $this->lang->line('457_oth_lang');?>&nbsp;&nbsp;&nbsp;:&nbsp;</td>
												<td class="contact" align="left" ><input type="radio" name="payment_opt"  value="P" checked="checked">&nbsp;&nbsp;<td><img src="<?php echo base_url();?>images/paypal.jpg" height="100" width="356" /></td> <!--<input type="radio" name="payment_opt" value="A" checked="checked">AUTHORISED.NET&nbsp;&nbsp;&nbsp; -->
												</td>
										</tr>
										<?php }?>
										
										<?php if (0){ //if($ccavanue && 0)?>
										<tr class="odd">
											<td align="right" class="reg_align"><?php echo $this->lang->line('458_oth_lang');?>&nbsp;&nbsp;&nbsp;:&nbsp;</td>
											<td class="contact" align="left" ><input type="radio" name="payment_opt"  checked="checked" value="C" >
												&nbsp;&nbsp; 
											<td><img src="<?php echo base_url(); ?>ccavenue/ccavenue_logo.gif" height="70" width="200" /></td>
											<!--<input type="radio" name="payment_opt" value="A" checked="checked">AUTHORISED.NET&nbsp;&nbsp;&nbsp; -->
											
											</td>
										</tr>
										<?php }?>
										<?php if(0){ //checkout?>
										<tr class="odd"> 
											<td align="right" class="reg_align">2Chek Out&nbsp;&nbsp;&nbsp;:&nbsp;</td>
											<td class="contact" align="left" ><input type="radio" name="payment_opt"  value="t" >
												&nbsp;&nbsp; 
											<td><img src="<?php echo base_url(); ?>2checkout/image.jpg" height="70" width="200" /></td>
											<!--<input type="radio" name="payment_opt" value="A" checked="checked">AUTHORISED.NET&nbsp;&nbsp;&nbsp; -->
											
											</td>
										</tr>
										<?php }?>
										
										
										
										<?php if(PayuMoney){?>
										<tr class="odd"> 
											<td align="right" class="reg_align"><?php echo $this->lang->line('1538_oth_lang');?>&nbsp;&nbsp;&nbsp;:&nbsp;</td>
											<td class="contact" align="left" ><input type="radio" name="payment_opt" checked="checked"  value="pm" >
												&nbsp;&nbsp; 
											<td><img src="<?php echo base_url(); ?>payumoney/payumoney.png" height="70" width="200" /></td>
											<!--<input type="radio" name="payment_opt" value="A" checked="checked">AUTHORISED.NET&nbsp;&nbsp;&nbsp; -->
											
											</td>
										</tr>
										<?php }?>
										<tr class="odd">
											<td colspan="3"><input name="submit"  class="btn btn-success btn-lg" type="submit" value="<?php echo $this->lang->line('1747_oth_lang');?>"></td>
										</tr>
										
									</table>
									<div class="row">
										<div class="col-md-12">
											<strong><?php echo $this->lang->line('464_oth_lang');?></strong>
											<?php echo $data['bankdetail'];?>
										</div>
									</div>
								</form>
								<?php }?>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
