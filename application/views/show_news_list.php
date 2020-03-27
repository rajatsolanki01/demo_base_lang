<div class="color-y" style="margin-top:-20px;">
	<div class="container-fluid">
		<h2 class="title-2"><?= $this->lang->line('524_oth_lang');?></h2>
	</div>
</div>
<div class="container-fluid">
	
	<div class="clearfix">
		<?php foreach($show_news_list as $data){ ?>
		<div> &ensp;</div>
		<div  class="clearfix news_box">
		<div class="col-md-2">
			<div class="new_img">
				<img src="<?= base_url();?>images/news/<?= $data->image_path;?>" class="img-responsive"/>
			</div>
		</div>	
		<div class="col-md-10">		
			<div id="content">		
				<div class="product-info">				
					<h4 class="news_heading"><?= $data->title;?><small><span><?= $this->lang->line('551_oth_lang');?>:</span><?= $data->entry_date;?></small></h4>
					<div class="news_description">
						<p><span><?= $this->lang->line('334_oth_lang');?>:</span><?= $data->description;?></p>
					</div>
				</div>
			</div>
		</div>	
		</div>
	<?php }?>
	</div>
	<div>&ensp;</div>
 </div> 
 
  <?php if($show_link=='1'){?>
<div class="page_bar"><?= $page_links;?></div>
<?php }?>
</div>
<td class="product_bg" valign="top" width="100%"></td>