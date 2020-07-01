<?php echo $header; ?>
<?php echo $leftmenu; ?>

<!-- Content Wrapper. Contains user content -->
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
            <div class="col-xs-12">
                <?php
                if ($this->session->flashdata('message'))
                {
                    ?>
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
                <?php
                if ($this->session->flashdata('success'))
                {
                    ?>
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
                    echo form_open_multipart('stage/addstage/', $attributes);
                    ?>

                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="form-group col-md-3" id="firstnameerror">
                                        <label>Character</label>&nbsp <span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <select name="character_id" id="character_id" data-validation="required" data-validation-error-msg="Please select charcter." class="form-control">
                                                <option value="">Please select charcter</option>
                                                <option value="1">Napoleon</option>
                                                <option value="2">Josephine</option>
                                                <option value="3">Both</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-3" id="firstnameerror">
                                        <label>Stage</label>&nbsp <span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <select name="stage_id" id="stage_id" data-validation="required" data-validation-error-msg="Please select stage." class="form-control">
                                                <option value="">Please select stage</option>
                                                <option value="1">Stage 1 (Place)</option>
                                                <option value="2">Stage 2 (Dress) </option>
                                                <option value="3">Stage 3 (Crown) </option>
                                                <option value="4">Stage 4 (Stage) </option>
                                                <option value="5">Stage 5 (Props) </option>
                                                <!--<option value="6">Stage 6</option>-->
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Stage Title</label>&nbsp<span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <input name="stage_title" data-validation="required" data-validation-error-msg="Please enter valid title." id="stage_title" type="text" class="form-control" value="" />
                                        </div>
                                    </div> 
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6" id="firstnameerror">
                                        <label>Stage Description</label>&nbsp<span style="color: #a94442;">*</span>
                                        <div class="controls">
    <?php echo form_textarea('stage_desc', set_value('stage_desc'), 'rows="5" style="height:80px;" ' . " data-validation='required length' data-validation-length='10-500' data-validation-error-msg='Description must contain 10 to 500 character' id='stage_desc' class='form-control'"); ?>
                                            (<span id="address-max-length">500</span> characters left)
                                        </div>
                                    </div> 
                                    <div class="form-group col-md-4" id="firstnameerror">
                                        <label>Stage Image</label>&nbsp<span style="color: #a94442;">*</span>
                                        <div class="controls">
                                            <input name="stage_image" data-validation="required mime size" 
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
                                <input type="submit" name="add" value="Add" id="add" class="btn btn-primary btn-small" />
                                <input type="button" class="btn btn-default btn-small" value="Back" onclick="window.location.href = '<?php echo site_url('stage'); ?>'"/>
                            </div>
                        </div>
<?php echo form_close(); ?> 
                    </div><!-- /.box -->

                </div><!--/.col (left) -->
            </div>   <!-- /.row -->

        </div>

<?php echo $footer; ?>
        <script>
            $("#add").keypress(function (event) {
                if (event.which == 13)
                {
                    return false;
                }

            });
        </script>

