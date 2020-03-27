<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml"  ng-app="DialToMe">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="robots" content="noindex">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php base_url(); ?>/logofolder/eahle1.png">
<title>Home</title>
<meta name="description" content="{$glo_meta_desc}" />
<meta name="keywords" content="{$glo_meta_key}" />
<meta name="google-site-verification" content="{$generalsetting[0].google_verification}" />

<?php /*
<script>
	var base_url = "<?php echo base_url(); ?>";
	var lata=parseFloat('{$userdata[0].longitude}');
	var lang=parseFloat('{$userdata[0].latitude}');
</script>
<script>
	var lata=parseFloat('{$clientDetail[0].longitude}');
	var lang=parseFloat('{$clientDetail[0].latitude}');
</script>
<script type="text/javascript">var site_url="<?php echo base_url(); ?>";</script>
<script type="text/javascript">var latitude="{$latitude}";</script>
<script type="text/javascript">var langitude="{$langitude}";</script>
<script type="text/javascript">var company_name="{$company_name}";</script>
<script type="text/javascript">var company_address="{$company_address}";</script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/shop-homepage.css">
<link href="<?php echo base_url(); ?>assets/eagle_theme/typehead/typeahead.js-bootstrap.css" rel="stylesheet" type="text/css" />*/?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_css/css/awesomplete.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/new_css/css/bootstrap.css" media="all" />

<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="all" />
<?php /*
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/css/reset.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/css/style1.css" media="all" />*/?>


<link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_css/css/style1.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/new_css/css/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/new_css/css/tradestyle.css" media="all" />
<?php /*
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_css/css/bootstrap-tagsinput.css" />
<link href="<?php echo base_url(); ?>assets/css/assets/css/responsive.css" rel="stylesheet" type="text/css" />*/?>


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/new_css/css/style2.css" media="all" />
<script>
        var base_url = "<?php echo base_url(); ?>";
    </script>
<script src="<?php echo base_url(); ?>assets/new_css/js/developer.js"></script> 
<?php /*
<link href="<?php echo base_url(); ?>assets/css/assets/css/all.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/new_css/css/lumos.css" media="all" />

<script src="<?php echo base_url(); ?>assets/new_css/js/awesomplete.js"></script>

<script src="<?php echo base_url(); ?>assets/eagle_theme/typehead/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/eagle_theme/typehead/typeahead.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/developer.js"></script>
<script src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
<script language="JavaScript" src="<?php echo base_url(); ?>assets/js/app.js"></script>

<script src="<?php echo base_url(); ?>assets/themes/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ajax.js"></script>*/?>
<?php /*<script language="JavaScript">site_url="<?php echo base_url()?>";</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58b579c16d362396"></script>

<script src="<?php echo base_url(); ?>assets/new_css/js/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>assets/new_css/js/bootstrap-tagsinput-angular.min.js"></script>*/?>

<script type="text/javascript">
function new_captcha()
{
	var c_currentTime = new Date();
	var c_miliseconds = c_currentTime.getTime();
	document.getElementById('captcha').src = site_url+'/new_captch/'+'class.captcha.php?x='+ c_miliseconds;
}
</script>

<?php /*
<script src="<?php echo base_url(); ?>assets/js/lumos.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114308753-1"></script>
<script src="<?php echo base_url(); ?>assets/js/googleta.gm.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126665694-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126665694-1');
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/css/mtree.css" media="all" />
<script src='//cdnjs.cloudflare.com/ajax/libs/velocity/0.2.1/jquery.velocity.min.js'></script>
<script src="<?php echo base_url(); ?>assets/themes/js/mtree.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>

<script>
    $(function () {
        $(".demo1").bootstrapNews({
            newsPerPage: 8,
            autoplay: true,
    		pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 3000,
            onToDo: function () {
                //console.log(this);
            }
        });
    });
	$(function () {
        $(".demo2").bootstrapNews({
            newsPerPage: 8,
            autoplay: true,
    		pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 4000,
            onToDo: function () {
                //console.log(this);
            }
        });
    });
</script> */?>

