<?php echo $header; ?>
<?php echo $leftmenu; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'newadmin/dist/css/tabs.css'?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'newadmin/dist/css/tabstyles.css'?>" />
  		<script src="<?php echo base_url().'newadmin/dist/js/modernizr.custom.js'?>"></script>
<base href="<?php echo base_url(); ?>" />
<!-- Content Wrapper. Contains user content -->
<div class="content-wrapper">
    <section class="content-header">
        <!--        <h2>
        <?php // echo ucfirst($this->uri->segment(2)); ?>
                </h2>-->
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
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="button" class="btn btn-warning btn-small pull-right" value="Back" onclick="window.location.href = '<?php echo base_url('user'); ?>'" >
                                <h1 class="user-header">

                                    <div class="col-md-2">
                                        <img class="pull-left img-responsive" src="<?php
                                        if (file_exists($this->config->item('user_profile_upload_path') . $users[0]['profile_image'])) {
                                            echo (($users[0]['profile_image'] != '') ? $this->config->item('user_profile_upload_path') . $users[0]['profile_image'] : $this->config->item('noimage'));
                                        } else {
                                            echo $this->config->item('noimage');
                                        }
                                        ?>" style="border-radius: 50%; height:120px;" />
                                    </div>

                                    <div> <div class="col-md-10 padng_rmv"> 
                                                                 <p class="title_heading"> <?php echo ucfirst($users[0]['name']); ?>   </p>                            <!--<small class="pull-right">Date: 2/10/2014</small>-->
                                            <p class="title_address"> <span class="fa fa-home">&nbsp;&nbsp;</span><?php if($users[0]['address'] != "") { echo stripslashes($users[0]['address']); } else {echo "--";} ?></p>
                                        </div>
                                    </div>
                                </h1>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row" style="margin-top: 30px; margin-left:13px">
                            
                            <div class="tabs tabs-style-fillup cs-tab">
					<nav>
						<ul>
							<li><a href="#section-fillup-1" class="fa fa-user"><span class="font-tab">Basic Information</span></a></li>
							<li><a href="#section-fillup-2" class="fa fa-file-o "><span class="font-tab">Basic Information </span></a></li>
							<li><a href="#section-fillup-3" class="fa fa-file-text-o"><span class="font-tab">Basic Information</span></a></li>
							<li><a href="#section-fillup-4" class="fa fa-heart-o"><span class="font-tab">Basic Information</span></a></li>
							<!--<li><a href="#section-fillup-5" class="icon icon-config"><span class="font-tab">Settings</span></a></li>-->
						</ul>
					</nav>
					<div class="content-wrap">
                                            <section id="section-fillup-1">
                                                <table class="table custom-font">
                                                    <tbody>
                                                        <tr>
                                                            <th class="col-md-2">Name :</th>
                                                            <td class="text-left"><?php echo stripslashes($users[0]['name']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="col-md-2">Email :</th>
                                                            <td class="text-left"><?php echo stripslashes($users[0]['email']); ?></td>
                                                        </tr>
							<tr>
                                                            <th class="col-md-2">Address :</th>
                                                            <td class="text-left"><?php if($users[0]['address'] != "") { echo stripslashes($users[0]['address']); } else {echo "--";} ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </section>
                                            
                                            <section id="section-fillup-2">
                                                <table class="table custom-font">
                                                    <tbody>
                                                        <tr>
                                                            <th class="col-md-2">Name :</th>
                                                            <td class="text-left"><?php echo stripslashes($users[0]['name']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="col-md-2">Email :</th>
                                                            <td class="text-left"><?php echo stripslashes($users[0]['email']); ?></td>
                                                        </tr>
							<tr>
                                                            <th class="col-md-2">Address :</th>
                                                            <td class="text-left"><?php if($users[0]['address'] != "") { echo stripslashes($users[0]['address']); } else {echo "--";} ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </section>
                                            
                                            <section id="section-fillup-3">
                                                <table class="table custom-font">
                                                    <tbody>
                                                        <tr>
                                                            <th class="col-md-2">Name :</th>
                                                            <td class="text-left"><?php echo stripslashes($users[0]['name']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="col-md-2">Email :</th>
                                                            <td class="text-left"><?php echo stripslashes($users[0]['email']); ?></td>
                                                        </tr>
							<tr>
                                                            <th class="col-md-2">Address :</th>
                                                            <td class="text-left"><?php if($users[0]['address'] != "") { echo stripslashes($users[0]['address']); } else {echo "--";} ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </section>
				
                                            <section id="section-fillup-4">
                                                <table class="table custom-font">
                                                    <tbody>
                                                        <tr>
                                                            <th class="col-md-2">Name :</th>
                                                            <td class="text-left"><?php echo stripslashes($users[0]['name']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="col-md-2">Email :</th>
                                                            <td class="text-left"><?php echo stripslashes($users[0]['email']); ?></td>
                                                        </tr>
							<tr>
                                                            <th class="col-md-2">Address :</th>
                                                            <td class="text-left"><?php if($users[0]['address'] != "") { echo stripslashes($users[0]['address']); } else {echo "--";} ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </section>

						<!--<section id="section-fillup-5"><p>5</p></section>-->
					</div><!-- /content -->
				</div>
                            
                            
                            
                            
                 
                            <div class="col-sm-12">
                                <input type="button" class="btn btn-warning btn-small" value="Back" onclick="window.location.href = '<?php echo base_url('user'); ?>'">
                            </div>
                        </div><!-- /.row -->
                    </section>

                </div><!-- /.box -->

            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">
                $(document).ready(function () {
	<?php if(count($customorders)>0){ ?>
                    $('#datatable').dataTable({
                        "pagingType": "full_numbers",
                        "bPaginate": true,
                        "bLengthChange": true,
                        "bFilter": true,
                        "bSort": true,
                        "bInfo": true,
                        "bAutoWidth": false,
                        "columnDefs": [{"targets": 5, "orderable": false}]
                    });
             <?php } ?>
		<?php if(count($predefineorders)>0){ ?>
                    $('#datatable1').dataTable({
                        "pagingType": "full_numbers",
                        "bPaginate": true,
                        "bLengthChange": true,
                        "bFilter": true,
                        "bSort": true,
                        "bInfo": true,
                        "bAutoWidth": false,
                        "columnDefs": [{"targets": 5, "orderable": false}]
                    });
             <?php } ?>
<?php if(count($favouriteorders)>0){ ?>
                    $('#datatable2').dataTable({
                        "pagingType": "full_numbers",
                        "bPaginate": true,
                        "bLengthChange": true,
                        "bFilter": true,
                        "bSort": true,
                        "bInfo": true,
                        "bAutoWidth": false,
                        "columnDefs": [{"targets": 5, "orderable": false}]
                    });
             <?php } ?>
                });
            </script>
<script src="<?php echo base_url().'newadmin/dist/js/cbpFWTabs.js'?>"></script>
		<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
		</script>
<?php echo $footer; ?>


