<div class="container" >
  <div  class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <h1><?= $this->lang->line('49_oth_lang');?></h1>
    <h3 style="color:red; font-size:12px;" align="center"><?php echo $msg;?></h3>
    <form name="forgot_form" method="post" action="<?= base_url('forgot.html');?>">
      <div class="content">
          <table class="table">
            <tbody>
              <tr class="odd">
                <td><span class="required">*</span> <?= $this->lang->line('103_oth_lang');?>:</td>
                <td><input type="email" class="form-control" name="email" value="<?= set_value('email');?>" /></td></tr>
                <tr class="odd">                
                <span id="email" style="color: red"><?= form_error('email');?></span></tr>
                <tr class="odd">
                <td> <input type="submit" name="submit" value="<?= $this->lang->line('821_oth_lang');?>" class="btn btn-danger"></td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </form>
  </div>
</div>

