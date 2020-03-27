<link rel="stylesheet" href="<?php echo base_url()?>assets/new_css/css/fastselect.min.css">
<script src="<?php echo base_url()?>assets/new_css/js/fastselect.standalone.js"></script>

<style>
	.fstElement {
		font-size: 1.2em;
	}
	.fstToggleBtn {
		min-width: 10.5em;
	}
	.submitBtn {
		display: none;
	}
	.fstMultipleMode {
		display: block;
	}
	.fstMultipleMode .fstControls {
		width: 100%;
	}
	.inner{
		width:50%;
		margin:0 auto;		
	}
</style>
<div class="waper_my_account">
	<div class="container-fulid">
		<div class="clearfix">
			<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- <?php echo validation_errors(); ?> -->
				<div class="new_panel">
					<div class="panel_heading">
						<?php echo $this->lang->line('603_oth_lang');?>
					</div>
					<div class="panel_body">
						<form name="register_client" id="register_client" action="edit_company_profile.html" method="post" enctype="multipart/form-data">
							<?php if($this->session->userdata['u_status']=='N'){?>
								<div>
									<div class="five columns aligncenter bold3" >
										<h2> <?php echo $this->lang->line('109_oth_lang');?> 2 <br />
											<?php echo $this->lang->line('325_oth_lang');?><a  href="<?php echo base_url()?>active_resend.html"> <?php echo $this->lang->line('326_oth_lang');?></b> </a> <?php echo $this->lang->line('327_oth_lang');?>
											
											<?php echo $succ;?> </h2>
									</div>
								</div>
							<?php }?>
							<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label> <?php echo $this->lang->line('329_oth_lang');?>  </label>
									<input type="text" class="form-control" size="25" name="frm_name" value="<?php echo stripslesh($custdata[0]->frm_name);?>" <?php if($this->session->userdata['cust_id']!='0' && $custdata[0]->frm_name!=''){ echo 'readonly="1"';}?> onkeypress="return alphaNumSpaceOnly(event)"/>
									<div id="frm_name" style="color:#FF0000;"><?= form_error('frm_name');?></div>
								</div>
							</div>
							<?php 
							if($userdata->buyer=='N'){?>
								<div class="col-md-4 col-xs-12">
									<div class="form-group">
										<label><?php echo $this->lang->line('330_oth_lang');?>   <a  data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->lang->line('1341_oth_lang');?>!" class="fa fa-question-circle"></a></label>
										<input type="text" class="form-control" size="25" name="sub_domain" id="subvalid" value="<?php echo stripslesh($custdata[0]->sub_domain);?>" <?php if($this->session->userdata['cust_id']!='0' && $custdata[0]->sub_domain!=''){ echo 'readonly="1"';}?> onkeypress="return alphaNumSpaceOnly(event)"/>
										<div id="sub_domain_id" style="color:#F00;"></div>
									</div>
								</div>
							<?php }
							
							if ($userdata->buyer=='N'){?>
								<div class="col-md-2 col-xs-12">
									<input type="button" name="chk_avali" value="<?php echo $this->lang->line('1743_oth_lang');?>" onclick="check_subdomain(document.register_client.sub_domain.value,document.register_client)" class="btn btn-danger edit_btn_domin" />								
								</div>
							<?php }?>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label> <?php echo $this->lang->line('1139_oth_lang');?></label>
									<input type="text" size="25"  class="form-control" name="ph_no" value="<?php echo $userdata->mobile_no;?>" readonly="1"/>
									<div id="ph_no" style="color:#FF0000;"></div>
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label> <?php echo $this->lang->line('488_oth_lang');?></label>
									<input type="text" size="25"  class="form-control" name="email" value="<?php echo $userdata->user_name;?>" readonly="1" />
								</div>
							</div>

	                        <div class="col-md-6 col-xs-12">
								<div class="form-group">
									<label><?php echo $this->lang->line('332_oth_lang');?></label>
									<input name="logo_new" type="file" class="form-control" />
									<input type="hidden" name="logo" value="<?php echo $custdata[0]->logo;?>" />
									<div id="logo" style="color:#FF0000;"></div>
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
								<label><?php echo $this->lang->line('333_oth_lang');?></label>
								<input type="text" size="25" class="form-control" name="site_url" value="<?php echo $custdata[0]->site_url;?>" />
								<div id="site_url" style="color:#FF0000;"></div>
								</div>
							</div>
							
							<div class="col-md-12 col-lg-12 marign_bottom_profile"><br />
								<?php
								if($custdata[0]->logo!=''){?>
									<img src="<?php echo base_url().'images/user_logo/'.$custdata[0]->logo;?>" style=" max-height:60px; max-width:100px;" > 
								<?php }
								else{
									echo get_image('/assets/images/','notfound.jpg',120);
								}?>
							</div>
							
							<div class="col-md-12 col-lg-12 marign_bottom_profile">
								<label><?php echo $this->lang->line('334_oth_lang');?></label>
								<textarea rows="5" cols="40" name="detail" class="form-control" ><?php echo $custdata[0]->detail;?></textarea>
								<div id="detail" style="color:#FF0000;"></div>
							</div>
							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label><?php echo $this->lang->line('491_oth_lang');?></label>
									<input type="text" size="25"  class="form-control" name="country" value="<?php echo $userdata->country;?>"  readonly="readonly"/>
									<div id="country" style="color:#FF0000;"></div>
								</div>
							</div>
							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label><?php echo $this->lang->line('492_oth_lang');?></label>
									<input type="text" size="25"  class="form-control" name="state" value="<?php echo $userdata->state;?>" readonly="readonly"/>
									<div id="state" style="color:#FF0000;"></div>
								</div>
							</div>
							<div class="col-md-4 col-xs-12 ">
								<div class="form-group">
									<label><?php echo $this->lang->line('493_oth_lang');?></label>
									<input type="text" size="25"  class="form-control" name="city" value="<?php echo $userdata->city;?>" readonly="readonly"/>
									<div id="city" style="color:#FF0000;"></div>
								</div>
							</div>
							<div class="col-md-12 col-lg-12 marign_bottom_profile">
								<label><?php echo $this->lang->line('706_oth_lang');?></label>
								<textarea rows="3" cols="19" class="form-control" name="address"><?php echo $custdata[0]->address;?></textarea>
								<div id="address" style="color:#FF0000;"></div>
							</div>
							<div class="col-md-12 col-lg-12 marign_bottom_profile">
								<br />
								<h2  class="sidebar-title"><strong><?php echo $this->lang->line('337_oth_lang');?></strong></h2>
								<hr>
							</div>
							<?php /* remove
	                        <div class="col-md-4 col-xs-12">
					            <label><?php echo $this->lang->line('1606_oth_lang');?> </label>
					            <input type="text" size="25" class="form-control" name="meta_title" value=""/>
					            <div id="meta_title" style="color:#FF0000;"> </div>
					        </div>
							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label><?php echo $this->lang->line('338_oth_lang');?></label>
									<input type="text" size="25" class="form-control" name="meta_desc" value=""/>
									<div id="meta_desc" style="color:#FF0000;"><?= form_error('meta_desc');?></div>
								</div>
							</div>
							
							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label><?php echo $this->lang->line('339_oth_lang');?></label>
									<input type="text" size="25" class="form-control" name="meta_keywords" value="<?php echo meta_detail($custdata[0]->id,'meta_keywords','customer');?>"/>
									<div id="meta_keywords" style="color:#FF0000;"><?= form_error('meta_keywords');?> </div>
								</div>
							</div>*/?>
							<div class="col-md-12 col-lg-12 marign_bottom_profile">
								<label><?php echo $this->lang->line('497_oth_lang');?></label>
								<?php if($custdata[0]->seller=='Y'){?>
								<label><?php echo $this->lang->line('25_oth_lang');?> </label>
								<?php }else{?>
								<label><?php echo $this->lang->line('26_oth_lang');?></label>
								<?php }?>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label><?php echo $this->lang->line('1607_oth_lang');?></label>
									<input  type="radio" name="type" value="sell"  checked="checked" onclick="show_categories(this.value);" >
									<?php 
									if($this->session->userdata['buyer']=='Y')
										echo $this->lang->line('26_oth_lang');
									else   
										echo $this->lang->line('25_oth_lang');

									echo " ".$this->lang->line('104_oth_lang')."&nbsp;  &nbsp; &nbsp;";
									
									if(serviceNoOff=='YES'){?>
										<input  type="radio" name="type" value="service" onclick="show_categories(this.value);" >&nbsp; 
										<?php echo $this->lang->line('1399_oth_lang');
									}?>

									<!-- <div class="attireCodeToggleBlock" action="" > 
										<?php echo subcateforsearch('',$this->session->userdata['cust_id']); 
										if(serviceNoOff=='YES'){?>
											<?php echo subcateforsearch('',$this->session->userdata['cust_id']);
										}?>
										<script>
											$('.multipleSelect').fastselect();
										</script> 	
										<span id="catgoryid2" style="color:#F00"></span> 
									</div> -->
									<div id="cat_counts" style="color:#FF0000;"> </div>
								</div>
							</div>
							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label><?php echo $this->lang->line('342_oth_lang');?></label>
									<?php echo reg_yrs($custdata[0]->reg_yrs);?>
								</div>
							</div>
							
							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label><?php echo $this->lang->line('703_oth_lang');?></label>
									<?php echo emp_det($custdata[0]->emp_det);?>
								</div>
							</div>
							
							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label><?php echo $this->lang->line('715_oth_lang');?></label>
									<?php echo own_type($custdata[0]->own_type);?>
								</div>
							</div>
						
							<div class="col-md-12 col-lg-12 marign_bottom_profile">
								<label> <?php echo $this->lang->line('716_oth_lang');?></label>
								<?php echo certification($custdata[0]->certification);?> <br />
								<div id="alert" style="color:#FF0000;"></div>
							</div>

							<div class="col-md-12 col-lg-12 marign_bottom_profile">
								<input name="id" type="hidden" value="<?php //echo $id?>" />
								<input name="submit"  class="btn btn-danger" type="submit" value="<?php echo $this->lang->line('821_oth_lang');?>"  />
								<input type="hidden" value="<?php if($this->session->userdata['cust_id']==0){
									echo '0'; }else{ echo '1'; }?>" name="count_cats" id="count_cats" />
							</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="break_line"></div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<script>
$(function() {
    $('#subvalid').on('keypress', function(e) {
        if (e.which == 32)
            return false;
    });
});
</script>