<script src="<?php echo base_url(); ?>assets/new_css/js/bootstrap.js"></script>
<?php /*<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/2.0.0/lazysizes.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>assets/new_css/js/scrollreveal.min.js"></script>
<script src="<?php echo base_url(); ?>assets/new_css/js/creative.min.js"></script>
<script language="JavaScript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>*/?>
<?php /*
<script>
$(document).ready( function() {
    $('#myCarousel').carousel({
    	interval:   4000
	});

	var clickEvent = false;
	$('#myCarousel').on('click', '.nav a', function() {
			clickEvent = true;
			$('.nav li').removeClass('active');
			$(this).parent().addClass('active');
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.nav').children().length -1;
			var current = $('.nav li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.nav li').first().addClass('active');
			}
		}
		clickEvent = false;
	});
});
</script>

<script>
	$(document).ready(function() {
	  var owl = $('#ab');
	  owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:true,
	  });
	})
	$(document).ready(function() {
	  var owl = $('#new_1');
	  owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:true,
	  });
	})
	$(document).ready(function() {
	  var owl = $('#new_2');
	  owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:true,
	  });
	})
	$(document).ready(function() {
	  var owl = $('#new_3');
	  owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:true,
	  });
	})
	$(document).ready(function() {
	  var owl = $('#new_5');
	  owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:true,
	  });
	})
</script>
<script>
	$(document).ready(function() {
	  var owl = $('#ab');
	  owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
	  });
	})
	$(document).ready(function() {
	  var owl = $('#new_1');
	  owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
	  });
	})
	$(document).ready(function() {
	  var owl = $('#new_2');
	  owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
	  });
	})
	$(document).ready(function() {
	  var owl = $('#new_3');
	  owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
	  });
	})
	$(document).ready(function() {
	  var owl = $('#new_5');
	  owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
	  });
	})
</script>
<script type="text/javascript">
$(function(){
  $('a[href="#"]').on('click', function(e){
    e.preventDefault();
  });

  $('#menu > li').on('mouseover', function(e){
    $(this).find("ul:first").show();
    $(this).find('> a').addClass('active');
  }).on('mouseout', function(e){
    $(this).find("ul:first").hide();
    $(this).find('> a').removeClass('active');
  });

  $('#menu li li').on('mouseover',function(e){
    if($(this).has('ul').length) {
      $(this).parent().addClass('expanded');
    }
    $('ul:first',this).parent().find('> a').addClass('active');
    $('ul:first',this).show();
  }).on('mouseout',function(e){
    $(this).parent().removeClass('expanded');
    $('ul:first',this).parent().find('> a').removeClass('active');
    $('ul:first', this).hide();
  });
});
</script>
<script>
$(document).ready( function() {
    $('#myCarousel').carousel({
    	interval:   4000
	});

	var clickEvent = false;
	$('#myCarousel').on('click', '.nav a', function() {
			clickEvent = true;
			$('.nav li').removeClass('active');
			$(this).parent().addClass('active');
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.nav').children().length -1;
			var current = $('.nav li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.nav li').first().addClass('active');
			}
		}
		clickEvent = false;
	});
});
</script>
<script>
	$(function() {
		toggleChildren();
	})
</script>
<script>
function changeGoogleStyles() 
{
	if($('.goog-te-menu-frame').contents().find('.goog-te-menu2').length) {
		$('.goog-te-menu-frame').contents().find('.goog-te-menu2').css({
		'max-width':'100%',
		'overflow':'scroll',
		'box-sizing':'border-box',
		'height':'150px;'
		});
	} 
	else {
		setTimeout(changeGoogleStyles, 50);
	}
}
changeGoogleStyles();
</script> */?>

<?php /*<link href="<?php echo base_url(); ?>assets/css/typeahead.js-bootstrap.css" rel="stylesheet" type="text/css" />
<script async defer
    src="https://maps.googleapis.com/maps/api/js?callback=initMap&key={$google_map_key}">
    </script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?callback=initMap">
    </script>*/ ?>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<?php /*<script src="<?php echo base_url(); ?>assets/themes/js/jquery.menu-aim.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/js/main.js"></script> */?>

</head>
<body ng-controller="ZipCodeCtrl">

<!--=====================loader modul=========================-->
    <div class="modal fade bs-example-modal-sm" id="myPleaseWait" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-sm" style="margin-top:22%; margin-left:42%;">
           <img style="max-height:100px;" src="<?php echo base_url();?>images/pageloader.gif" />
        </div>
	</div>

<header>
<?php 
	$siteDetaile =  siteDetail();
	$sub_domain_data1 = get_seller_detail($this->session->userdata['user_id']);
	$sub_domain_data = get_subdomain($this->session->userdata['cust_id']);
