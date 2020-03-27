<?php 
$action = basename($this->uri->segment(1),".html");
if ($action=='seller'){$badgedata= getbadgedetail($result->id);}
if ($action=='show_client'){ $badgedata= getbadgedetail($clientDetail->id);}
if ($action=='view_product_detail'){$badgedata =getbadgedetail($classified_data->cust_id);}
	if(isset($badgedata)){
	foreach($badgedata as $data){

	if($data->trade_assurance=='Y'){?>
		<a href="#/" data-toggle="tooltip" data-placement="bottom" title="" class="tivitir pop-upper" data-original-title="Trade Assurance">
			<img src="<?php echo base_url()?>images/admin/images/modal_img/trade_assurance.png" class="lazyloaded"/>
		</a>
	<?php }
	if($data->trust_seal=='Y'){?>
		<a href="#/" data-toggle="tooltip" data-placement="bottom" title="" class="tivitir pop-upper" data-original-title="Trust Seal">
			<img src="<?php echo base_url()?>images/admin/images/modal_img/trust_seal.png" class="lazyloaded" />
		</a>
	<?php }
	if($data->assessed_supplier=='Y'){?>
		<a href="#/" data-toggle="tooltip" data-placement="bottom" title="" class="tivitir pop-upper" data-original-title="Assessed Supplier">
			<img src="<?php echo base_url()?>images/admin/images/modal_img/assessed_supplier.png" class="lazyloaded" />
		</a>
	<?php }
	if($data->onsite_checked_a=='Y'){?>
		<a href="#/" data-toggle="tooltip" data-placement="bottom" title="" class="tivitir pop-upper" data-original-title="Onsite Checked (Advance)">
			<img src="<?php echo base_url()?>images/admin/images/modal_img/onsite_checked.png" class="lazyloaded" />
		</a>
<?php }
	if($data->onsite_checked_b=='Y'){?>
		<a href="#/" data-toggle="tooltip" data-placement="bottom" title="" class="tivitir pop-upper" data-original-title="Onsite Checked (Basic)">
			<img src="<?php echo base_url()?>images/admin/images/modal_img/onsite_checked.png" class="lazyloaded" />
		</a>
<?php }
	if($data->production_varified=='Y'){?>
		<a href="#/" data-toggle="tooltip" data-placement="bottom" title="" class="tivitir pop-upper" data-original-title="Production Varified">
			<img src="<?php echo base_url()?>images/admin/images/modal_img/production_varified.png" class="lazyloaded" />
		</a>
	<?php }
	if($data->store_favorite=='Y'){?>
		<a href="#/" data-toggle="tooltip" data-placement="bottom" title="" class="tivitir pop-upper" data-original-title="Store Favorite">
			<img src="<?php echo base_url()?>images/admin/images/modal_img/store_favorite.png" class="lazyloaded"/>
		</a>
<?php }
	if($data->email_verified=='Y'){?>
		<a href="#/" data-toggle="tooltip" data-placement="bottom" title="" class="tivitir pop-upper" data-original-title="Email verified">
			<img src="<?php echo base_url()?>images/admin/images/modal_img/email_verified.png" class="lazyloaded" />
		</a>
<?php }
	if($data->mobile_number_verified=='Y'){?>
		<a href="#/" data-toggle="tooltip" data-placement="bottom" title="" class="tivitir pop-upper" data-original-title="Mobile number verified">
			<img src="<?php echo base_url()?>images/admin/images/modal_img/number_verified.png" class="lazyloaded" />
		</a>
<?php }
	if($data->category_best=='Y'){?>
		<a href="#/" data-toggle="tooltip" data-placement="bottom" title="" class="tivitir pop-upper" data-original-title="Category Best">
			<img src="<?php echo base_url()?>images/admin/images/modal_img/category_best.png" class="lazyloaded" />
		</a>
<?php }
	if($data->secure=='Y'){?>
		<a href="#/" data-toggle="tooltip" data-placement="bottom" title="" class="tivitir pop-upper" data-original-title="Secure">
			<img src="<?php echo base_url()?>images/admin/images/modal_img/secure.png" class="lazyloaded" />
		</a>
<?php }
	if($data->secure_transaction=='Y'){?>
		<a href="#/" data-toggle="tooltip" data-placement="bottom" title="" class="tivitir pop-upper" data-original-title="Secure Transaction">
			<img src="<?php echo base_url()?>images/admin/images/modal_img/secure_transaction.png" class="lazyloaded" />
		</a>
<?php } } }?>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script> 
