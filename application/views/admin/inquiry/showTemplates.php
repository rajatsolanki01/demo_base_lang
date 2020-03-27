<br />
<div class="panel panel-default">
  <div class="panel-heading clearfix"> <h2 class="page-header"><?= $this->lang->line('lang_show_mails');?></h2> </div>
  <div class="panel-body">
  	<div class="col-md-12">
        <div class="sct_right">
              <div  id="product_list">
                <div class="table_wrapper">
                  <div class="table_wrapper_inner">
                    <table class="listing table-striped table-bordered table-responsive" cellpadding="0" cellspacing="0" align="center" width="100%">
					<tr>
						<th class="first"><span class="manten-th"><?= $this->lang->line('lang_sr_no');?></span></th>
						<th><span><?= $this->lang->line('lang_title');?></span></th>
						<th><span class="manten-th"><?= $this->lang->line('lang_subject');?></span></th> 
						<th class="last"><span class="manten-th"><?= $this->lang->line('lang_action');?></span></th>
					</tr>
					<?php if($mailsdata){
						$i=1;?>

						<?php foreach($mailsdata as $data){?>
							<tr>
								<td class="first style3"><?= $i++;?></td>
								<td width="27%"><?= $data->title;?></td>
								<td><?= $data->subject;?></td>
								<td class="">
								  <a href="<?= base_url();?>EditMail/<?= $data->id;?>"><button type="button" title="Edit" class="btn btn-info btn-circle"><i class="fa fa-pencil-square-o"></i></button></a>
								</td> 
							</tr>
						<?php }?>
					<?php }
					else{?>
						<td colspan="8"><?= $this->lang->line('lang_record_not_found');?></td>
					<?php }?>		
				</table>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>