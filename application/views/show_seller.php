<div class="white_col">
   <div id="main-col" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 set_pad_left">
      <div class="">
         <div class="tab-content">
            <div class="tab-pane active" id="listView">
               <div class="">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <?php 
						if($seller_data)
						{ 
                  	foreach($seller_data as $result)
                  	{
                  		$sub_domain_data = $this->seller->getsubdomainDetail($result->id);
                  		// $package_detail = $this->seller->getpackageDetail($sub_domain_data[0]->package_type);
                  		?> 
								<div class="row latest-color">
									<div class="col-md-9 col-sm-8 col-xs-12 product_list">
									<h3> 
										<a href="<?php echo base_url(); ?>ShowSellerCompnayProfile-<?php echo $result->id; ?>" >	
										<?php echo	$result->name;  ?></a> 
									</h3>
									<div class="row">
										<?php /*<div class="star_pro_set"> <?= ShowAverageratingstar($this->seller->gettotalRating($result->id)); ?></div>*/?>
										<div class="col-md-7 col-sm-6 col-xs-12 top-set new_border_right">
											<p><span class="text_set"><?= $this->lang->line('323_oth_lang'); ?></span>: <?php echo $result->join_date ;?></p>
											<p><span class="text_set"><?= $this->lang->line('218_oth_lang'); ?></span>: <?= character_limiter($this->seller->getcategoryName($result->id),150); ?></p>
											<p><span class="text_set"><?= $this->lang->line('444_oth_lang'); ?></span>: <?=  character_limiter(stripcslashes($result->detail),150); ?> </p>
											<?php /* if ($result->emp_det!='') { ?>
											<p><span class=""> <?= $this->lang->line('313_oth_lang'); ?> : <?= $result->emp_det; ?> </p>
											<?php } */?>
											<div>										
											</div>
										</div>
										<div class="col-md-5 col-sm-6 col-xs-12 new_border_right">
											<?php /*<span class="right_set"><?= $this->lang->line('835_oth_lang'); ?></span>: <span  class="rotate"> 
											<?php /*echo $this->seller->getpackageName($result->package_type);
											</span>*/?>
											<p><span class="right_set"><?= $this->lang->line('1480_oth_lang'); ?></span>: <span class="red2"><?= $result->country; ?> <img class="img-responsive flag_fix lazyloaded" data-src="<?= base_url() ?>images/flageimage/<?= $flage=flageimage($result->country);?>" src="<?= base_url(); ?>images/flageimage/<?= $flage=flageimage($result->country);?>" width="20" height="10"></span> </p>
											<p><span class="right_set"><?= $this->lang->line('1481_oth_lang'); ?></span>: <span class="red2"> <?= $result->city;?>,&nbsp;<?= $result->state;?></span></p>
											<?php /*<p><span class="right_set"><?= $this->lang->line('1565_oth_lang'); ?></span>: <a href="http://<?= $result->site_url;?>" rel="nofollow" target="_blank"> <?= $result->site_url;?></a></p>*/?>
											<?php if($this->session->userdata('user_id')!='') { ?>
											<p><span class="right_set"><?= $this->lang->line('156_oth_lang'); ?></span>: <?= $result->mobile_no; ?></p>
											<?php } else { ?>
											<p><span class="right_set"><?= $this->lang->line('156_oth_lang'); ?></span>: <span title="Sing in for contact detail" ></span></p>
											<?php } ?>
											<?php /*<p><span class="right_set"><?= $this->lang->line('589_oth_lang'); ?></span>: <?=  $result->site_url;?> </p>*/?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<a href="<?php echo base_url(); ?>ShowSellerCompnayProfile-<?php echo $result->id; ?>"  class="btn  btn_contact_new btn-default btn-danger btn-large"  target="_blank" ><i class="fa fa-info">
											</i><?= $this->lang->line('310_oth_lang'); ?>s
											</a>
										</div>
									</div>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-12">
                           <div class="seller_img_fix"> 
                           <a href="<?php echo base_url(); ?>ShowSellerCompnayProfile-<?php echo $result->id; ?>" >
										   <?php if($result->user_photo!='') { ?> <img src="<?= base_url();?>images/user_photo/<?= $result->logo; ?>" data-src="<?= base_url();?>images/user_photo/<?= $result->logo; ?>" alt="<?= $result->name;?>" class="lazyloaded img-responsive" /> <?php } else { ?> <img src="<?= base_url();?>images/category_images/not_found.jpg" alt="Chair Swing" class=" img-responsive" /> <?php } ?> </a>
									</div>
									</div>
									<?php /*<div class="col-md-12"> <?php  include('cust_badge.php');?> </div>*/?>
								</div>
		 	            <?php } 
						}
						else { ?>
                     <?php if($custlist_paid) 
                     { /*
								foreach($custlist_paid as $data) { ?>
									{$functions->all_package_deatil($custlist_paid[data].package_type)}
									{$functions->get_subdomain($custlist_paid[data].id)}
									{$functions->all_package_deatil($sub_domain_data[0].package_type)}
									<?php if($smarty.section.data.index==$row_mid) { ?>
   									<div class="row row_mid">
   										<div class="col-md-12 ">
   										<div class="" style="padding:20px 0 20px;">
   											<div class="col-md-4">
   												<h2><?= $this->lang->line('988_oth_lang'); ?></h2>
   											</div>
   											<div class="col-md-5" style="padding-top:10px;">
   												<p><?= $this->lang->line('989_oth_lang'); ?> <span>{$functions->quotes_count_suppliers()}</span> <?= $this->lang->line('1200_oth_lang'); ?>.</p>
   											</div>
   											<div class="col-md-3"> <a href="{$site_url}/buy_requirement.html" class="btn btn-default bold"><?= $this->lang->line('984_oth_lang'); ?></a> </div>
   										</div>
   										</div>
   									</div>
   								<?php }?>
                           <div class="row latest-color">
                              <div class="col-md-9 col-sm-8 col-xs-12 product_list">
                                 <h3> 
                                    <?php if($package_qry_da[0].sub_domain_limit=='Y') {  
                                    if($sub_domain_data[0].sub_domain!=''){ ?> <a href="{$functions->sub_domain_name($sub_domain_data[0].sub_domain)}"  title="{$custlist_paid[data].frm_name}" target="_blank"> <?php } else { ?> <a href="{$site_url}/directory/{$functions->clientname_url($custlist_paid[data].id)}-{$custlist_paid[data].id}-inq"  target="_blank"> <?php } ?>
                                    <?php } else { ?> <a href="{$site_url}/directory/{$functions->clientname_url($custlist_paid[data].id)}-{$custlist_paid[data].id}-inq" target="_blank"> <?php } ?>
                                    {$custlist_paid[data].frm_name}</a> 
                                 </h3>
                                 <div class="row">
                                    <div class="col-md-7 col-sm-6 col-xs-12 top-set ">
                                       <p><span class="text_set"><?= $this->lang->line('323_oth_lang'); ?></span>: {$custlist_paid[data].reg_yrs}</p>
                                       <p><span class="text_set"><?= $this->lang->line('218_oth_lang'); ?></span>: {$category->client_cat($custlist_paid[data].id)} </p>
                                       <p><span class="text_set"><?= $this->lang->line('444_oth_lang'); ?></span>: {$functions->stripslesh($custlist_paid[data].detail)|wordwrap:100:"<br/>
                                          "|truncate:100:"...."} 
                                       </p>
                                       <?php if($custlist_paid[data].emp_det!='') { ?>
                                       <p><span class=""> <?= $this->lang->line('313_oth_lang'); ?>: {$custlist_paid[data].emp_det} </p>
                                       <?php } ?>
                                       <div class="row">
                                          <div class="col-md-6"> <?php if($package_qry_da[0].sub_domain_limit=='Y' && $sub_domain_data[0].sub_domain!='' ){?> <a href="{$functions->sub_domain_name($sub_domain_data[0].sub_domain)}/send_inq"  class="btn  btn_contact_new btn-default btn-danger btn-large"  target="_blank" ><i class="fa fa-info"></i>
                                             <?php } else { 
                                                if($package_qry_da[0].sub_domain_limit=='Y'){  
                                                if($sub_domain_data[0].sub_domain!=''){ ?>
                                             <a href="{$functions->sub_domain_name($sub_domain_data[0].sub_domain)}"  title="{$custlist_paid[data].frm_name}" target="_blank" class="btn  btn_contact_new btn-default btn-danger btn-large"><i class="fa fa-info"></i> <?php } else { ?> <a href="{$site_url}/directory/{$functions->clientname_url($custlist_paid[data].id)}-{$custlist_paid[data].id}-inq"  target="_blank" class="btn btn_contact_new btn-default btn-danger btn-large"><i class="fa fa-info"></i> <?php }?>
                                             <?php } else { 
                                                if($sub_domain_data[0].package_type=="A_S" ||$sub_domain_data[0].package_type=="A_G") { ?> <a  href="{$site_url}/paid_send_inq-{$custlist_paid[data].id}"  title="{$custlist_paid[data].frm_name}"  target="_blank" class="btn btn-default  btn_contact_new btn-danger btn-large"><i class="fa fa-info"></i> <?php } else { ?> <a href="{$site_url}/directory/{$functions->clientname_url($custlist_paid[data].id)}-{$custlist_paid[data].id}-inq"  target="_blank" class="btn btn_contact_new btn-default btn-danger btn-large"><i class="fa fa-info"></i> <?php } ?>
                                             <?php }  
                                                } ?>  <?= $this->lang->line('310_oth_lang'); ?>
                                             </a>
                                          </div>
                                          <div class="col-md-6">
                                             <button type="submit" class="btn btn_contact_new"><?= $this->lang->line('1407_oth_lang'); ?></button>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-5 col-sm-6 col-xs-12 borderleft">
                                       <span class="right_set"><?= $this->lang->line('1489_oth_lang'); ?></span>: <span  class="rotate"> {$functions->getProductCompanyDetail($custlist_paid[data].id)}
                                       <?php if($service_query_data[0].package_type=='A_F') { ?>
                                       {$functions->get_package_name('A_F')}
                                       <?php } elseif($service_query_data[0].package_type=='A_P') { ?>						
                                       {$functions->get_package_name('A_P')}
                                       <?php } elseif($service_query_data[0].package_type=='A_G') { ?>
                                       {$functions->get_package_name('A_G')}
                                       <?php } elseif($service_query_data[0].package_type=='A_S') { ?>						
                                       {$functions->get_package_name('A_S')}
                                       <?php } ?> </span>
                                       <p><span class="right_set"><?= $this->lang->line('219_oth_lang'); ?></span>: <span class="red2">{$custlist_paid[data].country}</span> <img class="img-responsive lazyloaded" data-src="{$site_url}/flageimage/{$functions->get_flage_country($custlist_paid[data].id)}" src="{$site_url}/flageimage/{$functions->get_flage_country($custlist_paid[data].id)}" width="20" height="10"> </p>
                                       <p><span class="right_set"><?= $this->lang->line('221_oth_lang'); ?></span>: <a href="http://{$custlist_paid[data].site_url}" rel="nofollow" target="_blank">{$custlist_paid[data].site_url}</a></p>
                                       <p><span class="right_set"><?= $this->lang->line('487_oth_lang'); ?></span>: {$custlist_paid[data].ph_no}</p>
                                       <p><span class="right_set"><?= $this->lang->line('589_oth_lang'); ?></span>: {$custlist_paid[data].site_url} </p>
                                       {$functions->all_package_deatil($custlist_paid[data].package_type)}
                                       <p><?php if($package_qry_da[0].verified=='Y') { ?> <img class="lazyloaded" src="{$site_url}/templates/images/verfied.png" data-src="{$site_url}/templates/images/verfied.png" /> <?php } ?>
                                          <?php if($package_qry_da[0].trust_seal =='Y') { ?> <img class="lazyloaded" src="{$site_url}/templates/images/trust_seal.png" data-src="{$site_url}/templates/images/trust_seal.png" /><?php } ?>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-3 col-sm-4 col-xs-12">
                                 <div class="padding10"> 
                                    <?php 
                                    if($package_qry_da[0].sub_domain_limit=='Y') 
                                    {  
                                       if($sub_domain_data[0].sub_domain!='') { ?> 
                                          <a href="{$functions->sub_domain_name($sub_domain_data[0].sub_domain)}" class="text-uppercase"  title="{$custlist_paid[data].frm_name}" target="_blank"> 
                                       <?php } 
                                       else { ?> 
                                          <a href="{$site_url}/directory/{$functions->clientname_url($custlist_paid[data].id)}-{$custlist_paid[data].id}-inq"  target="_blank" class="text-uppercase"> 
                                       <?php } ?>
                                    <?php } 
                                    else { 
                                       if($sub_domain_data[0].package_type=="A_S" ||$sub_domain_data[0].package_type=="A_G") 
                                       { ?> 
                                          <a  href="{$site_url}/{$custlist_paid[data].id}-{$functions->clientnameurl($custlist_paid[data].id)}"  title="{$custlist_paid[data].frm_name}" target="_blank"> 
                                       <?php } 
                                       else { ?> 
                                          <a href="{$site_url}/directory/{$functions->clientname_url($custlist_paid[data].id)}-{$custlist_paid[data].id}-inq" target="_blank"> 
                                       <?php } ?>
                                    <?php }
                                    if ($custlist_paid[data].logo!='') { ?> 
                                       <img src="{$site_url}/user_logo/{$custlist_paid[data].logo}" data-src="{$site_url}/user_logo/{$custlist_paid[data].logo}" alt="Chair Swing" class="imgborder2 lazyloaded img-responsive" /> <?php } else { ?> <img src="{$site_url}/category_images/not_found.jpg" alt="Chair Swing" class="imgborder2 img-responsive" /> 
                                    <?php } ?> </a>
                                 </div>
                              </div>
                           </div>
         					<?php } */
				         } 
                     else { ?>
                           <p style="text-align:center; color:#F00; font-size:20px;"><?= $this->lang->line('1697_oth_lang'); ?><?= $name;?><br><?= $this->lang->line('1698_oth_lang'); ?> <?= $name;?></p>
                     <?php }  
                  } ?>
                     <div class="pagination">
                        <div class="links" style="margin-top:-50px;">
                           <?php echo $this->pagination->create_links(); ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
<div style="clear: both;"></div>