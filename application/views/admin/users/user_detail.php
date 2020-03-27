<br />
<div class="panel panel-default">
  <div class=" panel-heading clearfix"> <h2 class="page-header">Details of Users</h2> </div>
  <div class="panel-body">
  	<div class="col-md-12">
      <div class="sct_right">
        <div  id="product_list"> 
          <div class="table_wrapper">
            <div class="table_wrapper_inner">
              <table class="table-striped table table-bordered table-responsive">
                <tr>
                  <td colspan="3"><font>
                    <h3>Details of <?= $userdetail->name;?></h3>
                  </font></td>
                </tr>
                <tr>
                  <td width="30%"><?= $this->lang->line('lang_name');?></td>
                  
                  <td><?= $userdetail->name;?></td>
                </tr>
                <tr>
                  <td width="30%"><?= $this->lang->line('lang_email');?></td>
                  
                  <td><?= $userdetail->email;?></td>
                </tr>
                <?php /*
                <tr>
                  <td><?= $this->lang->line('lang_designation');?></td>
                  
                  <td><?= $userdetail->designation;?></td>
                </tr>*/?>
                <tr>
                  <td><?= $this->lang->line('lang_mobile_no');?></td>
                  
                  <td><?= $userdetail->mobile_no;?></td>
                </tr>
                <tr>
                  <td><?= $this->lang->line('lang_city');?></td>
                  
                  <td><?= $userdetail->city;?></td>
                </tr>
                <tr>
                  <td><?= $this->lang->line('lang_state');?></td>
                  
                  <td><?= $userdetail->state;?></td>
                </tr>
                <tr>
                  <td><?= $this->lang->line('lang_country');?></td>
                  
                  <td><?= $userdetail->country;?></td>
                </tr>
                <tr>
                  <td><?= $this->lang->line('lang_address');?></td>
                  
                  <td><?= $userdetail->address;?></td>
                </tr>
                <tr>
                  <td><?= $this->lang->line('lang_user_image');?></td>
                  
                  <td>
                    <?php
                    if($userdetail->user_photo!='')
                    {?>
                      <img src="<?= base_url().'images/user_photo/'.$userdetail->user_photo;?>" width="70" height="60"/>
                    <?php }else echo 'N/A'?>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>