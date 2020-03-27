<br />
<div class="panel panel-default"> 
  <div class="panel-heading clearfix"><h1 class="page-header"><?= $this->lang->line('lang_all_mails');?></h1></div>
  <div class="panel-body">
  	<div class="col-md-12">
        <div class="sct_right">
              <div  id="product_list">                  
                <div class="table_wrapper">
                  <div class="table_wrapper_inner">
                    <table class="listing  table-striped  table-bordered table-responsive" cellpadding="0" width="100%" cellspacing="0">
					<tr>
						<th class="first" width="5%"><span class="manten-th">Sr.No.</span></th>						
						<th><span class="manten-th"><?= $this->lang->line('lang_sender_name');?></span></th>
						<th><span class="manten-th"><?= $this->lang->line('lang_sender_email');?></span></th>
						<th><span class="manten-th"><?= $this->lang->line('lang_mobile');?></span></th>
						<th><span class="manten-th"><?= $this->lang->line('lang_subject');?></span></th>
            <th><span class="manten-th"><?= $this->lang->line('lang_message');?></span></th>
						<th><span class="manten-th"><?= $this->lang->line('lang_date');?></span></th>
            <th class="last" width="12%;"><span class="manten-th"><?= $this->lang->line('lang_action');?></span></th></th>
					</tr>
          <?php if ($customerdata){
               $i=$num+1;
             foreach($customerdata as $data){?>
							<tr>
								<td class="first style3"><?= $i++;?></td>								
								<td><?=$data->name;?></td>
                                <td><?=$data->email;?></td>
                                <td><?=$data->mobile;?></td>
								<td><?= character_limiter($data->subject,20);?></td>
                                <td><?=$data->message;?><a type="button" class="read_more" data-toggle="modal" data-target="#myModal_<?=$data->id;?>"><?=$this->lang->line('lang_read_more');?></a>...</td>
								<td><?= $data->date;?></td>
								<td class="last"> 
								<a href="mailto:EMAILADDRESS"><button type="button" title="Mail" class="btn btn-info btn-circle"><i class="fa fa-envelope"></i>  </button></a>
								  <a href="<?=base_url();?>DeleteInquiry/<?=$data->id;?>" onclick="return confirm('Do You  want to delete ?');"><button type="button" title="Delete" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>  </button></a>
								</td>
							</tr>
                              <div id="myModal_<?= $data->id;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?= $this->lang->line('lang_message');?></h4>
      </div>
      <div class="modal-body">		  
        <p><?= $data->message;?></p>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('lang_close');?></button>
      </div>
    </div>
</div>
</div>
					<?php }?>
				 <tr>
                                                            <td colspan="9">
                                                                <form name="frm_pagi" action="" method="post">
                                                                    <input type="hidden" name="pageval" id="pagevalid" value="{$pageval}" />
                                                                 <?= $showPagination;?> 
                                                                </form>
                                                            </td>
                                                        </tr>	
				
					<?php }
          else{?>
						<td colspan="9"><?= $this->lang->line('lang_record_not_found');?></td>
          <?php }?>
					
							
				</table>
                  </div>
                </div>                   
              </div>
            </div>
    </div>
  </div>
</div>