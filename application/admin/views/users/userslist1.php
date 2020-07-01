<?php echo $header; ?>
<!-- partial:partials/_navbar.html -->
<?php echo $topmenu; ?>

<!-- partial:partials/_sidebar.html -->
<?php echo $leftmenu; ?>
<!-- partial -->
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
                                                            style="width: 51.25px;">Order #</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Purchased On: activate to sort column ascending"
                                                            style="width: 90px;">Purchased On</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Customer: activate to sort column ascending"
                                                            style="width: 63.75px;">Customer</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Ship to: activate to sort column ascending"
                                                            style="width: 46.25px;">Ship to</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Base Price: activate to sort column ascending"
                                                            style="width: 67.5px;">Base Price</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Purchased Price: activate to sort column ascending"
                                                            style="width: 103.75px;">Purchased Price</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Status: activate to sort column ascending"
                                                            style="width: 55px;">Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 52.5px;">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">1</td>
                                                        <td>2012/08/03</td>
                                                        <td>Edinburgh</td>
                                                        <td>New York</td>
                                                        <td>$1500</td>
                                                        <td>$3200</td>
                                                        <td>
                                                            <label class="badge badge-info">On hold</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">2</td>
                                                        <td>2015/04/01</td>
                                                        <td>Doe</td>
                                                        <td>Brazil</td>
                                                        <td>$4500</td>
                                                        <td>$7500</td>
                                                        <td>
                                                            <label class="badge badge-danger">Pending</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">3</td>
                                                        <td>2010/11/21</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">4</td>
                                                        <td>2016/01/12</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">5</td>
                                                        <td>2017/12/28</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">6</td>
                                                        <td>2000/10/30</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-info">On-hold</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">1</td>
                                                        <td>2012/08/03</td>
                                                        <td>Edinburgh</td>
                                                        <td>New York</td>
                                                        <td>$1500</td>
                                                        <td>$3200</td>
                                                        <td>
                                                            <label class="badge badge-info">On hold</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">2</td>
                                                        <td>2015/04/01</td>
                                                        <td>Doe</td>
                                                        <td>Brazil</td>
                                                        <td>$4500</td>
                                                        <td>$7500</td>
                                                        <td>
                                                            <label class="badge badge-danger">Pending</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">3</td>
                                                        <td>2010/11/21</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">4</td>
                                                        <td>2016/01/12</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">5</td>
                                                        <td>2017/12/28</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">6</td>
                                                        <td>2000/10/30</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-info">On-hold</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">1</td>
                                                        <td>2012/08/03</td>
                                                        <td>Edinburgh</td>
                                                        <td>New York</td>
                                                        <td>$1500</td>
                                                        <td>$3200</td>
                                                        <td>
                                                            <label class="badge badge-info">On hold</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">2</td>
                                                        <td>2015/04/01</td>
                                                        <td>Doe</td>
                                                        <td>Brazil</td>
                                                        <td>$4500</td>
                                                        <td>$7500</td>
                                                        <td>
                                                            <label class="badge badge-danger">Pending</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">3</td>
                                                        <td>2010/11/21</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">4</td>
                                                        <td>2016/01/12</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">5</td>
                                                        <td>2017/12/28</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">6</td>
                                                        <td>2000/10/30</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-info">On-hold</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">1</td>
                                                        <td>2012/08/03</td>
                                                        <td>Edinburgh</td>
                                                        <td>New York</td>
                                                        <td>$1500</td>
                                                        <td>$3200</td>
                                                        <td>
                                                            <label class="badge badge-info">On hold</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">2</td>
                                                        <td>2015/04/01</td>
                                                        <td>Doe</td>
                                                        <td>Brazil</td>
                                                        <td>$4500</td>
                                                        <td>$7500</td>
                                                        <td>
                                                            <label class="badge badge-danger">Pending</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">3</td>
                                                        <td>2010/11/21</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">4</td>
                                                        <td>2016/01/12</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">5</td>
                                                        <td>2017/12/28</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">6</td>
                                                        <td>2000/10/30</td>
                                                        <td>Sam</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-info">On-hold</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">7</td>
                                                        <td>2011/03/11</td>
                                                        <td>Cris</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">8</td>
                                                        <td>2015/06/25</td>
                                                        <td>Tim</td>
                                                        <td>Italy</td>
                                                        <td>$6300</td>
                                                        <td>$2100</td>
                                                        <td>
                                                            <label class="badge badge-info">On-hold</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">9</td>
                                                        <td>2016/11/12</td>
                                                        <td>John</td>
                                                        <td>Tokyo</td>
                                                        <td>$2100</td>
                                                        <td>$6300</td>
                                                        <td>
                                                            <label class="badge badge-success">Closed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">10</td>
                                                        <td>2003/12/26</td>
                                                        <td>Tom</td>
                                                        <td>Germany</td>
                                                        <td>$1100</td>
                                                        <td>$2300</td>
                                                        <td>
                                                            <label class="badge badge-danger">Pending</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-primary">View</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0"
                                                            aria-controls="order-listing" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="Order #: activate to sort column descending"
                                                            style="width: 51.25px;">Order #</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Purchased On: activate to sort column ascending"
                                                            style="width: 90px;">Purchased On</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Customer: activate to sort column ascending"
                                                            style="width: 63.75px;">Customer</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Ship to: activate to sort column ascending"
                                                            style="width: 46.25px;">Ship to</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Base Price: activate to sort column ascending"
                                                            style="width: 67.5px;">Base Price</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Purchased Price: activate to sort column ascending"
                                                            style="width: 103.75px;">Purchased Price</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Status: activate to sort column ascending"
                                                            style="width: 55px;">Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 52.5px;">Actions</th>
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
