<?php $sub_domain_data1 = get_seller_detail($this->session->userdata['user_id']);?>
<div class="waper_my_account">
	<div class="container-fulid">
		<div class="clearfix">
			<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<ul class="nav nav-pills pils_set_data">
					<li class="active"><a data-toggle="pill" href="#home"><?php  echo $this->lang->line('188_oth_lang'); ?></a></li>
  					<?php
  					if($sub_domain_data1->buyer=='N'){?>   
						<li><a data-toggle="pill" href="#trade"><?php  echo $this->lang->line('1513_oth_lang'); ?></a></li>
						<li><a data-toggle="pill" href="#information"><?php  echo $this->lang->line('1514_oth_lang') ?></a></li>
                    <?php }?>
				</ul>
				
				<div>&ensp;</div>
				<div class="tab-content">
				
				<div id="home" class="tab-pane fade in active">			
					<div class="main_micro_section">					
						<div class="row">
							<div class="col-md-8">
								<div class="micro_home_left">
									<h4 class="heading_border"><strong><?php echo $this->lang->line('1542_oth_lang')?></strong></h4>
									<div class="table-responsive">
									<table class="table-condensed table-bordered table-hover table-striped table_th_data" width="100%">
										<tbody>
											<tr>
												<th><?php echo $this->lang->line('1543_oth_lang');?></th>
												<td><?php echo stripslesh($userdata[0]->frm_name);?></td>
											</tr>
											
											<tr>
												<th><?php echo $this->lang->line('588_oth_lang');?></th>
												<td><?php echo $userdata[0]->address;?></td>
											</tr>
											<?php /* remove	
											<tr>
												<th><?php echo $this->lang->line('708_oth_lang')?></th>
												<td><?php echo meta_detail($userdata[0]->id,'meta_desc','customer');?></td>
											</tr>
											
											<tr>
												<th><?php echo $this->lang->line('709_oth_lang');?> </th>
												<td><?php echo meta_detail($userdata[0]->id,'meta_keywords','customer');?></td>
											</tr>*/?>
											<tr>
												<th><?php echo $this->lang->line('147_oth_lang');?> </th>
												<td><?php echo show_user_category($userdata[0]->id);?></td>
											</tr>
											
											<tr>
												<th><?php echo $this->lang->line('166_oth_lang');?> </th>
												<td><?php
													if($userdata[0]->seller=='Y')
														echo 'Seller';
													if($userdata[0]->seller=='N')
														echo 'Buyer'; 
													?>
												</td>
											</tr>
											
											
											<tr>
												<th><?php echo $this->lang->line('342_oth_lang');?> </th>
												<td><?php echo $userdata[0]->reg_yrs;?></td>
											</tr>
											
											<tr>
												<th><?php echo $this->lang->line('703_oth_lang');?></th>
												<td><?php echo $userdata[0]->emp_det;?></td>
											</tr>
											
											<tr>
												<th><?php echo $this->lang->line('715_oth_lang');?> </th>
												<td> <?php echo $userdata[0]->own_type;?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('716_oth_lang');?></th>
												<td><?php echo user_certification($userdata[0]->certification);?></td>
											</tr>
										</tbody>
									</table>
									</div>
								</div>
								<div>&ensp;</div>
								<div class="clearfix">
									<a href="<?php echo base_url()?>edit_company_profile.html" class="btn btn-warning"><?php echo $this->lang->line('1547_oth_lang');?></a>
								</div>
							</div>
							
							<div class="col-md-4">
								<h4 class="heading_border"><strong><?php echo $this->lang->line('698_oth_lang');?></strong></h4>
								<div class="micro_home_right">										
									<div class="mirco_table_panel">
										<div class="con_person_logo">
										<?php
										
										if($userdata[0]->logo !=''){?>
											<img src="<?php echo base_url().'/images/user_logo/'.$userdata[0]->logo;?>" class="img-responsive" /> 
										<?php }
										else {
											echo get_image('images/','notfound.jpg',120);
										}?>	
										</div>
										<div class="table-responsive">
										<table class="table-condensed table-bordered table-hover table-striped" width="100%">
											<tbody>
												<tr>
													<th><?php echo $this->lang->line('155_oth_lang');?></th>
													<td><?php echo $userdata[0]->frm_name;?></td>
												</tr>									
																					
												<tr>
													<th><?php echo $this->lang->line('160_oth_lang');?></th>
													<td><?php echo $userdata[0]->country;?></td>
												</tr>
												
												<tr>
													<th><?php echo $this->lang->line('161_oth_lang');?></th>
													<td><?php echo $userdata[0]->state;?></td>
												</tr>
												
												<tr>
													<th><?php echo $this->lang->line('162_oth_lang');?></th>
													<td><?php echo $userdata[0]->city;?></td>
												</tr>
											</tbody>
										</table>
										</div>
									</div>
								</div>
							</div>
						</div>
		</div>
		
		<div class="row">
			<div class="col-md-8">
				<div class="main_micro_section mirco_fix_height">
					<h4 class="heading_border"><strong><?php echo $this->lang->line('334_oth_lang');?></strong></h4>
					<p><?php echo character_limiter($userdata[0]->detail,1900);?></p>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="main_micro_section mirco_fix_height">
					<p><i class="fa fa-envelope-o" aria-hidden="true"></i>
					 <?php echo $userdata[0]->email;?></p>
					<p><i class="fa fa-globe" aria-hidden="true"></i> 
						<?php echo $userdata[0]->ph_no;?></p>
					<?php 
					if($userdata[0]->site_url!=''){?>
						<p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $userdata[0]->site_url;?></p>
					<?php }?>
                    
                     <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"style="width:100%; height:250px;" src="https://maps.google.com/maps?hl=en&q={$userdata[0].address}&ie=UTF8&t=roadmap&z=15&iwloc=B&output=embed"></iframe> 
                    </div>
			</div>
		</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>