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
                    echo form_open_multipart('user/update/', $attributes);
                    ?>
                    <?php for ($i = 0; $i < count($user); $i++) {
                                            ?>
                    <div class="box-body">
                        <div class="form-group">
                        	<!-- <form method="post" action="<?php echo base_url();?>user/insertdata"> -->
                             <div class="row">
                            <div class="col-md-12">
                              
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Firstname</label>&nbsp <span style="color: #a94442;">*</span>
                                       	<input type="hidden" name="id" value="<?php echo $user[$i]['id'];?>">

                                        <div class="controls">
                                            <input type="text" name="v_firstname" class="form-control" value="<?php echo $user[$i]['v_firstname']; ?>" data-validation="required" data-validation-error-msg="enter first name." placeholder="enter Firstname">

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Lastname</label>&nbsp <span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <input type="text" name="v_lastname" value="<?php echo $user[$i]['v_lastname']; ?>" class="form-control" data-validation="required" data-validation-error-msg="enter last name." placeholder="enter Lastname">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Email</label>&nbsp <span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <input type="text" name="v_email" value="<?php echo $user[$i]['v_email']; ?>" class="form-control" data-validation="required" data-validation-error-msg="enter email." placeholder="enter Email">

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Mobile</label>&nbsp <span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <input type="text" name="i_mobile" value="<?php echo  $user[$i]['i_mobile']; ?>" class="form-control" data-validation="required" data-validation-error-msg="enter mobile." placeholder="enter mobile">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Gender</label>&nbsp <span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <!-- <input type="text" name="e_gender" class="form-control" data-validation="required" data-validation-error-msg="enter gender."> -->
                                            <input type="radio" name="e_gender" value="male" <?php if($user[$i]['e_gender']=="male"){ echo "checked";}?>   data-validation="required" data-validation-error-msg="enter gender.">Male &nbsp;
											<input type="radio" name="e_gender" value="female" <?php if($user[$i]['e_gender']=="female"){ echo "checked";}?> data-validation="required" data-validation-error-msg="enter gender.">Female
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 " id="firstnameerror">
                                        <label>Class</label>&nbsp <span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <select name="v_class" id="v_class" data-validation="required" data-validation-error-msg="Please select class." class="form-control">
                                                <option value="">Select </option>
                                                <option value="BSc.IT" <?php if($user[$i]['v_class']=="BSc.IT"){ echo "selected";}?>>BSc.IT</option>
												<option value="BCA"  <?php if($user[$i]['v_class']=="BCA"){ echo "selected";}?>>BCA</option>
												<option value="MCA" <?php if($user[$i]['v_class']=="MCA"){ echo "selected";}?>>MCA</option>
												<option value="MSc.IT" <?php if($user[$i]['v_class']=="MSc.IT"){ echo "selected";}?>>MSc.IT</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Hobby</label>&nbsp <span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            
                                        	<input type="checkbox" name="v_hobby[]" value="reading" <?php if(in_array("reading",explode(",",$user[$i]['v_hobby']))){ echo " checked=\"checked\""; } ?> >Reading<br>
  											<input type="checkbox" name="v_hobby[]" value="cricket" <?php if(in_array("cricket", explode(",",$user[$i]['v_hobby']))){ echo " checked=\"checked\""; } ?> > Cricket<br>
  											<input type="checkbox" name="v_hobby[]" value="dancing" <?php if(in_array("dancing", explode(",",$user[$i]['v_hobby']))){ echo " checked=\"checked\""; } ?> >Dancing<br>
                                        </div>
                                    </div>
                                     <div class="form-group col-md-3" id="firstnameerror">
                                        <label>Stage Image</label>&nbsp<span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <input name="user_image" data-validation="required mime size" 
                                                   data-validation-allowing="jpeg, png, jpg"
                                                   data-validation-max-size="2048kb"
                                                   data-validation-error-msg-mime="Only .jpg, .jpeg or .png file can be upload"
                                                   data-validation-error-msg-size="Image size must be less than 2MB"
                                                   data-validation-error-msg-required="Please select .jpg, .jpeg and .png file size up to 2MB only."
                                                   id="settingvalue" type="file" 
                                                   class=""  />
                                                   <!-- <input type="hidden" name="old_stage_image" value="<?php echo $user[$i]['user_image']; ?>" /> -->
                                        </div>
                                    </div> 
                                    <div class="form-group col-md-2" id="firstnameerror">
                                        <?php
                                        if (file_exists($this->config->item('user_image') . '/' . stripslashes($user[0]['user_image']))) {
                                            ?>
                                            <td><img height="75" width="75" src="<?php echo base_url() . $this->config->item('user_image') . '/' . stripslashes($user[0]['user_image']); ?>"></img></td>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <td><img height="75" width="75" src="<?php echo base_url() . $this->config->item('noimage'); ?>"></img></td>
                                        <?php } ?>
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
                                 <input type="submit" name="update" value="Update" id="update" class="btn btn-primary btn-small" />
                                            <input type="button" class="btn btn-default btn-small" value="Back" onclick="window.location.href = '<?php echo site_url('user'); ?>'"/>
                            </div>
                        </div>
<?php echo form_close(); ?> 
                    </div><!-- /.box -->
                    <?php } ?>

                </div><!--/.col (left) -->
            <!-- </form> -->
            </div>   <!-- /.row -->

        </div>
        <?php echo $footer; ?>
