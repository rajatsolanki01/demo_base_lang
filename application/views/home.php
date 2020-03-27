<link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_css/owl_slider/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_css/owl_slider/owl.theme.default.min.css">
<script src="<?php echo base_url(); ?>assets/new_css/owl_slider/owl.carousel.js"></script>
<style>
html{
	scroll-behavior: smooth;
}
</style>
<section id="main">
<div id="owl-demoa" class="owl-carousel owl-theme main_slider">
    <?php $home_banner = show_homepage_banner(); 
    foreach ($home_banner as $key => $homeVal) 
	{?>
		<div class="item <?= ($key==0)? 'active' :'';?>">
        	<a href="<?= str_replace([' ','(',')'],['_','',''],$homeVal->link); ?> "> 
        		<img data-src="<?= base_url();?>images/homebanner/<?= $homeVal->image;?>"  src="<?= base_url();?>images/homebanner/<?= $homeVal->image;?>" class="lazyloaded" 	alt="$homeVal->text"> </a>
    	</div> 
    <?php }?>
    <?php
        /*
	<div class="item">  
    	<?php 
    	if($home_banner->banner2)
		{?>
    		<a href="<?= str_replace([' ','(',')'],['_','',''],$home_banner->banner2_link); ?> "> <img data-src="<?= base_url();?>images/homebanner/<?= $home_banner->banner2;?>" src="<?= base_url();?>images/homebanner/<?= $home_banner->banner2;?>" class="lazyloaded" alt="india" > </a> 
		<?php } ?>
	</div>
	<div class="item">
     	<?php 
    	if($home_banner->banner3)
		{?>
     		<a href="<?= str_replace([' ','(',')'],['_','',''],$home_banner->banner3_link); ?>"> <img data-src="<?= base_url();?>images/homebanner/<?= $home_banner->banner3;?>" src="<?= base_url();?>images/homebanner/<?= $home_banner->banner3;?>" class="lazyloaded" > </a> 
 		<?php } ?> 
 	</div>
    <div class="item"> 
	    <?php 
		if($home_banner->banner4)
		{?> 
	    	<a href="<?= str_replace([' ','(',')'],['_','',''],$home_banner->banner4_link); ?>"> <img data-src="<?= base_url();?>images/homebanner/<?= $home_banner->banner4;?>" src="<?= base_url();?>images/homebanner/<?= $home_banner->banner4;?>" class="lazyloaded" > </a>
		<?php } ?> 
	</div>
    <div class="item">
	    <?php 
	    if($home_banner->banner5)
		{?>
	    	<a href="<?= str_replace([' ','(',')'],['_','',''],$home_banner->banner5_link); ?>"> <img data-src="<?= base_url();?>images/homebanner/<?= $home_banner->banner5;?>" src="<?= base_url();?>images/homebanner/<?= $home_banner->banner5;?>" class="lazyloaded" > </a>
		<?php } ?> 
	</div>*/?>
</div>
 
   <script>
	$(document).ready(function() {
	  var owl = $('#owl-demoa');
	  owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:false,
	  });
	 
	})
  </script>
	  
<div class="man-1 game">
	<div class="container-fluid">
		<div class="row-1">
			<div class="col-md-4">
				<div class="row">
					<div class="box">
						<div class="title long"> <a class="page-scroll" href="#f1"> <i class="fa fa-compass yo-2" aria-hidden="true"></i> <?= $this->lang->line('1155_oth_lang');?> <?= $this->lang->line('1156_oth_lang');?></a> </div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="box">
						<div class="title long"> <a class="page-scroll" href="#f2"> <i class="fa fa-star yo-2" aria-hidden="true"></i> <?= $this->lang->line('1157_oth_lang');?></a> </div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="box">
						<div class="title long"> <a class="page-scroll" href="#f3"> <i class="fa fa-life-ring yo-2" aria-hidden="true"></i> <?= $this->lang->line('1158_oth_lang');?></a> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid hello-one" id="f1">
	
</div>
<div class="container-fluid hello-one" id="f2">
	
