<br />
<div class="panel panel-default">
  <?php if ($gcurrPageName == "CategoryEdit") {?>
  <div class="panel-heading clearfix"><h1 class="page-header"><?= $this->lang->line('lang_edit_categories');?> <?= $this->lang->line('lang_page');?> (<?php echo $this->session->userdata("user_lang");?>)</h1></div>
  <?php }?>

  <div class="panel-body">
  	<div class="col-md-12">
    
    <?php if  ($gcurrPageName == "CategoryEdit" && $this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
    <table class="listing form table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0">
    <tr>
    <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_category_name');?></strong></td>
          <td>&nbsp;<strong>:</strong>&nbsp;</td>
    <td><label><?= (isset($data1))? $data1[0]->name : '' ;?></label></td>
    </tr>
    <tr>
    <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_category_icon');?></strong></td>
          <td>&nbsp;<strong>:</strong>&nbsp;</td>
    <td><label><?= (isset($data1))? $data1[0]->cat_icon : '' ;?></label></td>
    </tr>
    <tr>
    <td class="first" style="text-align:right" width="30%"><strong><?= $this->lang->line('lang_type_category');?></strong></td>
          <td>&nbsp;<strong>:</strong>&nbsp;</td>
          <td class="last" width="50%"> <?= $this->lang->line('lang_sell_buyer');?>
            <input type="radio" name="cat_type" value="sell" <?= ($data1[0]->cat_type=='sell')? 'checked="checked"':'';?> />
          </td>
    </tr>
    </table>
    <?php } //print_r($data1_curr_lang);?>

    <?php if ($gcurrPageName == "CategoryEdit" && $this->session->userdata("data_update_lang")!=$this->session->userdata("user_lang")) {?>
      <div style="background-color: #5d5d5d; color:white;" class="panel-heading clearfix"><h1 class="page-header"><?= $this->lang->line('lang_edit_categories');?> (<?php echo $this->session->userdata("data_update_lang");?>)</h1></div>
      <?php }?>

        <div class="sct_right">
              <div  id="product_list">
                <div class="table_wrapper">
                  <div class="table_wrapper_inner">
                    <table class="listing form table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0" width="100%">
                      <form name="edit_categories" action="" method="post" enctype="multipart/form-data">
                        <tr class="bg">
                          <td class="first" width="30%"><strong><?= $this->lang->line('lang_category_name');?></strong></td>
                          <td class="last" width="50%"><input type="text" class="form-control text" name="name" value="<?= (!empty($data1_curr_lang))? $data1_curr_lang[0]->name:'';?>"/></td>
                          <td><div id="name"> </div></td>
                        </tr>
                       
                        <tr class="bg">
                          <td class="first" width="30%"><strong><?= $this->lang->line('lang_category_icon');?></strong></td>
                       <td class="last" width="50%"><input type="text" class="form-control text" name="icon" placeholder="fa fa-" value="<?= (!empty($data1_curr_lang))? $data1_curr_lang[0]->cat_icon:'';?>"/></td>
                          <td><div id="icon"> </div></td>
                        </tr>
                        <tr class="bg">
                          <td class="first" width="30%"><strong><?= $this->lang->line('lang_type_category');?> </strong></td>
                          <td class="last" width="50%"> <?= $this->lang->line('lang_sell_buyer');?>
                            <input type="radio" name="cat_type" value="sell" <?= (!empty($data1_curr_lang))? ($data1_curr_lang[0]->cat_type=='sell')? 'checked="checked"':'':'';?> />
                          </td>
                          <td><div id="cattype"> </div></td>
                        </tr>
                       
                        <tr>
                          <td colspan="3"><input name="id" type="hidden" value="<?= $data1[0]->cat_id;?>" />
                            <input name="submit" class="btn btn-primary set-btn" type="submit" value="Save"/></td>
                        </tr>
                      </form>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    </div>
  </div>
</div>