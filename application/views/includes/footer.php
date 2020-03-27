<div id="footer-section" class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-6 footer-col">
				<h5>Information</h5>
				<ul>
					<li> <a href="<?php echo base_url(); ?>">Home</a> </li>
					<li> <a href="<?php echo base_url(); ?>aboutus.html">About Us</a> </li>
					<li> <a href="<?php echo base_url(); ?>termscondition.html">termscondition</a> </li>
					<li> <a href="<?php echo base_url(); ?>privacy_policy.html">Privacy Policy</a> </li>
					<li> <a href="<?php echo base_url(); ?>show_news_list.html">News</a> </li>
					<li> <a href="<?php echo base_url(); ?>contactus.html">Contact Us</a> </li>
					<!-- <li> <a href="<?php echo base_url(); ?>all_trade_show.html">Trade Shows</a> </li> -->
					<!-- <?php 
							 $page_list = show_page_list('1');
							 foreach ( $page_list as $record )
							{
							 ?> 
					<li> <a href="<?php echo base_url(); ?>show_page/<?php echo $record->title;?>-<?= $record->id;?>"><?php echo $record->title;?></a> </li>
					<?php }?> -->
				</ul>
			</div>		
		</div>
	</div>
</div>
<div id="bottom-line">
	<div class="container-fluid">
                           <?php 
							 foreach ( $gGeneralSetting as $record )
							{	
							 ?>
		<div class="row">
			<div class="col-md-6">
				<a href="<?php echo base_url(); ?>"> <small>&copy; <script>document.write(new Date().getFullYear())</script> | <?php echo $record->copyright;?> <?php echo $gCompanyName;?></small></a>
			</div>
			<div class="col-md-6">
				<div class="pull-right"> <?php if($record->facebook_status=='Y') {?> <a href="<?php echo $record->facebook;?>" target="_blank"><i class="fa fa-facebook-square"></i></a> <?php } ?>
				<?php if($record->twitter_status=='Y') {?> <a href="<?php echo $record->twitter;?>" target="_blank"><i class="fa fa-twitter-square"></i></a><?php }?>
			<?php if($record->gpluse_status=='Y') {?> <a href="<?php echo $record->gpluse;?>" target="_blank"><i class="fa fa-google-plus-square"></i></a> <?php }?> 
               <?php if($record->youtube_on_off=='Y') {?> <a href="<?php echo $record->youtube;?>" target="_blank"><i class="fa fa-youtube-square"></i></a> <?php }?>
				<?php if($record->linkedin_on_off=='Y') {?> <a href="<?php echo $record->linkedin;?>" target="_blank"><i class="fa fa-linkedin-square"></i></a> <?php }?>
                 
              <?php if($record->pinterest_status=='Y') {?> <a href="<?php echo $record->pinterest;?>" target="_blank"><i class="fa fa-pinterest-square"></i></a> <?php } ?>               </div>
			</div>
		</div>	
        <?php }?>	
	</div>
</div>
<?php echo $gGoogleAnalytic;?>
</body>
</html>