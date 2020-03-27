<br />
<div class="panel panel-default">
  <div class=" panel-heading clearfix"><h2 class="page-header"><?= $this->lang->line('lang_users');?></h2>
  </div>
  <div class="panel-body">
  	<div class="col-md-12">
  		<div class="sct_right">
        <div  id="product_list"> 
          <div class="table_wrapper">
            <table class="table-bordered table-responsive table-striped listing" cellpadding="2" cellspacing="0" align="center" style="width:100%;">
              <tr>
                <th class="first" width="10%"><span class="manten-th"><?= $this->lang->line('lang_sr_no');?></span></th>
                <th><span class="manten-th"><?= $this->lang->line('lang_join_date');?></span></th>
                <th width="20%"><span class="manten-th"><?= $this->lang->line('lang_no_of_join');?></span></th>
                <th class="last"><span class="manten-th"><?= $this->lang->line('lang_action');?></span></th>
              </tr>
              <?php
              if($usercount)
              {
                $i=$num+1;
                foreach ($usercount as $userVal) 
                {?>
                  <tr>
                    <td class="first style3"><?= $i++;?></td>
                    <td><?= $userVal->join_date;?></td>
                    <td><?= $userVal->count;?></td>
                    <td class="last">
                      <form name="frm_pagi" action="<?= base_url().'UserView';?>" method="get">
                          <input type="hidden" name="JoinDate" value="<?= $userVal->join_date;?>" />
                          <button type="submint" data-toggle="tooltip" title="view" class="btn btn-warning btn-circle"><i class="fa fa-eye"></i></button>
                      </form>
                      
                  </tr>
                <?php }?>
                <tr>
                    <td colspan="8"><center><?php echo $showPagination;?></center></td>
                  </tr>
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