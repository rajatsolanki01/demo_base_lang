function select_state(country)
{  
$.ajax({
    url:base_url+"state",
    type:'post',
    data:{country:country},
    dataType:"json",
    success:function(data){
    	$("#state_change select").remove();
        $("#city option").remove();
        $("#city").append('<option value="" selected="selected" class="le-input">Select City</option></select></span>');
        $("#state_change").append(data);   
    }
})
}
 
function select_city(state)
{  
$.ajax({
    url:base_url+"city",
    type:'post',
    data:{state:state},
    dataType:"json",
    success:function(data){
    	$("#city_change select").remove();
     $("#city_change").append(data);   
    }
})
}

$(document).on('click','#refresh_captcha',function(){
    
    $.ajax({
        url:base_url+'reload_captcha',
        type:'post',
        data:{},
        success:function(data)
        {
            $("#captcha").html(data);
        }
    })

});

/*=====for slider======*/
$(document).ready(function() {
      var owl = $('#ab');
      owl.owlCarousel({
        items: 5,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        rtl:false,
      });

    });



    $(document).ready(function() {
      var owl = $('#new_1');
      owl.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        rtl:false,
      });

    });

    $(document).ready(function() {
      var owl = $('#new_2');
      owl.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        rtl:false,
      });

    });

    $(document).ready(function() {
      var owl = $('#new_3');
      owl.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        rtl:false,
      });

    });



    $(document).ready(function() {
      var owl = $('#new_5');
      owl.owlCarousel({
        items: 5,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        rtl:false,
      });

    });

function getSubCategoryDropdownCategory(parent_id)
{  
    
$.ajax({
    url:base_url+"AjaxCantrollers/getSubCategoryDropdown",
    type:'post',
    data:{parent_id:parent_id},
    dataType:"html",
    success:function(data){
        $("#sub_cat_dropdown select").remove();
		$("#sub_cat_dropdown").append(data);
        $("#next_sub_cat_dropdown option").remove();
        $("#next_sub_cat_dropdown").append('<option value="" selected="selected" class="le-input">Please Select</option></select></span>');
           
    }
})
}

function getSubNextCategoryDropdown(parent_id)
{  
    
$.ajax({
    url:base_url+"AjaxCantrollers/getSubNextCategoryDropdown",
    type:'post',
    data:{parent_id:parent_id},
    dataType:"html",
    success:function(data){
        $("#next_sub_cat_dropdown select").remove();
        $("#next_sub_cat_dropdown").append(data);   
    }
})
}

function getSubCategoryDropdown1(parent_id)
 { 

    $.ajax({
    url:base_url+"AjaxCantrollers/getSubCategoryDropdowndata",
    type:'GET',
    data:{parent_id:parent_id},
    success:function(data)
    {
        $("#sub_cat_dropdown select").remove();
		$("#sub_cat_dropdown").append(data);
        $("#next_sub_cat option").remove();
        $("#next_sub_cat").append('<option value="" selected="selected" class="le-input">Please Select</option></select></span>');
           
    }
    })
     
 }
 function getSubnextdropdowntype(parent_id)
  { //alert (123);
    $.ajax({
    url:base_url+"AjaxCantrollers/getSubnextdropdown",
    type:'GET',
    data:{parent_id:parent_id},
    success:function(data)
    {
        //alert(data);
        $("#select_next_sub_catgory select").remove();//$("#type_dropdown select").remove();
        $("#select_next_sub_catgory").append(data);//$("#type_dropdown").append(data);      
    }
    })
     
 }
// 
// function getSubCategoryDropdownCategoriesforseller(parent_id)
// {	
//	 $.ajax({
//	url:base_url+"AjaxCantrollers/getSubCategoryDropdown",
//	type:'post',
//	data:{parent_id:parent_id},
//	dataType:"json",
//	success:function(data){
//        $("#sub_cat_dropdown select").remove();
//        $("#next_sub_cat_dropdown option").remove();
//        $("#next_sub_cat_dropdown").append('<option value="" selected="selected" class="le-input">Please Select</option></select></span>');
//        $("#sub_cat_dropdown").append(data);   
//    }
//})
//	
// }


function check_subdomain(sub_domain,frm)
  { 
     if(frm.sub_domain.value=='')
    {
            document.getElementById("sub_domain_id").innerHTML="Please Enter Valid Sub-domain Name.";
                frm.sub_domain.focus();
    }
    else
    {

         $.ajax({
    url:base_url+"AjaxCantrollers/chkSubdomain",
    type:'POST',
    data:{sub_domain:sub_domain},
    success:function(data)
    {
        // alert(data);         
    
         var arraylist=data.split("**");
            var avalable;
            var subdomain;
            subdomain= arraylist[0].trim();
            avalable= arraylist[1];
             
    
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
        }
        }); 
  } 
return false;
     
 }

//  function chk_subdomain_submit(sub_domain,frm,frm_id)
// {   
//      $.ajax({
//     url:base_url+"AjaxCantrollers/chkSubdomain",
//     type:'POST',
//     data:{sub_domain:sub_domain,frm_id:frm_id},
//     success:function(data)
//     {
//         // alert(data);         
    
//          var arraylist=data.split("**");
//             var avalable;
//             var subdomain;
//             subdomain= arraylist[0].trim();
//             avalable= arraylist[1];
             
//             var checkFocus=0;
//             document.getElementById('subvalid').value = arraylist[0];
//     if(avalable==1)
//     {
//          document.getElementById("sub_domain_id").innerHTML="This Sub-domain is Unvailable Please Try another Name.";
//             if(frm.sub_domain.value!='')
//             frm.sub_domain.focus();
//              return false;
//     }
    
    
// }
// });
// }
    function userPrivilage(customer_id) 
    {
        $.ajax({
        url:base_url+"UserPrivilage",
        type:'POST',
        data:{customer_id:customer_id},
        success:function(data)
        {
            $("#privilage_table table").remove();
            $("#privilage_table").append(data);           
        }
        })
    }
    function getSubCategoryDropdown(parent_id)
    {
        $.ajax({
        url:base_url+"AjaxCantrollers/CgetSubCategoryDropdown",
        type:'GET',
        data:{parent_id:parent_id},
        success:function(data)
        {
      var explode_dropdown=data.split("//");;
      
       document.getElementById('sub_cat_dropdown').innerHTML=explode_dropdown[0];         
        }
        });
     
     
     
    }
     function filtter_attributefortype(val)
    {    
        document.getElementById("filter_from").submit();
    }
   
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






