
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
                <table id="myTable" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
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

                        <?php foreach($dms_list as $dl) : ?>
                            <?php if(($dl['ts_forwarded_to_id'] == $_SESSION['userid'] OR $dl['ts_forwarded_by_id'] == $_SESSION['userid']) AND $dl['document_type'] == 'For Compliance') : ?>
                                <tr class="table-active"> 
                                    <td><?php echo $dl['reference_no']; ?><br><?php if($dl['document_type'] == "Confidential"){ echo '<i style="color:red">['.$dl['document_type'].']</i>'; }; ?></td>
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
                                        <?php 
                                            $unixTime = strtotime($dl['ts_timestamp_forwarded_date']);
                                            $newDate = date("F j, Y h:i a", $unixTime);
                                            echo $newDate; 
                                        ?>
                                    </td>
                                    <td>
                                        <b>
                                            <?php 
                                                foreach($user_list as $ul){
                                                    if($ul['id'] == $dl['ts_forwarded_to_id']){
                                                        echo $ul['name'];
                                                    }
                                                }
                                            ?>
                                        </b>
                                        <br>
                                        <?php 
                                            $unixTime = strtotime($dl['ts_timestamp_forwarded_date']);
                                            $newDate = date("F j, Y h:i a", $unixTime);
                                            echo $newDate; 
                                        ?>
                                    </td>
                                    <td>
                                        <!-- <b><?php echo $dl['ts_action']; ?></b><br> -->
                                        <b><?php if($dl['ts_action_id']==0){ echo 'Filed/Closed'; }else{ echo $dl['ts_action']; }; ?></b> <i style='color:blue'>[<?php echo $dl['ts_attachment_type']; ?>]</i><br>
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
            
            <ul class="nav nav-tabs" id="myTab<?php echo $dl['id']; ?>" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="transaction-details-tab<?php echo $dl['id']; ?>" data-bs-toggle="tab" href="#transaction-details<?php echo $dl['id']; ?>" role="tab" aria-controls="transaction-details" aria-selected="true">Transaction Details</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="history-tab<?php echo $dl['id']; ?>" data-bs-toggle="tab" href="#history<?php echo $dl['id']; ?>" role="tab" aria-controls="history" aria-selected="false">History</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent<?php echo $dl['id']; ?>">
                <div class="tab-pane fade show active" id="transaction-details<?php echo $dl['id']; ?>" role="tabpanel" aria-labelledby="transaction-details-tab">
                    <div class="row">
                        <?php 
                            foreach($office_list as $ol){
                                if($ol['office_id'] == $dl['ts_office_id']){
                                    $office_name = $ol['abbreviation'];
                                    $office_address = $ol['office_address'];
                                    $longitude = $ol['long'];
                                    $latitude = $ol['lat'];
                                }
                            }; 
                        ?>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="reference_no">Transaction No.</label>
                                <br>
                                <input type="text" name="reference_no" value="<?php echo $dl['reference_no']; ?>" disabled />
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <br>
                                <input type="text" name="category" value="<?php echo $dl['main_category']; ?>" disabled />
                            </div>

                            <div class="form-group">
                                <label for="sub_category">Sub-Category</label>
                                <br>
                                <input type="text" name="sub_category" value="<?php echo $dl['sub_category']; ?>" disabled />
                            </div>

                            <div class="form-group">
                                <label for="subject_name">Subject Name</label>
                                <br>
                                <textarea name="subject_name" rows="6" cols="50" class="form-control"  disabled><?php echo $dl['subject_name']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                 <label for="reference_no">Office</label>
                                <br>
                                <input type="text" name="reference_no" value="<?php echo $office_name; ?>" disabled />
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <br>
                                <textarea name="address" rows="6" cols="50" class="form-control"  disabled><?php echo $office_address; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="geo_coordinates">Geo Coordinates</label>
                                <br>
                                <input type="text" name="geo_coordinates" value="<?php echo $longitude .', '. $latitude; ?>" disabled />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="reference_no">Assigned to:</label>
                                <br>
                                <input type="text" name="reference_no" value="<?php 
                                            foreach($user_list as $ul){
                                                if($ul['id'] == $dl['ts_forwarded_to_id']){
                                                    echo $ul['name'];
                                                }
                                            }
                                        ?>
                                        " disabled />
                            </div>

                            <div class="form-group">
                                 <label for="action">Action</label>
                                <br>
                                <input type="text" name="action" value="<?php if($dl['ts_action']==0){ echo 'Filed/Closed'; }else{ echo $dl['ts_action']; }; ?>" disabled />
                            </div>

                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <br>
                                <textarea name="remarks" rows="6" cols="50" class="form-control"  disabled><?php echo $dl['ts_remarks']; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="history<?php echo $dl['id']; ?>" role="tabpanel" aria-labelledby="history-tab">
                    <div style=" background-color: gray; color: white; font-size: 18px; font-weight: bolder; text-align: center"> TRANSACTION HISTORY </div>
                    <p style="text-align: center">[<?php echo $dl['reference_no']; ?>]<br><?php if($dl['document_type'] == "Confidential"){ echo '<i style="color:red">['.$dl['document_type'].']</i>'; }; ?></p>

                    <table id="myTable<?php echo $dl['id'];?>" class="table table-striped table-bordered table-sm align">
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
                            <?php $dms_id = $dl['id']; ?>
                            <?php $reference_no = $dl['reference_no']; ?>

                            <?php foreach($dms_transaction_list as $dtl) : ?>
                                <?php if($dms_id == $dtl['dms_id']) : ?>
                                    <tr>
                                        <td><?php echo $dtl['id']; ?></td>
                                        <td>
                                            <?php 
                                                $unixTime = strtotime($dtl['timestamp_forwarded_date']);
                                                $newDate = date("F j, Y h:i a", $unixTime);
                                                echo $newDate; 
                                            ?>
                                        </td>
                                        <td><?php echo $dtl['sub_category']; ?></td>
                                        <td><?php if($dtl['action_id']==0){ echo 'Filed/Closed'; }else{ echo $dtl['action_name']; }; ?></td>
                                        <td><?php echo $dtl['remarks']; ?></td>
                                        <td>
                                            <?php 
                                                foreach($user_list as $ul){
                                                    if($ul['id'] == $dtl['forwarded_by_id']){
                                                        foreach($section_list as $sl){
                                                            if($ul['section'] == $sl['section_id']){
                                                                $sec_res = $sl['abbr'];
                                                            }
                                                        }

                                                        foreach($division_list as $dl){
                                                            if($ul['division'] == $dl['division_id']){
                                                                $div_res = $dl['abbr'];
                                                            }
                                                        }

                                                        echo $div_res.'|'.$sec_res.'|'.$ul['name'];
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                foreach($user_list as $ul){
                                                    if($ul['id'] == $dtl['forwarded_to_id']){
                                                        foreach($section_list as $sl){
                                                            if($ul['section'] == $sl['section_id']){
                                                                $sec_res = $sl['abbr'];
                                                            }
                                                        }

                                                        foreach($division_list as $dl){
                                                            if($ul['division'] == $dl['division_id']){
                                                                $div_res = $dl['abbr'];
                                                            }
                                                        }

                                                        echo $div_res.'|'.$sec_res.'|'.$ul['name'];
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <!-- <td><?php echo $dtl['status']; ?></td> -->
                                        <td><?php if($dtl['action_id']==0){ echo 'Filed/Closed'; }else{ echo $dtl['status']; }; ?><br><i style='color:blue'>[<?php echo $dtl['attachment_type']; ?>]</i></td>
                                        <td>
                                        <?php 
                                            $with_attach = 0;
                                            foreach($dms_attachment_list as $dal){
                                                if($dtl['id'] === $dal['dms_transaction_id']){
                                                    $with_attach = 1;
                                                }
                                            }
                                        ?>
                                        <?php if($with_attach == 1) : ?>
                                            <div class="dropdown">
                                                <button class="btn btn-info btn-sm waves-effect waves-light" type="button" data-toggle="dropdown" aria-expanded="false">View <i class="far fa-caret-square-down"></i></button> 
                                                <ul class="dropdown-menu" style="max-height: 500px; overflow: auto; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(10px, 23px, 0px);" x-placement="bottom-start">
                                                <?php foreach($dms_attachment_list as $dal) : ?>   
                                                    <?php if($dtl['id'] === $dal['dms_transaction_id']) : ?>
                                                        <li>
                                                            <a href="<?php echo base_url($dal['file_location']); ?>" target="_blank"><?php echo $dal['file_name']; ?></a>
                                                            <!-- <a href="<?php echo $_SERVER['DOCUMENT_ROOT'] . $dal['file_location'] ?>" target="_blank"><?php echo $dal['file_name']; ?></a> -->
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php else: ?>
                                            ---
                                        <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>

                <!-- QR CODE IMAGE -->
                <div class="col-sm-6" style='margin-top:2rem;'>
                    <img src='https://quickchart.io/qr?text=<?php echo base_url(); ?>validator/<?php echo base64_encode($dms_id); ?>' width='150' height='150' alt='signature'></img>
                    <?php echo $reference_no; ?>
                    
                    <p><img src='<?php echo base_url()."assets/"; ?>denr-logo.png' width='50' height='50'>
                    <span style="font-size: 7px;">DENR NATIONAL CAPITAL REGION</span></p>
                </div>
            </div>
                
                
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a class="btn btn-sm btn-info mr-auto" target="_blank" href="df/<?php echo base64_encode($dms_id); ?>"><span class="btn-label"><i class="fas fa-print"></i></span> Print DF</a>

                <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
            </div>

            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
