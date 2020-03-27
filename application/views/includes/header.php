<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml" ng-app="DialToMe">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="robots" content="noindex">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?php base_url(); ?>/logofolder/eahle1.png">

    <title><?= $gMetaTitle;?></title>

    <meta name="description" content="<?= $gMetaDesc;?>" />
    <meta name="keywords" content="<?= $gMetaKey;?>" />
    <meta name="google-site-verification" content="<?= $gGVerification;?>" />
    <script>
        var base_url = "<?php echo base_url(); ?>";
    </script>
    <?php /*<script>
        var base_url = "<?php echo base_url(); ?>";
        var lata = parseFloat('{$userdata[0].longitude}');
        var lang = parseFloat('{$userdata[0].latitude}');
    </script>

    <script>
        var lata = parseFloat('{$clientDetail[0].longitude}');
        var lang = parseFloat('{$clientDetail[0].latitude}');
    </script>*/?>

<?php /*
    <script type="text/javascript">
        var site_url = "<?php echo base_url(); ?>";
    </script>
    <script type="text/javascript">
        var latitude = "<?= $gLatitude;?>";
    </script>
    <script type="text/javascript">
        var langitude = "<?= $gLangitude;?>";
    </script>
    <script type="text/javascript">
        var company_name = "<?= $gCompanyName;?>";
    </script>
    <script type="text/javascript">
        var company_address = "<?= $gCompanyAddress;?>";
    </script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/shop-homepage.css">*/?>

    <?php /*<link href="<?php echo base_url(); ?>assets/eagle_theme/typehead/typeahead.js-bootstrap.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_css/css/awesomplete.css" />*/?>


    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/new_css/css/bootstrap.css" media="all" />    
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/css/style1.css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_css/css/style1.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_css/css/store_style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/new_css/css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/new_css/css/tradestyle.css" media="all" />

    <?php /* <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_css/css/bootstrap-tagsinput.css" />*/?>
   
    

    <!--=========================================default css==================================================-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/new_css/css/style2.css" media="all" />
    <script src="<?php echo base_url(); ?>assets/new_css/js/developer.js"></script> 

    <?php /*<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/new_css/css/lumos.css" media="all" />

    <script src="<?php echo base_url(); ?>assets/eagle_theme/typehead/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/eagle_theme/typehead/typeahead.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_css/js/awesomplete.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
    <script language="JavaScript" src="<?php echo base_url(); ?>assets/js/app.js"></script>*/?>

    <!--==========================================default js==================================================-->

    <?php /*<script src="<?php echo base_url(); ?>assets/themes/js/jquery-1.10.2.min.js"></script>
    <script language="JavaScript">
        base_url = "<?php echo base_url(); ?>";
    </script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58b579c16d362396"></script>

    <script src="<?php echo base_url(); ?>assets/new_css/js/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_css/js/bootstrap-tagsinput-angular.min.js"></script>*/?>
    <!--==================================== this is important for the ajax =========================-->

    <!--====================================================================-->

    <?php /*<script src="<?php echo base_url(); ?>assets/js/lumos.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114308753-1"></script>
    <script src="<?php echo base_url(); ?>assets/js/googleta.gm.js"></script>*/?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <?php /*<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126665694-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-126665694-1');
    </script>*/?>

    <?php /*<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/css/mtree.css" media="all" />
    <script src='//cdnjs.cloudflare.com/ajax/libs/velocity/0.2.1/jquery.velocity.min.js'></script>
    <script src="<?php echo base_url(); ?>assets/themes/js/mtree.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script> 

    <script>
        $(function() {
            $(".demo1").bootstrapNews({
                newsPerPage: 8,
                autoplay: true,
                pauseOnHover: true,
                direction: 'up',
                newsTickerInterval: 3000,
                onToDo: function() {
                    //console.log(this);
                }
            });

        });

        $(function() {
            $(".demo2").bootstrapNews({
                newsPerPage: 8,
                autoplay: true,
                pauseOnHover: true,
                direction: 'up',
                newsTickerInterval: 4000,
                onToDo: function() {
                    //console.log(this);
                }
            });

        });
    </script>
*/?>

    <?php /* <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/2.0.0/lazysizes.min.js"></script> */?>
    <!-- <script src="<?php echo base_url(); ?>assets/new_css/js/bootstrap.js"></script> -->
   
   <?php /* <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_css/js/scrollreveal.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_css/js/creative.min.js"></script> */?>
    <script language="JavaScript" src="<?php echo base_url(); ?>assets/ckeditor_2017/ckeditor.js"></script>
    
