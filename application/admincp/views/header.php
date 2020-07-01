<!DOCTYPE html>
<?php // die;?>
<html>
    <head>
        <meta charset="UTF-8">

        <title><?php echo ucfirst($site_name); ?> | <?php echo $section_title ?></title>

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
        <link href="<?php echo base_url(); ?>newadmin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
        <!-- FontAwesome 4.3.0 -->
        <link href="<?php echo base_url(); ?>newadmin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>newadmin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>newadmin/dist/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url(); ?>newadmin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <!--<link href="<?php echo base_url(); ?>newadmin/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />-->
        <!-- Morris chart -->
        <link href="<?php echo base_url(); ?>newadmin/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <!--<link href="<?php echo base_url(); ?>newadmin/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />-->

        <!-- Date Picker -->
        <link href="<?php echo base_url(); ?>newadmin/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url(); ?>newadmin/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <!--<link href="<?php echo base_url(); ?>newadmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Ionicons -->
        <!--<link href="<?php echo base_url(); ?>newadmin/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />-->
        <!-- DATA TABLES -->
        <link href="<?php echo base_url(); ?>newadmin/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>newadmin/jquery-1.8.3.js"></script>
        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url(); ?>newadmin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- jQuery UI 1.11.2 -->
        <script src="<?php echo base_url(); ?>newadmin/jquery-ui.min.js" type="text/javascript"></script>
        

        <script src="<?php echo base_url(); ?>newadmin/form-validator/jquery.form-validator.min.js"></script> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>newadmin/form-validator/theme-default.min.css" type="text/css"/>

        <!-- CK Editor -->
        <script src="<?php echo base_url(); ?>../ckeditor/ckeditor.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <![endif]-->
    </head>
    <body class="skin-red sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo site_url(); ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">NB</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg pull-left"><?php echo ucfirst($site_name); ?> </span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="true">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span>
                                        <?php
                                        if ($this->session->userdata('napoleon_admin'))
                                        {
                                            echo ucfirst($this->session->userdata['napoleon_admin']['adminname']);
                                        }
                                        ?>
                                        <i class="caret"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a class="btn btn-default btn-flat" href="<?php echo base_url('changepassword'); ?>">Change Account Setting</a>
                                        </div>
                                        <div class="pull-right">
                                            <a class="btn btn-default btn-flat" href="<?php echo base_url('dashboard/logout'); ?>">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
