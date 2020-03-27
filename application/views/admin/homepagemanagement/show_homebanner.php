<br />

<div class="panel panel-default">
  <div class="panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_home_page_banner');?> (<?php echo $this->session->userdata("user_lang");?>)</h2></div>
  <div class="panel-body" style="background:#fbfbfb"> 
  
  <div class="col-md-12" >
  		<?php if  ($gcurrPageName == "HomeBanner" && $this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
			<table class="listing form table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0">
			<tr>
			<td class="last" width="14%"><strong><?= $this->lang->line('lang_banner_first');?></strong></td><td>&nbsp;<strong>:</strong>&nbsp;</td>
			<td><img src="<?= base_url();?>images/homebanner/<?= (!empty($banner_data))? $banner_data->image : '' ;?>" class="img-responsive ad_home_top_cate"/></td>
			</tr>

			<tr class="bg">
				<td class="first"><strong class="manten-th"><?= $this->lang->line('lang_banner_first_text');?></strong></td>
				<td class="last">
				<label><?= (!empty($banner_data))? $banner_data->text : '' ;?></label>
				</td>
				<td></td>
			</tr>

			<tr class="bg">
				<td class="first"><strong class="manten-th"><?= $this->lang->line('lang_banner_first_link');?></strong></td>
				<td class="last">
				<label><?= (!empty($banner_data))? $banner_data->link : '' ;?></label>
				</td>
				<td></td>
			</tr>			
			</table>
		<?php }?>	

		<?php if  ($this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
            <div style="background-color: #5d5d5d; color:white;" class=" panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_home_page_banner');?> (<?php echo $this->session->userdata("data_update_lang");?>)</h2></div>
        <?php }//print_r($banner_data_curr_lang);?>	

        <div class="sct_right">
           	<div class="table">
               <small style="color:#F00"><?= $this->lang->line('lang_banner_image_size');?>1500x300px</small>
				<table class="table table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0" width="100%" >
				  <form name="edit_homebanner" action="#" method="post" enctype="multipart/form-data" >
					<tr class="bg">
						<td class="first" width="30%"><strong class="manten-th"><?= $this->lang->line('lang_banner_first');?></strong></td>
						<td class="last" width="50%">
                        <input type="file" class="form-control" name="banner1" />
                        </td>
						<td><input type="hidden" value="<?= (!empty($banner_data_curr_lang))? $banner_data_curr_lang->image:'';?>" name="hid_banner1" /></td>
					</tr>
					<?php if (!empty($banner_data_curr_lang)){?>
                    <tr class="bg">
						<td class="first" width="30%"></td>
						<td class="last" width="50%">
                        <img src="<?= base_url();?>images/homebanner/<?= $banner_data_curr_lang->image;?>"  class="img-responsive ad_home_top_cate"/>
                        </td>
						<td></td>
					</tr>
					<?php }?>

					<tr class="bg">
						<td class="first" width="30%"><strong class="manten-th"><?= $this->lang->line('lang_banner_first_text');?></strong></td>
						<td class="last" width="50%">
                        <input type="text" class="form-control" name="banner1_text" value="<?= (!empty($banner_data_curr_lang))? $banner_data_curr_lang->text:'';?>" />
                        </td>
						<td></td>
					</tr>
                    <tr class="bg">
						<td class="first" width="30%"><strong class="manten-th"><?= $this->lang->line('lang_banner_first_link');?></strong></td>
						<td class="last" width="50%">
                        <input type="text" class="form-control" name="banner1_link" value="<?= (!empty($banner_data_curr_lang))? $banner_data_curr_lang->link:'';?>" />
                        </td>
						<td></td>
					</tr>                    
					<tr class="bg">
						<td class="first" width="30%"></td>
						<td class="last" width="50%">
                        <input class="btn btn-primary set-btn" type="submit" name="btn_banner" value="change" />
                        </td>
						<td></td>
					</tr>
                </form>
            </table>
			</div>
                      
                  
                </div>
    </div>
    
  </div>
</div>


