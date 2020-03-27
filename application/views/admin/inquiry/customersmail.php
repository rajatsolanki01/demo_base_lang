<br />
<div class="panel panel-default">
  <div class="panel-heading clearfix"><h1 class="page-header"><?= $this->lang->line('lang_all_mails');?></h1></div>
  <div class="panel-body">
  	<div class="">
        <div class="sct_right">
              <div  id="product_list">
                <div class="table_wrapper">
                  <div class="table_wrapper_inner">
                    <table class="listing  table-striped  table-bordered table-responsive" cellpadding="0" width="100%" cellspacing="0">
					<tr>
						<th class="first" width="5%"><span class="manten-th">Sr.No.</span></th>
						<th><span class="manten-th"><?= $this->lang->line('lang_sender_name');?></span></th>
					<th><span class="manten-th"><?= $this->lang->line('lang_receiver_name');?></span></th>
						<th><span class="manten-th"><?= $this->lang->line('lang_sender');?></span></th>
						<th><span class="manten-th"><?= $this->lang->line('lang_receiver');?></span></th>
						<th><span class="manten-th"><?= $this->lang->line('lang_subject');?></span></th>
						<th><span class="manten-th"><?= $this->lang->line('lang_date');?></span></th>
                    
						<th class="last" width="12%;"><span class="manten-th"><?= $this->lang->line('lang_action');?></span></th></th>
					</tr>
					<?php if ($customerdata){
						   $i=$num+1;
						 foreach($customerdata as $data){?>
							<tr>
								<td class="first style3"><?= $i++;?></td>
								
								<td>
								<?php if ($data->snd_user_id==0){?>
								 <?= guest_detail($data->id,'name');?>
								 <?php }
								 else{ ?>
								<?php if(user_detail($data->snd_user_id,'name')) echo user_detail($data->snd_user_id,'name')->name;?>
								<?php }?>
								</td>
								<td><?php if(user_detail($data->rec_user_id,'name')){ echo user_detail($data->rec_user_id,'name')->name;}?></td>
								<td>
								<?php if ($data->snd_user_id==0){?>
								<?= guest_detail($data->id,'email');?>
								 <?php } 
								 else{?>
								 <?php if(user_detail($data->snd_user_id,'name')){ echo  user_detail($data->snd_user_id,'email')->email;}?>
								 <?php }?>
								</td>
								<td>
									<?php if(user_detail($data->rec_user_id,'name')){ echo user_detail($data->rec_user_id,'email')->email;}?>
								</td>
								
								<td><?= character_limiter($data->subject,10);?></td>
								<td><?= $data->entry_date;?></td>
                                
								<td class="last"> 
								 <a href="<?= base_url();?>ViewInquiry/<?=$data->id;?>"><button type="button" title="View" class="btn btn-warning btn-circle"><i class="fa fa-eye"></i> </button></a>
								  <a href="<?= base_url().'DeleteEmailInquiry/'.$data->id;?>" onclick="return confirm('Do You  want to delete ?');"><button type="button" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>  </button></a>
								  <?php if(empty($actual_link)){?>
								  	<a class="goon" href="<?= $data->send_url;?>"><button type="button" title="Inquiry Product Link" class="btn btn-danger btn-circle"><i class="fa fa-link"></i>  </button></a>
								  <?php }else {?>
								<a class="goon" href="<?= base_url();?>product-category/-<?= $data->pro_id;?>"><button type="button" title="Inquiry Product Link" class="btn btn-danger btn-circle"><i class="fa fa-link"></i>  </button></a>
							<?php } ?>
								</td>
							</tr>
                            <div id="myModal_<?= $data->id;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
  </div>
</div>
						<?php }?>
				 <tr> 
                                                            <td colspan="9">
                                                                <form name="frm_pagi" action="" method="post">
                                                                    <input type="hidden" name="pageval" id="pagevalid" value="{$pageval}" />
                                                                  <?= $showPagination;?> 
                                                                </form>
                                                            </td>
                                                        </tr>
				
					<?php }
					else {?>
						<td colspan="9"><?= $this->lang->line('lang_record_not_found');?></td>
					<?php }?>	
							
				</table>
                  </div>
                </div>
              </div>
            </div>
    </div>
  </div>
</div>