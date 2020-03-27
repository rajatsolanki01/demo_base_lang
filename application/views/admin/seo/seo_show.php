<br />
<div class="panel panel-default">
  <div class=" panel-heading clearfix"><h2 class="page-header">SEO</h2></div>
  <div class="panel-body">
    <div class="col-md-12">
        <div class="sct_right">
              <div  id="product_list">
                <div class="table_wrapper">
                  <div class="table_wrapper_inner">
                <table align="center" class="table-striped table-bordered table-responsive" style=" width: 100%;" border="0" cellpadding="6" cellspacing="0">
    <tr>
      <td colspan="3"><font>
        <h3><?= $this->lang->line('lang_details_of');?> <?= $seodetail->name;?></h3>
        </font></td>
    </tr>
    <tr>
      <td width="30%"><?= $this->lang->line('lang_name');?></td>
      
      <td><?= $seodetail->name;?></td>
    </tr>
    <tr>
      <td width="30%"><?= $this->lang->line('lang_title');?></td>
      
      <td><?= $seodetail->title;?></td>
    </tr>
    <tr>
      <td><?= $this->lang->line('lang_keywords');?></td>
      
      <td><?= $seodetail->keyword;?></td>
    </tr>
    <tr>
      <td><?= $this->lang->line('lang_description');?></td>
      
      <td><?= $seodetail->des;?></td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2" class="buttons"><a href="javascript:history.back();" class="button"><?= $this->lang->line('lang_back');?></a></td>
    </tr>
  </table>
                  </div>
                </div>
              </div>
            </div>
    </div>
  </div>
</div>