<?php /*
    <script>
        $(document).ready(function() {
            $('#myCarousel').carousel({
                interval: 4000
            });

            var clickEvent = false;
            $('#myCarousel').on('click', '.nav a', function() {
                clickEvent = true;
                $('.nav li').removeClass('active');
                $(this).parent().addClass('active');
            }).on('slid.bs.carousel', function(e) {
                if (!clickEvent) {
                    var count = $('.nav').children().length - 1;
                    var current = $('.nav li.active');
                    current.removeClass('active').next().addClass('active');
                    var id = parseInt(current.data('slide-to'));
                    if (count == id) {
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
                rtl: false,
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
                rtl: false,
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
                rtl: false,
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
                rtl: false,
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
                rtl: false,
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
*/?>

<?php /*
    <script type="text/javascript">
        $(function() {
            $('a[href="#"]').on('click', function(e) {
                e.preventDefault();
            });

            $('#menu > li').on('mouseover', function(e) {
                $(this).find("ul:first").show();
                $(this).find('> a').addClass('active');
            }).on('mouseout', function(e) {
                $(this).find("ul:first").hide();
                $(this).find('> a').removeClass('active');
            });

            $('#menu li li').on('mouseover', function(e) {
                if ($(this).has('ul').length) {
                    $(this).parent().addClass('expanded');
                }
                $('ul:first', this).parent().find('> a').addClass('active');
                $('ul:first', this).show();
            }).on('mouseout', function(e) {
                $(this).parent().removeClass('expanded');
                $('ul:first', this).parent().find('> a').removeClass('active');
                $('ul:first', this).hide();
            });
        });
    </script>
*/?>
    <script>
        $(document).ready(function() {
            $('#myCarousel').carousel({
                interval: 4000
            });

            var clickEvent = false;
            $('#myCarousel').on('click', '.nav a', function() {
                clickEvent = true;
                $('.nav li').removeClass('active');
                $(this).parent().addClass('active');
            }).on('slid.bs.carousel', function(e) {
                if (!clickEvent) {
                    var count = $('.nav').children().length - 1;
                    var current = $('.nav li.active');
                    current.removeClass('active').next().addClass('active');
                    var id = parseInt(current.data('slide-to'));
                    if (count == id) {
                        $('.nav li').first().addClass('active');
                    }
                }
                clickEvent = false;
            });
        });
    </script>
