<?php echo $header; ?>
<?php echo $leftmenu; ?>
<script src="<?php echo base_url(); ?>../ckeditor/ckeditor.js"></script>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <section class="content-header">
        <h2>
            Edit Email Template
        </h2>
<!--        <ol class="breadcrumb pull-left">
            <li class="pull-left"><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url($this->uri->segment(1)); ?>"><i class="fa fa-cog"></i> Email format</a></li>
            <?php if($this->uri->segment(2)){?><li><a href="<?php echo base_url($this->uri->segment(3)); ?>"> <?php echo ucfirst($this->uri->segment(2)); ?></a></li><?php }?>
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
                <div class="box box-primary">
                    <br>

                    <!-- form start -->
                    <form id="editEmailForm" method="POST" action="<?= site_url('emailformat/update') ?>" enctype="multipart/form-data">
                        <input type="hidden" id="emailid" name="emailid" value="<?php echo base64_encode($emailformat[0]['id']) ?>">
                        

                        <div class="box-body">
                            <div class="col-md-6">
                           <div class="form-group">
                                <label>Title</label><span class="required">*</span>
                                <input type="text" readonly="" name="title" id="title" class="form-control" value="<?php echo $emailformat[0]['title'] ?>">
				<span id="spantitleerr" style="display: none;color:red"> Please Enter the Title </span>
                            </div>
                            <div class="form-group"> 
                                <label>Subject</label><span class="required">*</span>
                                <input type="text" name="subject" id="subject" class="form-control" value="<?php echo $emailformat[0]['subject'] ?>">
				<span id="spansubjerr" style="display: none;color:red"> Please Enter the Subject </span>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label>Variables</label>
                                <span class="help-block"><?php echo $emailformat[0]['variables'] ?></span>
                                
                            </div>
                            <div class="form-group">
                                <label>Email Format</label><span class="required">*</span>
                                <textarea class="form-control ckeditor"  name="mailformat" id="mailformat" ><?php echo ($emailformat[0]['mailformat']) ?></textarea>
                            </div>
                        <div class="box-footer">
                            <input type="submit" name="btn" id="btnsubmit"   class="btn btn-primary signin_btn subbtn" Value="Submit"/>                          
                            <a href="<?php echo site_url('emailformat/'); ?>"><button class="btn btn-default" type="button">Cancel</button></a>

                        </div>
                            </div>
                                

                    </form>

                </div><!-- /.box -->
            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.uploadPreview.min.js"></script>
<script>
    $(document).ready(function () {
        $("#btnsubmit").click(function(){
            var title = $("#title").val();
            var subject = $("#subject").val();
            if(title == ''){
                $("#spantitleerr").show();
                return false;
            }
            else{
                $("#spantitleerr").hide();
            }
            if(subject == ''){
                $("#spansubjerr").show();
                return false;
            }
            else{
                $("#spansubjerr").hide();
            }
            
        });
    });
</script>
<?php echo $footer; ?>
 <!--------files to preview & upload image ------------------------------------------------->
