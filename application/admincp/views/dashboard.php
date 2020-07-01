<?php echo $header; ?>
<?php echo $leftmenu; ?>
<style>
    .btn-active { background: rgba(0, 0, 0, 0.15) none repeat scroll 0 0 !important;}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 916px !important">
    <section class="content-header">
        <!--        <h1><?php echo $title; ?>
                    <small>Control panel</small>
                </h1>-->
    </section>
    <section class="content">
        <?php
        if ($this->session->flashdata('success'))
        {
            ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo $this->session->flashdata('success'); ?></strong></div>
        <?php } ?>
        <?php
        if ($this->session->flashdata('error'))
        {
            ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo $this->session->flashdata('error'); ?></strong></div>
        <?php } ?>

        <div class="row">
            <section class="col-lg-12 connectedSortable ui-sortable">
                <div class="box box-danger ">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Navigation</h3>
                        <div class="box-tools pull-right">
                            <button data-widget="collapse" class="btn btn-box-tool" type="button"><i class="fa fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <div class="row">  

                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow-gradient">
                                    <div class="inner">
                                        <h3>6</h3>
                                        <p>Stages</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-rss"></i>
                                    </div>
                                    <a href="<?php echo base_url(''); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-blue-gradient">
                                    <div class="inner">
                                        <h3>50</h3>
                                        <p>Subscription</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-maroon-gradient">
                                    <div class="inner">
                                        <h3>99</h3>
                                        <p>Users</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green-gradient">
                                    <div class="inner">
                                        <h3>56</h3>
                                        <p>Advertise Package</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-buysellads"></i>
                                    </div>
                                    <a href="<?php echo base_url(''); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
            </section>
            

        </div>
    </section>

</div>
</section>
<?php echo $footer; ?> 

<!--	end of footer	-->


