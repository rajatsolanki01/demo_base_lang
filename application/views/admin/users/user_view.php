<br />
<div class="panel panel-default">
  <div class=" panel-heading clearfix">
    <h2 class="page-header"><?= $this->lang->line('lang_users');?></h2>
  </div>
  <div class="panel-body">
    <div class="col-md-12">
  		<div class="sct_right">
        <?= $this->session->flashdata('UserSuccess');?>
        <div  id="product_list">
          <div class="row">
            <form name="search_customer" method="get" action="">
            	<div class="col-md-11">
              	<div class="row"><input style="margin-left:15px;" placeholder="Enter a name for search users" class="form-control" type="text" name="search_val" value="<?= $search_val;?>" />
                      </div></div>
                  <div class="col-md-1">
                  <div class="row"><input class="btn btn-primary"  type="submit" name="submit" value="Search" /></div>
                  </div>
                   </form>
                </div>
                <div class="table_wrapper">
                  <div class="table_wrapper_inner">
                    <div id='search_val' style="display:inline; margin-left:4px;">  </div>
                      <table class="table-bordered table-striped table-responsive" width="100%" >
                        <tr>
                          <td width="20%"></td>
                          <td width="25%"></td>
                          <td align="right" width="55%"><div id="name"> </div></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="table_wrapper">
                    <div class="table_wrapper_inner">
                      <table class="table-bordered table-responsive table-striped" border="0" cellpadding="0" cellspacing="0"  width="100%" align="center">
                        <tbody>
                          <tr>
                            <th class="first"><span class="manten-th"><?= $this->lang->line('lang_sr_no');?></span></th>
                            <th><span class="manten-th"><?= $this->lang->line('lang_name');?></span></th>
                            <th><span class="manten-th"><?= $this->lang->line('lang_email');?></span></th>
                            <!-- <th><span class="manten-th"><?= $this->lang->line('lang_type');?></span></th> -->
                            <th><span class="manten-th"><?= $this->lang->line('lang_mobile_no');?></span></th>
                            <th><span class="manten-th"><?= $this->lang->line('lang_join_date');?></span></th>
                            <th class="last"><span class="manten-th"><?= $this->lang->line('lang_action');?></span></th>
                          </tr>
                          <?php
                          if($usersdata)
                          {
                            $i=$num+1;
                            foreach ($usersdata as $userVal) 
                            {?>
                              <tr>
                                <td class="first style3"><?= $i;?></td>
                                <td><?= $userVal->name;?></td>
                                <td><?= $userVal->email;?></td>
                                <!-- <td>
                                  <?php 
                                  if($userVal->buyer=='Y'){?>
                                    <span class="label label-primary font_bg_lable"><?= $this->lang->line('lang_buyer');?></span> 
                                  <?php }
                                  else{?>
                                    <span class="label label-success font_bg_lable"><?= $this->lang->line('lang_seller');?></span>
                                  <?php }?>
                                </td> -->
                                <td><?= $userVal->mobile_no;?></td>
                                <td><?= date('d/m/Y',strtotime($userVal->join_date));?></td>
                                <td class="last"> 
                                  <?php
                                  if($userVal->status == 'Y')
                                  {?>
                                    <a href="<?= base_url().'UserApprove/'.$userVal->status.'/'.$userVal->id;?>"> <button type="button" data-toggle="tooltip" title="Approve" class="btn btn-success btn-circle"><i class="fa fa-key"></i>
                                    </button></a>
                                  <?php }
                                  else
                                  {?> 
                                    <a href="<?= base_url().'UserApprove/'.$userVal->status.'/'.$userVal->id;?>"><button type="button" data-toggle="tooltip" title="Unapprove" class="btn btn-default btn-circle"><i class="fa fa-key"></i>
                                    </button></a> 
                                  <?php }?>
                                  <a href="<?= base_url().'EditUser/'.$userVal->id;?>"><button type="button" data-toggle="tooltip" title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button></a> 
                                  <a href="<?= base_url().'UserDetail/'.$userVal->id;?>"><button type="button" data-toggle="tooltip" title="View" class="btn btn-warning btn-circle"><i class="fa fa-eye"></i> </button></a> 
                                  <a href="<?= base_url().'DeleteUser/'.$userVal->id;?>" onclick="return confirm('Do You  want to delete ?');"><button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>  </button></a>
                                </td>
                              </tr>
                            <?php $i++;}?>
                              <tr>
                                <td colspan="8"><center><?php echo $showPagination;?></center></td>
                              </tr>
                          <?php }
                          else
                          {?>
                            <td colspan="8"><?= $this->lang->line('lang_record_not_found');?></td>
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