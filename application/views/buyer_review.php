<?php if($this->session->userdata['cust_id'] != $cust_id){
	if(feedback_product_chk($pro_id,$this->session->userdata['user_id'])=='1'){?>
<div class="alert alert-danger"> <?php echo $this->lang->line('1585_oth_lang');?>. </div>
<?php }else{

if($this->session->userdata['cust_id']!=''){?>
<div class="panel panel-default">
	<div class="panel-heading"><strong><?php echo $this->lang->line('1584_oth_lang');?></strong></div>
	<div class="panel-body"> 
		 
		<!--========================review form========================-->
		<form action="" name="review_post_form" id="review_post_form" method="post">
			<input type="hidden" name="pro_id" id="pro_id" value="<?php echo $pro_id;?>">
			<input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata['user_id'];?>">
			<div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="sel1"><?php echo $this->lang->line('1586_oth_lang');?> :</label>
							<select class="form-control" id="sel1" style="font-family: 'FontAwesome', Helvetica;" name="star">
								<option value="5">     <?php echo $this->lang->line('1587_oth_lang');?></option>
								<option value="4">    <?php echo $this->lang->line('1588_oth_lang');?></option>
								<option value="3">   <?php echo $this->lang->line('1589_oth_lang');?></option>
								<option value="2">  <?php echo $this->lang->line('1590_oth_lang');?></option>
								<option value="1">  <?php echo $this->lang->line('1591_oth_lang');?></option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="comment"><?php echo $this->lang->line('1592_oth_lang');?> :</label>
					<textarea class="form-control" rows="5" placeholder="What's on your mind?" id="comment" name="feedback_msg" required="required"></textarea>
				</div>
				<div class="">
					<input type="submit" name="review_submit" id="review_submit" value="<?php echo $this->lang->line('1745_oth_lang');?>" class="btn btn-success" onclick="return postProductReview(document.review_post_form);">
				</div>
			</div>
		</form>
	</div>
</div>
<?php }else{?>
<div class="alert_feedback"> <?php echo $this->lang->line('1583_oth_lang');?>. </div>
<?php }?>
        
        <?php }
    }else{
    	?>
        
        <div class="alert_feedback"> <?php echo $this->lang->line('1594_oth_lang');?>. </div>

        <?php }?>
<div class="row">
	<div class="col-sm-6">
		<div class="rating-block">
			<h4><?php echo $this->lang->line('1595_oth_lang');?></h4>
			<h2 class="bold padding-bottom-7"><?php echo show_totalproductRating($pro_id);?> <small>/ 5</small></h2>
          <div class="row">
		  	<div class="star_pro_set">
            <?php echo ShowAverageratingstar(show_totalproductRating($pro_id));?>
			</div>
            </div>
		</div>
	</div>
	<div class="col-sm-6">
		<h4 class="feed_top_none"><?php echo $this->lang->line('1596_oth_lang');?></h4>
		<div class="pull-left">
			<div class="pull-left" style="width:35px; line-height:1;">
				<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star star_color_feed"></span></div>
			</div>
			<div class="pull-left" style="width:180px;">
				<div class="progress" style="height:9px; margin:8px 0;">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%"> <span class="sr-only">80% <?php echo $this->lang->line('1597_oth_lang');?> </span> </div>
				</div>
			</div>
			<div class="pull-right" style="margin-left:10px;"><?php echo show_productStar($pro_id,5);?></div>
		</div>
		<div class="pull-left">
			<div class="pull-left" style="width:35px; line-height:1;">
				<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star star_color_feed"></span></div>
			</div>
			<div class="pull-left" style="width:180px;">
				<div class="progress" style="height:9px; margin:8px 0;">
					<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%"> <span class="sr-only">80% <?php echo $this->lang->line('1597_oth_lang');?></span> </div>
				</div>
			</div>
			<div class="pull-right" style="margin-left:10px;"><?php echo show_productStar($pro_id,4);?></div>
		</div>
		<div class="pull-left">
			<div class="pull-left" style="width:35px; line-height:1;">
				<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star star_color_feed"></span></div>
			</div>
			<div class="pull-left" style="width:180px;">
				<div class="progress" style="height:9px; margin:8px 0;">
					<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%"> <span class="sr-only">80% <?php echo $this->lang->line('1597_oth_lang');?></span> </div>
				</div>
			</div>
			<div class="pull-right" style="margin-left:10px;"><?php echo show_productStar($pro_id,3);?></div>
		</div>
		<div class="pull-left">
			<div class="pull-left" style="width:35px; line-height:1;">
				<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star star_color_feed"></span></div>
			</div>
			<div class="pull-left" style="width:180px;">
				<div class="progress" style="height:9px; margin:8px 0;">
					<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%"> <span class="sr-only">80% <?php echo $this->lang->line('1597_oth_lang');?></span> </div>
				</div>
			</div>
			<div class="pull-right" style="margin-left:10px;"><?php echo show_productStar($pro_id,2);?></div>
		</div>
		<div class="pull-left">
			<div class="pull-left" style="width:35px; line-height:1;">
				<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star star_color_feed"></span></div>
			</div>
			<div class="pull-left" style="width:180px;">
				<div class="progress" style="height:9px; margin:8px 0;">
					<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%"> <span class="sr-only">80% <?php echo $this->lang->line('1597_oth_lang');?></span> </div>
				</div>
			</div>
			<div class="pull-right" style="margin-left:10px;"><?php echo show_productStar($pro_id,1);?></div>
		</div>
	</div>
</div>
<?php $feedback_data = get_productFeedback($pro_id);?>
<div class="row">
	<div class="col-md-12">
		<hr/>
		<?php foreach($feedback_data as $data){
			$userdata = user_detail($data->user_id,'name,user_photo');
		
			?>
		
		<div class="review-block">
			<div class="row">
				<div class="col-sm-2"> 
					<?php
					if(empty($userdata->user_photo))
					{?>
						<img src="<?php echo base_url();?>images/user_photo/imgnotfound.jpg" class="img-rounded">
					<?php }
					else{?>
						<img src="<?php echo base_url().'images/user_photo/'.$userdata->user_photo;?>" class="img-rounded">
					<?php }?>
					<div class="review-block-name"><?php if(empty($userdata->name)){ echo $userdata->name;} ?></div>
					<div class="review-block-date">
						<?php echo $data->date;?></div>
				</div>
				<div class="col-sm-10 star_pro_set"> 
					<?php if($data->star=='5'){?>
				
					<div class="review-block-rate">
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
					</div>
					<?php } if($data->star=='4'){?>

					<div class="review-block-rate">
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i></button>
					</div>
					<?php } if($data->star=='3'){?>

					<div class="review-block-rate">
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
					</div>
				<?php } if($data->star=='2'){?>

					<div class="review-block-rate">
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i></button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
					</div>
					<?php } if($data->star=='1'){?>

					<div class="review-block-rate">
						<button type="button" class="btn btn-info" aria-label="Left Align"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
						<button type="button" class="btn btn-primary" aria-label="Left Align"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
					</div>
					<?php }?>
					<div>&ensp;</div>
					<div class="review-block-description">
						<?php echo $data->feedback_msg;?></div>
				</div>
			</div>
			<hr/>
		</div>
		<?php } ?> </div>
</div>
