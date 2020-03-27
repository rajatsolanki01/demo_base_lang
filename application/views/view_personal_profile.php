<div class="waper_my_account">
<div class="container">
	<div class="row">
		<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php if($this->session->set_flashdata('update')){?>
						<div class="alert-success"><?= $this->session->set_flashdata('update'); ?>
						</div>
					<?php } ?>
					<div class="sidebar-title"><?= $this->lang->line('346_oth_lang');?></div>
				</div>
				<div class="panel-body"> <?php if($this->session->userdata['u_status']=='N'){?> 
					<?php if(chk_email_ofoff()==1){;?>
					<div>
						<div class="five columns aligncenter" ><b><?= $this->lang->line('325_oth_lang');?> <a  href="<?= base_url();?>active_resend-1.html"> <b class="alert"><?= $this->lang->line('326_oth_lang');?>..</b> </a> <?= $this->lang->line('327_oth_lang');?>. :</b></div>
						<?php } ?>
						<?php if(chk_email_ofoff()==0){ ?>
						<div class="three columns aligncenter" > <?= $this->lang->line('775_oth_lang');?></div>
						<?php } ?> </div>
					<br />
					<br />
					<?php } else{ ?>
					<div class="table-responsive">
						<table class="table table-bordered ">
							<tbody>
								<tr class="techSpecRow">
									<td class="techSpecTD1"><?= $this->lang->line('155_oth_lang');?> </td>
									<td class="techSpecTD bold"> <?= $userdata[0]->name;?><td>
								</tr>
								<tr class="techSpecRow">
									<td class="techSpecTD1"><?= $this->lang->line('157_oth_lang');?> </td>
									<td class="techSpecTD bold"> <?= $userdata[0]->email;?></td>
								</tr>
								<tr class="techSpecRow">
									<td class="techSpecTD1"><?= $this->lang->line('160_oth_lang');?> </td>
									<td class="techSpecTD bold"> <?= $userdata[0]->country;?></td>
								</tr>
								<tr class="techSpecRow">
									<td class="techSpecTD1"><?= $this->lang->line('161_oth_lang');?> </td>
									<td class="techSpecTD bold"> <?= $userdata[0]->state;?><td>
								</tr>
								<tr class="techSpecRow">
									<td class="techSpecTD1"><?= $this->lang->line('162_oth_lang');?> </td>
									<td class="techSpecTD bold"> <?= $userdata[0]->city;?><td>
								</tr>
								<tr class="techSpecRow">
									<td class="techSpecTD1"><?= $this->lang->line('144_oth_lang');?> </td>
									<td class="techSpecTD bold"> <?=character_limiter($userdata[0]->detail,200); ;?></td>
								</tr>
								<tr class="techSpecRow">
									<td class="techSpecTD1"><?= $this->lang->line('539_oth_lang');?> </td>
									<td class="techSpecTD bold"> <?= $userdata[0]->mobile_no;?></td>
								</tr>
								<tr class="techSpecRow">
									<td class="techSpecTD1"><?= $this->lang->line('570_oth_lang');?> </td>
									<td class="techSpecTD bold"> <?= $userdata[0]->address;?></td>
								</tr>
								
								<tr class="techSpecRow">
									<td class="techSpecTD1"><?= $this->lang->line('1278_oth_lang');?> </td>
									<td class="techSpecTD bold"> <?php if($userdata[0]->user_photo==''){ ?> <img src="<?= base_url();?>images/user_photo/imgnotfound.jpg" class="" style="vertical-align:middle;" ><?php }else { ?> <img src="<?= base_url();?>images/user_photo/<?= $userdata[0]->user_photo;?>" width="80" height="80"  style="vertical-align:middle;"  /> <?php } ?></td>
								</tr>
								<tr class="techSpecRow">
									<td  class="techSpecTD1" colspan="2"><a href="<?= base_url();?>edit_personal_profile.html" class="btn btn-danger"><?= $this->lang->line('717_oth_lang');?></a></td>
								</tr>
							</tbody>
						</table>
					</div>
					<?php if($this->session->userdata['cust_id']=='007000000'){?>
					<div>
						<div class="five columns aligncenter bold3" ><a href="<?= base_url();?>edit_company_profile.html"><span><?= $this->lang->line('726_oth_lang');?></span></a><b><?= $this->lang->line('$78_oth_lang');?>:</b></div>
						<div class="three columns aligncenter" ><a href="<?= base_url();?>add_product.html"><?= $this->lang->line('727_oth_lang');?></a></div>
					</div>
					<?php }  ?> 
					 </div>
					<?php } ?>
			</div>
		</div>
	</div>
</div>
</div>