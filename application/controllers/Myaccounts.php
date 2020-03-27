<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/MyaccountController_front.php';
class Myaccounts extends MyaccountController_front
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('myaccount');
	}
	function show_myaccount($status = NULL)
	{
		$session_data = $this->session->userdata;
		
		if ($status != NULL)
		{
			$data['status'] = $status;
		
		 	$ac_data=$this->myaccount->show_customer($session_data['cust_id']);
			$data['ac_data']= $ac_data;
		}

		$data['all_product_cate'] = all_product_cate();
		if(isset($_REQUEST['listing_unique_id']))
		{
			$listing_unique_id=$_REQUEST['listing_unique_id'];
			$data['listing_unique_id'] = $listing_unique_id;
		}
		if(empty($session_data['fre_exp_id']))
		{
			$this->is_index_login();
		 	$user_cond=" and user_id='".$session_data['user_id']."'";
		 	$use_id=" and id='".$session_data['user_id']."'";
		}
		else
		{
		  	$user_cond=" and user_id='".$session_data['fre_exp_id']."'";
		  	$use_id=" and id='".$session_data['fre_exp_id']."'";
		}
		$Data_sqlResult=$this->myaccount->show_customer($user_cond);
		$user_sqlResult=$this->myaccount->show_user($session_data['user_id'])->row();
		$date1=date_create(date('Y/m/d'));
		$listingQryemail=$this->myaccount->listing_Qry_email($session_data['user_id']);
		if($listingQryemail->num_rows() > 0)
		{
			$emailcount= $listingQryemail->row();
			$data['emailcount'] = $emailcount;
		}
		$this->loadViews('show_myaccount', $this->global, $data , NULL);

	}
	

	function change_password()
	{
	 	$session_data = $this->session->userdata;
		 if(isset($_REQUEST['submit']))
		{
		 $this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required|callback_password_check');			
		 $this->form_validation->set_rules('new_pass', 'New Password', 'required');
		 $this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[new_pass]');
		 if($this->form_validation->run())
		 	{
				$selQry=array('password'=>md5($_REQUEST['new_pass']));
				$where = array('id'=>$session_data['user_id'], 'password'=>md5($_REQUEST['old_pass']), 'status'=>'Y', 'deleted'=>'N', 'lang_type'=>$this->session->userdata("user_lang"));
					$this->myaccount->updatePassword($selQry,$where);
					 $this->session->set_flashdata('Y','Password Successfully changed');
					 
					 redirect(base_url('change_password.html'));
		 	}
		 }
		 
			$this->loadViews('change_password');
	}

	public function password_check($oldpass)
    {
    	$session_data = $this->session->userdata;
        if($this->session->userdata('user_id')!='')
        {
        	$where = array('id'=>$session_data['user_id'],
		 					'password'=>md5($oldpass),
							'deleted'=>'N');
            $user = $this->myaccount->getChangePassData($where);
        }
        if(isset($user) && $user->password !== md5($oldpass)) 
        {
            $this->form_validation->set_message('password_check', 'The %s does not match');
            return false;
        }

        return true;
    }

	function edit_personal_profile()
	{		
		$session_data = $this->session->userdata;
		if(isset($_REQUEST['submit']))
		{
			$this->form_validation->set_rules('name', 'Name', 'required');
	        $this->form_validation->set_rules('detail', 'Details', 'required');
	        $this->form_validation->set_rules('mobile_no', 'Mobile', 'required');
	        $this->form_validation->set_rules('address', 'Address', 'required');
	        $this->form_validation->set_rules('city', 'City', 'required');

			if($this->form_validation->run())
			{
				if($_FILES['user_photo_new']['name'])
				{
					$d1=mktime(date('h'),date('i'),date('s'),date('m'),date('d'),date('y'));
					$config['upload_path']          = './images/user_photo/';
	                $config['allowed_types']        = 'gif|jpg|png|jpeg';
	                $config['max_size']             = 10000;
	                $config['max_width']            = 10000;
	                $config['max_height']           = 10000;
	                $config['file_name'] 			= $d1;
	                $this->load->library('upload', $config);

		               
					if($this->upload->do_upload('user_photo_new'))
					{
						$file_data = array('upload_data' => $this->upload->data());
							
						$uploadfile=$file_data['upload_data']['file_name'];
						if ($uploadfile != '' && $_REQUEST['logo'] != '')
						{
							$imgPath = "user_photo/".$_REQUEST['logo'];	
							if(file_exists($imgPath))
							{
								unlink($imgPath) or die('failed deleting: ' . $imgPath);
							}
						}
					}
				}
				else
				{
					$uploadfile=$_REQUEST['user_photo'];
				}
				$where = array('id'=>$session_data['user_id'], 'lang_type'=>$this->session->userdata("user_lang"));
				$Details['name']=valid_input_data($_REQUEST['name'], 'A');
				$Details['detail']=valid_input_data($_REQUEST['detail'], 'A');
				$Details['mobile_no']=valid_input_data($_REQUEST['mobile_no'], 'A');
				$Details['city']=$_REQUEST['city'];
				$Details['user_photo']=$uploadfile;
				$Details['address']=valid_input_data($_REQUEST['address'],'B');
				$this->myaccount->updateUserProfile($where,$Details);
				$this->session->set_flashdata('update', 'Successfully Update profile');
				redirect("view_personal_profile.html");
			}
		}
		$data['all_product_cate'] = all_product_cate();
		$data['userdata'] = $this->myaccount->getUserdata($session_data['user_id']);
		$this->loadViews('edit_personal_profile', $this->global, $data, NULL);
		
	}

	function view_personal_profile()
	{
		$session_data = $this->session->userdata;
		$data['all_product_cate'] = all_product_cate();
		$data['userdata'] = $this->myaccount->getUserdata($session_data['user_id']);
		$this->loadViews('view_personal_profile', $this->global, $data, NULL);	
	}

	// function add_cust_cat($cats,$custid)
	// {
		
	// 	$tsell='';
	// 	$tser='';
	// 	foreach($cats as $catid)
	// 	{
	// 		$values = array('cust_id'=>$custid,'cat_id'=>$catid);
	// 		$this->myaccount->insertCustCat($values);                
			
	// 		if($tser=='' || $tsell=='')
	// 		{
	// 		    $where = array('cat_id' =>$catid);
	// 			$this->myaccount->getCustType($where);
				
	// 			if($cat_type=='sell' && $tsell=='' && $_SESSION['buyer']!='Y')
	// 			{	
	// 				$sst= array('seller'=>'Y'); 
	// 				$where =  array('id'=>$custid);
	// 				$this->myaccount->updateList($set,$where);
	// 				return $tsell=1;
	// 			}
				
	// 			if($cat_type=='service' && $tser=='')	
	// 			{
	// 				$sst= array('ser_provider'=>'Y'); 
	// 				$where =  array('id'=>$custid);
	// 				$this->myaccount->updateCustomerList($set,$where);
	// 				return $tser=1;
	// 			}
	// 		}
	// 	}
	// }
}