<?php echo $header; ?>
<?php echo $leftmenu; ?>

<!-- Content Wrapper. Contains user content -->
<div class="content-wrapper">
    <section class="content-header">
        <h2>
            <?php echo ucfirst($this->uri->segment(2)); ?> <?php echo ucfirst($this->uri->segment(1)); ?>
            <small></small>
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
                    echo form_open_multipart('user/adduser/', $attributes);
                    ?>

                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="row">
                                <div class="form-group col-md-6" id="firstnameerror">
                                    <label>Name</label>&nbsp <span style="color: #a94442;">*</span>
                                    <div class="controls">
                                        <input name="name" data-validation="required" data-validation-error-msg="Please enter your name." id="settingvalue" type="text" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group col-md-6" id="firstnameerror">
                                    <label>Email</label>&nbsp<span style="color: #a94442;">*</span>
                                    <div class="controls">
                                        <input name="useremail" data-validation="email required server" data-validation-url="email_exist" data-validation-error-msg="Please enter valid email." id="settingvalue" type="text" class="form-control" value="" />
                                    </div>
                                </div> 
                          <!--      <div class="form-group col-md-3" id="firstnameerror">
                                    <label>Mobile #</label>&nbsp<span style="color: #a94442;">*</span>
                                    <div class="controls">
                                        <input name="mobile" data-validation="required" data-validation-error-msg="Please enter Mobile #." id="settingvalue" type="text" class="form-control" value="" />
                                    </div>
                                </div> -->
                                </div>
                                <div class="row">
                                <div class="form-group col-md-6" id="firstnameerror">
                                    <label>Password</label>&nbsp<span style="color: #a94442;">*</span>
                                    <div class="controls">
                                        <input name="userpassword" data-validation="required length custom"
 data-validation-regexp="^(?=.*[a-z])(?=.*\d).+$" data-validation-error-msg="Password must be 6 to 16 characters long and it should contain at least one character and one digit." data-validation-length="6-16" id="settingvalue" type="password" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group col-md-6"> 
                                    <label>Confirm Password</label><span style="color: #b94a48;">*</span>
                                    <input type="password" name="confirmpass" id="confirmpass" class="form-control" data-validation="required confirmation" data-validation-confirm="userpassword" data-validation-error-msg="Password and confirm password must be same."  >
                                </div>
                                </div>
                                <div class="row">
                               <!-- <div class="form-group col-md-4" id="firstnameerror">
                                    <label>Birth Date</label>&nbsp<span style="color: #a94442;">*</span>
                                    <div class="controls">
                                        <input name="dob" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask data-validation="required" data-validation-error-msg="Please enter birth date." id="datemask" type="text" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group col-md-4" id="firstnameerror">
                                    <label>Gender</label>&nbsp<span style="color: #a94442;">*</span>
                                    <div class="controls">
                                        <input type="radio" value="Male" name="gender" id="gender" checked="">&nbsp; Male
                                        <input type="radio" value="Female" name="gender" id="gender">&nbsp; Female

                                    </div>
                                </div> -->
                                <div class="form-group col-md-4" id="firstnameerror">
                                    <label>Profile Image</label>&nbsp<span style="color: #a94442;">*</span>
                                    <div class="controls">
                                        <input name="profile_image" data-validation="required mime size" 
                                               data-validation-allowing="jpeg, png, jpg"
                                               data-validation-max-size="2048kb"
                                               data-validation-error-msg-mime="Only .jpg, .jpeg or .png file can be upload"
                                               data-validation-error-msg-size="Image size must be less than 2MB"
                                               data-validation-error-msg-required="Please select .jpg, .jpeg and .png file size up to 2MB only."
                                               id="settingvalue" type="file" 
                                               class=""  />
                                    </div>
                                </div> 
                                </div>
                                <div class="row">
                              <!--  <div class="form-group col-md-12" id="firstnameerror">
                                    <label>Address</label>&nbsp<span style="color: #a94442;">*</span>
                                    <div class="controls">
                                        <?php echo form_textarea('address', set_value('address'), 'rows="5" style="height:80px;" ' . " data-validation='required length' data-validation-length='10-100' data-validation-error-msg='Address must contain 10 to 100 charactor' id='address' class='form-control'"); ?>
                                        (<span id="address-max-length">100</span> characters left)
                                    </div>
                                </div> -->
                                </div>
                            </div>
                            <script>

                                $.validate({
                                    modules: 'location, date, security, file',
                                    onModulesLoaded: function () {
                                    }
                                });
                                $('#address').restrictLength($('#address-max-length'));
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
                        <div class="col-md-12">
                            <div class="box-footer">
                                <input type="submit" name="add" value="Add" id="add" class="btn btn-primary btn-small" />
                                <input type="button" class="btn btn-default btn-small" value="Back" onclick="window.location.href = '<?php echo site_url('user'); ?>'"/>
                            </div>
                        </div>
                        <?php echo form_close(); ?> 
                    </div><!-- /.box -->

                </div><!--/.col (left) -->
            </div>   <!-- /.row -->

        </div>

        <?php echo $footer; ?>
        <script>
            $("#add").keypress(function(event) {
    if (event.which == 13) {        
        return false;
    }

});
        </script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
