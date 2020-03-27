<br />
<script src="<?= base_url();?>assets/ckeditor_2017/ckeditor.js"></script>
<div class="panel panel-default">
	<div class=" panel-heading clearfix">
		<h2 class="page-header"><?= $this->lang->line('lang_site_details');?> (<?php echo $this->session->userdata("user_lang");?>)</h2>
	</div>
	<div class="panel-body"> 
		<?php 
		if($this->session->flashdata('GeneralSettingsMsg'))
		{?>
			<div class="col-md-12">
				<div class="alert alert-success" role="alert"> <?= $this->session->flashdata('GeneralSettingsMsg');?> </div>
			</div>
		<?php }
		if(isset($error))
		{?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert"> <?= $this->lang->line('lang_sorry_demo_mode_is_on');?> </div>
			</div>
		<?php } ?>

		<?php if  ($this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
        <table class="listing form table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0">
		<tr>
        <td class="first" style="text-align:left" width="30%"><strong><?= $this->lang->line('lang_company_name');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><label><?= $site_config->company_name;?></label></td>

		<td class="first" style="text-align:left" width="30%"><strong><?= $this->lang->line('lang_company_address');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><label><?= $site_config->company_address;?></label></td>
        </tr>

		<tr>
        <td class="first" style="text-align:left" width="30%"><strong><?= $this->lang->line('lang_phone');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><label><?= $site_config->phone;?></label></td>

		<td class="first" style="text-align:left" width="30%"><strong><?= $this->lang->line('lang_mobile');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><label><?= $site_config->fax;?></label></td>
        </tr>

		<tr>
        <td class="first" style="text-align:left" width="30%"><strong><?= $this->lang->line('lang_email');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><label><?= $site_config->email;?></label></td>

		<td class="first" style="text-align:left" width="30%"><strong><?= $this->lang->line('lang_site_url');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><label><?= $site_config->site_url;?></label></td>
        </tr>

		<tr>
        <td class="first" style="text-align:left" width="30%"><strong><?= $this->lang->line('lang_support_email');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><label><?= $site_config->support_email;?></label></td>

		<td class="first" style="text-align:left" width="30%"><strong><?= $this->lang->line('lang_webmaster_email');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><label><?= $site_config->webmaster_email;?></label></td>
        </tr>
		</table>
		<?php }?>	


		<div>
		<?php if ($this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
            <div style="background-color: #5d5d5d; color:white;" class=" panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_site_details');?> (<?php echo $this->session->userdata("data_update_lang");?>)</h2></div>
        <?php }//print_r($seoedit_curr_lang);?>

			<div class="sct_right">
				<form name="frm_siteconfig" action="" method="post" enctype="multipart/form-data" class="search_form general_form" >
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><strong><?= $this->lang->line('lang_company_name');?>:</strong> <span class="star">*</span></label>
								<div class="inputs"> <span class="">
									<input type="text" class="text form-control" name="company_name"  value="<?= (!empty($site_config_curr_lang))? $site_config_curr_lang->company_name:'';?>" />
									</span> <span class="system positive star" id="id_company_name"><?= form_error('company_name');?></span> 
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?= $this->lang->line('lang_company_address');?> : <span class="star">*</span> </label>
								<div class="inputs"> <span class="">
									<input type="text" class="text form-control" name="company_address"  value="<?= (!empty($site_config_curr_lang))? $site_config_curr_lang->company_address:'';?>" />
								</span><span class="system positive star" id="id_company_address"><?= form_error('company_address');?></span> </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?= $this->lang->line('lang_phone');?> : <span class="star">*</span> </label>
								<div class="inputs"> <span class="">
									<input type="text" class="text form-control" name="phone" value="<?= (!empty($site_config_curr_lang))? $site_config_curr_lang->phone:'';?>"  />
								</span><span class="system positive star" id="id_phone"><?= form_error('phone');?></span> </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?= $this->lang->line('lang_mobile');?> : <span class="star">*</span> </label>
								<div class="inputs"> <span class="">
									<input type="text" class="text form-control" name="fax"  value="<?= (!empty($site_config_curr_lang))? $site_config_curr_lang->fax:'';?>"  />
								</span><span class="system positive star" id="id_fax"><?= form_error('fax');?></span> </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?= $this->lang->line('lang_email');?> : <span class="star">*</span> </label>
								<div class="inputs"> <span class="">
									<input type="text" class="text form-control" name="email"  value="<?= (!empty($site_config_curr_lang))? $site_config->email:'';?>" />
								</span><span class="system positive star" id="id_email"><?= form_error('email');?></span> </div>
							</div>
						</div>
						<div class="col-md-6" style="display:none">
							<div class="form-group">
								<label><?= $this->lang->line('lang_site_url');?> : <span class="star">*</span> </label>
								<div class="inputs"> <span class="">
									<input type="text" class="text form-control" name="site_url"  value="<?= (!empty($site_config_curr_lang))? $site_config_curr_lang->site_url:'';?>" />
								</span><span class="system positive star" id="id_site_url"></span> </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?= $this->lang->line('lang_support_email');?> : <span class="star">*</span> </label>
								<div class="inputs"> <span class="">
									<input type="text" class="text form-control" name="support_email"  value="<?= (!empty($site_config_curr_lang))? $site_config_curr_lang->support_email:'';?>" />
								</span><span class="system positive star" id="id_support_email"><?= form_error('support_email');?></span> </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?= $this->lang->line('lang_webmaster_email');?> : <span class="star">*</span> </label>
								<div class="inputs"> <span class="">
									<input type="text" class="text form-control" name="webmaster_email"  value="<?= (!empty($site_config_curr_lang))? $site_config_curr_lang->webmaster_email:'';?>" />
								</span><span class="system positive star" id="id_webmaster_email"><?= form_error('webmaster_email');?></span> </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?= $this->lang->line('lang_page_row');?> : <span class="star">*</span> </label>
								<div class="inputs"> <span class="">
									<input type="text" class="text form-control" name="page_row"  value="<?= (!empty($site_config_curr_lang))? $site_config_curr_lang->page_row:'';?>" />
								</span><span class="system positive star" id="id_page_row"><?= form_error('page_row');?></span> </div>
							</div>
						</div>
						<div class=" col-md-6"> 
							<label><?= $this->lang->line('lang_set_default_time_zone');?></label><span id="default_time_zone" class="alert"><?= form_error('default_time_zone');?></span>
							<select name="default_time_zone" class="form-control"><?= $time_zone_dropdown;?></select>
						</div>
						<div class="col-md-6">
							<label><?= $this->lang->line('lang_auto_approval_on_off');?>: <span class="star">*</span> </label>
							<div class="inputs">
								<ul class="set-left-li padd_left_ul">
									<li>
										<input type="radio" value="Y" name="auto_approval" <?php if($site_config->auto_approval=='Y'){?> checked="checked" <?php }?> />
									<?= $this->lang->line('lang_on');?> </li>
									<li>
										<input type="radio" value="N" name="auto_approval" <?php if($site_config->auto_approval=='N'){?> checked="checked" <?php }?> />
									<?= $this->lang->line('lang_off');?> </li>
								</ul>
							</div>
							<?= form_error('auto_approval');?>
						</div>
						
						<br /><br />

						<div class="col-md-12">
							<div class="buttons"><br> <span class="button send_form_btn"> 
								<input name="btn_sitconfig" class="btn btn-primary" type="submit" value="Submit" />
							</span> </div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class=" panel-heading clearfix">
		<h2 class="page-header"><?= $this->lang->line('lang_payment_option');?> (<?php echo $this->session->userdata("user_lang");?>)</h2>
	</div>
	<div class="panel-body">
		<div class="row">
			<?php 
			if($this->session->flashdata('PaymentSettingsMsg'))
			{?>
				<div class="col-md-12">
					<div class="alert alert-success" role="alert"> <?= $this->session->flashdata('PaymentSettingsMsg');?> </div>
				</div>
			<?php }?>
		</div>
		<div class="row">
			<div class="sct_right">
				<form name="frm_payment" action="" method="post" enctype="multipart/form-data" class="search_form general_form" >
					<fieldset>
						<div class="forms">
							<div class="col-md-6"> 
								<?php 
								if($gPaypal=='true')
								{?>
									<div class="custom_admin_panel">
										<div class="custom_admin_heading"> Paypal ON/OFF </div>
										<div class="custom_admin_panel_body">
											<div class="">
												<label>Paypal ON/off: <span class="star">*</span> </label>
												<div class="inputs">
													<ul class="set-left-li padd_left_ul">
														<li>
															<input type="radio" value="Y" name="paypal_no_off" <?php if($site_config->paypal_no_off=='Y'){?> checked="checked" <?php }?> />
														On </li>
														<li>
															<input type="radio" value="N" name="paypal_no_off"  <?php if($site_config->paypal_no_off=='N'){?> checked="checked" <?php }?> />
														Off</li>
													</ul>
													<span class="system positive star"><?= form_error('paypal_no_off');?></span>
												</div>
											</div>
											<div class="">
												<label>paypal email : <span class="star">*</span> </label>
												<div class="inputs"> <span class="">
													<input type="text" class="text form-control" name="paypalemail"  value="<?= $site_config->paypalemail;?>" />
												</span><span class="system positive star" id="paypalemail_alert"><?= form_error('paypalemail');?></span> </div>
											</div>
										</div>
									</div>								
								<?php }?>
							</div>
							<div class="col-md-6"> 
								<?php
								if($gCcavanue=='true')
								{?>
									<div class="custom_admin_panel">
										<div class="custom_admin_heading"> CC Avenue ON/OFF </div>
										<div class="custom_admin_panel_body">
											<div class="">
												<label>CC Avenue ON/off: <span class="star">*</span> </label>
												<div class="inputs">
													<ul class="set-left-li">
														<li>
															<input type="radio" value="Y" name="cc_avenue_onoff" <?php if($site_config->cc_avenue_onoff=='Y'){?> checked="checked" <?php }?> />
														On </li>
														<li>
															<input type="radio" value="N" name="cc_avenue_onoff"  <?php if($site_config->cc_avenue_onoff=='N'){?> checked="checked" <?php }?> />
														Off</li>
													</ul>
												</div>
												<span class="system positive star"><?= form_error('cc_avenue_onoff');?></span>
											</div>
											
											<div class="row">
												<div class="col-md-6">
													<label>CC Avenue WorkingKey : <span class="star">*</span> </label>
													<div class="inputs"> <span class="">
														<input type="text" class="text form-control" name="cc_working_key"  value="<?= $site_config->cc_working_key;?>" />
													</span><span class="system positive star" id="cc_working_key_alert"><?= form_error('cc_working_key');?></span> </div>
												</div>
												<div class="col-md-6">
													<label>CC Avenue Merchant Id : <span class="star">*</span> </label>
													<div class="inputs"> <span class="">
														<input type="text" class="text form-control" name="cc_merchant_id"  value="<?= $site_config->cc_merchant_id;?>" />
													</span><span class="system positive star" id="cc_merchant_id_alert"><?= form_error('cc_merchant_id');?></span> </div>
												</div>
											</div>
										</div>
									</div>								
								<?php }?>
							</div>
							<div class="col-md-6">
								<?php 
								if($gCheckout=='true')
								{?>
									<div class="custom_admin_panel">
										<div class=" custom_admin_heading"> 2Chek Out ON/OFF </div>
										<div class="custom_admin_panel_body">
											<div class="">
												<label>2Chek ON/off: <span class="star">*</span> </label>
												<div class="inputs">
													<ul class="set-left-li">
														<li>
															<input type="radio" value="Y" name="chekout_onoff" <?php if($site_config->chekout_onoff=='Y'){?> checked="checked" <?php }?> />
														On </li>
														<li>
															<input type="radio" value="N" name="chekout_onoff"  <?php if($site_config->chekout_onoff=='N'){?> checked="checked" <?php }?> />
														Off</li>
													</ul>
												</div>
												<span class="system positive star"><?= form_error('chekout_onoff');?></span>
											</div>
											
											<div class="row">
												<div class="col-md-6">
													<label>2Chek Out email : <span class="star">*</span> </label>
													<div class="inputs"> <span class="">
														<input type="text" class="text form-control" name="chekout_email"  value="<?= $site_config->chekout_email;?>" />
													</span><span class="system positive star" id="paypalemail_alert"><?= form_error('chekout_email');?></span> </div>
												</div>
												<div class="col-md-6">
													<label>2 Chek Out Key : <span class="star">*</span> </label>
													<div class="inputs"> <span class="">
														<input type="text" class="text form-control" name="2chekout_key"  value="<?= $site_config->chekoutKey2;?>" />
													</span><span class="system positive star" id="cc_working_key_alert"><?= form_error('2chekout_key');?></span> </div>
												</div>
												<div class="col-md-12">
													<label>2Chek Out Sid : <span class="star">*</span> </label>
													<div class="inputs"> <span class="">
														<input type="text" class="text form-control" name="2chekout_sid"  value="<?= $site_config->chekoutSId2;?>" />
													</span><span class="system positive star" id="cc_merchant_id_alert"><?= form_error('2chekout_sid');?></span> </div>
												</div>
											</div>
										</div>
									</div>
								<?php }?>
							</div>
							<div class="col-md-6"> 
								<?php
								if($gPayuMoney=='true')
								{?>
									<div class="custom_admin_panel">
										<div class="custom_admin_heading"> <?= $this->lang->line('lang_payuMoney_on_off');?> </div>
										<div class="custom_admin_panel_body">
											<div class="">
												<label><?= $this->lang->line('lang_payuMoney_on_off');?>: <span class="star">*</span> </label>
												<div class="inputs">
													<ul class="set-left-li">
														<li>
															<input type="radio" value="Y" name="payumoney_on_off" <?php if($site_config->payumoney_on_off=='Y'){?> checked="checked" <?php }?> />
														<?= $this->lang->line('lang_on');?> </li>
														<li>
															<input type="radio" value="N" name="payumoney_on_off"  <?php if($site_config->payumoney_on_off=='N'){?> checked="checked" <?php }?> />
														Off</li>
													</ul>
												</div>
												<span class="system positive star"><?= form_error('payumoney_on_off');?></span>
											</div>
											<div class="row">
												<div class="col-md-6">
													<label><?= $this->lang->line('lang_merchant_key');?> : <span class="star">*</span> </label>
													<div class="inputs"> <span class="">
														<input type="text" class="text form-control" name="payu_key"  value="<?= $site_config->payu_key;?>" />
													</span><span class="system positive star" id="paypalemail_alert"><?= form_error('payu_key');?></span> </div>
												</div>
												<div class="col-md-6">
													<label><?= $this->lang->line('lang_merchant_salt');?> : <span class="star">*</span> </label>
													<div class="inputs"> <span class="">
														<input type="text" class="text form-control" name="payu_salt"  value="<?= $site_config->payu_salt;?>" />
													</span><span class="system positive star" id="cc_working_key_alert"><?= form_error('payu_salt');?></span> </div>
												</div>
											</div>
										</div>
									</div>
								<?php }?>
							</div>
							<div class="col-md-12">
							<?php if  ($this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
							<table class="listing form table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0">
							<tr>
							<td class="first" style="text-align:left" width="30%"><strong><?= $this->lang->line('lang_update_your_bank_details');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
							<td><label><?= $site_config->bankdetail;?></label></td>
							</tr>
							</table>
							<?php }?>

							<?php if ($this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
            <div style="background-color: #5d5d5d; color:white;" class=" panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_update_your_bank_details');?> (<?php echo $this->session->userdata("data_update_lang");?>)</h2></div>
        <?php }//print_r($seoedit_curr_lang);?>

								<div class="custom_admin_panel">
									<div class="custom_admin_heading"><?= $this->lang->line('lang_update_your_bank_details');?>:</div>
									<div class="custom_admin_panel_body">
										<div class="">
											<label></label>
											<div class=""> <span class="" style="width:600px;">
												<textarea id="editor1" name="bankdetail_editor"  class="form-control"><?= $site_config_curr_lang->bankdetail;?></textarea>
												<script>
													CKEDITOR.replace('editor1');
												</script> 
												<script>      
													config.removePlugins= 'toolbar'
												</script> 
											</span> <span class="system positive star" id="msg"><?= form_error('bankdetail_editor');?></span> </div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="buttons"> <span class="button send_form_btn">
									<input name="btn_payment" class="btn btn-primary" type="submit" value="Submit" />
								</span> </div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default" id="slsetting">
	<div class=" panel-heading clearfix">
		<h2 class="page-header"><?= $this->lang->line('lang_social_link_setting');?></h2>
	</div>
	<div class="panel-body">
		<div class="row">
			<?php 
			if($this->session->flashdata('SocialSettingsMsg'))
			{?>
				<div class="col-md-12">
					<div class="alert alert-success" role="alert"> <?= $this->session->flashdata('SocialSettingsMsg');?> </div>
				</div>
			<?php }?>
		</div>
		<div class="row">
			<div class="sct_right">
				<form name="social_link" action="#" method="post" enctype="multipart/form-data" class="search_form general_form" >
					<fieldset>
						<div class="forms">
							<div class="col-md-4">
								<div class="custom_admin_panel">
									<div class="custom_admin_heading"> <?= $this->lang->line('lang_facebook_page_name');?> : <!-- <span class="star">*</span> --> </div>
									<div class="custom_admin_panel_body">
										<div class="form-group">
											<div class="inputs"> <span class="">
												<input type="text" class="text form-control" name="facebook"  value="<?= $generalsetting->facebook;?>" />
											</span><span class="system positive star" id="user_name"></span> </div>
										</div>
										<div class="">
											<label><?= $this->lang->line('lang_facebook_on_off');?>: <!-- <span class="star">*</span> --> </label>
											<div class="inputs">
												<ul class="set-left-li padd_left_ul">
													<li>
														<input type="radio" value="Y" name="facebook_status" <?php if($generalsetting->facebook_status=='Y'){?> checked="checked" <?php }?> />
													<?= $this->lang->line('lang_on');?> </li>
													<li>
														<input type="radio" value="N" name="facebook_status" <?php if($generalsetting->facebook_status=='N'){?> checked="checked" <?php }?> />
													<?= $this->lang->line('lang_off');?></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="custom_admin_panel">
									<div class=" custom_admin_heading"> <?= $this->lang->line('lang_twitter_page_name');?> : <!-- <span class="star">*</span> --> </div>
									<div class="custom_admin_panel_body">
										<div class="form-group">
											<div class="inputs"> <span class="">
												<input type="text" class="text form-control" name="twitter"  value="<?= $generalsetting->twitter;?>" />
											</span><span class="system positive star" id="name"></span> </div>
										</div>
										<div class="">
											<label><?= $this->lang->line('lang_twitter_on_off');?>: <!-- <span class="star">*</span> --> </label>
											<div class="inputs">
												<ul class="set-left-li padd_left_ul">
													<li>
														<input type="radio" value="Y" name="twitter_status" <?php if($generalsetting->twitter_status=='Y'){?>checked="checked" <?php }?> />
													<?= $this->lang->line('lang_on');?> </li>
													<li>
														<input type="radio" value="N" name="twitter_status"  <?php if($generalsetting->twitter_status=='N'){?>checked="checked" <?php }?> />
													<?= $this->lang->line('lang_off');?></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="custom_admin_panel">
									<div class="custom_admin_heading"> Google+ Name : <!-- <span class="star">*</span> --> </div>
									<div class="custom_admin_panel_body">
										<div class="form-group">
											<div class="inputs"> <span class="">
												<input type="text" class="text form-control" name="gpluse"  value="<?= $generalsetting->gpluse;?>" />
											</span><span class="system positive star" id="name"></span> </div>
										</div>
										<div class="">
											<label>Google+ On/Off: <!-- <span class="star">*</span> --> </label>
											<div class="inputs">
												<ul class="set-left-li padd_left_ul">
													<li>
														<input type="radio" value="Y" name="gpluse_status" <?php if($generalsetting->gpluse_status=='Y'){?>checked="checked" <?php }?> />
													<?= $this->lang->line('lang_on');?> </li>
													<li>
														<input type="radio" value="N" name="gpluse_status" <?php if($generalsetting->gpluse_status =='N'){?>checked="checked" <?php }?> />
													<?= $this->lang->line('lang_off');?></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>                            
							<div class="col-md-4">
								<div class="custom_admin_panel">
									<div class="custom_admin_heading"> Pinterest  Name : <!-- <span class="star">*</span> --> </div>
									<div class="custom_admin_panel_body">
										<div class="form-group">
											<div class="inputs"> <span class="">
												<input type="text" class="text form-control" name="pinterest"  value="<?= $generalsetting->pinterest;?>" />
											</span><span class="system positive star" id="name"></span> </div>
										</div>
										<div class="">
											<label>Pinterest  On/Off: <!-- <span class="star">*</span> --> </label>
											<div class="inputs">
												<ul class="set-left-li padd_left_ul">
													<li>
														<input type="radio" value="Y" name="pinterest_status" <?php if($generalsetting->pinterest_status=='Y'){?>checked="checked" <?php }?> />
													<?= $this->lang->line('lang_on');?> </li>
													<li>
														<input type="radio" value="N" name="pinterest_status" <?php if($generalsetting->pinterest_status =='N'){?>checked="checked" <?php }?> />
													<?= $this->lang->line('lang_off');?></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="custom_admin_panel">
									<div class=" custom_admin_heading"> Youtube Page Name : <!-- <span class="star">*</span> --> </div>
									<div class="custom_admin_panel_body">
										<div class="form-group">
											<div class="inputs"> <span class="">
												<input type="text" class="text form-control" name="youtube" value="<?= $generalsetting->youtube;?>">
											</span><span class="system positive star" id="name"></span> </div>
										</div>
										<div class="">
											<label>Youtube ON/off: <!-- <span class="star">*</span> --> </label>
											<div class="inputs">
												<ul class="set-left-li padd_left_ul">
													<li>
														<input type="radio" value="Y" name="youtube_on_off" <?php if($generalsetting->youtube_on_off=='Y'){?> checked="checked" <?php }?> />
													<?= $this->lang->line('lang_on');?> </li>
													<li>
														<input type="radio" value="N" name="youtube_on_off" <?php if($generalsetting->youtube_on_off =='N'){?> checked="checked" <?php }?> />
													<?= $this->lang->line('lang_off');?></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="custom_admin_panel">
									<div class=" custom_admin_heading"> Linkedin Page Name : <!-- <span class="star">*</span> --> </div>
									<div class="custom_admin_panel_body">
										<div class="form-group">
											<div class="inputs"> <span class="">
												<input type="text" class="text form-control" name="linkedin" value="<?= $generalsetting->linkedin;?>">
											</span><span class="system positive star" id="name"></span> </div>
										</div>
										<div class="">
											<label>linkedin ON/off: <!-- <span class="star">*</span> --> </label>
											<div class="inputs">
												<ul class="set-left-li padd_left_ul">
													<li>
														<input type="radio" value="Y" name="linkedin_on_off" <?php if($generalsetting->linkedin_on_off=='Y'){?> checked="checked" <?php }?> />
													<?= $this->lang->line('lang_on');?> </li>
													<li>
														<input type="radio" value="N" name="linkedin_on_off" <?php if($generalsetting->linkedin_on_off =='N'){?> checked="checked" <?php }?> />
													<?= $this->lang->line('lang_off');?></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="buttons"> <span class="button send_form_btn">
									<input name="btn_social" class="btn btn-primary" type="submit" value="Submit" />
								</span> </div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class=" panel-heading clearfix">
		<h2 class="page-header"><?= $this->lang->line('lang_smtp_mail_configuration');?></h2>
	</div>
	<div class="panel-body">
		<div class="row">
			<?php 
			if($this->session->flashdata('SMTPSettingsMsg'))
			{?>
				<div class="col-md-12">
					<div class="alert alert-success" role="alert"> <?= $this->session->flashdata('SMTPSettingsMsg');?> </div>
				</div>
			<?php }?>
		</div>
		<div class="">
			<div class="sct_right">
				<form name="smtp_mail_setting" action="#" method="post" enctype="multipart/form-data" >
					<table class="table-striped table table-condensed table-responsive" style="border:1px solid #ccc;" cellpadding="3" cellspacing="3" width="100%" border="0">
						<tr class="bg">
							<td class="first set-width" style="text-align:left;" width="15%"><strong><?= $this->lang->line('lang_mail_on_off');?> &nbsp;: </strong></td>
							<td class="last"><input type="radio" value="Y" name="smtp_onoff" <?php if($smtpsetting->smtp_onoff=='Y'){?> checked="checked" <?php }?> />
								<strong><?= $this->lang->line('lang_on');?> </strong>
								<input type="radio" value="N" name="smtp_onoff" <?php if($smtpsetting->smtp_onoff=='N'){?> checked="checked" <?php }?> />
								<strong><?= $this->lang->line('lang_off');?></strong>
							</td>
							<td><div id="user_name"></div></td>
						</tr>
						<tr class="bg">
							<td class="first  set-width" style="text-align:left;"><strong><?= $this->lang->line('lang_port');?> &nbsp;:</strong></td>
							<td class="last"><input type="text" class="form-control" name="smtp_port"  value="<?= $smtpsetting->smtp_port;?>" />
								&nbsp;<small style="color:#F00; ">(Sets SMTP Port. Default Port is 25)</small></td>
								<td><div id="alert_smtp_port"></div>
							</td>
						</tr>
						<tr class="bg">
							<td class="first  set-width" style="text-align:left;"><strong><?= $this->lang->line('lang_secur');?> &nbsp;:</strong></td>
							<td class="last"><input type="text" class=" form-control" name="smtp_secure"  value="<?= $smtpsetting->smtp_secure;?>" />
								&nbsp;<small style="color:#F00;">(Options are "", "ssl" or "tls")</small></td>
								<td><div id="alert_smtp_secure"></div>
							</td>
						</tr>
						<tr class="bg">
							<td class="first  set-width" style="text-align:left;"><strong><?= $this->lang->line('lang_host');?> &nbsp;:</strong></td>
							<td class="last"><input type="text" class=" form-control" name="smtp_host"  value="<?= $smtpsetting->smtp_host;?>" />
								&nbsp;<small style="color:#F00; ">(SMTP server)</small></td>
								<td><div id="alert_smtp_host"></div>
							</td>
						</tr>	
						<tr class="bg">
							<td class="first  set-width" style="text-align:left;"><strong><?= $this->lang->line('lang_user_name');?> &nbsp;:</strong></td>
							<td class="last"><input type="text" class=" form-control" name="smtp_user_name"  value="<?= $smtpsetting->smtp_user_name;?>" />
								&nbsp;<small style="color:#F00; ">(Sets SMTP username.)</small></td>
								<td><div id="alert_smtp_user_name"></div>
							</td>
						</tr>	
						<tr class="bg">
							<td class="first  set-width" style="text-align:left;"><strong> <?= $this->lang->line('lang_password');?> &nbsp;:</strong></td>
							<td class="last"><input type="text" class=" form-control" name="smtp_password"  value="<?= $smtpsetting->smtp_password;?>" />
								&nbsp;
								<ssmallpan style="color:#F00; ">
								(Sets SMTP password.)</small></td>
								<td><div id="alert_smtp_password"></div>
							</td>
						</tr>
					</table>
					<div class="">
						<div class="buttons"> <span class="button send_form_btn"><span></span>
							<input name="btn_smtp_setting" class="btn btn-primary" type="submit" value="Submit" />
						</span> </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default" id="goosetting">
	<div class=" panel-heading clearfix">
		<h2 class="page-header"><?= $this->lang->line('lang_google_setting');?></h2>
	</div>
	<div class="panel-body">
		<div class="row">
			<?php 
			if($this->session->flashdata('GoogleSettingsMsg'))
			{?>
				<div class="col-md-12">
					<div class="alert alert-success" role="alert"> <?= $this->session->flashdata('GoogleSettingsMsg');?> </div>
				</div>
			<?php }?>
		</div>
		<div class="row">
			<div class="sct_right">
				<form name="google_setting" action="#" method="post" enctype="multipart/form-data" class="search_form general_form" >
					<fieldset>
						<div class="forms">
							<div class="col-md-6" >
								<label><?= $this->lang->line('lang_google_map_api_key');?> :</label>
								<div class="inputs">
									<input type="text" class="form-control" name="google_map_key"  value="<?= $generalsetting->google_map_key;?>" plceholder="Google Map V3 JS key" />
									<span class="system positive star" id="name"></span> 
								</div>
								<a href="https://code.google.com/apis/console/" target="_blank"><?= $this->lang->line('lang_generate_new_google_map_api_key_here');?></a> 
							</div>
							<div class="col-md-6">
								<label><?= $this->lang->line('lang_google_webmaster_verification_code');?> :</label>
								<div class="inputs">
									<input type="text" class="form-control" name="google_verification"  value="<?= $generalsetting->google_verification;?>"  plceholder="" />
									<span class="system positive star" id="name"></span> 
								</div>
								<a href="https://www.google.com/webmasters/tools/home?hl=en" target="_blank"><?= $this->lang->line('lang_get_your_google_webmaster_verification_meta_code_signup_now');?></a> 
							</div>
							<div class="col-md-12">
								<label><?= $this->lang->line('lang_google_analytics_code');?>:</label>
								<div class="inputs">
									<textarea class="form-control" name="google_analytic" cols="33" rows="8"><?= stripslashes($generalsetting->google_analytic);?></textarea>
									<span class="system positive star" id="name"></span> 
								</div>
								<a href="https://www.google.com/analytics/home/?hl=en" target="_blank"><?= $this->lang->line('lang_get_your_get_your_google_analytical_code_signup_now');?></a> 
							</div>
							<div class="col-md-6">
								<label><?= $this->lang->line('lang_google_adsense_id');?> :</label>
								<div class="inputs">
									<input type="text" class="form-control" name="google_addsense"  value="<?= $generalsetting->google_addsense;?>" />
									<span class="system positive star" id="name"></span> 
								</div>
								<a href="https://www.google.com/adsense" target="_blank"><?= $this->lang->line('lang_get_your_google_google_adsense_id_signup_now');?></a> 
							</div>
							<div class="col-md-6">
								<label><?= $this->lang->line('lang_copyright_information');?> :</label>
								<div class="inputs">
									<input type="text" class="form-control" name="copyright"  value="<?= $generalsetting->copyright;?>" />
									<span class="system positive star" id="name"></span> 
								</div>
							</div>
							<div class="col-md-12">
								<div class="buttons margin_top_10"> <span class="button send_form_btn">
									<input name="btn_google"class="btn btn-primary
									" type="submit" value="Submit"/>
								</span> </div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<!--==========complete smtp mail setting========================-->
