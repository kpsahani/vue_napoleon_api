<?php echo $header; ?>
<?php echo $leftmenu; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h2>
            <?php echo ucfirst($this->uri->segment(2)); ?> General <?php echo ucfirst($this->uri->segment(1)); ?>
            <small></small>
            
        </h2>
<!--        <ol class="breadcrumb pull-left">
            <li class="pull-left"><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url($this->uri->segment(1)); ?>"><i class="fa fa-cog"></i> <?php echo ucfirst($this->uri->segment(1)); ?></a></li>
            <?php if($this->uri->segment(2)){?><li><a href="<?php echo base_url($this->uri->segment(3)); ?>"> <?php echo ucfirst($this->uri->segment(2)); ?></a></li><?php }?>
        </ol>-->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php if ($this->session->flashdata('message')) { ?>
                    <!--  start message-red -->
                    <div class="box-body">
                        <div class=" alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            <?php echo $this->session->flashdata('message'); ?> 
                        </div>
                    </div>
                    <!--  end message-red -->
                <?php } ?>
                <?php if ($this->session->flashdata('success')) { ?>
                    <!--  start message-green -->
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>	<i class="icon fa fa-check"></i> Success!</h4>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <!--  end message-green -->
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <?php
                    $attributes = array('class' => 'has-validation-callback', 'id' => 'frmdesti', 'method' => 'post');
                    echo form_open_multipart('setting/update/', $attributes);
                    ?>
                    <?php echo form_input(array('name' => 'settingid', 'type' => 'hidden', 'value' => base64_encode($settings[0]['settingid']))); ?>
                    <?php echo form_input(array('name' => 'settingname', 'type' => 'hidden', 'value' => $settings[0]['settingname'])); ?>

                    <div class="box-body">
                        <div class="col-md-6">
                        <div class="form-group">
                            
                            <div class="form-group" id="firstnameerror">
                                <label><?php echo $settings[0]['settingname']; ?></label>
                                <div class="controls">
                                    <?php if(($settings[0]['settingid'] == 1) || ($settings[0]['settingid'] == 2) || ($settings[0]['settingid'] == 6)){ ?>
                                    <input name="settingvalue" data-validation="required" data-validation-error-msg="Please enter value." id="settingvalue" type="text" class="form-control" value="<?php echo $settings[0]['settingvalue']; ?>" />
                                    <?php }if($settings[0]['settingid'] == 10){ ?>
                                    
                                    <table>
                                        <tr>
                                            <td> <input name="home_image" data-validation="required mime size" 
                                               data-validation-allowing="jpeg, png, jpg"
                                               data-validation-max-size="2048kb"
                                               data-validation-error-msg-mime="Only .jpg, .jpeg or .png file can be upload"
                                               data-validation-error-msg-size="Image size must be less than 2MB"
                                               data-validation-error-msg-required="Please select file up to 2MB in size only."
                                               id="home_image" type="file" 
                                               class=""  /></td>
                                            <td><img width="100" height="100" src="<?php echo base_url().$this->config->item('home_image_upload_path').$settings[0]['settingvalue']; ?>" /></td>
                                        </tr>
                                    </table>
                                      
                                       
                                  
                                
                                    <?php }
                                    if(($settings[0]['settingid'] == 7) || ($settings[0]['settingid'] == 8) || ($settings[0]['settingid'] == 9)){ ?>

<input name="settingvalue" data-validation="required length" data-validation-length='0-100' data-validation-error-msg="Please enter value." id="settingvalue" type="text" class="form-control" value="<?php echo $settings[0]['settingvalue']; ?>"  maxlength='100' style="width:830px !important"  />
<label>  (<span id="address-max-length">100</span> characters left)</label>
                                    
                                    <?php }?>
<?php 
                                    if(($settings[0]['settingid'] == 11)){ ?>
                                    <textarea name="settingvalue" data-validation="required" data-validation-error-msg="Please enter value." id="settingvalue" type="text" class="form-control" rows='5' maxlength='300'  ><?php echo $settings[0]['settingvalue']; ?> </textarea>
                                    <?php }?>
                                </div>
                            </div>
                            
                            <script>
                                $.validate({
                                    modules: 'location, date, security, file',
                                    onModulesLoaded: function() {
                                    }
                                });
                            </script>
                        </div><!-- /.box-body -->
                        
                        <div class="box-footer">
                            <input type="submit" name="add" value="Update" class="btn btn-primary btn-small" />
                            <input type="button" class="btn btn-default btn-small" value="Back" onclick="window.location.href = '<?php echo site_url('setting'); ?>'"/>
                        </div>
                        </div>
                        <?php echo form_close(); ?> 
                    </div><!-- /.box -->

                </div><!--/.col (left) -->
            </div>   <!-- /.row -->

        </div>

            <?php echo $footer; ?>
<script>

$('#settingvalue').restrictLength( $('#address-max-length') );
</script>
     <script>
            $("#add").keypress(function(event) {
    if (event.which == 13) {        
        return false;
    }

});
        </script>
