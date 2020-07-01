<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $site_name; ?> | <?php echo $section_title ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
        <link href="<?php echo base_url(); ?>newadmin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
        <!-- FontAwesome 4.3.0 -->
        <link href="<?php echo base_url(); ?>newadmin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>newadmin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
       
        <link href="<?php echo base_url(); ?>newadmin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  
          <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url(); ?>newadmin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- jQuery UI 1.11.2 -->
        <script src="<?php echo base_url(); ?>newadmin/jquery-ui.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>newadmin/form-validator/jquery.form-validator.min.js"></script> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>newadmin/form-validator/theme-default.min.css" type="text/css"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .form-horizontal tbllogin {
                margin-left:20px;
            }
            .loginbox .control-label
            {

                text-align:left;
            }
            .loginbox .controls
            {                 
                margin-top:20px;
            }
            #txtuser {
                margin-left:0px;
            }
            #txtpass {
                margin-left:0px;
            }
            .form-control{background-image: none !important;}
        </style>
    </head>
    <body class="main_hmbg">
        <div class="wrapper">
            <div class="container">
            <header class="main-header">
                 
                <a href="<?php echo site_url(); ?>" class="header_title">
                    <h1> <?php echo ucfirst($site_name); ?> </h1>
                      </a>
                 
                <nav class="navbar navbar-static-top" role="navigation">
                </nav>
            </header>
</div>
            <div class="content-fluid" style="overflow: hidden;">
                <div style="margin-top: 6%; width: 30%; margin-left: 60%;" class="">
                  

                    <div class="boxcontent loginbox">
                        <div class="login-bg">
                            <div class="login-logo">
                                <a href="<?php echo base_url(); ?>">Login</a>
                            </div><!-- /.login-logo -->
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
                            <!--<div class="login-box-body">-->
                               
                                <form class="form-validation-callback" action="<?php echo base_url('adminlogin'); ?>" name="frmlogin" id="frmlogin" method="post">
                                    <div class="form-group has-feedback" style="margin-bottom:20px">
                                        <input type="text" class="form-control custom_lg_txtbx" name="user_name" id="user_name" placeholder="Username" data-validation="required" data-validation-error-msg="Username is required"/>
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        <span class="help-inline hide" id="username">Please enter user name.</span> 
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="password" name="user_pass" id="user_pass" class="form-control custom_lg_txtbx" placeholder="Password" data-validation="required" data-validation-error-msg="Password is required"/>
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        <span class="help-inline hide" id="errorpass">Please enter password.</span>
                                    </div>
                                    <div class="row text-center">
                                        <center>
                                            <div class="col-sm-12 text-center " style="margin-bottom:15px">
                                                <button type="submit" name="btnsubmit"  class="pull-left btn btn-primary btn-block btn-flat login-btn custom_login_btn" style="border-color:#000">Login</button>
                                                <a class="pull-right frgt_pass" data-href="<?php echo site_url('adminlogin/forgotpassword') ?>" title="Forgot password?" data-toggle="modal" data-target="#confirm-status" href="#" > Forgot password?  </a>
                                            </div>
                                        </center>
                                    </div>
                                </form>
                            <!--</div> /.login-box-body -->
                        </div>
                        
                        <div class="modal fade" id="confirm-status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="confirm_status_title">Forgot your password</h4>
            </div>
            <div class="modal-body" id="confirm_status_body">
                Are you sure you want to send email?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <a href="#" class="btn btn-danger danger">Yes</a>
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
       $(document).ready(function(){
   
                     $('#confirm-status').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
    });     
        </script>
                </div>

            </div>
        </div>

<p class="text-center footer_bg fotter_orange">Copyright &copy; <?php echo date('Y') ?> <span style="color:#edc16a">   : <?php echo ucfirst($site_name); ?></span> All rights reserved.</p>
   
        <!-- ./wrapper -->

        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url(); ?>newadmin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
   
    
    </body>
</html>
