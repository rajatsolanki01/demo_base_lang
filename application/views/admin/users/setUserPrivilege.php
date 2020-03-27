<br />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
<div class="panel panel-default">
  <div class=" panel-heading clearfix"><h2 class="page-header">Set User Privilege</h2></div>
      <div class="panel panel-default">
                      <div class="panel-body">
                            <div class="table-responsive">
                             <form class="stdform" method="post" action="" name="add_user" enctype="multipart/form-data">
                             	<div class="form-group">
                                   <label>Select Staff</label>
			                       <?php getCustomerDropdown();?>
                                   <span id="alert_customer" class="alert"></span>
                                </div>
                                <div id="privilage_table">
                            	<table class="table table-striped table-bordered table-hover">
                                	
                                	<thead>
                                    	<tr>
                                        	<td><?= $this->lang->line('lang_sr_no');?></td>
                                            <td><?= $this->lang->line('lang_privilege_name');?></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($privilege_details){
                                      $num=1;
                                    	foreach($privilege_details as $data){?>
                                    	<tr>
                                        	<td><?= $num++;?></td>
                                            <td><?= $data->privilege_name;?></td>
                                          
                                        </tr>
                                        <?php }?>
                                    <?php }?>    
                                    </tbody>
                                </table>
                             </div>   
                             </form>     
                            </div>
                      </div>
                  </div>      
                   
       
 </div>
    <script type="text/javascript">
 function setUserPrivilageOnOff(select_id)
{
    var customer_id =  $("#select_customer").val();
    var privilage_val=$('#onoff_check_box_'+select_id).is(':checked');
    var privilage_id=select_id;
    
  $.ajax({
      type: "POST",
      url: "UserPrivilageSet",
      Type: "POST",
      data:{customer_id:customer_id,privilage_val:privilage_val,privilage_id:privilage_id},
      success:function(data){
       
      }
    });
}
</script>