<?php echo $header; ?>
<?php echo $leftmenu; ?>
<script src="<?php echo base_url(); ?>../ckeditor/ckeditor.js"></script>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <section class="content-header">
        <h2>
            <?php echo 'Change Account Setting'; ?>
            <small><?php // echo 'Edit';  ?></small>
        </h2>
<!--        <ol class="breadcrumb pull-left">
            <li class="pull-left"><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url($this->uri->segment(1)); ?>"><i class="fa fa-cog"></i> Change Password</a></li>
            <?php if ($this->uri->segment(2)) { ?><li><a href="<?php echo base_url($this->uri->segment(3)); ?>"> <?php echo ucfirst($this->uri->segment(2)); ?></a></li><?php } ?>
        </ol>-->
    </section>
    <!-- Main content -->
    <section class="content">
        <hr />
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="confirm-div" ><?php echo $this->session->flashdata('msg'); ?></div>
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
                <!-- general form elements -->
                <div class="box box-warning">
                    <br>

                    <!-- form start -->
                    <form id="editEmailForm" method="POST" action="<?= site_url('changepassword/change') ?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Name</label><span style="color: #b94a48;"> *</span>
                                <input type="text" name="adminname" id="adminname" class="form-control" value="<?php echo $admin[0]['adminname']?>" data-validation="required" data-validation-error-msg="Please enter Name." />
                            </div>
                            <div class="form-group">
                                <label>Email</label><span style="color: #b94a48;"> *</span>
                                <input type="text" name="adminemail" id="adminemail" class="form-control" value="<?php echo $admin[0]['adminemail']?>" data-validation="required email" data-validation-error-msg="Please enter Email." />
                            </div>
                            <div class="form-group">
                                <label>Password</label><span style="color: #b94a48;"> *</span>
                                <input type="password" name="oldpassword" id="oldpassword" class="form-control"  data-validation="required" data-validation-error-msg="Please enter password." />
                            </div>
                            <div class="form-group"> 
                                <label>New Password</label>
                                <input type="password" name="newpassword" id="newpassword" class="form-control" data-validation="required" data-validation-optional="true" data-validation-error-msg="Please enter new password." />
                            </div>
                            <div class="form-group"> 
                                <label>Confirm Password</label>
                                <input type="password" name="confirmpass" id="confirmpass" class="form-control" data-validation="confirmation"  data-validation-confirm="newpassword" data-validation-error-msg="New password and confirm password must be same."  >
                            </div>

                            <div class="box-footer">
                                <input type="submit" name="btn" id="btnsubmit"   class="btn btn-primary signin_btn subbtn" Value="Submit"/>                          
                                <a href="<?php echo site_url('dashboard'); ?>"><button class="btn btn-default" type="button">Cancel</button></a>
                            </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.uploadPreview.min.js"></script>
<script>
    $.validate({
        modules: 'location, date, security, file',
        onModulesLoaded: function () {
        }
    });
</script>
<?php echo $footer; ?>
<!--------files to preview & upload image ------------------------------------------------->
