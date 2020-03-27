<!DOCTYPE html>
<html>
<head>
	<title><?= $this->lang->line('lang_admin');?></title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Eagle Technosys">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link href="<?= base_url();?>admin/eagle_admin_v2/style.css" rel="stylesheet">
    <link href="<?= base_url();?>admin/eagle_admin_v2/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url();?>admin/eagle_admin_v2/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="<?= base_url();?>admin/eagle_admin_v2/dist/css/timeline.css" rel="stylesheet">
    <link href="<?= base_url();?>admin/eagle_admin_v2/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?= base_url();?>admin/eagle_admin_v2/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" media="all">
    
    <link href="<?= base_url();?>admin/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<style media="all" type="text/css">@import "<?= base_url();?>/admin/css/css/admin-login.css";</style>
</head>
<body onLoad="setFocus();">
<div id="wrapper">
	<script type="text/javascript">
        // # of images
        var imgCount = 13;
        // image directory
        var dir = '<?= base_url();?>/admin/eagle_admin_v2/login_background/';
        // random the images
        var randomCount = Math.round(Math.random() * (imgCount - 1)) + 1;
        // array of images & file name
        var images = new Array
            images[1] = "1.jpg",
            images[2] = "2.jpg",
            images[3] = "3.jpg",
            images[4] = "4.jpg";
			images[5] = "5.jpg",
            images[6] = "6.jpg",
            images[7] = "7.jpg",
            images[8] = "8.jpg";
			images[9] = "9.jpg",
            images[10] = "10.jpg",
            images[11] = "11.jpg",
            images[12] = "12.jpg";
            images[13] = "13.jpg";
        document.body.style.backgroundImage = "url(" + dir + images[randomCount] + ")";
	</script> 

<?php
if($this->session->flashdata('adminLogin'))
{?>
<div class="error">
	<div class="error_inner"> <strong><?= $this->lang->line('lang_access_denied');?></strong> | <span><?= $this->session->flashdata('adminLogin');?></span> </div>
</div>
<?php }?>

<div class="container">
	<div class="col-md-3"></div>
	<section class="login_box">
		<div class="col-md-6 col-xs-12">
			<div class="account-wall1_olc login_box1">
				<div id="my-tab-content" class="tab-content">
					<div class="tab-pane active" id="login"> <img class="img-responsive login_logo" src="<?= base_url().'images/logofolder/'.$gLOGO;?>" alt="">
						<form class="form-signin" name="login_form" action="" method="post">
							<input type="text" name="loginname" class="form-control" value="admin" placeholder="Username" required="" autofocus="">
							<input type="password" name="password" class="form-control" value="password" placeholder="Password" required="">
							<br />							
							<input type="submit" name="submit" class="btn btn-lg btn-info btn-block" value="Sign In">	
						</form>
					</div>
					<div class="tab-pane" id="register">
						<form class="form-signin" action="" method="">
							<input type="email" class="form-control" placeholder="Emaill Address ..." required="">
							<br />
							<input type="submit" class="btn btn-lg btn-default btn-block" value="Submit">
						</form>
						<div id="tabs" data-tabs="tabs">
							<p class="text-center"><a href="#login" data-toggle="tab"><?= $this->lang->line('lang_login');?></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="col-md-3"></div>
</div>

</div>
</body>
</html>