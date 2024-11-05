
<div class="content-wrapper">
    <div class="container-fluid" style='padding: 2rem;'>
        <div class="row">

            <div class="col-sm-12">
                <div class="form-group">
                    <a class="btn btn-success create-btn" href="inbox/new"><span class="btn-label"><i class="fas fa-plus"></i></span> ADD TRANSACTION</a>
                </div>

                <div class="trans-layout card  mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-file-import"></i> INCOMING TRANSACTIONS</h6>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <table id="myTable" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th>ODTS No.</th>
                            <th>Category</th>
                            <th>Transaction Details</th>
                            <th>Forwarded By</th>
                            <th>Desired Action/Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dms_list as $dl) : ?>
                            <?php if($dl['ts_forwarded_to_id'] == $_SESSION['userid']) : ?>
                            <tr class="table-active"> 
                                <td><?php echo $dl['reference_no']; ?></td>
                                <td>
                                    <?php echo $dl['main_category']; ?>
                                </td>
                                <td>
                                    <b>[<?php echo $dl['sub_category']; ?>]</b><br>
                                    <?php echo $dl['subject_name']; ?>
                                </td>
                                <td>
                                    <b>
                                        <?php 
                                            foreach($user_list as $ul){
                                                if($ul['id'] == $dl['ts_forwarded_by_id']){
                                                    echo $ul['name'];
                                                }
                                            }
                                        ?>
                                    </b>
                                    <br>
                                    <?php echo date('F j, Y', strtotime($dl['ts_forwarded_date'])); ?>
                                </td>
                                <td>
                                    <b><?php echo $dl['ts_action']; ?></b><br>
                                    <?php echo $dl['ts_remarks']; ?>
                                </td>
                                <td>
                                    <button type="button" class="viewbtn btn btn-info btn-sm waves-effect waves-light" data-toggle="modal" data-target="#viewTransactionModal<?php echo $dl['id']; ?>">View</button>
                                </td>
                            </tr>   
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <?php foreach($dms_list as $dl) : ?>
    <!-- HISTORY APPLICATION -->
    <div id="viewTransactionModal<?php echo $dl['id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl" >
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">View Transaction</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body table-responsive" style="align-self:center; width: 100%;">  

                
                
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
            </div>

            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>