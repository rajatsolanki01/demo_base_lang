<br />
<div class="panel panel-default">
  <div class=" panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_show_staff_user');?> </h2></div>
  <div class="panel-body">
    <?php 
    if($this->session->flashdata('StaffUserMsg'))
    {?>
      <div class="col-md-12">
        <div class="alert alert-success" role="alert"> <?= $this->session->flashdata('StaffUserMsg');?> </div>
      </div>
    <?php }?>
  	<div class="col-md-12">
    	<div class="sct_right" style="width:95%; margin-left:30px;">
        <div  id="product_list">
          <form name="search_customer" method="get" action="">
          	<div class="row">
              	<div class="col-md-11">
                  <div class="row">
                  	<input style="margin-left:15px;" class="form-control" placeholder="<?= $this->lang->line('lang_search_users');?>" type="text" name="search_val" value="<?= $search_val;?>" />
                  </div>
                  </div>
                  
                  <div class="col-md-1">
                  	<div class="row">
                      	<input class="btn btn-primary"  type="submit" name="submit" value="Search"  style="margin-left:-5px;"/>
                      </div>
                  </div>
              </div>
          </form>
          <br />
          <div class="table_wrapper">
            <div class="table_wrapper_inner">
              <table class="table-bordered table-striped table-responsive" border="0" cellpadding="0" cellspacing="0"  width="100%" align="center">
                <tbody>
                  <tr>
                    <th class="first"><span class="manten-th"><?= $this->lang->line('lang_sr_no');?></span></th>
                    <th><span class="manten-th"><?= $this->lang->line('lang_name');?></span></th>
                    <th><span class="manten-th"><?= $this->lang->line('lang_email');?></span></th>
                    <th><span class="manten-th"><?= $this->lang->line('lang_designation');?></span></th>
                    <th><span class="manten-th"><?= $this->lang->line('lang_mobile_no');?></span></th>
                    <th><span class="manten-th"><?= $this->lang->line('lang_join_date');?></span></th>
                    <th class="last"><span class="manten-th"><?= $this->lang->line('lang_action');?></span></th>
                  </tr>
                  <?php
                  if($usersdata)
                  {
                    $i=1;
                    foreach ($usersdata as $val) 
                    {?>
                      <tr>
                        <td class="first style3"><?= $i++;?></td>
                        <td><?= $val->name;?></td>
                        <td><?= $val->user_name;?></td>
                        <td><?= $val->designation;?></td>
                        <td><?= $val->mobile_no;?></td>
                        <td><?= date('d/m/Y',strtotime($val->join_date));?></td>
                        <td class="last">
                          <?php
                          if($val->status == 'Y')
                          {?>
                            <a href="<?= base_url().'StaffUserApprove/'.$val->status.'/'.$val->id;?>"><button type="button" title="Approve" class="btn btn-success btn-circle"><i class="fa fa-key"></i></button></a> 
                          <?php }
                          else{?> 
                            <a href="<?= base_url().'StaffUserApprove/'.$val->status.'/'.$val->id;?>"><button type="button" title="Unapprove" class="btn btn-default btn-circle"><i class="fa fa-key"></i></button></a> 
                          <?php }?>

                          <a href="<?= base_url().'EditStaffUser/'.$val->id;?>"><button type="button" title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button></a> 
                          <a href="<?= base_url().'StaffUserDetail/'.$val->id;?>"><button type="button" title="View" class="btn btn-warning btn-circle"><i class="fa fa-eye"></i> </button></a> 
                          <a href="<?= base_url().'DeleteStaffUser/'.$val->id;?>" onclick="return confirm('Do You  want to delete ?');"><button type="button" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>  </button></a>
                        </td>
                      </tr>
                    <?php } ?>
                    <tr>
                      <td colspan="8"><center><?= $showPagination;?></center></td>
                    </tr>
                  <?php }
                  else {?>
                    <tr><td colspan="8"><?= $this->lang->line('lang_record_not_found');?></td></tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>