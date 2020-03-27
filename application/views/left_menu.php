<?php  $action = basename($this->uri->segment(1),".html");  ?>
<?php if($action=='Customer'  || $action=='home_search' || $left_condition_id>0) { ?> 

<div class="row set_width_row">
	<div class="col-lg-3 col-md-4 col-sm-8 col-xs-12">
		<nav class="navbar navbar-default" >
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
					<span class="sr-only"><?php echo $this->lang->line('893_oth_lang');?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<nav class="navbar navbar-default">  
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
						<span class="sr-only"><?php echo $this->lang->line('893_oth_lang');?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>  
					<div class="collapse navbar-collapse set_pading" id="navbar-collapse-1">
						<div class="set-left-color">
							<div class="set-heading"><?php echo $this->lang->line('1193_oth_lang');?></div>
							<section id="filter" class="panel panel-2">
								<div class="sidebar-title"><?php echo $this->lang->line('1195_oth_lang');?></div>
								<hr style="padding-top: 20px;">
								<div class="checkbox hello-margin">
								<form method="post" action="<?=base_url();?>Customer.html" >
								<input type="hidden" name="name"  value="<?php if(isset($_REQUEST['name'])){ echo $_REQUEST['name'];}?>">
								<div class="form-group">
								<?php  
								if(empty($sel_cuntry_id))
									country_select1();
								else
									country_select1($sel_cuntry_id);?>
								</div>
								<div class="form-group">
								<span id="state_change">
									<?php
									if(!empty($sel_state_id))
										state_selected1($sel_cuntry_id,$sel_state_id);
									else
									{?>
									<select name="state" id="state" onchange="state_selected1(this.value);" class="form-control">
			     						<option value="" selected="selected" class="le-input"><?= $this->lang->line('1197_oth_lang');?></option>
			 						</select>
									<?php } ?>
									</span>
								</div>
								<div class="form-group">
								<span id="city_change"><?php  city_select1($sel_state_id,$sel_city_id); ?></span> 
								<span id="city_error" style="color:#F00"></span>
								</div>
								<button type="submit" class="font-width btn btn-danger" name="country_search"><?php echo $this->lang->line('573_oth_lang');?></button>
								</form>
								</div>
							</section>

							<section id="filter" class="panel panel-2">
								<div class="sidebar-title"><?php echo $this->lang->line('1199_oth_lang');?></div>
								<hr />
								<div class="">
								<div class="checkbox">
								<form method="post" action="<?= base_url();?>Customer.html" >
								<div class="form-group">
								  <?php echo getMainCategoryDropdownFromCategories($id,$type); ?>
								  <span id="alert_main_catgory"></span>
								</div>
								<div class="form-group">
								  <span id="sub_cat_dropdown"><?php //echo getSubCategoryDropdown($sel_sub_id,$cat_id); ?></span>
								  <span id="alert_sub_catgory"></span>
								</div>
								<input type="hidden" name="state"  value="<?= $_REQUEST['state'];?>">
								<input type="hidden" name="name"  value="<?= $_REQUEST['name'];?>">
								<input type="hidden" name="city"  value="<?= $_REQUEST['city'];?>">
								<input type="hidden" name="country"  value="<?= $_REQUEST['country'];?>">
								<button type="submit" class="font-width btn btn-danger" name="category_search"><?php echo $this->lang->line('573_oth_lang');?></button>
								</form>
								</div>
								</div>
							</section>
						</div> 
					</div>
				</div>
			</nav>
		</nav>
	</div>
<?php } ?> 