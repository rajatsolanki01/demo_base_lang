<br />
<div class="panel panel-default">
	<div class=" panel-heading clearfix">
		<h2 class="page-header"><?= $this->lang->line('lang_change_admin_and_password');?></h2>
	</div>
	<div class="panel-body">
		<div class="sct_right">
			<?php 
			if($this->session->flashdata('ChangePassMsg'))
			{?>
				<div class="col-md-12">
					<div class="alert alert-success" role="alert"> <?= $this->session->flashdata('ChangePassMsg');?> </div>
				</div>
			<?php }?>
			<div  id="product_list">
				<div class="table_wrapper">
					<div class="table_wrapper_inner ">
						<table class="listing form table-responsive table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0" border="" width="100%">
							<form name="change_password" action="" method="post" >
								<tr>
									<td class="first" width="150"><strong><?= $this->lang->line('lang_username');?></strong></td>
									<td class="last"><input type="text" class="text form-control" value="<?= $this->session->userdata('adminName');?>" name="username" />
										<span class="star"></span></td>
										<td width="205"><div class="star" id="alert_username"><?= form_error('username');?></div></td>
									</tr>
									<tr class="bg">
										<td class="first"><strong><?= $this->lang->line('lang_current_password');?></strong></td>
										<td class="last"><input type="password" class="text form-control" name="cur_password" />
											<span class="star"></span></td>
											<td><div class="star" id="alert_cur_password"><?= form_error('cur_password');?></div></td>
										</tr>
										<tr class="bg">
											<td class="first"><strong><?= $this->lang->line('lang_password');?></strong></td>
											<td class="last"><input type="password" class="text form-control" name="password" />
												<span class="star"></span></td>
												<td><div class="star" id="alert_password"><?= form_error('password');?></div></td>
											</tr>
											<tr>
												<td class="first"><strong><?= $this->lang->line('lang_retype_password');?></strong></td>
												<td class="last"><input type="password" class="text form-control" name="ret_password" /></td>
												<td><div class="star" id="alert_ret_password"><?= form_error('ret_password');?></div></td>
											</tr>
											</table>
											<br />
											<div class="row">
												<div class="buttons"> <span class="button send_form_btn"><span></span>&ensp;&ensp;
													<input name="btn_changepassword" class="btn btn-primary" type="submit" value="Submit" onclick="return Valid_admin_info(document.change_password);"/>
												</span> </div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
