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
                            <a class="btn btn-info" href="<?php echo site_url('stage/add/') ?>"> <i class="fa fa-plus"></i> Add</a>
                        </div>
                    </div>  
                    <div class="box-body">
                        <?php echo form_open('stage/multipleEvent', array('id' => 'frmuser')); ?> 
                        <?php if (!empty($stages)) {
                            ?>
                            <div class="boxcontent"> 
                                <table id="datatable" class="table table-striped table-bordered dataTable">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Character Name</th>
                                            <th>Stage Name</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($stages); $i++) {
                                            ?>
                                            <tr <?php if (($i + 1) % 2 == 0) {
                                                ?>class='alternate-row'<?php } ?>>
                                                <td><?php echo $stages[$i]['id']; ?></td>


                                                <?php
                                                if ($stages[$i]['character_id'] == '1') {
                                                    ?>
                                                    <td title="Nepoleon">Nepoleon</td>    
                                                    <?php
                                                }
                                                elseif ($stages[$i]['character_id'] == '2') {
                                                    ?>
                                                    <td title="Josephine">Josephine</td>    
                                                    <?php
                                                }
                                                elseif ($stages[$i]['character_id'] == '3') {
                                                    ?>
                                                    <td title="Both">Both</td>    
                                                <?php } ?>




                                                <?php
                                                if ($stages[$i]['stage_id'] == '1') {
                                                    ?>
                                                    <td title="Stage 1 (Place)">Stage 1 (Place)</td>    
                                                    <?php
                                                }
                                                elseif ($stages[$i]['stage_id'] == '2') {
                                                    ?>
                                                    <td title="Stage 2 (Dress)">Stage 2 (Dress)</td>    
                                                    <?php
                                                }
                                                elseif ($stages[$i]['stage_id'] == '3') {
                                                    ?>
                                                    <td title="Stage 3 (Crown)">Stage 3 (Crown)</td>    
                                                    <?php
                                                }
                                                elseif ($stages[$i]['stage_id'] == '4') {
                                                    ?>
                                                    <td title="Stage 4 (Stage)">Stage 4 (Stage)</td>    
                                                    <?php
                                                }
                                                elseif ($stages[$i]['stage_id'] == '5') {
                                                    ?>
                                                    <td title="Stage 5 (Props)">Stage 5 (Props)</td>    
                                                    <?php
                                                }
                                                elseif ($stages[$i]['stage_id'] == '6') {
                                                    ?>
                                                    <td title="Stage 6">Stage 6</td>    
                                                <?php } ?>





                                                <td title="<?php echo stripslashes($stages[$i]['stage_title']); ?>"><?php echo stripslashes($stages[$i]['stage_title']); ?></td>
                                                <td title="<?php echo substr(stripslashes($stages[$i]['stage_desc']), 0, 50); ?>"><?php echo substr(stripslashes($stages[$i]['stage_desc']), 0, 50); ?></td>
                                                <?php if (file_exists($this->config->item('stage_image') . '/' . stripslashes($stages[$i]['stage_image']))) {
                                                    ?>
                                                    <td><img height="75" width="75" src="<?php echo base_url() . $this->config->item('stage_image') . '/' . stripslashes($stages[$i]['stage_image']); ?>"</img></td>
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                    <td><img height="75" width="75" src="<?php echo base_url() . $this->config->item('noimage'); ?>"</img></td>
                                                <?php } ?>

                                                <td class="text-center center"> 
                                                    <!--<a class="btn btn-success" title="View" href="<?php // echo site_url('stage/view/' . $stages[$i]['id']);    ?>"> <i class="fa fa-eye"></i> </a>--> 
                                                    <a class="btn btn-primary" title="Edit" href="<?php echo site_url('stage/edit/' . base64_encode($stages[$i]['id'])); ?>"> <i class="fa fa fa-pencil-square-o"></i> </a>
                                                    <a  class="btn btn-danger" title="Delete" onclick="viewModal('delete', 'null',<?php echo stripslashes($stages[$i]['id']); ?>)" data-toggle="modal" href="#" ><i class="fa fa-trash-o"></i> </a>
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

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js" type="text/javascript"></script>
            <script type="text/javascript">
//                $(document).ready(function () {
//                    $('#datatable').DataTable({
//                        dom: 'Bfrtip',
//                        buttons: [
//                            'copy', 'csv', 'excel', 'pdf', 'print'
//                        ]
//                    });
//                });
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
                        "columnDefs": [{"targets": 0, "orderable": false}, {"targets": 4, "orderable": false}, {"targets": 5, "orderable": false}]
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
