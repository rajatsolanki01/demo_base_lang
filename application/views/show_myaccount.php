<?php
$sub_domain_data1 = get_seller_detail($this->session->userdata['user_id']);
if(!isset($status)){?>
	<div class="waper_my_account">
		<div class="container-fulid">
			<div class="clearfix">
				<div class="col-md-3">
					<div <?php if($this->session->userdata['user_type'] =='SP'){?> class="user-heading service_background" <?php }else{?>  class="user-heading" <?php }?>>
						<a href="#"> 
		                    <?php 
		                    	$user_photo = user_detail($this->session->userdata['user_id'],'user_photo');
		                    	$imgPath = '';
		                    	if($user_photo != '')
		                    	{
		                    		$fpath = "images/user_photo/".$user_photo;
              						if (file_exists($fpath)){
              							$imgPath = "images/user_photo/".$user_photo;
              						}
		                    	}
		                    	
		                     if($user_photo =='' || $imgPath ==''){?>
		                    	<img src="<?php echo base_url()?>images/notimg.png" class="img-responsive" />
		                    <?php }else{?> 
		                    	<img src="<?php echo base_url().$imgPath;?>" class="img-responsive" /> 
		                    <?php }?>
	                    </a>
	                     
						<h1 class="text-capitalize">Hi 
							<?php echo user_detail($this->session->userdata['user_id'],'name');?></h1>
						<p><i class="fa fa-envelope" aria-hidden="true"></i> 
							<?php echo user_detail($this->session->userdata['user_id'],'email');?></p>
						<p><i class="fa fa-mobile" aria-hidden="true"></i> 
							<?php echo user_detail($this->session->userdata['user_id'],'mobile_no');?></p>
						<a href="<?php echo base_url()?>edit_personal_profile.html" class="update">Update Profile</a>
					</div>
					
					<div class="profile-block">
						<ul class="nav nav-pills nav-stacked">
							<li class="active">
								<?php $userCityId = user_detail($this->session->userdata['user_id'],'city');?>
								<a><i class="fa fa-location-arrow" aria-hidden="true"></i> <strong>City & State</strong>
									<br />
									<?php echo hGetCountryFieldById('city',$userCityId).','.hGetCountryFieldById('state',$userCityId);?>
								</a>
							</li>
							<li class="active">
								<a><i class="fa fa-map-marker" aria-hidden="true"></i> <strong>Country</strong><br />
									<?php echo hGetCountryFieldById('country',$userCityId);?>
								</a>
							</li>
							<li class="active">
								<a><i class="fa fa-globe" aria-hidden="true"></i> <strong>Designation</strong> <br />
									<?php echo user_detail($this->session->userdata['user_id'],'detail');?>
								</a>
							</li>						
						</ul>
					</div>
					<br />
					
				</div>
				<div  class="col-lg-9 col-md-9 col-sm-9 col-xs-12 padd_web_left">
					<div class="new_panel">
						<div class="panel_heading"> New State </div>
						<div class="panel_body">
							<div class="row"> 
								<div class="col-md-4">
									<div class="small-box bg-four">
										<div class="row">
											<div class="col-md-7">
												<div class="mid-info">
													<h3><?php 
														if($emailcount->count > 0)
															echo $emailcount->count;
														else
															echo '0';
														?>
													</h3>
													<p>Total Inquiry</p>
												</div>
											</div>
											<div class="col-md-5">
												<div class="icon"> <i class="fa fa-gavel fa-3x"></i> </div>
											</div>
										</div>
										<a href="<?php echo base_url()?>email_account.html" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a> 
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="new_panel">
						<div class="panel_heading">Company Usefull Links</div>
						<div class="panel_body">
							<div class="clearfix box_card">
								
								<div class="col-md-4 form-group"> <a href="<?php echo base_url()?>view_personal_profile.html">
									<div class="card_set">
										<div class="clearfix">
											<div class="col-md-4"> <img src="<?php echo base_url()?>images/myaccount/sign.png" class="img-responsive" /> </div>
											<div class="col-md-8">
												<h4> Personal Profile</h4>
												<p>Edit name, email, mobile number etc</p>
											</div>
										</div>
									</div>
									</a>
								</div>
<!-- 								<div class="col-md-4 form-group"> <a href="<?php echo base_url()?>view_company_profile.html">
									<div class="card_set">
										<div class="clearfix">
											<div class="col-md-4"> <img src="<?php echo base_url()?>images/myaccount/order.png" class="img-responsive" /> </div>
											<div class="col-md-8">
												<h4>View Company Profile</h4>
												<p>See all information about company profile.</p>
											</div>
										</div>
									</div>
									</a>
								</div> -->
							</div>
						</div>
					</div>
					<div class="new_panel">
						<div class="panel_heading">Company Information</div>
						<div class="panel_body">
							<?php 
								$service_query_data = getProductCompanyDetail($this->session->userdata['user_id']);
								// print_r($service_query_data);exit();
							?>
							<div class="clearfix profile1">
								<div class="col-xs-12 col-md-9">
									<h2 style="text-transform:capitalize;">
										<?php echo $service_query_data->name;?>
									</h2>
									<p> <strong>Nature of Business : </strong> 
										<?php
										if($this->session->userdata['user_type'] == 'B')
											echo 'Buyer';
	                                	?>
	                                </p>
	                                <?php /*
									<p><strong>Description :</strong> <?php echo $service_query_data->own_type;?></p>
									<p><strong>Registered in : </strong> <?php echo $service_query_data->reg_yrs;?> </p>
									<p style="margin-bottom: 0;"><strong>Employees : </strong> <?php echo $service_query_data->emp_det;?> </p>
									<p><strong style="line-height: 36px;">Business Type 22 : </strong><?php $business_cat= client_category_new($this->session->userdata['cust_id']);
										echo character_limiter($business_cat, 350);
									?>
									</p>*/?>
								</div>
								<div class="col-xs-12 col-md-3 text-center">
									<figure><?php 
										if($service_query_data->user_photo == ''){?>
											<img src="<?php echo base_url()?>images/product_images/imgnotfound.jpg" class="img-responsive img-thumbnail"> 
										<?php }
										else {?>
											<img src="<?php echo base_url()?>images/user_photo/<?php echo $service_query_data->user_photo ?>" alt="" class="img-responsive img-thumbnail">
										<?php }?> 
									</figure>
								</div>
							</div>
					 	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }
else{?>
<div class="waper_my_account">
	<div class="container-fulid">
		<div class="clearfix">
			<div class="col-md-3">
				<div class="user-heading">
					<a href="#"> 
                    <?php $userDetail = user_detail($this->session->userdata['user_id'],'user_photo');
                    	$user_photo = $userDetail->user_photo;
                    if($user_photo ==''){?>
                    	<img src="<?php echo base_url()?>images/notimg.png" class="img-responsive" />
                     <?php }
                     else{?>
                    	<img src="<?php echo base_url().'images/user_photo/'.$user_photo;?>" class="img-responsive" /> 
                    <?php }?>
                    
                     </a>
					<h1><?php echo $this->session->userdata['u_name'];?></h1>
					<p>
						<?php echo user_detail($this->session->userdata['user_id'],'user_name')->user_name;?>
					</p>
					<p>
						<?php echo user_detail($this->session->userdata['user_id'],'mobile_no')->mobile_no;?>
					</p>
					<a href="<?php echo base_url()?>edit_personal_profile.html" class="update">Update Profile</a>
				</div>
				
				<div class="profile-block">
					<ul class="nav nav-pills nav-stacked">
						<!--<li class="active"><a><i class="fa fa-user"></i> {$functions->user_detail($smarty.session.user_id,address)}</a></li>-->
						<li class="active"><a><i class="fa fa-location-arrow" aria-hidden="true"></i> <strong>City & State</strong>
							<br /> 
							<?php echo user_detail($this->session->userdata['user_id'],'city')->city.','.user_detail($this->session->userdata['user_id'],'state')->state;?>
						</a></li>
						<li class="active"><a><i class="fa fa-map-marker" aria-hidden="true"></i> <strong>Country</strong><br />
							<?php echo user_detail($this->session->userdata['user_id'],'country')->country;?></a></li>
						<li class="active"><a><i class="fa fa-globe" aria-hidden="true"></i> <strong>Designation</strong> <br />
							<?php echo user_detail($this->session->userdata['user_id'],'designation')->designation;?></a></li>						
					</ul>
				</div>
				<br />
				
				
				<?php 
				if($sub_domain_data1->buyer == 'N'){?>
				<div class="new_panel">
					<div class="panel_heading"> Active Social Media </div>
					<div class="panel_body"> 
						<?php $social_detail = get_subdomain_video($this->session->userdata['cust_id']);
						?>
						<div class="social_media">
							<?php 
                            if($social_detail->whatsapp_onoff=='Y'){?>
                             	<a href="http://www.whatsapp.com/<?php echo $social_detail->whatsapp_info ?>" class="whats_app">
                         		<img src="<?php echo base_url();?>templates\micro\new_responcive_css\img\whatsapp.png"  /></a> 
                     		<?php }
                            if($social_detail->skype_onoff=='Y'){?>
								<a href="http://www.skype.com/<?php echo $social_detail->skype_info ?>" class="skype_info"><img src="<?php echo base_url();?>templates\micro\new_responcive_css\img\skype.png"  /></a>
							<?php }
							if($social_detail->imo_onoff=='Y'){?>
								<a href="http://www.imo.com/<?php echo $social_detail->imo_info ?>" class="imo"><img src="<?php echo base_url();?>templates\micro\new_responcive_css\img\imo.png"  /></a>
							<?php }
							if($social_detail->wechat_onoff=='Y'){?>
								<a href="http://www.wechat.com/<?php echo $social_detail->wechat_info ?>" class="wechat"><img src="<?php echo base_url();?>templates\micro\new_responcive_css\img\wechat.png"  /></a>
							<?php }
							if($social_detail->google_onoff=='Y'){?>
								<a href="http://www.google.com/<?php echo $social_detail->google_info ?>" class="google_info"><img src="<?php echo base_url();?>templates\micro\new_responcive_css\img\google.png"  /></a> 
							<?php }
							if($social_detail->youtube_onoff=='Y'){?>
								<a href="http://www.youtube.com/<?php echo $social_detail->youtube_info ?>" class="youtube"><img src="<?php echo base_url();?>templates\micro\new_responcive_css\img\youtube.png"  /></a>
							<?php }
							if($social_detail->blackberry_onoff=='Y'){?>
								<a href="http://www.blackberry.com/<?php echo $social_detail->blackberry_info ?>" class="blackberry"><img src="<?php echo base_url();?>templates\micro\new_responcive_css\img\bbm.png"  /></a> 
							<?php }
							if($social_detail->facebook_onoff=='Y'){?>
								<a href="http://www.facebook.com/<?php echo $social_detail->facebook_info ?>" class="facebook"><img src="<?php echo base_url();?>templates\micro\new_responcive_css\img\facebook.png"  /></a> 
							<?php }
							if($social_detail->twitter_onoff=='Y'){?>
								<a href="http://www.twitter.com/<?php echo $social_detail->twitter_info?>" class="skype_info"><img src="<?php echo base_url();?>templates\micro\new_responcive_css\img\twitter.png"  /></a>
							<?php }
							if($social_detail->whatsapp_onoff=='N' || $social_detail->skype_onoff=='N' || $social_detail->imo_onoff=='N' || $social_detail->wechat_onoff=='N' || $social_detail->twitter_onoff=='N' ||  $social_detail->google_onoff=='N' || $social_detail->youtube_onoff=='N' || $social_detail->blackberry_onoff=='N' || $social_detail->facebook_onoff=='N'){?>
							<div class="alert alert-danger">No Social Media Active</div>
							<?php }?>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
			<div  class="col-lg-9 col-md-9 col-sm-9 col-xs-12 padd_web_left">
				<div class="new_panel">
					<div class="panel_heading"> New State </div>
					<div class="panel_body">
						<div class="row"> <?php
							if($sub_domain_data1->buyer=='N'){?> 
							<div class="col-md-4">
								<div class="small-box bg-six">
									<div class="row">
										<div class="col-md-7">
											<div class="mid-info">
												<h3>
													<?php 
														if($unappprocount->count >0)
															echo $unappprocount->count;
														else
															echo '0';
														?></h3>
												<p>All Product</p>
											</div>
										</div>
										<div class="col-md-5">
											<div class="icon"> <i class="fa fa-archive fa-3x"></i> </div>
										</div>
									</div>
									<a href="<?php echo base_url()?>my_product.html" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a> </div>
							</div>
							<?php }?>
							<div class="col-md-4">
								<div class="small-box bg-four">
									<div class="row">
										<div class="col-md-7">
											<div class="mid-info">
												<h3>
													<?php 
														if($emailcount->count >0)
															echo $emailcount->count;
														else
															echo '0';
														?></h3>
												<p>Total Inquiry</p>
											</div>
										</div>
										<div class="col-md-5">
											<div class="icon"> <i class="fa fa-gavel fa-3x"></i> </div>
										</div>
									</div>
									<a href="<?php echo base_url()?>email_account.html" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a> </div>
							</div>
							<div class="col-md-4">
								<div class="small-box bg-aqua">
									<div class="row">
										<div class="col-md-7">
											<div class="mid-info">
												<h3>
													<?php 
														if($leadsellcount->count >0)
															echo $leadsellcount->count;
														else
															echo '0';
														?></h3>
												<p>Sell trade leads</p>
											</div>
										</div>
										<div class="col-md-5">
											<div class="icon"> <i class="fa fa-paper-plane-o fa-3x"></i> </div>
										</div>
									</div>
									<a href="<?php echo base_url()?>trade_lead-sell.html" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a> </div>
							</div>
							<div class="col-md-4">
								<div class="small-box bg-green">
									<div class="row">
										<div class="col-md-7">
											<div class="mid-info">
												<h3>
													<?php 
														if($leadbuycount->count >0)
															echo $leadbuycount->count;
														else
															echo '0';
													?>
													<sup style="font-size: 20px"></sup></h3>
												<p>Buy trade leads</p>
											</div>
										</div>
										<div class="col-md-5">
											<div class="icon"> <i class="fa fa-filter fa-3x"></i> </div>
										</div>
									</div>
									<a href="<?php echo base_url()?>trade_lead-buy.html" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a> </div>
							</div>
							<div class="col-md-4">
								<div class="small-box bg-red">
									<div class="row">
										<div class="col-md-7">
											<div class="mid-info">
												<h3>
													<?php 
														if($rfqcount->count >0)
															echo $rfqcount->count;
														else
															echo '0';
													?></h3>
												<p>Total RFQ</p>
											</div>
										</div>
										<div class="col-md-5">
											<div class="icon"> <i class="fa fa-exchange fa-3x"></i> </div>
										</div>
									</div>
									<a href="<?php echo base_url()?>buyer-requirement-list.html" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a> </div>
							</div>
							<?php /*remove
							<div class="col-md-4">
								<div class="small-box bg-five">
									<div class="row">
										<div class="col-md-7">
											<div class="mid-info">
												<h3>
													<?php 
														if($classifiedcount->count >0)
															echo $classifiedcount->count;
														else
															echo '0';
													?></h3>
												<p>Classifieds</p>
											</div>
										</div>
										<div class="col-md-5">
											<div class="icon"> <i class="fa fa-bullhorn fa-3x"></i> </div>
										</div>
									</div>
									<a href="<?php echo base_url()?>index.php?page=classifieds&action=all_classified" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a> </div>
							</div>*/?>
						</div>
					</div>
				</div>
				<div class="new_panel">
					<div class="panel_heading">Company Usefull Links11</div>
					<div class="panel_body">
						<div class="clearfix box_card">
							
							<div class="col-md-4 form-group"> <a href="<?php echo base_url()?>view_personal_profile.html">
								<div class="card_set">
									<div class="clearfix">
										<div class="col-md-4"> <img src="<?php echo base_url()?>images/myaccount/sign.png" class="img-responsive" /> </div>
										<div class="col-md-8">
											<h4>Personal Profile</h4>
											<p>Edit name, email, mobile number etc</p>
										</div>
									</div>
								</div>
								</a>
							</div>
							<div class="col-md-4 form-group"> <a href="<?php echo base_url()?>view_company_profile.html">
								<div class="card_set">
									<div class="clearfix">
										<div class="col-md-4"> <img src="<?php echo base_url()?>images/myaccount/order.png" class="img-responsive" /> </div>
										<div class="col-md-8">
											<h4>View Company Profile</h4>
											<p>See all information about company profile.</p>
										</div>
									</div>
								</div>
								</a>
							</div>
								
							
							<div class="col-md-4 form-group"> <a href="<?php echo base_url()?>buyer-requirement-list.html">
								<div class="card_set">
									<div class="clearfix">
										<div class="col-md-4"> <img src="<?php echo base_url()?>images/myaccount/address.png" class="img-responsive" /> </div>
										<div class="col-md-8">
											<h4>My Posted RFQ</h4>
											<p>Show all RFQ and manage this</p>
										</div>
									</div>
								</div>
								</a> 
							</div>
							<?php
							if($sub_domain_data1->buyer == 'N'){?> 
                                <div class="col-md-4 form-group"> <a href="<?php echo base_url()?>trade_lead.html">
									<div class="card_set">
										<div class="clearfix">
											<div class="col-md-4"> <img src="<?php echo base_url()?>images/myaccount/prime.png" class="img-responsive" /> </div>
											<div class="col-md-8">
												<h4>Trade Leads</h4>
												<p>View all sell and buy product's.</p>
											</div>
										</div>
									</div></a> 
								</div>
								<?php
								if($this->session->userdata['user_type'] == 'C'){?>
									<div class="col-md-4 form-group"> <a href="<?php echo base_url()?>my_product.html">
										<div class="card_set">
											<div class="clearfix">
												<div class="col-md-4"> <img src="<?php echo base_url()?>images/myaccount/payments.png" class="img-responsive" /> </div>
												<div class="col-md-8">
													<h4>My Products</h4>
													<p>Show your all product's.. </p>
												</div>
											</div>
										</div>
										</a> 
									</div>
	                            <?php }
                        		if($this->session->userdata['user_type'] == 'SP'){?>
									<div class="col-md-4 form-group"> <a href="<?php echo base_url()?>my_service.html">
										<div class="card_set">
											<div class="clearfix">
												<div class="col-md-4"> <img src="<?php echo base_url()?>images/myaccount/payments.png" class="img-responsive" /> </div>
												<div class="col-md-8">
													<h4>My Services</h4>
													<p>Show Your All Services . </p>
												</div>
											</div>
										</div>
										</a> 
									</div>
                                <?php }?>
                                
                                
								<div class="col-md-4 form-group"> <a href="<?php echo base_url()?>micro_design.html">
									<div class="card_set">
										<div class="clearfix">
											<div class="col-md-4"> <img src="<?php echo base_url()?>images/myaccount/amazon.png" class="img-responsive" /> </div>
											<div class="col-md-8">
												<h4>Micro Design</h4>
												<p>Set your micro design.</p>
											</div>
										</div>
									</div>
									</a> 
								</div>
                                
                            <?php }?>
						</div>
						<?php /*
						{*{if $smarty.session.fre_exp_id=='' }
						<div class="clearfix box_card"> 
							<!--<div class="col-md-3 form-group">
								<a href="<?php echo base_url()?>view_personal_profile.html">
									<div class="card_set">
										<div class="clearfix">
											<div class="col-md-3">
												<span><i class="fa fa-user"></i></span>
											</div>
											<div class="col-md-9">
												<p>{$lang_personal_profile}</p>
											</div>
										</div>
									</div>
								</a>
							</div>
							
							<div class="col-md-3 form-group">
								<a href="<?php echo base_url()?>email_account.html">
									<div class="card_set">
										<div class="clearfix">
											<div class="col-md-3">
												<span><i class="fa fa-envelope"></i></span>
											</div>
											<div class="col-md-9">
												<p>{$lang_mail_status}</p>
											</div>
										</div>
									</div>
								</a>
							</div>
							
							<div class="col-md-3  form-group">
								<a href="<?php echo base_url()?>view_company_profile.html">
									<div class="card_set">
										<div class="clearfix">
											<div class="col-md-3">
												<span><i class="fa fa-building-o"></i></span>
											</div>
											<div class="col-md-9">
												<p>{$lang_company_profile}</p>
											</div>
										</div>
									</div>
								</a>
							</div>
							
							<div class="col-md-3 form-group">
								<a href="<?php echo base_url()?>change_password.html">
									<div class="card_set">
										<div class="clearfix">
											<div class="col-md-3">
												<span><i class="fa fa-key"></i></span>
											</div>
											<div class="col-md-9">
												<p>{$lang_change_password}</p>
											</div>
										</div>
									</div>
								</a>
							</div>--> 
						</div>
						{/if}*} */?>
					 </div>
				</div>
				<?php
				if($this->session->userdata['cust_id'] != 0){?>
					<div class="new_panel">
						<div class="panel_heading">Company information </div>
						<div class="panel_body"> 
							<?php  $service_query_data = getProductCompanyDetail($this->session->userdata['cust_id']);?>
							<div class="clearfix profile1">
								<div class="col-xs-12 col-md-9">
									<h2 style="text-transform:capitalize;"><?php echo $service_query_data->frm_name;?></h2>
									<p> <strong>Nature of Business : </strong> 
										<?php
												if($sub_domain_data1->buyer=='N')
													echo 'Seller';
												else
													echo 'Buyers 111';
										?>
									</p>
									<p><strong>Ownership Type :</strong><?php echo $service_query_data->own_type;?></p>
									<p><strong>Registered in : </strong> <?php echo $service_query_data->reg_yrs;?> </p>
									<p><strong>Employees: </strong>  <?php echo $service_query_data->emp_det;?> </p>
									<p><strong>Business Type : </strong>
										<?php $business_cat= client_category_new($this->session->userdata['cust_id']);
												echo character_limiter($business_cat, 350);
											?></p>
								</div>
								<div class="col-xs-12 col-md-3 text-center">
									<figure><?php 
										if($service_query_data->logo == ''){?> 
											<img src="<?php echo base_url()?>images/product_images/imgnotfound.jpg" class="img-responsive img-thumbnail">
										<?php }
										else {?>
											<img src="<?php echo base_url()?>images/user_logo/<?php echo $service_query_data->logo ?>" alt="" class="img-responsive img-thumbnail">
										<?php }?>
									 </figure>
								</div>
							</div>
							 </div>
					</div>
				<?php }
				if($sub_domain_data1->buyer=='N'){?> 
					<div class="new_panel">
						<div class="panel_heading">Company Information</div>
						<div class="panel_body">
							<table class="table table-bordered margin_botton_my">
								<tbody>
									<tr class="techSpecRow">
										<td class="techSpecTD1">Your Member Package Name:</td>
										<td class="techSpecTD bold"><?php echo $package;?></td>
									</tr>
								<?php 
								if($package!='Basic'){?>
									<tr class="techSpecRow">
										<td class="techSpecTD1">Member Package Expire Date:</td>
										<td class="techSpecTD bold">
											<?php echo date("d-m-Y", strtotime($pack_end_date));?></td>
									</tr>
									<tr class="techSpecRow">
										<td class="techSpecTD1">Member Package Days in Remaining:</td>
										<td class="techSpecTD2 bold"><?php echo $rem_days?>&nbsp;Days</td>
									</tr>
								<?php }?>
								<tr class="techSpecRow"><?php

									if($this->session->userdata['fre_exp_id'] !='' ){?>
										<td class="techSpecTD1 "><h3>Your Member Package is Expire so Please Upgrade Your Package</h3></td>
									<?php }

									if($this->session->userdata['pack_type'] !='A_S' ){?>
										<td class="techSpecTD1 " align="center"  ><a class="btn btn-danger btn-large pull-right" href="<?php echo base_url().'package_upgrade-'.$this->session->userdata['pack_type']?>">Upgrade Your Plan</a>&nbsp;
									<?php }
										if($this->session->userdata['pack_type']=='A_G' && $rem_days<=5){?>
										<a class="btn btn-danger btn-large pull-right" href="<?php echo base_url()?>upgrade_package-2.html"> Renew Your Plan</a>
									<?php }	
										if($this->session->userdata['pack_type']=='A_S' && $rem_days<=5){?>
										<a class="btn btn-danger btn-large pull-right" href="<?php echo base_url()?>upgrade_package-3.html"> Renew Your Plan</a>
									<?php }	
										if($this->session->userdata['pack_type']=='A_P' && $rem_days<=5){?>
										<a class="btn btn-danger btn-large pull-right" href="<?php echo base_url()?>upgrade_package-4.html"> Renew Your Plan</a>
									<?php }?>	
									 </td>
								</tr>
								</tbody>
								
							</table>
						</div>
					</div>
                <?php }?>



               <?php
	                if($sub_domain_data1->buyer=='N'){?>
					<div class="new_panel">
						<div class="panel_heading">Top 5 Most Visited Products</div>
						<div class="panel_body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover margin_botton_my table_font">
									<tbody>
										<tr>
											<th style="width:55px;">S.N.</th>
											<th>Product Image</th>
											<th>Product Name</th>
											<th>Product Short Description</th>
											<th>MOQ</th>
											<th>Publish Date</th>
											<th>Price (<i class="fa fa-usd"></i>)</th>
										</tr>
									<?php
									// print_r($products_data);exit();
									if(isset($products_data)){
										$i = 1;
						                foreach($products_data->result() as $row)
						                {?><?php
											$pro_img = show_img($row->pro_id); ?>
										<tr>
											<td><?php echo $i;?></td>
											<th> <div class="pro_img"> 
												<img src="<?php echo base_url().'images/product_images/450X450/'.$pro_img;?>"> </div>
											</th>
											<td><?php echo character_limiter($row->pro_name, 30);?></td>
											<td><?php echo character_limiter($row->pro_short_desc, 30);?></td>
											<td><?php echo $row->quantity; ?></td>
											<td><?php echo $row->entry_date; ?> </td>
											<td><?php 
												echo $x= $row->price;

											?>
											 <!-- {math equation='x*y' x= $products_data[data].price y=$C_MULTY format="%.2f"} --></td>
										</tr>

									<?php  $i++; }
									}
									else{?>
										<tr>
											<td colspan="7"class="alert alert-danger text-center">Record Not Found</td>
										</tr>
									<?php }?>
									</tbody>
									
								</table>
							</div>
						</div>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>

<div style="display: block; padding-right: 19px;    background: rgba(0, 0, 0, 0.65);" class="modal fade in" role="dialog">
  <div class="modal-dialog">	
		<div class="modal-content">     
			<div class="modal-body">
        
        <h2>Welcome <?php echo $this->session->userdata['u_name'];?></h2>
        <p>Your company profile is still incomplete. Please check the status below and complete it.</p>
        <?php if($status=='20'){?>
            <div class="progress progess_height">
				<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">20%</div>
            </div>
        <?php }
        if($status=='40'){?>	      
            <div class="progress progess_height">
				<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">40%</div>
            </div>
        <?php }
        if($status=='60'){?>	     
        	<div class="progress progess_height">
				<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">60%</div>
            </div>
        <?php }
        if($status=='80'){?>	   
            <div class="progress progess_height">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">80%</div>
            </div>
        <?php }
        if($status=='100'){?>	   
            <div class="progress progess_height">
				<div class="progress-bar progress-bar-striped progress-bar-success active " role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">100%</div>
            </div>
        <?php }?> 
                    
                    
                    
				
				<div class="clearfix text-center">
					<h4><strong>Welcome Member!</strong></h4>
					<p>To have more busines and reach you should fill your company profile completely.</p>
				</div>
				<div>&ensp;</div>
				<div class="row">
                <?php 
                if($status=='20'){
                	if($ac_data[0]->next_cat_id==''){?>
	                	<div class="col-md-6">
							<a  href="<?php echo base_url()?>edit_company_profile.html" class="btn btn-info form-control"><strong>Yes! Proceed with company profile</strong></a>
						</div>
		            <?php }
		            else{?>
		            	<div class="col-md-6">
							<a  href="<?php echo base_url()?>trade_productions.html" class="btn btn-info form-control"><strong>Yes! Proceed with company profile</strong></a>
						</div>					
	                <?php }
	            } 
                if($status=='40'){?>	
					<div class="col-md-6">
						<a  href="<?php echo base_url()?>information_policies-.html" class="btn btn-info form-control"><strong>Yes! Proceed with company profile</strong></a>
					</div>
                <?php } 
                if($status=='60'){?>	 
                    <div class="col-md-6">
						<a  href="<?php echo base_url()?>myaccount_gallery.html" class="btn btn-info form-control"><strong>Yes! Proceed with company profile</strong></a>
					</div>
                <?php }
                if($status=='80'){?>	 
                    <div class="col-md-6">
						<a  href="<?php echo base_url()?>certification_achieved.html" class="btn btn-info form-control"><strong>Yes! Proceed with company profile</strong></a>
					</div>
                <?php }?> 
                  
					<div class="col-md-6">
						<a href="<?php echo base_url()?>show_myaccount.html" class="btn btn-default form-control" data-dismiss="modal"><strong>No Thanks! Go To MyAccount</strong></a>
					</div>
				</div>
				
			</div>      
		</div>	
	</div>
</div>
<?php }?>