</div>
<div class="container-fluid hello-one" id="f2">
	
</div>
<div class="container-fluid hello-one" id="f3">
	
</div>
<div class="container-fluid hello-one" id="f3">
	
</div>

<div class="container-fluid">
</div>


<div class="container-fluid hello-one clearfix">
	<div class="row">
		<div class="col-md-4">
			<div class=""> 
            <?php
					if(!empty($show_news))
                    {
                        foreach( $show_news as $record)
                        {
							
                    ?>
				<div class="two_section ">
					<div class="clearfix">
					<div class="col-md-8">
					<h3 class="title margin_top_fix sm_font_home_cust"><?= $this->lang->line('524_oth_lang');?></h3>
					</div>
					<div class="col-md-4">
						<a href="<?php echo base_url(); ?>show_news_list.html" class="view_flag"><?= $this->lang->line('915_oth_lang');?></a>
					</div>
					</div>
					<div class="scroll_layout_box">
						<div class="clearfix">
							<div class="col-md-3">
								<a  href="//<?php echo $record->url;?>"> <img src="<?php echo base_url(); ?>images/news/<?php echo $record->image_path;?>"/> </a>
							</div>
							
							<div class="col-md-9">
								<div class="home_news_details">
									<h4><?php echo $record->title;?></h4>
									<p><?php echo character_limiter($record->description,100);?></p>
								</div>
							</div>	
						</div>
					</div>
				</div>
				<?php }}?> </div>
		</div>
	</div>
</div>
<div class="container-fluid text-center hello-one clearfix">
	<div class="row-1">
		<h1 class="heading"><?= $this->lang->line('1167_oth_lang');?></h1>
		<h6><?= $this->lang->line('34_oth_lang');?>,<?= $this->lang->line('1168_oth_lang');?></h6>
	</div>
</div>

<div class="container-fluid hello-one clearfix">
	<div class="slider-2 clearfix">
		<div class="tab-section tab-rop clearfix">
			<ul class="nav-tabs tabs-trow clearfix">
				<?php
				foreach ($home_banner2 as $key => $val2) 
				{?>
					<li class="<?= ($key==0)? 'active active-2':'';?>">
						<a href="#articles<?= $key;?>" aria-controls="articles<?= $key;?>" role="tab" data-toggle="tab">
							<?php echo $val2->text;?></a>
					</li>
				<?php }?>
				<?php /*
				<li><a href="#review" aria-controls="review" role="tab" data-toggle="tab"><?php echo $home_banner2[1]->text;?></a></li>
				<li><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab"><?php echo $home_banner2[0]->third_text;?></a></li>
				<li><a href="#photos" aria-controls="photos" role="tab" data-toggle="tab"><?php echo $home_banner2[0]->four_text;?></a></li>
				<li><a href="#photos-2" aria-controls="photos-2" role="tab" data-toggle="tab"><?php echo $home_banner2[0]->five_text;?></a></li> */?>
			</ul>
			<div class="col-fluid tab-content">
				<?php
				foreach ($home_banner2 as $key => $val2) 
				{?>
					<div role="tabpanel" class="tab-pane <?= ($key==0)? 'active':'';?>" id="articles<?= $key;?>">
						<div class="clearfix">
							<div class="col-md-6">
								<div class="img_bottom_tab">
									<img class="img-responsive lazyloaded fix_height_img" data-src="<?php echo base_url();?>images/homebanner/<?php echo $val2->image;?>" src="<?php echo base_url();?>images/homebanner/<?php echo $val2->image;?>">
								</div>
							</div>
							<div class="col-md-6">
								<h3 class="title"><?php echo $val2->short_des;?></h3>
								<p><?php echo $val2->description;?></p>
							</div>
						</div>
					</div>
				<?php }?>
				<?php /*
				<div role="tabpanel" class="tab-pane" id="review">
					<div class="col-md-6">
						<div class="img_bottom_tab">
							<img class="img-responsive lazyloaded fix_height_img" data-src="<?php echo base_url();?>images/homebanner/<?php echo $home_banner2[1]->image;?>" src="<?php echo base_url();?>images/homebanner/<?php echo $home_banner2[1]->image;?>">
						</div>
					</div>
					<div class="col-md-6">
						<h3 class="title"><?php echo $home_banner2[1]->short_des;?> </h3>
						<p><?php echo $home_banner2[1]->description;?> </p>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="comments">
					<div class="col-md-6">
						<div class="img_bottom_tab">
							<img class="img-responsive lazyloaded fix_height_img" data-src="<?php echo base_url();?>images/homebanner/<?php echo $home_banner2[0]->third_banner;?>" src="<?php echo base_url();?>images/homebanner/<?php echo $home_banner2[0]->third_banner;?>">
						</div>
					</div>
					<div class="col-md-6">
						<h3 class="title"><?php echo $home_banner2[0]->third_sort;?></h3>
						<p><?php echo $home_banner2[0]->third_detail;?></p>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="photos">
					<div class="col-md-6">
						<div class="img_bottom_tab">
							<img class="img-responsive lazyloaded fix_height_img" data-src="<?php echo base_url();?>images/homebanner/<?php echo $home_banner2[0]->four_banner;?>" src="<?php echo base_url();?>images/homebanner/<?php echo $home_banner2[0]->four_banner;?>">
						</div>
					</div>	
					<div class="col-md-6">
						<h3 class="title"><?php echo $home_banner2[0]->four_sort;?></h3>
						<p><?php echo $home_banner2[0]->four_detail;?></p>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="photos-2">
					<div class="col-md-6">
						<div class="img_bottom_tab">
							<img class="img-responsive lazyloaded fix_height_img" data-src="<?php echo base_url();?>images/homebanner/<?php echo $home_banner2[0]->five_banner;?>" src="<?php echo base_url();?>images/homebanner/<?php echo $home_banner2[0]->five_banner;?>">
						</div>
					</div>
					<div class="col-md-6">
						<h3 class="title"><?php echo $home_banner2[0]->five_sort;?></h3>
						<p><?php echo $home_banner2[0]->five_detail;?></p>
					</div>
				</div>*/?>
			</div>
		</div>
	</div>
