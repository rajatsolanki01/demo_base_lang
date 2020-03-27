var xmlHttp

function showHint(str)
{
	if (str.length==0)
	{ 
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	}
	var url="get.php";
	url=url+"?q="+str;
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function ajax() {
	// Make a new XMLHttp object
	if (typeof window.ActiveXObject != 'undefined' ) doc = new ActiveXObject("Microsoft.XMLHTTP");
	else doc = new XMLHttpRequest();
}
 function callpage(page)
 {
	
	 document.getElementById("pagevalid").value=page;
 }
function GetXmlHttpObject()
{
	var xmlHttp=null;
	try
	{
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e)
	{
		// Internet Explorer
		try
		{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}
function stateChanged() 
{
	if (xmlHttp.readyState==4)
	{
		document.getElementById("txtHint").innerHTML=xmlHttp.responseText;
	}
}

function getSubCategoryDropdown(parent_id)
 {
	 ajax();
		if (doc)
		{ 	  
		   doc.open("GET", "ajax.php?section=getSubCategoryDropdown&parent_id="+parent_id, false);   
		   doc.send(null);
		}
	  // alert(doc.responseText);
	  var explode_dropdown=doc.responseText.split("//");;
	  
	   document.getElementById('sub_cat_dropdown').innerHTML=explode_dropdown[0];
	   document.getElementById('type_dropdown').innerHTML=explode_dropdown[1];
	//document.getElementById("prop_subcate_list_rent").innerHTML=doc.responseText;
	//document.getElementById("prop_cate_val").value="";
  	 
 }
function showcats(id)
{
	//alert(id);
	ajax();
	if(document.getElementById("chk_"+id).checked==true)
	{
	  document.getElementById("cat_"+id).style.display="block";
	}
	else
	{
		if(doc)
	   {
		   doc.open("GET", "ajax.php?section=show_cats&id="+id, false);   
		   doc.send(null);
	   }
	   if(doc.responseText!="")
	   {
		   var ids = doc.responseText.split(",");
			for(var idnum in ids)
			{
			 		document.getElementById("chk_"+parseInt(ids[idnum])).checked=false;
		    		document.getElementById("cat_"+parseInt(ids[idnum])).style.display="none";
			}
	   }	
		document.getElementById("cat_"+id).style.display="none";
	}
}


function Valid_send_email(frm)
{
 var checkFocus=0;
/* if(frm.password.value=='')
	{
		document.getElementById("password").innerHTML="<span class='alert'>Please Enter Password.</span>";	
		if(ckeckFocus!=1)
		{	frm.password.focus();	varckeckFocus=1;	}
	}
	else
		document.getElementById("password").innerHTML="";	
		
	if(frm.username.value=='')
	{
		document.getElementById("username").innerHTML="<span class='alert'>Please Enter User Name.</span>";	
		if(ckeckFocus!=1)
		{	frm.username.focus();	varckeckFocus=1;	}
	}
	else
		document.getElementById("username").innerHTML="";		
*/ 


 var ckeckFocus=0;
	if(frm.email.value=='')
	{	
		document.getElementById("email").innerHTML="<span class='alert'>Please Enter Email address.</span>";
			if(ckeckFocus!=1)
			{
				frm.email.focus();
				var ckeckFocus=1;
			}
	}
	else
	{
		var frmEmail1 =frm.email.value.toLowerCase();	
		var frmEmailformat = /^[^@\s]+@([-a-z0-9]+\.)+([a-z]{2}|com|net|edu|org|gov|mil|int|biz|pro|info|arpa|aero|coop|name|museum)$/;
		if (!frmEmailformat.test(frmEmail1)) 
		{
			document.getElementById("email").innerHTML="<span class='alert'>Please Enter Valid Email Address.</span>";
			if(ckeckFocus!=1)
				frm.email.focus();	
			var ckeckFocus=1;
		}
	}

  if(ckeckFocus==1)
		return false;
	else
		return true;	
}


function Valid_edit_categories(frm)
{
 
	var ckeckFocus=0;
	
	if(frm.name.value=='')
	{	
		document.getElementById("name").innerHTML="<span class='alert'>Please Enter Name.</span>";
			if(ckeckFocus!=1)
			{
				frm.name.focus();
				var ckeckFocus=1;
			}
	}
	else
	{
		ajax();
		if (doc){
		   doc.open("GET", "ajax.php?section=check_valid_cate&cat_name="+frm.cat_name.value+"&editid="+frm.id.value, false);   
			doc.send(null);
		   }
			if(doc.responseText==1)
			{
				document.getElementById("name").innerHTML="<span  style='color:#F00;'>This category Name Already Exist.</span>";
				if(ckeckFocus!=1)
				{
					frm.cat_name.focus();
					var ckeckFocus=1;
				}
			}
			else
			document.getElementById("name").innerHTML="";
	}
	
	if(!frm.cat_type[0].checked && !frm.cat_type[1].checked)
	{	
		document.getElementById("cattype").innerHTML="<span class='alert'>Please Check One of them.</span>";
			if(ckeckFocus!=1)
			{
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("cattype").innerHTML="";	
			
	if(ckeckFocus==1)
		return false;
	else
		return true;	

}
function Valid_add_user(frm)
{
	

	var ckeckFocus=0;
	if(frm.user_name.value=='')
	{	
		document.getElementById("user_name").innerHTML="<span class='alert'>Please Enter email address.</span>";
			if(ckeckFocus!=1)
			{
				frm.user_name.focus();
				var ckeckFocus=1;
			}
	}
	else
	{
		var frmEmail1 =frm.user_name.value.toLowerCase();	
		var frmEmailformat = /^[^@\s]+@([-a-z0-9]+\.)+([a-z]{2}|com|net|edu|org|gov|mil|int|biz|pro|info|arpa|aero|coop|name|museum)$/;
		if (!frmEmailformat.test(frmEmail1)) 
		{
			document.getElementById("user_name").innerHTML="<span class='alert'>Please Enter Valid Email Address.</span>";
			if(ckeckFocus!=1)
				frm.user_name.focus();	
			var ckeckFocus=1;
		}
		else
		{
		ajax();
			if (doc){
			   doc.open("GET", "ajax.php?section=check_email&email="+frm.user_name.value+"&id="+frm.id.value, false);   
				doc.send(null);
			   }
//		  alert(doc.responseText);//return false;
		   if(doc.responseText==1)
		   {	
		   		document.getElementById("user_name").innerHTML="<span class='alert'>Email Already Exists.</span>";
				frm.user_name.focus();
				var	 ckeckFocus=1;
		   }
		   else
		   	document.getElementById("user_name").innerHTML="";	
		}
	}
	
	if(frm.new_pass.value=='' && frm.old_pass.value=='')
	{	
		document.getElementById("new_pass").innerHTML="<span class='alert'>Please Enter Password.</span>";
		if(ckeckFocus!=1)
		{	frm.new_pass.focus();				ckeckFocus=1;			}
	}
	else
		document.getElementById("new_pass").innerHTML="";
	
	if(frm.name.value=='')
	{	
		document.getElementById("name").innerHTML="<span class='alert'>Please Enter Name.</span>";
		if(ckeckFocus!=1)
		{	frm.name.focus();				ckeckFocus=1;			}
	}
	else
		document.getElementById("name").innerHTML="";
		
	if(frm.designation.value=='')
	{	
		document.getElementById("designation").innerHTML="<span class='alert'>Please Enter Designation.</span>";
		if(ckeckFocus!=1)
		{	frm.designation.focus();				ckeckFocus=1;			}
	}
	else
		document.getElementById("designation").innerHTML="";
	
	if(frm.mobile_no.value=='')
	{	
		document.getElementById("mobile_no").innerHTML="<span class='alert'>Please Enter Mobile No.</span>";
			if(ckeckFocus!=1)
			{	frm.mobile_no.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("mobile_no").innerHTML="";	
		
	if(frm.address.value=='')
	{	
		document.getElementById("address").innerHTML="<span class='alert'>Please Enter Address.</span>";
			if(ckeckFocus!=1)
			{	frm.address.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("address").innerHTML="";
	//old validation of country sate city	
	/*if(frm.country.value=='')
	{	
		document.getElementById("country").innerHTML="<span class='alert'>Please Select Country.</span>";
			if(checkFocus!=1)
			{	frm.country.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("country").innerHTML="";	
	
	
	if(frm.state.value=='')
	{	
		document.getElementById("state").innerHTML="<span class='alert'>Please Select State.</span>";
			if(checkFocus!=1)
			{	frm.state.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("state").innerHTML="";
 

	if(frm.city.value=='')
	{	
		document.getElementById("city").innerHTML="<span class='alert'>Please Select City.</span>";
			if(checkFocus!=1)
			{	frm.city.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("city").innerHTML="";
		*/
		
	//alert(frm.id.value);
	/*if(frm.id.value=='')
	{
		ajax();
		if (doc){
		   doc.open("GET", "ajax.php?section=check_detail&frm_name="+frm.frm_name.value+"&city="+frm.city.value+"&ph_no="+frm.ph_no.value+"&site_url="+frm.site_url.value+"&email="+frm.email.value, false);   
	    	doc.send(null);
		   }
		//alert('');   
	   //alert(doc.responseText);//return false;
	   if(doc.responseText==0)
	   {
	   		document.getElementById("alert").innerHTML="";
	   }
	   else
	   {
	   		document.getElementById("alert").innerHTML="Firm Name Already Exists";
			var	 ckeckFocus=1;
	   }
	}*/
	
	if(frm.country.value=='')
	{	
		document.getElementById("country").innerHTML="<span class='alert'>Please Select Country.</span>";
			if(checkFocus!=1)
			{	frm.country.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("country").innerHTML="";	
	
	

	/*	
	if(frm.state_drop.value=='')
	{	

		document.getElementById("state").innerHTML="<span class='alert'>Please Select state.</span>";
			if(checkFocus!=1)
			{	frm.state_drop.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("state").innerHTML="";
 */

	if(frm.city_drop.value=='')
	{	

		document.getElementById("city").innerHTML="<span class='alert'>Please Select City.</span>";
			if(checkFocus!=1)
			{	frm.city_drop.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("city").innerHTML="";
		
		
	
	if(ckeckFocus==1)
		return false;
	else
		return true;	


}
function Valid_add_customer(frm)
{

	var ckeckFocus=0;
//	alert('-'+frm.f_id.value+'-');
	
	if(frm.frm_name.value=='')
	{	alert(frm.frm_name.value);
		document.getElementById("frm_name").innerHTML="<span class='alert'>Please Enter Firm Name.</span>";
		if(ckeckFocus!=1)
		{	frm.frm_name.focus();				ckeckFocus=1;			}
	}
	else
		document.getElementById("frm_name").innerHTML="";
		

	if(frm.state.value=='')
	{	
		document.getElementById("state").innerHTML="<span class='alert'>Please Enter State.</span>";
			if(ckeckFocus!=1)
			{	frm.state.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("state").innerHTML="";

	if(frm.city.value=='')
	{	
		document.getElementById("city").innerHTML="<span class='alert'>Please Enter City.</span>";
			if(ckeckFocus!=1)
			{	frm.city.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("city").innerHTML="";


	if(frm.address.value=='')
	{	
		document.getElementById("address").innerHTML="<span class='alert'>Please Enter Address.</span>";
			if(ckeckFocus!=1)
			{	frm.address.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("address").innerHTML="";
		
	if(frm.ph_no.value=='')
	{	
		document.getElementById("ph_no").innerHTML="<span class='alert'>Please Enter Phone No.</span>";
			if(ckeckFocus!=1)
			{	frm.ph_no.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("ph_no").innerHTML="";
			
	if(frm.email.value=='')
	{	
		document.getElementById("email").innerHTML="<span class='alert'>Please enter email address.</span>";
			if(ckeckFocus!=1)
			{
				frm.email.focus();
				var ckeckFocus=1;
			}
	}
	else
	{
		var frmEmail1 =frm.email.value.toLowerCase();	
		var frmEmailformat = /^[^@\s]+@([-a-z0-9]+\.)+([a-z]{2}|com|net|edu|org|gov|mil|int|biz|pro|info|arpa|aero|coop|name|museum)$/;
		if (!frmEmailformat.test(frmEmail1)) 
		{
			document.getElementById("email").innerHTML="<span class='alert'>Please enter valid email address.</span>";
			if(ckeckFocus!=1)
				frm.email.focus();	
			var ckeckFocus=1;
		}
		else
		document.getElementById("email").innerHTML="";
	}
	/*	
	if(frm.site_url.value=='')
	{	
		document.getElementById("site_url").innerHTML="<span class='alert'>Please Enter Website Address</span>";
			if(ckeckFocus!=1)
			{	frm.site_url.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("site_url").innerHTML="";	
		*/
	if(frm.detail.value=='')
	{	
			document.getElementById("detail").innerHTML="<span class='alert'>Please Enter Description.</span>";
			if(ckeckFocus!=1)
			{	frm.detail.focus();				var ckeckFocus=1;			}
		}
	else
		document.getElementById("detail").innerHTML="";		
	
	if(frm.id.value=='')
	{
		ajax();
		if (doc){
		   doc.open("GET", "ajax.php?section=check_detail&frm_name="+frm.frm_name.value+"&city="+frm.city.value+"&ph_no="+frm.ph_no.value+"&site_url="+frm.site_url.value+"&email="+frm.email.value, false);   
	    	doc.send(null);
		   }
		
	  // alert(doc.responseText);//return false;
	   if(doc.responseText==0)
	   {
	   		document.getElementById("frm_name").innerHTML="";    }
	   else
	   {
	   		document.getElementById("frm_name").innerHTML="Firm Name Already Exists"; 
			if(ckeckFocus!=1)
			{	frm.id.focus();				var ckeckFocus=1;			}
	   }
	}
	
	
	if(ckeckFocus==1)
		return false;
	else
		return true;	

}

function Valid_edit_product(frm)
{

	var ckeckFocus=0;
//	alert('-'+frm.f_id.value+'-');
	//alert(frm.name);
	if(frm.pro_name.value=='')
	{	
		document.getElementById("pro_name").innerHTML="<span class='alert'>Please Enter Product Name.</span>";
		if(ckeckFocus!=1)
		{	frm.pro_name.focus();				ckeckFocus=1;			}
	}
	else
		document.getElementById("pro_name").innerHTML="";
		

	if(frm.pro_desc.value=='')
	{	
		document.getElementById("pro_desc").innerHTML="<span class='alert'>Please Enter Product Description.</span>";
			if(ckeckFocus!=1)
			{	frm.pro_desc.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("pro_desc").innerHTML="";

	/*if(frm.price.value=='')
	{	
		document.getElementById("price").innerHTML="<span class='alert'>Please Enter Product Price.</span>";
			if(ckeckFocus!=1)
			{	frm.price.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("price").innerHTML="";*/


	/*if(frm.delivery_term.value=='')
	{	
		document.getElementById("delivery_term").innerHTML="<span class='alert'>Please Enter Delivery Terms.</span>";
			if(ckeckFocus!=1)
			{	frm.delivery_term.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("delivery_term").innerHTML="";
		
	if(frm.payment_term.value=='')
	{	
		document.getElementById("payment_term").innerHTML="<span class='alert'>Please Enter Payment Terms</span>";
			if(ckeckFocus!=1)
			{	frm.payment_term.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("payment_term").innerHTML="";	*/
		
	/*if(frm.quantity.value=='')
	{	
		document.getElementById("quantity").innerHTML="<span class='alert'>Please Product Quantity</span>";
			if(ckeckFocus!=1)
			{
				frm.quantity.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("quantity").innerHTML="";*/
		
	if(frm.seo_key.value=='')
	{	
		document.getElementById("seo_key").innerHTML="<span class='alert'>Please Enter Keywords</span>";
			if(ckeckFocus!=1)
			{	frm.seo_key.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("seo_key").innerHTML="";	
	if(ckeckFocus==1)
		return false;
	else
		return true;	

}
function setPriority(frm,val)
{
	
	if(val=='random')
		document.getElementById("priority").value='0';
	else
	{
		ajax();
		if (doc){
		   doc.open("GET", "ajax.php?section=check_priority&cat_id="+frm.cat_id.value+'&pos='+val, false);   
	    	doc.send(null);
		   }
	   		document.getElementById("priority").value=(parseInt(doc.responseText)+1);
	}
}
function Valid_add_banner(frm)
{
	var checkFocus=0;
	if(frm.banner.value=='' && frm.photo.value=='')
	{	
		document.getElementById("banner").innerHTML="<span class='alert' style='color:#F00' >Please Upload Banner Image.</span>";
			if(checkFocus!=1)
			{
				frm.banner.focus();
				var checkFocus=1;
			}
	}
	else if(frm.banner.value!='')
	{
		var file = frm.banner.value;
		var mime = file.substr(file.lastIndexOf('.'));
		if (mime!= '.gif' && mime!= '.jpg' && mime!= '.JPG' && mime!= '.GIF' && mime!= '.jpeg' && mime!= '.JPEG')
		{
			document.getElementById("banner").innerHTML="<span class='alert'  style='color:#F00'>Please Upload Proper Banner Image either gif or jpg.</span>";
			if(checkFocus!=1)
			{
				frm.banner.focus();
				var checkFocus=1;
			}
		}
		else
			document.getElementById("banner").innerHTML="";
	 }
	 else
			document.getElementById("banner").innerHTML="";
			

	/*		
			
	if(frm.priority.value=='')
	{	
		document.getElementById("priority").innerHTML="<span class='alert'>Please Set Priority for This Image.</span>";
			if(checkFocus!=1)
			{
				frm.priority.focus();
				var checkFocus=1;
			}
	}
	else if(frm.priority.value=='0' && frm.cat_id.value!=0)
	{
		document.getElementById("priority").innerHTML="<span class='alert'>This Priority use only Home Banner.</span>";
		if(checkFocus!=1)
			{
				frm.priority.focus();
				var checkFocus=1;
			}
	}
	else
	{
		if(frm.position.value !='random')
		{	
			ajax();
			if (doc){
			   doc.open("GET", "ajax.php?section=check_priority&cat_id="+frm.cat_id.value+'&prr='+frm.priority.value+'&pos='+frm.position.value+'&banner_id='+frm.banner_id.value, false);   
				doc.send(null);
			   }
	//	   alert(doc.responseText);
		   if(parseInt(doc.responseText)==0)
		   {
			  document.getElementById("priority").innerHTML="";
		   }
		   else if(parseInt(doc.responseText)==2)
		   {
			  document.getElementById("priority").innerHTML="<span class='alert'>This page does not exist</span>";
			  if(checkFocus!=1)
				{
					frm.priority.focus();
					var checkFocus=1;
				}
		   }
		   else
		   {
				document.getElementById("priority").innerHTML="<span class='alert'>This priority is already booked</span>";
				if(checkFocus!=1)
				{
					frm.priority.focus();
					var checkFocus=1;
				}
		   }
		}
	}
	*/
	/*
  if(frm.months.value=='')
	{
	 	document.getElementById("months").innerHTML="<span class='alert'>Please Enter months.</span>";
			if(checkFocus!=1)
			{
				frm.months.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("months").innerHTML="";
	  
	 if(frm.city.value=='')
	{
	 	document.getElementById("city").innerHTML="<span class='alert'>Please Select City.</span>";
			if(checkFocus!=1)
			{
				frm.city.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("city").innerHTML="";
	  
	 if(frm.state.value=='')
	{
	 	document.getElementById("state").innerHTML="<span class='alert'>Please Select State.</span>";
			if(checkFocus!=1)
			{
				frm.state.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("state").innerHTML="";
	  
	  if(frm.state.value=='')
	{
	 	document.getElementById("state").innerHTML="<span class='alert'>Please Select State.</span>";
			if(checkFocus!=1)
			{
				frm.state.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("state").innerHTML=""; 
	*/  
	  if(frm.ad_url.value=='')
	{
	 	document.getElementById("ad_url").innerHTML="<span class='alert' style='color:#F00'>Please Enter Url.</span>";
			if(checkFocus!=1)
			{
				frm.ad_url.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("ad_url").innerHTML="";   
	 
	  if(frm.end_date.value=='')
	{
	 	document.getElementById("end_dateid").innerHTML="<span class='alert' style='color:#F00'>Please Enter End Date.</span>";
			if(checkFocus!=1)
			{
				frm.end_date.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("end_dateid").innerHTML="";  
	
	  
	  if(frm.position.value=='')
	{
	 	document.getElementById("positionmsg").innerHTML="<span class='alert' style='color:#F00'>Please Enter Position.</span>";
			if(checkFocus!=1)
			{
				frm.position.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("positionmsg").innerHTML="";   
	  

		
	if(checkFocus==1)
		return false;
	else
		return true;	

}

function Valid_add_templates(frm)
{
 	var checkFocus=0;
	if(frm.cate_list.value=='')
	{
	 	document.getElementById("cate_list").innerHTML="<span class='alert'>Please Select Category.</span>";
			if(checkFocus!=1)
			{
				frm.cate_list.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("cate_list").innerHTML="";
	
	if(frm.userfile.value=='')
	{	
		document.getElementById("templates").innerHTML="<span class='alert'>Please Upload Templates Image.</span>";
			if(checkFocus!=1)
			{
				frm.userfile.focus();
				var checkFocus=1;
			}
	}
	else
	{
		var file = frm.userfile.value;
		var mime = file.substr(file.lastIndexOf('.'));
		if (mime!= '.gif' && mime!= '.jpg' && mime!= '.JPG' && mime!= '.GIF' && mime!= '.jpeg' && mime!= '.JPEG')
		{
			document.getElementById("templates").innerHTML="<span class='alert'>Please Upload Proper Template Image either gif or jpg.</span>";
			if(checkFocus!=1)
			{
				frm.userfile.focus();
				var checkFocus=1;
			}
		}
		else
			document.getElementById("templates").innerHTML="";
	}
		
	if(checkFocus==1)
		return false;
	else
		return true;
	
}

function Valid_add_categories(frm)
{
	var ckeckFocus=0;
	if(frm.name.value=='')
	{	
		document.getElementById("name").innerHTML="<span class='alert'>Please Enter Name.</span>";
			if(ckeckFocus!=1)
			{
				frm.name.focus();
				var ckeckFocus=1;
			}
	}
	else
	{
		if(frm.name.edit_id=='')
		{
			ajax();
			if (doc){
			   doc.open("GET", "ajax.php?section=check_valid_cate&cat_name="+frm.name.value, false);   
				doc.send(null);
			   }
				if(doc.responseText==1)
				{
					document.getElementById("name").innerHTML="<span class='alert'>This category Name Already Exist.</span>";
					if(ckeckFocus!=1)
					{

						frm.name.focus();
						var ckeckFocus=1;
					}
				}
				else
				document.getElementById("name").innerHTML="";
		}
		else
				document.getElementById("name").innerHTML="";
	}
	
		
	if(ckeckFocus==1)
		return false;
	else
		return true;	

}

function Valid_user(frm)
{
	var ckeckFocus=0;
	
	if(frm.entrydate.value=='')
	{	
		document.getElementById("entrydate").innerHTML="<span class='alert'>Please enter Date.</span>";
			if(ckeckFocus!=1)
			{
				frm.entrydate.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("entrydate").innerHTML="";
	
	if(frm.name.value=='')
	{	
		document.getElementById("name").innerHTML="<span class='alert'>Please enter name.</span>";
			if(ckeckFocus!=1)
			{
				frm.name.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("name").innerHTML="";
	
	if(frm.dob.value=='')
	{	
		document.getElementById("dob").innerHTML="<span class='alert'>Please enter Date of Birth.</span>";
			if(ckeckFocus!=1)
			{
				frm.dob.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("dob").innerHTML="";
	
	if(frm.age.value=='')
	{	
		document.getElementById("age").innerHTML="<span class='alert'>Please enter age.</span>";
			if(ckeckFocus!=1)
			{
				frm.age.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("age").innerHTML="";
	
	if(frm.f_h_name.value=='')
	{	
		document.getElementById("f_h_name").innerHTML="<span class='alert'>Please enter Father's/Husband Name.</span>";
			if(ckeckFocus!=1)
			{
				frm.f_h_name.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("f_h_name").innerHTML="";

if(frm.address.value=='')
	{	
		document.getElementById("address").innerHTML="<span class='alert'>Please enter address.</span>";
			if(ckeckFocus!=1)
			{
				frm.address.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("address").innerHTML="";





if(frm.city.value=='')
	{	
		document.getElementById("city").innerHTML="<span class='alert'>Please enter city.</span>";
			if(ckeckFocus!=1)
			{
				frm.city.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("city").innerHTML="";
if(frm.state.value=='')
	{	
		document.getElementById("state").innerHTML="<span class='alert'>Please enter state.</span>";
			if(ckeckFocus!=1)
			{
				frm.state.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("state").innerHTML="";
if(frm.mobile.value=='')
	{	
		document.getElementById("mobile").innerHTML="<span class='alert'>Please enter mobile no.</span>";
			if(ckeckFocus!=1)
			{
				frm.mobile.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("mobile").innerHTML="";
if(frm.nominee_name.value=='')
	{	
		document.getElementById("nominee_name").innerHTML="<span class='alert'>Please enter Nominee Name.</span>";
			if(ckeckFocus!=1)
			{
				frm.nominee_name.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("nominee_name").innerHTML="";
if(frm.nominee_rel.value=='')
	{	
		document.getElementById("nominee_rel").innerHTML="<span class='alert'>Please enter Nominee Relation.</span>";
			if(ckeckFocus!=1)
			{
				frm.nominee_rel.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("nominee_rel").innerHTML="";
if(frm.nominee_dob.value=='')
	{	
		document.getElementById("nominee_dob").innerHTML="<span class='alert'>Please enter Nominee Date of Birth.</span>";
			if(ckeckFocus!=1)
			{
				frm.nominee_dob.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("nominee_dob").innerHTML="";

if(frm.sponcer_id.value=='')
	{	
		document.getElementById("sponcer_id").innerHTML="<span class='alert'>Please enter Sponcer ID.</span>";
			if(ckeckFocus!=1)
			{
				frm.sponcer_id.focus();
				var ckeckFocus=1;
			}
	}
	else
	{
		ajax();
	
	if (doc){
	       doc.open("GET", "../ajax.php?section=check_id&id="+frm.sponcer_id.value, false);   
	       doc.send(null);
	   }	
	   if(doc.responseText=="")
	   {
	   		document.getElementById("sponcer_id").innerHTML="";
			if(frm.pos.value=='')
			{	
				document.getElementById("pos").innerHTML="<span class='alert'>Please select Position.</span>";
					if(ckeckFocus!=1)
					{
						frm.pos.focus();
						var ckeckFocus=1;
					}
			}
			else
			{
				ajax();
				if (doc){
					   doc.open("GET", "../ajax.php?section=check_pos&id="+frm.sponcer_id.value+"&pos="+frm.pos.value, false);   
					   doc.send(null);
				   }	
				   
				   if(doc.responseText=="")
	   					document.getElementById("pos").innerHTML="";
					else
					{
						document.getElementById("pos").innerHTML="<span class='alert'>"+doc.responseText+"</span>";
						if(ckeckFocus!=1)
						{
							frm.pos.focus();
							var ckeckFocus=1;
						}
					}
			}
	   }
		else
		{
			document.getElementById("sponcer_id").innerHTML="<span class='alert'>"+doc.responseText+"</span>";
			if(ckeckFocus!=1)
			{
				frm.sponcer_id.focus();
				var ckeckFocus=1;
			}
		}
	   
	}





	if(ckeckFocus==1)
		return false;
	else
		return true;
}

function isNum(val,id) {
   if (val.value.length != 0) {
   
      for (i = 0; i < val.value.length; i++) 
	  {
         var ch = val.value.charAt(i);
		 
         if ((ch >= "0" && ch <= "9") || ch==".")
		 {document.getElementById(id).innerHTML="";
		  continue;
		 }
          else 
		  	{
				document.getElementById(id).innerHTML="Please enter Numeric value";
				val.value = "";
		 		val.focus();
		  		//sel_id.select();
			false;
          	}
      	}
   	}
   return true;
} 

function city_select_change(used_state)
{ 
	ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=city_select_change&used_state="+used_state, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	document.getElementById("city_change").innerHTML=doc.responseText;
	document.getElementById("city_val").value="";
}


/////////////////////////////////////////////////////////
function city_selected(city_name)
{
	document.getElementById("city_val").value=city_name;
}

function state_select_change(used_country)
{ 
	ajax();
	
	if (doc)
	{ 
	   doc.open("GET","ajax.php?section=country_select_change&used_country="+used_country, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	document.getElementById("state_change").innerHTML=doc.responseText;
	document.getElementById("state_val").value="";
	
	
}
 
function state_selected(used_state)
{
	
	document.getElementById("state_val").value=used_state;
	ajax();
	
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=state_select_change&used_state="+used_state, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	document.getElementById("city_change").innerHTML=doc.responseText;
	document.getElementById("city_val").value="";
}
 function state_selected_reg(used_state)
{
	//alert(used_state);
	
	ajax();
	
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=state_select_change&used_state="+used_state, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	document.getElementById("city_change").innerHTML=doc.responseText;
	document.getElementById("city_val").value="";
}
(used_state)
{
	
	document.getElementById("state_val").value=used_state;
	ajax();
	
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=state_select_change&used_state="+used_state, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	document.getElementById("city_change").innerHTML=doc.responseText;
	document.getElementById("city_val").value="";
}



function Valid_add_classified(frm)
{
	
	var ckeckFocus=0;
	
	if(frm.subject.value=='')
	{	
		document.getElementById("subject").innerHTML="<span class='alert'>Please Enter Subject.</span>";
			if(ckeckFocus!=1)
			{
				frm.subject.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("subject").innerHTML="";
	
	if(frm.descript.value=='')
	{	
		document.getElementById("descript").innerHTML="<span class='alert'>Please Enter Article.</span>";
			if(ckeckFocus!=1)
			{
				frm.descript.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("descript").innerHTML="";
		
	if(frm.seo_key.value=='')
	{	
		document.getElementById("seo_key").innerHTML="<span class='alert'>Please Enter Search Keyword.</span>";
			if(ckeckFocus!=1)
			{
				frm.seo_key.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("seo_key").innerHTML="";
	
	var check=0;
	for(var i=0; i < frm.cat_id.length; i++)
	{
    	if(frm.cat_id[i].checked)
        {
		  var	check=1;
        }
    }
	if(check==0)
	{	
		document.getElementById("cat_id").innerHTML="<span class='alert'>Please Select Category of Article.</span>";
			if(ckeckFocus!=1)
			{
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("cat_id").innerHTML="";
		
	if(ckeckFocus==1)
		return false;
	else
		return true;
	
}

function Valid_add_poll(frm)
{
 
   var ckeckFocus=0;
 if(frm.name.value=='')
	{	
		document.getElementById("name").innerHTML="<span class='alert'>Please Enter Poll Questin.</span>";
			if(ckeckFocus!=1)
			{	frm.name.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("name").innerHTML="";
	
	if(frm.option1.value=='')
	{	
		document.getElementById("option1").innerHTML="<span class='alert'>Please Enter Option.</span>";
			if(ckeckFocus!=1)
			{	frm.option1.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("option1").innerHTML="";
		
	if(frm.option2.value=='')
	{	
		document.getElementById("option2").innerHTML="<span class='alert'>Please Enter Option.</span>";
			if(ckeckFocus!=1)
			{	frm.option2.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("option2").innerHTML="";
		
	if(frm.option3.value=='')
	{	
		document.getElementById("option3").innerHTML="<span class='alert'>Please Enter Option.</span>";
			if(ckeckFocus!=1)
			{	frm.option3.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("option3").innerHTML="";
		
	if(frm.option4.value=='')
	{	
		document.getElementById("option4").innerHTML="<span class='alert'>Please Enter Option.</span>";
			if(ckeckFocus!=1)
			{	frm.option4.focus();				var ckeckFocus=1;			}
	}
	else
		document.getElementById("option4").innerHTML="";	
 
   if(frm.userfile.value==''&& frm.photo.value=='')
	{	
		document.getElementById("templates").innerHTML="<span class='alert'>Please Upload Poll Image.</span>";
			if(ckeckFocus!=1)
			{
				frm.userfile.focus();
				var ckeckFocus=1;
			}
	}

	 else  if(frm.userfile.value!='')
	   {
		var file = frm.userfile.value;
		var mime = file.substr(file.lastIndexOf('.'));
		if (mime!= '.gif' && mime!= '.jpg' && mime!= '.JPG' && mime!= '.GIF' && mime!= '.jpeg' && mime!= '.JPEG')
		{
			document.getElementById("templates").innerHTML="<span class='alert'>Please Upload Proper Poll Image either gif or jpg.</span>";
			if(ckeckFocus!=1)
			{
				frm.userfile.focus();
				var ckeckFocus=1;
			}
		}
		else
			document.getElementById("templates").innerHTML="";
	   }
	   else
			document.getElementById("templates").innerHTML=""; 
 
 if(ckeckFocus==1)
		return false;
	else
		return true;
	
}


function Valid_add_seo(frm)
{
	var ckeckFocus=0;
	if(frm.name.value=='')
	{	
		document.getElementById("name").innerHTML="<span class='alert'>Please Enter Name.</span>";
			if(ckeckFocus!=1)
			{
				frm.name.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("name").innerHTML="";
		
	if(frm.title.value=='')
	{	
		document.getElementById("title").innerHTML="<span class='alert'>Please Enter Title.</span>";
			if(ckeckFocus!=1)
			{
				frm.title.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("title").innerHTML="";
		
		
	if(frm.keyword.value=='')
	{	
		document.getElementById("keyword").innerHTML="<span class='alert'>Please Enter Keyword.</span>";
			if(ckeckFocus!=1)
			{
				frm.keyword.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("keyword").innerHTML="";	
		
		
	if(frm.des.value=='')
	{	
		document.getElementById("des").innerHTML="<span class='alert'>Please Enter Description.</span>";
			if(ckeckFocus!=1)
			{
				frm.des.focus();
				var ckeckFocus=1;
			}
	}
	else
		document.getElementById("des").innerHTML="";	
		
	if(ckeckFocus==1)
		return false;
	else
		return true;	

}
function CheckAll_n_users(frm)
{
frm.n_name.checked = true ;
frm.n_address.checked = true ;
frm.n_mobile1.checked = true ;
frm.n_city.checked = true ;
frm.n_state.checked = true ;
frm.n_email.checked = true ;
}

function UnCheckAll_n_users(frm)
{
frm.n_name.checked = false ;
frm.n_address.checked = false ;
frm.n_mobile1.checked = false ;
frm.n_city.checked = false ;
frm.n_state.checked = false ;
frm.n_email.checked = false ;
}


function CheckAll_users(frm)
{
frm.c_name.checked = true ;
frm.address.checked = true ;
frm.c_mobile1.checked = true ;
frm.c_city.checked = true ;
frm.c_state.checked = true ;
frm.c_email.checked = true ;
}

function UnCheckAll_users(frm)
{
frm.c_name.checked = false ;
frm.address.checked = false ;
frm.c_mobile1.checked = false ;
frm.c_city.checked = false ;
frm.c_state.checked = false ;
frm.c_email.checked = false ;
}

function CheckAll_customer(frm)
{
frm.address.checked = true ;
frm.c_firm.checked = true ;
frm.c_ph_no.checked = true ;
frm.c_city.checked = true ;
frm.c_state.checked = true ;
frm.c_email.checked = true ;
frm.c_site_url.checked = true ;
}

function UnCheckAll_customer(frm)
{
frm.address.checked = false ;
frm.c_firm.checked = false ;
frm.c_ph_no.checked = false ;
frm.c_city.checked = false ;
frm.c_state.checked = false ;
frm.c_email.checked = false ;
frm.c_site_url.checked = false ;
}
function CheckAll_n_customer(frm)
{
frm.n_address.checked = true ;
frm.n_firm.checked = true ;
frm.n_ph_no.checked = true ;
frm.n_city.checked = true ;
frm.n_state.checked = true ;
frm.n_email.checked = true ;
frm.n_site_url.checked = true ;
}

function UnCheckAll_n_customer(frm)
{
frm.n_address.checked = false ;
frm.n_firm.checked = false ;
frm.n_ph_no.checked = false ;
frm.n_city.checked = false ;
frm.n_state.checked = false ;
frm.n_email.checked = false ;
frm.n_site_url.checked = false ;
}

function CheckAllMail(chk)
{ 
	if(document.myform.Check_ctr.checked==true)
		{
		 if (typeof document.myform.check_list.length === 'undefined')//condtion of only one checkbox
		 	{  
			 document.myform.check_list.checked = true ;
			}
		  else
		    {
			for (i = 0; i < chk.length; i++)
				chk[i].checked = true ;
		    }
		}
		
		else
		{
		 if (typeof document.myform.check_list.length === 'undefined')//condtion of only one checkbox
		 	{
			 document.myform.check_list.checked = false ;
			}
		  else
		    {
			for (i = 0; i < chk.length; i++)
				chk[i].checked = false ;
			}
	    }
}

function Valid_all_del(chk)
{
	
	if (typeof document.myform.check_list.length === 'undefined')//condtion of only one checkbox
	 { 
		 if(document.myform.check_list.checked==true)
		 {
	      ajax();
			if (doc){
			  doc.open("GET", "ajax.php?section=Valid_all_del&id="+document.myform.check_list.value, false);   
			  doc.send(null);
				   } 
		 }
	 }
		
	
	for (i = 0; i < chk.length; i++)
		{ alert("asdfasd");
		 if(chk[i].checked ==true)
		  {
		 //alert(chk[i].value);	
		 ajax();
			if (doc){
			  doc.open("GET", "ajax.php?section=Valid_all_del&id="+chk[i].value, false);   
			  doc.send(null);
				   }
		   }
		}
}

function Valid_export(frm)
{
 var checkFocus=0;

  if(frm.cate_list.value=='' && frm.state.value=='' && frm.city.value=='')
   {
	 document.getElementById("select_one").innerHTML="<span class='alert'>Please Select Atleast one.</span>";
	     if(checkFocus!=1)
		  { frm.cate_list.focus();		 checkFocus=1;			 }
   }
   else
      document.getElementById("select_one").innerHTML="";
 
 if(checkFocus==1)
     return false;
 else
     return true;
}

function Valid_export_users(frm)
{
 	
 var checkFocus=0;

  if(frm.state.value=='' && frm.city.value=='')
   {
	 document.getElementById("select_one").innerHTML="<span class='alert'>Please Select Atleast one.</span>";
	     if(checkFocus!=1)
		  { frm.state.focus();		 checkFocus=1;			 }
   }
   else
      document.getElementById("select_one").innerHTML="";
 
 if(checkFocus==1)
     return false;
 else
     return true;

}

function Valid_add_country(frm)
{
 	 var checkFocus=0;

  if(frm.country.value=='')
   {
	 document.getElementById("country").innerHTML="<span class='alert'>Please Enter Country.</span>";
	     if(checkFocus!=1)
		  { frm.country.focus();		 checkFocus=1;			 }
   }
   else
      document.getElementById("country").innerHTML="";
	  
   if(frm.city.value!='')
    {
	  if(frm.state.value=='')
	   {
		 document.getElementById("state").innerHTML="<span class='alert'>Please Enter State.</span>";
			 if(checkFocus!=1)
			  { frm.state.focus();		 checkFocus=1;			 }
	   }
	   else
		  document.getElementById("state").innerHTML="";
    }
 	 
	 
   if(frm.country.value!='' && frm.state.value!='' && frm.city.value!='')
   {	
      ajax();
		if (doc){
		  doc.open("GET", "ajax.php?section=check_place_exist&country="+frm.country.value+"&state="+frm.state.value+"&city="+frm.city.value, false);   
		  doc.send(null);
			   }
		//  alert(doc.responseText);//return false;
		 if(doc.responseText==1)
		  {	
		   		document.getElementById("err").innerHTML="<span class='alert'>Country,State and City Already Exists.</span>";
				frm.country.focus();
				var	 checkFocus=1;
		  }
		   else
		   	document.getElementById("err").innerHTML="";	
   }
   
   if(frm.country.value!='' && frm.state.value!='' && frm.city.value=='')
   {	 
      ajax();
		if (doc){
		  doc.open("GET", "ajax.php?section=check_place_exist&country="+frm.country.value+"&state="+frm.state.value, false);   
		  doc.send(null);
			   }
		//  alert(doc.responseText);//return false;
		 if(doc.responseText==1)
		  {	
		   		document.getElementById("err").innerHTML="<span class='alert'>Country,State Already Exists.</span>";
				frm.country.focus();
				var	 checkFocus=1;
		  }
		   else
		   	document.getElementById("err").innerHTML="";	
   
   }
   
   if(frm.country.value!='' && frm.state.value=='' && frm.city.value=='')
   {	  
      ajax();
		if (doc){
		  doc.open("GET", "ajax.php?section=check_place_exist&country="+frm.country.value, false);   
		  doc.send(null);
			   }
		//  alert(doc.responseText);//return false;
		 if(doc.responseText==1)
		  {	
		   		document.getElementById("err").innerHTML="<span class='alert'>Country Already Exists.</span>";
				frm.country.focus();
				var	 checkFocus=1;
		  }
		   else
		   	document.getElementById("err").innerHTML="";	
   }
   
 
 if(checkFocus==1)
     return false;
 else
     return true;
}


function Valid_add_buyer(frm)
{
	var checkFocus=0;
	var memb;
	
	if(frm.product.value=='')
	{	
		document.getElementById("product").innerHTML="<span class='alert'>Please Enter product Name.</span>";
			if(checkFocus!=1)
			{
				frm.product.focus();
				var checkFocus=1;
			}
	}
	else
		document.getElementById("product").innerHTML="";
	
	if(frm.descript.value=='')
	{	
		document.getElementById("descript").innerHTML="<span class='alert'>Please Enter Description.</span>";
			if(checkFocus!=1)
			{
				frm.descript.focus();
				var checkFocus=1;
			}
	}
	else
		document.getElementById("descript").innerHTML="";
		
	if(frm.email.value=='')
	{	
		document.getElementById("email").innerHTML="<span class='alert'>Please Enter email address.</span>";
			if(checkFocus!=1)
			{
				frm.email.focus();
				var checkFocus=1;
			}
	}
	else
	{
		var frmEmail1 =frm.email.value.toLowerCase();	
		var frmEmailformat = /^[^@\s]+@([-a-z0-9]+\.)+([a-z]{2}|com|net|edu|org|gov|mil|int|biz|pro|info|arpa|aero|coop|name|museum)$/;
		if (!frmEmailformat.test(frmEmail1)) 
		{
			document.getElementById("email").innerHTML="<span class='alert'>Please enter valid email address.</span>";
			if(checkFocus!=1)
				frm.email.focus();	
			var checkFocus=1;
		}
		else
		{
		   	document.getElementById("email").innerHTML="";
		}
	
	}
	
	if(frm.mobile.value=='')
	{	
		document.getElementById("mobile").innerHTML="<span class='alert'>Please Enter Mobile No.</span>";
			if(checkFocus!=1)
			{	frm.mobile.focus();				var checkFocus=1;			}
  
    }
	
   else 
    if(isNaN(frm.mobile.value))
	{
	document.getElementById("mobile").innerHTML="<span class='alert'>Please Enter Numeric value.</span>";
			if(checkFocus!=1)
			{	frm.mobile.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("mobile").innerHTML="";	
		
	if(frm.name.value=='')
	{	
		document.getElementById("name").innerHTML="<span class='alert'>Please Enter Name.</span>";
			if(checkFocus!=1)
			{	frm.name.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("name").innerHTML="";		
		
	if(frm.country.value=='')
	{	
		document.getElementById("country").innerHTML="<span class='alert'>Please Select Country.</span>";
			if(checkFocus!=1)
			{	frm.country.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("country").innerHTML="";	
	
	if(frm.state.value=='')
	{	
		document.getElementById("state").innerHTML="<span class='alert'>Please Select State.</span>";
			if(checkFocus!=1)
			{	frm.state.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("state").innerHTML="";
 

	if(frm.city.value=='')
	{	
		document.getElementById("city").innerHTML="<span class='alert'>Please Select City.</span>";
			if(checkFocus!=1)
			{	frm.city.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("city").innerHTML="";
		
	
	
	var check=0;
	for(var i=0; i < frm.cat_id.length; i++)
	{
    	if(frm.cat_id[i].checked)
        {
		  var	check=1;
        }
    }
	if(check==0)
	{	
		document.getElementById("cat_id").innerHTML="<span class='alert'>Please Select Category of Article.</span>";
			if(checkFocus!=1)
			{
				var checkFocus=1;
			}
	}
	else
		document.getElementById("cat_id").innerHTML="";
	
	  if(frm.photo_new.value!='')
	   {
		 
		var file = frm.photo_new.value;
		var mime = file.substr(file.lastIndexOf('.'));
		if (mime!= '.gif' && mime!= '.jpg' && mime!= '.JPG' && mime!= '.GIF' && mime!= '.jpeg' && mime!= '.JPEG')
		  {
			document.getElementById("photo_new").innerHTML="<span class='alert'>Please Upload Proper Image either gif or jpg.</span>";
			if(checkFocus!=1)
			  {
				frm.photo_new.focus();
				var checkFocus=1;
			  }
			 }
	    }
			else
				document.getElementById("photo_new").innerHTML="";		   
	  
	
	
	if(checkFocus==1)
		return false;
	else
		return true;

	
}





//for allow only alphanum in input type
function alphaNumSpaceOnly(evt)
{	
	var charCode = (evt.which) ? evt.which : window.event.keyCode;

	if (charCode <= 13)
	{
		return true;
	}
	else
	{
		var keyChar = String.fromCharCode(charCode);
		var re = /[\sa-zA-Z0-9_-]/
		return re.test(keyChar);			
	}	
}


function show_more_cities()
{
	alert('showing cities');	
}

function show_pro_adv(chk)
{
 if(document.getElementById("pro_adv").checked)
  { 
	 document.getElementById("yad").style.display="none";
	 document.getElementById("nad").style.display="block";
  }
  else
    {
	 document.getElementById("yad").style.display="block";
	 document.getElementById("nad").style.display="none";
	}
}

function Valid_add_package_type(frm)
{
  
 var checkFocus=0;

  if(frm.pn_name.value=='')
   {
	 document.getElementById("pn_name").innerHTML="<span class='alert'>Please Enter Package Name.</span>";
	     if(checkFocus!=1)
		  { frm.pn_name.focus();		 checkFocus=1;			 }
   }
   else
      document.getElementById("pn_name").innerHTML="";
	  
  if(frm.pn_price.value=='')
   {
	 document.getElementById("pn_price").innerHTML="<span class='alert'>Please Enter Price.</span>";
	     if(checkFocus!=1)
		  { frm.pn_price.focus();		 checkFocus=1;			 }
   }
   else
      document.getElementById("pn_price").innerHTML="";
	  
	 if(frm.pn_month.value=='')
   {
	 document.getElementById("pn_month").innerHTML="<span class='alert'>Please Enter Months.</span>";
	     if(checkFocus!=1)
		  { frm.pn_month.focus();		 checkFocus=1;			 }
   }
   else
      document.getElementById("pn_month").innerHTML="";  
	  
 
 if(checkFocus==1)
     return false;
 else
     return true;
}

function Valid_add_feature(frm)
{  
 var checkFocus=0;

  if(frm.pf_name.value=='')
   {
	 document.getElementById("pf_name").innerHTML="<span class='alert'>Please Enter Package  Feature.</span>";
	     if(checkFocus!=1)
		  { frm.pf_name.focus();		 checkFocus=1;			 }
   }
   else
      document.getElementById("pf_name").innerHTML="";
	  
 
 if(checkFocus==1)
     return false;
 else
     return true;
}

function Valid_add_package(frm)
{  
 var checkFocus=0;

  if(frm.package_list.value=='')
   {
	 document.getElementById("package_list").innerHTML="<span class='alert'>Please Select Package.</span>";
	     if(checkFocus!=1)
		  { frm.package_list.focus();		 checkFocus=1;			 }
   }
   else
      document.getElementById("package_list").innerHTML="";
	  
  if(frm.fpackage_list.value=='')
   {
	 document.getElementById("fpackage_list").innerHTML="<span class='alert'>Please Select Feature.</span>";
	     if(checkFocus!=1)
		  { frm.fpackage_list.focus();		 checkFocus=1;			 }
   }
   else
      document.getElementById("fpackage_list").innerHTML=""; 
	  
	
	
	if(frm.fpackage_list.value!='')
	{
	 if(frm.feat_price_drop.value=='')
	   {
		 document.getElementById("feat_price_drop").innerHTML="<span class='alert'>Please Select Feature Type.</span>";
			 if(checkFocus!=1)
			  { frm.feat_price_drop.focus();		 checkFocus=1;			 }
	   }
	   else
		  document.getElementById("feat_price_drop").innerHTML="";  
	 }
 
 if(checkFocus==1)
     return false;
 else
     return true;

}

function pk_feature_change(used_feat)
{
	ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=pk_feature_change&used_feat="+used_feat, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	document.getElementById("feat_change").innerHTML=doc.responseText;
	document.getElementById("feat_val").value="";

}
function pk_feature_value(val)
{
	document.getElementById("feat_val").value=val;
	
}
	
function Valid_add_feature_price(frm)
{
 var checkFocus=0;

  if(frm.fpackage_list.value=='')
   {
	 document.getElementById("fpackage_list").innerHTML="<span class='alert'>Please Select Feature.</span>";
	     if(checkFocus!=1)
		  { frm.fpackage_list.focus();		 checkFocus=1;			 }
   }
   else
      document.getElementById("fpackage_list").innerHTML="";
	/*  	  
	if(frm.pfp_type.value=='')
    {
	 document.getElementById("pfp_type").innerHTML="<span class='alert'>Please Enter Type.</span>";
	     if(checkFocus!=1)
		  { frm.pfp_type.focus();		 checkFocus=1;			 }
    }
   else
      document.getElementById("pfp_type").innerHTML="";  
	  
	if(frm.pfp_qty.value=='')
    {
	 document.getElementById("pfp_qty").innerHTML="<span class='alert'>Please Enter Quantity.</span>";
	     if(checkFocus!=1)
		  { frm.pfp_qty.focus();		 checkFocus=1;			 }
    }
   else
      document.getElementById("pfp_qty").innerHTML="";  
	  
	  
  if(frm.pfp_price.value=='')
    {
	 document.getElementById("pfp_price").innerHTML="<span class='alert'>Please Enter Price.</span>";
	     if(checkFocus!=1)
		  { frm.pfp_price.focus();		 checkFocus=1;			 }
    }
   else
      document.getElementById("pfp_price").innerHTML="";  */
	  
	  
 if(checkFocus==1)
     return false;
 else
     return true;

}
function show_subcategory_list(val)
 {//alert(val);
	 ajax();
	 
	if (doc)
	{ 	  //alert('3');
	   doc.open("GET", "ajax.php?section=subcategory_list&catevalue="+val, false);   
	   doc.send(null);
	}
	
	//alert(doc.responseText);
	if(doc.responseText!="")
	   {
		   var custdata = doc.responseText.split("###");
	//alert(custdata[2]);
			document.getElementById("subcategory_list1").innerHTML=custdata[0];
			document.getElementById("subcategory_list2").innerHTML=custdata[1];
			document.getElementById("subcategory_list3").innerHTML=custdata[2];
			
	   }
	 
 }	
function fill_hid_subcategory_1(val)
 {
		document.getElementById("id_hid_subcate1").value=val;
 }	
 
function fill_hid_subcategory_2(val)
 {
		document.getElementById("id_hid_subcate2").value=val;
 }	
function fill_hid_subcategory_3(val)
 {
		document.getElementById("id_hid_subcate3").value=val;
 }	  
 
 function get_total_adds_cat(cat_id)

  {
ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=get_total_adds_cat&cat_id="+cat_id, false);   
	   doc.send(null);
	}
  if(doc.responseText==5)
  {
  	alert("You don't add more than Five Ads. Try Again");
return false;
  }
  else
  return true;
	  
  }
 
 
 function Valid_service_package(frm)
{
 var checkFocus=0;

  if(frm.service_name.value=='')
   {
	 document.getElementById("alert_service_name").innerHTML="<span class='alert' style='color:#F00; text-align:center;'><b>Please Enter Service Name.</b></span>";
	     if(checkFocus!=1)
		  { frm.service_name.focus();		 checkFocus=1;			 }
   }
   else
      document.getElementById("alert_service_name").innerHTML="";

	  
	  
 if(checkFocus==1)
     return false;
 else
     return true;

}

function show_buyer_cate(chk)
{
 	if(document.getElementById("buyer").checked)
		document.getElementById("cate_list").style.display="block";
	else
		document.getElementById("cate_list").style.display="none";	
}



function getTrade_AssuranceOnOff(chk,id)
{

	ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=getTrade_AssuranceOnOff&chk="+chk+"&id="+id, false);   
	   doc.send(null);
	  
	}
	if(chk=='Y')
	
	document.getElementById("trade_assurance").value='N';	
	else
	 document.getElementById("trade_assurance").value='Y';
	//alert(doc.responseText);
	//window.location.reload();
}


function gettrust_sealOnOff(chk,id)
{
	
	ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=gettrust_sealOnOff&chk="+chk+"&id="+id, false);   
	   doc.send(null);
	}
	
	if(chk=='Y')
	
	document.getElementById("trust_seal").value='N';	
	else
	 document.getElementById("trust_seal").value='Y';
	
	
	//alert(doc.responseText);
	//window.location.reload();
}
function getassessed_supplierOnOff(chk,id)
{
	
	ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=getassessed_supplierOnOff&chk="+chk+"&id="+id, false);   
	   doc.send(null);
	}
	if(chk=='Y')
	
	document.getElementById("assessed_supplier").value='N';	
	else
	 document.getElementById("assessed_supplier").value='Y';
	
}

function getonsite_checked_aOnOff(chk,id)
{
	
	ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=getonsite_checked_aOnOff&chk="+chk+"&id="+id, false);   
	   doc.send(null);
	}
	if(chk=='Y')
	
	document.getElementById("onsite_checked_a").value='N';	
	else
	 document.getElementById("onsite_checked_a").value='Y';
	//window.location.reload();
}

function getonsite_checked_OnOff(chk,id)
{
	
	ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=getonsite_checked_OnOff&chk="+chk+"&id="+id, false);   
	   doc.send(null);
	}
	if(chk=='Y')
	
	document.getElementById("onsite_checked_b").value='N';	
	else
	 document.getElementById("onsite_checked_b").value='Y';
	//window.location.reload();
}

function getproduction_varifiedOnOff(chk,id)
{
	
	ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=getproduction_varifiedOnOff&chk="+chk+"&id="+id, false);   
	   doc.send(null);
	}
	if(chk=='Y')
	
	document.getElementById("production_varified").value='N';	
	else
	 document.getElementById("production_varified").value='Y';
	//window.location.reload();
}

function getstore_favoriteOnOff(chk,id)
{
	
	ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=getstore_favoriteOnOff&chk="+chk+"&id="+id, false);   
	   doc.send(null);
	}
	if(chk=='Y')
	
	document.getElementById("store_favorite").value='N';	
	else
	 document.getElementById("store_favorite").value='Y';
	//window.location.reload();
}
function getemail_verifiedOnOff(chk,id)
{
	
	ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=getemail_verifiedOnOff&chk="+chk+"&id="+id, false);   
	   doc.send(null);
	}
	if(chk=='Y')
	
	document.getElementById("email_verified").value='N';	
	else
	 document.getElementById("email_verified").value='Y';
	//window.location.reload();
}
function getmobile_number_verifiedOnOff(chk,id)
{
	
	ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=getmobile_number_verifiedOnOff&chk="+chk+"&id="+id, false);   
	   doc.send(null);
	}
	if(chk=='Y')
	
	document.getElementById("mobile_number_verified").value='N';	
	else
	 document.getElementById("mobile_number_verified").value='Y';
	//window.location.reload();
}
function getcategory_bestOnOff(chk,id)
{
	
	ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=getcategory_bestOnOff&chk="+chk+"&id="+id, false);   
	   doc.send(null);
	}
	if(chk=='Y')
	
	document.getElementById("category_best").value='N';	
	else
	 document.getElementById("category_best").value='Y';
	//window.location.reload();
}

function getsecureOnOff(chk,id)
{
	
	ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=getsecureOnOff&chk="+chk+"&id="+id, false);   
	   doc.send(null);
	}
	if(chk=='Y')
	
	document.getElementById("secure").value='N';	
	else
	 document.getElementById("secure").value='Y';
	//window.location.reload();
}

function getsecure_transactionOnOff(chk,id)
{
	
	ajax();
	if (doc)
	{
	   doc.open("GET", "ajax.php?section=getsecure_transactionOnOff&chk="+chk+"&id="+id, false);   
	   doc.send(null);
	}
	if(chk=='Y')
	
	document.getElementById("secure_transaction").value='N';	
	else
	 document.getElementById("secure_transaction").value='Y';
	//window.location.reload();
}

//function 
function valid_contactinfo(frm)
{
	 var checkFocus=0;
  if(frm.company_name.value=='')
   	{
	 document.getElementById("id_company_name").innerHTML="<span class='alert' style='color:#F00; text-align:center;'><b>Please Enter company Name.</b></span>";
	     if(checkFocus!=1)
		  {
			   frm.company_name.focus();
			   checkFocus=1;
		  }
   	}
   else
      document.getElementById("id_company_name").innerHTML="";
	  
  if(frm.company_address.value=='')
   	{
	 document.getElementById("id_company_address").innerHTML="<span class='alert' style='color:#F00; text-align:center;'><b>Please Enter company Address.</b></span>";
	     if(checkFocus!=1)
		  {
			   frm.company_address.focus();
			   checkFocus=1;
		  }
   	}
   else
      document.getElementById("id_company_address").innerHTML="";
	  
  if(frm.phone.value=='')
   	{
	 document.getElementById("id_phone").innerHTML="<span class='alert' style='color:#F00; text-align:center;'><b>Please Enter Phone Number.</b></span>";
	     if(checkFocus!=1)
		  {
			   frm.phone.focus();
			   checkFocus=1;
		  }
   	}
   else
      document.getElementById("id_phone").innerHTML="";
	
	if(frm.email.value=='')
   	{
	 document.getElementById("id_email").innerHTML="<span class='alert' style='color:#F00; text-align:center;'><b>Please Enter email.</b></span>";
	     if(checkFocus!=1)
		  {
			   frm.email.focus();
			   checkFocus=1;
		  }
   	}
   else
      document.getElementById("id_email").innerHTML="";  

	if(frm.email.value=='')
   	{
	 document.getElementById("id_email").innerHTML="<span class='alert' style='color:#F00; text-align:center;'><b>Please Enter email.</b></span>";
	     if(checkFocus!=1)
		  {
			   frm.email.focus();
			   checkFocus=1;
		  }
   	}
   else
      document.getElementById("id_email").innerHTML="";  
	  
	if(frm.site_url.value=='')
   	{
	 document.getElementById("id_site_url").innerHTML="<span class='alert' style='color:#F00; text-align:center;'><b>Please Enter site url</b></span>";
	     if(checkFocus!=1)
		  {
			   frm.site_url.focus();
			   checkFocus=1;
		  }
   	}
   else
      document.getElementById("id_site_url").innerHTML="";  
	  
	if(frm.support_email.value=='')
   		{
	 document.getElementById("id_support_email").innerHTML="<span class='alert' style='color:#F00; text-align:center;'><b>Please Enter support email</b></span>";
	     if(checkFocus!=1)
		  {
			   frm.support_email.focus();
			   checkFocus=1;
		  }
   		}
   else
      document.getElementById("id_support_email").innerHTML=""; 
	  
	  if(frm.webmaster_email.value=='')
   		{
	 document.getElementById("id_webmaster_email").innerHTML="<span class='alert' style='color:#F00; text-align:center;'><b>Please Enter support email</b></span>";
	     if(checkFocus!=1)
		  {
			   frm.webmaster_email.focus();
			   checkFocus=1;
		  }
   		}
   else
      document.getElementById("id_webmaster_email").innerHTML=""; 
	  
	  if(frm.page_row.value=='')
   		{
	 document.getElementById("id_page_row").innerHTML="<span class='alert' style='color:#F00; text-align:center;'><b>Please page row</b></span>";
	     if(checkFocus!=1)
		  {
			   frm.page_row.focus();
			   checkFocus=1;
		  }
   		}
   else
      document.getElementById("id_page_row").innerHTML="";     
  
	  
	 if(checkFocus==1)
		 return false;
	 else
		 return true;

}

function Valid_frm_payment(frm)
{
	 var checkFocus=0;
	 
	 if(frm.paypalemail.value=='')
   		{
	 document.getElementById("paypalemail_alert").innerHTML="<span class='alert' style='color:#F00; text-align:center;'><b>Please enter paypal email</b></span>";
	     if(checkFocus!=1)
		  {
			   frm.paypalemail.focus();
			   checkFocus=1;
		  }
   		}
   else
      document.getElementById("paypalemail_alert").innerHTML="";     
	 
	 
if(checkFocus==1)
		 return false;
	 else
		 return true;

}

function forgot_show()
{
	document.getElementById("forgotid").style.display="block";
}

function forgot_hide()
{
	document.getElementById("forgotid").style.display="none";
}
	 
function forgot_frm(frm)
{	
	 var checkFocus=0;
				
	 if(frm.email.value=='')
	 {	 
		  document.getElementById("alert_email").innerHTML="<span class='alert'>Please Enter Email address.</span>";
		  if(checkFocus!=1)
		  {
			frm.email.focus();
			var checkFocus=1;
		  }
	 }
	 else
	 {
		  var frmEmail1 =frm.email.value.toLowerCase();	
		  var frmEmailformat = /^[^@\s]+@([-a-z0-9]+\.)+([a-z]{2}|com|net|edu|org|gov|mil|int|biz|pro|info|arpa|aero|coop|name|museum)$/;
		if (!frmEmailformat.test(frmEmail1)) 
		{
			document.getElementById("alert_email").innerHTML="<span class='alert'>Please enter valid email address.</span>";
		  if(checkFocus!=1)
			frm.email.focus();	
			var checkFocus=1;
		}
		else
		{ 
			ajax();

			if (doc)
			{ 
			  doc.open("GET", "ajax.php?section=check_email_forgot&email="+frm.email.value, false);   
			  doc.send(null);
			}
			//alert(doc.responseText);//return false;
			
		    if(doc.responseText==1)
		    {	
				document.getElementById("alert_email").innerHTML="Email dosen't Exists";
				frm.email.focus();
				var	 checkFocus=1;
		    }
		    else
				document.getElementById("alert_email").innerHTML="your password hasbeen Reset.<br />Please check your Email Id.";
		}
		
	 }
				 
	if(checkFocus==1)
		return false;
	else
		return true;
}	


function Valid_add_classified_cate(frm)
{

	var ckeckFocus=0;
	if(frm.cat_name.value=='')
	{	
		document.getElementById("cat_name").innerHTML="<span style='color:#F00;'>Please Enter Category Name.</span>";
			if(ckeckFocus!=1)
			{
				frm.cat_name.focus();
				var ckeckFocus=1;
			}
	}
	else
	{
			ajax();
			if (doc){
			   doc.open("GET", "ajax.php?section=check_valid_classifi_cate&cat_name="+frm.cat_name.value+"&editid="+frm.edit_id.value, false);   
				doc.send(null);
			   }
				if(doc.responseText==1)
				{
					document.getElementById("cat_name").innerHTML="<span  style='color:#F00;'>This category Name Already Exist.</span>";
					if(ckeckFocus!=1)
					{
						frm.cat_name.focus();
						var ckeckFocus=1;
					}
				}
				else
				document.getElementById("cat_name").innerHTML="";
	}
		
	if(ckeckFocus==1)
		return false;
	else
		return true;	

}

function Valid_add_trade_lead(frm)
{

	var ckeckFocus=0;
	if(frm.cat_name.value=='')
	{	
		document.getElementById("cat_name").innerHTML="<span style='color:#F00;'>Please Enter Category Name.</span>";
			if(ckeckFocus!=1)
			{
				frm.cat_name.focus();
				var ckeckFocus=1;
			}
	}
	else
	{
			ajax();
			if (doc){
			   doc.open("GET", "ajax.php?section=check_valid_tradelead_cate&cat_name="+frm.cat_name.value+"&editid="+frm.edit_id.value, false);   
				doc.send(null);
			   }
			 //  alert(doc.responseText);
				if(doc.responseText==1)
				{
					document.getElementById("cat_name").innerHTML="<span  style='color:#F00;'>This category Name Already Exist.</span>";
					if(ckeckFocus!=1)
					{
						frm.cat_name.focus();
						var ckeckFocus=1;
					}
				}
				else
				document.getElementById("cat_name").innerHTML="";
	}
		
	if(ckeckFocus==1)
		return false;
	else
		return true;	

}
function Valid_add_location(frm)
{
	var ckeckFocus=0;
	if(frm.new_location.value=='')
	{	
		document.getElementById("location_info").innerHTML="<span class='alert'>Please Enter Location.</span>";
			if(ckeckFocus!=1)
			{
				frm.new_location.focus();
				var ckeckFocus=1;
			}
			
	}
	else
	{
		ajax();
	
			if (doc){
			   doc.open("GET", "ajax.php?section=check_valid_location&location_name="+frm.new_location.value+"&run_id="+frm.edit_id.value+"&state_name="+frm.state_name.value+"&country_name="+frm.cont_name.value, false);   
				doc.send(null);
			   }
				// alert(doc.responseText);
				if(doc.responseText==1)
				{
					document.getElementById("location_info").innerHTML="<span  style='color:#F00;'>This Location Name Already Exist.</span>";
					if(ckeckFocus!=1)
					{
						frm.new_location.focus();
						var ckeckFocus=1;
					}
				}
				else
			document.getElementById("location_info").innerHTML="";
	}
	
	
	
	if(frm.edit_id.value=='')
	{
			if(frm.flage.value=='')
		{	
			document.getElementById("flage_info").innerHTML="<span class='alert'>Please Enter Image.</span>";
				if(ckeckFocus!=1)
				{
					frm.flage.focus();
					var ckeckFocus=1;
				}
				else
				document.getElementById("flage_info").innerHTML="";
		}
	}
	
		
	if(ckeckFocus==1)
		return false;
	else
		return true;	

}
function Valid_add_location_edit(frm)
{
	var ckeckFocus=0;
	if(frm.location_name.value=='')
	{	
		document.getElementById("location_info").innerHTML="<span class='alert'>Please Enter Location.</span>";
			if(ckeckFocus!=1)
			{
				frm.location_name.focus();
				var ckeckFocus=1;
			}
			else
			document.getElementById("location_info").innerHTML="";
	}
	if(frm.edit_id.value=='2')
	{
			if(frm.city_latitude.value=='' || frm.city_longitude.value=='')
		{	
			document.getElementById("lang_long_info").innerHTML="<span class='alert'>Please Enter Latitude and Longitude.</span>";
				if(ckeckFocus!=1)
				{
					frm.city_latitude.focus();
					var ckeckFocus=1;
				}
				else
				document.getElementById("lang_long_info").innerHTML="";
		}
	}
	
		
	if(ckeckFocus==1)
		return false;
	else
		return true;	

}

function Valid_add_trade_show(frm)
{
	var checkFocus=0;
	
	if(frm.trade_img.value=='' && frm.photo.value=='')
	{	
		document.getElementById("image_info").innerHTML="<span class='alert' style='color:#F00' >Please Upload Banner Image.</span>";
			if(checkFocus!=1)
			{
				frm.trade_img.focus();
				var checkFocus=1;
			}
	}
	else if(frm.trade_img.value!='')
	{
		var file = frm.trade_img.value;
		var mime = file.substr(file.lastIndexOf('.'));
		if (mime!= '.gif' && mime!= '.jpg' && mime!= '.JPG' && mime!= '.GIF' && mime!= '.jpeg' && mime!= '.JPEG')
		{
			document.getElementById("image_info").innerHTML="<span class='alert' style='color:#F00'>Please Upload Proper Banner Image either gif or jpg.</span>";
			if(checkFocus!=1)
			{
				frm.trade_img.focus();
				var checkFocus=1;
			}
		}
		else
			document.getElementById("image_info").innerHTML="";
	 }
	 else
			document.getElementById("image_info").innerHTML="";
			

	
	  if(frm.title.value=='')
	{
	 	document.getElementById("title_info").innerHTML="<span class='alert' style='color:#F00'>Please Enter Title.</span>";
			if(checkFocus!=1)
			{
				frm.title.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("title_info").innerHTML="";   
	 
	  if(frm.venue.value=='')
	{
	 	document.getElementById("venue_info").innerHTML="<span class='alert' style='color:#F00'>Please Enter Venue.</span>";
			if(checkFocus!=1)
			{
				frm.venue.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("venue_info").innerHTML="";  
	
	  
	  if(frm.theme.value=='')
	{
	 	document.getElementById("theme_info").innerHTML="<span class='alert' style='color:#F00'>Please Enter Theme.</span>";
			if(checkFocus!=1)
			{
				frm.theme.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("theme_info").innerHTML="";   
	  
	   if(frm.url.value=='')
	{
	 	document.getElementById("url_info").innerHTML="<span class='alert' style='color:#F00'>Please Enter Url.</span>";
			if(checkFocus!=1)
			{
				frm.url.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("url_info").innerHTML="";   
	  

		
	if(checkFocus==1)
		return false;
	else
		return true;	

}

function Valid_news(frm)
{
	var checkFocus=0;
	
	if(frm.news_img.value=='' && frm.photo.value=='')
	{	
		document.getElementById("news_info").innerHTML="<span class='alert'>Please Upload Banner Image.</span>";
			if(checkFocus!=1)
			{
				frm.news_img.focus();
				var checkFocus=1;
			}
	}
	else if(frm.news_img.value!='')
	{
		var file = frm.news_img.value;
		var mime = file.substr(file.lastIndexOf('.'));
		if (mime!= '.gif' && mime!= '.jpg' && mime!= '.JPG' && mime!= '.GIF' && mime!= '.jpeg' && mime!= '.JPEG')
		{
			document.getElementById("news_info").innerHTML="<span class='alert'>Please Upload Proper Banner Image either gif or jpg.</span>";
			if(checkFocus!=1)
			{
				frm.news_img.focus();
				var checkFocus=1;
			}
		}
		else
			document.getElementById("news_info").innerHTML="";
	 }
	 else
			document.getElementById("news_info").innerHTML="";
			

	
	  if(frm.title.value=='')
	{
	 	document.getElementById("title_info").innerHTML="<span class='alert'>Please Enter Title.</span>";
			if(checkFocus!=1)
			{
				frm.title.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("title_info").innerHTML="";   
	 
	  
	  if(frm.description.value=='')
	{
	 	document.getElementById("description_info").innerHTML="<span class='alert'>Please Enter Description.</span>";
			if(checkFocus!=1)
			{
				frm.description.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("description_info").innerHTML="";   
	  
	  

		
	if(checkFocus==1)
		return false;
	else
		return true;	

}

function Valid_success_stories(frm)
{
	var checkFocus=0;
	
	if(frm.sucess_img.value=='' && frm.photo.value=='')
	{	
		document.getElementById("sucess_info").innerHTML="<span class='alert' style='color:#F00;'>Please Upload Banner Image.</span>";
			if(checkFocus!=1)
			{
				frm.sucess_img.focus();
				var checkFocus=1;
			}
	}
	else if(frm.sucess_img.value!='')
	{
		var file = frm.sucess_img.value;
		var mime = file.substr(file.lastIndexOf('.'));
		if (mime!= '.gif' && mime!= '.jpg' && mime!= '.JPG' && mime!= '.GIF' && mime!= '.jpeg' && mime!= '.JPEG')
		{
			document.getElementById("sucess_info").innerHTML="<span class='alert'>Please Upload Proper Banner Image either gif or jpg.</span>";
			if(checkFocus!=1)
			{
				frm.sucess_img.focus();
				var checkFocus=1;
			}
		}
		else
			document.getElementById("sucess_info").innerHTML="";
	 }
	 else
			document.getElementById("sucess_info").innerHTML="";
			

	
	  if(frm.title.value=='')
	{
	 	document.getElementById("title_info").innerHTML="<span class='alert' style='color:#F00;'>Please Enter Title.</span>";
			if(checkFocus!=1)
			{
				frm.title.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("title_info").innerHTML="";   
	 
	  
	  if(frm.description.value=='')
	{
	 	document.getElementById("description_info").innerHTML="<span class='alert' style='color:#F00;'>Please Enter Description.</span>";
			if(checkFocus!=1)
			{
				frm.description.focus();
				var checkFocus=1;
			}
	}
	else
	  document.getElementById("description_info").innerHTML="";   
	  
	  

		
	if(checkFocus==1)
		return false;
	else
		return true;	

}

function change_wholesale(val,pro_id,filde)
{
	
	ajax();
		if (doc)
		{ 	  
		   doc.open("GET", "ajax.php?section=getProductChange&pro_id="+pro_id+"&filde="+filde+"&val="+val, false);   
		   doc.send(null);
		}
	  
	   if(val=='Y')
	
	document.getElementById("proId").value='N';	
	else
	 document.getElementById("proId").value='Y';
}

function userPrivilageTable(customer_id)
{
	var x=document.getElementById("select_customer").value;
	
	if(x!='')
	{
	ajax();
			if (doc){
				   doc.open("GET", "ajax.php?section=userPrivilageTable&customer_id="+customer_id, false);   
				   doc.send(null);
			   }
			   document.getElementById('privilage_table').innerHTML=doc.responseText;
	}
	else
	{
	window.location.assign("admin.php?c=user&f=set_user_privilege")	
		}
	
}
//=================priviliage on off==========================//
function setUserPrivilageOnOff(select_id)
{
	var customer_id=document.getElementById('select_customer').value;
	if(customer_id=='')
	{
		document.getElementById('alert_customer').innerHTML="Please Select Customer";
	}
	else
	{
		document.getElementById('alert_customer').innerHTML=""
		var onoff_true_false=document.getElementById('onoff_check_box_'+select_id).checked;
		var privilage_id=select_id;
		ajax();
			if (doc){
				   doc.open("GET", "ajax.php?section=setCustomerPrivilage&privilage_id="+privilage_id+"&customer_id="+customer_id+"&onoff_true_false="+onoff_true_false, false);   
				   doc.send(null);
			   }
			//  alert(doc.responseText);
	}
}

