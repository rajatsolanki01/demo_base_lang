<br />
<div class="panel panel-default">
  <div class="panel-heading clearfix"><h2 class="page-header"> <?= $this->lang->line('lang_cms_page_list');?></h2></div>
  <div class="panel-body">
  	<div class="sct_right">
              <div  id="product_list">
                <div class="table_wrapper">
                   
          <table width="100%" align="center" class="datatable sortable full table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0">
            <thead >
              <tr>
                <th>Sr.No.</th>
                <th><?= $this->lang->line('lang_title');?></th>
                <th><?= $this->lang->line('lang_entry_date');?></th>
                <th><?= $this->lang->line('lang_action');?></th>
              </tr>
            </thead>
            <tbody>
            
            <?php if($all_mattercms){?>
              
              <?php $i ='0';
              foreach ($all_mattercms as $data) {
                $i++;
              ?>
            <tr>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;<?= $i;?></td>
              <td style="padding-left:125px;"><?= $data->title;?></td>
              <td ><?= $data->entry_date;?></td>
              <td style="padding-left:70px;"><a href="<?= base_url().'CmsPagesEdit'.'/'.$data->id;?>"><button type="button" title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button></a> </td>
            </tr>
            <?php } ?>
            <tr>
              <td colspan="7" align="center"></td>
            </tr>
            <?php } else {?>
            <tr>
              <td colspan="7" align="center"><?= $this->lang->line('lang_record_not_found');?></td>
            </tr>
            <?php } ?>
            <tbody>
          </table>
                  
                </div>
               
                
              </div>
    
            </div>
  </div>
</div>