<?php hcreatePrivilageSessForStaffLeftPanel();?>
<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			
			<li class="heading-top"><?= $this->lang->line('lang_welcome');?> <strong>Staff</strong></li>
			<?php 
			if(hmenuIdExitsInPrivilageArray(1)=='Y')
			{?>
				<li> <a <?php if($gAction=='GeneralSetting' || $gAction=='ChangeAdminPassword' || $gAction=='export_customer' || $gAction=='export_users' ){?> class="active"<?php }?> href="#"> <i class="fa fa-tachometer fa-fw"></i> <?= $this->lang->line('lang_general_setting');?><span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li> <a href="<?= base_url().'GeneralSetting';?>"><?= $this->lang->line('lang_general_setting');?></a> </li>
						<li> <a href="<?= base_url().'ChangeAdminPassword';?>"><?= $this->lang->line('lang_change_admin_password');?></a> </li>
					</ul>
				</li>
			<?php } 
			if(hmenuIdExitsInPrivilageArray(2)=='Y')
			{?>
				<li> <a <?php if($gcurrPageName=='UserView' && ($gAction=='CustomerView' || $gAction=='PerDayUser' || $gAction=='AddStaffUser' || $gAction=='ViewStaffUsers' || $gAction=='show_subuser_admin')){?> class="active"<?php }?> href="#"> <i class="fa fa-user fa-fw"></i> <?= $this->lang->line('lang_users_and_customers');?><span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li> <a href="<?= base_url().'UserView';?>"><?= $this->lang->line('lang_show_user');?></a> </li>
						<!-- <li> <a href="<?= base_url().'CustomerView';?>"><?= $this->lang->line('lang_show_customers');?></a> </li> -->
						<li> <a href="<?= base_url().'PerDayUser';?>"><?= $this->lang->line('lang_per_day_user');?></a> </li>
						<li> <a href="<?= base_url().'AddStaffUser';?>">Add Staff User</a> </li>
						<li> <a href="<?= base_url().'ViewStaffUsers';?>">Show Staff User</a> </li>
					</ul>				</li>
			<?php } 
			if(hmenuIdExitsInPrivilageArray(3)=='Y')
			{?>
				<li> <a <?php if($gAction=='CategoryView' || $gAction=='show_trade_lead'){?> class="active"<?php }?> href="#"><i class="fa fa-bar-chart-o fa-fw"></i> <?= $this->lang->line('lang_categories');?><span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li> <a href="<?= base_url();?>CategoryView/sell"><?= $this->lang->line('lang_suppliers_products_categories');?></a> </li>
					</ul>
				</li>
			<?php } 
			if(hmenuIdExitsInPrivilageArray(10)=='Y')
			{?>
				<li> <a  <?php if($gAction=='SEO'){?> class="active"<?php }?>  href="<?= base_url().'SEO';?>"><i class="fa fa-sitemap fa-fw"></i> SEO</a> </li>
			<?php } 
			if(hmenuIdExitsInPrivilageArray(11)=='Y')
			{?>
				<li> <a <?php if($gAction=='MailView'){?> class="active"<?php }?> href="<?= base_url();?>MailView"><i class="fa fa-phone fa-fw"></i> <?= $this->lang->line('lang_inquiry_box');?></a> </li>
			<?php } 
			if(hmenuIdExitsInPrivilageArray(12)=='Y')
			{?>   
				<li> <a <?php if($gAction=='AdminInquiry'){?> class="active"<?php }?> href="<?= base_url();?>AdminInquiry"><i class="fa fa-phone fa-fw"></i> <?= $this->lang->line('lang_admin_inquiry_box');?></a> </li>
			<?php } 
			if(hmenuIdExitsInPrivilageArray(13)=='Y')
			{?>
				<li> <a <?php if($gAction=='ShowLocation'){?> class="active"<?php }?>  href="<?= base_url();?>ShowLocation"><i class="fa fa-map-marker fa-fw"></i> <?= $this->lang->line('lang_location_management');?></a> </li>
			<?php } 
			if(hmenuIdExitsInPrivilageArray(14)=='Y')
			{?>
				<li> <a <?php if($gAction=='StaticPage' || $gAction=='StaticPageList' || $gAction=='CmsShowPages'){?> class="active"<?php }?> href="#"><i class="fa fa-file-text-o fa-fw"></i> <?= $this->lang->line('lang_web_page_creater');?><span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li> <a href="<?= base_url().'StaticPage';?>"> <?= $this->lang->line('lang_add_static_page');?></a> </li>
						<li> <a href="<?= base_url().'StaticPageList';?>"> <?= $this->lang->line('lang_static_page_list');?></a> </li>
						<li> <a href="<?= base_url().'CmsShowPages';?>"> <?= $this->lang->line('lang_cms_page_list');?></a> </li>
					</ul>
				</li>
			<?php } 
			if(hmenuIdExitsInPrivilageArray(16)=='Y')
			{?>
				<li> <a <?php if($gAction=='HomeBanner'){?> class="active"<?php }?>  href="<?= base_url().'HomeBanner';?>"><i class="fa fa-table fa-fw"></i> <?= $this->lang->line('lang_banner_management');?></a> </li>
			<?php } 
			if(hmenuIdExitsInPrivilageArray(19)=='Y')
			{?> 
				<li> <a <?php if($gAction=='EMailTemplates'){?> class="active"<?php }?> href="<?= base_url();?>EMailTemplates"><i class="fa fa-envelope-o fa-fw"></i> <?= $this->lang->line('lang_show_mails');?></a> </li>
			<?php } 
			if(hmenuIdExitsInPrivilageArray(20)=='Y')
			{?>
				<li> <a <?php if($gAction=='ShowCurrency'){?> class="active"<?php }?> href="<?= base_url();?>ShowCurrency"><i class="fa fa-envelope-o fa-fw"></i> <?= $this->lang->line('lang_currency_management');?></a> </li>
			<?php } 
			if(hmenuIdExitsInPrivilageArray(22)=='Y')
			{?>
				<li> <a <?php if($gAction=='NewslLst' || $gAction=='NewsAdd' ){?> class="active"<?php }?> href="#"><i class="fa fa-television fa-fw"></i> <?= $this->lang->line('lang_news_manage');?><span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li> <a href="<?= base_url().'NewslLst';?>"> <?= $this->lang->line('lang_shows_news_list');?></a> </li>
						<li> <a href="<?= base_url().'NewsAdd';?>"> <?= $this->lang->line('lang_add_news');?></a> </li>
					</ul>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>