</div>
</div>
<div class="container-fluid text-center hello-one clearfix">
	<div class="row-1">
		<h1 class="heading"><?php echo  $show_feature[0]->name; ?></h1>
		<h6><?php echo  $show_feature[0]->title; ?></h6>
	</div>
</div>
<div class="container-fluid hello-one clearfix">
	<div class="slider-2 pad-off clearfix">
		<div class="row">
			<div class="col-md-7">
				<div class="control">
					
					<p><?php echo  $show_feature[0]->description; ?></p>
				</div>
			</div>
			<div class="col-md-5"> <a href="#/"><img class="img-responsive lazyloaded full-img" data-src="<?php echo base_url(); ?>images/trade_ser_logo/<?php echo  $show_feature[0]->image_path; ?>" src="<?php echo base_url(); ?>images/trade_ser_logo/<?php echo  $show_feature[0]->image_path; ?>"></a> </div>
		</div>
	</div>
</div>


</div>
</div>
</div>
</div>
<?php 
/*
<script>
var pro_count="{$count}";
var buy_count="{$buy_count}";
var suppliers_count="{$functions->countVerifiedSuppliersForcetegory($topqry_catlist[0].cat_id)}";
var classified_count="{$classified_count}";
var limit_count="{$limit_count}";
var spotlight_count="{$spotlight_count}";
</script>

<script>
   if(pro_count>=5)
	{
	$(document).ready(function() {
	  var owl = $('#owl-demo');
	  owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:false,
	  });
	})
	   }
	   else
	   {
	$(document).ready(function() {
	  var owl = $('#owl-demo');
	  owl.owlCarousel({
		items: 5,
		loop: false,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:false,
	  });
	})
	   }
	   	  
</script>	   
<script>
	 
        if(buy_count>=5)
	   {
	   $(document).ready(function() {
	  var owl = $('#owl-demob');
	  owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:false,
	  });
	 })
	   }
	   else
	   {
		   
	   $(document).ready(function() {
	  var owl = $('#owl-demob');
	  owl.owlCarousel({
		items: 5,
		loop: false,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:false,
	  });
	 })
	   
	
</script> 
<script>
        if(classified_count>=5)
	   {
	$(document).ready(function() {
	  var owl = $('#new_4');
	  owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:false,
	  });
	 
	})
	   }
	   else
	   {
	$(document).ready(function() {
	  var owl = $('#new_4');
	  owl.owlCarousel({
		items: 5,
		loop: false,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:false,
	  });
	})
	   }
	   
	   
  
</script>
<script>
        if(suppliers_count>=5)
	   {
	$(document).ready(function() {
	  var owl = $('#demo');
	  owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:false,
	  });
	 
	})
	   }
	   else
	   {
	$(document).ready(function() {
	  var owl = $('#demo');
	  owl.owlCarousel({
		items: 5,
		loop: false,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:false,
	  });
	})
	   }
	   
	   
  
</script>
<script>
        if(limit_count>=5)
	   {
		$(document).ready(function() {
	  var owl = $('#opt');
	  owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:false,
	  });
	 
	})

	   }
	   else
	   {	$(document).ready(function() {
	  var owl = $('#opt');
	  owl.owlCarousel({
		items: 5,
		loop: false,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:false,
	  });
	 
	})
}
</script>
<script>
        if(spotlight_count>=3)
	   {	$(document).ready(function() {
	  var owl = $('#spot_store');
	  owl.owlCarousel({
		items: 3,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:false,
	  });
	 
	})	
}
	   else
	   {	$(document).ready(function() {
	  var owl = $('#spot_store');
	  owl.owlCarousel({
		items: 3,
		loop: false,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		rtl:false,
	  });
	 
	})	

}
	   
	   
  
</script>
<script>
if(pro_count>=5)
{
	$(document).ready(function() {
		var owl = $('#owl-demo');
		owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		});
	})
}
else
{
	$(document).ready(function() {
		var owl = $('#owl-demo');
		owl.owlCarousel({
		items: 5,
		loop: false,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		});
	})
}   	  
</script>	   
<script>
if(buy_count>=5)
{
	$(document).ready(function() {
		var owl = $('#owl-demob');
		owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		});
	})
}
else
{
	$(document).ready(function() {
		var owl = $('#owl-demob');
		owl.owlCarousel({
		items: 5,
		loop: false,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		});
	})
}
</script>
<script>
if(classified_count>=5)
{
	$(document).ready(function() {
		var owl = $('#new_4');
		owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		});
	})
}
else
{
	$(document).ready(function() {
		var owl = $('#new_4');
		owl.owlCarousel({
		items: 5,
		loop: false,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		});
	})
}
</script>
<script>
if(suppliers_count>=5)
{
	$(document).ready(function() {
		var owl = $('#demo');
		owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		});
	})
}
else
{
	$(document).ready(function() {
		var owl = $('#demo');
		owl.owlCarousel({
		items: 5,
		loop: false,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		});
	})
}
</script>
<script>
if(limit_count>=5)
{
	$(document).ready(function() {
		var owl = $('#opt');
		owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		});
	})
}
else
{	
	$(document).ready(function() {
		var owl = $('#opt');
		owl.owlCarousel({
		items: 5,
		loop: false,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		});
	})
}
</script>
<script>
if(spotlight_count>=3)
{	
	$(document).ready(function() {
		var owl = $('#spot_store');
		owl.owlCarousel({
		items: 3,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		});
	})	
}
else
{	$(document).ready(function() {
		var owl = $('#spot_store');
		owl.owlCarousel({
		items: 3,
		loop: false,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		});
	})	
}
</script>
<script>
$('.carousel[data-type="multi"] .item').each(function(){
	var next = $(this).next();
	if (!next.length) {
		next = $(this).siblings(':first');
	}
	next.children(':first-child').clone().appendTo($(this));

	for (var i=0;i<2;i++) {
		next=next.next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));
	}
});
</script> 
*/?>