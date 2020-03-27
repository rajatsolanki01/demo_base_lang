<br />
<div class="panel panel-default">
  <div class=" panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_details_of_users');?></h2></div>
  <div class="panel-body">
  	<div class="col-md-12">
        <div class="sct_right">
              <div  id="product_list"> 
                <div class="table_wrapper">
                  <div class="table_wrapper_inner">
                    <table class="table-striped table-bordered table-responsive" align="center" border="0" cellpadding="6" cellspacing="0" style="width:100%;">
                      <tr>
                        <td colspan="3"><font>
                          <h3><?= $this->lang->line('lang_details_of').' '.$userdetail->name;?></h3>
                          </font></td>
                      </tr>
                      <tr>
                        <td width="30%"><?= $this->lang->line('lang_name');?></td>
                     
                        <td><?= $userdetail->name;?></td>
                      </tr>
                      <tr>
                        <td width="30%"><?= $this->lang->line('lang_e_mail');?></td>
                     
                        <td><?= $userdetail->user_name;?></td>
                      </tr>
                      <tr>
                        <td><?= $this->lang->line('lang_designation');?></td>
                  
                        <td><?= $userdetail->designation;?></td>
                      </tr>
                      <tr>
                        <td><?= $this->lang->line('lang_mobile');?></td>
                  
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
                    </table>
                  </div>
                </div>
              </div>
            </div>
    </div>
  </div>
</div>