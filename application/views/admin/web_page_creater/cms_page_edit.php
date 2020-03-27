<br />
<script src="<?= base_url();?>assets/ckeditor_2017/ckeditor.js"></script>
<div class="panel panel-default">
  <div class="panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_add_page');?> (<?php echo $this->session->userdata("user_lang");?>)</h2></div>
  <div class="panel-body">
  	<div class="sct_right">
    <?php if ($this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
        <table class="listing form table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0">
        <tr>
        <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_title');?></strong></td>
						  <td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><?php if(isset($pagedata1[0]) && $pagedata1[0]->title){?><?= $pagedata1[0]->title; }?></td>
        </tr>

        <tr>
        <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_matter');?></strong></td>
						  <td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><?php if(isset($pagedata1[0]) && $pagedata1[0]->matter){?><?= $pagedata1[0]->matter; }?></td>
        </tr>
        </table>
    <?php }?>

    <?php if ($this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
      <div style="background-color: #5d5d5d; color:white;" class="panel-heading clearfix"><h1 class="page-header"><?= $this->lang->line('lang_add_page');?> (<?php echo $this->session->userdata("data_update_lang");?>)</h1></div>
      <?php }?>             

      <form role="form" name="add_page" id="add_page" action=""  enctype="multipart/form-data" method="post" >
<div class="form-group" id="alert_pro_name">
  <label><?= $this->lang->line('lang_title');?></label>
  <input type="text" name="title" id="title" size="30"  value="<?= (isset($pagedata1_curr_lang[0]))? $pagedata1_curr_lang[0]->title : '' ;?>" class="form-control"  />
</div>
<span class="system positive"></span><!---->

<div class="col-lg-12">
  <label><?= $this->lang->line('lang_matter');?>:</label>
  <textarea id="editor1" name="mail_editor"  class="form-control"><?= (isset($pagedata1_curr_lang[0]))? $pagedata1_curr_lang[0]->matter : '' ;?></textarea>
                      <script>
                        CKEDITOR.replace( 'editor1' );
                      </script> 
                      <script>      
                        config.removePlugins= 'toolbar';
                       
                      </script>
 </div>
<br />
<div class="col-lg-12 form-group">
<button type="submit" name="submit" value="submit" class="btn btn-primary"><?= $this->lang->line('lang_update');?>
 </button>
</div>
</form>
				
                      
                  
                </div>
  </div>
</div>