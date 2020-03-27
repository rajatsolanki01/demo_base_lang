<?php
if(SUBDOMAIN !='')
{
  $classname = "arb_country";
}
else
{
  $classname = "form-control";
}
//echo $this->session->userdata('data_update_lang');
?>

<select class="<?= $classname;?>" name="lang_update_data_dp" onchange="langchange2(this.value);">
    <option <?php if($this->session->userdata('data_update_lang')=='english'){?> selected="selected"<?php }?> value="english">English</option>
    <option <?php if($this->session->userdata('data_update_lang')=='arabic'){?> selected="selected"<?php }?> value="arabic">Arabic</option>
    <option <?php if($this->session->userdata('data_update_lang')=='chinese'){?> selected="selected"<?php }?> value="chinese">Chinese</option>
</select>

<script type="text/javascript">
	function langchange2($value)
	{
		$.ajax({
      type: "POST",
      url: base_url+"SetUpdatelanguage",
      Type: "POST",
      data:{lang:$value},
      success:function(data){
      location.reload(); 
      }
    });
	}
</script>
