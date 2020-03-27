<div class="waper_my_account">
	<div class="container-fulid">
		<div class="clearfix">
			<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="new_panel">
					<div class="panel_heading"><?= $this->lang->line('398_oth_lang');?></div>
					<div class="panel_body">
						<div class="table-responsive">
							<div>&ensp;</div>
							<table class="table table-striped table-hover table_p_tag">
                          <?php if ($email_data){?>
								<?php foreach( $email_data as $data){?>
								<tr <?php if(show_unread_mails($this->session->userdata('user_id'),$data->pro_id)!='0'){?>class="send_name unread_msg" <?php }?> >
									<td class="send_name">
										<p><?= user_detail($this->session->userdata['user_id'],'name')->name;?></p>
									</td>
									<td class="send_sub_msg">
                                        <a href="<?= base_url().'mail_detail/'.$data->pro_id.'/'.$data->snd_user_id.'/'.$data->rec_user_id;?>/<?= get_last_msg_id($data->msg_id,$this->session->userdata('user_id'));?>"><?= $data->subject;?>&nbsp;&nbsp;&nbsp;<span>
                                        	<?= get_last_msg($data->msg_id,$data->rec_user_id);?></span></a>
									</td>
									<td class="lebal_part">
										<span class="label label-primary"><?php if($data->email_type!=''){echo $data->email_type;}else{ echo "N/A";}?></span>
									</td>									
									<td class="send_date">
										<p  data-toggle="tooltip" data-placement="bottom" title="<?= $data->time;?>"><?= $data->entry_date;?></p>
									</td>								
								</tr>
                          <?php }?>
                          <?php }	
								else
									{?>
								<tr class="odd">
									<td class="odd text-center"  style="color:red;" colspan="5" ><img src="https://i.imgur.com/7m7VJJ4.png" height="70" /><?= $this->lang->line('825_oth_lang');?></td>
								</tr>
								<?php }?>    
							</table>
							<div class="page-header" style="display:none">
								<p>* <?= $this->lang->line('1205_oth_lang');?>, <?= $this->lang->line('1206_oth_lang');?><a href="<?= base_url();?>subs_mail.html"><strong><?= $this->lang->line('399_oth_lang');?></strong></a><?= $this->lang->line('1311_oth_lang');?>.<?= $this->lang->line('1207_oth_lang');?>.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>