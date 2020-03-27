<br />
<div class="panel panel-default">
  <div class="panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_success_story_list');?></h2></div>
  <div class="panel-body">
  	<div class="col-md-12 ">
    	<div class="sct_right" style="width:95%; margin-left:30px;">
              <div  id="product_list">
              <div class="col-md-12 hello">
              <div class="row">
              <form name="search_customer" method="post" action="">
              <div class="col-md-11"><div class="row"><input type="text" class="form-control" name="search_val" placeholder="<?= $this->lang->line('lang_enter_story');?>" value="<?php $search_val;?>" /></div></div>
              <div class="col-md-1"><div class="row"><input type="submit" class="btn btn-primary" name="submit" value="Search" /></div></div>
               </form>
               </div>
              </div>   
                <div class="table_wrapper">
                  <div class="table_wrapper_inner">
                    <table class="table-striped table-bordered table-responsive" border="0" cellpadding="0" cellspacing="0"  width="100%" align="center">
                      <tbody>
                        <tr>
                          <th class="first"><span class="manten-th"><?= $this->lang->line('lang_sr_no');?></span></th>
                          <th><span class="manten-th"><?= $this->lang->line('lang_image');?></span></th>
                          <th><span class="manten-th"><?= $this->lang->line('lang_title');?></span></th>
                          <th><span class="manten-th"><?= $this->lang->line('lang_description');?></span></th>
                          <th><span class="manten-th"><?= $this->lang->line('lang_entry_date');?></span></th>
                          <th class="last"><span class="manten-th"><?= $this->lang->line('lang_action');?></span></th>
                        </tr>
                      <?php if($success_stories_data){
                        $i = $num;
                        foreach ($success_stories_data as $data) {
                         $i++;
                         ?>
                        <tr>
                        <td class="first style3"><?= $i; ?></td>
                        <td><img src="<?= base_url();?>images/Success_Stories/<?= $data->image_path;?>" /></td>
                        <td><?= $data->title ;?></td>
                        <td><?= $data->description;?></td>
                        <td><?= $data->entry_date;?></td>
                        <td class="last">
                          <?php if($data->status=='Y'){?> 
						<a href="<?= base_url().'ApproveStorie/'.$data->status.'/'.$data->id;?>"><button type="button" title="Approve" class="btn btn-success btn-circle"><i class="fa fa-key"></i></button></a> <?php } else{ ?> 
						<a href="<?= base_url().'ApproveStorie/'.$data->status.'/'.$data->id;?>"><button type="button" title="Unapprove" class="btn btn-default btn-circle"><i class="fa fa-key"></i></button></a><?php } ?> 
						<a href="<?= base_url().'EditStorie/'.$data->id;?>"><button type="button" title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button></a> 
						<a href="<?= base_url().'StorieDelete/'.$data->id;?>" onclick="return confirm('Do You  want to delete ?');"><button type="button" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>  </button></a></td>
                      </tr>
                      <?php } ?>
                      <tr>
                        <td colspan="8" align="center">
                                                               
                                                                  <?= $showPagination;?> 
                                                                </form>
                                                           </td>
                      </tr>
                      <?php } else{ ?>
                      
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