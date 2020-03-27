<br />
<div class="panel panel-default">
  <div class="panel-heading clearfix"> <h1 class="page-header">
    <?php if(!isset($editid)){
      echo $this->lang->line('lang_enter_country');
    }
    if(isset($editid) && $editid==1){
      echo $this->lang->line('lang_enter_state');
    }
    if(isset($editid) && $editid==2){
    }
    if(isset($editid) && $editid==3){
      echo $this->lang->line('lang_enter_location');
    }?>
     
    </h1></div>
  <div class="panel-body">
  <div class="col-md-12">
      

    

    	<div class="sct_right">
              <div  id="product_list">
                <div class="table_wrapper">
                  <div class="table_wrapper_inner">
<div id="center-column">
<br />
<table  width=""  cellpadding="0" cellspacing="0" style="width: 100%;">
<tr>
<td colspan="2">
<table  width="100%" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
    <form name="editlocation" action="#" method="post" enctype="multipart/form-data">
    
      <table class="table-striped table-bordered table-responsive" width="100%" class="datatable sortable full" cellpadding="0" cellspacing="0">
        <thead align="left" >
		<input type="hidden" name="edit_id"  value="<?php if(isset($editid)) { echo $editid;}?>" />
          <tr>
            <td width="110"><?= $this->lang->line('lang_edit_location');?> &nbsp; :</td>
            <td colspan="1"><input type="text" class="form-control" name="location_name" value="<?= $showlocation;?>"  id="location_id" />
			<span id="location_info"></span></td>
          </tr>
          
          <tr>
            <td width="110">Country Location &nbsp; :</td>
            <td colspan="1"><input type="text" class="form-control" name="search_keyword" value="<?php if(isset($search_keyword)) { echo $search_keyword;}?>"  id="search_location" />
			<span id="location_info"></span></td>
          </tr>
          
		<?php if(isset($editid) && $editid==2){?>
			<?php $show_lang_long = Get_latitude_longitude($showlocation);?>
		  <tr>
            <td width="110"><?= $this->lang->line('lang_edit_latitude');?> &nbsp; :</td>
            <td colspan="1"><input type="text" name="city_latitude" value="<?= $show_lang_long->city_latitude;?>" size="35"  /></td>
          </tr>
		  <tr>
            <td width="110"><?= $this->lang->line('lang_edit_longitude');?> &nbsp; :</td>
            <td colspan="1"><input type="text" name="city_longitude" value="<?= $show_lang_long->city_longitude;?>" size="35"  />
			</td>
          </tr>
          
		  <tr><td>&nbsp;</td><td><span id="lang_long_info"></span></td></tr>
		   <tr>
            <td width="110">&nbsp;</td>
            <td colspan="1"><a href="http://ezzyu.com/google-map-latitude-longitude-finder/" target="_blank"><?= $this->lang->line('lang_get_latitude_and_longitude');?></a></td>
          </tr>
		<?php }?>
        
      <?php if(!isset($editid)){?>
        <tr>
          <td width="110"><?= $this->lang->line('lang_flage_image');?></td>
          <td><input type="file" name="flage" size="20"  />
            <input type="hidden" name="flage_image" value="<?= $showflage;?>" /></td>
        </tr>
          </tr>
        <tr>
          <td colspan="1">&nbsp;</td>
          <td align="left"><img src="<?= base_url();?>images/flageimage/<?= $showflage;?>" width="50" height="20" /></td>
        </tr>
        
         <tr>
          <td width="110">Country Banner</td>
          <td><input type="file" name="banner" size="20"  />
            <input type="hidden" name="banner_image" value="<?= $banner;?>" /></td>
        </tr>
        <tr>
          <td colspan="1">&nbsp;</td>
          <td align="left"><img src="<?= base_url();?>images/country_banner/<?= $banner;?>" width="50" height="20" /></td>
        </tr>
       <?php }?>
        <tr>
          <td  colspan="2"><input class="btn btn-primary set-btn" type="submit" name="btn_editlocation" value="update" /></td>
        </tr>
          </thead>
        
      </table>
    </form>
  </table>

</div>
 </div>
                </div>
              </div>
            </div>
          </div>
  </div>
</div>