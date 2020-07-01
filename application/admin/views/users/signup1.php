<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo"Purple Admin"; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
  </head>
  <body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Complete form validation</h4>
                            <form class="cmxform" id="signupForm" method="get" action="#" novalidate="novalidate">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input id="firstname" class="form-control" name="firstname" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input id="lastname" class="form-control" name="lastname" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" class="form-control" name="username" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" class="form-control" name="password" type="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm password</label>
                                        <input id="confirm_password" class="form-control" name="confirm_password" type="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" class="form-control" name="email" type="email">
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

    </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->

        <!-- Plugin js for this page -->
        <script src="<?php echo base_url(); ?>assets/vendors/jquery-validation/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <!-- End plugin js for this page -->

        <!-- Custom js for this page -->
        <script src="<?php echo base_url(); ?>assets/js/form-validation.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bt-maxLength.js"></script>
        <!-- End custom js for this page -->

    <!-- inject:js -->
    <script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>