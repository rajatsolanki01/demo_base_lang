<?php //echo $recordExistForLang; 
  //echo $gcurrPageName;
  //echo $this->session->userdata("data_update_lang");
?>
<br />
<div class="panel panel-default">
  
  <?php if ($gcurrPageName == "NewsEdit") {?>
  <div class="panel-heading clearfix"><h1 class="page-header"><?= $this->lang->line('lang_edit_news');?> <?= $this->lang->line('lang_page');?> (<?php echo $this->session->userdata("user_lang");?>)</h1></div>
  <?php } else {?>
    <div class="panel-heading clearfix"><h1 class="page-header"><?= $this->lang->line('lang_add_news');?> <?= $this->lang->line('lang_page');?> (<?php echo $this->session->userdata("user_lang");?>)</h1></div>
  <?php }?>

  <div class="panel-body">
  	<div class="col-md-12">
      <?php if  ($gcurrPageName == "NewsEdit" && $this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
        <table class="listing form table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0">
        <tr>
        <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_upload_image');?></strong></td>
						  <td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><img src="<?= base_url();?>images/news/<?= (isset($show_news_edit))? $show_news_edit[0]->image_path : '' ;?>"/></td>
        </tr>

        <tr class="bg">
          <td class="first" style="text-align:right"><strong><?= $this->lang->line('lang_title');?></strong></td>
          <td>&nbsp;<strong>:</strong>&nbsp;</td>
          <td class="last"><label><?= (isset($show_news_edit))? $show_news_edit[0]->title : '' ;?></label>
          </td>
        </tr>
        
        <tr class="bg">
          <td class="first" style="text-align:right"><strong>URl</strong></td>
          <td>&nbsp;<strong>:</strong>&nbsp;</td>
          <td class="last"><label><?= (isset($show_news_edit))? $show_news_edit[0]->url : '' ;?></label>
            </td>
        </tr>

        <tr class="bg">
          <td class="first" style="text-align:right"><strong><?= $this->lang->line('lang_description');?></strong></td>
          <td>&nbsp;<strong>:</strong>&nbsp;</td>
          <td class="last"><label><?= (isset($show_news_edit))? $show_news_edit[0]->description : '' ;?></label>
            </td>          
        </tr>
        </table>
      <?php }?>

      <?php if ($gcurrPageName == "NewsEdit" && $this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
      <div style="background-color: #5d5d5d; color:white;" class="panel-heading clearfix"><h1 class="page-header"><?= $this->lang->line('lang_edit_news');?> <?= $this->lang->line('lang_page');?> (<?php echo $this->session->userdata("data_update_lang");?>)</h1></div>
      <?php }?>  

    	<div class="sct_right">
                  <form name="add_news" method="post" enctype="multipart/form-data"   class="search_form general_form">
                    <fieldset>
                      <table class="listing form table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0">
                      
                        <tr>
                          <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_upload_image');?></strong><span style="color:#FF0000;">*</span></td>
						  <td>&nbsp;<strong>:</strong>&nbsp;</td>
                          <td class="last"><input name="news_img" class="form-control" size="30" type="file" />
                            <input type="hidden" name="photo" value="<?= (!empty($show_news_edit_curr_lang))? $show_news_edit_curr_lang[0]->image_path : '' ;?>" />
                            </td>
                          <td width="300"><div><span style="color: red;"><?= $this->session->flashdata('LogoUploadingError');?></span></div></td>
                        </tr>
						
                        <tr>
                          <td>&nbsp;</td>
						  <td>&nbsp;</td>
                          <td class="first"><strong>(only jpeg/jpg/png &nbsp;file are allowed)</strong></td>
                          <td>&nbsp;</td>
                        </tr>						
                        <?php if(!empty($show_news_edit_curr_lang) && $recordExistForLang!= "0"){?>
                  <tr>
    							<td>&nbsp;</td>
    						  <td>&nbsp;</td>
                  <td><img src="<?= base_url();?>images/news/<?= (!empty($show_news_edit_curr_lang))? $show_news_edit_curr_lang[0]->image_path : '' ;?>"/></td>
                        <?php }?>
						  <td></td>
                        </tr>
						
						<tr><td colspan="4" style="height:3px"></td></tr>
                         <tr class="bg">
                          <td class="first" style="text-align:right"><strong><?= $this->lang->line('lang_title');?></strong> <span style="color:#FF0000;">*</span></td>
						  <td>&nbsp;<strong>:</strong>&nbsp;</td>
                          <td class="last"><input type="text" class="text form-control" name="title" value="<?= (!empty($show_news_edit_curr_lang) && $recordExistForLang!= "0")? $show_news_edit_curr_lang[0]->title : '' ;?>" style="width:405px;" />
                           </td>
                          <td width="300"><div><span style="color: red;"><?= form_error('title');?></span> </div></td>
                        </tr>
                        
                        
                        
                        <tr><td colspan="4" style="height:3px"></td></tr>
                         <tr class="bg">
                          <td class="first" style="text-align:right"><strong>URl</strong> <span style="color:#FF0000;">*</span></td>
						  <td>&nbsp;<strong>:</strong>&nbsp;</td>
                          <td class="last"><input type="text" class="text form-control" name="url" value="<?= (!empty($show_news_edit_curr_lang) && $recordExistForLang!= "0")? $show_news_edit_curr_lang[0]->url : '' ;?>" style="width:405px;" />
                           </td>
                          <td width="300"><div id="title_info"> </div></td>
                        </tr>
						
						<tr><td colspan="4" style="height:3px"></td></tr>
						<tr class="bg">
                          <td class="first" style="text-align:right"><strong><?= $this->lang->line('lang_description');?></strong><span style="color:#FF0000;">*</span></td>
						  <td>&nbsp;<strong>:</strong>&nbsp;</td>
                          <td class="last"><textarea class="text form-control" name="description" cols="55" rows="5"><?= (isset($show_news_edit_curr_lang) && $recordExistForLang!= "0")? $show_news_edit_curr_lang[0]->description : '' ;?></textarea><div>(Text Limit 500 words)</div>
                           </td>
                          <td width="300"><div><span style="color: red;"><?= form_error('description');?></span> </div></td>
                        </tr>
            
                        
						<tr><td colspan="4" style="height:3px"></td></tr>
                        <tr>
                          <td colspan="4" align="center"><input type="hidden" name="id" value="{$show_news_edit[0].id}" />
                            <input class="btn btn-primary set-btn" name="submit" type="submit" value="Submit" /></td>
                        </tr>
                      </table>
                    </fieldset>
                  </form>
                </div>
    </div>
  </div>
</div>