<br />
<div class="panel panel-default">
  <div class="panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_add_new_currency_details');?></h2></div>
  <div class="notibar msgsuccess">
    <?php if($this->session->flashdata('Success')){?>                   
                        <div class="alert alert-success" >
                          <?= $this->session->flashdata('Success');?></div>
                        <?php }?>
                    </div>
  <div class="panel-body">
  	<div class="col-md-12">
        <div class="sct_right">
                   <form name="add_currency" action="<?= base_url();?>AddCurrency?id=<?php if(isset($currencyedit->id)){ echo $currencyedit->id;}?>" method="post" enctype="multipart/form-data"  class="search_form general_form">
                   
                    <fieldset>
                       <div class="forms">
                       
                 	
                    <div class="row">
                    	<div class="col-md-6">
                        
                            <label><?= $this->lang->line('lang_currency_name');?>:</label>
                            <div class="inputs">
                                <span class="input_wrapper">
       							<input type="text" class="text form-control" name="currency"  value="<?php if(isset($currencyedit->currency)){ echo $currencyedit->currency;}?>" placeholder="Enter Currency" />     </span>
                                  <span class="text text-danger"><?= form_error('currency');?>
                                  </span>
                                <span class="system positive" id="name"></span>
                            </div>
                        </div>    
                   		
                        <div class="col-md-6">
                            <label>Symbol:</label>
                            <div class="inputs">
                                <span class="input_wrapper">
       							<input type="text" class="text form-control" name="symbol"  value="<?php if(isset($currencyedit->symbol)){ echo $currencyedit->symbol;}?>"  placeholder="Enter Symbol"/>  </span>
                                <span class="text text-danger"><?= form_error('symbol');?></span>
                                <span class="system positive" id="title"></span>
                            </div>
                        </div>    
                    </div>
					
					
                    <div class="row">
                    	<div class="col-md-6">
                          <div class="buttons"> <span class="button send_form_btn"><span></span>
                            <input class="btn btn-primary set-btn" name="submit" type="submit" value="Submit" />
                            </span> </div>
                        </div>
                        </div>
					
                    </div>
                    </fieldset>
				  </form>
                </div>
    </div>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading clearfix"> <h2 class="page-header"><?= $this->lang->line('lang_select_default_currency');?></h2></div>
  <div class="panel-body">
  	<div class="col-md-12">
        <div class="sct_right">
                   <form name="deff_currency" action="<?= base_url();?>DefaultCurrency" method="post" enctype="multipart/form-data"  class="search_form general_form">
                   
                    <fieldset>
                       <div class="forms">
                   
					<div class="row">
                            <label><?= $this->lang->line('lang_select_currency');?> : &nbsp;&nbsp;&nbsp;</label>
                            <div class="inputs">
                              <?php if($currnecydata){?>
                                <select class="form-control" name="def_curr" >
                                <?php foreach($currnecydata as $data){?>
                         
                                <?php if($data->defcurr_val=='Y'){?>
                                	<option selected="selected" value="<?= $data->id;?>" ><?= $data->currency;?></option>
                                <?php }
                                else{?>
                                	<option value="<?= $data->id;?>" >
                                    <?= $data->currency;?></option>
                                 <?php }?>
                           <?php }?>
                                </select>
                            <?php }?> 
                                <span class="system positive" id="title"></span>
                            </div>
                    </div>
					
                    <div class="row">
                          <div class="buttons"> <span class="button send_form_btn"><span></span>
                            <input class="btn btn-primary set-btn" name="default" type="submit" value="Submit" />
                            </span> </div>
                        </div>
					
                    </div>
                    </fieldset>
				  </form>
                </div>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_show_currency_listing');?></h2></div>
  <div class="panel-body">
  	<div class="col-md-12">
        <div class="sct_right">
              <div  id="product_list"> 
               
                <div class="table_wrapper">
                  <div class="table_wrapper_inner">
                    <table class="listing table-striped table-bordered table-responsive" cellpadding="2" cellspacing="0" width="100%">
                      <thead align="left" >
                        <tr>
                          <th width="50"><span class="manten-th">Sr.No.</span></th>
                          <th width="150"><span class="manten-th"><?= $this->lang->line('lang_currency_name');?></span></th>
                          <th width="150"><span class="manten-th"><?= $this->lang->line('lang_symbol');?></span></th>
                          <th width="80"><span class="manten-th"><?= $this->lang->line('lang_action');?></span></th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      <?php if($currnecydata){
                       $i=$num+1;
                      foreach($currnecydata as $data){?>
                      <tr>
                        <td><?= $i++;?></td>
                        <td><?= $data->currency;?></td>
                        <td><?= $data->symbol;?></td>
                        <td >
                        <?php if($data->status =='Y'){?> 
                        <a href="<?= base_url();?>CurrencyApprove/<?= $data->status;?>/<?= $data->id;?>"><button type="button" title="Approve" class="btn btn-success btn-circle"><i class="fa fa-key"></i></button></a> 
                        <?php }
                        else{?> 
                        <a href="<?= base_url();?>CurrencyApprove/<?= $data->status;?>/<?= $data->id;?>"><button type="button" title="Unapprove" class="btn btn-default btn-circle"><i class="fa fa-key"></i></button></a> 
                        <?php }?>
                        
                        <a href="<?= base_url();?>EditCurrency?id=<?= $data->id;?>"><button type="button" title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button></a>
                          <a href="<?= base_url();?>DeleteCurrency/<?= $data->id;?>" onclick="return confirm('Do You  want to delete ?');"><button type="button" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>  </button></a></td>
                      </tr>
                     <?php }?>
                      <tr>
                        <td colspan="8" align="center">
                                                                <form name="frm_pagi" action="" method="post">
                                                                    <input type="hidden" name="pageval" id="pagevalid" value="{$pageval}" />
                                                                  <?= $showPagination;?> 
                                                                </form>
                                                           </td>
                      </tr>
                    <?php }
                    else{?>
                      <tr>
                        <td colspan="7" align="center"><?= $this->lang->line('lang_record_not_found');?></td>
                      </tr>
                      <?php }?>
                      <tbody>
                    </table>
                  </div>
                </div>                
              </div>
            </div>
    </div>
  </div>
</div>