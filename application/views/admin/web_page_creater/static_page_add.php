<br />
<script src="<?= base_url();?>assets/ckeditor_2017/ckeditor.js"></script>
<div class="panel panel-default">
  <div class="panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_add_static_page');?> (<?php echo $this->session->userdata("user_lang");?>)</h2></div>
  <div class="panel-body">
  		<div class="col-md-12">
      <?php if  ($gcurrPageName == "StaticPage" && $this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
        <table class="listing form table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0">
        <tr>
        <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_title');?></strong></td>
						  <td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><?php if(isset($pagedata) && $pagedata->title){?><?= $pagedata->title; }?></td>
        </tr>

        <tr>
        <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_matter');?></strong></td>
						  <td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><?php if(isset($pagedata) && $pagedata->matter){?><?= $pagedata->matter; }?></td>
        </tr>

        <tr>
        <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_priority');?></strong></td>
						  <td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><?php if(isset($pagedata) && $pagedata->priorty){?><?= $pagedata->priorty; }?></td>
        </tr>
        </table>
      <?php }?>  

      <?php if ($this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
      <div style="background-color: #5d5d5d; color:white;" class="panel-heading clearfix"><h1 class="page-header"><?= $this->lang->line('lang_add_static_page');?> (<?php echo $this->session->userdata("data_update_lang");?>)</h1></div>
      <?php }?>  

        <div class="sct_right">         
          <form id="form" name="add_page" class="form widget" enctype="multipart/form-data" method="post"  class="search_form general_form" >
              <fieldset>
                <div class="forms">
                   <div class="row">
                      <label><strong><?= $this->lang->line('lang_title');?>:</strong></label>
                        <div class="inputs">
                          <span class="input_wrapper">
       							        <input type="text" class="form-control" name="title"  size="50" value="<?= set_value('title');?><?php if(!empty($pagedata_curr_lang) && $pagedata_curr_lang->title){?><?= $pagedata_curr_lang->title; }?> " /></span>
                                <span class="system positive" style="color: red;"><?= form_error('title'); ?>
                                </span>
                        </div>
                    </div>
                    
                  <div class="row">
                      <label><strong><?= $this->lang->line('lang_matter');?>:</strong></label>
                        <div class="inputs">
                          <span class="">
       							<textarea id="editor1" name="matter"  class="form-control"><?= (!empty($pagedata_curr_lang))? $pagedata_curr_lang->matter : '' ;?></textarea>
                      <script>  
                        CKEDITOR.replace('editor1', {
                          toolbar: 'Source'
                        }); 
                      </script>
                          </span>
                        </div>
                  </div>
                  <div class="row">
                      <label><strong><?= $this->lang->line('lang_priority');?>:</strong></label>
                        <div class="inputs">
                            <span class="input_wrapper">
                              <select class="form-control" name="priorty" >
                                <option ><?= $this->lang->line('lang_Please_select_priority');?></option>
                                <option value="1" <?php if(!empty($pagedata_curr_lang) && $pagedata_curr_lang->priorty=='1'){?> selected="selected"<?php }?> >1</option>
                                <option value="2" <?php if(!empty($pagedata_curr_lang) && $pagedata_curr_lang->priorty=='2'){?> selected="selected"<?php } ?> >2</option>
                                <option value="3" <?php if(!empty($pagedata_curr_lang) && $pagedata_curr_lang->priorty=='3'){?> selected="selected"<?php } ?> >3</option>
                                <option value="4" <?php if(!empty($pagedata_curr_lang) && $pagedata_curr_lang->priorty=='4'){?> selected="selected"<?php } ?> >4</option>
                                
                              </select>
                          </div>
                  </div>                        
					         <div class="row">
                      <div class="buttons"> <span class="button send_form_btn"><span><span></span></span>
                        <input class="btn btn-primary set-btn" name="submit" type="submit" value="submit"/>
                      </span> 
                  </div>
                </div>
              </div>
          </fieldset>
				  </form>
				  </div>
    </div>
  </div>
</div>