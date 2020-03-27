<?php
    if (!isset($cat_id))$cat_id=0;
    if (!isset($sub_cat_id))$sub_cat_id=0;
    if (!isset($search_val))$search_val="";
?>
<br />
<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<div class="row">
			<div class="col-md-6">
				<h2 class="page-header"><?= $this->lang->line('lang_suppliers_products_category');?></h2>
			</div>
			<div class="col-md-6"> 
				<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#demo"><?php if ($cat_id=='0' && $sub_cat_id=='0'){?><?= $this->lang->line('lang_add_category');?><?php }?><?php if ($cat_id!='0' &&  $sub_cat_id=='0'){?><?= $this->lang->line('lang_add_sub_category');?><?php }?><?php if  ($sub_cat_id!='0'){?>Add Next Sub Category<?php }?> </button>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<?php 
		if($this->session->flashdata('CategoriesMsg'))
		{?>
			<div class="col-md-12">
				<div class="alert alert-success" role="alert"> <?= $this->session->flashdata('CategoriesMsg');?> </div>
			</div>
		<?php }?>
		<div class="">
			<div class="sct_right">
				<div  id="product_list">
					<div id="demo" <?php if ($this->session->flashdata('imageUploadingError')=='' && !form_error('name')){?> class="collapse" <?php }?>>
						<div class="panel panel-default">
							<div class="panel-heading"><?= $this->lang->line('lang_add');?> <?= $this->lang->line('lang_category');?></div>
							<div class="panel-body">
								<div class="table_wrapper">
									<div class="table_wrapper_inner">
										<form name="add_categories" method="post" action=""  enctype="multipart/form-data">
											<div class="row"> <!-- {$functions->get_cat_type($cat_id)} -->
												<?php if ($cat_type=="sell" || $cat_type=="buy" ||  $cat_type==""){?> <span class="manten-th"></span> <?php }?>
												<input  type="hidden" name="cat_id" value="<?php echo $cat_id;?>" />
												<input  type="hidden" name="sub_cat_id" value="<?php echo $sub_cat_id;?>" />
												<div class="col-md-3 margin_bottom">
													<input class="form-control"  placeholder="Name of New Category" type="text" name="name" value="" required/>
													<span style="color:#F00;"><?= form_error('name');?></span>
												</div>
												<div class="col-md-2 margin_bottom">
													<input type="text" class="form-control" placeholder="Enter Meta Description" name="meta_desc" value="" required />
												</div>
												<div class="col-md-2 margin_bottom">
													<input type="text" class="form-control" placeholder="Enter Meta Keywords" name="meta_keywords" value="" required />
												</div>
												<div class="col-md-2 margin_bottom"> 
													<?php	
													if($cat_id=='' &&  $sub_cat_id=='')
													{?>
														<input type="radio" name="cat_type" value="sell" 
														<?= ($cat_type=='sell')? 'checked="checked"' : '';?>   />
														<?= $this->lang->line('lang_seller');?>
														<?php 
														if($gServiceNoOff=='YES')
														{?>
															<input type="radio" name="cat_type" value="service"  {if $data1[0].cat_type=='service'} checked="checked" {/if}   />
														<?= $this->lang->line('lang_service');?>
													<?php }?>
														<input type="hidden" name="sub_cat_id" value="<?= $sub_cat_id;?>" />
													<?php }
													else{?>
														<input type="hidden" name="cat_type" value="<?= $cat_type;?>" />
														<input type="hidden" name="sub_cat_id" value="<?= $sub_cat_id;?>" />
													<?php }?>
												</div>
												<div class="col-md-2 margin_bottom"> <strong><?= $this->lang->line('lang_category_image');?></strong>
													<input type="file" name="cat_img" size="30"  class="form-control" value=""/>
													<span style="color:#F00;"><?= $this->session->flashdata('imageUploadingError');?></span>
												</div>
												<div class="col-md-1 margin_bottom">
													<input type="submit" class="btn btn-primary" name="submit" value="Add" />
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div>&ensp;</div>
					</div>
					<div class="row">
						<div class="col-md-11">
						<form name="search" method="get" action="">
							<input type="hidden" name="cat_id" value="<?php echo $cat_id;?>" />
							<input type="hidden" name="sub_cat_id" value="<?php echo $sub_cat_id;?>" />
							<div class="row">
								<input class="form-control"  style="margin-left:15px;" type="text" placeholder="Search category" name="search_val" value="<?php echo $search_val;?>" />
							</div>
							</div>
							<div class="col-md-1" style="text-align: -webkit-right;">
							<div class="row">
								<input type="submit" class="btn btn-primary" name="search" value="Search" style="margin-right:30px;" />
							</div>
						</form>
					</div>
				</div>
				<br />
				
				<!--[if !IE]>start table_wrapper<![endif]-->
				<div class="table_wrapper">
					<div class="table_wrapper_inner">
						<table class="table-responsive table-bordered table-striped listing" cellpadding="0" width="100%" cellspacing="0" align="center">
							<tr>
								<th><span class="manten-th">Sr.No.</span></th>
								<th><span class="manten-th"><?= $this->lang->line('lang_category');?></span></th>
								<th><span class="manten-th"><?= $this->lang->line('lang_category_image');?></span></th>
								<th><span class="manten-th"><?= $this->lang->line('lang_action');?></span></th>
							</tr>
							<?php 
							if(count($categoriesdata))
							{
								$i=$num+1;
								foreach($categoriesdata AS $item)
								{?>
									<tr>
										<td class="first style3"><?php echo $i++;?></td>
										<?php 
										if($cat_id!='0' || $cat_id>0)
										{?>
											<td><a href="<?= base_url().'CategoryView/'.$item->cat_type.'/?sub_cat_id='.$item->cat_id;?>"><?php echo $item->name;?></a></td>
	                               		<?php }
										if($sub_cat_id != '0')
										{?>
											<td class="link"><?php echo $item->name;?></td>
	                                	<?php }
	                                	else
	                                	{
	                                		if(!$cat_id){?>
												<td class="link"><a href="<?= base_url().'CategoryView/'.$item->cat_type.'/?cat_id='.$item->cat_id;?>"><?php echo $item->name;?></a></td>
	                                	<?php }}?>
																	
										<td>
											<?php
											if($item->category_image != '')
											{?>
												<img src="<?php echo base_url(); ?>images/category_images/<?php echo $item->category_image;?>" width="40" height="40"  /></td>
											<?php }
											else{ echo 'N/A';}?>
	                                	<td class="last"> 
	                                		<?php if ($item->status == 'Y'){?> 
	                                			<a href="<?= base_url().'CategoryApprove/'.$item->status.'/'.$item->cat_id;?>">
												<button type="button" data-toggle="tooltip" title="Approve" class="btn btn-success btn-circle"><i class="fa fa-key"></i></button></a> 
											<?php }
											else{?> 
												<a href="<?= base_url().'CategoryApprove/'.$item->status.'/'.$item->cat_id;?>">
												<button type="button" data-toggle="tooltip" title="Unapprove" class="btn btn-default btn-circle"><i class="fa fa-key"></i></button></a>
											<?php }?>
												<a href="<?= base_url().'CategoryEdit/'.$item->cat_id;?>"> 
												<button type="button" data-toggle="tooltip" title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button></a>
											<a href="<?= base_url().'CategoryDelete/'.$item->cat_id;?>" onclick="return confirm('Do You  want to delete ?');">
											<button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></a>
										</td>
									</tr>
	                            <?php }?>
                            	<tr><td colspan="8"> <center> <?= $showPagination;?></center> </td></tr>
                            <?php }else{?>							
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