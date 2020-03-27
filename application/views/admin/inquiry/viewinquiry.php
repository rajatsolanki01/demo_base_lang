<br />
<div class="panel panel-default">
  <div class="panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_show_mails');?></h2></div>
  <div class="panel-body">
  <div class="col-md-12">
        <div class="sct_right">
              <div  id="product_list"> 
                <div class="table_wrapper">
                  <div class="table_wrapper_inner"> </div>
                    <table class="table-striped table-bordered table-responsive" align="center" style="width: 100%;" border="0" cellpadding="6" cellspacing="0">
                    <tr>
                      <td colspan="3"><font>
                        <h3><?= $this->lang->line('lang_enquiry_details_of');?>
                        <?php if ($enqury_detail->snd_user_id==0){?>
                          <?= $this->lang->line('lang_guest');?>
                          <?php } 
                          else{?>
                          <?= user_detail($enqury_detail->snd_user_id,'name')->name;?>
                          <?php }?></h3>
                        </font></td>
                    </tr>
                    <tr>
                      <td width="25%"><?= $this->lang->line('lang_sender_name');?></td>
                      
                      <td>
                        <?php if ($enqury_detail->snd_user_id==0){?>
                        <?= $this->lang->line('lang_guest');?>
                        <?php }
                        else{?>
                        <?= user_detail($enqury_detail->snd_user_id,'name')->name;?>
                        <?php }?></td>
                    </tr>
                    <tr>
                      <td><?= $this->lang->line('lang_receiver_name');?></td>
                     
                      <td><?= user_detail($enqury_detail->rec_user_id,'name')->name;?></td>
                    </tr>
                    <tr>
                      <td><?= $this->lang->line('lang_sender_email');?></td>
                     
                      <td>
                        <?php if($enqury_detail->snd_user_id==0){?>
                        <?= guest_detail($enqury_detail->id,'email');?>
                        <?php }
                        else{?>
                        <?= user_detail($enqury_detail->snd_user_id,'email')->email;?>
                        <?php }?></td>
                    </tr>
                    <tr>
                      <td><?= $this->lang->line('lang_receiver_email');?></td>
                     
                      <td><?= user_detail($enqury_detail->rec_user_id,'email')->email;?></td>
                    </tr>
                    <tr>
                      <td><?= $this->lang->line('lang_subject');?></td>
                      
                      <td><?= $enqury_detail->subject;?></td>
                    </tr>
                    <tr>
                      <td valign="top"><?= $this->lang->line('lang_message');?></td>
                    
                      <td><?= $enqury_detail->message;?></td>
                    </tr>
                    <tr>
                      <td><?= $this->lang->line('lang_date');?></td>
                     
                      <td><?= $enqury_detail->entry_date;?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
    </div>
  </div>
</div>