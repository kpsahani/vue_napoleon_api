<?php

if ($mode == 'type') {

}elseif ($mode == 'status') {
    
    $modal = '<div style="color:#484848;" class="modal fade" id="statusmodel1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                        <h4 class="modal-title" id="confirm_status_title">Change Status</h4>
                    </div>
                     <form action="' . base_url('lead/changestatus') . '" accept-charset="utf-8" class="form-horizontal" id="frmdesti" method="post" enctype="multipart/form-data">
                    <div class="modal-body" id="confirm_status_body">  
                        <div class="">
                        <div class="" style="margin-bottom:10px !important">
                            
  <label class=""><input type="radio" class="" name="user_active" value="Enable" ';
        if ($type_status == 'Enable') {
            $modal .= 'checked=""';
        } $modal .='>&nbsp;Enable</label>
            
<label class=""><input type="radio" class="" name="user_active" value="Disable" ';
        if ($type_status == 'Disable') {
            $modal .= 'checked=""';
        } $modal .='>&nbsp;Disable</label>
           
                          </div>
                        </div>    
                        <textarea name="status_msg" id="status_msg" style= "width:100% ;" rows="5" placeholder="Please write your comment here"></textarea>
                        <input type="hidden" name="id" id="id" value="' . $id . '">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" id="status_submit" class="btn btn-default danger" >Change Status</button>
                        <!--<a href="#" class="btn btn-default danger">Yes</a>-->
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>';
        echo $modal;
    
}elseif ($mode == 'delete') {
    
    $modal = '<div style="color:#484848;" class="modal fade" id="statusmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                        <h4 class="modal-title" id="confirm_status_title">Delete Lead</h4>
                    </div>
                     <form action="' . base_url('lead/deletedata/'.$id) . '" accept-charset="utf-8" class="form-horizontal" id="frmdesti" method="post" enctype="multipart/form-data">
                    <div class="modal-body text-muted" id="">  
                        <p class="text-muted "><h4> Are you sure you want to delete this Lead? </h4></p>               
                        <input type="hidden" name="id" id="id" value="' . $id . '">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" id="status_submit" class="btn btn-default danger" >Yes</button>

                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>';
        echo $modal;
}

?>