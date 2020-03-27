<?php
if(SUBDOMAIN !='')
{
  $classname = "arb_country";
}
else
{
  $classname = "form-control";
}
?>

<select class="<?= $classname;?>" name="l_type_v" onchange="langchange(this.value);">
    <option <?php if($this->session->userdata('user_lang')=='english'){?> selected="selected"<?php }?> value="english">English</option>
    <option <?php if($this->session->userdata('user_lang')=='arabic'){?> selected="selected"<?php }?> value="arabic">Arabic</option>
    <option <?php if($this->session->userdata('user_lang')=='chinese'){?> selected="selected"<?php }?> value="chinese">Chinese</option>
</select>

<script type="text/javascript">
	function langchange($value)
	{
		$.ajax({
      type: "POST",
      url: base_url+"Setlanguage",
      Type: "POST",
      data:{lang:$value},
      success:function(data){ //alert (data);
      location.reload(); 
      }
    });
	}
</script>