<div class="panel panel-default">
	<div class=" panel-heading clearfix">
		<h2 class="page-header"><?= $this->lang->line('lang_site_status');?> (<?php echo $this->session->userdata("user_lang");?>)</h2>
	</div>
	<div class="panel-body">
		<div class="row">
			<?php 
			if($this->session->flashdata('SiteStatusSettingsMsg'))
			{?>
				<div class="col-md-12">
					<div class="alert alert-success" role="alert"> <?= $this->session->flashdata('SiteStatusSettingsMsg');?> </div>
				</div>
			<?php }?>
		</div>
		<div class="col-md-12">

		<?php if  ($this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
							<table class="listing form table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0">
							<tr>
							<td class="first" style="text-align:left" width="30%"><strong><?= $this->lang->line('lang_custom_message');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
							<td><label><?= $site_config->under_construction;?></label></td>
							</tr>
							</table>
							<?php }?>

								

			<div class="sct_right">
				<form name="sitestatus" action="#" method="post" enctype="multipart/form-data" >
					<table class="listing form table-striped table-bordered table-responsive" cellpadding="3" cellspacing="3">
						<tr class="bg">
							<td class="first" style="text-align:right"><strong> &nbsp;&nbsp;&nbsp;<?= $this->lang->line('lang_site_on_off');?>: </strong></td>
							<td class="last"> <?= $this->lang->line('lang_on');?>:
								<input type="radio" value="Y" name="site_onoff" <?php if($site_config->site_onoff=='Y'){?> checked="checked" <?php }?> />
								<?= $this->lang->line('lang_off');?>:
								<input type="radio" value="N" name="site_onoff" <?php if($site_config->site_onoff=='N'){?> checked="checked" <?php }?> />
								<span class="star">*</span>
							</td>
							<td><div id="user_name"></div></td>
						</tr>
						<tr class="bg">
						<?php if ($this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
            <div style="background-color: #5d5d5d; color:white;" class=" panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_site_status');?> (<?php echo $this->session->userdata("data_update_lang");?>)</h2></div>
        <?php }//print_r($seoedit_curr_lang);?>	
							</tr>	

						<tr class="bg">
							<td class="first" style="text-align:right"><strong><?= $this->lang->line('lang_custom_message');?> :</strong></td>
							<td class="last"><textarea class="form-control" name="under_construction" cols="100" rows="8" id='area1'><?= $site_config_curr_lang->under_construction;?></textarea></td>
							<td><div id="new_pass"></div></td>
						</tr>
					</table>
					<br />
					<div class="row">
						<div class="buttons"> <span class="button send_form_btn"><span>&ensp; &ensp; &ensp;</span>
							<input name="btn_sitestatus" type="submit" class="btn btn-primary" value="Submit"  />
						</span> </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class=" panel-heading clearfix">
		<h2 class="page-header"><?= $this->lang->line('lang_conformation_email_on_off');?></h2>
	</div>
	<div class="panel-body">
		<div class="row">
			<?php 
			if($this->session->flashdata('EmailSettingsMsg'))
			{?>
				<div class="col-md-12">
					<div class="alert alert-success" role="alert"> <?= $this->session->flashdata('EmailSettingsMsg');?> </div>
				</div>
			<?php }?>
		</div>
		<div class="col-md-12">
			<div class="sct_right">
				<table class="listing form" cellpadding="3" cellspacing="3">
					<form name="conformation_email" action="#" method="post" enctype="multipart/form-data" >
						<tr>
							<td><strong><?= $this->lang->line('lang_conformation_email_on_off');?>:</strong></td>
							<td><input type="radio" name="conformatioemail_onoff" value="on" size="10" <?php if($generalsetting->conformatioemail_onoff=='on'){?> checked="checked"  <?php }?> />
								:<?= $this->lang->line('lang_on');?>
							</td>
							<td><input type="radio" name="conformatioemail_onoff" value="off" size="10" <?php if($generalsetting->conformatioemail_onoff=='off'){?> checked="checked" <?php }?> />
									:<?= $this->lang->line('lang_off');?>
							</td>
						</tr>
						<tr>
							<td>&ensp;</td>
						</tr>
						<tr>
							<td colspan="3"><div class="row">
								<div class="buttons"> <span class="button send_form_btn"><span>&ensp; &ensp; &ensp;</span>
									<input name="btn_email" class="btn btn-primary" type="submit" value="Submit" />
								</span> </div>
							</div></td>
						</tr>
					</form>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default" id="chnglogoo">
	<div class=" panel-heading clearfix">
		<h2 class="page-header"><?= $this->lang->line('lang_change_logo');?></h2>
	</div>
	<div class="panel-body">
		<div class="row">
			<?php
			if($this->session->flashdata('LogoUploadingError'))
			{
				echo '<div class="col-md-12">'.$this->session->flashdata('LogoUploadingError').'</div>';
			} 
			if($this->session->flashdata('LogoSettingsMsg'))
			{?>
				<div class="col-md-12">
					<div class="alert alert-success" role="alert"> <?= $this->session->flashdata('LogoSettingsMsg');?> </div>
				</div>
			<?php }?>
		</div>
		<div class="col-md-12">
			<div class="sct_right">
				<form name="changelogo" action="" method="post" enctype='multipart/form-data'>
					<input type="file" name="logo" />
					<input type="hidden" value="<?= $gLOGO;?>" name="hiddenlogo" />
					<img src="<?= base_url().'images/logofolder/'.$gLOGO;?>" width="285" height="70" />
					<div class="row"> <br />
						<div class="buttons"> <span class="button send_form_btn"><span>&ensp; &ensp; &ensp;</span>
							<input name="btn_logo" class="btn btn-primary" type="submit" value="Submit"/>
						</span> </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

