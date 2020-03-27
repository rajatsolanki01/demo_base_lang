<div class="rg_backgroud">
	<div class="rg_back1">
		<h3 class="rg_heading">Welcome to <?php echo $gCompanyName; ?></h3>
		<p>Join Millions Trading On one of the world's Largest B2B E-Commerce Platform !</p>
		<p>Promote To Buyers Across The Globe and Contact Trusted Suppliers</p>
	</div>
	<div id="main-body" ng-app="DialToMe" >
		<div class="container" ng-controller="ZipCodeCtrl" ng-init="getCountryList()">
			<div class="row"> 
				<div id="main-col" class="col-md-12 register_form">
					<div class="top_set_box">
						
					<form name="registration" action="<?php echo base_url(); ?>registration-<?php echo $package_id; ?>.html" method="post" autocomplete="off" enctype="multipart/form-data" >
					
						
						<?php if (isset($data['succ']) && $data['succ']=='verified'){?>
						<div class="alert alert-success"><strong>Success!</strong>Your account has been verified!</div>
						<?php } ?>
						
						<div class="block_div white_back_div">
							<div class="col-md-12">
								<h5> <span id="name" style="display:block;">Account Type</span> <span id="name1" style="display:none;">Account Type</span></h5>
							</div>
							<div class="col-md-1">
						 <div class="radio radio-primary">						
						<input  type="radio" name="type" id="radio1" value="P"  checked="checked" onclick="return show_hide_registration(this.value);">
						<label for="radio1">Buyers</label>
						</div>
						</div>
						</div>
						
						<div class="block_div">
							<div class="col-md-12">
								<h5> <span id="name" style="display:block;">Personal Information</span> <span id="name1" style="display:none;">Company Information</span></h5>
							</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label class="name_sm">Name:<span style="color:#F00">*</span></label>
								<input class="form-control" required placeholder="Full Name" type="text" id="uname" name="uname" value="<?php echo set_value('uname');?>">
								<span id="nameid"></span>
						<?php if(form_error('uname')){?><span class="text text-danger"><?php echo form_error('uname');?></span><?php }?>
								<input type="hidden" required name="package_id" value="<?php echo $package_id;?>" />
							</div>
						</div>
						<span id="company_name" style="display:none;">
						<div class="col-md-4">
							<div class="form-group">
							<label class="name_sm">Company Name:<span style="color:#F00">*</span></label>
							<input class="form-control" placeholder="Company Name"   type="text" value="<?php echo set_value('company_name');?>" name="company_name" id="company_name_p">
						<?php if(form_error('company_name')){?><span class="text text-danger"><?php echo form_error('company_name');?></span><?php }?>
							<div id="company_name_id" style="color:#FF0000;"></div>
							</div>
						</div>
						</span>
						<div class="col-md-4">
							<div class="form-group">
							<label class="name_sm">Mobile : <span style="color:#F00">*</span></label>
							<input class="form-control " required type="text" placeholder="Mobile number" value="<?php echo set_value('mobile');?>" name="mobile" id="mobile" 
							 oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
							<span id="mobid"></span>
						<?php if (form_error('mobile')){?><span class="text text-danger"><?php echo form_error('mobile');?></span><?php }?>
							<span id="mobid" style="color:#FF0000;"></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
							<label class="name_sm"> Email: <span style="color:#F00">*</span></label>
							<input class="form-control" required placeholder="Email Address" type="email" value="<?php echo set_value('email')?>" id="email1" name="email">
							<span id ='email'></span>

						<?php if(form_error('email')){?><span class="text text-danger"><?php echo form_error('email');?></span><?php }?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
							<label class="name_sm">Confirm Email:<span style="color:#F00">*</span></label>
							<input class="form-control" required placeholder="Confirm Email"  type="email" value="<?php echo set_value('email2');?>" name="email2" id="email21">
						<?php if (form_error('email2')){?><span class="text text-danger"><?php echo form_error('email2'); ?></span><?php }?>
							<div id="email2" style="color:#FF0000;"></div>
							</div>
						</div>
						</div>
						<div>&nbsp;</div>
						<div class="block_div white_back_div">
						<div class="col-md-12">
							<h5>Address Information</h5>
						</div>
						<div class="col-md-4">

                                
                            <div class="form-group"><?php country_select1();?>
                              <span class="text text-danger" id="country" style="color:#F00"><?php if (form_error('country')){ echo form_error('country'); } ?> </span> 
                          	</div>
						</div>
						<div class="col-md-4">
                  <span id="state_change"><select name="state" id="state" class="form-control" required>
			     <option value="" selected="selected" class="le-input">Select State</option></select></span>
			     	<span id="state_error" style="color:#F00"></span> <?php if(form_error('state')){?><span class="text-danger"><?php echo form_error('state');?></span><?php }?> 
                              
						</div>
						<div class="col-md-4">
                        
                  <span id="city_change"><select name="city" id="city" class="form-control" required>
			     <option value="" selected="selected" class="le-input">Select City</option></select>
                  </span> 
                  <span id="city_error" style="color:#F00"></span> <?php if (form_error('city')){?><span class="text-danger"><?php echo form_error('city'); ?></span><?php }?>
                          
						</div>
						</div>
						<div>&nbsp;</div>
						<div class="block_div">
						<div class="col-md-12">
							<h5>Security Information</h5>
						</div>
						<div class="col-md-6">
							<div class="form-group" >
							<label class="name_sm">Password:<span style="color:#F00">*</span></label>
							<input class="form-control" required placeholder="Password" type="password" name="pass" id="pass"  value="">
							<span id="passid"></span>
							<?php if (form_error('pass')){?><span class="text-danger"><?php echo form_error('pass');?></span><?php }?>
							<div id="passid" style="color:#ff0000"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" >
							<label class="name_sm">Password <span style="color:#F00">*</span></label>
							<input class="form-control " required placeholder="Re-Type Password" type="password" name="repass" id="repass" value="">
							<span id="repassid"></span>
							<?php if(form_error('repass')){?><span class="text-danger"><?php echo form_error('repass');?></span><?php }?>
							<div id="repassid" style="color:#ff0000"></div>
							</div>
						</div>
						
						<input type="hidden"  name="paid"  value="F"/>
						
						<div  class="col-md-12" id="cate_list" <?php if (isset($chk1) && $chk1=='') {?> style="display:none;" <?php }else{ ?> style="display:block;"<?php }?> >
						<table width="100%">
							<tr>
								<input type="hidden" value="<?php if (isset($userdata[0]['buyer']) && $userdata[0]['buyer']=='Y'){?>1<?php }else{?>0<?php }?>" name="count_cats" id="count_cats" /></td>
								<td><div id="cat_counts" style="color:#FF0000;"></div></td>
							</tr>
						</table>
						</div>
							
						<div class="col-md-12">
							<label class="name_sm">Verification Code<span style="color:#F00">*</span></label>
							<input class="form-control " required placeholder="Enter Verification Code" type="text" name="security_code" id='cpcode'  value="">
							<span id="alert_security"></span>
							<?php if (form_error('security_code')){?><span class="text-danger"><?php echo form_error('security_code');?></span><?php } else if(isset($cap_error) && $cap_error!=""){?><span class="text-danger"><?php echo $cap_error; ?></span><?php }?><br />
							<div id="alert_security" style="color:#FF0000;"></div>
							<span id="captcha"><?php echo $captcha; ?></span>&nbsp;
							<span id="refresh_captcha">&nbsp; <img border="0"  alt="" src="<?php echo base_url(); ?>/images/refresh.png"  ></span> </div>
						</div>
						<div>&ensp;</div>
						<div class="col-md-12">
						<input type="checkbox" name="vehicle" value="Car" checked required>
						<a href="<?php echo base_url(); ?>termscondition.html"><small style=" font-size:13px;">I have Accpeted All Terms & Condition</small></a> & <a href="<?php echo base_url(); ?>privacy_policy.html"><small style=" font-size:13px;">privacy_policy</small></a><br>
						</div>
						<div class="col-md-12"> <br />
							<input type="hidden" name="open_type" value="WEB" >
							<input type="submit" class="btn btn-danger btn-large btn-lg text-center" value="Join Now" name="submit" onclick="return Valid_registration(document.registration);"/>
						</div>
					</form>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
</form>
<?php  if(isset($data['type']) && $data['type']=='C'){?>
	<script>
		$("#company_profile").attr('checked','checked')
		$("#company_profile").click();
	</script>
<?php }?>