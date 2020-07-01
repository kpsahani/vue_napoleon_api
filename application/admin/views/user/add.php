<?php echo $header; ?>
<?php echo $leftmenu; ?>
<div class="content-wrapper">
	<section class="content-header">
        <h2>
            <?php echo ucfirst($this->uri->segment(2)); ?> <?php echo ucfirst($this->uri->segment(1)); ?>
            <small></small>
        </h2>
        <ol class="breadcrumb pull-left">
            <li class="pull-left"><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url($this->uri->segment(1)); ?>"><i class="fa fa-cog"></i> <?php echo ucfirst($this->uri->segment(1)); ?></a></li>
            <?php
            if ($this->uri->segment(2))
            {
                ?><li><a href="<?php echo base_url($this->uri->segment(3)); ?>"> <?php echo ucfirst($this->uri->segment(2)); ?></a></li><?php } ?>
        </ol>
    </section>
    <section class="content">
    	 <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <?php
                    $attributes = array('class' => 'has-validation-callback', 'id' => 'frmdesti', 'method' => 'post');
                    echo form_open_multipart('user/insertdata/', $attributes);
                    ?>

                    <div class="box-body">
                        <div class="form-group">
                        	<!-- <form method="post" action="<?php echo base_url();?>user/insertdata"> -->
                            <div class="row">
                                <div class="col-md-12">
                                
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Firstname</label>&nbsp<span style="color: #a94442;">*</span>
                                        <div class="controls ">
                                            <input type="text" name="v_firstname" class="form-control" data-validation="required" data-validation-error-msg="enter first name." placeholder="enter Firstname">

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Lastname</label>&nbsp <span style="color: #a94442;">*</span>
                                        <div class="controls ">
                                            <input type="text" name="v_lastname" class="form-control" data-validation="required" data-validation-error-msg="enter last name." placeholder="enter Lastname">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Email</label>&nbsp <span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <input type="text" name="v_email" class="form-control" data-validation="required" data-validation-error-msg="enter email." placeholder="enter Email">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Mobile</label>&nbsp <span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <input type="text" name="i_mobile" class="form-control" data-validation="required" data-validation-error-msg="enter mobile." placeholder="enter mobile">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Gender</label>&nbsp <span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <!-- <input type="text" name="e_gender" class="form-control" data-validation="required" data-validation-error-msg="enter gender."> -->
                                            <input type="radio" name="e_gender" value="male"  data-validation="required" data-validation-error-msg="enter gender.">Male &nbsp;
											<input type="radio" name="e_gender" value="female" data-validation="required" data-validation-error-msg="enter gender.">Female
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Class</label>&nbsp <span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <select name="v_class" id="v_class" data-validation="required" data-validation-error-msg="Please select class." class="form-control">
                                                <option value="">Select </option>
                                                <option value="B.E.Comp">B.E.Comp</option>
                                                <option value="BSc.IT">BSc.IT</option>
												<option value="BCA">BCA</option>
												<option value="MCA">MCA</option>
												<option value="MSc.IT">MSc.IT</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Hobby</label>&nbsp <span style="color: #a94442;">*</span>
                                        <div class="controls">
                                        	<input type="checkbox" name="v_hobby[]" value="reading" >Reading<br>
  											<input type="checkbox" name="v_hobby[]" value="cricket"  > Cricket<br>
  											<input type="checkbox" name="v_hobby[]" value="dancing"  >Dancing<br>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Image</label>&nbsp<span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <input name="user_image" data-validation="required mime size" 
                                                   data-validation-allowing="jpeg, png, jpg"
                                                   data-validation-max-size="2048kb"
                                                   data-validation-error-msg-mime="Only .jpg, .jpeg or .png file can be upload"
                                                   data-validation-error-msg-size="Image size must be less than 2MB"
                                                   data-validation-error-msg-required="Please select .jpg, .jpeg and .png file size up to 2MB only."
                                                   id="settingvalue" type="file" 
                                                   class="" />
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">

                                </div>
                            </div>
                            <script>

                                $.validate({
                                    modules: 'location, date, security, file',
                                    onModulesLoaded: function () {
                                    }
                                });
                                $('#stage_desc').restrictLength($('#address-max-length'));
                            </script>
                        </div><!-- /.box-body -->
                        <div class="col-md-12">
                            <div class="box-footer">
                                <input type="submit" name="submit" value="Add" id="submit" class="btn btn-primary btn-small" />
                                <input type="button" class="btn btn-default btn-small" value="Back" onclick="window.location.href = '<?php echo site_url('stage'); ?>'"/>
                            </div>
                        </div>
                        <?php echo form_close(); ?> 
                    </div><!-- /.box -->
                </div><!--/.col (left) -->
            </div>   <!-- /.row -->
        </div>
    </section>
</div>
 <?php echo $footer; ?>
 
<script>
    $("#submit").keypress(function (event) {
        if (event.which == 13)
        {
            return false;
        }

    });
</script>
 