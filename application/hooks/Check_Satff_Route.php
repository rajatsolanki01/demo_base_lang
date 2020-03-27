<?php
class Check_Satff_Route extends CI_Controller{


	function Check_Route()
	{
	    // Staff left panel 
		if($this->session->userdata('adminUserId')!=1 && $this->session->userdata('adminUserType')=='S')
		{
			$Action = $this->uri->segment(1);
			hcreatePrivilageSessForStaffLeftPanel();
			$Action_array[1] = array('GeneralSetting', 'MemberPackage','ChangeAdminPassword');
			$Action_array[2] = array('UserView', 'CustomerView','PerDayUser','AddStaffUser','ViewStaffUsers');
			$Action_array[3] = array('CategoryView', 'ClassifiedCategories','TrdeLeadCategories');
			$Action_array[4] = array('Products');
			$Action_array[5] = array('ClassifiedProducts');
			$Action_array[6] = array('TradLeadSell','TradLeadBuy');
			$Action_array[7] = array('AllBanners');
			$Action_array[8] = array('ProductApproved','TradeBuyApproved','TrdeApproved','CustmoreApproved');
			$Action_array[9] = array('ShowBuyRequirement');
			$Action_array[10] = array('SEO');
			$Action_array[11] = array('MailView');
			$Action_array[12] = array('AdminInquiry');
			$Action_array[13] = array('ShowLocation');
			$Action_array[14] = array('StaticPage','StaticPageList','CmsShowPages');
			$Action_array[15] = array('Import','Export','ExportUsers');
			$Action_array[16] = array('HomeBanner');
			$Action_array[17] = array('Career','Franchisee');
			$Action_array[18] = array('ShowPayment');
			$Action_array[19] = array('EMailTemplates');
			$Action_array[20] = array('ShowCurrency');
			$Action_array[21] = array('ShowTrades','AddTreadShows');
			$Action_array[22] = array('NewslLst','NewsAdd');
			$Action_array[23] = array('MostViewProduct');
			$Action_array[24] = array('Advertisement');
			$Action_array[25] = array('SetUserPrivilege');

			for ($i=1; $i <25 ; $i++) { 
				if(in_array($Action, $Action_array[$i]) && hmenuIdExitsInPrivilageArray($i)=='N')
				{
					redirect(base_url().'Dashboard');
				}
			}
			

		}
		
		// if( $this->session->userdata('page') )
		// {
	 //     	redirect(base_url().'login/');
	 //    }
    }
}
?>