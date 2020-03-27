<br />
<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<h2 class="page-header clearfix">
			<?php if (!$editid){
			echo $this->lang->line('lang_enter_country');
		}
		if($editid==1){
			echo $this->lang->line('lang_enter_state');
		}
		if($editid==2){
			echo $this->lang->line('lang_enter_city');
		}
		if($editid==3){
			echo $this->lang->line('lang_enter_location');
		}?>
		 
		</h2>
		<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#demo"><?= $this->lang->line('lang_enter_new');?>
		<?php if(!$editid)
		{
			echo $this->lang->line('lang_country');
		}
		if($editid==1)
		{
			echo $this->lang->line('lang_state');
		}
		if($editid==2)
		{
			echo $this->lang->line('lang_city');
		}?>
		</button>
	</div>
	<div class="panel-body">
		<div class="col-md-12">
			<div class="sct_right">
				<div  id="product_list">
					<div <?php if(validation_errors()==''){?> id="demo" class="collapse"<?php }?>>
						<div class="panel panel-default">
							<div class="panel-heading "> <strong><?= $this->lang->line('lang_enter_new'); 
							if(!$editid)
							{
								echo $this->lang->line('lang_country');
							}
							if($editid==1)
							{
								echo $this->lang->line('lang_state');
							}
							if($editid==2)
							{
								echo $this->lang->line('lang_city');
							}?>
							</strong></div>
							<div class="panel-body">
								<form name="add_location" method="post" action="<?= base_url();?>ShowLocation" enctype="multipart/form-data">
								<div class="row">
									<input type="hidden" name="edit_id"  value="<?=$editid;?>" />
									<input type="hidden" name="cont_name" value="<?=$cont_name;?>" />
									<input type="hidden" name="state_name" value="<?=$state_name;?>" />
									<input type="hidden" name="city_id" value="<?=$city_id;?>" />
									<div class="col-md-4">
										<label>
										<?php if(!$editid)
										{
											echo $this->lang->line('lang_country');
										}
										if($editid==1)
										{
											echo $this->lang->line('lang_state');
										}
										if($editid==2)
										{
											echo $this->lang->line('lang_city');
										}?>
										</label><span id="location_info"></span>
										<input type="text" name="new_location" value="<?= set_value('new_location');?>" class="form-control"/><div style="color: red;"><?= form_error('new_location');?></div>
										<input type="hidden" name="cat_id" value="<?php if(isset($cat_id)){ echo $cat_id;}?>" />
									</div>
                                    <div class="col-md-3">
										<?php if(!$editid)
										{?>
										<label class="manten-th">Search Keyword</label>
										<input type="text" name="search_keyword" value="<?= set_value('search_keyword');?>"  class="form-control"/>
										<div id="flage_info" style="color: red;"><?= form_error('search_keyword');?></div>
										<?php }?>
									</div>

									<div class="col-md-3">
										<?php if(!$editid)
										{?>
										<label class="manten-th"><?= $this->lang->line('lang_flage_image');?></label>
										<input type="file" name="flage" value=""  class="form-control"/>
										<div id="flage_info" style="color: red;"><?= form_error('flage');?></div>
										<?php }?> 
									</div>
                                    
									<div class="col-md-3">
										<label>Country Banner</label>
										<input type="file" name="banner" class="form-control"/>
									</div>
									<div class="col-md-2">										
										<input class="btn btn-primary set-btn btn-block" style="margin-top:24px;margin-bottom: 0;" type="submit" name="submit" value="Add Country"/>
									</div>
									
									<div class="col-md-12"><div id="alert_name"></div></div>									
								</div>
								
														
														
								</form>
								
							</div>
						</div>
					</div>					
					<div class="table_wrapper">
						<div class="table_wrapper_inner"> <img src="images/admin/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="images/admin/bg-th-right.gif" width="7" height="7" alt="" class="right" />
							<div col-md-12>
								<form name="search_form" method="get" action="">
									<div class="col-md-11">
										<div class="row">
											<input type="hidden" name="editid" value="<?= $editid;?>">
											<?php
											if(isset($cont_name))
											{?>

												<input type="hidden" name="cont_name" value="<?= $cont_name;?>">
											<?php }
											if(isset($state_name))
											{?>
												<input type="hidden" name="state_name" value="<?= $state_name;?>">
											<?php }	
											if(isset($city))
											{?>
												<input type="hidden" name="city" value="<?= $city;?>">
											<?php }?>
											<input type="text" name="search_val" placeholder="<?= $this->lang->line('lang_please_enter');?>" class="form-control" onfocus="this.value=''" value="<?= $filter_searching;?>"/>
										</div>
									</div>
									<div class="col-md-1">
										<div class="row">
											<input type="submit" name="Submit" value="<?= $this->lang->line('lang_search');?>" class="btn btn-primary " style=""/>
										</div>
									</div>
									<label>
									<div id='search_val' style="display:inline;"></div>
									</label>
								</form>
							</div>
							<form method="post" action="#" name="showonhome">
							<table width="100%" class="listing table-striped  table-bordered table-responsive"  cellpadding="3" cellspacing="3">
							<thead align="left" >
								<tr>
									<th width="50"><span class="manten-th"><?= $this->lang->line('lang_sr_no');?></span></th>
									<th><span class="manten-th"><?= $this->lang->line('lang_country');?></span></th>
									<?php if($editid=='')
									{?>
									<th width="110"><span class="manten-th"><?= $this->lang->line('lang_flage');?></span></th>
									<?php }?>
									<th><span class="manten-th">Banner</span></th>
									<th ><span class="manten-th"><?= $this->lang->line('lang_state');?></span></th>
									<th><span class="manten-th"><?= $this->lang->line('lang_city');?></span></th>
									
									<th><span class="manten-th"><?= $this->lang->line('lang_action');?></span></th>
									<?php if($editid=='')
									{?>
									<th  title="Active Inactive for Available in Searching"><span class="manten-th"><?= $this->lang->line('lang_available_home_search');?></span></th>
									<?php }?></tr>
							</thead>
							<tbody>
							
							<?php if($showlocation){
								 $i=$num+1;
							foreach($showlocation as $data){?>
							<tr>
								<td><?= $i++;?></td>
								<td> <?php if($editid=='')
								{?>
									<a href="<?= base_url();?>ShowLocation?editid=1&cont_name=<?=$data->country;?>"><?= $data->country;?></a>
							<?php } 
								else{
									echo $data->country;
									}?>
								</td>
								<?php if($editid=='')
								{?>
								<td><img src="<?= base_url();?>images/flageimage/<?= $data->flage;?>" width="50" height="20" /></td>
								<?php } ?>
								<td>
									<img src="<?= base_url();?>images/country_banner/<?php if(isset($data->banner)){ echo $data->banner;}?>" class="img-responsive banner_country" />
								</td>
								<td><?php if($editid=='1')
								{?> <a href="<?= base_url();?>ShowLocation?&editid=2&state_name=<?=$data->state;?>&cont_name=<?=$data->country;?>"><?= $data->state;?></a>
								<?php }
								else{
										if(isset($data->state))
										{
											echo $data->state;
										}
								 }?> </td>
								<td> 
									<?php if($editid=='2'){?> 
									
									<span><?= $data->city;?></span><!-- 
									{$showlocation[data].city}-->
									<?php } else
									{
									// echo $data->city;
									}?>
								<td >
								<?php if($editid==''){?>
								 <a href="<?= base_url();?>EditLocation?cont_name=<?= $data->country;?>&cont_edit=<?= $data->country;?>">
									<button type="button" data-toggle="tooltip" title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button></a>
								<?php }?>
									<?php if($editid=='1')
									{?>
										<!-- -----state edit------- -->
									 <a href="<?= base_url();?>EditLocation?editid=1&cont_name=<?=$data->country;?>&state_edit=<?=$data->state;?>">
									<button type="button" data-toggle="tooltip" title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button></a>
									<?php }?>
									<?php if($editid=='2')
									{?>
										<!-- -----city edit------- -->
										 <a href="<?= base_url();?>EditLocation?editid=2&state_name=<?=$data->state;?>&city_edit=<?=$data->city;?>&cont_name=<?=$data->country;?>">
									<button type="button" data-toggle="tooltip" title="Edit"  class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button></a> 
								<?php }?>
									
									<?php if(!$editid)
									{?><a href="<?=base_url();?>DeleteLocation/country/<?=$data->country;?>" onclick="return confirm('Do You  want to delete ?');"	>
									<button type="button"data-toggle="tooltip" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button></a></td>
								<?php }?>
								<?php if($editid==1)
								{?>
									<a href="<?= base_url();?>DeleteLocation/state/<?= $data->state;?>" onclick="return confirm('Do You  want to delete ?');"	>
								<button type="button"  title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button></a>
								</td>
								<?php }?>
								<?php if($editid==2)
								{?>
									<a href="<?= base_url();?>DeleteLocation/city/<?= $data->id;?>" onclick="return confirm('Do You  want to delete ?');"	>
								<button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button></a>
								</td>
								<?php }?>
								<?php if($editid==''){?>
								<td> <?php if(isset($data->avilable_home_search) && $data->avilable_home_search=='Y')
								{?>
									<a href="<?= base_url();?>LocationApprove/<?= $data->avilable_home_search;?>/<?= $data->country;?>"><img src="<?= base_url();?>images/images/right.png" width="16" height="16" alt="Active" title="Active" /></a>
								<?php }
								else{?>
									<a href="<?= base_url();?>LocationApprove/<?= $data->avilable_home_search;?>/<?= $data->country;?>" ><img src="<?= base_url();?>images/images/cross.png" width="16" height="16" alt="Inactive" title="Inactive" /></a>
								<?php }?></td>
								<?php }?></tr>
								<?php }?>
							<tr>
								<td colspan="8"><center><?= $showPagination;?></center>
								
							</td>
							</tr>
							<?php }
							else { ?>
							<tr>
								<td colspan="4" align="center"><?= $this->lang->line('lang_record_not_found');?></td>
							</tr>
							<?php }?>
							<tbody>
								</table>
								</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
