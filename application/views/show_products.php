<?php 
 if($categories=='true')
 	{?>
<div class="color-y">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="title-2"><?php echo $this->lang->line('522_oth_lang');?></h1>
			</div>
		</div>
	</div>
</div>
<div class="rg_backgroud">
	<div class="container-fluid">
		<div class="row"> 
       
			<?php if(isset($product_catlist1)){
		foreach($product_catlist1 as $data)
		{
			if($data->name)
			{
				if($parent_sub_id ==0){?>
				<div class="col-md-6 col-xs-12 box_div_panel">
					<div class="box_panel">
						<div class="clearfix">
							<h5><?php echo $data->name;?></h5>
							<div class="col-md-5 col-xs-12">
								<div class="row">
									<div class="catlist_img">
									<?php if($main_cat_id == 0 && $parent_sub_id==0 )
									{
										if($type=='sell'){?>
										 <a  href="#"><img class="img-responsive lazyloaded cate_img_bg" <?php if($data->category_image!=''){?>
										  src="<?php echo base_url().'images/category_images/'.$data->category_image;?>"<?php }else{?>src="<?php echo base_url().'images/category_images/not_found.jpg';?>"<?php }?> alt=""/></a>
										<?php } 
									}
										elseif($parent_sub_id!=0)
										{	?>
										 <a href="<?php echo base_url().'product/'.catname_url($data->cat_id).'/'.category_detail($data->parent_sub_id)->parent_id.'/'.$data->parent_sub_id.'/'.$data->cat_id;?>" class="list-group-item"><img class="img-responsive  lazyloaded" src="<?php if($data->category_image!=''){ echo base_url().'images/category_images/'.$data->category_image;}else{ echo base_url().'images/category_images/not_found.jpg';} ?>"alt=""/></a> 
										<?php }else{
										if($type=='sell'){?>
										 <a href="<?php echo base_url().'all_categories.html?parent_sub_id='.$data->cat_id.'&type='.$type;?>"  > <img class="img-responsive lazyloaded" src="<?php if($data->category_image!=''){ echo base_url().'images/category_images/'.$data->category_image;}else{ echo base_url().'images/category_images/not_found.jpg';} ?>"alt=""/></a> 
										<?php }else{?>
										<a href="<?php echo base_url().'all_categories.html?parent_sub_id='.$data->cat_id.'&type='.$type;?>"> <img class="img-responsive lazyloaded" src=" <?php if($data->category_image!=''){ echo base_url().'images/category_images/'.$data->category_image;}else{ echo base_url().'images/category_images/not_found.jpg';} ?>" alt=""/></a> <?php } }?>
										</div>
								</div>
							</div>
							<?php if($parent_sub_id == 0){?>
							<div class="col-md-7 col-xs-12">
								<div class="row">
									<div class="cat-list-scroll"> 
										<?php if($main_cat_id == 0){

										$subCats =  show_sub_cate($data->cat_id);
										}else{
										$subCats = show_next_sub_cate($data->cat_id,$type);
										}

										if(!empty($subCats)){
										foreach($subCats as $subcatrec){
											if($type=='sell'){

										if($main_cat_id==0){?>
										<div class="list-group word_carlist"><a href="<?php echo base_url().'product_subcat/'.catname_url($subcatrec->cat_id).'/'.$data->cat_id.'/'.$subcatrec->cat_id;?>"><img src="<?php echo base_url();?>assets/themes/img/arrow_right.png"  /> <?php echo character_limiter($subcatrec->name,65);?></a> </div>
										<?php }else{?>
										<div class="list-group word_carlist"><a href="<?php echo base_url().'product/'.catname_url($subcatrec->cat_id).'/'.$data->parent_id.'/'.$data->cat_id.'/'.$subcatrec->cat_id;?>"><img src="<?php echo base_url();?>assets/themes/img/arrow_right.png"  /> <?php echo character_limiter($subcatrec->name,65);?></a> </div>
										<?php } }
										else{
										
										if($main_cat_id==0){?>
										<div class="list-group chave"><a href="<?php echo base_url().'service_subcat/'.catname_url($subcatrec->cat_id).'/'.$data->cat_id.'/'.$subcatrec->cat_id;?>" ><img src="<?php echo base_url();?>'assets/themes/img/arrow_right.png"  /> <?php echo character_limiter($subcatrec->name,65);?></a> </div>
										<?php }else{?>
										<div class="list-group chave"><a href="<?php echo base_url().'service/'.catname_url($subcatrec->cat_id).'/'.$data->parent_id.'/'.$data->cat_id.'/'.$subcatrec->cat_id;?>"><img src="<?php echo base_url();?>assets/themes/img/arrow_right.png"  /> <?php echo character_limiter($subcatrec->name,65);?></a> </div>
										<?php } 
											}
											} //section
										}?>
									</div>
								</div>
							</div>
							<?php }?>
						</div>
					</div>
				</div>
				<?php } 
			}
		}
		}
		else{?>
			<div class="alert alert-danger"><?php echo $this->lang->line('1287_oth_lang');?></div>
			<?php }?>
		</div>
		<div class="row-1">
			<div class="col-md-12 col-xs-12 ">
				<div class="">&nbsp;</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php }?>

</div>

<script>
/* remove by RS all script
function xyz(filter_item)
{//alert (filter_item);
	var queryString = window.location.search;
	console.log(queryString);
	const urlParams = new URLSearchParams(queryString);
	const city = urlParams.get("city");
	const state = urlParams.get("state");
	const country = urlParams.get("country");

	keys = urlParams.keys(),
	values = urlParams.values(),
	entries = urlParams.entries();
	var newLink="";
	for(const entry of entries)
	{
		console.log(`${entry[0]}: ${entry[1]}`);
		if (`${entry[0]}` != filter_item)
		{
			if (filter_item=="country")
				if (`${entry[0]}`=="state" || `${entry[0]}`=="city") continue;
			if (filter_item=="state")
				if (`${entry[0]}`=="city") continue;

			if (filter_item=="select_main_catgory")
				if (`${entry[0]}`=="select_sub_catgory" || `${entry[0]}`=="next_sub_cat") continue;
			if (filter_item=="select_sub_catgory")
				if (`${entry[0]}`=="next_sub_cat") continue;	

			if (newLink=="")
				newLink = `${entry[0]}`+"="+`${entry[1]}`;
			else
				newLink += "&"+`${entry[0]}`+"="+`${entry[1]}`;
		}
	}
	newLink = "<?php //echo base_url(); ?>" + "product.html?"+newLink;
	window.location.href = newLink;
	//alert (newLink);
	console.log(newLink);
	console.log(filter_item);
}

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}*/
</script>
<script type="text/javascript">/*
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});

var form = document.getElementById("form-id");

document.getElementById("pack_id").addEventListener("click", function () {
  form.submit();
});
document.getElementById("pack_id2").addEventListener("click", function () {
  form.submit();
});
document.getElementById("pack_id3").addEventListener("click", function () {
  form.submit();
});
document.getElementById("pack_id4").addEventListener("click", function () {
  form.submit();
});*/
</script>
<script>/*
$(function() {
  $(".expand").on( "click", function() {

    //  $(this).next().slideToggle(200);
    $expand = $(this).find(">:first-child");

    if($expand.text() == "+") {
      $expand.text("-");
    } else {
      $expand.text("+");
    }
  });
});*/
</script>
<script>/*
function myFunction() {
    document.getElementById("form-id").submit();
}*/
</script>


<script>/*
function goBack() {
    window.history.back();
}*/
</script>


