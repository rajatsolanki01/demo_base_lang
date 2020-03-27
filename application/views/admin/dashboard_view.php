<div class="row">
	<div class="col-lg-12">
		<div class="site_heading_box"><?= $this->lang->line('lang_today_approval');?></div>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3"> <i class="fa fa-user-plus fa-5x"></i> </div>
					<div class="col-xs-9 text-right">
						<div class="huge">(<?= hgetCountAppCustomers();?>/<?= hgetCountUnAppCustomers();?>)</div>
						<div><?= $this->lang->line('lang_approval_customer');?></div>
					</div>
				</div>
			</div>
			<a href="<?= base_url();?>UserView">
				<div class="panel-footer"> <span class="pull-left"><?= $this->lang->line('lang_view_details');?> </span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a> 
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="site_heading_box">All Updates</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3"> <i class="fa fa-user fa-5x"></i> </div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?= hgetCountUsers();?></div>
						<div><?= $this->lang->line('lang_users_registration');?></div>
					</div>
				</div>
			</div>
			<a href="<?= base_url();?>PerDayUser">
				<div class="panel-footer"> <span class="pull-left"><?= $this->lang->line('lang_view_details');?></span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a> 
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3"> <i class="fa fa-phone fa-5x"></i> </div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?= hgetCountEmails();?></div>
						<div><?= $this->lang->line('lang_today_inquiry');?></div>
					</div>
				</div>
			</div>
			<a href="<?= base_url();?>MailView">
				<div class="panel-footer"> <span class="pull-left"><?= $this->lang->line('lang_view_details');?></span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a> 
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="site_heading_box">Usefull Links</div>
	</div>
</div>
<br />
<div class="row">
	<div class="sct_right"> 
		<!--[if !IE]>start dashboard menu<![endif]-->
		<div class="dashboard_menu_wrapper">
			<ul class="dashboard_menu">
				<?php
	            if($this->session->userdata('adminUserType')=='A' || $this->session->userdata('adminUserType')=='S')
	            {?>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>GeneralSetting" class="d1"><span><?= $this->lang->line('lang_general_setting');?></span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>UserView" class="d2"><span><?= $this->lang->line('lang_user_management');?></span></a></div>
					</div>
					<!-- <div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>CustomerView" class="d3"><span><?= $this->lang->line('lang_customer_managment');?></span></a></div>
					</div> -->
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>ShowLocation" class="d4"><span><?= $this->lang->line('lang_location_management');?></span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>SEO" class="d5"><span><?= $this->lang->line('lang_seo_tools_and_settings');?></span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>EMailTemplates" class="d6"><span><?= $this->lang->line('lang_email_settings_and_templates');?></span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>MailView" class="d9"><span><?= $this->lang->line('lang_inquiry_box');?></span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>CategoryView/sell" class="d10"><span><?= $this->lang->line('lang_categories');?></span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>StaticPage" class="d16"><span><?= $this->lang->line('lang_static_page_list');?></span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>HomeBanner" class="d15"><span><?= $this->lang->line('lang_homepage_management');?></span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>ShowCurrency" class="d61"><span><?= $this->lang->line('lang_currency_management');?></span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>GeneralSetting#slsetting" class="d62"><span><?= $this->lang->line('lang_social_management');?></span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>GeneralSetting#goosetting" class="d63"><span><?= $this->lang->line('lang_google_management');?></span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>GeneralSetting#chnglogoo" class="d64"><span><?= $this->lang->line('lang_logo_management');?></span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>PerDayUser" class="d67"><span>User Statistics</span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>NewslLst" class="d68"><span>News</span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url().'SuccessStorie';?>" class="d70"><span><?= $this->lang->line('lang_success_stories');?></span></a></div>
					</div>
					<div class="col-md-2">
						<div class="bor-1"><a href="<?= base_url();?>ViewStaffUsers" class="d72"><span><?= $this->lang->line('lang_staff_member_management');?></span></a></div>
					</div>
				<?php }?>
			</ul>
		</div>
	</div>
</div>