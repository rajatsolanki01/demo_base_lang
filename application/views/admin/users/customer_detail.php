<br />
<div class="panel panel-default">
  <div class=" panel-heading clearfix"><h1 class="page-header"><?= $this->lang->line('lang_details_of_users');?></h1></div>
  <div class="panel-body">
  	<div class="col-md-12">
        <div class="sct_right">
          <div  id="product_list"> 
            <div class="table_wrapper">
              <div class="table_wrapper_inner">
                <table class="table-striped table-bordered table-responsive" align="center" width="700" border="0" cellpadding="6" cellspacing="0">
                  <tr>
                    <td colspan="3"><font>
                      <h3>Details of <?= $custdetail->frm_name;?></h3>
                      </font></td>
                  </tr>
                  <tr>
                    <td width="30%"><?= $this->lang->line('lang_firm_name');?></td>
                    <td><?= $custdetail->frm_name;?></td>
                  </tr>
                  <tr>
                    <td valign="top"><?= $this->lang->line('lang_address');?></td>
                    <td><?= $custdetail->address;?></td>
                  </tr>
                  <tr>
                    <td><?= $this->lang->line('lang_phone');?>.</td>
                    <td><?= $custdetail->ph_no;?></td>
                  </tr>
                  <tr>
                    <td><?= $this->lang->line('lang_siteurl');?></td>
                    <td><?= $custdetail->site_url;?></td>
                  </tr>
                  <tr>
                    <td><?= $this->lang->line('lang_city');?></td>
                    <td><?= $custdetail->city;?></td>
                  </tr>
                  <tr>
                    <td><?= $this->lang->line('lang_state');?></td>
                    <td><?= $custdetail->state;?></td>
                  </tr>
                  <tr>
                    <td><?= $this->lang->line('lang_country');?></td>
                    <td><?= $custdetail->country;?></td>
                  </tr>
                  <tr>
                    <td><?= $this->lang->line('lang_phone');?>.</td>
                    <td><?= $custdetail->phone_no;?></td>
                  </tr>
                  <tr>
                    <td><?= $this->lang->line('lang_fax_no');?>.</td>
                    <td><?= $custdetail->fax_no;?></td>
                  </tr>
                  <tr>
                    <td><?= $this->lang->line('lang_pin_code');?></td>
                    <td><?= $custdetail->pin_code;?></td>
                  </tr>
                  <tr>
                    <td valign="top"><?= $this->lang->line('lang_description');?></td>
                    <td><?= $custdetail->detail;?></td>
                  </tr>
                  <?php /*<tr>
                    <td><?= $this->lang->line('lang_meta_description');?></td>
                    <td><?= $custdetail->meta_desc;?></td>
                  </tr>
                  <tr>
                    <td valign="top"><?= $this->lang->line('lang_meta_keywords');?></td>
                    <td><?= $custdetail->meta_keywords;?></td>
                  </tr>*/?>
                  <tr>
                    <td ><?= $this->lang->line('lang_year_company_registered');?></td>
                    <td><?= $custdetail->reg_yrs;?></td>
                  </tr>
                  <tr>
                    <td><?= $this->lang->line('lang_total_no_employees');?></td>
                    <td><?= $custdetail->emp_det;?></td>
                  </tr>
                  <tr>
                    <td><?= $this->lang->line('lang_ownership_type');?></td>
                    <td><?= $custdetail->own_type;?></td>
                  </tr>
                  <tr>
                    <td valign="top"><?= $this->lang->line('lang_certification');?></td>
                    <td><?= user_certification($custdetail->certification);?> </td>
                  </tr>
                  <tr>
                    <td><?= $this->lang->line('lang_upload_logo');?></td>
                    <td>
                      <?php
                      if($custdetail->logo !='')
                      {?>
                        <img src="<?= base_url().'images/user_logo/'.$custdetail->logo;?>" width="70" height="60"/>
                      <?php }
                      else { echo 'N/A';}?>
                    </td>
                  </tr>
                  <tr>
                    <td valign="top"><?= $this->lang->line('lang_categories');?></td>
                    <td align="left"><div class="main_list2"> 
                      <?php 
                      if($categories)
                      {
                        foreach ($categories as $CatVal) 
                        {
                          if($CatVal->cust_id!='')
                          {?>
                            <font color="#339900">&diams;</font> &nbsp;<?= $CatVal->name;?><br>
                            <div class="list" id="cat_<?= $CatVal->cat_id;?>">
                              <?= hgetSubCategoriesByCatIdCustId($CatVal->cat_id,$id);?>
                            </div>
                        <?php } }
                      }?>
                      </div></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td colspan="3"><a href="javascript:history.back();" ><?= $this->lang->line('lang_back');?></a></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>