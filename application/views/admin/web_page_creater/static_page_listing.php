<br />
<div class="panel panel-default">
  <div class="panel-heading"><div class="panel-heading clearfix"><h1 class="page-header"><?= $this->lang->line('lang_static_page_list');?> (<?php echo ucfirst($this->session->userdata('user_lang'));?>)</h1></div></div>
  <div class="panel-body">
  <div class="col-md-12">
       <div class="sct_right">
              <div  id="product_list">
                <div class="table_wrapper">
                   
          <table width="100%" class="datatable sortable full table-striped  table-bordered table-responsive" cellpadding="0" cellspacing="0" >
            <thead >
              <tr>
                <th><span class="manten-th"><?= $this->lang->line('lang_sr_no');?></span></th>
                <th><span class="manten-th"><?= $this->lang->line('lang_title');?></span></th>
                <th><span class="manten-th"><?= $this->lang->line('lang_entry_date');?></span></th>
                <th><span class="manten-th"><?= $this->lang->line('lang_action');?></span></th>
              </tr>
            </thead>
            <tbody>
            
            <?php if($all_matter){?>
              <?php 
              $i=$num;
              foreach ($all_matter as $data) {
                $i++;
              ?>
            <tr>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;<?= $i ;?></td>
              <td style="padding-left:125px;"><?= $data->title;?></td>
              <td ><?= $data->entry_date;?></td>
              <td style="padding-left:70px;">
                <a href="<?= base_url().'StaticPage'.'/'.$data->id;?>">
                <button type="button" title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button>
              </a> 
                <a href="<?= base_url().'Deleted'.'/'.$data->id;?>" onclick="return confirm('Do You  want to delete ?');" title="Delete">
                  <button type="button" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>  </button>
                </a>
              </td>
            </tr>
            <?php } ?>
            <tr>
                                                            
                                                                 <td colspan="4" ><center><?= $showPagination;?></center></td>
                                                            
                                                        </tr>
     <?php } else{?>
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
</div>