<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class HomeProducts_model extends CI_Model
{
	// function show_wholesale_products()
	// {
	// 	$this->db->select('pro_name,price');
	// 	$this->db->from('products');
	// 	$this->db->join('customer', 'products.cust_id=customer.id', 'left');
	// 	$this->db->where('products.approved','Y');
	// 	$this->db->where('products.deleted','N');
	// 	$this->db->where('customer.deleted','N');
	// 	$this->db->where('products.wholesale','Y');
	// 	$this->db->order_by("products.pro_id desc");
	// 	$this->db->limit(6);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// }
	
	// function show_featured_product()
	// {
	// 	$this->db->select('pro_id,pro_name,price,pro_images,customer.*');
	// 	$this->db->from('products');
	// 	$this->db->join('customer', 'products.cust_id=customer.id', 'left');	 
	// 	$this->db->where('products.approved','Y');
	// 	$this->db->where('products.deleted','N');
	// 	$this->db->where('customer.deleted','N');
	// 	$this->db->where('products.cat_type','sell');
	// 	$this->db->order_by("products.pro_id desc");
	// 	$this->db->limit(10);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// }
		
	// function show_limited_product()
	// {
	// 	$this->db->select('pro_name,price,pro_id');
	// 	$this->db->from('products');
	// 	$this->db->join('customer', 'products.cust_id=customer.id', 'left');	 
	// 	$this->db->where('products.approved','Y');
	// 	$this->db->where('products.deleted','N');
	// 	$this->db->where('customer.deleted','N');
	// 	$this->db->where('products.paid','Y');
	// 	$this->db->order_by("products.pro_id desc");
	// 	$this->db->limit(10);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// }
		
	// function show_bulk_product()
	// {
	// 	$this->db->select('pro_id,pro_name,price,pro_images');
	// 	$this->db->from('products');
	// 	$this->db->join('customer', 'products.cust_id=customer.id', 'left'); 
	// 	$this->db->where('products.approved','Y');
	// 	$this->db->where('products.deleted','N');
	// 	$this->db->where('customer.deleted','N');
	// 	$this->db->where('products.bulk_deal','Y');
	// 	$this->db->order_by("products.pro_id desc");
	// 	$this->db->limit(10);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// }
	
	// function show_daily_product()
	// {
	// 	$this->db->select('pro_id,pro_images,pro_name,price');
	// 	$this->db->from('products');
	// 	$this->db->join('customer', 'products.cust_id=customer.id', 'left');
	// 	$this->db->where('products.approved','Y');
	// 	$this->db->where('products.deleted','N');
	// 	$this->db->where('customer.deleted','N');
	// 	$this->db->where('products.daily_deal','Y');
	// 	$this->db->order_by("products.pro_id desc");
	// 	$this->db->limit(10);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// }
	
	// function show_hot_product()
	// {
	// 	$this->db->select('pro_id,pro_name,price,pro_images');
	// 	$this->db->from('products');
	// 	$this->db->join('customer', 'products.cust_id=customer.id', 'left');
	// 	$this->db->where('products.approved','Y');
	// 	$this->db->where('products.deleted','N');
	// 	$this->db->where('customer.deleted','N');
	// 	$this->db->where('products.hot_deal','Y');
	// 	$this->db->order_by("products.pro_id desc");
	// 	$this->db->limit(10);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// }
	
	// function show_left_category()
	// {
	// 	$this->db->select('cat_id,name,cat_icon');
	// 	$this->db->from('categories');
	// 	$this->db->where('status','Y');
	// 	$this->db->where('deleted','N');	
	// 	$this->db->where('parent_id',0);
	// 	$this->db->where('parent_sub_id',0);
	// 	$this->db->group_by('name');
	// 	$this->db->order_by("name asc");
	// 	$this->db->limit(16);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }
	
	// function show_news()
	// {
	// 	$this->db->select('image_path,title,url,description');
	// 	$this->db->from('news');
	// 	$this->db->where('status','Y');
	// 	$this->db->where('deleted','N');	
	// 	$this->db->order_by("id desc");
	// 	$this->db->limit(1);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }
	
	// function country_show()
	// {
	// 	$this->db->select('country , count(country)');
	// 	$this->db->from('products');
	// 	$this->db->where('deleted','N');
	// 	$this->db->group_by('country');
	// 	$this->db->order_by("country asc");
	// 	$this->db->limit(12);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// }
	
	// function country_flag_show($country)
	// {
	// 	$this->db->select('flage');	
	// 	$this->db->from('country');
	// 	$this->db->where('country',$country);
	// 	$this->db->where('state','');
	// 	$this->db->where('city','');
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }
	// function show_top_suppliers_ajent()
	// {
	// 	$this->db->select('name');	
	// 	$this->db->from('categories');
	// 	$this->db->where('parent_id',0);
	// 	$this->db->where('parent_sub_id',0);
	// 	$this->db->where('cat_type','sell');
	// 	$this->db->where('status','Y');
	// 	$this->db->where('deleted','N');
	// 	$this->db->group_by('name');
	// 	$this->db->order_by("name asc");
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }

	// function show_top_suppliers()
	// {
	// 	$this->db->select('*');	
	// 	$this->db->from('categories');
	// 	$this->db->where('parent_id',0);
	// 	$this->db->where('parent_sub_id',0);
	// 	$this->db->where('status','Y');
	// 	$this->db->where('deleted','N');
	// 	$this->db->where('cat_type','sell');
	// 	$this->db->group_by('name');
	// 	$this->db->order_by('name');

	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }
	
	// function show_image_top_suppliers_ajent($cat_id,$cat_image,$category)
	// {
	// 	$this->db->select($cat_image);	
	// 	$this->db->from('metadata');
	// 	$this->db->where('data_id',$cat_id);
	// 	$this->db->where('type',$category);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }
	
	// function show_product_image($pro_id)
	// {
	// 	$this->db->select('photo');	
	// 	$this->db->from('images');
	// 	$this->db->where('pro_id',$pro_id);
	// 	$this->db->limit(1);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }

	// function show_spotlight_store()
	// {
	// 	$this->db->select('id');
	// 	$this->db->where('status','Y');
	// 	$this->db->from('users');
	// 	$this->db->where('deleted','N');
	// 	$this->db->where('approved','Y');
	// 	$this->db->order_by("RAND()");
	// 	$this->db->limit(10);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }
		
	// function show_spotlight_store_banner($id,$banner_path)
	// {
	// 	$this->db->select($banner_path);	
	// 	$this->db->from('set_banner_micro');
	// 	$this->db->where('cust_id',$id);
	// 	$this->db->limit(1);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }
		
	// function show_store_product_info($id)
	// {
	// 	$this->db->select('pro_id');
	// 	$this->db->from('products');
	// 	$this->db->join('customer', 'products.cust_id=customer.id', 'left');
	// 	$this->db->where('customer.id',$id);
	// 	$this->db->where('products.approved','Y');
	// 	$this->db->where('products.deleted','N');
	// 	$this->db->where('customer.deleted','N');
	// 	$this->db->where('customer.approved','Y');
	// 	$this->db->where('customer.status','Y');
	// 	$this->db->where('products.status','Y');
	// 	$this->db->order_by("products.pro_id desc");
	// 	$this->db->limit(3);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// }
		
	// function show_store_product_image($pro_id)
	// {
	// 	$this->db->select('photo');	
	// 	$this->db->from('images');
	// 	$this->db->where('pro_id',$pro_id);
	// 	$this->db->where('status','Y');
	// 	$this->db->where('deleted','N');
	// 	$this->db->limit(1);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }
	
	// function show_store_logo($id,$logo)
	// {
	// 	$this->db->select($logo);	
	// 	$this->db->from('customer');
	// 	$this->db->where('id',$id);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }	
	
	// function show_store_subdomain($id)
	// {
	// 	$this->db->select('customer.sub_domain,users.package_type');
	// 	$this->db->from('customer');
	// 	$this->db->join('users', 'customer.id=users.cust_id', 'left');
	// 	$this->db->where('customer.id',$id);
	// 	$this->db->where('users.deleted','N');
	// 	$this->db->where('customer.deleted','N');
	// 	$this->db->where('users.status','Y');
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();	
	// }
	
	// function show_store_package($package_type)
	// {
	// 	$this->db->select('sub_domain_limit');	
	// 	$this->db->from('member_package');
	// 	$this->db->where('pack_type',$package_type);
	// 	$this->db->where('status','Y');
	// 	$this->db->where('deleted','N');
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }
	
	// function show_home_page_banner()
	// {
	// 	$this->db->select('banner1,banner1_text,banner1_link,first_short,banner2,sec_sort,banner2_link,banner3_text,third_text,four_text,five_text,third_banner,third_sort,third_detail,four_banner,four_sort,four_detail,five_banner,five_sort,five_detail');	
	// 	$this->db->from('homepage_banner');
	// 	$this->db->where('id',2);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }	
	
	// function show_home_banner()
	// {
	// 	$this->db->select('banner1,banner1_link,banner2,banner2_link,banner3,banner3_link,banner4,banner4_link,banner5,banner5_link');	
	// 	$this->db->from('homepage_banner');
	// 	$this->db->where('id',1);
	// 	$query = $this->db->get();
	// 	//	echo  $this->db->last_query();  exit;  
	// 	return $query->result();
	// }						
}
