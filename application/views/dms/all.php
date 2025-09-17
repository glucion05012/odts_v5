<style>
    .dataTables_wrapper .dataTables_processing {
        /* position: absolute;
        top: 15% !important;
        opacity: 0.9;
        z-index: 5000; */
        background-color: #f0f0f0; 
        position: absolute;
        top: 0 !important;
        height: 100%;
        width: 100%;
        z-index: 1001;
    }
    .dataTables_paginate .paginate_button:last-child {
        display: none;
    }
    .dataTables_paginate .ellipsis {
        display: none;
    }
    #myTableList_previous {
        display: none;
    }
</style>
<div class="content-wrapper">
    <div class="container-fluid" style='padding: 2rem;'>
        <div class="row">

            <div class="col-sm-12">

                <div class="trans-layout card  mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold"><i class="fas fa-folder"></i> ALL TRANSACTIONS</h6>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <table id="myTableList" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th>ODTS No.</th>
                            <th>Category</th>
                            <th>Transaction Details</th>
                            <th>Forwarded By</th>
                            <th>Forwarded To</th>
                            <th>Desired Action/Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- View Moadal -->
    <div id="viewTransactionModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl" >
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">View Transaction</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body table-responsive" style="align-self:center; width: 100%;">  
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="transaction-details-tab" data-bs-toggle="tab" href="#transaction-details" role="tab" aria-controls="transaction-details" aria-selected="true">Transaction Details</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="history-tab" data-bs-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">History</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- transaction details tab -->
                    <div class="tab-pane fade show active" id="transaction-details" role="tabpanel" aria-labelledby="transaction-details-tab">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="reference_no">Transaction No.</label>
                                    <br>
                                    <input type="text" name="reference_no" disabled />
                                </div>

                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <br>
                                    <input type="text" name="category" disabled />
                                </div>

                                <div class="form-group">
                                    <label for="sub_category">Sub-Category</label>
                                    <br>
                                    <input type="text" name="sub_category" disabled />
                                </div>

                                <div class="form-group">
                                    <label for="subject_name">Subject Name</label>
                                    <br>
                                    <textarea name="subject_name" rows="6" cols="50" class="form-control"  disabled></textarea>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="reference_no">Office</label>
                                    <br>
                                    <input type="text" name="office_name" disabled />
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <br>
                                    <textarea name="address" rows="6" cols="50" class="form-control"  disabled></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="geo_coordinates">Geo Coordinates</label>
                                    <br>
                                    <input type="text" name="geo_coordinates" disabled />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="reference_no">Assigned to:</label>
                                    <br>
                                    <input type="text" name="assigned_to" disabled />
                                </div>

                                <div class="form-group">
                                    <label for="action">Action</label>
                                    <br>
                                    <input type="text" name="action" disabled />
                                </div>

                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <br>
                                    <textarea name="remarks" rows="6" cols="50" class="form-control"  disabled></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- QR CODE IMAGE -->
                        <div class="col-sm-6" style='margin-top:2rem;'>
                            <img id='qr_code' width='150' height='150' alt='signature'></img>
                            <span id="ref_no"></span>
                            
                            <p><img src='<?php echo base_url()."assets/"; ?>denr-logo.png' width='50' height='50'>
                            <span style="font-size: 7px;">DENR NATIONAL CAPITAL REGION</span></p>
                        </div>
                    </div>
                    
                    <!-- history tab -->
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                        <div style=" background-color: gray; color: white; font-size: 18px; font-weight: bolder; text-align: center"> TRANSACTION HISTORY </div>
                        <p style="text-align: center" id="history_reference_no"></p>

                        <table id="historyTable" class="table table-striped table-bordered table-sm align" style="width: 100% !important;">
                            <thead>
                                    <th>ID</th>
                                    <th>Date Received</th>
                                    <th>Transaction Type</th>
                                    <th>Action</th>
                                    <th>Remarks</th>
                                    <th>From</th>
                                    <th>Assigned</th>
                                    <th>Status</th>
                                    <th>View Attachment</th>
                            </thead>

                            <tbody>
                            </tbody>

                        </table>
                    </div>
                </div>
                    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <a class="btn btn-sm btn-info mr-auto" target="_blank" id="df" ><span class="btn-label"><i class="fas fa-print"></i></span> Print DF</a>

                    <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(e){
        var base_url = "<?php echo base_url();?>";
        $('#myTableList').DataTable({
            'pageLength': 10,
            'serverSide': true,
            'processing': true,
            'ordering': false,
            "bDestroy": true,
            'order': [],
            'ajax': {
                url : base_url+'Inboxcontroller/dms_list_ajax',
                type : 'POST'
            },
            language: {
                searchPlaceholder: 'Search ODTS No. or Subject Name',
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><div class="loading-text">Loading...</div> '
            }
        });
    });

    $(document).on('click', '#viewBtn', function() {
        var id = $(this).val();
        var base_url = "<?php echo base_url();?>";
        $.ajax({
                url: base_url + "Inboxcontroller/dms_list_ajax_fetch/" + id,
                method: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    $('#viewTransactionModal').modal('show');
                    if (data != 0) {
                        // transaction details data
                        $('#qr_code').attr('src','https://quickchart.io/qr?text='+base_url+'validator/'+data[0].enc_id);
                        $('#ref_no').html(data[0].reference_no);
                        $('input[name=reference_no]').val(data[0].reference_no);
                        $('input[name=category]').val(data[0].main_category);
                        $('input[name=sub_category]').val(data[0].sub_category);
                        $('textarea[name=subject_name]').val(data[0].subject_name);
                        $('input[name=office_name]').val(data[0].office_name);
                        $('textarea[name=address]').val(data[0].office_address);
                        $('input[name=geo_coordinates]').val(data[0].office_longitude+', '+data[0].office_latitude);
                        $('input[name=assigned_to]').val(data[0].assigned_to);
                        $('input[name=action]').val(data[0].action_name);
                        $('textarea[name=remarks]').val(data[0].ts_remarks);
                        $('#df').attr("href", data[0].df_url)

                        // history data
                        $('#history_reference_no').html(data[0].history_reference_no);
                    } else {
                        console.log("No record exists", "Error");
                    }
                }
            });

            // history table
            var base_url = "<?php echo base_url();?>";
            $('#historyTable').DataTable({
                'order': [[0, "desc"]],
                "bDestroy": true,
                'ajax': {
                    url : base_url+'Inboxcontroller/dms_history_list_ajax_all/' + id,
                    type : 'POST',
                },
            });
    });
</script>