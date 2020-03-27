<link href="<?= base_url();?>templates/google-maps/custom.css" rel="stylesheet" />
<main id="contact-us" class="inner-bottom-md">
<div class="gmap">
	<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="100%" height="340" src="https://maps.google.com/maps?hl=en&q=<?= $company_address;?>&ie=UTF8&t=roadmap&z=15&iwloc=B&output=embed"></iframe> 
</div>
<div>&nbsp;</div>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading"><strong><?= $this->lang->line('627_oth_lang');?></strong></div>
				<div class="panel-body">
					<p style="margin-left:8px; line-height:1.5em; margin-bottom:15px;"> <strong><?= $contact_data->company_name;?></strong><br>
					<div class="border-1 clearfix">
						<div class="col-md-12 ufo-1">
							<div class="row-1"><i class="y-icon fa fa-map-marker" aria-hidden="true"></i>Address: <?= $contact_data->company_address;?></div>
						</div>
					</div>
					<hr>
					<div class="border-1 clearfix">
						<div class="ufo"> <i class="y-icon fa fa-mobile" aria-hidden="true"></i><?= $this->lang->line('1139_oth_lang');?>:  <?= $contact_data->phone;?> </div>
					</div>
					<hr>
					<div class="border-1 clearfix">
						<div class="ufo"> <i class="y-icon fa fa-envelope-o" aria-hidden="true"></i><?= $this->lang->line('46_oth_lang');?>: <?= $contact_data->email;?> </div>
					</div>
					<div class="border-1 clearfix">
						<hr>
						<div class="ufo"> <i class="y-icon fa fa-globe " aria-hidden="true"></i><?= $this->lang->line('221_oth_lang');?>: <?= $contact_data->site_url;?> </div>
					</div>
					</p>
					<hr>
				</div>
			</div>
		</div>
		<!-- /.col -->
		
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading"><strong><?= $this->lang->line('1141_oth_lang')?></strong></div>
				<div class="panel-body"> 
					<!--========================review form========================-->
					<form action="<?= base_url();?>contactus.html"  id="contactus" method="post">
						<?php if ($this->session->flashdata('Success')){?>
						<div class="alert alert-success"><?= $this->session->flashdata('Success');?></div>
						<?php } ?>
						<div>
							<div class="row">
								<div  class="col-lg-6 ">
									<div class="form-group">
										<label for="usr"><?= $this->lang->line('155_oth_lang');?>:</label>
										<input type="text" class="form-control" placeholder="<?= $this->lang->line('1291_oth_lang');?>" id="name" name="name" required="required" >
									</div>
								</div>
								<div  class="col-lg-6 ">
									<div class="form-group">
										<label for="usr"><?= $this->lang->line('157_oth_lang');?>:</label>
										<input type="email" class="form-control" placeholder="<?= $this->lang->line('1292_oth_lang');?>" id="email" name="email" required="required" >
									</div>
								</div>
							</div>
							<div class="row">
								<div  class="col-lg-6 ">
									<div class="form-group">
										<label for="usr"><?= $this->lang->line('487_oth_lang');?></label>
										<input type="number" class="form-control" placeholder="<?= $this->lang->line('1293_oth_lang');?>" id="mobile_no" name="mobile" required="required" >
									</div>
								</div>
								<div  class="col-lg-6 ">
									<div class="form-group">
										<label for="usr"><?= $this->lang->line('540_oth_lang');?>:</label>
										<input type="text" class="form-control" placeholder="<?= $this->lang->line('1294_oth_lang');?>" id="subject" name="subject" required="required" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="comment"><?= $this->lang->line('541_oth_lang');?>:</label>
								<textarea class="form-control" rows="5" placeholder="<?= $this->lang->line('1515_oth_lang');?>" id="detail" name="message" required="required"></textarea>
							</div>
							<div class="">
								<input type="submit" name="submit" id="submit" value="<?= $this->lang->line('1329_oth_lang');?>" onclick="return Valid_contact(document.contact_us);" class="btn btn-success"/>
							</div>
							<div>&nbsp;</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.col --> 
	</div>
	<!-- /.row --> 
</div>
</main>
<!-- /.container --> 
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script> 
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=<?= $google_map_key;?>"></script> 
<script src="<?= base_url();?>/templates/google-maps/custom.js"></script> 
