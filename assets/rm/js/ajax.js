var xmlHttp
var logoval=0;
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


function showgalleryimg(id,imgbNum)
{
	//alert("imgb_"+id);

	for(var i=1; i <= imgbNum; i++)
	{ 
		 document.getElementById("imgb_"+i).style.display="none";
	}
	document.getElementById("imgb_"+id).style.display="block";

}


function ajax() {
	// Make a new XMLHttp object
	
	if (typeof window.ActiveXObject != 'undefined' )
	{ 
		doc =GetXmlHttpObject();
	}
	else
		doc = new XMLHttpRequest();
		


		
}


function GetXmlHttpObject()
{
	var xmlHttp=null;
	try
	{
		
	   // If IE7, Firefox, Opera 8.0+, Safari, and so on: Use native object.
		xmlHttp=new XMLHttpRequest();
	}
	catch (e)
	{
		// Internet Explorer
		try
		{
			// ...otherwise, use the ActiveX control for IE5.x and IE6.
    		 xmlHttp = new ActiveXObject('MSXML2.XMLHTTP.3.0');
			//xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	//alert(xmlHttp);
	return xmlHttp;
}
function stateChanged() 
{
	if (xmlHttp.readyState==4)
	{
		document.getElementById("txtHint").innerHTML=xmlHttp.responseText;
	}
}
function showcats(id)
{
	//alert(id);
	ajax();
						//alert(document.getElementById("chk_"+id).checked);
	if(document.getElementById("chk_"+id).checked==true)
	{
	  document.getElementById("cat_"+id).style.display="block";
	   document.getElementById("cat_"+id).style.marginleft="10px"
	    document.getElementById("count_cats").value= parseInt(document.getElementById("count_cats").value)+1;
	}
	else
	{
		if (doc)
	   {
		   doc.open("GET", site_url+"/ajax.php?section=show_cats&id="+id, false);   
		   doc.send(null);
	   }	
//	   alert(doc.responseText);
	   if(doc.responseText!="")
	   {
		   var ids = doc.responseText.split(",");
			for(var idnum in ids)
			{ 
				
				if(document.getElementById("chk_"+parseInt(ids[idnum])).checked)
					document.getElementById("count_cats").value=parseInt(document.getElementById("count_cats").value)-1;
				 document.getElementById("chk_"+parseInt(ids[idnum])).checked=false;
				 document.getElementById("cat_"+parseInt(ids[idnum])).style.display="none";
				
			}

	   }	
 	   document.getElementById("count_cats").value=parseInt(document.getElementById("count_cats").value)-1;
		document.getElementById("cat_"+id).style.display="none";
	}
//	alert(document.getElementById("count_cats").value);
}

//Search for Changes in category selection in company profile edit and product add form\\
function showSubCat(str,id)
{
	//alert(id);
	ajax();
    if (str==" ")
	{
        document.getElementById("txtHint").innerHTML = "";
        return;
    } 
		doc.open("GET",site_url+"/ajax.php?section=queryData&test="+str+"&idData="+id,false);
        doc.send(null);
		 
		var arraylist=doc.responseText.split('**');
		//alert(arraylist[1]);
		document.getElementById("txtHint").innerHTML=doc.responseText;
	   	//alert(doc.responseText);
    
} 
//------------------end------------------\\

function show_pro_cats(id,cust_id)
{
	//alert(id);
	ajax();
		//alert(document.getElementById("chk_"+id).checked);
		 
	if(document.getElementById("chk_"+id).checked==true)
	{//alert("sd234234fsdf");
	  document.getElementById("cat_"+id).style.display="block";
	  //alert("000f");
	  document.getElementById("count_cats").value= parseInt(document.getElementById("count_cats").value)+1;
		if (doc)
	   {//alert("sdfsdf");
		   doc.open("GET", site_url+"/ajax.php?section=show_pro_cats&id="+id+"&cust_id="+cust_id, false);   
		   doc.send(null);
	   }
	   //alert(doc.responseText);
	}
	
//	alert(document.getElementById("count_cats").value);
}

function Valid_temp_login(frm)
{
	/* var checkFocus=0;

   if(frm.password.value=='')
	{
		document.getElementById("password").innerHTML="<span class='alert'>Please Enter Password.</span>";	
		if(checkFocus!=1)
		{	frm.password.focus();	varcheckFocus=1;	}
	}
	else
		document.getElementById("password").innerHTML="";	
		
	if(frm.username.value=='')
	{
		document.getElementById("username").innerHTML="<span class='alert'>Please Enter User Name.</span>";	
		if(checkFocus!=1)
		{	frm.username.focus();	varcheckFocus=1;	}
	}
	else
		document.getElementById("username").innerHTML="";		

   if(checkFocus==1)
		return false;
	else
		return true;*/

}

function Valid_registration(frm)
{

//		onLoadWatingPoupupOpen();

	var checkFocus=0;
	if(document.getElementById("email1").value=='')
	{	
		document.getElementById("email").innerHTML="<span class='err-alert'>Please Enter Email address.</span>";
			if(checkFocus!=1)
			{
				document.getElementById("email1").focus();
				var checkFocus=1;
			}
	}
	else
	{
		var frmEmail1 =document.getElementById("email1").value.toLowerCase();	
		var frmEmailformat = /^[^@\s]+@([-a-z0-9]+\.)+([a-z]{2}|com|net|edu|org|gov|mil|int|biz|pro|info|arpa|aero|coop|name|museum)$/;
		if (!frmEmailformat.test(frmEmail1)) 
		{
			document.getElementById("email").innerHTML="<span class='err-alert'>Please Enter valid email address.</span>";
			if(checkFocus!=1)
				document.getElementById("email1").focus();	
			var checkFocus=1;
		}
// 		else
// 		{
// 			ajax();
// 			if (doc){
// 			   doc.open("GET", site_url+"/ajax.php?section=check_email_reg&email="+document.getElementById("email1").value, false);   
// 				doc.send(null);
// 			   }
// //		  alert(doc.responseText);//return false;
// 		   if(doc.responseText==1)
// 		   {	
// 		   		document.getElementById("email").innerHTML="Email Already Exists";
// 				document.getElementById("email1").focus();
// 				var	 checkFocus=1;
// 		   }
// 		   else
// 		   	document.getElementById("email").innerHTML="<br>";
// 		}
	
	}
	
	if(document.getElementById("email21").value=='')
	{
	  	document.getElementById("email2").innerHTML="<span class='err-alert'>Please Enter Confirm Email.</span>";
	  		if(checkFocus!=1)
	  		{document.getElementById("email21").focus(); checkFocus=1;	}
	}
	 else
	    if(document.getElementById("email21").value!=document.getElementById("email1").value)
		{
	    	document.getElementById("email2").innerHTML="<span class='err-alert'>Please Enter Same Email.</span>";
			if(checkFocus!=1)
			{document.getElementById("email21").focus(); checkFocus=1;	}
		}
		else
		   document.getElementById("email2").innerHTML="<br>";
		   
		   
		   
		   if(document.getElementById("uname").value=='')
	{
		document.getElementById("nameid").innerHTML="<span class='err-alert'>Please Enter User Name.</span>";	
		if(checkFocus!=1)
		{	document.getElementById("uname").focus();	varcheckFocus=1;	}
	}
	else
		document.getElementById("nameid").innerHTML="<br>";	

	if(document.getElementById("mobile").value=='')
	{
		document.getElementById("mobid").innerHTML="<span class='err-alert'>Please Enter Mobile No.</span>";	
		if(checkFocus!=1)
		{	document.getElementById("mobile").focus();	checkFocus=1;	}
	}
	else 
	{
		 document.getElementById("mobid").innerHTML="<br>";	
		 var y = document.getElementById("mobile").value;
		  if(isNaN(y)||y.indexOf(" ")!=-1||y.indexOf("+")!=-1)
           {
			   document.getElementById("mobid").innerHTML="<span class='err-alert'>Please Enter Numeric Value.</span>";	
				if(checkFocus!=1)
				{	document.getElementById("mobile").focus();	checkFocus=1;	}

           }
  
	}
	
	
	if(document.getElementById("pass").value=='')
	{	
		document.getElementById("passid").innerHTML="<span class='err-alert'>Please Enter Password.</span>";
			if(checkFocus!=1)
			{	document.getElementById("pass").focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("passid").innerHTML="<br>";	
		
	if(document.getElementById("repass").value=='')
	{	
		document.getElementById("repassid").innerHTML="<span class='err-alert'>Please Enter Re-Type Password.</span>";
			if(checkFocus!=1)
			{	document.getElementById("repass").focus();				var checkFocus=1;			}
	}
	else
	{
		if(document.getElementById("repass").value!=document.getElementById("pass").value)
		{	
			document.getElementById("repassid").innerHTML="<span class='err-alert'>Please Enter Same Password.</span>";
				if(checkFocus!=1)
				{	document.getElementById("repass").focus();				var checkFocus=1;			}
		}
		else
		document.getElementById("repassid").innerHTML="<br>";
	}
	if(document.getElementById("country").value=='')
	{	
		document.getElementById("country").innerHTML='Please Select Country';
			if(checkFocus!=1)
			{	document.getElementById("country").focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("country").innerHTML="<br>";
		
	if(document.getElementById("cpcode").value=='')
	{	
	
		document.getElementById("alert_security").innerHTML="<span class='err-alert' > <strong>Error ! </strong> Please Enter Captcha Code </span>";
			if(checkFocus!=1)
			{	
				document.getElementById("cpcode").focus();				
				var checkFocus=1;
			}
	}
	// else
	// {
		
	// 	ajax();
	// 		if (doc){
	// 		   doc.open("GET", site_url+"/ajax.php?section=get_capcha&security_code="+document.getElementById("cpcode").value, false);
	// 			doc.send(null);
	// 		   }
	// 		//  alert(doc.responseText);
	
	// 	   if(doc.responseText==0)
	// 	   {	
		   		
	// 	   		document.getElementById("alert_security").innerHTML="<span class='alert'>Please enter correct Capcha Code.</span>";	
	// 			document.getElementById("cpcode").focus();
	// 			var	 checkFocus=1;
	// 	   }
	// 	   else
	// 	   	document.getElementById("alert_security").innerHTML="<br>";	
	// /**/
	// }
	
	
	
	//===============================================\\
	 if(document.getElementById("company_name_p").value=="" &&  document.getElementById("company_profile").checked == true){	
	
		document.getElementById("cmpid").innerHTML="<span class='alert'>Please Enter Company Name.</span>";
			if(checkFocus!=1)
			{	document.getElementById("company_name_p").focus();				var checkFocus=1;			}
			
	}
	else
		document.getElementById("cmpid").innerHTML="<br>";
		
		
		if(document.getElementById("state").value=='')
		{
			document.getElementById("state_error").innerHTML="<span class='alert'>Please Select State</span>";
			if(checkFocus!=1)
			{	document.getElementById("state").focus();				var checkFocus=1;			}
		}	
		else 	document.getElementById("state_error").innerHTML="";
	
	if(document.getElementById("city").value=='')
		{
			document.getElementById("city_error").innerHTML="<span class='alert'>Please Select City</span>";
			if(checkFocus!=1)
			{	document.getElementById("city").focus();				var checkFocus=1;			}
		}	
		else 	document.getElementById("city_error").innerHTML="";
		
		
		
		
		
		
		
				
		//===============================================//
	
	
	
	/*if(frm.type.value=='C' )
	{
	if(frm.buyer.checked==false && frm.seller.checked==false && frm.ser_provider.checked==false)
	 {
		document.getElementById("buss_type").innerHTML="<span class='alert'>Please Select Atleast one.</span>";
		  if(checkFocus!=1)
		  {  var checkFocus=1;  }
	 }
	 else
	 	 document.getElementById("buss_type").innerHTML="<br>";
		 
	if(frm.buyer.checked==true)
	{ 
		if(frm.count_cats.value==0)
		{	
			document.getElementById("cat_counts").innerHTML="<span class='alert'>Please Select One of the Category.</span>";
			if(checkFocus!=1)
			{	var checkFocus=1;			}
		}
		else if(frm.count_cats.value >frm.category_mimit.value)
		{	
			document.getElementById("cat_counts").innerHTML="<span class='alert'>Sorry, Can't Select more then 10 Categories.</span>";
			if(checkFocus!=1)
			{	var checkFocus=1;			}
		}
		else
			document.getElementById("cat_counts").innerHTML="<br>";	
	}
	}*/
	//alert(checkFocus);
	if(checkFocus==1)
	{
		onLoadWatingPoupupClose();
		return false;
	}
	else
	
	{
		//document.getElementById("submit").style.display="none";
		
		return true;		
		
		}
				
}

function Valid_registration1(frm)
{
	//alert('dfgdsg');
		onLoadWatingPoupupOpen();
 //alert(document.getElementById("email1").value);
	var checkFocus=0;
	if(document.getElementById("email1").value=='')
	{	
		document.getElementById("email").innerHTML="<span class='alert'>Please Enter Email address.</span>";
			if(checkFocus!=1)
			{
				document.getElementById("email1").focus();
				var checkFocus=1;
			}
	}
	else
	{
		var frmEmail1 =document.getElementById("email1").value.toLowerCase();	
		var frmEmailformat = /^[^@\s]+@([-a-z0-9]+\.)+([a-z]{2}|com|net|edu|org|gov|mil|int|biz|pro|info|arpa|aero|coop|name|museum)$/;
		if (!frmEmailformat.test(frmEmail1)) 
		{
			document.getElementById("email").innerHTML="<span class='alert'>Please Enter valid email address.</span>";
			if(checkFocus!=1)
				document.getElementById("email1").focus();	
			var checkFocus=1;
		}
		else
		{
			ajax();
			if (doc){
			   doc.open("GET", site_url+"/ajax.php?section=check_email_reg&email="+document.getElementById("email1").value, false);   
				doc.send(null);
			   }
//		  alert(doc.responseText);//return false;
		   if(doc.responseText==1)
		   {	
		   		document.getElementById("email").innerHTML="Email Already Exists";
				document.getElementById("email1").focus();
				var	 checkFocus=1;
		   }
		   else
		   	document.getElementById("email").innerHTML="<br>";
		}
	
	}
	
	if(document.getElementById("email21").value=='')
	{
	  	document.getElementById("email2").innerHTML="<span class='alert'>Please Enter Confirm Email.</span>";
	  		if(checkFocus!=1)
	  		{document.getElementById("email21").focus(); checkFocus=1;	}
	}
	 else
	    if(document.getElementById("email21").value!=document.getElementById("email1").value)
		{
	    	document.getElementById("email2").innerHTML="<span class='alert'>Please Enter Same Email.</span>";
			if(checkFocus!=1)
			{document.getElementById("email21").focus(); checkFocus=1;	}
		}
		else
		   document.getElementById("email2").innerHTML="<br>";
		   
		   
		   
		   if(document.getElementById("uname").value=='')
	{
		document.getElementById("nameid").innerHTML="<span class='alert'>Please Enter User Name.</span>";	
		if(checkFocus!=1)
		{	document.getElementById("uname").focus();	varcheckFocus=1;	}
	}
	else
		document.getElementById("nameid").innerHTML="<br>";	

	if(document.getElementById("mobile").value=='')
	{
		document.getElementById("mobid").innerHTML="<span class='alert'>Please Enter Mobile No.</span>";	
		if(checkFocus!=1)
		{	document.getElementById("mobile").focus();	checkFocus=1;	}
	}
	else 
	{
		 document.getElementById("mobid").innerHTML="<br>";	
		 var y = document.getElementById("mobile").value;
		  if(isNaN(y)||y.indexOf(" ")!=-1||y.indexOf("+")!=-1)
           {
			   document.getElementById("mobid").innerHTML="<span class='alert'>Please Enter Numeric Value.</span>";	
				if(checkFocus!=1)
				{	document.getElementById("mobile").focus();	checkFocus=1;	}

           }
  
	}
	
	
	if(document.getElementById("pass").value=='')
	{	
		document.getElementById("passid").innerHTML="<span class='alert'>Please Enter Password.</span>";
			if(checkFocus!=1)
			{	document.getElementById("pass").focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("passid").innerHTML="<br>";	
		
	if(document.getElementById("repass").value=='')
	{	
		document.getElementById("repassid").innerHTML="<span class='alert'>Please Enter Re-Type Password.</span>";
			if(checkFocus!=1)
			{	document.getElementById("repass").focus();				var checkFocus=1;			}
	}
	else
	{
		if(document.getElementById("repass").value!=document.getElementById("pass").value)
		{	
			document.getElementById("repassid").innerHTML="<span class='alert'>Please Enter Same Password.</span>";
				if(checkFocus!=1)
				{	document.getElementById("repass").focus();				var checkFocus=1;			}
		}
		else
		document.getElementById("repassid").innerHTML="<br>";
	}
	if(document.getElementById("country1").value=='')
	{	
		document.getElementById("country").innerHTML='Please Select Country';
			if(checkFocus!=1)
			{	document.getElementById("country1").focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("country").innerHTML="<br>";
		
		if(document.getElementById("cpcode").value=='')
	{	
	
		document.getElementById("alert_security").innerHTML="<div class='red' ><div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Error ! </strong> Please Enter Capthca Code </div></div>";
			if(checkFocus!=1)
			{	
				document.getElementById("cpcode").focus();				
				var checkFocus=1;
			}
	}
	else
	{
		//document.getElementById("alert_security").innerHTML="";
		//alert(frm.security_code.value);
		ajax();
			if (doc){
			   doc.open("GET", site_url+"/ajax.php?section=get_capcha&security_code="+document.getElementById("cpcode").value, false);
				doc.send(null);
			   }
			  
	//  alert(doc.responseText);//return false;
	 // alert(doc.responseText.trim());
		   if(doc.responseText==1)
		   {	
		   		//alert("xxxxxxxxxxxxxxxx");
		   		document.getElementById("alert_security").innerHTML="<span class='alert'>Please enter correct Capcha Code.</span>";	
				document.getElementById("cpcode").focus();
				var	 checkFocus=1;
		   }
		   else
		   	document.getElementById("alert_security").innerHTML="<br>";	
	/**/
	}
	/*if(frm.type.value=='C' )
	{
	if(frm.buyer.checked==false && frm.seller.checked==false && frm.ser_provider.checked==false)
	 {
		document.getElementById("buss_type").innerHTML="<span class='alert'>Please Select Atleast one.</span>";
		  if(checkFocus!=1)
		  {  var checkFocus=1;  }
	 }
	 else
	 	 document.getElementById("buss_type").innerHTML="<br>";
		 
	if(frm.buyer.checked==true)
	{ 
		if(frm.count_cats.value==0)
		{	
			document.getElementById("cat_counts").innerHTML="<span class='alert'>Please Select One of the Category.</span>";
			if(checkFocus!=1)
			{	var checkFocus=1;			}
		}
		else if(frm.count_cats.value >frm.category_mimit.value)
		{	
			document.getElementById("cat_counts").innerHTML="<span class='alert'>Sorry, Can't Select more then 10 Categories.</span>";
			if(checkFocus!=1)
			{	var checkFocus=1;			}
		}
		else
			document.getElementById("cat_counts").innerHTML="<br>";	
	}
	}*/
	alert(checkFocus);
	if(checkFocus==1)
	{
		onLoadWatingPoupupClose();
		return false;
	}
	else
	
	{
		//document.getElementById("submit").style.display="none";
		
		return true;		
		
		}
				
}



/*function get_capcha(security_code)
 {
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=get_capcha&security_code="+security_code, false);   
	   doc.send(null);
	}
	    var arraylist=doc.responseText;
		alert(arraylist);
		if(arraylist==0)
		{
		document.getElementById("alert_security").innerHTML="<span class='alert'>Please enter correct Capcha Code.</span>";	
		
		}
    
	
 }*/
	 
	 
function Valid_manage_client(frm)
{
	var checkFocus=0;
	//alert('count='+frm.count_cats.value);
	if(frm.frm_name.value=='')
	{	
			document.getElementById("frm_name").innerHTML="<span class='alert'>Please Enter Firm Name.</span>";
			
			if(checkFocus!=1)
			{	frm.frm_name.focus();				checkFocus=1;			}
			
	}
	else
		document.getElementById("frm_name").innerHTML="";
	
	if(frm.state.value=='')
	{	
		document.getElementById("state").innerHTML="<span class='alert'>Please Enter State.</span>";
			if(checkFocus!=1)
			{	frm.state.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("state").innerHTML="";
	
	if(frm.city.value=='')
	{	
		document.getElementById("city").innerHTML="<span class='alert'>Please Enter City.</span>";
			if(checkFocus!=1)
			{	frm.city.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("city").innerHTML="";


	if(frm.address.value=='')
	{	
		document.getElementById("address").innerHTML="<span class='alert'>Please Enter Address.</span>";
			if(checkFocus!=1)
			{	frm.address.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("address").innerHTML="";
		
	if(frm.ph_no.value=='')
	{	
		document.getElementById("ph_no").innerHTML="<span class='alert'>Please Enter Phone No.</span>";
			if(checkFocus!=1)
			{	frm.ph_no.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("ph_no").innerHTML="";	
	
	if(frm.site_url.value=='')
	{	
		document.getElementById("site_url").innerHTML="<span class='alert'>Please Enter Website Address</span>";
			if(checkFocus!=1)
			{	frm.site_url.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("site_url").innerHTML="";	
		
	if(frm.detail.value=='')
	{	
		document.getElementById("detail").innerHTML="<span class='alert'>Please Enter Description.</span>";
		if(checkFocus!=1)
		{	frm.detail.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("detail").innerHTML="";	
		
		
	if(checkFocus==1)
		return false;
	else
		return true;		
}
function Valid_add_category()
{


	var checkFocus=0;
	if(frm.count_cats.value==0)
	{	
		document.getElementById("cat_counts").innerHTML="<span class='alert'>Please Select One of the Category.</span>";
		if(checkFocus!=1)
		{	var checkFocus=1;			}
	}
	else if(frm.count_cats.value > 5)
	{	
		document.getElementById("cat_counts").innerHTML="<span class='alert'>Sorry, Can't Select more then 5 Categories.</span>";
		if(checkFocus!=1)
		{	var checkFocus=1;			}
	}
	else
		document.getElementById("cat_counts").innerHTML="";	
	

	if(checkFocus==1)
		return false;
	else
		return true;	


}


function Valid_register_client(frm)
{
	var checkFocus=0;
	//alert('count='+frm.count_cats.value);
	
	
	
	if(frm.frm_name.value=='')
	{	
			document.getElementById("frm_name").innerHTML="<span class='alert'>Please Enter Firm Name.</span>";
			
			if(checkFocus!=1)
			{	frm.frm_name.focus();				checkFocus=1;			}
			
	}
	else
		document.getElementById("frm_name").innerHTML="";
	
		var data = new Array();
		$(".fstChoiceItem").each(function(index,value){
			data.push($(value).attr('data-value'));
		});
		$("#catgoryid").val(data);
		// console.log($("#catgoryid").val()); 	
		
		if(document.getElementById("catgoryid").value=='')
	{	
			document.getElementById("catgoryid2").innerHTML="<span class='alert'>Please Select  Atleast One Category.</span>";
			
			if(checkFocus!=1)
			{document.getElementById("catgoryid").focus();				checkFocus=1;			}
			
	}
		

		
		if(frm.detail.value=='')
		{	
			document.getElementById("detail").innerHTML="<span class='alert'>Please Enter Description.</span>";
			if(checkFocus!=1)
			{	frm.detail.focus();				var checkFocus=1;			}
		}
		else
			document.getElementById("detail").innerHTML="";	
			
			
			
			
			if(frm.meta_desc.value=='')
		{	
			document.getElementById("meta_desc").innerHTML="<span class='alert'>Please Enter Meta Description.</span>";
			if(checkFocus!=1)
			{	frm.meta_desc.focus();				var checkFocus=1;			}
		}
		else
			document.getElementById("meta_desc").innerHTML="";	
			
			
			
			
			if(frm.meta_keywords.value=='')
		{	
			document.getElementById("meta_keywords").innerHTML="<span class='alert'>Please Enter Meta Keywords.</span>";
			if(checkFocus!=1)
			{	frm.meta_keywords.focus();				var checkFocus=1;			}
		}
		else
			document.getElementById("meta_keywords").innerHTML="";	
			
		
	
	
	if(checkFocus==1)
		return false;
	else
	{	
	if(user_status=='Y')
		alert("Your Company Profile is under review and will be publish within 24 to 48 hours.");
	else
	     alert("Please Active Your Account.");
		return true;	
	}

}

function Valid_update_classified(frm)
{	
	var checkFocus=0;
	if(frm.days.value=='')
	{	
		document.getElementById("days").innerHTML="<span class='alert'>Please Enter Number of Days.</span>";
			if(checkFocus!=1)
			{
				frm.days.focus();
				var checkFocus=1;
			}
	}
	else 
	{
		for (i = 0; i < frm.days.value.length; i++) 
		{
		  var ch = frm.days.value.charAt(i);
			 if ((ch >= "0" && ch <= "9") || ch==".")
			 {
				 document.getElementById('days').innerHTML="";
			     continue;
			 }
			 else 
			 {
				document.getElementById('days').innerHTML="Please Enter Numeric value";
				frm.days.value = "";
				frm.days.focus();
				var checkFocus=1;
			}
		}
	}

if(checkFocus==1)
		return false;
	else
		return true;	
}
function Valid_add_classified(frm)
{

	ajax();
	/*if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=count_classified&cl_id="+cl_id, false);   
	   doc.send(null);
	    var arraylist=doc.responseText;
		var check_insert=0;
		
		if(arraylist>=tot_cla)
		 {
			 document.getElementById("total_product").innerHTML="<span class='alert'><b>Your Add Classified Limit is Ended.<br>Please Upgrade Your Account.</b></span>";
			if(check_insert==0)
				return false;
		}
		
    }*/
	
		
	var checkFocus=0;
	var memb;
	var 	i=1;

/*
   while(i<=image_limit)
   {
	  var uplodafile="photo_new_"+i;
	 
	 var ss=document.getElementById("photo_new_"+i).value;
	 if(ss!='')

		{
		 
		var file = ss;
		var mime = file.substr(file.lastIndexOf('.'));
		
		if (mime!= '.gif' && mime!= '.jpg' && mime!= '.JPG' && mime!= '.GIF' && mime!= '.jpeg' && mime!= '.JPEG')
		  {
			document.getElementById("alert_photo_new_"+i).innerHTML="<span class='alert'>Please Upload Proper Image either gif or jpg.</span>";
			if(checkFocus!=1)
			  {
			//	ss.focus();
				var checkFocus=1;
			  }
			 }
	    }
			else
				document.getElementById("alert_photo_new_"+i).innerHTML="";
		i++; 
   }
	*/
	
  if(frm.login_id.value=='')	
  {
	  if(frm.member[0].checked)
			memb=frm.member[0].value;
			
			
	if(!frm.member[0].checked && !frm.member[1].checked)
	{
		document.getElementById("checkone").innerHTML="<span class='alert'>Please select one option for field Are you a member ?</span>";
			if(checkFocus!=1)
			{
				var checkFocus=1;
			}
			
	}
	else
	 document.getElementById("checkone").innerHTML="";
	// alert('1');
	
		
	if(memb=='N')
	{
			if(frm.email.value=='')
			{	
				document.getElementById("email").innerHTML="<span class='alert'>Please enter email address.</span>";
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
					ajax();
					if (doc){
					   doc.open("GET", site_url+"/ajax.php?section=check_email_reg&email="+frm.email.value, false);   
						doc.send(null);
					   }
		//		  alert(doc.responseText);//return false;
				   if(doc.responseText==1)
				   {	
						document.getElementById("email").innerHTML="Email Already Exists";
						frm.email.focus();
						var	 checkFocus=1;
				   }
				   else
					document.getElementById("email").innerHTML="";
				}
			
			}
			
			if(frm.uname.value=='')
			{
				document.getElementById("nameid").innerHTML="<span class='alert'>Please Enter User Name.</span>";	
				if(checkFocus!=1)
				{	frm.uname.focus();	varcheckFocus=1;	}
			}
			else
				document.getElementById("nameid").innerHTML="";	
		
			if(frm.mobile.value=='')
			{
				document.getElementById("mobid").innerHTML="<span class='alert'>Please Enter Mobile No.</span>";	
				if(checkFocus!=1)
				{	frm.mobile.focus();	checkFocus=1;	}
			}
			else 
			{
				 document.getElementById("mobid").innerHTML="";	
				 var y = frm.mobile.value;
				  if(isNaN(y)||y.indexOf(" ")!=-1||y.indexOf("+")!=-1)
				   {
					   document.getElementById("mobid").innerHTML="<span class='alert'>Please Enter Numeric Value.</span>";	
						if(checkFocus!=1)
						{	frm.mobile.focus();	checkFocus=1;	}
		
				   }
				   if (y.length<10 || y.length>10)
				   {
					   document.getElementById("mobid").innerHTML="<span class='alert'>Please Enter 10 Digits Mobile No.</span>";	
						if(checkFocus!=1)
						{	frm.mobile.focus();	checkFocus=1;	}
				   }
				
			}
			
			if(frm.email2.value=='')
			{
				document.getElementById("email2").innerHTML="<span class='alert'>Please Enter Confirm Email.</span>";
					if(checkFocus!=1)
					{frm.email2.focus(); checkFocus=1;	}
			}
			 else
				if(frm.email2.value!=frm.email.value)
				{
					document.getElementById("email2").innerHTML="<span class='alert'>Please Enter Same Email.</span>";
					if(checkFocus!=1)
					{frm.email2.focus(); checkFocus=1;	}
				}
				else
				   document.getElementById("email2").innerHTML="";
			
			if(frm.password.value=='')
			{	
				document.getElementById("passid").innerHTML="<span class='alert'>Please Enter Password.</span>";
					if(checkFocus!=1)
					{	frm.password.focus();				var checkFocus=1;			}
			}
			else
				document.getElementById("passid").innerHTML="";	
				
			if(frm.repass.value=='')
			{	
				document.getElementById("repassid").innerHTML="<span class='alert'>Please Enter Re-Type Password.</span>";
					if(checkFocus!=1)
					{	frm.repass.focus();				var checkFocus=1;			}
			}
			else
			{
				if(frm.repass.value!=frm.password.value)
				{	
					document.getElementById("repassid").innerHTML="<span class='alert'>Please Enter Same Password.</span>";
						if(checkFocus!=1)
						{	frm.repass.focus();				var checkFocus=1;			}
				}
				else
				document.getElementById("repassid").innerHTML="";
			}
			
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
				
			if(frm.country.value=='')
			{	
				document.getElementById("country").innerHTML="<span class='alert'>Please Select Country.</span>";
					if(checkFocus!=1)
					{	frm.country.focus();				var checkFocus=1;			}
			}
			else
				document.getElementById("country").innerHTML="";	
				
				
			if(frm.buyer.checked==false && frm.seller.checked==false && frm.ser_provider.checked==false)
			 {
				document.getElementById("buss_type").innerHTML="<span class='alert'>Please Select Atleast one.</span>";
				  if(checkFocus!=1)
				  {  var checkFocus=1;  }
			 }
			 else
				 document.getElementById("buss_type").innerHTML="";
				 
			if(frm.buyer.checked==true)
			{ 
				if(frm.count_cats.value==0)
				{	
					document.getElementById("cat_counts").innerHTML="<span class='alert'>Please Select One of the Category.</span>";
					if(checkFocus!=1)
					{	var checkFocus=1;			}
				}
				else if(frm.count_cats.value > 10)
				{	
					document.getElementById("cat_counts").innerHTML="<span class='alert'>Sorry, Can't Select more then 10 Categories.</span>";
					if(checkFocus!=1)
					{	var checkFocus=1;			}
				}
				else
					document.getElementById("cat_counts").innerHTML="";	
			}
		}
			
  }
  		//alert('2');							///////////////////////////////////////////

	if(frm.subject.value=='')
	{	
		document.getElementById("subject").innerHTML="<span class='alert'>Please Enter Subject.</span>";
			if(checkFocus!=1)
			{
				frm.subject.focus();
				var checkFocus=1;
			}
	}
	else
	{	
	document.getElementById("subject").innerHTML="";
	}
	//alert('3');	
	if(frm.descript.value=='')
	{	
		document.getElementById("descript").innerHTML="<span class='alert'>Please Enter Article.</span>";
			if(checkFocus!=1)
			{
				frm.descript.focus();
				var checkFocus=1;
			}
	}
	else
		document.getElementById("descript").innerHTML="";
		//alert('4');	
	/*	
	if(frm.price.value=='')
	{	
		document.getElementById("price").innerHTML="<span class='alert'>Please Enter Price.</span>";
			if(checkFocus!=1)
			{
				frm.price.focus();
				var checkFocus=1;
			}
	}
	else
		document.getElementById("price").innerHTML="";		
		
	*/	
	if(frm.seo_key.value=='')
	{	
		document.getElementById("seo_key").innerHTML="<span class='alert'>Please Enter Search Keyword.</span>";

			if(checkFocus!=1)
			{
				frm.seo_key.focus();
				var checkFocus=1;
			}
	}
	else
		document.getElementById("seo_key").innerHTML="";
		
		//alert('5');		
/*	var a=new Array();
	a=document.getElementsByName("cat_id[]");
	
	var check=1;
	for(var i=0; i < a.length; i++)
	{
    	if(a[i].checked)
        {
		  var	check=0;
        }
    }

	if(check==0)
	{	
	document.getElementById("cat_id").innerHTML="<span class='alert'>Please Select Category of Article.</span>";
			if(checkFocus!=1)
			{
				var checkFocus=1;
			}
			return false;
	}
	else
		document.getElementById("cat_id").innerHTML="";
		
		
		alert('6');*/

	if(checkFocus==1)
		return false;
	else
	//alert('7');	
	{	alert("Your classified is under review and will be publish with in 24 to 48 hours.");
		return true;	}
		
		
}


function Valid_add_trade_lead(frm,tot_cla,cl_id)
{
	
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=count_tradeleade&cl_id="+cl_id, false);   
	   doc.send(null);
	    var arraylist=doc.responseText;
		var check_insert=0;
	
		if(arraylist>=tot_cla)
		 {
			 document.getElementById("total_product").innerHTML="<span class='alert'><b>Your Add TradeLeads Limit is Ended.<br>Please Upgrade Your Account.</b></span>";
			if(check_insert==0)
				return false;
		}
		
    }
	
	
	var checkFocus=0;
	var memb;
	
  if(frm.login_id.value=='')	
  {
	  if(frm.member[0].checked)
			memb=frm.member[0].value;
			
			
	if(!frm.member[0].checked && !frm.member[1].checked)
	{
		document.getElementById("checkone").innerHTML="<span class='alert'>Please select one option for field Are you a member ?</span>";
			if(checkFocus!=1)
			{
				var checkFocus=1;
			}
	}
	else
	 document.getElementById("checkone").innerHTML="";
	
		
	if(memb=='N')
	{
			if(frm.email.value=='')
			{	
				document.getElementById("email").innerHTML="<span class='alert'>Please enter email address.</span>";
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
					ajax();
					if (doc){
					   doc.open("GET", site_url+"/ajax.php?section=check_email_reg&email="+frm.email.value, false);   
						doc.send(null);
					   }
		//		  alert(doc.responseText);//return false;
				   if(doc.responseText==1)
				   {	
						document.getElementById("email").innerHTML="Email Already Exists";
						frm.email.focus();
						var	 checkFocus=1;
				   }
				   else
					document.getElementById("email").innerHTML="";
				}
			
			}
			
			if(frm.email2.value=='')
			{
				document.getElementById("email2").innerHTML="<span class='alert'>Please Enter Confirm Email.</span>";
					if(checkFocus!=1)
					{frm.email2.focus(); checkFocus=1;	}
			}
			 else
				if(frm.email2.value!=frm.email.value)
				{
					document.getElementById("email2").innerHTML="<span class='alert'>Please Enter Same Email.</span>";
					if(checkFocus!=1)
					{frm.email2.focus(); checkFocus=1;	}
				}
				else
				   document.getElementById("email2").innerHTML="";

			
			if(frm.uname.value=='')
			{
				document.getElementById("nameid").innerHTML="<span class='alert'>Please Enter User Name.</span>";	
				if(checkFocus!=1)
				{	frm.uname.focus();	varcheckFocus=1;	}
			}
			else
				document.getElementById("nameid").innerHTML="";	
		
			if(frm.mobile.value=='')
			{
				document.getElementById("mobid").innerHTML="<span class='alert'>Please Enter Mobile No.</span>";	
				if(checkFocus!=1)
				{	frm.mobile.focus();	checkFocus=1;	}
			}
			else 
			{
				 document.getElementById("mobid").innerHTML="";	
				 var y = frm.mobile.value;
				  if(isNaN(y)||y.indexOf(" ")!=-1||y.indexOf("+")!=-1)
				   {
					   document.getElementById("mobid").innerHTML="<span class='alert'>Please Enter Numeric Value.</span>";	
						if(checkFocus!=1)
						{	frm.mobile.focus();	checkFocus=1;	}
		
				   }
				   if (y.length<10 || y.length>10)
				   {
					   document.getElementById("mobid").innerHTML="<span class='alert'>Please Enter 10 Digits Mobile No.</span>";	
						if(checkFocus!=1)
						{	frm.mobile.focus();	checkFocus=1;	}
				   }
				
			}
			
			if(frm.password.value=='')
			{	
				document.getElementById("passid").innerHTML="<span class='alert'>Please Enter Password.</span>";
					if(checkFocus!=1)
					{	frm.password.focus();				var checkFocus=1;			}
			}
			else
				document.getElementById("passid").innerHTML="";	
				
			if(frm.repass.value=='')
			{	
				document.getElementById("repassid").innerHTML="<span class='alert'>Please Enter Re-Type Password.</span>";
					if(checkFocus!=1)
					{	frm.repass.focus();				var checkFocus=1;			}
			}
			else
			{
				if(frm.repass.value!=frm.password.value)
				{	
					document.getElementById("repassid").innerHTML="<span class='alert'>Please Enter Same Password.</span>";
						if(checkFocus!=1)
						{	frm.repass.focus();				var checkFocus=1;			}
				}
				else
				document.getElementById("repassid").innerHTML="";
			}
			
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
				
			if(frm.country.value=='')
			{	
				document.getElementById("country").innerHTML="<span class='alert'>Please Select Country.</span>";
					if(checkFocus!=1)
					{	frm.country.focus();				var checkFocus=1;			}
			}
			else
				document.getElementById("country").innerHTML="";	
				
			if(frm.buyer.checked==false && frm.seller.checked==false && frm.ser_provider.checked==false)
			 {
				document.getElementById("buss_type").innerHTML="<span class='alert'>Please Select Atleast one.</span>";
				  if(checkFocus!=1)
				  {  var checkFocus=1;  }
			 }
			 else
				 document.getElementById("buss_type").innerHTML="";
				 
			if(frm.buyer.checked==true)
			{ 
				if(frm.count_cats.value==0)
				{	
					document.getElementById("cat_counts").innerHTML="<span class='alert'>Please Select One of the Category.</span>";
					if(checkFocus!=1)
					{	var checkFocus=1;			}
				}
				else if(frm.count_cats.value > 10)
				{	
					document.getElementById("cat_counts").innerHTML="<span class='alert'>Sorry, Can't Select more then 10 Categories.</span>";
					if(checkFocus!=1)
					{	var checkFocus=1;			}
				}
				else
					document.getElementById("cat_counts").innerHTML="";	
			}	
				
		}
			
  }
  									///////////////////////////////////////////
									
	
	
	
	if(frm.subject.value=='')
	{	
		document.getElementById("subject").innerHTML="<span class='alert'>Please Enter Subject.</span>";
			if(checkFocus!=1)
			{
				frm.subject.focus();
				var checkFocus=1;
			}
	}
	else
		document.getElementById("subject").innerHTML="";
	
	if(frm.descript.value=='')
	{	
		document.getElementById("descript").innerHTML="<span class='alert'>Please Enter Article.</span>";
			if(checkFocus!=1)
			{
				frm.descript.focus();
				var checkFocus=1;
			}
	}
	else
		document.getElementById("descript").innerHTML="";
		
	if(frm.seo_key.value=='')
	{	
		document.getElementById("seo_key").innerHTML="<span class='alert'>Please Enter Search Keyword.</span>";
			if(checkFocus!=1)
			{
				frm.seo_key.focus();
				var checkFocus=1;
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
			if(checkFocus!=1)
			{
				var checkFocus=1;
			}
	}
	else
		document.getElementById("cat_id").innerHTML="";
	/*
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
	  */
	
	if(checkFocus==1)
		return false;
	else
	{	alert("Your Trade Lead is under Review and will be publish with in 24 to 48 hours.");
		return true;	}
}


function Valid_add_trade_lead_buy(frm)
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
		

/*	if(frm.state.value=='')
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
	  	
		*/
		
	
	
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
	
	
	
	if(checkFocus==1)
		return false;
	else
	{	alert("Your Trade Lead is under Review and will be publish within 24 to 48 hours.");
		return true;	}

}


function Valid_user_login1()
{
	var checkFocus=0;
	
	if(frm.distributor_id.value=='')
	{	
		document.getElementById("distributor_id1").innerHTML="<span class='alert'>Please enter User ID.</span>";
			if(checkFocus!=1)
			{
				frm.distributor_id.focus();
				var checkFocus=1;
			}
	}
	else
		document.getElementById("distributor_id1").innerHTML="";
	
	if(frm.pass_id.value=='')
	{	
		document.getElementById("pass_id1").innerHTML="<span class='alert'>Please enter Password.</span>";
			if(checkFocus!=1)
			{
				frm.pass_id.focus();
				var checkFocus=1;
			}
	}
	else
		document.getElementById("pass_id1").innerHTML="";
	
	
	if(checkFocus==1)
		return false;
	else
		return true;
}
function class_cat_change(id,sub_id)
{
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=class_cat_change&id="+id+"&sub_id="+sub_id, false);   
	   doc.send(null);
	}
//	alert(doc.responseText);
	document.getElementById("class_cat_change").innerHTML=doc.responseText;
	//document.getElementById("city_val").value="";
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
				document.getElementById(id).innerHTML="Please Enter Numeric value";
				val.value = "";
		 		val.focus();
		  		//sel_id.select();
			false;
          	}
      	}
   	}
   return true;
} 


function Valid_search(frm)
{
	ajax();
	var checkFocus=0;
	if(frm.search1.value=='')
	{	
		document.getElementById("ser_val").innerHTML="<span class='alert'>Please Enter Search Value.</span>";
		if(checkFocus!=1)
		{
			frm.search1.focus();
			var checkFocus=1;
		}
	}
	else
		document.getElementById("ser_val").innerHTML="";
		
	if(checkFocus==1)
		return false;
	else
		return true;	

}

/*function city_drop_change(used_state)
{
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=city_drop_change&used_state="+used_state, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	document.getElementById("city_change").innerHTML=doc.responseText;
	document.getElementById("city_val").value="";
}*/

function city_change(city_name)
{
	document.getElementById("city_val").value=city_name;
}

function city_drop_change_header(used_state)
{
	ajax();
	var val='';
	city_change_header(val);
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=city_dropdown_header&used_state="+used_state, false);   
	   doc.send(null);
	} 
	//alert(doc.responseText); 
	var x = 0;
	/* Retrieve form object */
	x = document.getElementById("select_state");
	
	/*
	if(used_state!='' && used_state!='all')
	{
		var y = 0;
		// Retrieve selected value in dropdownbox 
		gid = document.getElementById('stateid').value;
		// assign new URL to action property /
		//x.action =site_url+"/india/"+strreplace(gid.toLowerCase());
	}
	else
		x.action =site_url;
		*/
		x.action =site_url
	//alert(x.action);
		
	document.getElementById("city_change_header").innerHTML=doc.responseText;
	document.getElementById("city_val_header").value="";
}

function city_change_header(city_name)
{	
	ajax();
	
	if (doc)
	{ 
	   doc.open("GET", site_url+"/ajax.php?section=city_dropdown_session&used_city="+city_name, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	var x = 0;
	var y = 0;
	/* Retrieve form object */
	x = document.getElementById("select_state");
	/* Retrieve selected value in dropdownbox */
	sid = document.getElementById('stateid').value;
	
	/*if(city_name!='')
	{
		// assign new URL to action property 
		//x.action =site_url+"/india/"+strreplace(sid.toLowerCase())+"/"+strreplace(city_name.toLowerCase());
	}
	else if(sid!='' && sid!='all')
	{
		// assign new URL to action property 
		//x.action =site_url+"/india/"+strreplace(sid.toLowerCase());
	}
	else
		x.action =site_url;*/
	x.action =site_url;
	//alert(x.action);
}

function strreplace(strText)
{
	var strReplaceAll = strText;
	var intIndexOfMatch = strReplaceAll.indexOf( " " );
	while (intIndexOfMatch != -1)
	{
	strReplaceAll = strReplaceAll.replace( " ", "_" );
	intIndexOfMatch = strReplaceAll.indexOf( " " );
	}
	return strReplaceAll;
}

function submitform()
{

  document.forms["search_form"].submit();
}
function Valid_add_product(frm,total_pro,pro_id,image_limit)
{
	//alert('hello');
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"AjaxCantrollers/count_product?pro_id="+pro_id, false);   
	   doc.send(null);
	    var arraylist=doc.responseText;
		var check_insert=0;
		
		if(arraylist>=total_pro)
		 {
			 document.getElementById("total_product").innerHTML="<span ><b>Your Add Product Limit is Ended.<br>Please Upgrade Your Account.</b></span>";
			 var mes="Your Add Product Limit is Ended.Please Upgrade Your Account.";
			 alert(mes);
			if(check_insert==0)
				return false;
		}
		
    }
	var checkFocus=0;
	var 	i=1;


/*
   while(i<=image_limit)
   {
	  var uplodafile="photo_new_"+i;
	 
	 var ss=document.getElementById("photo_new_"+i).value;
	 if(ss!='')

		{
		 
		var file = ss;
		var mime = file.substr(file.lastIndexOf('.'));
		
		if (mime!= '.gif' && mime!= '.jpg' && mime!= '.JPG' && mime!= '.GIF' && mime!= '.jpeg' && mime!= '.JPEG')
		  {
			document.getElementById("alert_photo_new_"+i).innerHTML="<span >Please Upload Proper Image either gif or jpg.</span>";
			if(checkFocus!=1)
			  {
			//	ss.focus();
				var checkFocus=1;
			  }
			 }
	    }
			else
				document.getElementById("alert_photo_new_"+i).innerHTML="";
	  
	  
		i++; 
   }
   */
	if(frm.pro_name.value=='')
	{	
		document.getElementById("pro_name").innerHTML="<span >Please Enter Product Name.</span>";
		if(checkFocus!=1)
		{	frm.pro_name.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("pro_name").innerHTML="";
		

	
  
   if(isNaN(frm.price.value) && frm.price.value=='')
	{ 
		 document.getElementById("price").innerHTML="<span >Please Enter Numeric Value.</span>";
			if(checkFocus!=1)
			{	frm.price.focus();				var checkFocus=1;			}
	}	
	else
	 document.getElementById("price").innerHTML="";
/*	
if(frm.photo_new_1.value=='')
	{	
		document.getElementById("alert_photo_new_1").innerHTML="<span >Please Upload atleast one image.</span>";
			if(checkFocus!=1)
			{	frm.photo_new_1.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("alert_photo_new_1").innerHTML="";

	
	if(frm.price.value=='')
	{	
		document.getElementById("price").innerHTML="<span >Please Enter Product Price.</span>";
			if(checkFocus!=1)
			{	frm.price.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("price").innerHTML="";
	
	if(frm.price.value=='')
	{	
		document.getElementById("price").innerHTML="<span >Please Enter Product Price.</span>";
			if(checkFocus!=1)
			{	frm.price.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("price").innerHTML="";
		
	
	if(frm.delivery_term.value=='')
	{	
		document.getElementById("delivery_term").innerHTML="<span >Please Enter Delivery Terms.</span>";
			if(checkFocus!=1)
			{	frm.delivery_term.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("delivery_term").innerHTML="";
		
	if(frm.payment_term.value=='')
	{	
		document.getElementById("payment_term").innerHTML="<span >Please Enter Payment Terms</span>";
			if(checkFocus!=1)
			{	frm.payment_term.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("payment_term").innerHTML="";	
		
		
	if(frm.quantity.value=='')
	{	
		document.getElementById("quantity").innerHTML="<span >Please Product Quantity</span>";
			if(checkFocus!=1)
			{
				frm.quantity.focus();
				var checkFocus=1;
			}
	}
	else
		document.getElementById("quantity").innerHTML="";
		
	if(frm.seo_key.value=='')
	{	
		document.getElementById("seo_key").innerHTML="<span >Please Enter Keywords</span>";
			if(checkFocus!=1)
			{	frm.seo_key.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("seo_key").innerHTML="";
		
	*/
	

/*	if(document.getElementById('cat_select').value=="")
	{	
	//alert(frm.sele_primery.value);
		document.getElementById("cat_name_info").innerHTML="<span >Please Select Category.</span>";
		if(checkFocus!=1)
		{	document.getElementById('cat_select').focus();				checkFocus=1;			}
	}
	else
		document.getElementById("cat_name_info").innerHTML="";*/
	
	if(frm.sele_primery.value=='0')
	{	
	//alert(frm.sele_primery.value);
		document.getElementById("selprimery_info").innerHTML="<span >Please Primery Product Name.</span>";
		if(checkFocus!=1)
		{	frm.sele_primery.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("selprimery_info").innerHTML="";
		
		
	if(frm.price.value=='')
	{	
		document.getElementById("price").innerHTML="<span class='alert'>Please Enter Price.</span>";
			if(checkFocus!=1)
			{
				frm.price.focus();
				var checkFocus=1;
			}
	}
	else
		document.getElementById("price").innerHTML="";		
		
		var data = new Array();
		$(".fstChoiceItem").each(function(index,value){
			data.push($(value).attr('data-value'));
		});
		$("#catgoryid").val(data);
		// console.log($("#catgoryid").val()); 
		if(document.getElementById("catgoryid").value=='')
	{	
	
	
		document.getElementById("cat_error").innerHTML="<span class='alert'>Please Select Catgory.</span>";
			if(checkFocus!=1)
			{
				frm.catgoryid.focus();
				var checkFocus=1;
			}
	}
	else
		document.getElementById("cat_error").innerHTML="";	
		
		
		if(document.getElementById("scurrid").value=='')
	{	
	
	
		document.getElementById("scurrid_error").innerHTML="<span class='alert'>Please Select Currency.</span>";
			if(checkFocus!=1)
			{
				frm.scurrid.focus();
				var checkFocus=1;
			}
	}
	else
		document.getElementById("scurrid_error").innerHTML="";	
		
		

		
if(pro_id!="")	
{
	//alert(pro_id);
	if(frm.photo_1.value=="")
	{
		
		document.getElementById("image_error").innerHTML="<span class='alert'>Please Select Image.</span>";
		if(checkFocus!=1)
		{
			frm.photo_new_1.focus();
			var checkFocus=1;
		}
	}
	else 
		document.getElementById("image_error").innerHTML="";	
}
else
{		
	if(frm.photo_new_1.value=='')
	{
		document.getElementById("image_error").innerHTML="<span class='alert'>Please Select Image.</span>";
		if(checkFocus!=1)
		{
			frm.photo_new_1.focus();
			var checkFocus=1;
		}
	}
	else 
		document.getElementById("image_error").innerHTML="";	
}
		
	if(frm.city.value=='')
	{
		document.getElementById("city_error").innerHTML="<span >Please Select City.</span>";
		if(checkFocus!=1)
		{	frm.city.focus();				checkFocus=1;			}	
	}
	else
		document.getElementById("city_error").innerHTML="";	
		
		
	if(frm.brand_name.value=='')
	{	
		document.getElementById("brand_name").innerHTML="<span >Please Enter brand name.</span>";
		if(checkFocus!=1)
		{	frm.brand_name.focus();				checkFocus=1;			}
	}
	else document.getElementById("brand_name").innerHTML="";



/*if(document.getElementById('model_number').value==''&&chek=='')
	{
		alert("hello i am only product");	
		document.getElementById("model_number").innerHTML="<span >Please Enter model number.</span>";
		if(checkFocus!=1)
		{	frm.model_number.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("model_number").innerHTML="";
		
if(frm.ean_code.value=='')
	{	
		document.getElementById("ean_code").innerHTML="<span >Please Enter ean code.</span>";
		if(checkFocus!=1)
		{	frm.ean_code.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("ean_code").innerHTML="";
		
if(frm.size.value=='')
	{	
		document.getElementById("size").innerHTML="<span >Please Enter size.</span>";
		if(checkFocus!=1)
		{	frm.size.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("size").innerHTML="";
		
if(frm.N_W.value=='')
	{	
		document.getElementById("N_W").innerHTML="<span >Please Enter N.W</span>";
		if(checkFocus!=1)
		{	frm.N_W.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("N_W").innerHTML="";
		
if(frm.shape.value=='')
	{	
		document.getElementById("shape").innerHTML="<span >Please Enter shape.</span>";
		if(checkFocus!=1)
		{	frm.shape.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("shape").innerHTML="";
		
if(frm.color.value=='')
	{	
		document.getElementById("color").innerHTML="<span >Please Enter color.</span>";
		if(checkFocus!=1)
		{	frm.color.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("color").innerHTML="";
		
if(frm.material.value=='')
	{	
		document.getElementById("material").innerHTML="<span >Please Enter material.</span>";
		if(checkFocus!=1)
		{	frm.material.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("material").innerHTML="";
		
if(frm.thickness.value=='')
	{	
		document.getElementById("thickness").innerHTML="<span >Please Enter thickness.</span>";
		if(checkFocus!=1)
		{	frm.thickness.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("thickness").innerHTML="";
		
if(frm.available_size_range.value=='')
	{	
		document.getElementById("available_size_range").innerHTML="<span >Please Enter available size range.</span>";
		if(checkFocus!=1)
		{	frm.available_size_range.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("available_size_range").innerHTML="";
		
if(frm.type_of_packing_product.value=='')
	{	
		document.getElementById("type_of_packing_product").innerHTML="<span >Please Enter type of packing product.</span>";
		if(checkFocus!=1)
		{	frm.type_of_packing_product.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("type_of_packing_product").innerHTML="";
		
if(frm.number_of_pc_per_inner.value=='')
	{	
		document.getElementById("number_of_pc_per_inner").innerHTML="<span >Please Enter number of pc per inner.</span>";
		if(checkFocus!=1)
		{	frm.number_of_pc_per_inner.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("number_of_pc_per_inner").innerHTML="";
		
if(frm.size_inner.value=='')
	{	
		document.getElementById("size_inner").innerHTML="<span >Please Enter size inner.</span>";
		if(checkFocus!=1)
		{	frm.size_inner.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("size_inner").innerHTML="";
		
if(frm.type_of_inner_packing.value=='')
	{	
		document.getElementById("type_of_inner_packing").innerHTML="<span >Please Enter type of inner packing.</span>";
		if(checkFocus!=1)
		{	frm.type_of_inner_packing.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("type_of_inner_packing").innerHTML="";
		
if(frm.number_inners_per_outer.value=='')
	{	
		document.getElementById("number_inners_per_outer").innerHTML="<span >Please Enter number inners per outer.</span>";
		if(checkFocus!=1)
		{	frm.number_inners_per_outer.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("number_inners_per_outer").innerHTML="";
		
if(frm.type_of_outer_packing.value=='')
	{	
		document.getElementById("type_of_outer_packing").innerHTML="<span >Please Enter type of outer packing.</span>";
		if(checkFocus!=1)
		{	frm.type_of_outer_packing.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("type_of_outer_packing").innerHTML="";
		
if(frm.size_outer.value=='')
	{	
		document.getElementById("size_outer").innerHTML="<span >Please Enter size outer.</span>";
		if(checkFocus!=1)
		{	frm.size_outer.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("size_outer").innerHTML="";
		
if(frm.number_of_masters_per_pallet.value=='')
	{	
		document.getElementById("number_of_masters_per_pallet").innerHTML="<span >Please Enter number of masters per pallet.</span>";
		if(checkFocus!=1)
		{	frm.number_of_masters_per_pallet.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("number_of_masters_per_pallet").innerHTML="";
		
if(frm.type_of_pallet.value=='')
	{	
		document.getElementById("type_of_pallet").innerHTML="<span >Please Enter type of pallet.</span>";
		if(checkFocus!=1)
		{	frm.type_of_pallet.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("type_of_pallet").innerHTML="";
		
if(frm.available_certificates.value=='')
	{	
		document.getElementById("available_certificates").innerHTML="<span >Please Enter available certificates.</span>";
		if(checkFocus!=1)
		{	frm.available_certificates.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("available_certificates").innerHTML="";*/
		

	if(checkFocus==1)
		return false;
	else
	{	
	if(user_status=='Y')
		alert("Your Product is under review and will be publish with in 24 to 48 hours.");
    else
	    alert("Please Active Your account");		
		return false;	
	}

}
/*
function checkTheBox(form)
 {
	 var len=form.cat.length;
	 alert(len);return false;
var checkFound = false;
for (var counter=0; counter < myForm.length; counter++) {
   if ((myForm.elements[counter].name == "myCheckbox") && (myForm.elements[counter].checked == true)) {
      checkFound = true;
      }
   }
if (checkFound != true) {
   alert ("Please check at least one checkbox.");
   }
	 
	 
 }
function checkTheBox(form) {
	alert("ADSF");
var flag = 0;
var len=form.cat.length;
alert(len);
for (var i = 0; i< 5; i++) {
if(document.myform["midlevelusers[]"][i].checked){
flag ++;
}
}
if (flag != 1) {
alert ("You must check one and only one checkbox!");
return false;
}
return true;
}
*/
function Valid_personal_profile(frm)
{
	 
	var checkFocus=0;
	if(frm.name.value=="")
	{	
		document.getElementById("name").innerHTML="<span class='alert'>Please Enter Name.</span>";
		if(checkFocus!=1)
		{
			frm.name.focus();
			var checkFocus=1;
		}
	}
	else
		document.getElementById("name").innerHTML="";
   
 
	
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
		
	 
	
		
	if(frm.address.value=='')
	{	
		document.getElementById("address").innerHTML="<span class='alert'>Please Enter Address.</span>";
		if(checkFocus!=1)
		{
			frm.address.focus();
			var checkFocus=1;
		}
	}
	else
		document.getElementById("address").innerHTML="";	
	
	 
	if(checkFocus==1)
    	 return false;   
	else
   		return true;	
	
}


function Valid_contact(frm)
{
	var checkFocus=0;
	if(frm.name.value=='')
	{	
		document.getElementById("name").innerHTML="<span class='alert'>Please Enter Name.</span>";
		if(checkFocus!=1)
		{	frm.name.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("name").innerHTML="";
		

	if(frm.email.value=='')
	{	
		document.getElementById("email").innerHTML="<span class='alert'>Please enter email address.</span>";
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
	
	/*if(frm.mobile_no.value=='')
	{	
		document.getElementById("mobile_no").innerHTML="<span class='alert'>Please Enter Mobile No.</span>";
			if(checkFocus!=1)
			{	frm.mobile_no.focus();				var checkFocus=1;			}
  
    }
	
   else 
    if(isNaN(frm.mobile_no.value))
	{
	document.getElementById("mobile_no").innerHTML="<span class='alert'>Please Enter Numeric value.</span>";
			if(checkFocus!=1)
			{	frm.mobile_no.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("mobile_no").innerHTML="";
	
	
	if(frm.subject.value=='')
	{	
		document.getElementById("subject").innerHTML="<span class='alert'>Please Enter Subject</span>";
			if(checkFocus!=1)
			{	frm.subject.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("subject").innerHTML="";
		
	if(frm.detail.value=='')
	{	
		document.getElementById("detail").innerHTML="<span class='alert'>Please Enter Query</span>";
			if(checkFocus!=1)
			{	frm.detail.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("detail").innerHTML="";*/
		
		
	if(checkFocus==1)
		return false;
	else
		return true;	

}


function Valid_about(frm)
{

	var checkFocus=0;
	
	if(frm.name.value=='')
	{	
		document.getElementById("name").innerHTML="<span class='alert'>Please Enter Name.</span>";
		if(checkFocus!=1)
		{	frm.name.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("name").innerHTML="";
	
	
	if(frm.email.value=='')
	{	
		document.getElementById("email").innerHTML="<span class='alert'>Please enter email address.</span>";
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

		
	if(checkFocus==1)
		return false;
	else
		return true;	

}


function Valid_forgot(frm)
{
	var checkFocus=0;
	if(frm.email.value=='')
	{	
		document.getElementById("email").innerHTML="<span class='alert'>Please enter email address.</span>";
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
			ajax();
			if (doc){
			   doc.open("GET", site_url+"/ajax.php?section=check_email&email="+frm.email.value, false);   
				doc.send(null);
			   }
//		  alert(doc.responseText);//return false;
		   if(doc.responseText==0)
		   {	
		   		document.getElementById("email").innerHTML="<span class='alert'>Email Not Exists</span>";
				frm.email.focus();
				var	 checkFocus=1;
		   }
		   else
		   	document.getElementById("email").innerHTML="";
		}
	
	}
	
	
		
	if(checkFocus==1)
		return false;
	else
		return true;		
}



function show_cate(chk)
{
	if(document.getElementById("buyer").checked)
		document.getElementById("cate").style.display="block";
	else
		document.getElementById("cate").style.display="none";
}
function show_from(chk)
{
	if(document.getElementById("member").checked)
		{
		document.getElementById("ymemb").style.display="block";
		document.getElementById("cate").style.display="none";
		}
	else
		{
		document.getElementById("ymemb").style.display="none";
		document.getElementById("cate").style.display="block";

		}
}

function show_login(chk)
{
	if(document.getElementById("member").checked)
		{
		document.getElementById("cate").style.display="block";
		document.getElementById("ymemb").style.display="none";
		}
	else
		{
		document.getElementById("cate").style.display="none";
		}
}

function show_reg(chk)
{
	if(document.getElementById("member").checked)
		{
		document.getElementById("ymemb").style.display="block";	
		document.getElementById("cate").style.display="none";
		}
	else
		{
		document.getElementById("ymemb").style.display="none";
		}
}


function show_buyer_cate(chk)
{
 	if(document.getElementById("buyer").checked)
		document.getElementById("cate_list").style.display="block";
	else
		document.getElementById("cate_list").style.display="none";	
}

/******************* For Alternate Values in    Edit company profile **************************/
function show_alt_email()
{
	if(document.getElementById("alt_email").checked)
		document.getElementById("alt_email_list").style.display="block";
	else
		document.getElementById("alt_email_list").style.display="none";	
}
/******************* For Alternate Values in    Edit company profile **************************/


function Valid_Inquiry(frm ,sess)
{
 	var checkFocus=0;
	if(sess==0)
	{
	
	if(frm.name.value=='')
	{	
		document.getElementById("name").innerHTML="<span class='alert'>"+lang_enter_name+"</span>";
		if(checkFocus!=1)
		{	frm.name.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("name").innerHTML="";
		

	if(frm.email.value=='')
	{	
		document.getElementById("email").innerHTML="<span class='alert'>Please enter email address.</span>";
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
		
	}
	
		
	if(frm.subject.value=='')
	{	
		document.getElementById("subject").innerHTML="<span class='alert'>Please Enter Subject</span>";
			if(checkFocus!=1)
			{	frm.subject.focus();				
			var checkFocus=1;			}
	}
	else
		document.getElementById("subject").innerHTML="";
		
	if(frm.message.value=='')
	{	
		document.getElementById("message").innerHTML="<span class='alert'>Please Enter message</span>";
			if(checkFocus!=1)
			{	frm.message.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("message").innerHTML="";
		
		
	if(checkFocus==1)
		return false;
	else
		return true;	

}

function Valid_send_buy_response(frm)
{
	var checkFocus;
	
	if(user_id=='')
	{
	  document.getElementById("first_login").innerHTML="<span class='alert'>First You Have to Login.</span>";	
	  if(checkFocus!=1)
	  {var checkFocus=1;}
	}
	else
		{	
			if(frm.subject.value=='')
			{ 
			 document.getElementById("subject").innerHTML="<span class='alert'>Please Enter Subject</span>";	
			 if(checkFocus!=1)
				{frm.subject.focus(); var checkFocus=1;}
			}
			else
				document.getElementById("subject").innerHTML="";	
				
			if(frm.message.value=='')
			{ 
			 document.getElementById("message").innerHTML="<span class='alert'>Please Enter message</span>";	
			 if(checkFocus!=1)
				{frm.message.focus(); var checkFocus=1;}
			}
			else
				document.getElementById("message").innerHTML="";	
		}
		
	if(checkFocus==1)
		return false;
	else
		return true;		

} 

function rss_cat(type)
{	
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=rss_cat_change&type="+type, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	document.getElementById("rss_cat_id").innerHTML=doc.responseText;
	//document.getElementById("city_val").value="";
}

function rss_cat_val(cat_name)
{
	document.getElementById("rss_val_id").value=cat_name;
}

function Valid_add_comment(frm)
{
   var checkFocus=0;

   if(frm.comment.value=='')
	{	
		document.getElementById("comment").innerHTML="<span class='alert'>Please Enter Comment.</span>";
			if(checkFocus!=1)
			{	frm.comment.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("comment").innerHTML="";
		
	if(checkFocus==1)
		return false;
	else
		return true;	

}

function Valid_poll(frm)
{
  var checkFocus=0;
  var pl_id=frm.pl_id.value;
  var val1=frm.captcha_str.value;
  var val2=frm.captcha_val.value;
  
  
  var quest;
  if(frm.questions[0].checked)
  		quest=frm.questions[0].value;
  if(frm.questions[1].checked)
  		quest=frm.questions[1].value;
  if(frm.questions[2].checked)
  		quest=frm.questions[2].value;
  if(frm.questions[3].checked)
  		quest=frm.questions[3].value;
	
	/*if(val1!=val2)
	{
	document.getElementById("code_err").innerHTML="<span class='alert'>Enter Correct Code.</span>";
			if(checkFocus!=1)
			{
				frm.captcha_val.focus();
				var checkFocus=1;
			} 
	}
	else
	   document.getElementById("code_err").innerHTML="";*/
	
	if(!frm.questions[0].checked && !frm.questions[1].checked && !frm.questions[2].checked && !frm.questions[3].checked)
	{	
		document.getElementById("questions").innerHTML="<span class='alert'>Please Select a Question.</span>";
			if(checkFocus!=1)
			{
				frm.questions[0].focus();
				var checkFocus=1;
			} 
	}
	
	else
	
	if(val1!=val2)
	{
	document.getElementById("code_err").innerHTML="<span class='alert'>Enter Correct Code.</span>";
			if(checkFocus!=1)
			{
				frm.captcha_val.focus();
				var checkFocus=1;
			} 
			document.getElementById("questions").innerHTML="";
	}
	    
	else
	  { 
	   document.getElementById("questions").innerHTML="";
	   document.getElementById("code_err").innerHTML="";
			ajax();
			if (doc){
			   doc.open("GET", site_url+"/ajax.php?section=poll_vote&questions="+quest+"&pl_id="+pl_id, false);   
				doc.send(null);
			   }
		 // alert(doc.responseText);//return false;
		   if(doc.responseText==1)
		   {	
		   		document.getElementById("msg").innerHTML="<span class='alert'>Successfully vote.</span>";
				var	 checkFocus=1;
		   }
	  }
	 
	//alert(val1+val2);
	if(checkFocus==1)
		return false;
	else
		return true;
	 
}

function Valid_poll_quest(frm)
{
  var checkFocus=0;
  /*var pl_id=frm.plid.value;
  var val3=frm.captcha_str1.value;
  var val4=frm.captcha_val1.value;*/
  
  alert(frm.plid.value+"kjlljkn");
  var quest;
  if(frm.questions[0].checked)
  		quest=frm.questions[0].value;
  if(frm.questions[1].checked)
  		quest=frm.questions[1].value;
  if(frm.questions[2].checked)
  		quest=frm.questions[2].value;
  if(frm.questions[3].checked)
  		quest=frm.questions[3].value;
	
	/*if(val1!=val2)
	{
	document.getElementById("code_err").innerHTML="<span class='alert'>Enter Correct Code.</span>";
			if(checkFocus!=1)
			{
				frm.captcha_val.focus();
				var checkFocus=1;
			} 
	}
	else
	   document.getElementById("code_err").innerHTML="";*/
	
	if(!frm.questions[0].checked && !frm.questions[1].checked && !frm.questions[2].checked && !frm.questions[3].checked)
	{	
		document.getElementById("questions1").innerHTML="<span class='alert'>Please Select a Question.</span>";
			if(checkFocus!=1)
			{
				frm.questions[0].focus();
				var checkFocus=1;
			} 
	}
	
	else
	
	if(val3!=val4)
	{
	document.getElementById("code_err1").innerHTML="<span class='alert'>Enter Correct Code.</span>";
			if(checkFocus!=1)
			{
				frm.captcha_val1.focus();
				var checkFocus=1;
			} 
			document.getElementById("questions1").innerHTML="";
	}
	    
	else
	  { 
	   document.getElementById("questions1").innerHTML="";
	   document.getElementById("code_err1").innerHTML="";
			ajax();
			if (doc){
			   doc.open("GET", site_url+"/ajax.php?section=poll_vote&questions="+quest+"&pl_id="+pl_id, false);   
				doc.send(null);
			   }
		 // alert(doc.responseText);//return false;
		   if(doc.responseText==1)
		   {	
		   		document.getElementById("msg1").innerHTML="<span class='alert'>Successfully vote.</span>";
				var	 checkFocus=1;
		   }
	  }
	 
	//alert(val1+val2);
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

function numOnly(evt)
{	
	var charCode = (evt.which) ? evt.which : window.event.keyCode;

	if (charCode <= 13)
	{
		return true;
	}
	else
	{
		var keyChar = String.fromCharCode(charCode);
		var re = /[0-9]/
		return re.test(keyChar);
	}	
}

function Valid_change_pass(frm)
{
	
	var checkFocus=0;
	
	//alert(frm.old_pass.value);
	if(frm.old_pass.value=='')
	{	
		document.getElementById("old_pass").innerHTML="<span class='alert'>Please Enter Old Password.</span>";
		if(checkFocus!=1)
		{	frm.old_pass.focus();				checkFocus=1;			}
	}
	else
	{
		ajax();
			if (doc){
			   doc.open("GET", site_url+"/ajax.php?section=change_pass&pass="+frm.old_pass.value, false);   
				doc.send(null);
			   }
    //	  alert(doc.responseText);//return false;
		   if(doc.responseText==0)
		   {	
		   		document.getElementById("old_pass").innerHTML="<span class='alert'>Wrong Password</span>";
				frm.old_pass.focus();
				var	 checkFocus=1;
		   }
		   else
		   	document.getElementById("old_pass").innerHTML="";	
	}
		

	if(frm.new_pass.value=='')
	{	
		document.getElementById("new_pass").innerHTML="<span class='alert'>Please Enter New Password.</span>";
			if(checkFocus!=1)
			{	frm.new_pass.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("new_pass").innerHTML="";
	
	if(frm.con_pass.value=='')
	{	
		document.getElementById("con_pass").innerHTML="<span class='alert'>Please enter Confirm Password.</span>";
			if(checkFocus!=1)
			{	frm.con_pass.focus();				var checkFocus=1;			}
	}
	else
	{ 
		if(frm.new_pass.value!=frm.con_pass.value)
		{
			document.getElementById("con_pass").innerHTML="<span class='alert'>Please Enter same as New Password.</span>";
			if(checkFocus!=1)
			{	frm.con_pass.focus();				var checkFocus=1;			}
		}
		else
		document.getElementById("con_pass").innerHTML="";
	}
	
	if(checkFocus==1)
		return false;
	else
		return true;		
}

function city_select_change(used_state)
{
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=city_select_change&used_state="+used_state, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	document.getElementById("city_change").innerHTML=doc.responseText;
	document.getElementById("city_val").value="";
}





/////////////////////////////////////////////////////////////////////////////////////////

function city_selected(city_name)
{
	document.getElementById("city_val").value=city_name;
}



function city_selected_adv(city_name)
{
	document.getElementById("city_val_adv").value=city_name;
}

function wait_img_show()
{
	document.getElementById("wait_img").style.display="block";
}
function wait_img_hide()
{
	document.getElementById("wait_img").style.display="none";
}

function state_select_change1(used_country)
{ 
	ajax();
		
	 doc.onreadystatechange=function()
  {
  if (doc.readyState==4 && doc.status==200)
    {
	
		document.getElementById("state_change").innerHTML=doc.responseText;
	//document.getElementById("state_val").value="";
	state_selected1('');
	}
	
}

	if (doc)
	{
		doc.open("GET", "ajax.php?section=blank_city1",true);
		doc.send(null);
	}
		
		//document.getElementById("city_val").value="";
	
	if (doc)
	{ 
	   doc.open("GET", site_url+"/ajax.php?section=country_select_change1&used_country="+used_country, true);   
	   doc.send(null);
	}
	document.getElementById("country_id").value=used_country;
	//alert(doc.responseText);
	/*document.getElementById("state_change").innerHTML=doc.responseText;
	document.getElementById("state_val").value="";*/
}
function state_selected1(used_state)
{
	//alert(used_state);
	if(used_state!='')
	ajax();
	 doc.onreadystatechange=function()
  {
  if (doc.readyState==4 && doc.status==200)
    {
		document.getElementById("city_change").innerHTML=doc.responseText;
	//document.getElementById("city_val").value="";
	}
  }
	
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=state_select_change1&used_state="+used_state, true);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	
}
function city_selected1(city_name)
{
	document.getElementById("city").value=city_name;
}

function state_select_change(used_country)
{ 

	ajax();
	
	/*if (doc)
	{
	doc.open("GET", site_url+"/ajax.php?section=blank_city",false);
	doc.send(null);
	document.getElementById("city_change").innerHTML=doc.responseText;
	document.getElementById("city_val").value="";
	}
	*/
	if (doc)
	{ 
	   doc.open("GET", site_url+"/ajax.php?section=country_select_change&used_country="+used_country, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	document.getElementById("state_change").innerHTML=doc.responseText;
	//document.getElementById("state_val").value="";
	
	
}

function state_selected(used_state)
{
	//document.getElementById("state_value").value=used_state;
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=state_select_change&used_state="+used_state, false);   
	   doc.send(null);
	}
//alert(doc.responseText);
	document.getElementById("city_dropdown").innerHTML=doc.responseText;
}


function state_selected_reg(used_state)
{
	//wait_img_show();
	document.getElementById("state_val").value=used_state;
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=state_select_change_reg&used_state="+used_state, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	document.getElementById("city_change").innerHTML=doc.responseText;
	//document.getElementById("city_change").value="";
	//wait_img_hide()
}

function state_select_change_adv(used_country)
{ 

	ajax();
	
	/*if (doc)
	{
	doc.open("GET", site_url+"/ajax.php?section=blank_city",false);
	doc.send(null);
	document.getElementById("city_change").innerHTML=doc.responseText;
	document.getElementById("city_val").value="";
	}
	*/
	if (doc)
	{ 
	   doc.open("GET", site_url+"/ajax.php?section=country_select_change_adv&used_country="+used_country, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	document.getElementById("state_change_adv").innerHTML=doc.responseText;
	document.getElementById("state_val_adv").value="";
	
	
}

function state_selected_adv(used_state)
{
	//wait_img_show();
	document.getElementById("state_val_adv").value=used_state;
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=state_select_change_adv&used_state="+used_state, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	document.getElementById("city_change_adv").innerHTML=doc.responseText;
	document.getElementById("city_val_adv").value="";
	//wait_img_hide()
}

/************************** New site**********************************/
function show_classified(id)
{
 ajax();
 if(doc)
 {	
	doc.open("GET",site_url+"/ajax.php?section=classified_change&cl_id="+id,false);
	doc.send(null);
 }
 //alert(doc.responseText);
 document.getElementById("latest_classifieds").innerHTML=doc.responseText;
}
/************************** New site**********************************/

function valid_registraiton_job(frm)
	{	
 		 var checkFocus=0;
		 
 		if(frm.uname.value=='')
		{
			document.getElementById("id_namealert").innerHTML="Please Enter the Name.";
			if(checkFocus!=1)
				{
						frm.uname.focus();			
						var	checkFocus=1;
				} 
		}
		else
 			 document.getElementById("id_namealert").innerHTML="";
			 
			 if(frm.cmp_address.value=='')
		{
			document.getElementById("cmpaddressInfo").innerHTML="Please Enter the company address.";
			if(checkFocus!=1)
				{
						frm.cmp_address.focus();			
						var	checkFocus=1;
				} 
		}
		else
 			 document.getElementById("cmpaddressInfo").innerHTML="";


		if(frm.address.value=='')
		{
			document.getElementById("addressInfo").innerHTML="Please Enter the Address.";
			if(checkFocus!=1)
				{
						frm.address.focus();			
						var	checkFocus=1;
				} 
		}
		else
 			 document.getElementById("addressInfo").innerHTML="";
			 
			 
			 
			 if(frm.companyName.value=='')
		{
			document.getElementById("companyInfo").innerHTML="Please Enter the Company Name.";
			if(checkFocus!=1)
				{
						frm.companyName.focus();			
						var	checkFocus=1;
				} 
		}
		else
 			 document.getElementById("companyInfo").innerHTML="";
			 
		

	 	if(frm.email.value=='')
		{	
			document.getElementById("id_emailalert").innerHTML="Please Enter Email address.";
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
				document.getElementById("id_emailalert").innerHTML="Please enter valid email address.";
				if(checkFocus!=1)
					frm.email.focus();	
				var checkFocus=1;
			}
			else
			{ 
				ajax();
				if (doc){ 
				   doc.open("GET", site_url+"/ajax.php?section=check_email_ald&email="+frm.email.value, false);   
					doc.send(null);
				   }
	 	  	//alert(doc.responseText);//return false;
			   if(doc.responseText==1)
			   {	
					document.getElementById("id_emailalert").innerHTML="Email Already Exists";
					frm.email.focus();
					var	 checkFocus=1;
			   }
			   else
				document.getElementById("id_emailalert").innerHTML="";
			}
		
		}
   			
			 
		if(frm.mobile.value=='')
		{
			document.getElementById("id_mobilealert").innerHTML="Please Enter the mobile number.";
			if(checkFocus!=1)
				{
						frm.mobile.focus();			
						var	checkFocus=1;
				} 
		}
		
		else if(isNaN(frm.mobile.value))
		 {
			document.getElementById("id_mobilealert").innerHTML=" Please Enter Numeric value.";
			if(checkFocus!=1)
				{	
					frm.mobile.focus();
					var checkFocus=1;
				} 
		 }
		
		else if(frm.mobile.value.length< 10)
		{
			document.getElementById("id_mobilealert").innerHTML="Please Enter 10 Character Mobile no.";
				if(checkFocus!=1)
				{
					frm.mobile.focus();
					var checkFocus=1;
				}
		}
		else
			document.getElementById("id_mobilealert").innerHTML="";	
			
		if(frm.resume.value=='')
		{
			document.getElementById("id_filealert").innerHTML="Please upload your resume.";
			if(checkFocus!=1)
				{
						frm.resume.focus();			
						var	checkFocus=1;
				} 
		}
		else
 			 document.getElementById("id_filealert").innerHTML="";
		 
  		
		
		if(checkFocus==1)
			return false;
		else
			return true;
 }
function Valid_patnerinfo(frm)
	{	
 		 var checkFocus=0;
		 
 		if(frm.uname.value=='')
		{
			document.getElementById("nameInfo").innerHTML="Please Enter the Name.";
			if(checkFocus!=1)
				{
						frm.uname.focus();			
						var	checkFocus=1;
				} 
		}
		else
 			 document.getElementById("nameInfo").innerHTML="";
		
		if(frm.companyName.value=='')
		{
			document.getElementById("companyInfo").innerHTML="Please Enter the Company.";
			if(checkFocus!=1)
				{
						frm.companyName.focus();			
						var	checkFocus=1;
				} 
		}
		else
 			 document.getElementById("companyInfo").innerHTML="";
			 
		
			 
		if(frm.msg.value=='')
		{
			document.getElementById("messInfo").innerHTML="Please Enter the Message.";
			if(checkFocus!=1)
				{
						frm.msg.focus();			
						var	checkFocus=1;
				} 
		}
		else
 			 document.getElementById("messInfo").innerHTML="";	 	 
	 
	 	if(frm.email.value=='')
		{	
			document.getElementById("email_alert").innerHTML="Please Enter Email address.";
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
				document.getElementById("email_alert").innerHTML="Please enter valid email address.";
				if(checkFocus!=1)
					frm.email.focus();	
				var checkFocus=1;
			}
		}
		
		if(checkFocus==1)
			return false;
		else
			return true;
 }


/////////////////////////////////////////////////////////////////////////////////////////////////////////

String.prototype.endsWith=function(B){var A=new RegExp(B+"$");return A.test(this)};String.prototype.startsWith=function(B){var A=new RegExp("^"+B);return A.test(this)};function $(A){return document.getElementById(A)}
function closefeedbackTriCallback(){var A=$("usersurvey");if(A){A.innerHTML=""}}

function package_upgrade()
{
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=package_upgradation", false);   
	   doc.send(null);
	
	    var arraylist=doc.responseText.split("###");
		if(arraylist[0]==1)
		 {
			var end_date;
			end_date= formatDate(arraylist[2]);
			document.getElementById('pack').innerHTML = arraylist[1];
			document.getElementById('end_date').innerHTML = end_date;	 
			document.getElementById('rem_days').innerHTML = arraylist[3];	
			 
		 }
		//setTimeout('package_upgrade();',10000);
	}
	//alert(doc.responseText);
}



function Valid_Inquiry_paid(frm ,sess)
{
 	//alert(sess);
	var checkFocus=0;
	if(sess==0)
	{
	
	if(frm.name.value=='')
	{	
		
		document.getElementById("name").innerHTML=lang_please_enter_name;
		if(checkFocus!=1)
		{	frm.name.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("name").innerHTML="";
		

	if(frm.email.value=='')
	{	
		document.getElementById("email").innerHTML=lang_please_enter_email_add;
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
			document.getElementById("email").innerHTML=lang_please_enter_valid_email_add;
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
		document.getElementById("mobile").innerHTML=lang_please_enter_10_character_mobile_no;
			if(checkFocus!=1)
			{	frm.mobile.focus();				var checkFocus=1;			}
	}
	
	else 
    if(isNaN(frm.mobile.value))
	{
	document.getElementById("mobile").innerHTML=lang_please_enter_numeric_value;
			if(checkFocus!=1)
			{	frm.mobile.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("mobile").innerHTML="";
		
	}
	
		
	if(frm.subject.value=='')
	{	
		document.getElementById("subject").innerHTML=lang_please_enter_subject;
			if(checkFocus!=1)
			{	frm.subject.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("subject").innerHTML="";
		
	if(frm.message.value=='')
	{	
		document.getElementById("message").innerHTML=lang_please_enter_message;
			if(checkFocus!=1)
			{	frm.message.focus();				var checkFocus=1;			}
	}
	else
		document.getElementById("message").innerHTML="";
		
		
	if(checkFocus==1)
		return false;
	else
		return true;	

}



function formatDate (input) {
  var datePart = input.match(/\d+/g),
  year = datePart[0].substring(), // get only two digits
  month = datePart[1], day = datePart[2];

  return day+'/'+month+'/'+year;
}

function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.innerHTML = limitNum - limitField.value.length;
	}
}

 
function showcats_product(id)
{
	
	ajax();
						//alert(document.getElementById("chk_"+id).checked);
	if(document.getElementById("chks_"+id).checked==true)
	{
		alert(document.getElementById("cats_"+id).value);
	  document.getElementById("cats_"+id).style.display="block";
	  document.getElementById("count_cats").value= parseInt(document.getElementById("count_cats").value)+1;
	  total_check=document.getElementById("count_cats").value;
	//  alert(total_check);
 		if (parseInt(total_check)>limit){
				alert("You can only select a maximum of "+limit+" checkboxes");	
				document.getElementById("chk_"+id).checked=false;
				
		 }
	}
	else
	{
		if (doc)
	   {
		   doc.open("GET", site_url+"/ajax.php?section=show_cats&id="+id, false);   
		   doc.send(null);
	   }	
   //alert(doc.responseText);
	   if(doc.responseText!="")
	   {
		   var ids = doc.responseText.split(",");
			for(var idnum in ids)
			{ 
				
				if(document.getElementById("chks_"+parseInt(ids[idnum])).checked)
					document.getElementById("count_catss").value=parseInt(document.getElementById("count_cats").value)-1;
				 document.getElementById("chks_"+parseInt(ids[idnum])).checked=false;
				 document.getElementById("cats_"+parseInt(ids[idnum])).style.display="none";
				
				
			}

	   }	
 	   document.getElementById("count_cats").value=parseInt(document.getElementById("count_cats").value)-1;
		document.getElementById("cat_"+id).style.display="none";
	}
//	alert(document.getElementById("count_cats").value);
 

} 


function checkboxlimit(checkgroupmain,checkgroup, limit){
    var checkgroup=checkgroup
	var checkgroupmain=checkgroupmain
    var limit=limit
	var main_total=checkgroupmain.length
	var total=checkgroup.length;
	var total_length=main_total+total;
	var main_check
	var sub_check
	
	for (var i=0; i<total_length; i++){
        if (checkgroupmain[i].onchange || checkgroup[i].onclick)
		
		 var check_box=function(){
        var checkedcountmain=0
		  var checkedcount=0
        for (var i=0; i<checkgroupmain.length || i<checkgroup.length; i++)
		 {
            checkedcountmain+=(checkgroupmain[i].checked)? 1 : 0
			checkedcount+=(checkgroup[i].checked)? 1 : 0
		 }
			main_check=checkedcountmain
			
	    }
	 	checkgroup[i].onclick=function(){
        var checkedcount=0
        for (var i=0; i<checkgroup.length; i++)
		{
            checkedcount+=(checkgroup[i].checked)? 1 : 0
		}
			sub_check=checkedcount
	    }
		 
   }		
	var total_check=0
total_check=main_check+sub_check
alert("ASD");
	 for (var i=0; i<total_length; i++)
	 {				
		 if (total_check>limit){
			alert("You can only select a maximum of "+cat_li+" checkboxes")	 
			checkgroupmain[i].checked=false
			checkgroup[i].checked=false
		 }
	 }
}
function productcheckboxlimit(checkgroup, limit){
	var checkgroup=checkgroup
	var limit=limit
	for (var i=0; i<checkgroup.length; i++){
		checkgroup[i].onchange=function(){
		var checkedcount=0
		for (var i=0; i<checkgroup.length; i++)
			checkedcount+=(checkgroup[i].checked)? 1 : 0
		if (checkedcount>limit){
			alert("You can only select a maximum of "+'  ' +limit+'  ' +" Categories")
			this.checked=false
			}
		}
	}
}



function classifiedcheckboxlimit(checkgroup, limit){
	var checkgroup=checkgroup
	var limit=limit
	for (var i=0; i<checkgroup.length; i++){
		checkgroup[i].onchange=function(){
		var checkedcount=0
		for (var i=0; i<checkgroup.length; i++)
			checkedcount+=(checkgroup[i].checked)? 1 : 0
		if (checkedcount>limit){
			alert("You can only select a maximum of "+limit+" Categories")
			this.checked=false
			}
		}
	}
}

function chk_subdomain(sub_domain,frm)
{	
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=chk_subdomain&sub_domain="+sub_domain, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	
	  var arraylist=doc.responseText.split("**");
			var avalable;
			var subdomain;
			subdomain= arraylist[0].trim();
			avalable= arraylist[1];
			 
	/*	 
	document.getElementById("city_change").innerHTML=doc.responseText;
	document.getElementById("city_val").value="";*/
	
	 var checkFocus=0;
	if(avalable==1)
	{
		document.getElementById("sub_domain_id").innerHTML='<br><div class="alert alert-danger">This Sub-domain is Unvailable Please Try another Name.</div>';
		if(frm.sub_domain.value!='')
			frm.sub_domain.focus();
	}
	else
	{	
		if(frm.sub_domain.value==subdomain)
		{
			document.getElementById("sub_domain_id").innerHTML='<br><div class="alert alert-info">This Sub-domain is Available.</div>';
			if(frm.sub_domain.value!='')
				frm.sub_domain.focus();
			return true;
		}
		else
		{
			document.getElementById("sub_domain_id").innerHTML='<br><div class="alert alert-info">Don\'t use any spacial character and space and Only enter Small character.</div>';
			document.getElementById('subvalid').value = arraylist[0];
			if(frm.sub_domain.value!='')
				frm.sub_domain.focus();
			return true;
		}
	}
	if(frm.sub_domain.value=='')
	{
			document.getElementById("sub_domain_id").innerHTML="Please Enter Valid Sub-domain Name.";
				frm.sub_domain.focus();
	}
return false;
}


function chk_subdomain_submit(sub_domain,frm,frm_id)
{	
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=chk_subdomain&sub_domain="+sub_domain+"&frm_id="+frm_id, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	  var arraylist=doc.responseText.split("**");
		var avalable;
		var subdomain;
		subdomain= arraylist[0];
		avalable= arraylist[1];
	 var checkFocus=0;
	document.getElementById('subvalid').value = arraylist[0];
	if(avalable==1)
	{
	document.getElementById("sub_domain_id").innerHTML="This Sub-domain is Unvailable Please Try another Name.";
		if(frm.sub_domain.value!='')
			frm.sub_domain.focus();
		return false;
	}
	
	
}

function select_secoandry_project(primery_name,cus_id)
{	
document.getElementById("select_primery_input").value=primery_name;
	ajax();
	if (doc)
	{
		//site_url+"AjaxCantrollers/count_product?
	   doc.open("GET", site_url+"AjaxCantrollers/select_secoandry_project?primery_name="+primery_name+"&cust_id="+cus_id, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	document.getElementById("secondary_product").innerHTML=doc.responseText;
	//document.getElementById("city_val").value="";
}
function selected_secoandry_project(secondary_name)
{	
document.getElementById("select_secondary_input").value=secondary_name;
}
//==============================================functions use for add product group===========================//
function selec_primery_product(value_sel)
{
	document.getElementById("select_primery_product").value=value_sel;
}

function Valid_primery_add_group(frm)
{
	var checkFocus=0;
	if(frm.primery_product.value=='')
	{	
		document.getElementById("primery_name").innerHTML="<span class='alert'>Please Enter Primery Name.</span>";
		if(checkFocus!=1)
		{	frm.primery_product.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("primery_name").innerHTML="";
	
	
	if(checkFocus==1)
		return false;
	else
		return true;	

}

function Valid_sec_add_group(frm)
{
	var checkFocus=0;
	if(frm.sel_primary_product.value=='')
	{	
		document.getElementById("sel_primery").innerHTML="<span class='alert'>Please Select Primery Name.</span>";
		if(checkFocus!=1)
		{	frm.sel_primary_product.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("sel_primery").innerHTML="";
		
	if(frm.secondary_product.value=='')
	{	
		document.getElementById("secondaryinfo").innerHTML="<span class='alert'>Please Enter Secondary Product Name.</span>";
		if(checkFocus!=1)
		{	frm.secondary_product.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("secondaryinfo").innerHTML="";	
	
	
	if(checkFocus==1)
		return false;
	else
		return true;	


}
/*=============================================function use for popup currencty-======================================*/

function currency_conveter_close()
{	
	document.getElementById("currency_id").style.display="none";	
}


  function currency_conveter()
{	
	/*ajax();
		if (doc)
		{	
			doc.open("GET", "ajax.php?section=popupguest", false);			
			doc.send(null);
		}
		
	  //alert(doc.responseText);
	if(doc.responseText==1)
	  {*/
	  document.getElementById("currency_id").style.display="block"; 
	 /* return false;
	  }
	  else 
	  return true;
	  */
	
 }   
 


/*=============================================function advance form-======================================*/
function show_block_advance_form(show_id)
{	

	if(show_id=='product')
	{
	document.getElementById("product_form").style.display="block";
	document.getElementById("seller_form").style.display="none";
	document.getElementById("buying_request_form").style.display="none";
	}
	if(show_id=='seller')
	{
	document.getElementById("product_form").style.display="none";
	document.getElementById("seller_form").style.display="block";
	document.getElementById("buying_request_form").style.display="none";
	}
	
}
//============================================validation advance search==========================================//
function Valid_advance_search_pro(frm)
{
	
	//alert("gdgfdfgdgfdgdg");
	var checkFocus=0;
	if(frm.adv_search_text.value=='')
	{	
		document.getElementById("text_info").innerHTML="<span class='alert'>Please Enter Search Key.</span>";
		if(checkFocus!=1)
		{	frm.adv_search_text.focus();				
			checkFocus=1;			
		}
	}
	else
		document.getElementById("text_info").innerHTML="";
		
			if(frm.adv_search_text.value=='')
	{	
		document.getElementById("text_info1").innerHTML="<span class='alert'>Please Enter Search Key.</span>";
		if(checkFocus!=1)
		{	frm.adv_search_text.focus();				
			checkFocus=1;			
		}
	}
	else
		document.getElementById("text_info1").innerHTML="";
	
	
	if(checkFocus==1)
		return false;
	else
		return true;	

}

function Valid_advance_search_cus(frm)
{
	var checkFocus=0;
	if(frm.adv_search_text.value=='')
	{	
		document.getElementById("text_info1").innerHTML="<span class='alert'>Please Enter Search Key.</span>";
		if(checkFocus!=1)
		{	frm.adv_search_text.focus();				
		checkFocus=1;			}
	}
	else
		document.getElementById("text_info1").innerHTML="";
	
	
	if(checkFocus==1)
		return false;
	else
		return true;	

}

function Show_package_information(packid)
{	
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=packge_information&packid="+packid, false);   
	   doc.send(null);
	}
	//alert(doc.responseText);
	
	document.getElementById('packge_information').innerHTML="<table border='0' width='100%' align=''><tr><td align='' width='90%'><span style='color:#000;' class=''><h4>Package Information "+packid+"</h4></span></td><td align='right'><img src="+site_url+"/templates/images/converter_close.png  style='cursor:pointer;'  title='Package Information Close' onclick='Close_package_information();' height='15'></td></tr><tr><td colspan='2'><hr><span style='color:#000;' align='justify'>"+doc.responseText+"</span></td></tr></table>";
	document.getElementById('packge_information').style.display="block";
}

function Close_package_information()
{
	document.getElementById('packge_information').style.display="none";
}


//=================================for header search dropdown select====================================//
function selectHeaderSearchIn(type)
{
		
		if(type=='product')
		{
			//alert("xxxxxxxxx");
	   document.getElementById("the-basics0").style.display='block';
	    document.getElementById("the-basics1").style.display='none';
		 document.getElementById("the-basics2").style.display='none';
		 //document.getElementById("the-basics3").style.display='none';
		  document.getElementById("the-basics4").style.display='none';
		}
		
		if(type=='seller')
		{

	   document.getElementById("the-basics0").style.display='none';
	    document.getElementById("the-basics1").style.display='none';
		 document.getElementById("the-basics2").style.display='block';
		// document.getElementById("the-basics3").style.display='none';
		 document.getElementById("the-basics4").style.display='none';
		}
		if(type=='buyer')
		{

	   document.getElementById("the-basics0").style.display='none';
	    document.getElementById("the-basics1").style.display='block';
		 document.getElementById("the-basics2").style.display='none';
		 //document.getElementById("the-basics3").style.display='none';
		 document.getElementById("the-basics4").style.display='none';
		}
		if(type=='service')
		{
						

	   document.getElementById("the-basics0").style.display='none';
	    document.getElementById("the-basics1").style.display='none';
		 document.getElementById("the-basics2").style.display='none';
		// document.getElementById("the-basics3").style.display='block';
		 document.getElementById("the-basics4").style.display='none';
		}
		if(type=='classfied')
		{
						

	   document.getElementById("the-basics0").style.display='none';
	    document.getElementById("the-basics1").style.display='none';
		 document.getElementById("the-basics2").style.display='none';
		// document.getElementById("the-basics3").style.display='none';
		 document.getElementById("the-basics4").style.display='block';
		}
}
function search_filter_form_submit()
{
	document.getElementById("search-filters").submit();
}
 
 function search_country()
{
	//alert('xxxxxxxx');
	document.getElementById("country_search").submit();
}


//==============================valid requirement function==============-->

function valid_requirement(frm)
{
	var checkFocus=0;
	var form = document.getElementById(frm);
	if(form.product_name.value=='')
	{	
		document.getElementById("alert_procut").innerHTML="<span class='err-alert'>Please Enter Product/Service Title.</span>";
		if(checkFocus!=1)
		{	form.product_name.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("alert_procut").innerHTML="";
		
		if(form.company_name.value=='')
	{	
		document.getElementById("alert_company_name").innerHTML="<span class='err-alert'>Please Enter Company Name.</span>";
		if(checkFocus!=1)
		{	form.company_name.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("alert_company_name").innerHTML="";
		
		if(form.details.value=='')
	{	
		document.getElementById("alert_details").innerHTML="<span class='err-alert'>Please Enter Detail.</span>";
		if(checkFocus!=1)
		{	form.details.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("alert_details").innerHTML="";
		if(form.email.value=='')
	{	
		document.getElementById("alert_email").innerHTML="<span class='err-alert'>Please Enter Email.</span>";
		if(checkFocus!=1)
		{	form.email.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("alert_email").innerHTML="";
		
		if(form.estimated_quantity.value=='')
	{	
		document.getElementById("alert_estimated_quantity").innerHTML="<span class='err-alert'>Please Enter Estimated Quantity.</span>";
		if(checkFocus!=1)
		{	form.estimated_quantity.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("alert_estimated_quantity").innerHTML="";
		
		if(form.valid_rqfs.value=='')
	{	
		document.getElementById("alert_valid_rqfs").innerHTML="<span class='err-alert'>Please Select Valid Days.</span>";
		if(checkFocus!=1)
		{	form.valid_rqfs.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("alert_valid_rqfs").innerHTML="";
		
	if(form.name.value=='')
	{	
		document.getElementById("alert_name").innerHTML="<span class='err-alert'>Please Enter Full Name.</span>";
		if(checkFocus!=1)
		{	form.name.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("alert_name").innerHTML="";
	if(form.mobile.value=='')
	{	
		document.getElementById("alert_mobile").innerHTML="<span class='err-alert'>Please Enter Mobile Number.</span>";
		if(checkFocus!=1)
		{	form.mobile.focus();				checkFocus=1;			}
	}
	else
		document.getElementById("alert_mobile").innerHTML="";
		
	//alert(document.getElementById("cpcode").value);
	if(document.getElementById("cpcode").value=='')
	{	
	
		document.getElementById("alert_security").innerHTML="<div class='red' ><div class='err-alert'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Error ! </strong> Please Enter Capthca Code </div></div>";
			if(checkFocus!=1)
			{	
				document.getElementById("cpcode").focus();				
				var checkFocus=1;
			}
	}
	// else
	// {
		
	// 	ajax();
	// 		if (doc){
	// 		   doc.open("GET", site_url+"/ajax.php?section=get_capcha&security_code="+document.getElementById("cpcode").value, false);
	// 			doc.send(null);
	// 		   }
	// 		// alert(doc.responseText); 
	
	// 	   if(doc.responseText==0)
	// 	   {	
		   		
	// 	   		document.getElementById("alert_security").innerHTML="<span class='alert_bold red' style='color:#F00'>Please enter correct Capcha Code.</span>";	
	// 			document.getElementById("cpcode").focus();
	// 			var	 checkFocus=1;
	// 	   }
	// 	   else
	// 	   	document.getElementById("alert_security").innerHTML="<br>";	
	
	// }
	
	
	
	
	
	
	
		
	
	
		
	
	
	if(checkFocus==1)
		return false;
	else
		return true;	
}


function search_chekbox_image(select_search_type)
{

	//alert(select_search_type);
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=search_chekbox_image&select_search_type="+select_search_type, false);   
	   doc.send(null);
	}
	
	alert(doc.responseText);
	
	document.getElementById("search_id").innerHTML=doc.responseText;
}

//===================set setDateApprovedForRequirementList ====================//
function setDateApprovedForRequirementList(sel_value)
{
	document.getElementById('sel_date_approved').value=sel_value;
	document.getElementById('search_valid_date').submit();
}

/*******Pagination start*********/
 function callpage(page)
 {
	
	 document.getElementById("pagevalid").value=page;
 }
  /*******Pagination end*********/
function show_hide_registration(val)
{
	
	if(val=='P')
	{
		document.getElementById('company_name').style.display='none';
		document.getElementById('nature_of_business').style.display='none';
		document.getElementById('name1').style.display='none';
		document.getElementById('name').style.display='block';
		
		
		}
	else
	{
		document.getElementById('company_name').style.display='block';
		document.getElementById('nature_of_business').style.display='block';
		document.getElementById('name1').style.display='block';
		document.getElementById('name').style.display='none';
		
		
		}
}



function show_categories(val)
{
	if(val=='sell')
	{
		document.getElementById('sell_cat_drop').style.display='block';
		document.getElementById('service_cat_drop').style.display='none';
		
		
		}
	else
	{
		document.getElementById('service_cat_drop').style.display='block';
		document.getElementById('sell_cat_drop').style.display='none';
		
		
		
		}
}


function get_path(val)
{
    
	 document.getElementById('file_path').value= val;
}

function view(val)
{
    if (val=='1')
	 document.getElementById('view').innerHTML='<a href="'+site_url+'/trade_lead_buy.html" class="btn btn-default btn-large">See More buy ...</a>'
	else
	  document.getElementById('view').innerHTML='<a href="'+site_url+'/trade_lead_sell.html" class="btn btn-default btn-large">See More sell ...</a>'
}

function show_value_input(val)
{
    document.getElementById('input_box').value=val;
}

function onLoadWatingPoupupOpen()
{
		//alert("xxxxxxxxx");
		$('#myPleaseWait').modal({
			 backdrop: 'static',
			});
}
function onLoadWatingPoupupClose()
{
		//alert("xxxxxxxxx");
		$('#myPleaseWait').modal('hide');
}
function activeUserAlerdyExitsYesOrnot(sel_val)
{
	if(sel_val=='Y')
	{
		document.getElementById('alerdy_user_yes').style.display="block";
		document.getElementById('alerdy_user_no').style.display="none";
	}
	else
	{
		document.getElementById('alerdy_user_yes').style.display="none";
		document.getElementById('alerdy_user_no').style.display="block";
	}
}

function state_select_change_list(used_country)
{ 
//document.getElementById("country_value").value=used_country;
	ajax();
	if (doc)
	{ 
	   doc.open("GET", site_url+"/ajax.php?section=country_select_change_list&used_country="+used_country, false);   
	   doc.send(null);
	}
	 //alert(doc.responseText);
	document.getElementById("state_dropdown").innerHTML=doc.responseText;
}


 function state_selected_list(used_state)
{
	//document.getElementById("state_value").value=used_state;
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=state_select_change_list&used_state="+used_state, false);   
	   doc.send(null);
	}
//alert(doc.responseText);
	document.getElementById("city_dropdown").innerHTML=doc.responseText;
}
function getSubCategoryDropdown(parent_id)
 {
	 ajax();
		if (doc)
		{ 	  
		   doc.open("GET", site_url+"/ajax.php?section=getSubCategoryDropdown&parent_id="+parent_id, false);   
		   doc.send(null);
		}
	  // alert(doc.responseText);
	  var explode_dropdown=doc.responseText.split("//");;
	  
	   document.getElementById('sub_cat_dropdown').innerHTML=explode_dropdown[0];
	 
  	 
 }
 function getSubCategoryDropdown_fortype(parent_id)
 {
	// alert(parent_id);
	 ajax();
		if (doc)
		{ 	  
		   doc.open("GET", site_url+"/ajax.php?section=getSubCategoryDropdown_fortype&parent_id="+parent_id, false);   
		   doc.send(null);
		}
		
		 //alert(doc.responseText);
		
	 document.getElementById('type_dropdown').innerHTML=doc.responseText;
	 
	 /*
	 
	 if (doc)
		{ 	  
		   doc.open("GET", site_url+"/ajax.php?section=getAttributeFormForAddProduct&parent_id="+parent_id, false);   
		   doc.send(null);
		}
	  // alert(doc.responseText);
	 
	  	document.getElementById("master_attribute_form").innerHTML=doc.responseText;
	 
	  */
  	 
 }
 
 function get_type_attribute(type_id)
 {
	//alert(type_id);
	 ajax();
		if (doc)
		{ 	  
		   doc.open("GET", site_url+"/ajax.php?section=getAttributeFormForAddProducttype&type_id="+type_id, false);   
		   doc.send(null);
		}
	 // alert(doc.responseText);
	 
	  	document.getElementById("type_attribute_form").innerHTML=doc.responseText;

	  // document.getElementById('type_dropdown').innerHTML=doc.responseText;
	  // document.getElementById('type_dropdown').innerHTML=explode_dropdown[1];
	//document.getElementById("prop_subcate_list_rent").innerHTML=doc.responseText;
	//document.getElementById("prop_cate_val").value="";
  	 
 }
 
 
  function filtter_attribute()
 {
	
	
	document.getElementById("filter_from").submit();
		
  	 
 }
 
  function filtter_attributefortype(val)
 {
	//document.getElementById("filter_type_id").value=val;
	
	document.getElementById("filter_from").submit();
		
  	 
 }
 /*function get_attribute(type_id)
 {
	//alert(type_id);
	 ajax();
		if (doc)
		{ 	  
		   doc.open("GET", site_url+"/ajax.php?section=getAttributeFormForAddProduct&type_id="+type_id, false);   
		   doc.send(null);
		}
	  // alert(doc.responseText);
	 
	  	document.getElementById("master_attribute_form").innerHTML=doc.responseText;

	  // document.getElementById('type_dropdown').innerHTML=doc.responseText;
	  // document.getElementById('type_dropdown').innerHTML=explode_dropdown[1];
	//document.getElementById("prop_subcate_list_rent").innerHTML=doc.responseText;
	//document.getElementById("prop_cate_val").value="";
  	 
 }*/
 function getSubCategoryDropdownCategoriesforseller(parent_id)
 {
	 alert(parent_id);
	 ajax();
		if (doc)
		{ 	  
		   doc.open("GET", site_url+"/ajax.php?section=getSubCategoryDropdownCategoriesforseller&parent_id="+parent_id, false);   
		   doc.send(null);
		}
	  // alert(doc.responseText);
	  var explode_dropdown=doc.responseText.split("//");;
	  
	   document.getElementById('sub_cat_dropdown').innerHTML=explode_dropdown[0];   			getSubNextCategoryDropdownCategoriesforseller('');
	   document.getElementById('type_dropdown').innerHTML=explode_dropdown[1];
	     //document.getElementById('select_next_sub_catgory').innerHTML=explode_dropdown[2];
	//document.getElementById("prop_subcate_list_rent").innerHTML=doc.responseText;
	//document.getElementById("prop_cate_val").value="";
  	; 
 }
 
 
 function getSubCategoryDropdownCategories(parent_id)
 { 
   
	 //alert(parent_id);
	 ajax();
		if (doc)
		{ 	  
		   doc.open("GET", site_url+"/ajax.php?section=getSubCategoryDropdownCategories&parent_id="+parent_id, false);   
		   doc.send(null);
		}
	   //alert(doc.responseText);
	  var explode_dropdown=doc.responseText.split("//");
	  
	   document.getElementById('sub_cat_dropdown').innerHTML=explode_dropdown[0];
	  // document.getElementById('next_sub_cat_dropdown').innerHTML=explode_dropdown[1];
	     //document.getElementById('select_next_sub_catgory').innerHTML=explode_dropdown[2];
	//document.getElementById("prop_subcate_list_rent").innerHTML=doc.responseText;
	//document.getElementById("prop_cate_val").value="";
  	
	 
 }
 
  function getSubNextCategoryDropdownCategories(parent_id)
 {
	// alert(parent_id);
	// alert(cat_id);
	 ajax();
		if (doc)
		{ 	  
		   doc.open("GET", site_url+"AjaxCantrollers/getSubNextCategoryDropdownCategories?parent_id="+parent_id, false);   
		   doc.send(null);
		}
	   //alert(doc.responseText);
	  var explode_dropdown=doc.responseText.split("//");;
	   // document.getElementById('sub_cat_dropdown').innerHTML=explode_dropdown[0];
	   document.getElementById('select_next_sub_catgory').innerHTML=explode_dropdown[0];
	 //  document.getElementById('type_dropdown').innerHTML=explode_dropdown[1];
	  
	//document.getElementById("prop_subcate_list_rent").innerHTML=doc.responseText;
	//document.getElementById("prop_cate_val").value="";
  	 
 }
  function getSubNextCategoryDropdownCategoriesforseller(parent_id)
 {
	// alert(parent_id);
	// alert(cat_id);
	 ajax();
		if (doc)
		{ 	  
		   doc.open("GET", site_url+"/ajax.php?section=getSubNextCategoryDropdownCategoriesforseller&parent_id="+parent_id, false);   
		   doc.send(null);
		}
	   //alert(doc.responseText);
	  var explode_dropdown=doc.responseText.split("//");;
	   // document.getElementById('sub_cat_dropdown').innerHTML=explode_dropdown[0];
	   document.getElementById('select_next_sub_catgory').innerHTML=explode_dropdown[0];
	 //  document.getElementById('type_dropdown').innerHTML=explode_dropdown[1];
	  
	//document.getElementById("prop_subcate_list_rent").innerHTML=doc.responseText;
	//document.getElementById("prop_cate_val").value="";
  	 
 }
 
 
 
 function onClickAlertMessageOpen() 
{
	//alert("YYYYYYYYYYYYYYYYYYYYYYYYYYY");
		//alert("xxxxxxxxx");
		$('#alert_messages_popup').modal({
			 backdrop: 'static',
			});
}
function onClickAlertMessageClose()
{
		//alert("xxxxxxxxx");
		$('#alert_messages_popup').modal('hide');
}



function getVelidetion(frm)
{
	var checkFocus=0;

		if(document.getElementById("production_capacity").value=='')
		{
			document.getElementById("alert_production_capacity").innerHTML="<span class='alert'>Please production capacity</span>";
			if(checkFocus!=1)
			{	document.getElementById("production_capacity").focus();				
			var checkFocus=1;			
			}
		}	
		else 
			document.getElementById("alert_production_capacity").innerHTML="";
		
			
		
	if(checkFocus==1)
	{
		onLoadWatingPoupupClose();
		return false;
	}
	else
	
	{
		
		
		return true;		
		
		}
				

}


function submit_reg(val)
{	
	
	document.getElementById('package_id').value=val;
	
	document.getElementById("add_classified_form").submit();
	}

/*function send_mail()
{
	alert('xxxxxxxxx');

	var checkFocus=0;
	var sender_name=document.getElementById("name").value;
		alert();
	var sender_mobile=document.getElementById("mobile").value;
	var sender_email=document.getElementById("email").value;
	var subject=document.getElementById("subject").value;
	var message=document.getElementById("message").value;
	
	var seller_id=document.getElementById("seller_id").value;
	var pro_id=document.getElementById("pro_id").value;
	
	var type=document.getElementById("type_id").value;
	
	
	
	
	if(document.getElementById("name").value=='')
	{	
		document.getElementById("name").style.borderColor='red';
		if(checkFocus!=1)
		{	document.getElementById("name").focus();				checkFocus=1;			}
	}
	else
		document.getElementById("name").style.borderColor='';
		
		if(document.getElementById("mobile").value=='')
	{	
		document.getElementById("mobile").style.borderColor='red';
		if(checkFocus!=1)
		{	document.getElementById("mobile").focus();				checkFocus=1;			}
	}
	else
		document.getElementById("mobile").style.borderColor='';
		
		if(document.getElementById("email").value=='')
	{	
		document.getElementById("email").style.borderColor='red';
		if(checkFocus!=1)
		{	document.getElementById("email").focus();				checkFocus=1;			}
	}
	else
		document.getElementById("email").style.borderColor='';
		
		
		
		if(document.getElementById("subject").value=='')
	{	
		document.getElementById("subject").style.borderColor='red';
		if(checkFocus!=1)
		{	document.getElementById("subject").focus();				checkFocus=1;			}
	}
	else
		document.getElementById("subject").style.borderColor='';
		
		if(document.getElementById("message").value=='')
	{	
		document.getElementById("message").style.borderColor='red';
		if(checkFocus!=1)
		{	document.getElementById("message").focus();				checkFocus=1;			}
	}
	else
		document.getElementById("message").style.borderColor='';
		
		
		
	
	
		
	
	
	if(checkFocus==1)
		{
			}
	else
	{
	//alert("xxxxxxxxx");
		
	ajax();
	if (doc)
	{
	   doc.open("GET", site_url+"/ajax.php?section=send_mail&sender_name="+sender_name+"&sender_email="+sender_email+"&sender_mobile="+sender_mobile+"&subject="+subject+"&message="+message+"&seller_id="+seller_id+"&pro_id="+pro_id+"&type="+type_id, false);   
	   doc.send(null);
	}
	
	//alert(doc.responseText);
	//alert('Product Enquiry Send Successfully');
	document.getElementById("messsage").innerHTML='Product Enquiry Send Successfully';
	}
}*/
// ===================map functions====================


 function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: lata, lng: lang}
        });
        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

        
          geocodeLatLng(geocoder, map, infowindow);
       
      }
	
	
function captchaValid(val)
{
	

		ajax();
			if (doc){
			   doc.open("GET", site_url+"/ajax.php?section=get_capcha&security_code="+document.getElementById("cpcode").value, false);
				doc.send(null);
			   }
			//  alert(doc.responseText);
	
		   if(doc.responseText==0)
		   {	
		   		
		   		document.getElementById("alert_security").innerHTML="<span class='alert'>Please enter correct Capcha Code.</span>";	
				document.getElementById("cpcode").focus();
				var	 checkFocus=1;
		   }
		   else
		   	document.getElementById("alert_security").innerHTML="<br>";	
	/**/
	
	
}

      function geocodeLatLng(geocoder, map, infowindow) {
       /* var input = document.getElementById('latlng').value;
        var latlngStr = input.split(',', 2);*/
        var latlng = {lat: parseFloat(lata), lng: parseFloat(lang)};
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              map.setZoom(11);
              var marker = new google.maps.Marker({
                position: latlng,
                map: map
              });
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }