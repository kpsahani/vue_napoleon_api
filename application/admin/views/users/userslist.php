<?php echo $header; ?>
<!-- partial:partials/_navbar.html -->
<?php echo $topmenu; ?>

<!-- partial:partials/_sidebar.html -->
<?php echo $leftmenu; ?>
<!-- partial -->
<?php
//echo "<pre>";
//print_r($users); 
//echo "</pre>";die;
?>
<div class="main-panel">
    <!-- <div class="content-wrapper"> -->
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Data table </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Tables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data table</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data table</h4>
                    <div class="row">
                        <div class="col-12">
                            <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <!-- <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="order-listing_length">
                                            <label>Show
                                                <select name="order-listing_length" aria-controls="order-listing"
                                                    class="custom-select custom-select-sm form-control">
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="-1">All</option>
                                                </select> entries</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="order-listing_filter" class="dataTables_filter">
                                            <label>
                                                <input type="search" class="form-control" placeholder="Search"
                                                    aria-controls="order-listing">
                                            </label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive1
">
                                            <table id="example" class="table dataTable no-footer" role="grid"
                                                aria-describedby="order-listing_info">
                                                <thead>
                                                <tr role="row">
                                                        <th class="sorting_asc" tabindex="0"
                                                            aria-controls="order-listing" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="Order #: activate to sort column descending"
                                                            style="width: 51.25px;">ID #</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Purchased On: activate to sort column ascending"
                                                            style="width: 90px;">ORDERID</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Customer: activate to sort column ascending"
                                                            style="width: 63.75px;">TXNID</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Ship to: activate to sort column ascending"
                                                            style="width: 46.25px;">TXNAMOUNT</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Base Price: activate to sort column ascending"
                                                            style="width: 67.5px;">PAYMENTMODE</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Purchased Price: activate to sort column ascending"
                                                            style="width: 103.75px;">CURRENCY</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Status: activate to sort column ascending"
                                                            style="width: 55px;">TXNDATE</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 52.5px;">STATUS</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 52.5px;">GATEWAYNAME</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 52.5px;">BANKTXNID</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 52.5px;">BANKNAME</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 52.5px;">CHECKSUMHASH</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php for ($i = 0; $i < count($users); $i++){
                                                ?>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1"><?php echo $users[$i]['ID']; ?></td>
                                                        <td><?php echo $users[$i]['ORDER_ID']; ?></td>
                                                        <td><?php echo $users[$i]['TXNID']; ?></td>
                                                        <td><?php echo $users[$i]['TXN_AMOUNT']; ?></td>
                                                        <td><?php echo $users[$i]['PAYMENT_MODE']; ?></td>
                                                        <td><?php echo $users[$i]['CURRENCY']; ?></td>
                                                        <td><?php echo $users[$i]['TXN_DATE']; ?></td>
                                                        <td><?php echo $users[$i]['STATUS']; ?></td>
                                                        <td><?php echo $users[$i]['GATEWAY_NAME']; ?></td>
                                                        <td><?php echo $users[$i]['BANK_TXNID']; ?></td>
                                                        <td><?php echo $users[$i]['BANK_TXNID']; ?></td>
                                                        <td><?php echo $users[$i]['CHECKSUMHASH']; ?></td>
                                                        <!-- <td>
                                                            <label class="badge badge-info">On hold</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td> -->
                                                       
                                                    </tr>
                                                <?php } ?>    
                                                </tbody>
                                                <tfoot>
                                                <tr role="row">
                                                        <th class="sorting_asc" tabindex="0"
                                                            aria-controls="order-listing" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="Order #: activate to sort column descending"
                                                            style="width: 51.25px;">ID #</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Purchased On: activate to sort column ascending"
                                                            style="width: 90px;">ORDERID</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Customer: activate to sort column ascending"
                                                            style="width: 63.75px;">TXNID</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Ship to: activate to sort column ascending"
                                                            style="width: 46.25px;">TXNAMOUNT</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Base Price: activate to sort column ascending"
                                                            style="width: 67.5px;">PAYMENTMODE</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Purchased Price: activate to sort column ascending"
                                                            style="width: 103.75px;">CURRENCY</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Status: activate to sort column ascending"
                                                            style="width: 55px;">TXNDATE</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 52.5px;">STATUS</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 52.5px;">GATEWAYNAME</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 52.5px;">BANKTXNID</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 52.5px;">BANKNAME</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 52.5px;">CHECKSUMHASH</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="order-listing_info" role="status"
                                            aria-live="polite">Showing 1 to 10 of 10 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="order-listing_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="order-listing_previous"><a href="#"
                                                        aria-controls="order-listing" data-dt-idx="0" tabindex="0"
                                                        class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="order-listing" data-dt-idx="1" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item next disabled"
                                                    id="order-listing_next"><a href="#" aria-controls="order-listing"
                                                        data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
    <!-- content-wrapper ends -->
    
    
    <?php echo $footer; ?>
