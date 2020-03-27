<br />
<div class="panel panel-default">
  <div class=" panel-heading clearfix"><h2 class="page-header">Seo (<?php echo $this->session->userdata("user_lang");?>)</h2></div>
  <div class="panel-body">
  <div class="col-md-12">
    	<div class="sct_right">
              <div  id="product_list">
                <div class="table_wrapper">
                  <div class="table_wrapper_inner">
                    <table class="listing  table-striped  table-bordered table-responsive" cellpadding="2" cellspacing="0">
      <tr>
        <th class="first"><span class="manten-th"><?= $this->lang->line('lang_sr_no');?></span></th>
        <th><span class="manten-th"><?= $this->lang->line('lang_name');?></span></th>
        <th><span class="manten-th"><?= $this->lang->line('lang_title');?></span></th>
        <th><span class="manten-th"><?= $this->lang->line('lang_keywords');?></span></th>
        <th><span class="manten-th"><?= $this->lang->line('lang_description');?></span></th>
        <th class="last" style="width:12%;"><span class="manten-th"><?= $this->lang->line('lang_action');?></span></th>
      </tr>
      <?php if ($seodata)
      {
         $i=$num+1;
        foreach($seodata as $data){?>
      <tr>
        <td class="first style3"><?= $i++;?></td>
        <td><?=$data->name;?></td>
        <td><?=$data->title;?></td>
        <td><?=$data->keyword;?></td>
        <td><?=$data->des;?></td>
        <td class="last"><a href="<?=base_url();?>edit_seo/<?=$data->id;?>"><button type="button" title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button></a> <a href="<?= base_url();?>show_seo_detail/<?=$data->id;?>"><button type="button" title="View" class="btn btn-warning btn-circle"><i class="fa fa-eye"></i> </button> </a></td>
      </tr>
      <?php }?>
      <tr>
        <td colspan="8" align="center"><?= $showPagination;?></td>
      </tr>
    <?php }
      else{?>
      <td colspan="8"><center><?= $this->lang->line('lang_record_not_found');?></center></td>
        <?php }?>
    </table>
                  </div>
                </div>
              </div>
            </div>
    </div>
  </div>
</div>