<?php /*
    <script>
        $(function() {
            toggleChildren();
        })
    </script>
    <script>
        function changeGoogleStyles() {
            if ($('.goog-te-menu-frame').contents().find('.goog-te-menu2').length) {
                $('.goog-te-menu-frame').contents().find('.goog-te-menu2').css({
                    'max-width': '100%',
                    'overflow': 'scroll',
                    'box-sizing': 'border-box',
                    'height': '150px;'
                });
            } else {
                setTimeout(changeGoogleStyles, 50);
            }
        }
        changeGoogleStyles();
    </script>
*/?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <?php /* <script src="<?php echo base_url(); ?>assets/themes/js/jquery.menu-aim.js"></script>
    <script src="<?php echo base_url(); ?>assets/themes/js/main.js"></script> */ ?>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body ng-controller="ZipCodeCtrl">
    <header>
        <div class="header">
            <div class="container-fluid clearfix">
                <div class="row-1 hello clearfix">
                    <div class="col-md-2">
                        <div class="row">
                            <div class="logo">
                                <a href="<?php echo base_url();?>">
                                    <img class="img-responsive" src="<?= base_url().'images/logofolder/'.$gLOGO;?>">
    							</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <nav class="navbar fix_set_nav navbar-default">
                                <div class="container-fluid-fluid">
                                    <div class="row">
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only"><?= $this->lang->line('893_oth_lang');?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                        </div>
                                        <div id="navbar" class="navbar-collapse collapse">
                                            <div class="row-1">
                                                <ul class="nav navbar-nav navbar-right n-right">
                                                    <li><a href="<?php echo base_url();?>all_categories.html"><?= $this->lang->line('522_oth_lang');?>&ensp;| <span class="sr-only">(current)</span></a></li>
                                                    <li><a href="<?php echo base_url();?>Customer.html"><?= $this->lang->line('1756_oth_lang');?>&ensp;</a> </li>
                                                    <li><div id="google_translate_element"></div></li>
                                                    <li><?php
                                                        $path= dirname(__FILE__).'/';
                                                        include($path.'../lang.php');?>
                                                    </li>
                                                    <li><button onclick="history.go(-1);" title="Back" class="btn_tag"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> </button></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/.nav-collapse -->
                                    </div>
                                </div>
                                <!--/.container-fluid-fluid -->
                            </nav>
                        </div>
                    </div> 
                </div>
                <div class="clearfix">
                    <div class="col-md-2 clearfix"></div>
                    <div class="col-md-6"></div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-5 col-xs-12 right_cus">
                                <div class="btn-toper">
                                    <div class="log-i">
                                        <i class="sc-hd-ms-icon sc-hd-i-unsignavatar"></i>
                                    </div>
                                    <?php  
                                    if ($this->session->userdata('user_id')=='' && $this->session->userdata('fre_exp_id')==''){ ?>
                                        <span><a class="color-t" href="<?php echo base_url();?>login.html"><?= $this->lang->line('3_oth_lang');?></a>&ensp;|&ensp;<a class="color-t" href="<?php echo base_url();?>registration-1.html"><?= $this->lang->line('1286_oth_lang');?></a></span>
                                        <p> <span class="text"><a href="#/" class="color-b"> <?php echo $gCompanyName; ?></a></span></p>
                                    <?php } 
                                    else{ ?>
                                        <span><a class="color-t" href="<?php echo base_url();?>show_myaccount.html"><?= $this->lang->line('5_oth_lang');?></a><br>
				                         <a class="color-t"  href="<?php echo base_url();?>logout.html"><?= $this->lang->line('609_oth_lang');?></a></span>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        if($gcurrPageName!='show_category')
        {?>
            <div class="bor-bottom"></div>
            <div class="inner-margin"></div>
        <?php }?>
    </header>
    <script>
        var value_input = "";
        setInterval(function() {
            if ($('#the-basics0').css('display') != 'none') {
                value_input = $("#ser_val_product").val();
            }
            
            if ($('#the-basics2').css('display') != 'none') {
                value_input = $("#ser_val_seller").val();
            }
            if ($('#the-basics1').css('display') != 'none') {
                value_input = $("#ser_val_buyer").val();
            }
            $('#input_box').val(value_input);

            if ($('#the-basics4').css('display') != 'none') {
                value_input = $("#ser_val_classfied").val();
                $('#input_box_classified').val(value_input);
            }
        }, 500);
    </script>

    <script>
        $('#search_submit_button').click(function() {
            if ($('#the-basics4').css('display') != 'none')
                $("#search_form_classified").submit();
            else
                $("#search_form").submit();
        });

        document.getElementById('ser_val_product').onkeydown = function(e) {
            if (e.keyCode == 13) {
                document.getElementById('search_form').submit();
            }
        };

        document.getElementById('ser_val_seller').onkeydown = function(e) {
            if (e.keyCode == 13) {
                document.getElementById('search_form').submit();
            }
        };

        document.getElementById('ser_val_classfied').onkeydown = function(e) {
            if (e.keyCode == 13) {
                document.getElementById('search_form').submit();
            }
        };
    </script>
