<?php echo $header; ?>
<?php echo $leftmenu; ?>
<div class="content-wrapper">
    <section class="content-header">
        <h2>
            Manage <?php echo ucfirst(ucfirst('Email Template')); ?>
           <?php echo (($this->uri->segment(2))? ucfirst('Email Template'): ' ('.$total.')') ; ?>
        </h2>
<!--        <ol class="breadcrumb pull-left">
            <li class="pull-left"><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url($this->uri->segment(1)); ?>"><i class="fa fa-cog"></i> <?php echo ucfirst($this->uri->segment(1)); ?></a></li>
            <?php if($this->uri->segment(2)){?><li><a href="<?php echo base_url($this->uri->segment(3)); ?>"> <?php echo ucfirst($this->uri->segment(2)); ?></a></li><?php }?>
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
            <div class="col-xs-12">
                <div class="box box-primary">
<!--                    <div class="box-header">
                        <div class="buttons pull-right">
                            <a class="btn btn-info" href="<?php echo site_url('user/add/') ?>"> <i class="icon-edit icon-white"></i>Add</a>
                        </div>
                    </div>  -->
                    <div class="box-body">
                        <?php if (!empty($emailformat)) { ?>
                            <div class="boxcontent"> <?php echo form_open('storage/delete2/', array('class' => 'form-horizontal', 'id' => 'frmdelete', 'method' => 'post', 'name' => 'frmdelete')); ?>
                                <table id="datatable" class="table table-striped table-bordered dataTable">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <!--<th>Subject</th>-->
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($emailformat); $i++) { ?>
                                            <tr <?php if (($i + 1) % 2 == 0) { ?>class='alternate-row'<?php } ?>>
                                                <td><?php echo stripslashes($emailformat[$i]['title']); ?></td>
                                                <!--<td><?php // echo stripslashes($emailformat[$i]['subject']); ?></td>-->
                                                <td class="center"> 
                                                    <!--<a class="btn" href="<?php echo site_url('emailformat/view/' . $emailformat[$i]['id']); ?>"> <i class="fa fa-eye"></i></a>-->
                                                    <a class="btn btn-primary" href="<?php echo site_url('emailformat/edit/' . $emailformat[$i]['id']); ?>"> <i class="fa fa fa-pencil-square-o"></i> Edit</a>
                                                    <!--<a  class="btn" href="<?php echo site_url('emailformat/delete/' . $emailformat[$i]['id']); ?>" ><i class="fa fa-trash-o"></i></a>-->
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php echo form_close(); ?> </div>
                        <?php } else { ?>
                            <!--  start message-yellow -->
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                No Record Found.

                            </div>
                            <!--  end message-yellow -->
                        <?php } ?>
                    </div>
                </div>
                <!-- end .content --> 
            </div>
            <script type="text/javascript">
//                $(document).ready(function() {
//                    $('#datatable').dataTable({
//                        "pagingType": "full_numbers",
//                        "bPaginate": true,
//                        "bLengthChange": true,
//                        "bFilter": true,
//                        "bSort": true,
//                        "bInfo": true,
//                        "bAutoWidth": false
//                    });
//                });
            </script>
        </div>
    </section>
</div>
<?php echo $footer; ?>
