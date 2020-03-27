<br />
<script src="<?= base_url();?>assets/ckeditor_2017/ckeditor.js"></script>
<div class="panel panel-default">
  <div class="panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_mail_details');?> (<?php echo $this->session->userdata("user_lang");?>)</h2></div>
  <div class="panel-body">
  	<div class="col-md-12">
    
    <?php if  ($gcurrPageName == "EditMail" && $this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
        <table class="listing form table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0">
        <tr>
        <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_subject');?></strong></td>
						  <td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><label><?= (isset($mailsdata))? set_value('subject',$mailsdata[0]->subject) : '' ;?></label></td>
        </tr>

        <tr>
        <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_message');?></strong></td>
						  <td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><label><?= (isset($mailsdata))? set_value('subject',$mailsdata[0]->msg) : '' ;?></label></td>
        </tr>
        </table>
    <?php }?>

      <?php if ($gcurrPageName == "EditMail" && $this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
      <div style="background-color: #5d5d5d; color:white;" class="panel-heading clearfix"><h1 class="page-header"><?= $this->lang->line('lang_mail_details');?> (<?php echo $this->session->userdata("data_update_lang");?>)</h1></div>
      <?php } //print_r($mailsdata);?>

        <div class="sct_right">
                   <form name="add_mails" action="" method="post" enctype="multipart/form-data"  class="search_form general_form" >                   
                    <fieldset>
                      <div class="forms">                       
                       <div class="row">
                            <div class="inputs" style="float:right">
                                <span class="system alert"><?= $this->lang->line('lang_Dont_remove_any_variable_lika');?> "$click".</span>
                            </div>
                   		</div>
                 	
					          <div class="row">
                            <label><?= $this->lang->line('lang_subject');?>:</label>
                            <div class="inputs">
                                <span class="">
       							<input type="text" class="text form-control" size="100" name="subject" value="<?= (!empty($mailsdata_curr_lang))? set_value('subject',$mailsdata_curr_lang[0]->subject):'';?>" /></span>
                                <span class="system positive" id="subject" style="color: red;"><?= form_error('subject'); ?></span>
                            </div>
                    </div>
                    
                    <div class="row">
                            <label><?= $this->lang->line('lang_message');?>:</label>
                            <div class="">
                                <span class="" style="width:600px;">
                                  <textarea id="editor1" name="msg"  class="form-control"><?= (!empty($mailsdata_curr_lang))? $mailsdata_curr_lang[0]->msg:'';?></textarea>
                                  <span class="system positive" id="msg" style="color: red;"><?= form_error('msg'); ?></span>
                      <script>
                        CKEDITOR.replace( 'editor1' );
                      </script> 
                      <script>      
                        config.removePlugins= 'toolbar'
                      </script>
       							<?php //$mail_editor->create();?> 
                                </span>
                                <span class="system positive" id="msg"></span>
                            </div>
                    </div>
                   
            
					<div class="row">
                          <div class="buttons"> <span class="button send_form_btn"><span></span>
                          <input type="hidden" name="hid_title" value="<?= (!empty($mailsdata))? $mailsdata[0]->title:'';?>" />
                            <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
                            </span> </div>
                        </div>
                    </div>
                    </fieldset>
				  </form>
                </div>
    </div>
  </div>
</div>