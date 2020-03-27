<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/new_css/css/store_style.css" media="all" />
<!--<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>-->

<div class="thetop">	
	<div class="container-fluid">
		<div class="box_section" id="com_pro">
			<div class="clearfix">
				<div class="box_heading">
					<h4><?= $this->lang->line('1503_oth_lang');?></h4>
				</div>
				<div class="col-md-3">
					<div class="cont_details"> <img src="<?= base_url();?>images/user_photo/<?= $clientDetail[0]['user_photo'];?>" class="img-responsive">
						<h4><?= $clientDetail[0]['name'];?></h4>
						<p><?= $clientDetail[0]['email'];?></p>
						<p><?= $clientDetail[0]['mobile_no'];?></p>
						<p><?= $clientDetail[0]['address'];?>,<?= $clientDetail[0]['city'];?></p>
						<p><?= $clientDetail[0]['state'];?>,<?= $clientDetail[0]['country'];?></p>
					</div>
				</div>
				<div class="col-md-5 row_padding">
					<div class="row">
						<div class="col-md-4">
							<div class="heading_show"><?= $this->lang->line('1607_oth_lang');?></div>
						</div>
						<?php /*<div class="col-md-8">
							<div class="data_show"><?= user_category($userdata[0]->id);?> </div>
						</div>*/?>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="heading_show"> <?= $this->lang->line('166_oth_lang');?></div>
						</div>
						<div class="col-md-8">
							<div class="data_show"><?php if($userdata[0]->seller=='Y'){?>Seller<?php }?>
							<?php if($userdata[0]->seller=='N'){?>Buyer<?php }?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="heading_show"><?= $this->lang->line('342_oth_lang');?> </div>
						</div>
						<div class="col-md-8">
							<div class="data_show"> <?= $userdata[0]->reg_yrs;?> </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="heading_show"><?= $this->lang->line('703_oth_lang');?></div>
						</div>
						<div class="col-md-8">
							<div class="data_show"><?= $userdata[0]->emp_det;?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="heading_show"><?= $this->lang->line('715_oth_lang');?> </div>
						</div>
						<div class="col-md-8">
							<div class="data_show"><?= $userdata[0]->own_type;?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="heading_show"><?= $this->lang->line('716_oth_lang');?></div>
						</div>
						<div class="col-md-8">
							<div class="data_show"><?= user_certification($userdata[0]->certification);?> </div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div id="map" style="width: 100%; height: 300px;"></div>
				</div>
			</div>
		</div>
		<div class="box_section" id="com_pro">
			<div class="clearfix">
				<div class="box_heading">
					<h4><?= $this->lang->line('357_oth_lang');?></h4>
				</div>
			</div>
			<p><?= character_limiter($userdata[0]->detail,1900);?></p>
		</div>
	</div>
</div>

 
