
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
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dms_list as $dl) : ?>
                            <!-- if($dl['forwarded_to_id'] == $_SESSION['userid']) -->
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
                                    get from transaction history
                                </td>
                                <td>
                                    get from transaction history
                                </td>
                                <td>
                                </td>
                            </tr>   
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>