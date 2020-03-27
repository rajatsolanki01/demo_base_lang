<br />
<div class="panel panel-default">
  <div class="panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_add_succes');?><u></u> <?= $this->lang->line('lang_page');?></h2></div>
  <div class="panel-body">
  	  <div class="col-md-12">
        <div class="sct_right">
                  <form name="add_success_stories" action="" method="post" enctype="multipart/form-data"   class="search_form general_form">
                    <fieldset>
                      <table class="listing form table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0">
                       <?php if($success_stories_data->id!=''){?>
                        <tr>
                          <th class="full" colspan="3"><?= $this->lang->line('lang_succes_news');?></th>
                        </tr>
                        <?php } ?> 
                        <tr>
                          <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_upload_image');?></strong><span style="color:#FF0000;">*</span></td>
						  <td>&nbsp;<strong >:</strong>&nbsp;</td>
                          <td class="last"><input name="sucess_img" size="30" type="file" />
                            <input type="hidden" name="photo" value="<?= $success_stories_data->image_path;?>" />
                            </td>
                          <td width="300"><div><span style="color: red"><?= form_error('sucess_img');?></span><?= $this->session->flashdata('LogoUploadingError');?></div></td>
                        </tr>
						
                        <tr>
                          <td>&nbsp;</td>
						  <td>&nbsp;</td>
                          <td class="first"><strong>(only jpeg/jpg/png &nbsp;file are allowed)</strong></td>
                          <td>&nbsp;</td>
                        </tr>
						
                        <tr>
							<td>&nbsp;</td>
						  <td>&nbsp;</td>
                          <td><img src="<?= base_url();?>images/Success_Stories/<?= $success_stories_data->image_path;?>"/></td>
						  <td></td>
                        </tr>
						
						<tr><td colspan="4" style="height:3px"></td></tr>
                         <tr class="bg">
                          <td class="first" style="text-align:right"><strong><?= $this->lang->line('lang_title');?></strong> <span style="color:#FF0000;">*</span></td>
						  <td>&nbsp;<strong>:</strong>&nbsp;</td>
                          <td class="last"><input type="text" class="text form-control" name="title" style="width:230px;" value="<?= $success_stories_data->title;?>" />
                           </td>
                          <td width="300"><div><span style="color: red"><?= form_error('title');?></span></div></td>
                        </tr>
						
						<tr><td colspan="4" style="height:3px"></td></tr>
						<tr class="bg">
                          <td class="first" style="text-align:right"><strong><?= $this->lang->line('lang_description');?></strong><span style="color:#FF0000;">*</span></td>
						  <td>&nbsp;<strong>:</strong>&nbsp;</td>
                          <td class="last"><textarea class="form-control" name="description" cols="30" rows="5"><?= $success_stories_data->description;?></textarea><div>(Text Limit 500 words)</div>
                           </td>
                          <td width="300"><div><span style="color: red"><?= form_error('description');?></span></div></td>
                        </tr>
            
                        
						<tr><td colspan="4" style="height:3px"></td></tr>
                        <tr>
                          <td colspan="4" align="center"><input type="hidden" name="id" value="<?= $success_stories_data->id;?>" />
                            <input class="btn btn-primary set-btn" name="submit" type="submit" value="Submit"/></td>
                        </tr>
                      </table>
                    </fieldset>
                  </form>
                </div>
    </div>
  </div>
</div>