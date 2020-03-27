<br />
<div class="panel panel-default">
  <div class="panel-heading clearfix"><h2 class="page-header">News (<?php echo ucfirst($this->session->userdata('user_lang'));?>)</h2></div>
  <div class="panel-body">
  	<div class="col-md-12">
        <div class="sct_right">
              <div  id="product_list">
              <div class="col-md-12 hello">
              <div class="row">
              <form name="search_customer" method="post" action="">
              <div class="col-md-11"><div class="row"><input type="text" class="form-control" name="search_val" placeholder="Enter Title." value="<?= $search_val;?>" /></div></div>
              <div class="col-md-1"><div class="row"><input  class="btn btn-primary" type="submit" name="submit" value="Search" /></div></div>
               </form>
               </div>
              </div>
                <div class="table_wrapper">
                  <div class="table_wrapper_inner">
                    <table class="table-striped table-bordered table-responsive" border="0" cellpadding="0" cellspacing="0"  width="100%" align="center">
                      <thead>
                        <tr>
                          <th width="5%" class="first"><span class="manten-th"><?= $this->lang->line('lang_sr_no');?></span></th>
                          <th width="10%"><span class="manten-th"><?= $this->lang->line('lang_image');?></span></th>
                          <th width="15%"><span class="manten-th"><?= $this->lang->line('lang_title');?></span></th>
                          <th width="43%"><span class="manten-th"><?= $this->lang->line('lang_description');?></span></th>
                          <th width="10%"><span class="manten-th"><?= $this->lang->line('lang_entry_date');?></span></th>
                          <th width="17%" class="last"><span class="manten-th"><?= $this->lang->line('lang_action');?></span></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if($news_show_data){?>
                      <?php $i = $num;
                      foreach ($news_show_data as $data) { $i++; ?>
                      <tr>
                        <td class="first style3"><?= $i ;?></td>
                        <td><img src="<?= base_url();?>images/news/<?= $data->image_path;?>" /></td>
                        <td><?= $data->title;?></td>
                        <td><?= $data->description;?></td>
                        <td><?= $data->entry_date;?></td>
                        <td class="last"> <?php if($data->status=='Y'){?> 
						<a href="<?= base_url().'NewsApproved/'.$data->status.'/'.$data->id;?>">
              <button type="button" title="Approve" class="btn btn-success btn-circle"><i class="fa fa-key"></i></button>
            </a>
             <?php } else { ?> 
						<a href="<?= base_url().'NewsApproved/'.$data->status.'/'.$data->id;?>">
              <button type="button" title="Unapprove" class="btn btn-default btn-circle"><i class="fa fa-key"></i></button>
            </a> 
            <?php } ?>
						<a href="<?= base_url().'NewsEdit'.'/'.$data->id;?>">
              <button type="button" title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button>
            </a> 
						<a href="<?= base_url().'NewsDelete'.'/'.$data->id;?>" onclick="return confirm('Do You  want to delete ?');">
              <button type="button" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>  </button>
            </a>
          </td>
                      </tr>
                      <?php } ?>
                      <tr>
                        <td colspan="8" align="center">
                                                                <?= $showPagination;?>
                      </tr>
                      <?php } else {?>
                      
                        <td colspan="8"><?= $this->lang->line('lang_record_not_found');?></td>
                        <?php } ?>
                          </tbody>
                    </table>
                  </div>
                </div>
               
              </div>
             
            </div>
    </div>
  </div>
</div>