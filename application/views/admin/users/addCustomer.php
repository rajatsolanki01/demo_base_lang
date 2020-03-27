<br />
<div class="panel panel-default">
	<div class=" panel-heading clearfix">
		<h1 class="page-header"><?= $this->lang->line('lang_applicant_details');?></h1>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="sct_left">
				<div class="sct_right">
				<form name="add_customer" action="" method="post" enctype="multipart/form-data"  class="search_form general_form">
					<fieldset>
						<div class="forms">
							<div class="col-md-12">
							<div class="">
								<label><?=  $this->lang->line('lang_firm_name');?>:</label>
								<div class="inputs"> <span class="input_wrapper" style="width:100%;">
									<input type="text" class="text form-control" name="frm_name"  value="<?= $custdata[0]->frm_name;?>" />
									</span> <span class="system positive" id="frm_name"></span> </div>
							</div></div>
							
							<div class="col-md-6">
							<div class="form-group">
								<label><?= $this->lang->line('lang_country');?> :</label>
								<div class="inputs"> <span class=""> 
									<?php 
									if($custdata[0]->country !='')
										echo hgetCountrySelect($custdata[0]->country);
									else
										echo hgetCountrySelect();
									?></span> 
									<span class="system positive" id="country"></span> 
								</div>
							</div></div>
							<div class="col-md-6">
							<div class="form-group">
								<label><?= $this->lang->line('lang_state');?> :</label>
								<div class="inputs"> <span class="" id="state_change"> 
									<?php 
									if($custdata[0]->country !='' && $custdata[0]->state !='')
										echo hgetStateSelect($custdata[0]->country,$custdata[0]->state);
									else
									{?>
										<select name="state" id="state" class="form-control">
				     						<option value="" selected="selected" class="le-input">Select State</option>
				     					</select>
									<?php }?></span>
									<span class="system positive" id="state"></span> </div>
							</div></div>
							<div class="col-md-6">
							<div class="form-group">
								<label><?= $this->lang->line('lang_city');?> :</label>
								<div class="inputs"> <span class=""  id="city_change"> 
									<?php 
									if($custdata[0]->state !='' && $custdata[0]->city !='')
										echo hgetCitySelectbyname($custdata[0]->state,$custdata[0]->city);
									else
									{?>
										<select name="city" id="city" class="form-control">
					    					<option value="" selected="selected" class="le-input">Select City</option>
					    				</select>
									<?php }?>
									</span>
									<span class="system positive" id="city"></span> </div>
							</div></div>
							
							<div class="col-md-6">
							<div class="form-group">
								<label><?= $this->lang->line('lang_mobile');?>:</label>
								<div class="inputs"> <span class="input_wrapper" style="width:100%">
									<input type="text" class="text form-control"  name="ph_no" value="<?= $custdata[0]->ph_no;?>" />
									</span> <span class="system positive" id="ph_no"></span> </div>
							</div></div>
							<div class="col-md-6" style="display:none;">
							<div class="form-group">
								<label><?= $this->lang->line('lang_alt_mobile');?>:</label>
								<div class="inputs"> <span class="input_wrapper" style="width:100%;">
									<input type="text" class="text form-control"  name="alt_mobile_no" value="<?= $alt_data[0]->alt_mobile_no;?>" />
									</span> <span class="system positive" id=""></span> </div>
							</div></div>
							<div class="col-md-6">
							<div class="form-group">
								<label><?= $this->lang->line('lang_email');?>:</label>
								<div class="inputs"> <span class="input_wrapper" style="width:100%;">
									<input type="text" class="text form-control" name="email" value="<?= $custdata[0]->email;?>" />
									</span> <span class="system positive" id="email"></span> </div>
							</div></div>
							<div class="col-md-6" style="display:none;">
								<label><?= $this->lang->line('lang_alt_email');?>:</label>
								<div class="inputs"> <span class="input_wrapper" style="width:100%;">
									<input type="text" class="text form-control" name="alt_email" value="<?=$alt_data[0]->alt_email;?>" />
									</span> <span class="system positive" id=""></span> </div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
								<label><?= $this->lang->line('lang_phone_no');?>:</label>
								<div class="inputs"> <span class="input_wrapper" style="width:100%;">
									<input type="text" class="text form-control" name="phone_no" value="<?= $custdata[0]->phone_no;?>" />
									</span> <span class="system positive" id="phone_no"></span> </div>
							</div></div>
							<div class="col-md-6" style="display:none;">
								<label><?= $this->lang->line('lang_alt_phone_no');?>:</label>
								<div class="inputs"> <span class="input_wrapper" style="width:100%;">
									<input type="text" class="text form-control" name="alt_phone_no" value="<?=$alt_data[0]->alt_phone_no;?>" />
									</span> <span class="system positive" id=""></span> </div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
								<label><?= $this->lang->line('lang_pin_code');?>:</label>
								<div class="inputs"> <span class="input_wrapper" style="width:100%;">
									<input type="text" class="text  form-control" name="pin_code" value="<?=$custdata[0]->pin_code;?>" />
									</span> <span class="system positive" id="pin_code"></span> </div>
							</div></div>
							<div class="col-md-6">
								<div class="form-group">
								<label><?= $this->lang->line('lang_fax_no');?>:</label>
								<div class="inputs"> <span class="input_wrapper" style="width:100%;">
									<input type="text" class="text form-control" name="fax_no" value="<?=$custdata[0]->fax_no;?>" />
									</span> <span class="system positive" id="fax_no"></span> </div>
							</div></div>
							<div class="col-md-12">
								<label><?= $this->lang->line('lang_address');?>:</label>
								<div class="inputs"> <span>
									<textarea class=" form-control" rows="5" cols="55" name="address"><?= $custdata[0]->address;?></textarea>
									</span> <span class="system positive" id="address"></span> </div>
							</div>
							<div class="col-md-6">
								<label><?= $this->lang->line('lang_site_address');?>:</label>
								<div class="inputs"> <span class="input_wrapper" style="width:100%;">
									<input type="text" class="text  form-control" name="site_url" value="<?= $custdata[0]->site_url;?>" />
									</span> <span class="system positive" id="site_url"></span> </div>
							</div>
							<div class="col-md-6">
								<label><?= $this->lang->line('lang_nature_of_business');?>:</label>
								<div class="inputs">
									<table class="table-responsive table-striped table-bordered" width="100%" border="0">
										<tr>
											<?php /* remove
											<td width="44%"><input type="checkbox" <?php if($custdata[0]->seller =='Y'){?> checked="checked"  <?php }?> name="seller" value="Y"  />
												<?= $this->lang->line('lang_seller');?></td>
											<td width="25"><div style="float:left;"> <img src="<?= base_url();?>images/question.png" width="22"  style="cursor:help;"  title=" As a seller you can create your free website & post your latest product, trade leads, classifields & get buyers."    height="22"  /> </div></td>
											<td style="padding-left:25px"><div id="buss_type"style="color:#FF0000;"></div></td>*/?>
																				
										
											<td><input type="checkbox" checked="checked"  name="buyer" id="buyer" value="Y" <?= $chk1;?>  onclick="show_buyer_cate(this);" />
												<?= $this->lang->line('lang_buyer');?>&nbsp;</td>
											<td width="25"><div style="float:left;"> <img src="<?= base_url();?>images/question.png" width="22"  style="cursor:help;"  title="As a buyer you can post your free buy leads, classifields Get seller or Get maximum seller on site."    height="22"  /> </div></td>
											<td>&nbsp;</td>
										</tr>
									</table>
									<span class="system positive" id="site_url"></span> </div>
							</div>
							<div class="col-md-12" id="cate_list" <?php if($chk1==''){?> style="display:none;"<?php } else{?> style="display:block;"<?php }?>>
							<label><?= $this->lang->line('lang_categories');?>:</label>
							<div class="inputs" style="height:200px; width:100%; border:1px solid #999; overflow:scroll;">
								<ul class="inline">
									<?php foreach($categories as $data){?>
									<li>
										<input class="checkbox"  type="checkbox" name="cat[]"  value="<?= $data->cat_id;?>"  id="chk_<?= $data->cat_id;?>" <?php if($data->cust_id!=''){?> checked="checked"<?php }?> 
						onclick="showcats(<?= $data->cat_id;?>);" />
										<?= $data->name;?><br>
										<div class="list" id="cat_<?= $data->cat_id;?>" <?php if($data->cust_id!=''){?>style="display:block;"<?php }else{?>style="display:none;"<?php }?>>
										<?php echo make_sub($data->cat_id,$id);?></li>
									<?php }?>
								</ul>
							</div>
						</div>
						<div class="col-md-12">
						<div class="form-group">
							<label><?= $this->lang->line('lang_description');?>:</label>
							<div class="inputs"> <span>
								<textarea class=" form-control" rows="5" cols="55" name="detail" style="height:200px;"><?=$custdata[0]->detail;?></textarea>
								</span> <span class="system positive" id="detail"></span> </div>
						</div></div>
						<?php /* remove
						<div class="col-md-6">
							<div class="form-group">
							<label><?= $this->lang->line('lang_meta_description');?>:</label>
							<div class="inputs" > <span class="input_wrapper" style="width:100%;">
								<input type="text" class="text  form-control" name="meta_desc" value="<?=$custdata[0]->meta_desc;?>"/>
								</span> <span class="system positive" id="meta_desc"></span> </div>
						</div></div>
						<div class="col-md-6">
						<div class="form-group">
							<label><?= $this->lang->line('lang_meta_keywords');?>:</label>
							<div class="inputs"> <span class="input_wrapper" style="width:100%;">
								<input type="text" class="text  form-control" name="meta_keywords" value="<?=$custdata[0]->meta_keywords;?>"/>
								</span> <span class="system positive" id="meta_keywords"></span> </div>
						</div></div>*/
						?>
						<div class="col-md-6">
							<div class="form-group">
							<label><?= $this->lang->line('lang_logo');?>:</label>
							<div class="inputs"> <span class="">
								<input name="logo_new" type="file" />
								<input type="hidden" name="logo" value="<?=$custdata[0]->logo;?>" />
						</span>
						</div></div>
						</div>
						<!----><div class="col-md-6">
						<div class="form-group">
								 <span class="system positive" id="logo"><img src="<?= base_url();?>images/user_logo/<?=$custdata[0]->logo;?>" width="60" height="50"/></span> </div>
						</div></div></div>
						<div class="col-md-6">
						<div class="form-group">
							<label><?= $this->lang->line('lang_year_company_registered');?>:</label>
							<div class="inputs"> <span class=""><?php echo reg_yrs($custdata[0]->reg_yrs);?></span> <span class="system positive" id=""></span> </div>
						</div></div>
						<div class="col-md-6">
						<div class="form-group">
							<label><?= $this->lang->line('lang_total_no_employees');?>:</label>
							<div class="inputs"> <span class=""><?php echo emp_det($custdata[0]->emp_det);?></span> <span class="system positive" id=""></span> </div>
						</div></div>
						<div class="col-md-6">
						<div class="form-group">
							<label><?= $this->lang->line('lang_ownership_type');?>:</label>
							<div class="inputs"> <span class=""><?php echo own_type($custdata[0]->own_type);?></span> <span class="system positive" id=""></span> </div>
						</div></div>
						<div class="col-md-12">
						<div class="form-group">
							<label><?= $this->lang->line('lang_certification');?>:</label>
							<div class="inputs"> <span class=""><?php echo certification($custdata[0]->certification);?></span> <span class="system positive" id=""></span> </div>
						</div></div>
						<div class="col-md-12">
							<div class="buttons"> <span class="button send_form_btn"><span></span>
								<input name="id" type="hidden" value="<?=$custdata[0]->id;?>" />
								<input name="submit" class="btn btn-primary" type="submit" value="Submit" />
								</span> </div>
						</div>
						</div>
					</fieldset>
				</form>
			</div>
</div>
	
<script type="text/javascript">	
// state data list
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
	    	// alert(data);
	    	$("#city_change").html(data);  
	    }
	})
}
</script>