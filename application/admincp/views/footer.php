</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.0 -->
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <span style="color: #edc16a"><?php echo ucfirst($site_name); ?></span>.</strong> All rights reserved.
</footer>

<!-- ./wrapper -->

<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url(); ?>newadmin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    


<!-- Morris.js charts -->
<script src="<?php echo base_url(); ?>newadmin/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>newadmin/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<!--<script src="<?php echo base_url(); ?>newadmin/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>-->
<!-- jvectormap -->
<!--<script src="<?php echo base_url(); ?>newadmin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>newadmin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>-->
<!-- jQuery Knob Chart -->
<!--<script src="<?php echo base_url(); ?>newadmin/plugins/knob/jquery.knob.js" type="text/javascript"></script>-->
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>newadmin/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>newadmin/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>newadmin/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<!--<script src="<?php echo base_url(); ?>newadmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
<!-- Slimscroll -->
<!--<script src="<?php echo base_url(); ?>newadmin/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>-->
<!-- FastClick -->
<!--<script src='<?php echo base_url(); ?>newadmin/plugins/fastclick/fastclick.min.js'></script>-->
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>newadmin/dist/js/app.min.js" type="text/javascript"></script>    

<!-- AdminLTE dashboard rest (This is only for rest purposes) -->
<!--<script src="<?php echo base_url(); ?>newadmin/dist/js/pages/dashboard.js" type="text/javascript"></script>-->    

<!-- AdminLTE for rest purposes -->
<script src="<?php echo base_url(); ?>newadmin/dist/js/demo.js" type="text/javascript"></script>
<?php if($this->uri->segment(1) == "dashboard"){?>
<!--<script src="<?php echo base_url(); ?>newadmin/dist/js/pages/dashboard.js" type="text/javascript"></script>-->
<?php  } ?>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url(); ?>newadmin/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>newadmin/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

</body>
</html>
