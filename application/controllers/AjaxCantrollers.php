<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxCantrollers extends CI_Controller {

	/*=====================================================*/
	// function select_secoandry_project()
	// {
	// 	$this->load->model('ajax_model');

	// 	$primery_name=$_GET['primery_name'];
	// 	$cust_id=$_GET['cust_id'];
	// 	$sel_id = NULL;
	// 	if(isset($_GET['sel_id']))
	// 		$sel_id=$_GET['sel_id'];

	// 			$progroup_data1=$this->ajax_model->primery_pro_group($primery_name,$cust_id);
	// 			$sel_primary=$progroup_data1[0]->primery;
		
	// 		$progroup_data=$this->ajax_model->secoandry_pro_group($sel_primary,$cust_id);

	// 		$drop='<select name="sel_secoandry" class="form-control" onchange="selected_secoandry_project(this.value)">
	// 		 <option value="0" >Please select</option>';
			
	// 		foreach($progroup_data as $row)
	// 		{
	// 			if($sel_id==$row->id)
	// 				$drop.='<option value="'.$row->id.'" selected="selected">'.$row->secoandry.'</option>';
	// 			else
	// 				$drop.='<option value="'.$row->id.'">'.$row->secoandry.'</option>';
	// 		}
	// 		$drop.='</select>';
	// 		echo $drop;
	// }

	// function getSubCategoryDropdown()
	// { 	
	// 	$drop = "";
		
	// 	//=====sub category dropdown=======//
	// 	$this->load->model('ajax_model');
	// 	$siteQry=$this->ajax_model->getSubCategoryDropdown($_POST['parent_id']); 
		

	// 	$drop.='<select name="select_sub_catgory" id="select-model" onchange="getSubNextCategoryDropdown(this.value)" class="form-control">
	// 				<option value=""  selected="selected">Please Select </option>';
	// 	if($_POST['parent_id']!="")
	// 	{
	// 		foreach($siteQry as $key=>$val)
	// 		{
				
	// 			$drop.='<option value="'.$val->cat_id.'">'.$val->name.'</option>';
	// 		}
	// 	}
	// 	$drop.='</select>';
	// 	//=================type dropdwon======================//
	// 	// $type_dropdown=getTypeDropdown('',$_REQUEST['parent_sub_id']);
	// 	echo $drop; //."//".$type_dropdown;
	// }

	// function getSubnextdropdown()
	// {   
		
	// 	$drop = "";
		
	// 	//=====sub category dropdown=======//
	// 	$this->load->model('ajax_model');
	// 	$siteQry=$this->ajax_model->getSubnextCategoryDropdown($_GET['parent_id']); 
	// 	//echo $CI->db->last_query();exit();
	// 	$drop.='<select name="next_sub_cat" id="next_sub_cat" class="form-control">
	// 				<option value=""  selected="selected">Please Select </option>';
	// 	foreach($siteQry as $key=>$val)
	// 	{	
	// 		$drop.='<option value="'.$val->id.'">'.$val->type_name.'</option>';
	// 	}
	// 	$drop.='</select>';
	// 	//=================type dropdwon======================//
	// 	// $type_dropdown=getTypeDropdown('',$_REQUEST['parent_sub_id']);
	// 	echo $drop; //."//".$type_dropdown;
	// }


	// function getSubCategoryDropdowndata()
	// {   
	// 	$drop = "";
	// 	$this->load->model('ajax_model');
	// //==============================sub category dropdown===========================//
	// $citydata = $this->ajax_model->getSubcateory($_GET['parent_id']);

	// $drop.='<select name="select_sub_catgory" id="select-model"  onchange="getSubnextdropdowntype(this.value)" class="form-control" required>
	// 			<option value="" selected="selected">Please Select</option>';
	// foreach($citydata as $key=>$val)
	// {
	// 	$drop.='<option value="'.$val->id.'">'.$val->category_name.'</option>';
	// }
	// $drop.='</select>';
	// //=============================type dropdwon==================================//
	// echo $drop;
	// }
	

	// function chkSubdomain()
	// {	
	// 	$sub_domain = $_POST['sub_domain'];
	// 	if(isset($_POST['frm_id']))
	// 		$frm_id = $_POST['frm_id'];
	// 	else
	// 		$frm_id = '';
	// 	$this->load->model('ajax_model');
	// 	$total_sub_domain = $this->ajax_model->checkSubdomain($sub_domain,$frm_id);
	// 	 if($total_sub_domain!='')
	// 	 {
	// 		$res=$sub_domain."**1";
	// 	}
	// 	else
	// 	{
	// 		$res=$sub_domain."**0";
	// 	}
	// echo $res;	
	// }
	
	// function CgetSubCategoryDropdown()
	// {
		
	// 	if ($_REQUEST['parent_id']!=''){
	//  $siteQry="SELECT category_name,id FROM `category` WHERE parent_id='".$_REQUEST['parent_id']."' and deleted='N' and status='Y' order by category_name"; 
	// $citydata=$this->db->query($siteQry);
	// $citydata=$citydata->result();
	// }
	// $drop.='<select name="select_sub_catgory" id="select-model"  onchange="getSubCategoryDropdown_fortype(this.value)" class="form-control" required>
	// 			<option value="" selected="selected">Please Select</option>';
	// foreach($citydata as $key)
	// {
	// 	$drop.='<option value="'.$key->id.'">'.$key->category_name.'</option>';
	// }
	// $drop.='</select>';
	// //=============================type dropdwon==================================//
	// $type_dropdown=getTypeDropdown('',$_REQUEST['parent_id']);
	// echo $drop."//".$type_dropdown;
	// }
	

}
?>