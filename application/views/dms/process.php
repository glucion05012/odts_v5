<div class="content-wrapper">
    <div class="container-fluid" style='padding: 2rem;'>
        <div class="row">

            <div class="col-sm-12">

                <div class="trans-layout card  mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-share-square"></i> PROCESS TRANSACTION</h6>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 style='text-align:center'>Transaction No.</h4>
                        <h5 style='text-align:center; color: blue'>[<?php echo $dms_transaction_list_one['reference_no']; ?>]</h5>
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
                        <textarea name="subject" id="subject" rows="6" cols="50" class="form-control" required readonly><?php echo $dms_transaction_list_one['subject_name']; ?></textarea>
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
                                <option value="<?= $al['id']; ?>" ><?= $al['action']; ?></option>
                            <?php endforeach; ?>
                            <option value="0">Filed/Closed</option>
                        </select>
                    </div> 

                    <!-- 4th row -->
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="document_type">
                            Tag Document Type As: <span style="color:red">*</span>
                        </label>
                        <select name="document_type" id="document_type" class="form-control" required readonly>
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

                    <div class="col-sm-6" style='padding-top: 1rem'></div>
                    <div class="col-sm-6" style='padding-top: 1rem'>
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
        
        <?php foreach($user_list as $ul) : ?>
           if('<?php echo $ul['section']; ?>' == section_id){
                $('#personnel').append(`<option value="<?php echo $ul['id']; ?>">
                    <?php echo $ul['name']; ?>
                    </option>`);
                }
        <?php endforeach; ?>
    });

    
    $('#process_transaction').click(function() {

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


                if(completefields == 1){

                    var base_url = <?php echo json_encode(base_url()); ?>;
                    var dms_id = $('#dms_id').val();
                    var category_id = $('#category').val();
                    var sub_category_id = $('#sub_category').val();
                    var subject_name = $('#subject').val();
                    var document_type = $('#document_type').val();
                    var personnel_id = $('#personnel').val();
                    var action_id = $('#action').val();
                    var remarks = $('#remarks').val();
                    var office_id = $('#office').val();
                    if(action_id == 0){
                        var status = 'Closed';
                    }else{
                        var status = 'Pending';
                    }
                    
                    $.ajax({
                        data : {
                                dms_id : dms_id,
                                office_id : office_id,
                                personnel_id : personnel_id,
                                action_id : action_id,
                                remarks : remarks,
                                status : status,
                                }
                        , type: "POST"
                        , url: base_url + "Inboxcontroller/process_transaction"
                        , dataType: 'json'
                        , crossOrigin: false
                        , success: function(res) {
                            let resp = JSON.stringify(res[0]['forwarded_to_id']);
                            let f_id = (JSON.parse(resp));
                            var for_name = 'Unknown';

                            <?php foreach($user_list as $ul) : ?>
                                if(f_id == '<?php echo $ul['id']; ?>'){
                                    for_name = '<?php echo $ul['name']; ?>';
                                }
                            <?php endforeach; ?>
                            // attachment start
                            var myDropzone = Dropzone.forElement("#myDropzone");
                            myDropzone.processQueue();
                            // attachment end

                            myDropzone.on("queuecomplete", function(){
                                    Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    html: "Transaction Successfully Forwarded to <b style='color:blue'>" + for_name + "</b>.",
                                    }).then(function(){ 
                                        window.location = "<?php  echo base_url('inbox'); ?>";
                                });
                            });

                            
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
    });
</script>