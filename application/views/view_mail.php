<script src="ckeditor_2017/ckeditor.js"></script>
<div class="waper_my_account">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
				<h4 class="top_none_marign"><?= $viewData[0]->subject;?></h4>
				<p><?= $this->lang->line('1489_oth_lang');?>: <span class="label label-primary"><?= $viewData[0]->email_type;?></span> <a href="<?= $viewData[0]->send_url;?>" class="btn btn-info btn-round-set" title="Link" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a></p>
			</div>
			<div class="col-md-3">
				<div class="box_info_penal">
					<?php if ($this->session->userdata('user_id') != $viewData[0]->snd_user_id){?>
					<p><?= $this->lang->line('1491_oth_lang');?>: <?= user_detail($viewData[0]->snd_user_id,'name')->name;?></p>
					<p><?= $this->lang->line('1492_oth_lang');?> : <?= user_detail($viewData[0]->snd_user_id,'user_name')->user_name;?></p>
					<?php }?>
					
					<?php if ($this->session->userdata('user_id')!= $viewData[0]->rec_user_id){?>
					<p><?= $this->lang->line('1491_oth_lang');?>:<?= user_detail($viewData[0]->snd_user_id,'name')->name;?></p>
					<p><?= $this->lang->line('1492_oth_lang');?>:<?= user_detail($viewData[0]->snd_user_id,'user_name')->user_name;?></p>
					<?php }?>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12"> 
				<?php if ($viewmail){
					foreach($viewmail as $data){?>
				<div class="panel panel-default" id="chat_id<?= $data->id;?>">
					<div class="panel-body"<?php if ($this->session->userdata('user_id')==$data->snd_user_id){?> style="background-color:#EFEFEF;" <?php }?>>
						<p><?= $data->message;?></p>
						<p>
                        <?php if ($this->session->userdata('user_id')==$data->snd_user_id){?><strong>You:</strong>
                    <?php }
                    elseif($data->snd_user_id==0){
                    ?><strong>Guest:</strong>
                <?php } else { ?>
                        <strong><?= user_detail($data->snd_user_id,'name')->name;?>:</strong>
                    <?php }?>
                       
                         <small class="text-muted"><?= $data->time;?></small> </p>
						
					</div>
				</div>
				
				<?php } }?>	
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<form action="" name="mail_detail" id="contact_form" method="post">
                                
                                <div class="form-group">
                                <textarea id="editor1" name="msg_data" placeholder="<?= $this->lang->line('1336_oth_lang');?>"  class="form-control"></textarea>
									<script>CKEDITOR.replace( 'editor1' );</script> 
                                    <script>config.removePlugins='toolbar'</script> 
                                </div>
                                <?php if ($this->session->userdata('user_id')==$data->snd_user_id){?>
                               <input type="hidden" name="snd_user_id"  value="<?= $viewmail[0]->snd_user_id;?>">
                               <input type="hidden" name="rec_user_id"  value="<?= $viewmail[0]->rec_user_id;?>">
                               <?php } else{?>
                               <input type="hidden" name="snd_user_id"  value="<?=$viewmail[0]->rec_user_id;?>

                               ">
                               <input type="hidden" name="rec_user_id"  value="<?= $viewmail[0]->snd_user_id;?>">
                                <?php }?>                                
                                <input type="hidden" name="msg_id" value="<?= $viewmail[0]->msg_id;?>">
								<input type="hidden" name="subject"  value="<?=$viewmail[0]->subject;?>">
                                <input type="hidden" name="email_type"  value="<?= $viewmail[0]->email_type;?>">
                                <input type="hidden" name="send_url"  value="<?= $viewmail[0]->send_url;?>">
                                <input type="hidden" name="pro_id"  value="<?= $viewmail[0]->pro_id;?>">
								<input type="submit" name="contact_submit" class="btn btn-info" value="Reply">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>