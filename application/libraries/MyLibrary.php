<?php
class MyLibrary
{
	function paginationCompress($link, $total_rows, $segment=NULL) 
	{
		$ci = get_instance();
		$ci->load->library('pagination');
		$ci->load->config('Globvariable');
		$perPage = $ci->config->item('gPerPage');
 		if(empty($segment))
			$segment=3;
		$config ['base_url'] = base_url () . $link;
		$config['reuse_query_string'] = true;
			if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
			if (count($_GET) > 0) $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
		
		$config ['total_rows'] = $total_rows;
		$config ['uri_segment'] = $segment;
		$config ['per_page'] = $perPage;
		$config['reuse_query_string'] = TRUE;
		// $choice = $config["total_rows"] / $config["per_page"];
    	$config["num_links"] = 2;
		$config ['full_tag_open'] = '<nav><ul class="pagination" style="width: auto;">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li>';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li>';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li>';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li>';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';
		
	
		$ci->pagination->initialize($config);
		$page = $config ['per_page'];
	
		return $page;
	}
}?>