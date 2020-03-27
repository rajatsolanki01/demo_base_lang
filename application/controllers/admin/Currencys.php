<?php
defined('BASEPATH') OR exit('no direct script access allowed');
class Currencys extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
      $adminLoggedIn = $this->session->userdata('adminLoggedIn');
      if($adminLoggedIn=='' || $adminLoggedIn!=TRUE)
      {   
          redirect(base_url().'admin.php','refresh');
      }
      $this->load->model('admin/currency');
      $this->load->config('Globvariable');
	  }
    function ShowCurrency($page=NULL)
   {   
      if(isset($_REQUEST['id']))
      {
        $data['currencyedit']=$this->currency->getcurrencydata($_REQUEST['id']);
      }
        
        if(isset($_REQUEST['submit']))
        {
          $this->form_validation->set_rules('currency', 'Currency', 'required');
          $this->form_validation->set_rules('symbol', 'Symbol', 'required');
          if($this->form_validation->run())
            {
              $details['currency']=valid_input_data(trim($_REQUEST['currency']), 'A');
              $details['symbol']=$_REQUEST['symbol'];
              if(isset($_REQUEST['id'])&&$_REQUEST['id']!= '')
              {
                $this->currency->updatecurrencydata($_REQUEST['id'],$details);
                redirect(base_url('ShowCurrency'));
              }
              else
              {
                $this->currency->insrtcurrencydata($details);
                redirect($_SERVER['HTTP_REFERER']);
              }
            }
        }
     $page = intval($page);
        if($page<=0)
        {
            $page = 0;
            $start_r = $page;
        }
        else
        {
            $start_r = $page;
        }
        $gPageRow = $this->config->item('gPerPage');
        $query = $this->currency->getcurrency($start_r,$gPageRow);
        $usersdata =  $query->result();
        $data['currnecydata'] = $usersdata;

        //for show total searched 
        $total_rows = $this->currency->getcurrency()->num_rows;
        
        //pagination start
        $URI_SEGMENT = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $returns = $this->mylibrary->paginationCompress("ShowCurrency", $total_rows,2);
        $data['num']= $page;
        $data['showPagination'] = $this->pagination->create_links();
        $this->load->view('admin/header.php');
        $this->load->view('admin/leftpanel.php');
        $this->load->view('admin/Currencys/ShowCurrency',$data);
        $this->load->view('admin/footer.php');
     
  }
  public function CurrencyApprove($status,$id)
    {
        $arr_data = array();
        if($status=="Y")
            $arr_data = array("status"=>"N");
        else if ($status=="N")
            $arr_data = array("status"=>"Y");
        $this->db->where(array("id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
        $rec = $this->db->update("currency", $arr_data);
        redirect($_SERVER['HTTP_REFERER']); 
    }
    public function DeleteCurrency($id)
    { 
          $arr_data = array("deleted"=>"Y");
          $this->db->where(array("id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
          $rec = $this->db->update("currency", $arr_data);
          redirect($_SERVER['HTTP_REFERER']); 
    }
    public function DefaultCurrency()
    { 
          $id=$_REQUEST['def_curr'];
          $arr_data = array("defcurr_val"=>"Y");
          $this->db->where(array("id"=>$id, 'lang_type'=>$this->session->userdata("user_lang")));
          $rec = $this->db->update("currency", $arr_data);

          $arr_data = array("defcurr_val"=>"N");
          $this->db->where('id != ',$id, 'lang_type'=>$this->session->userdata("user_lang"));
          $rec = $this->db->update("currency", $arr_data);
          redirect($_SERVER['HTTP_REFERER']); 
    }
  
 
}
?>