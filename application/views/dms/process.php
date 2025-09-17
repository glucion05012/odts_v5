<div class="content-wrapper">
    <div class="container-fluid" style='padding: 2rem;'>
        <div class="row">

            <div class="col-sm-12">

                <div class="trans-layout card  mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold"><i class="fas fa-share-square"></i> PROCESS TRANSACTION</h6>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 style='text-align:center'>Transaction No.</h4>
                        <h5 style='text-align:center;'>
                            <a style='text-align:center; color: blue' href="" data-toggle="modal"data-target="#viewTransactionModal" >[<?php echo $dms_transaction_list_one['reference_no']; ?>]</a>
                        </h5>
                        <input type="hidden" id="dms_id" value="<?php echo $dms_transaction_list_one['dms_id']; ?>">
                    </div>
                    <!-- 1st row -->
                    <div class="col-sm-3">
                        <label for="category">
                            Category: <span style="color:red">*</span>
                        </label>
                        <select name="category" id="category" class="form-control" required disabled>
                            <option value="" selected disabled>-- SELECT --</option>
                            <?php foreach($category_list as $cl) : ?>
                                <option <?= $dms_transaction_list_one['category_id'] == $cl['id'] ? 'selected=""' : '' ?> value="<?= $cl['id']; ?>" ><?= $cl['main_category']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>  
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3">
                        <label>Assign To:</label> 
                    </div>  
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3">
                        <label for="division">
                            Division: <span style="color:red">*</span>
                        </label>
                        <select name="division" id="division" class="form-control" required>
                            <option value="" selected disabled>-- SELECT --</option>
                        </select>
                    </div>  

                    <!-- 2nd row -->
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="sub_category">
                            Sub-Category: <span style="color:red">*</span>
                        </label>
                        <select name="sub_category" id="sub_category" class="form-control" required disabled>
                        <?php foreach($sub_category_list as $scl) : ?>
                            <option <?= $dms_transaction_list_one['sub_category_id'] == $scl['id'] ? 'selected=""' : '' ?> value="<?= $scl['id']; ?>" ><?= $scl['sub_category']; ?></option>
                        <?php endforeach; ?>
                        </select>
                        
                        <!-- check if Special Order is internal or external -->
                        <!-- <?php 
                            $isatuoSO = 0;
                            if($dms_transaction_list_one['sub_category_id'] == 75){
                                foreach($notice_list as $nl)   {
                                    if($dms_transaction_list_one['dms_id'] === $nl['dms_id']){
                                        $isatuoSO = 1;
                                    }
                                }
                            }
                        ?> -->

                        <!-- <input type="hidden" id="isautoSO" value="<?php echo $isatuoSO ; ?>"> -->
                        <input type="hidden" id="isautoSO" value="<?php echo $dms_transaction_list_one['so_exists'] ; ?>">

                    </div>  
                    <div class="col-sm-1" style='padding-top: 1rem'></div>
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="office">
                            Select Office: <span style="color:red">*</span>
                        </label>
                        <?php foreach($office_list as $ol){
                            if($ol['office_id'] == $dms_transaction_list_one['office_id']){
                                $office_address = $ol['office_address'];
                                $longitude = $ol['long'];
                                $latitude = $ol['lat'];
                            }
                        }; ?>
                        <select name="office" id="office" class="form-control" required>
                            <option value="" selected disabled>-- SELECT --</option>
                            <?php foreach($office_list as $ol) : ?>
                                <option <?= $dms_transaction_list_one['office_id'] == $ol['office_id'] ? 'selected=""' : '' ?> value="<?= $ol['office_id']; ?>" ><?= $ol['abbreviation']; ?></option>
                            <?php endforeach; ?>
                            
                        </select>
                    </div>  
                    <div class="col-sm-1" style='padding-top: 1rem'></div>
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="section">
                            Section: <span style="color:red">*</span>
                        </label>
                        <select name="section" id="section" class="form-control" required>
                        <option value="" selected disabled>-- SELECT --</option>
                        </select>
                    </div>  

                    <!-- 3rd row -->
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="subject">
                            Subject Name: <span style="color:red">*</span>
                        </label>
                        <textarea name="subject" id="subject" rows="6" cols="50" class="form-control" required><?php echo $dms_transaction_list_one['subject_name']; ?></textarea>
                    </div>  
                    <div class="col-sm-1" style='padding-top: 1rem'></div>
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="office_address">
                            Address:
                        </label>
                        <textarea name="office_address" id="office_address" rows="6" cols="50" class="form-control" readonly><?php echo $office_address; ?></textarea>
                    </div>  
                    <div class="col-sm-1" style='padding-top: 1rem'></div>
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="personnel">
                            Personnel: <span style="color:red">*</span>
                        </label>
                        <select name="personnel" id="personnel" class="form-control" required>
                        <option value="" selected disabled>-- SELECT --</option>
                        </select>

                        <label for="action" style="padding-top:1rem">
                            Action: <span style="color:red">*</span>
                        </label>
                        <select name="action" id="action" class="form-control" required>
                            <option value="" selected disabled>-- SELECT --</option>
                            <?php foreach($action_list as $al) : ?>
                                <option value="<?= $al['id']; ?>" ><?= $al['display']; ?></option>
                            <?php endforeach; ?>
                            <?php
                            $allowed_users = [1465, 100, 1400, 562, 103, 567, 560, 550, 554, 552, 565, 470, 551, 1360, 2085, 484, 549, 428, 1352, 1406, 275, 1520, 3593, 328];

                            if (in_array((int)$_SESSION['userid'], $allowed_users, true)) :
                            ?>
                                <option value="0">M - Filed/Closed</option>
                            <?php endif; ?>
                        </select>
                    </div> 

                    <!-- 4th row -->
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="document_type">
                            Tag Document Type As: <span style="color:red">*</span>
                        </label>
                        <select name="document_type" id="document_type" class="form-control" required disabled>
                        <option value="" selected disabled>-- SELECT --</option>
                        <option <?= $dms_transaction_list_one['document_type'] == 'For Compliance' ? 'selected=""' : '' ?> value="For Compliance" >For Compliance</option>
                        <option <?= $dms_transaction_list_one['document_type'] == 'Confidential' ? 'selected=""' : '' ?> value="Confidential" >Confidential</option>
                        </select>
                    </div>  
                    <div class="col-sm-1" style='padding-top: 1rem'></div>
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="geocoordinates">
                            Geo Coordinates:
                        </label>
                        <input type="text" class="form-control" name="longitude" id="longitude" value="<?php echo $longitude; ?>" readonly>
                        <input type="text" class="form-control" name="latitude" id="latitude" value="<?php echo $latitude; ?>" readonly>
                    </div>  
                    <div class="col-sm-1" style='padding-top: 1rem'></div>
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="remarks">
                            Remarks: <span style="color:red">*</span>
                        </label>
                        <textarea name="remarks" id="remarks" rows="6" cols="50" class="form-control" required></textarea>
                    </div>

                    <div class="col-sm-4" style='padding-top: 1rem'></div>
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="remarks" style='padding-top: 1rem'>
                            Attachment Type: <span style="color:red">*</span>
                        </label>
                        <select name="attach_type" id="attach_type" class="form-control" required>
                            <option value="" selected disabled>-- SELECT --</option>
                            <option value="Hard Copy">Hard Copy</option>
                            <option value="Attachment">Attachment</option>
                        </select>
                    </div>

                    <div class="col-sm-1" style='padding-top: 1rem'></div>
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="attachment" style='padding-top: 1rem'>
                            Attachment:
                        </label>
                        <span style="font-weight: normal; color: blue"> (max. size of 100 MB per attachment)</span> <span style="font-weight: normal; color: red">-required</span>
                        <!-- <input type="file" name="fileToUpload[]" id="fileToUpload" class="form-control" style="margin: 0px;" multiple> -->

                        <!-- ------------------------- drop zone ------------------------- -->
                        <div class="dropzone" id="myDropzone"></div>
                        <br>
                        <button type="button" class="btn btn-outline-danger btn-sm" id="remove_all">
                            <i class="fas fa-trash"></i>
                            <span>Remove All</span>
                        </button>
                        <!-- ------------------------- drop zone end ------------------------- -->
                    </div>
                    
                </div>  
            </div>

            <div class="col-sm-12" style="text-align:right; padding-top: 2rem; padding-right: 8rem;">
                <button type="submit" name="process_transaction" id="process_transaction" class="btn btn-success btn-icon-split" value="process_transaction"><span class="text"> <i class="fas fa-share-square"></i> Process</span></button>
            </div>
        </div>
    </div>
    
    <!-- -------------------------- View Transaction -------------------------- -->
    <div id="viewTransactionModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl" >
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">View Transaction</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body table-responsive" style="align-self:center; width: 100%;">  
            
            <ul class="nav nav-tabs" id="myTab<?php echo $dms_transaction_list_one['dms_id']; ?>" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="transaction-details-tab<?php echo $dms_transaction_list_one['dms_id']; ?>" data-bs-toggle="tab" href="#transaction-details<?php echo $dms_transaction_list_one['dms_id']; ?>" role="tab" aria-controls="transaction-details" aria-selected="true">Transaction Details</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="history-tab<?php echo $dms_transaction_list_one['dms_id']; ?>" data-bs-toggle="tab" href="#history<?php echo $dms_transaction_list_one['dms_id']; ?>" role="tab" aria-controls="history" aria-selected="false">History</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent<?php echo $dms_transaction_list_one['dms_id']; ?>">
                <div class="tab-pane fade show active" id="transaction-details<?php echo $dms_transaction_list_one['dms_id']; ?>" role="tabpanel" aria-labelledby="transaction-details-tab">
                    <div class="row">
                        <?php 
                            foreach($office_list as $ol){
                                if($ol['office_id'] == $dms_transaction_list_one['office_id']){
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
                                <input type="text" name="reference_no" value="<?php echo $dms_transaction_list_one['reference_no']; ?>" disabled />
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <br>
                                <input type="text" name="category" value="<?php echo $dms_transaction_list_one['main_category']; ?>" disabled />
                            </div>

                            <div class="form-group">
                                <label for="sub_category">Sub-Category</label>
                                <br>
                                <input type="text" name="sub_category" value="<?php echo $dms_transaction_list_one['sub_category']; ?>" disabled />
                            </div>

                            <div class="form-group">
                                <label for="subject_name">Subject Name</label>
                                <br>
                                <textarea name="subject_name" rows="6" cols="50" class="form-control"  disabled><?php echo $dms_transaction_list_one['subject_name']; ?></textarea>
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
                                                if($ul['id'] == $dms_transaction_list_one['forwarded_to_id']){
                                                    echo $ul['name'];
                                                }
                                            }
                                        ?>
                                        " disabled />
                            </div>

                            <div class="form-group">
                                <label for="action">Action</label>
                                <br>
                                <input type="text" name="action" value="<?php echo $dms_transaction_list_one['action']; ?>" disabled />
                            </div>

                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <br>
                                <textarea name="remarks" rows="6" cols="50" class="form-control"  disabled><?php echo $dms_transaction_list_one['remarks']; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="history<?php echo $dms_transaction_list_one['dms_id']; ?>" role="tabpanel" aria-labelledby="history-tab">
                    <div style=" background-color: gray; color: white; font-size: 18px; font-weight: bolder; text-align: center"> TRANSACTION HISTORY </div>
                    <p style="text-align: center">[<?php echo $dms_transaction_list_one['reference_no']; ?>]<br><?php if($dms_transaction_list_one['document_type'] == "Confidential"){ echo '<i style="color:red">['.$dms_transaction_list_one['document_type'].']</i>'; }; ?></p>

                    <table id="myTable<?php echo $dms_transaction_list_one['dms_id'];?>" class="table table-striped table-bordered table-sm align">
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
                            <?php $dms_id = $dms_transaction_list_one['dms_id']; ?>
                            <?php $reference_no = $dms_transaction_list_one['reference_no']; ?>

                            <?php foreach($dms_transaction_list as $dtl) : ?>
                                <?php if($dms_id == $dtl['dms_id']) : ?>
                                    <tr>
                                        <td><?php echo $dtl['id']; ?></td>
                                        <td>
                                            <?php 
                                                $unixTime = strtotime($dtl['timestamp_forwarded_date']);
                                                $newDate = date("F j, Y h:i a", $unixTime);
                                                echo $newDate; 
                                                // if($dtl['main_dms_id']!=''){
                                                //     echo "<br><i style='color:orange'>[multiple]</i>";
                                                // }
                                            ?>
                                        </td>
                                        <td><?php echo $dtl['sub_category']; ?></td>
                                        <!-- <td><?php echo $dtl['action_name']; ?></td> -->
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
                                                            <!-- <a href="<?php echo $dal['file_location'] ?>" target="_blank"><?php echo $dal['file_name']; ?></a>  -->
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php else: ?>
                                            <?php if($dtl['sub_category_id'] == 75) : ?>
                                                <?php foreach($notice_list as $nl) : ?>   
                                                    <?php if($dtl['dms_id'] === $nl['dms_id']) : ?>
                                                        <a class="viewbtn btn btn-info btn-sm waves-effect waves-light" target="_blank" href="<?php echo base_url(); ?>notice/so/view/<?php echo $nl['id']; ?>"><span class="btn-label"> View</a>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                ---
                                            <?php endif; ?>
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

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>
    <!-- -------------------------- View Transaction -------------------------- -->
</div>
<style>
    .dz-error-mark svg g g {
        fill: #c00;
    }
    .dropzone .dz-preview.dz-success .dz-success-mark {
        opacity: 1;
    }
</style>
<script>
    var base_url = <?php echo json_encode(base_url()); ?>;
    // ----------------------------------- dropzone -----------------------------------
    Dropzone.options.myDropzone = {
    url: base_url + "Uploadcontroller",
    autoProcessQueue: false,
    paramName: "file",
    parallelUploads: 100,
    clickable: true,
    maxFilesize: 100, //in mb
    addRemoveLinks: true,
    acceptedFiles: 'image/*,application/pdf,.docx,.doc,.xlsx,.xls,.xlsm,.pptx,.ppt,.pub,.zdoc,.zsheet,.zshow',
    uploadMultiple: true,
    dictDefaultMessage: "Upload your file here",
    init: function() {
        // this.on("sending", function(file, xhr, formData) {
        // console.log("sending file");
        // });
        // this.on("success", function(file, responseText) {
        // console.log('great success');
        // });
        // this.on("addedfile", function(file){
        //     console.log('file added');
        // });
    }
    };

    $(document).on('click', '#remove_all', function(){
        Dropzone.forElement('#myDropzone').removeAllFiles(true)
    });
    // ----------------------------------- dropzone end -----------------------------------




    $('#category').change(function(){
        var category_id = $('#category').val();
        $("#sub_category").empty();

        $('#sub_category').append(`<option value="" selected disabled>-- SELECT --</option>`);
        <?php foreach($sub_category_list as $scl) : ?>
            if(<?php echo $scl['cat_id']; ?> == category_id){
                $('#sub_category').append(`<option value="<?php echo $scl['id']; ?>">
                            <?php echo $scl['sub_category']; ?>
                            </option>`);
            }
        <?php endforeach; ?>
    });

    // load edit division
    $("#division").empty();
    $('#division').append(`<option value="" selected disabled>-- SELECT --</option>`);
    <?php foreach($division_list as $dl) : ?>
        if(<?php echo $dms_transaction_list_one['office_id']; ?> == 3 || <?php echo $dms_transaction_list_one['office_id']; ?> == 5 || <?php echo $dms_transaction_list_one['office_id']; ?> == 6 || <?php echo $dms_transaction_list_one['office_id']; ?> == 7){
            if('<?php echo $dl['division_id']; ?>' == 11){
                $('#division').append(`<option value="<?php echo $dl['division_id']; ?>">
                    <?php echo $dl['division']; ?>
                    </option>`);
            }
        }else if('<?php echo $dl['office_id']; ?>' == <?php echo $dms_transaction_list_one['office_id']; ?>){
            $('#division').append(`<option value="<?php echo $dl['division_id']; ?>">
                <?php echo $dl['division']; ?>
                </option>`);
            }
    <?php endforeach; ?>

    $('#office').change(function(){
        var office_id = $('#office').val();
        var office_address = '';
        var longitude = '';
        var latitude = '';

        $("#division").empty();
        $("#section").empty();
        $("#personnel").empty();
        $('#action option[value=""]').prop('selected', true);

        $('#division').append(`<option value="" selected disabled>-- SELECT --</option>`);
        $('#section').append(`<option value="" selected disabled>-- SELECT --</option>`);
        $('#personnel').append(`<option value="" selected disabled>-- SELECT --</option>`);

        
        <?php foreach($office_list as $ol) : ?>
            if(<?php echo $ol['office_id']; ?> == office_id){
                office_address = '<?php echo $ol['office_address']; ?>';
                longitude = '<?php echo $ol['long']; ?>';
                latitude = '<?php echo $ol['lat']; ?>';
            }
        <?php endforeach; ?>
        
        $('#office_address').val(office_address)
        $('#longitude').val(longitude)
        $('#latitude').val(latitude)

        
        <?php foreach($division_list as $dl) : ?>
            if(office_id == 3 || office_id == 5 || office_id == 6 || office_id == 7){
                if('<?php echo $dl['division_id']; ?>' == 11){
                    $('#division').append(`<option value="<?php echo $dl['division_id']; ?>">
                        <?php echo $dl['division']; ?>
                        </option>`);
                }
            }else if('<?php echo $dl['office_id']; ?>' == office_id){
                $('#division').append(`<option value="<?php echo $dl['division_id']; ?>">
                    <?php echo $dl['division']; ?>
                    </option>`);
                }
        <?php endforeach; ?>
    });

    $('#division').change(function(){
        var division_id = $('#division').val();
        $("#section").empty();
        $('#section').append(`<option value="" selected disabled>-- SELECT --</option>`);
        $("#personnel").empty();
        $('#personnel').append(`<option value="" selected disabled>-- SELECT --</option>`);
        $('#action option[value=""]').prop('selected', true);
        
        <?php foreach($section_list as $sl) : ?>
           if('<?php echo $sl['division_id']; ?>' == division_id){
                $('#section').append(`<option value="<?php echo $sl['section_id']; ?>">
                    <?php echo $sl['section']; ?>
                    </option>`);
                }
        <?php endforeach; ?>
    });

    $('#section').change(function(){
        var section_id = $('#section').val();
        $("#personnel").empty();
        $('#personnel').append(`<option value="" selected disabled>-- SELECT --</option>`);
        $('#action option[value=""]').prop('selected', true);
        
        <?php foreach($user_list as $ul) : ?>
           if('<?php echo $ul['section']; ?>' == section_id){
                $('#personnel').append(`<option value="<?php echo $ul['id']; ?>">
                    <?php echo $ul['name']; ?>
                    </option>`);
                }
        <?php endforeach; ?>
    });

    $('#process_transaction').click(function() {
        <?php if(isset($_SESSION['userid'])) : ?>
            Swal.fire({
                title: "Confirm Forward Transaction.",
                text: "Are you sure you want to process Transaction?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Proceed"
            }).then((result) => {
                if (result.isConfirmed) {
                    //return true
                    var completefields = 1;
                    // check input box if filled out
                    if($("#category").find(":selected").val() == ""){
                        $("#category").css({'border-color': 'red', 'border-width': '2px'})
                        completefields = 0;
                    }else{
                        $("#category").css({'border-color': 'black', 'border-width': 'thin'})
                    }

                    if($("#sub_category").find(":selected").val() == ""){
                        $("#sub_category").css({'border-color': 'red', 'border-width': '2px'})
                        completefields = 0;
                    }else{
                        $("#sub_category").css({'border-color': 'black', 'border-width': 'thin'})
                    }

                    if($("#subject").val() == ""){
                        $("#subject").css({'border-color': 'red', 'border-width': '2px'})
                        completefields = 0;
                    }else{
                        $("#subject").css({'border-color': 'black', 'border-width': 'thin'})
                    }

                    if($("#document_type").find(":selected").val() == ""){
                        $("#document_type").css({'border-color': 'red', 'border-width': '2px'})
                        completefields = 0;
                    }else{
                        $("#document_type").css({'border-color': 'black', 'border-width': 'thin'})
                    }

                    if($("#attach_type").find(":selected").val() == ""){
                        $("#attach_type").css({'border-color': 'red', 'border-width': '2px'})
                        completefields = 0;
                    }else{
                        $("#attach_type").css({'border-color': 'black', 'border-width': 'thin'})
                    }

                    if($("#office").find(":selected").val() == ""){
                        $("#office").css({'border-color': 'red', 'border-width': '2px'})
                        completefields = 0;
                    }else{
                        $("#office").css({'border-color': 'black', 'border-width': 'thin'})
                    }

                    if($("#division").find(":selected").val() == ""){
                        $("#division").css({'border-color': 'red', 'border-width': '2px'})
                        completefields = 0;
                    }else{
                        $("#division").css({'border-color': 'black', 'border-width': 'thin'})
                    }

                    if($("#section").find(":selected").val() == ""){
                        $("#section").css({'border-color': 'red', 'border-width': '2px'})
                        completefields = 0;
                    }else{
                        $("#section").css({'border-color': 'black', 'border-width': 'thin'})
                    }

                    if($("#personnel").find(":selected").val() == ""){
                        $("#personnel").css({'border-color': 'red', 'border-width': '2px'})
                        completefields = 0;
                    }else{
                        $("#personnel").css({'border-color': 'black', 'border-width': 'thin'})
                    }

                    if($("#action").find(":selected").val() == ""){
                        $("#action").css({'border-color': 'red', 'border-width': '2px'})
                        completefields = 0;
                    }else{
                        $("#action").css({'border-color': 'black', 'border-width': 'thin'})
                    }

                    if($("#remarks").val() == ""){
                        $("#remarks").css({'border-color': 'red', 'border-width': '2px'})
                        completefields = 0;
                    }else{
                        $("#remarks").css({'border-color': 'black', 'border-width': 'thin'})
                    }


                    if(completefields == 1 && <?php echo $_SESSION['userid']; ?>!=''){

                        var base_url = <?php echo json_encode(base_url()); ?>;
                        var dms_id = $('#dms_id').val();
                        var category_id = $('#category').val();
                        var sub_category_id = $('#sub_category').val();
                        var subject_name = $('#subject').val();
                        var document_type = $('#document_type').val();
                        var attach_type = $('#attach_type').val();
                        var personnel_id = $('#personnel').val();
                        var action_id = $('#action').val();
                        var remarks = $('#remarks').val();
                        var office_id = $('#office').val();
                        var isautoSO = $('#isautoSO').val();
                        var userid = <?php echo $_SESSION['userid']; ?>;
                        if(action_id == 0){
                            var status = 'Closed';
                        }else{
                            var status = 'Pending';
                        }
                        
                        $.ajax({
                            data : {
                                    sub_category_id : sub_category_id,
                                    userid : userid,
                                    dms_id : dms_id,
                                    office_id : office_id,
                                    personnel_id : personnel_id,
                                    action_id : action_id,
                                    remarks : remarks,
                                    status : status,
                                    attach_type : attach_type,
                                    subject_name : subject_name,
                                    isautoSO : isautoSO
                                    }
                            , type: "POST"
                            , url: base_url + "Inboxcontroller/process_transaction"
                            , dataType: 'json'
                            , crossOrigin: false
                            , success: function(res) {
                                let resf = JSON.stringify(res[0]['forwarded_to_id']);
                                let f_id = (JSON.parse(resf));
                                var for_name = 'Unknown';

                                <?php foreach($user_list as $ul) : ?>
                                    if(f_id == '<?php echo $ul['id']; ?>'){
                                        for_name = '<?php echo $ul['name']; ?>';
                                    }
                                <?php endforeach; ?>

                                var myDropzone = Dropzone.forElement("#myDropzone");
                                let resp = JSON.stringify(res[0]['reference_no']);
                                let refno = (JSON.parse(resp));
                                let resac = JSON.stringify(res[0]['action_id']);
                                let action_id = (JSON.parse(resac));
                                var countdz= myDropzone.files.length;
                                
                                if(countdz == 0){
                                    if(action_id == 0){
                                        Swal.fire({
                                        icon: "success",
                                        title: "Success",
                                        html: "Transaction Successfully Closed.",
                                        }).then(function(){ 
                                            window.location = "<?php  echo base_url('inbox'); ?>";
                                        });
                                    }else{
                                        Swal.fire({
                                        icon: "success",
                                        title: "Success",
                                        html: "Transaction Successfully Forwarded to <b style='color:blue'>" + for_name + "</b>.",
                                        }).then(function(){ 
                                            window.location = "<?php  echo base_url('inbox'); ?>";
                                        });
                                    }
                                        
                                }else{
                                    // attachment start
                                    myDropzone.processQueue();
                                    // attachment end

                                    myDropzone.on("queuecomplete", function(){
                                        if(action_id == 0){
                                            Swal.fire({
                                            icon: "success",
                                            title: "Success",
                                            html: "Transaction Successfully Closed.",
                                            }).then(function(){ 
                                                window.location = "<?php  echo base_url('inbox'); ?>";
                                            });
                                        }else{
                                            Swal.fire({
                                            icon: "success",
                                            title: "Success",
                                            html: "Transaction Successfully Forwarded to <b style='color:blue'>" + for_name + "</b>.",
                                            }).then(function(){ 
                                                window.location = "<?php  echo base_url('inbox'); ?>";
                                            });
                                        }
                                    });

                                }
                            
                                
                            }
                            , error: function(err) {
                                alert(err)
                            }
                        });
                        
                    }else{
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Please complete required fields.",
                        });
                    }
                }
            });
        <?php else : ?>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Please login again. Session Timeout.",
            }).then(function(){ 
                window.location = "<?php  echo base_url(); ?>"+'maintenance';
            });
        <?php endif; ?>
    });
</script>