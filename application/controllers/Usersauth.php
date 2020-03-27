<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController_front.php';

class Usersauth extends BaseController_front 
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('userauth_model');
	}

	function login($err_msg = NULL)
	{
		$logged_in = $this->session->userdata('logged_in');
        if($logged_in!='' || $logged_in==TRUE)
        {   
        	redirect(base_url().'show_myaccount.html','refresh');
        }
		$data='';
		if(isset($_REQUEST['user']) && isset($_REQUEST['pass']))
		{
			$this->form_validation->set_rules('user', 'Email', ' trim|required|valid_email');
			$this->form_validation->set_rules('pass', 'Password', 'trim|required');
			if ($this->form_validation->run() == FALSE)
			{	
				$this->session->set_flashdata('N','Invalid email or password');
				redirect(base_url('login.html'));
			}
			else
			{

				$user=$this->input->post('user');
				$pass=md5($this->input->post('pass'));
				$result = $this->userauth_model->loginUser($user,$pass);
				if($result==NULL)
				{
					$this->session->set_flashdata('unactive','Your account has not been activated yet.');
					redirect(base_url('login.html'));
				}
				else
				{

					if($result->num_rows() > 0)
					{

						$row = $result->row();
						if($row->status=='N') 
						{
							$this->session->set_flashdata('unactive','Your account has not been activated yet.');
							redirect(base_url('login.html'));

						}
						else
						{	  
							$cookie_name = "user_id";
							$cookie_value = $row->id;
							setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
							$session_data['buyer']=$row->buyer;	
							$session_data['paid_type']=$row->paid_type;
							$session_data['user_email']=$row->user_name;	
							$session_data['user_type']=$row->user_type;	
							$session_data['cust_id']=$row->cust_id;	
							$session_data['cid']=$row->cid;	
							$session_data['user_id']=$row->id;
							$session_data['u_name']=$row->name;
							$session_data['u_status']=$row->status;	
							$session_data['paid_type']=$row->paid_type;
							$session_data['frm_name']=$row->frm_name;
							$session_data['designation']=$row->designation;
							$session_data['mobile_no']=$row->mobile_no;
							$session_data['country']=$row->country;
							$session_data['state']=$row->state;
							$session_data['city']=$row->city;
							  
						    if($row->package_type=='')
								$session_data['pack_type']='A_F';
							else
								$session_data['pack_type']=$row->package_type;

							$date1=date_create(date('Y-m-d'));
							$date2=date_create($row->exp_date);
							$diff=date_diff($date1,$date2);
							$date_less=$diff->format("%R%a ");
						
							if($date_less<0)
							{
								$sql_user_query="update users set package_type='A_F' where lang_type='".$this->session->userdata("user_lang")."' and id='".$row->id."'";
								$this->db->Query($sql_user_query);
								$session_data['pack_type']='A_F';
							}
							$this->session->set_userdata('logged_in', TRUE);
							$this->session->set_userdata($session_data);
							
							// if($row->cust_id==0)
							//     redirect("edit_company_profile.html");	
							// else
							// {
								// $proqry="select profile_complite from customer where id='".$session_data['cust_id']."' and deleted='N'";
								// $query = $this->db->Query($proqry);
								// $pro_com_data=$query->row();

					 		// 	$prifile_complite=$pro_com_data->profile_complite;
					 			
								// if($prifile_complite=='100')
								 	redirect("show_myaccount.html");
								// else
								// 	redirect("show_myaccount-".$prifile_complite.".html");
							// }
						}
					}
					else
					{
						$this->session->set_flashdata('N','Invalid email or password.');
						$data['err'] = "Invalid email or password";
						redirect(base_url('login.html'));
					}
				}
			}
		}
		$this->loadViews('login', $this->global, $data , NULL);
	}

	function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata();
		redirect("login.html");
	}	
}