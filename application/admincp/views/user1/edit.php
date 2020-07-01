<?php echo $header; ?>
<?php echo $leftmenu; ?>
<base href="<?php echo base_url('user'); ?>">
<!-- Content Wrapper. Contains user content -->
<div class="content-wrapper">
    <section class="content-header">
        <h2>
            <?php echo ucfirst($this->uri->segment(2)); ?>
            <?php echo ucfirst($this->uri->segment(1)); ?>
        </h2>
        <!--        <ol class="breadcrumb pull-left">
                    <li class="pull-left"><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="<?php echo base_url($this->uri->segment(1)); ?>"><i class="fa fa-cog"></i> <?php echo ucfirst($this->uri->segment(1)); ?></a></li>
        <?php if ($this->uri->segment(2)) { ?><li><a href="<?php echo base_url($this->uri->segment(3)); ?>"> <?php echo ucfirst($this->uri->segment(2)); ?></a></li><?php } ?>
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
                    echo form_open_multipart('user/update/', $attributes);
                    ?>
                    <?php echo form_input(array('name' => 'userid', 'type' => 'hidden', 'value' => base64_encode($users[0]['userid']))); ?>


                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="row">
                                <div class="form-group col-md-6" id="firstnameerror">
                                    <label>Name</label>&nbsp <span style="color: #a94442;">*</span>
                                    <div class="controls">
                                        <input name="name" data-validation="required" data-validation-error-msg="Please enter your name." id="settingvalue" type="text" class="form-control" value="<?php echo $users[0]['name']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group col-md-6" id="firstnameerror">
                                    <label>Email</label>&nbsp<span style="color: #a94442;">*</span>
                                    <div class="controls">
                                        <input name="useremail" data-validation="email required server" data-validation-url="user/email_exist/<?php echo base64_encode($users[0]['userid']); ?>" data-validation-error-msg="Please enter valid email." id="settingvalue" type="text" class="form-control" value="<?php echo $users[0]['email']; ?>" />
                                    </div>
                                </div>
                                
                                </div>
                                <div class="row">
                                    
                                
                                
                                <div class="form-group col-md-4" id="firstnameerror">
                                    <label>Profile Image</label>&nbsp<span style="color: #a94442;">*</span>
                                    <div class="controls">
                                        <input name="profile_image" data-validation="mime size" 
                                               data-validation-optional="true"
                                               data-validation-allowing="jpeg, png, jpg"
                                               data-validation-max-size="2048kb"
                                               data-validation-error-msg-mime="Only .jpg, .jpeg or .png file can be upload"
                                               data-validation-error-msg-size="Image size must be less than 2MB"
                                               data-validation-error-msg-required="Please select .jpg, .jpeg and .png file size up to 2MB only."
                                               id="settingvalue" type="file" 
                                               class=""  />
                                        <input type="hidden" name="old_profile_image" value="<?php echo $users[0]['profile_image']; ?>" />
                                    </div>
                                </div> 
                                </div>
                                
                                <div class="row">
                              <!--  <div class="form-group col-md-12" id="firstnameerror">
                                    <label>Address</label>&nbsp<span style="color: #a94442;">*</span>
                                    <div class="controls">
                                        <?php // echo form_textarea('address', $users[0]['address'], 'rows="5" style="height:80px;" ' . " data-validation='required length' data-validation-length='10-100' data-validation-error-msg='Address must contain 10 to 100 charactor' id='address' class='form-control'"); ?>
                                        (<span id="address-max-length">100</span> characters left)
                                    </div>
                                </div> -->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="box-footer">
                                        <input type="submit" name="update" value="Update" id="update" class="btn btn-primary btn-small" />
                                        <input type="button" class="btn btn-default btn-small" value="Back" onclick="window.location.href = '<?php echo site_url('user'); ?>'"/>
                                    </div>
                        </div>
                                </div>
                            </div>
                            </div>
                            <script>
                                $.validate({
                                    modules: 'location, date, security, file',
                                    onModulesLoaded: function () {
                                    }
                                });
                            </script>
                            <script type="text/javascript">
                                $(function () {
                                    $('input[name="dob"]').daterangepicker({
                                        "singleDatePicker": true,
                                        //                                        timePicker: true,
                                        //                                        timePicker24Hour: true,
                                        //                                        timePickerIncrement: 10,
                                        "drops": "down",
                                        "showDropdowns": true,
                                        locale: {
                                            "format": 'MM-DD-YYYY'
                                        },
                                        "startDate": '01-01-2015',
                                    });

                                });
                            </script>

                        </div><!-- /.box-body -->
                        
                        <?php echo form_close(); ?> 
                    </div><!-- /.box -->

                </div><!--/.col (left) -->
            </div>   <!-- /.row -->

        </div>

        <?php echo $footer; ?>
<script>
 $("#update").keypress(function(event) {
    if (event.which == 13) {        
        return false;
    }

});
</script>
