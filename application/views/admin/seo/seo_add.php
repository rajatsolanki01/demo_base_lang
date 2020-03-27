<br />
<div class="panel panel-default">
  <div class=" panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_seo_details');?> (<?php echo $this->session->userdata("user_lang");?>)</h2></div>
  <div class="panel-body">
  	<div class="col-md-12">
      <?php if  ($this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
        <table class="listing form table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0">
        
        <tr>
        <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_name');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><label><?= set_value('name',$seoedit->name);?></label></td>
        </tr>

        <tr>
        <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_title');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><label><?= set_value('name',$seoedit->title);?></label></td>
        </tr>

        <tr>
        <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_keywords');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><label><?= set_value('name',$seoedit->keyword);?></label></td>
        </tr>

        <tr>
        <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_descrition');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><label><?= set_value('name',$seoedit->des);?></label></td>
        </tr>

        </table>
      <?php }?>

      <?php if  ($this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
            <div style="background-color: #5d5d5d; color:white;" class=" panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_seo_details');?> (<?php echo $this->session->userdata("data_update_lang");?>)</h2></div>
        <?php }//print_r($seoedit_curr_lang);?>

        <div class="sct_right">        
                   <form name="add_seo" action="" method="post" class="search_form general_form">
                   
                    <fieldset>
                <div class="forms">
                    <div class="row">
                            <label><?= $this->lang->line('lang_name');?>:</label>
                            <div class="inputs">
                                <span class="input_wrapper">
       							<input type="text" class="text form-control" name="name"  value="<?= (!empty($seoedit_curr_lang))? set_value('name',$seoedit_curr_lang[0]->name):'';?>" /></span>
                                <span class="system positive" id="name" style="color: red;"><?= form_error('name'); ?></span>
                            </div>
                    </div>
					<div class="row">
                            <label><?= $this->lang->line('lang_title');?>:</label>
                            <div class="inputs">
                                <span class="input_wrapper">
       							<input type="text" class="text  form-control" name="title" style="" value="<?= (!empty($seoedit_curr_lang))? set_value('title',$seoedit_curr_lang[0]->title):'';?>" />                                </span>
                                <span class="system positive" id="title"style="color: red;"><?= form_error('title'); ?></span>
                            </div>
                    </div>
					<div class="row">
                            <label><?= $this->lang->line('lang_keywords');?>:</label>
                            <div class="inputs">
                                <span class="input_wrapper">
       							<input type="text" class="text form-control" name="keyword" style="" value="<?= (!empty($seoedit_curr_lang))? set_value('keyword',$seoedit_curr_lang[0]->keyword):'';?>" />                               </span>
                                <span class="system positive" id="keyword"style="color: red;"><?= form_error('keyword'); ?></span>
                            </div>
                    </div>
					
					<div class="row">
                            <label><?= $this->lang->line('lang_descrition');?>:</label>
                            <div class="inputs">
                                <span class="input_wrapper">
       							<input type="text" class="text form-control" name="des" style="" value="<?= (!empty($seoedit_curr_lang))? set_value('des',$seoedit_curr_lang[0]->des):'';?>" />                               </span>
                                <span class="system positive" id="des"style="color: red;"><?= form_error('des'); ?></span>
                            </div>
                    </div>
					<br />
                    <div class="row">
                          <div class="buttons"> <span class="button send_form_btn"><span></span>
                            <input name="submit" class="btn btn-primary"  type="submit" value="Submit"  />
                            </span> </div>
                        </div>
					
                    </div>
                    </fieldset>
				  </form>
				
                      
                  
                </div>
    </div>
  </div>
</div>