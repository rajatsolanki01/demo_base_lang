<div class="mob_view_login" style="background:#fafafa; margin-top:-20px;">
	<div class="container">
		<div id="main-body" class="log_img" style="background-image:url(<?php echo base_url()?>templates/images/city_vector.png);background-repeat: no-repeat;background-position: right top;">
			<div class="row">
				<div>&ensp;</div>
				<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div id="main-col" class="col-lg-7 col-md-7 col-sm-6 col-xs-12 hidden-xs">						
					</div>
					<div id="main-col" class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
						<div class="">
							<div class="row">
								<div class="panel panel-default">
									<div class="panel-heading set_heading_h2">
										<h2>Login</h2>
									</div>
									<div class="panel-body">
                                    <?php
                                    if($this->session->flashdata('N'))
                                    {?> 
										<div class="red">
											<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Error:</strong> <?= $this->session->flashdata('N');?>! </div>
										</div>
                                    <?php }?>
                                    <?php
                                    if($this->session->flashdata('unactive'))
                                    {?> 
										<div class="red">
											<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Error:</strong> <?= $this->session->flashdata('unactive');?>! </div>
										</div>
                                    <?php }?>
                                    <?php if($this->session->flashdata('msg')){?>
										<div class="red">
											<div class="alert alert-info"> <strong>
												<?= $this->session->flashdata('msg');?>
												</strong></div>
										</div>
                                    <?php }?>
                                    <?php if(isset($this->session->userdata['succ1'])){?>
										<div class="red">
											<div class="alert alert-info"> <strong>Message:</strong> <?php echo $this->session->userdata['succ1'];?> </div>
										</div>
                                    <?php }?>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">											
											<form enctype="multipart/form-data" method="post" name="login_form" action="<?php echo base_url()?>login.html" class="form-horizontal">
												<div class="form-group">
													<div class="col-sm-12">
														<label for="email">Email Address</label>
														<input type="email" name="user" placeholder="your registered email address" onblur="if(this.value=='') this.value='email'" onfocus="if(this.value=='email') this.value=''" class="form-control" required>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-12">
														<label for="email">Password</label>
														<input type="password" name="pass" placeholder="password"  onblur="if(this.value=='') this.value='password'" onfocus="if(this.value=='password') this.value=''" class="form-control" required>
													</div>
												</div>										
												<br />
												<div class="form-group">
													<div class="col-sm-12">
														<input type="hidden" name="type" class="form-control full" value="WEB" >
														<button class="btn btn-danger full" type="submit" name="submit" >Sign in</button>
														<a href="forgot.html" id="resend_password_link"  class="btn btn-default">Forget password</a> </div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>