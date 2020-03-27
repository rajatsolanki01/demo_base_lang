<br />
<div class="panel panel-default">
	<div class=" panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_customer');?></h2></div>
	<div class="panel-body">
		<div class="col-lg-12">
			<div class="sct_right">
				<div  id="product_list">
					<form name="search_customer" method="get" action="">
						<div class="row">
							<div class="col-md-11">
								<div class="row">
									<input class="form-control" style="margin-left:15px;" placeholder="<?= $this->lang->line('lang_search_cname');?>" type="text" name="search_val" value="<?= $search_val;?>" />
								</div>
							</div>
							<div class="col-md-1">
								<div class="row">
									<input class="btn btn-primary" type="submit" name="submit" value="Search" />
								</div>
							</div>
						</div>
					</form>
					<br />
					<div class="table_wrapper">
						<div class="table_wrapper_inner">
							<table class="table table-responsive table-bordered table-striped">
								<tr>
									<th class="first"><span class="manten-th"><?= $this->lang->line('lang_sr_no');?></span></th>
									<th><span class="manten-th"><?= $this->lang->line('lang_firm_name');?></span></th>
									<th><span class="manten-th"><?= $this->lang->line('lang_email');?></span></th>
									<th><span class="manten-th"><?= $this->lang->line('lang_city');?></span></th>
									<th><span class="manten-th"><?= $this->lang->line('lang_siteurl');?></span></th>
									<th><span class="manten-th"><?= $this->lang->line('lang_date');?></span></th>
									<th style="width:200px;"><span class="manten-th"><?= $this->lang->line('lang_action');?></span></th>
								</tr>
								<?php
								if($customerdata)
								{
									$i=$page+1;
									foreach ($customerdata as $cusVal) 
									{?>
										<tr>
											<td class="first style3"><?= $i++;?></td>
											<td><?= $cusVal->frm_name;?></td>
											<td><?= $cusVal->email;?></td>
											<td><?= $cusVal->city;?></td>
											<td><?= $cusVal->site_url;?></td>
											<td><?= date('d/m/Y',strtotime($cusVal->join_date));?></td>
											<td class="last set_icon_left"> 
												<?php
												if($cusVal->status == 'Y')
												{?>
													<a href="<?= base_url().'StatusCustomer/'.$cusVal->status.'/'.$cusVal->id;?>"><button type="button" data-toggle="tooltip" title="Approve" class="btn btn-success btn-circle"><i class="fa fa-key"></i></button></a> 
												<?php }
												else
												{?> 
													<a href="<?= base_url().'StatusCustomer/'.$cusVal->status.'/'.$cusVal->id;?>"><button type="button" data-toggle="tooltip" title="Unapprove" class="btn btn-default btn-circle"><i class="fa fa-key"></i></button></a> 
												<?php }?>
												<a href="<?= base_url().'EditCustomer/'.$cusVal->id;?>"><button type="button" data-toggle="tooltip" title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button></a> 
												<a href="<?= base_url().'CustomerDetails/'.$cusVal->id;?>"><button type="button" data-toggle="tooltip" title="View" class="btn btn-warning btn-circle"><i class="fa fa-eye"></i> </button></a> 
												<a href="<?= base_url().'DeleteCustomer/'.$cusVal->id;?>" onclick="return confirm('Do You  want to delete ?');"><button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>  </button></a>
												<a type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#myModal_<?= $cusVal->id;?>"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
											</td>
										</tr>
      									<div id="myModal_<?= $cusVal->id;?>" class="modal fade" role="dialog">
      										<div class="modal-dialog widht_set_modal">
												<!-- Modal content-->
								      			<div class="modal-content">
      												<div class="modal-header">
									      				<button type="button" class="close" data-dismiss="modal">&times;</button>
									      				<h4 class="modal-title"><?= $this->lang->line('lang_company_badge');?></h4>
									      			</div>
									      			<?php /*
									      			$badgedata = getbadgedetail($cusVal->id);
									      			if($badgedata)
									      			{
									      				foreach ($badgedata as $badgeValue) 
									      				{?>
									      					<div class="modal-body">
											      				<div class="row">
											      					<div class="col-md-3">
											      						<div class="slect_img">
											      							<h4><?= $this->lang->line('lang_trade_assurance');?></h4>
											      							<img src="<?= base_url();?>admin/images/modal_img/trade_assurance.png" class="" />
											      							<div class="radio_btn_set">
											      								<?php
											      								if($badgeValue->trade_assurance=='Y')
										      									{?>
												      								<label class="switch">
												      									<input type="checkbox" id="trade_assurance" name="trade_assurance" value="N" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'trade_assurance');" checked="checked">
												      									<div class="slider round"></div>
												      								</label>
											      								<?php }
											      								else{?>
												      								<label class="switch">
												      									<input type="checkbox" id="trade_assurance" name="trade_assurance" value="Y" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'trade_assurance');" >
												      									<div class="slider round"></div>
												      								</label>
											      								<?php }?>
											      							</div>
											      						</div>
											      					</div>
											      					<div class="col-md-3">
											      						<div class="slect_img">
											      							<h4><?= $this->lang->line('lang_trust_seal');?></h4>
											      							<img src="<?= base_url();?>admin/images/modal_img/trust_seal.png" class="" />
											      							<div class="radio_btn_set">
											      								<?php
											      								if($badgeValue->trust_seal=='Y')
											      								{?>
												      								<label class="switch">
												      									<input type="checkbox" id="trust_seal" name="trust_seal" value="N" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'trust_seal');" checked="checked">
												      									<div class="slider round"></div>
												      								</label>
											      								<?php }
											      								else{?>
												      								<label class="switch">
												      									<input type="checkbox" id="trust_seal" name="trust_seal" value="Y" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'trust_seal');" >
												      									<div class="slider round"></div>
												      								</label>
											      								<?php }?>
											      							</div>
											      						</div>
											      					</div>
											      					<div class="col-md-3">
											      						<div class="slect_img">
											      							<h4><?= $this->lang->line('lang_assessed_supplier');?></h4>
											      							<img src="<?= base_url();?>admin/images/modal_img/assessed_supplier.png" class="" />
											      							<div class="radio_btn_set">
											      								<?php
											      								if($badgeValue->assessed_supplier=='Y')
										      									{?>
												      								<label class="switch">
												      									<input type="checkbox" id="assessed_supplier" name="assessed_supplier" value="N" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'assessed_supplier');" checked="checked">
												      									<div class="slider round"></div>
												      								</label>
											      								<?php }
											      								else{?>
												      								<label class="switch">
												      									<input type="checkbox" id="assessed_supplier" name="assessed_supplier" value="Y" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'assessed_supplier');" >
												      									<div class="slider round"></div>
												      								</label>
											      								<?php }?>
											      							</div>
											      						</div>
											      					</div>
											      					<div class="col-md-3">
											      						<div class="slect_img">
											      							<h4><?= $this->lang->line('lang_onsite_checked_advance');?></h4>
											      							<img src="<?= base_url();?>admin/images/modal_img/onsite_checked.png" class="" />
											      							<div class="radio_btn_set">
											      								<?php
											      								if($badgeValue->onsite_checked_a=='Y')
										      									{?>
												      								<label class="switch">
												      									<input type="checkbox" id="onsite_checked_a" name="onsite_checked_a" value="N" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'onsite_checked_a');" checked="checked">
												      									<div class="slider round"></div>
												      								</label>
											      								<?php }
											      								else{?>
												      								<label class="switch">
												      									<input type="checkbox" id="onsite_checked_a" name="onsite_checked_a" value="Y" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'onsite_checked_a');" >
												      									<div class="slider round"></div>
												      								</label>
											      								<?php }?>
											      							</div>
											      						</div>
											      					</div>
																	<div class="col-md-3">
																		<div class="slect_img">
																			<h4><?= $this->lang->line('lang_production_verified');?></h4>
																			<img src="<?= base_url();?>admin/images/modal_img/production_varified.png" class="" />
																			<div class="radio_btn_set">
																				<?php
											      								if($badgeValue->production_varified=='Y')
										      									{?>
																					<label class="switch">
																						<input type="checkbox" id="production_varified" name="production_varified" value="N" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'production_varified');" checked="checked">
																						<div class="slider round"></div>
																					</label>
																				<?php }
											      								else{?>
																					<label class="switch">
																						<input type="checkbox" id="production_varified" name="production_varified" value="Y" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'production_varified');" >
																						<div class="slider round"></div>
																					</label>
																				<?php }?>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="slect_img">
																			<h4><?= $this->lang->line('lang_store_favorite');?></h4>
																			<img src="<?= base_url();?>admin/images/modal_img/store_favorite.png" class="" />
																			<div class="radio_btn_set">
																				<?php
											      								if($badgeValue->store_favorite=='Y')
										      									{?>
																					<label class="switch">
																						<input type="checkbox" id="store_favorite" name="store_favorite" value="N" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'store_favorite');" checked="checked">
																						<div class="slider round"></div>
																					</label>
																				<?php }
											      								else{?>
																					<label class="switch">
																						<input type="checkbox" id="store_favorite" name="store_favorite" value="Y" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'store_favorite');" >
																						<div class="slider round"></div>
																					</label>
																				<?php }?>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="slect_img">
																			<h4><?= $this->lang->line('lang_email_verified');?></h4>
																			<img src="<?= base_url();?>admin/images/modal_img/email_verified.png" class="" />
																			<div class="radio_btn_set">
																				<?php
											      								if($badgeValue->email_verified=='Y')
										      									{?>
																					<label class="switch">
																						<input type="checkbox" id="email_verified" name="email_verified" value="N" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'email_verified');" checked="checked">
																						<div class="slider round"></div>
																					</label>
																				<?php }
											      								else{?>
																					<label class="switch">
																						<input type="checkbox" id="email_verified" name="email_verified" value="Y" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'email_verified');" >
																						<div class="slider round"></div>
																					</label>
																				<?php }?>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="slect_img">
																			<h4><?= $this->lang->line('lang_mobile_number_verified');?></h4>
																			<img src="<?= base_url();?>admin/images/modal_img/number_verified.png" class="" />
																			<div class="radio_btn_set">
																				<?php
											      								if($badgeValue->mobile_number_verified=='Y')
										      									{?>
																					<label class="switch">
																						<input type="checkbox" id="mobile_number_verified" name="mobile_number_verified" value="N" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'mobile_number_verified');" checked="checked">
																						<div class="slider round"></div>
																					</label>
																				<?php }
											      								else{?>
																					<label class="switch">
																						<input type="checkbox" id="mobile_number_verified" name="mobile_number_verified" value="Y" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'mobile_number_verified');" >
																						<div class="slider round"></div>
																					</label>
																				<?php }?>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="slect_img">
																			<h4><?= $this->lang->line('lang_category_best');?></h4>
																			<img src="<?= base_url();?>admin/images/modal_img/category_best.png" class="" />
																			<div class="radio_btn_set">
																				<?php
											      								if($badgeValue->category_best=='Y')
										      									{?>
																					<label class="switch">
																						<input type="checkbox" id="category_best" name="category_best" value="N" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'category_best');" checked="checked">
																						<div class="slider round"></div>
																					</label>
																				<?php }
											      								else{?>
																					<label class="switch">
																						<input type="checkbox" id="category_best" name="category_best" value="Y" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'category_best');" >
																						<div class="slider round"></div>
																					</label>
																				<?php }?>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="slect_img">
																			<h4><?= $this->lang->line('lang_secure');?></h4>
																			<img src="<?= base_url();?>admin/images/modal_img/secure.png" class="" />
																			<div class="radio_btn_set">
																				<?php
											      								if($badgeValue->secure=='Y')
										      									{?>
																					<label class="switch">
																						<input type="checkbox" id="secure" name="secure" value="N" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'secure');" checked="checked">
																						<div class="slider round"></div>
																					</label>
																				<?php }
											      								else{?>
																					<label class="switch">
																						<input type="checkbox" id="secure" name="secure" value="Y" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'secure');" >
																						<div class="slider round"></div>
																					</label>
																				<?php }?>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="slect_img">
																			<h4><?= $this->lang->line('lang_secure_transaction');?></h4>
																			<img src="<?= base_url();?>admin/images/modal_img/secure_transaction.png" class="" />
																			<div class="radio_btn_set">
																				<?php
											      								if($badgeValue->secure_transaction=='Y')
										      									{?>
																					<label class="switch">
																						<input type="checkbox" id="secure_transaction" name="secure_transaction" value="N" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'secure_transaction');" checked="checked">
																						<div class="slider round"></div>
																					</label>
																				<?php }
											      								else{?>
																					<label class="switch">
																						<input type="checkbox" id="secure_transaction" name="secure_transaction" value="Y" onchange="getCustomerModel(this.value,<?= $cusVal->id;?>,'secure_transaction');" >
																						<div class="slider round"></div>
																					</label>
																				<?php }?>	
																			</div>
																		</div>
																	</div>
																</div>
															</div>
									      				<?php }
									      			} */?>
      												<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('lang_close');?></button>
													</div>
												</div>
											</div>
										</div>
									<?php }?>
									<tr>
										<td colspan="8"><center><?php echo $showPagination;?></center></td> 
									</tr>
								<?php }
								else{?>
									<td colspan="8"><?= $this->lang->line('lang_record_not_found');?></td>
								<?php }?>
							</table>
						</div>
					</div> 
  				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function getCustomerModel(chk,id,type)
{
	$.ajax({
        type:"POST",
        url:"<?= base_url();?>AJAXCustomerModel",
        data: { 'chk' :chk, 'id':id, 'type':type },
        dataType:"form",
        success:function(data){
            // alert(data);
			if(chk=='Y')
				document.getElementById(type).value='N';	
			else
				document.getElementById(type).value='Y';
        }
    }); // ajax		
}
</script>