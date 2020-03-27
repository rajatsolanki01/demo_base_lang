<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController_front.php';
class News extends BaseController_front 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('news_show');
	}
	function show_list()
	{
		$count = count($this->news_show->getnewslist());
		$URI_SEGMENT = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0 ;
        $returns = $this->paginationCompress ("show_news_list.html",$count, 10,$URI_SEGMENT);
		$data['show_news_list'] = $this->news_show->getnewslist($returns["page"],$returns["segment"]);
		$this->loadViews('show_news_list', $data, NULL);
	}

}