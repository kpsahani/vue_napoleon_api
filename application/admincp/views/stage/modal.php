<?php

if ($mode == 'type') {

}elseif ($mode == 'delete') {
    
    $modal = '<div style="color:#484848;" class="modal fade" id="statusmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                        <h4 class="modal-title" id="confirm_status_title">Delete stage</h4>
                    </div>
                     <form action="' . base_url('stage/delete/'.$id) . '" accept-charset="utf-8" class="form-horizontal" id="frmdesti" method="post" enctype="multipart/form-data">
                    <div class="modal-body text-muted" id="">  
                        <p class="text-muted "><h4> Are you sure you want to delete this Stage? </h4></p>               
                        <input type="hidden" name="id" id="id" value="' . $id . '">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" id="status_submit" class="btn btn-default btn-danger" >Yes</button>

                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>';
        echo $modal;
}

?>