?>
	<div class="top_myac_head">
		<div class="container-fulid">
			<div class="clearfix">
				<div class="col-md-6">
				 	<div class="top_acount_header">
						<ul>
							<li><a href="<?php echo base_url()?>all_categories.html">All Categories</a></li>
							<li><a href="<?php echo base_url()?>Customer.html">Suppliers</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
				<div class="top_acount_header">
					<ul class="nav navbar-nav navbar-right fix_nav_right_part">
	                
						<li><a href="<?php echo base_url()?>email_account.html">
								<i class="fa fa-envelope-o" aria-hidden="true"></i> Inbox 
								<samp class="badge"><?php 
									echo show_unread_mails($this->session->userdata('user_id'),'');?>
								</samp>
						</a></li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">			
								<i class="fa fa-user" aria-hidden="true"></i> Profile					
							<b class="caret"></b></a>
							<ul class="dropdown-menu set_right_margin">
								<li>
									<div class="navbar-content profile_data_set_li">
										<ul>
											<li><a href="<?php echo base_url()?>change_password.html"><span><i class="fa fa-lock fa-lg"></i></span> Change Password</a> </li>
											<li><a href="<?php echo base_url()?>logout.html"><span><i class="fa fa-sign-out"></i></span> Logout</a></li>
										</ul>
									</div>								
								</li>
							</ul>
						</li>
					</ul>
				</div>	
				</div>
			</div>
		</div>
	</div>
	 
	<div class="micro_top_header">
		<div class="container-fulid">
			<div class="clearfix">
				<div class="col-md-2">
					<div class="logo my_accont_logo">
						<a href="<?php echo base_url()?>">
							<img class="img-responsive" src="<?php echo base_url().'images/logofolder/'.$siteDetaile->logo ?>">
						</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="site_myaccount_info hidden-xs">
						<h4 class="text-capitalize">
							<?php echo user_detail($this->session->userdata['user_id'],'name');?></h4>
						<p class="text-uppercase">
							<?php $userCityId = user_detail($this->session->userdata['user_id'],'city');
							 
								echo $this->session->userdata['u_name'].' '.hGetCountryFieldById('city',$userCityId).', ('.hGetCountryFieldById('state',$userCityId).')';
							?>
						</p>
					</div><!---->
				</div>
				<div class="col-md-4">
					<ul class="myaccount_social_set">
						<?php 
						if($gFacebookOnOff=='Y'){?>
							<li><a href="<?= $gFacebookLink;?>"  target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	                    <?php }
	                    if($gTwitterOnOff=='Y'){?>
							<li><a href="<?= $gTwitterLink;?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	                    <?php }
	                    if($gGpluseOnOff=='Y'){?>
							<li><a href="<?= $gGpluseLink;?>" target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
	                    <?php }?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="navbar navbar-default nav_myaccount" role="navigation">
		<div class="container-fulid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand web_none" href="#"> </a> </div>
			<div class="collapse navbar-collapse padd_myacc">
				<ul class="nav navbar-nav nav_header_li mid_ul_set">
					<li><a href="<?php echo base_url()?>show_myaccount.html#dash"><span><i class="fa fa-dashboard fa-lg"></i></span> Dashboard </a> </li>
					<?php /* 				
					<li> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-building-o" aria-hidden="true"></i> Company Profile <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url()?>view_company_profile.html"><i class="fa fa-building-o" aria-hidden="true"></i> Company Profile</a> </li>
						</ul>
					</li>
					*/?>
				</ul>
			</div>
		</div>
	</div>
</header>
 
<script>
	$('#search_submit_button').click(function (){
			if ($('#the-basics4').css('display')!='none')
			 $("#search_form_classified").submit();
			 else
			  $("#search_form").submit();
			});
			
			 document.getElementById('ser_val_product').onkeydown = function(e){
	   if(e.keyCode == 13){
	    document.getElementById('search_form').submit();
	   }
	};

	 document.getElementById('ser_val_seller').onkeydown = function(e){
	   if(e.keyCode == 13){
	    document.getElementById('search_form').submit();
	   }
	};

	 document.getElementById('ser_val_classfied').onkeydown = function(e){
	   if(e.keyCode == 13){
	    document.getElementById('search_form').submit();
	   }
	};
	    
		 </script>
		 
		 <script type="text/javascript">
	function googleTranslateElementInit() {
	  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
	}
</script>