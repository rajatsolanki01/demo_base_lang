<div class="waper_my_account">
	<div class="container-fulid">
		<div class="clearfix">
			<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading"> <?php if($this->session->flashdata('Y')){?>
						<div class="notibar msgsuccess">
							<div class="alert alert-success" ><?= $this->session->flashdata('Y'); ?></div>
						</div>
						<?php } ?>
						<div class="sidebar-title"><?= $this->lang->line('194_oth_lang');?></div>
					</div>
					<div class="panel-body">
						<form name="change_password_form" method="post">
							<div class="row">
								<div class="col-md-4 col-xs-12">
									<div class="form-group">
										<label><?= $this->lang->line('259_oth_lang');?> :</label>
										<input type="password" name="old_pass" value="" class="form-control"  />
										<span style="color:#F00;"><?= form_error('old_pass');?></span> </div>
								</div>
								<div class="col-md-4 col-xs-12">
									<div class="form-group">
										<label><?= $this->lang->line('260_oth_lang'
										);?> :</label>
										<input type="password" name="new_pass" value="" class="form-control"   />
										<span style="color:#F00;"><?= form_error('new_pass');?></span> </div>
								</div>
								<div class="col-md-4 col-xs-12">
									<div class="form-group">
										<label><?= $this->lang->line('261_oth_lang');?>  :</label>
										<input type="password" name="con_pass" value="" class="form-control"   />
										<span style="color:#F00;"><?= form_error('con_pass');?></span> </div>
								</div>
								<div class="col-md-12 col-lg-12">
									<input type="submit" name="submit" value="<?= $this->lang->line('1746_oth_lang');?>" class="btn btn-danger" onclick="return Valid_change_pass(document.change_password_form);"/>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
