<div class="waper_my_account">
<div class="container">
	<div class="row">
		<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="sidebar-title"><?= $this->lang->line('721_oth_lang');?></div>
		</div>
		<div class="panel-body">
			<form name="edit_personal_profile" method="post" enctype="multipart/form-data" action="">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label><?= $this->lang->line('155_oth_lang');?>:<span style="color:#F00">*</span></label>
							<input name="name" type="text" value="<?= $userdata[0]->name;?>" class="form-control" />
							<span class="text text-danger"><?= form_error('name');?></span>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
						<label><?= $this->lang->line('144_oth_lang');?> :</label>
						<input name="detail" type="text" value="<?= $userdata[0]->detail;?>" class="form-control" />
						<span class="text text-danger"><?= form_error('detail');?></span>
						</div>
					</div>
					
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
						<label><?= $this->lang->line('349_oth_lang');?>:</label>
						<input name="user_photo_new" type="file" value=""  class="form-control" />
						
						<input name="user_photo" type="hidden" value="<?= $userdata[0]->user_photo;?>" class="form-control"/>
					
						</div>
					</div>
					
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
						<label><?= $this->lang->line('539_oth_lang');?> :</label>
						<input name="mobile_no" type="text" value="<?= $userdata[0]->mobile_no;?>"  <?php if($userdata[0]->mobile_no!=''){?> readonly="1"<?php } ?> class="form-control" />
							<span class="text text-danger"><?= form_error('mobile_no');?></span>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
					<div class="form-group">
						<label><?= $this->lang->line('491_oth_lang');?> :</label>
						<?php /*<input type="text" name="country" value="<?= $userdata[0]->country;?>"   class="form-control" />*/?>
						<?php if(empty($userdata[0]->country)) { $country = '';} else{ $country = $userdata[0]->country; }?>
						<?php country_select1($country);?>
                              <span class="text text-danger" id="country" style="color:#F00"><?php if (form_error('country')){ echo form_error('country'); } ?> </span>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label><?= $this->lang->line('492_oth_lang');?> :<span style="color:#F00">*</span></label>
						<?php /*<input type="text" name="state" value="<?= $userdata[0]->state;?>"  class="form-control" />
							<span class="text text-danger"><?= form_error('state');?></span>*/?>
							<?php if(empty($userdata[0]->state)) { $state = '';} else{ $state = $userdata[0]->state; }?>
											<p id="state_change"><?php state_selected1($country,$state);?></p>
			     	<span id="state_error" style="color:#F00"></span> <?php if(form_error('state')){?><span class="text-danger"><?php echo form_error('state');?></span><?php }?>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label><?= $this->lang->line('493_oth_lang');?> :<span style="color:#F00">*</span></label>
						<?php /*<input type="text" name="city" value="<?= $userdata[0]->city;?>"  class="form-control" />
							<span class="text text-danger"><?= form_error('city');?></span>*/?>
							<?php if(empty($userdata[0]->city)) { $city = '';} else{ $city = $userdata[0]->city; }?>
											<p id="city_change"><?php city_select1($state,$city);?></p> 
                  <span id="city_error" style="color:#F00"></span> <?php if (form_error('city')){?><span class="text-danger"><?php echo form_error('city'); ?></span><?php }?>
						</div>
					</div>
					<div class="col-md-12 col-lg-12">
					<div class="form-group">
						<label><?= $this->lang->line('570_oth_lang');?>:<span style="color:#F00">*</span></label>
						<textarea name="address" rows="5"class="form-control"><?= $userdata[0]->address;?></textarea>
							<span class="text text-danger"><?= form_error('address');?></span>
						</div></div>
					<div >&nbsp;</div>
					<div class="col-md-12 ">
						<input type="submit" name="submit" value="submit"   class="btn btn-danger" />
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>
</div>
