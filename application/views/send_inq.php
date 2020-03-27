<div  class="tab-content" id="contact" >
<?php if(isset($this->session->userdata['user_id']))
{
	$user_id =$this->session->userdata['user_id'];
}
else
{
$user_id ="";
}?>
	<?php if(isset($this->session->userdata['message'])){?>
	<div class="red">
		<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong><?php echo $this->session->userdata['message']; $this->session->unset_userdata('message'); ?> </strong></div>
	</div>
	<?php }?>
	<?php if($this->session->userdata('caperror')){?>
	<div class="red">
		<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong><?php echo $this->session->userdata['caperror'];
		$this->session->unset_userdata('caperror');?></strong> </div>
	</div>
	<?php }?>
	<form name="frmsend" method="post"  action="<?php echo base_url()?>send_inq/">		
		<div class="row">

			<?php if($user_id==''){?>
			<div class="col-md-6 col-xs-12 show_with">
				<div class="form-group">
					<label><?php echo $this->lang->line('155_oth_lang');?>:</label>
					<input type="text" value="" required name="name"  class="form-control" >
					<?php if(isset($this->session->userdata['name_error'])){?><span class="text text-danger"><?php echo $this->session->userdata['name_error']; $this->session->unset_userdata('name_error');?></span><?php }?>
					<div id="name"></div>
				</div>
			</div>
			
			<div class="col-md-6 col-xs-12 show_with">
				<div class="form-group">
					<label><?php echo $this->lang->line('276_oth_lang');?>:</label>
					<input type="number" value="" required name="mobile" class="form-control" >
					<?php if(isset($this->session->userdata['mobile_error'])){?><span class="text text-danger"><?php echo $this->session->userdata['mobile_error']; $this->session->unset_userdata('mobile_error');?></span><?php }?>
					<div id="mobile"></div>
				</div>
			</div>
			
			<div class="col-md-6 col-xs-12 show_with">
				<div class="form-group">
					<label><?php echo $this->lang->line('488_oth_lang');?>:</label>
					<input type="email" value=""required  name="email" class="form-control" >
					<?php if(isset($this->session->userdata['email_error'])){?><span class="text text-danger"><?php echo $this->session->userdata['email_error']; $this->session->unset_userdata('email_error');?></span><?php }?>
					<div id="email"></div>
				</div>
			</div>
			<?php } ?>
			
			<div class="col-md-6 col-xs-12 show_with">
				<div class="form-group">
					<label><?php echo $this->lang->line('540_oth_lang');?>:</label>
					<input type="text" value="<?php echo $name; ?>" required name="subject" class="form-control" >
					<?php if(isset($this->session->userdata['subject_error'])){?><span class="text text-danger"><?php echo $this->session->userdata['subject_error']; $this->session->unset_userdata('subject_error');?></span><?php }?>
					<div id="subject"></div>
				</div>
			</div>
			
			<div class="col-md-6 col-xs-12 show_with">
				<div class="form-group">
					<label><?php echo $this->lang->line('541_oth_lang');?>:</label>
					<textarea  cols="" name="message" class="form-control" ></textarea>
				<?php if(isset($this->session->userdata['message_error'])){?><span class="text text-danger"><?php echo $this->session->userdata['message_error']; $this->session->unset_userdata('message_error');?></span><?php }?>

					<input type="hidden" name="cl_id" value="<?php echo (isset($cl_id))? $cl_id : "" ; ?>" />

                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                    <input type="hidden" name="page1" value="<?php echo $page1;?>" />
                    <input type="hidden" name="action1" value="<?php echo $action1;?>" />
					<input type="hidden" name="pro_id" value="<?php echo $pro_id;?>" />
					<input type="hidden" name="type_id" value="<?php echo $type_id;?>" />
					<input type="hidden" name="title" value="<?php echo $gWebname;?>" />
                    <input type="hidden" name="type" value="<?php echo $type;?>" />
                    <?php if(isset($action) && $action=='get_qutoe'){?>
                    <input type="hidden" name="link" value="<?php echo base_url()?>requirement/<?php echo $pro_id;?>" />
                    <?php }else{?>
                    <input type="hidden" name="link" value="<?php echo $actual_link;?>" />
                    <?php }?>
                    
					
					<div id="message"></div>
				</div>
			</div>
			
			<div class="col-md-6 col-xs-12 show_with">
				<div class="form-group">
					<?php echo $this->lang->line('1666_oth_lang');?><br />
					<input type="text" id="cpcode" name="security_code" value="" required class="form-control" autocomplete="off" >
					<?php if(isset($this->session->userdata['security_code_error'])){?><span class="text text-danger"><?php echo $this->session->userdata['security_code_error']; $this->session->unset_userdata('security_code_error');?></span><?php }?>
					<strong><?php echo $this->lang->line('171_oth_lang');?>:</strong> <br />
					<span id="captcha"><?php echo $captcha; ?> </span>&nbsp;
					<span id="refresh_captcha">&nbsp; <img border="0"  alt="" src="<?php echo base_url(); ?>images/refresh.png"  ></span>

                </div>
			</div>
			
			<div class="col-md-12 col-xs-12">
				<div class="form-group">
					<input type="submit" name="send" value="<?php echo $this->lang->line('1329_oth_lang');?>" class="btn btn-primary btn-danger"  onclick="return <?php if ($user_id=='') { ?>Valid_Inquiry_paid(document.frmsend , 0); <?php } else { ?> Valid_Inquiry_paid(document.frmsend , 1);<?php } ?>"  />
				</div>
			</div>	
		</div>
	</form>
</div>
