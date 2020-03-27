<?php
if(isset($useredit) && $useredit !='')
{
	$user_name = $useredit->user_name;
	$password = $useredit->password;
	$name = $useredit->name;
	$designation = $useredit->designation;
	$mobile_no = $useredit->mobile_no;
	$id = $useredit->id;
	$address = $useredit->address;
	$country = $useredit->country;
	$state = $useredit->state;
	$city = $useredit->city;
	$pageHeading = $this->lang->line('lang_edit_staff_user');
	$btn = 'Update';
}
else{
	$user_name = '';
	$password = '';
	$name = '';
	$designation = '';
	$mobile_no = '';
	$id = '';
	$address = '';
	$country = '';
	$state = '';
	$city = '';
	$pageHeading = $this->lang->line('lang_add_staff_user');
	$btn = 'Submit';
}?>
<br />
<div class="panel panel-default">
	<div class=" panel-heading clearfix">
		<h2 class="page-header"><?= $pageHeading;?></h2>
	</div>
	<div class="panel-body">
		<form name="add_user" action="" method="post" enctype="multipart/form-data"  class="search_form general_form" >
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label><strong><?= $this->lang->line('lang_email_address');?>: <span class="star"></span></strong></label>
						<div class="inputs"> <span class="input_wrapper" style="width:390px;">
							<input type="email" class="text form-control" name="user_name"  value="<?= set_value('user_name',$user_name);?>" />
							</span> <span class="system positive star" id="user_name"><?= form_error('user_name');?></span> </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label><strong><?= $this->lang->line('lang_password');?>: <span class="star">*</span></strong></label>
						<div class="inputs"> <span class="input_wrapper" style="width:390px;">
							<input type="password" class="text form-control" name="new_pass"  value="" />
							<input type="hidden" name="old_pass"  value="<?= $password;?>"/>
							</span> <span class="system positive star" id="new_pass"><?= form_error('new_pass');?><?= form_error('old_pass');?></span> </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label><strong><?= $this->lang->line('lang_name');?>: <span class="star">*</span></strong></label>
						<div class="inputs"> <span class="input_wrapper" style="width:390px;">
							<input type="text" class="text form-control" name="name"  value="<?= set_value('name',$name);?>" />
							</span> <span class="system positive star" id="name"><?= form_error('name');?></span> </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label><strong><?= $this->lang->line('lang_designation');?>: <span class="star">*</span></strong></label>
						<div class="inputs"> <span class="input_wrapper" style="width:390px;">
							<input type="text" class="text form-control" name="designation"  value="<?= set_value('designation',$designation);?>" />
							</span> <span class="system positive star" id="designation"><?= form_error('designation');?></span> </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label><strong><?= $this->lang->line('lang_mobile_no');?>: <span class="star">*</span></strong></label>
						<div class="inputs"> <span class="input_wrapper" style="width:390px;">
							<input type="text" class="text form-control" name="mobile_no"  value="<?= set_value('mobile_no',$mobile_no);?>" />
							</span> <span class="system positive star" id="mobile_no"><?= form_error('mobile_no');?></span> </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label><strong><?= $this->lang->line('lang_country');?>: <span class="star">*</span></strong></label>
						<div class="inputs"> <span class=""> 
							<?php 
							if($country !='')
								echo hgetCountrySelect($country);
							else
								echo hgetCountrySelect();
							?>
						</span> <span class="system positive star" id="country"><?= form_error('country');?></span> </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label><strong><?= $this->lang->line('lang_state');?>: <span class="star">*</span></strong></label>
						<div class="inputs" id="state_change"> <span class=""> 
							<?php 
							if($country !='' && $state !='')
								echo hgetStateSelect($country,$state);
							else
							{?>
								<select name="state" id="state" class="form-control">
		     						<option value="" selected="selected" class="le-input">Select State</option>
		     					</select>
							<?php }?>
						</span> <span class="system positive star" id="state"><?= form_error('state');?></span> </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label><strong><?= $this->lang->line('lang_city');?>: <span class="star">*</span></strong></label>
						<div class="inputs" id="city_change"> <span class=""> 
							<?php 
							if($state !='' && $city !='')
								echo hgetCitySelect($state,$city);
							else
							{?>
								<select name="city" id="city" class="form-control">
			    					<option value="" selected="selected" class="le-input">Select City</option>
			    				</select>
							<?php }?>
						</span> <span class="system positive star" id="city"><?= form_error('city');?></span> </div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label><strong><?= $this->lang->line('lang_address');?>: <span class="star">*</span></strong></label>
						<div class="inputs"> <span >
							<textarea class="form-control" rows="5" cols="54" name="address"><?= set_value('address',$address);?></textarea>
							</span> <span class="system positive star" id="address"><?= form_error('address');?></span> </div>
					</div>
				</div>
				<input name="id" type="hidden" value="<?= $id;?>" />
				<br />
				<div class="col-md-12">
					<div class="form-group">
						<div class="buttons"> <span class="button send_form_btn"><span></span>
							<input name="submit" class="btn btn-primary" type="submit" value="<?= $btn;?>" />
							</span> 
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">	
$(document).on('change',"#countryName", function(){
    
    var country_id =  $("#countryName option:selected").html();
    // alert (country_id);
    $.ajax({
	    url:base_url+"AJAXState",
	    type:'post',
	    data:{country:country_id},
	    dataType:"html",
	    success:function(data){
	    	// alert(data);
	    	$("#state_change").html(data);
	    }
	}); // ajax
    /**********************/
}); // ends main  
 
function select_city(state)
{  
	$.ajax({
	    url:base_url+"AJAXCityByName",
	    type:'post',
	    data:{state:state},
	    dataType:"html",
	    success:function(data){
	    	$("#city_change").html(data);  
	    }
	})
}
</script>
