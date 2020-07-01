<?php echo $header; ?>
<?php echo $leftmenu; ?>
<style>.user-status{width: 100px !important;}</style>
<div class="content-wrapper">
    <section class="content-header">
        <h2>
            Manage <?php echo ucfirst($this->uri->segment(1)); ?>
            <?php echo (($this->uri->segment(2)) ? ucfirst($this->uri->segment(2)) : ' (' . $total . ')'); ?>
        </h2>
        <ol class="breadcrumb pull-left">
            <li class="pull-left"><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url($this->uri->segment(1)); ?>"><i class="fa fa-user"></i> <?php echo ucfirst($this->uri->segment(1)); ?></a></li>
            <?php if ($this->uri->segment(2)) {
                ?><li><a href="<?php echo base_url($this->uri->segment(3)); ?>"> <?php echo ucfirst($this->uri->segment(2)); ?></a></li><?php } ?>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php if ($this->session->flashdata('message')) {
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
                <?php if ($this->session->flashdata('success')) {
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
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="buttons pull-right">
                            <!--<a class="btn btn-info" href="<?php echo site_url('stage/add/') ?>"> <i class="fa fa-plus"></i> Add</a>-->
                        </div>
                    </div>  
                    <div class="box-body">
                        <?php echo form_open('stage/multipleEvent', array('id' => 'frmuser')); ?> 
                        <?php if (!empty($mappings)) {
                            ?>
                            <div class="boxcontent"> 
                                <table id="datatable" class="table table-striped table-bordered dataTable">
                                    <thead>
                                        <tr>
                                            <th class="table_first_chkbx" id="firstchkbx"><input type="checkbox" id="selecctall"/></th>
                                            <th>Place Name</th>
                                            <th>Dress Name</th>
                                            <th>Crown Name</th>
                                            <th>Stage Name</th>
                                            <th>Props Name</th>
                                            <th>Character Name</th>
                                            <th>Image</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($mappings); $i++) {
                                            ?>
                                            <tr <?php if (($i + 1) % 2 == 0) {
                                                ?>class='alternate-row'<?php } ?>>
                                                <td><input class="checkbox1" id="checkbox" type="checkbox" name="check[]" value="<?php echo $mappings[$i]['map_id']; ?>"/></td>





                                                <td title="<?php echo stripslashes($mappings[$i]['place_name']); ?>"><?php echo stripslashes($mappings[$i]['place_name']); ?></td>
                                                <td title="<?php echo stripslashes($mappings[$i]['dress_name']); ?>"><?php echo stripslashes($mappings[$i]['dress_name']); ?></td>
                                                <td title="<?php echo stripslashes($mappings[$i]['crown_name']); ?>"><?php echo stripslashes($mappings[$i]['crown_name']); ?></td>
                                                <td title="<?php echo stripslashes($mappings[$i]['stage_name']); ?>"><?php echo stripslashes($mappings[$i]['stage_name']); ?></td>
                                                <td title="<?php echo stripslashes($mappings[$i]['props_name']); ?>"><?php echo stripslashes($mappings[$i]['props_name']); ?></td>
                                                <td title="<?php echo stripslashes($mappings[$i]['char_name']); ?>"><?php echo stripslashes($mappings[$i]['char_name']); ?></td>

                                                <?php if (file_exists($this->config->item('mapping_image') . '/' . stripslashes($mappings[$i]['image_path']))) {
                                                    ?>
                                                    <td><img height="75" width="75" src="<?php echo base_url() . $this->config->item('mapping_image') . '/' . stripslashes($mappings[$i]['image_path']); ?>"</img></td>
                                                    <?php
                                                            }
                                                else {
                                                    ?>
                                                    <td><img height="75" width="75" src="<?php echo base_url() . $this->config->item('noimage'); ?>"</img></td>
                                                <?php } ?>

                                                <td class="text-center center"> 
                                                    <!--<a class="btn btn-success" title="View" href="<?php // echo site_url('stage/view/' . $mappings[$i]['id']);    ?>"> <i class="fa fa-eye"></i> </a>--> 
                                                    <a class="btn btn-primary" title="Edit" href="<?php echo site_url('combition/edit/' . base64_encode($mappings[$i]['map_id'])); ?>"> <i class="fa fa fa-pencil-square-o"></i> </a>
                                                    <a  class="btn btn-danger" title="Delete" onclick="viewModal('delete', 'null',<?php echo stripslashes($mappings[$i]['map_id']); ?>)" data-toggle="modal" href="#" ><i class="fa fa-trash-o"></i> </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <!--                                                                <button type="button" name="Enable" id="btn1" title="Enable" class="btn btn-sm user-status btn-success  btn-status" value="Enable"  >Enable</button>
                                                                                                <button type="button" name="Disable" id="Disable" title="Disable" class="btn btn-sm user-status  btn-danger" value="Disable" >Disable</button>
                                                                <button type="button" name="Delete" id="Delete" title="Delete" class="btn btn-sm user-status  btn-danger" value="Delete"  > Delete</button>-->
                                <input type="hidden" name="event" id="event" value=""> 
                            </div> <?php echo form_close(); ?>
                            <?php
                        }
                        else {
                            ?>
                            <!--  start message-yellow -->
                            <div class="alert alert-info">
                                <!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
                                No Record Found.

                            </div>
                            <!--  end message-yellow -->
                        <?php } ?>
                    </div>
                </div>
                <!-- end .content --> 
            </div>
            <!-- model for status -->
            <script language="javascript" type="text/javascript">

                //Browser Support Code
                function viewModal(mode, status, id) {
                    var ajaxStatus;  // The variable that makes Ajax possible!
                    try
                    {

                        // Opera 8.0+, Firefox, Safari
                        ajaxStatus = new XMLHttpRequest();
                    } catch (e)
                    {

                        // Internet Explorer Browsers
                        try
                        {
                            ajaxStatus = new ActiveXObject("Msxml2.XMLHTTP");
                        } catch (e)
                        {

                            try
                            {
                                ajaxStatus = new ActiveXObject("Microsoft.XMLHTTP");
                            } catch (e)
                            {

                                // Something went wrong
                                alert("Your browser broke!");
                                return false;
                            }
                        }
                    }
                    ajaxStatus.onreadystatechange = function () {

                        if (ajaxStatus.readyState == 4)
                        {
                            var ajaxDisplay = document.getElementById('modalcontent');
//                              alert(ajaxStatus.responseText);
                            ajaxDisplay.innerHTML = ajaxStatus.responseText;
                            $("#statusmodel").modal({show: true});
                        }
                    }
                    ajaxStatus.open("POST", "stage/viewmodal/" + mode + "/" + status + '/' + id, true);
                    ajaxStatus.send(null);
                }

            </script>
            <div id="modalcontent">

            </div>


            <script type="text/javascript">
                $(document).ready(function () {
                    $('#datatable').dataTable({
                        "pagingType": "full_numbers",
                        "bPaginate": true,
                        "bLengthChange": true,
                        "bFilter": true,
                        "bSort": true,
                        "bInfo": true,
                        "bAutoWidth": false,
                        "order": [],
                        "columnDefs": [{
                                "targets": 'no-sort',
                                "orderable": false,
                            }],
                        "columnDefs": [{"targets": 0, "orderable": false}, {"targets": 7, "orderable": false}, {"targets": 8, "orderable": false}]
                    });
                    if ($('#firstchkbx').hasClass('sorting_asc'))
                    {
                        $('#firstchkbx').removeClass('sorting_asc');
                    }
                    if ($('#firstchkbx').hasClass('sorting_desc'))
                    {
                        $('#firstchkbx').removeClass('sorting_desc');
                    }

                });
            </script>
        </div>
    </section>
</div>
<?php echo $footer; ?>
<script>


    $("#btn1").click(function () {
        var checkboxes = document.querySelectorAll('input[name="check[]"]:checked'), values = [];
        Array.prototype.forEach.call(checkboxes, function (el) {
            values.push(el.value);
        });
        if (values == '')
        {
            alert('please select any user.');
            return false;
        } else
        {
            if (confirm('Are you sure you want to Enable selected items'))
            {
                $("#event").val('Enable');
                $("#frmuser").submit();
                return true;
            }
        }
    });
    $("#Disable").click(function () {
        var checkboxes = document.querySelectorAll('input[name="check[]"]:checked'), values = [];
        Array.prototype.forEach.call(checkboxes, function (el) {
            values.push(el.value);
        });
        if (values == '')
        {
            alert('please select any user.');
            return false;
        } else
        {
            if (confirm('Are you sure you want to Disable selected items'))
            {
                $("#event").val('Disable');
                $("#frmuser").submit();
                return true;
            }
        }
    });
    $("#Delete").click(function () {
        var checkboxes = document.querySelectorAll('input[name="check[]"]:checked'), values = [];
        Array.prototype.forEach.call(checkboxes, function (el) {
            values.push(el.value);
        });
        if (values == '')
        {
            alert('please select any user.');
            return false;
        } else
        {
            if (confirm('Are you sure you want to Delete selected items'))
            {
                $("#event").val('Delete');
                $("#frmuser").submit();
                return true;
            }
        }
    });
    $('#selecctall').click(function (event) {  //on click
        if (this.checked)
        { // check select status
            $('.checkbox1').each(function () { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        } else
        {
            $('.checkbox1').each(function () { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });
        }
    });
</script>
