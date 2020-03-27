<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?= $this->lang->line('lang_admin');?></title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Eagle Technosys">
    
	<?php /*<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">*/?>
    
	<link href="<?= base_url();?>admin/eagle_admin_v2/style.css" rel="stylesheet">
    <link href="<?= base_url();?>admin/eagle_admin_v2/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php /*<link href="<?= base_url();?>admin/eagle_admin_v2/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="<?= base_url();?>admin/eagle_admin_v2/dist/css/timeline.css" rel="stylesheet">
	<link href="<?= base_url();?>admin/eagle_admin_v2/bower_components/morrisjs/morris.css" rel="stylesheet">*/?>

    <link href="<?= base_url();?>admin/eagle_admin_v2/dist/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" media="all">
    
    <?php /*<link href="<?= base_url();?>admin/js/morris/morris-0.4.3.min.css" rel="stylesheet" />    
	<script language="JavaScript" src="<?= base_url();?>admin/js/ajax.js"></script>
    <script language="JavaScript" src="<?= base_url();?>admin/js/nicEdit.js"></script>
    <script type="text/javascript" src="{$smarty.const.URL}/jscolor/jscolor.js"></script>
    <script type="text/javascript" src="js/behaviour.js"></script>*/?>
    
	<?php
    if($gAction=='edit_cms_page')
    {?>
		<script language="JavaScript" src="<?= base_url();?>ckeditor/ckeditor.js"></script>
    <?php }?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<?php /*<script src="<?= base_url();?>admin/js/morris/raphael-2.1.0.min.js"></script>
<script src="<?= base_url();?>admin/js/morris/morris.js"></script>
<script src="<?= base_url();?>assets/js/developer.js"></script>*/?>

<style media="all" type="text/css">@import "<?= base_url();?>admin/css/css/admin.css";</style>
   <!-- OLD ADMIN End-->
 <script>
  	var base_url = "<?php echo base_url(); ?>";
  </script>
</head>

<body onLoad="setFocus();">
<div id="wrapper">
	<!-- header start -->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only"><?= $this->lang->line('lang_toggle_navigation');?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="<?= base_url();?>admin.php" id="logo"><img src="<?= base_url().'images/logofolder/'.$gLOGO;?>"></a> 
		</div> 
		<div class="col-md-3" style="margin-top: 10px;">
            <div>
                <?= $this->lang->line('lang_time_is_now');?> : 
                <script type="text/javascript">
                    var currentTime = new Date()
                    var hours = currentTime.getHours()
                    var minutes = currentTime.getMinutes()
                    if (minutes < 10){
                    minutes = "0" + minutes
                    }
                    document.write(hours + ":" + minutes + " ")
                    if(hours > 11){
                    document.write("PM")
                    } else {
                    document.write("AM")
                    }
                </script> 
            </div>
        </div>
		<ul class="nav navbar-top-links navbar-right">
			<li class="back_btn">
				<a href="#/" class="btn " onclick="window.history.back()"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back</a>
			</li>
			<li>
				<form name="frm_lang_v" method="post" action="#" class="pull-right">
				Admin Lang
                <span style="position: relative;top: 11px; height: 30px;">
				<?php
                $path= dirname(__FILE__).'/';
                include($path.'../lang.php');?>
				</span>
			</form>
			</li>

			<li>
				<form name="frm_lang_data" method="post" action="#" class="pull-right">
				Data Update Lang
                <span style="position: relative;top: 11px; height: 30px;">
				<?php
                $path= dirname(__FILE__).'/';
                include($path.'../lang_update_data.php');?>
				</span>
			</form>
			</li>

			<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
				<ul class="dropdown-menu dropdown-messages">
					<?php
						$admin_inqury = hgetEnquiry();
						foreach ($admin_inqury as $inqVal) 
						{?>
							<li> <a href="<?= base_url();?>AdminInquiry">
								<div> <strong> <?= $inqVal->name;?></strong> <span class="pull-right text-muted"> <em><?= $inqVal->date;?></em> </span> </div>
								<div><?= $inqVal->message;?></div>
								</a> 
							</li>
							<li class="divider"></li>
						<?php }
					?>
					<li> <a class="text-center" href="<?= base_url();?>AdminInquiry"> <strong><?= $this->lang->line('lang_read_all_messages');?></strong> <i class="fa fa-angle-right"></i> </a> </li>
				</ul>
			</li>
			<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
				<ul class="dropdown-menu dropdown-alerts">
					<li> <a href="<?= base_url();?>PerDayUser">
						<div> <i class="fa fa-user  fa-fw"></i> <?= $this->lang->line('lang_users_registration');?> <span class="pull-right text-muted small"><?= hgetCountUsers();?></span> </div>
						</a> </li>
					<li class="divider"></li>

	                <?php
	                if($this->session->userdata('adminUserType')=='A')
                	{ ?>
                		<li> <a href="<?= base_url();?>MailView">
						<div> <i class="fa fa-phone fa-fw"></i> <?= $this->lang->line('lang_today_inquiry');?> <span class="pull-right text-muted small">
							<?= hgetCountEmails();?></span> </div>
						</a> </li>
                	<?php }?>
					<li class="divider"></li>
					<li> <a href="<?= base_url();?>UserView">
						<div> <i class="fa fa-upload fa-fw"></i> <?= $this->lang->line('lang_approval_customer');?> <span class="pull-right text-muted small">
							(<?= hgetCountAppCustomers();?>/<?= hgetCountUnAppCustomers();?>)</span> </div>
						</a> </li>
				</ul>
			</li>
			<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
			<ul class="dropdown-menu dropdown-user">
				<li><a href="<?= base_url().'logout';?>"><i class="fa fa-sign-out fa-fw"></i> <?= $this->lang->line('lang_log_out');?></a> </li>
			</ul>
			</li>
		</ul>
	</nav>