<div class="content-wrapper">
    <div class="container-fluid" style='padding: 2rem;'>
        <div class="row">

            <div class="col-sm-12">

                <div class="trans-layout card  mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> ADD NEW TRANSACTION</h6>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <!-- 1st row -->
                    <div class="col-sm-3">
                        <label for="category">
                            Category
                        </label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="" selected disabled>-- SELECT --</option>
                            <?php foreach($category_list as $cl) : ?>
                                <option value="<?= $cl['id']; ?>" ><?= $cl['main_category']; ?></option>
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
                            Division:
                        </label>
                        <select name="division" id="division" class="form-control" required>
                        <option value="" selected disabled>-- SELECT --</option>
                            <option value="division1">division1</option>
                            <option value="division2">division2</option>
                        </select>
                    </div>  

                    <!-- 2nd row -->
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="sub_category">
                            Sub-Category:
                        </label>
                        <select name="sub_category" id="sub_category" class="form-control" required>
                        <option value="" selected disabled>-- SELECT --</option>
                        </select>
                    </div>  
                    <div class="col-sm-1" style='padding-top: 1rem'></div>
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="office">
                            Select Office:
                        </label>
                        <select name="office" id="office" class="form-control" required>
                            <option value="" selected disabled>-- SELECT --</option>
                            <?php foreach($office_list as $ol) : ?>
                                <option value="<?= $ol['office_id']; ?>" ><?= $ol['office_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>  
                    <div class="col-sm-1" style='padding-top: 1rem'></div>
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="section">
                            Section:
                        </label>
                        <select name="section" id="section" class="form-control" required>
                        <option value="" selected disabled>-- SELECT --</option>
                            <option value="section1">section1</option>
                            <option value="section2">section2</option>
                        </select>
                    </div>  

                    <!-- 3rd row -->
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="subject">
                            Subject Name
                        </label>
                        <textarea name="subject" id="subject" rows="6" cols="50" class="form-control"></textarea>
                    </div>  
                    <div class="col-sm-1" style='padding-top: 1rem'></div>
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="office_address">
                            Address:
                        </label>
                        <textarea name="office_address" id="office_address" rows="6" cols="50" class="form-control" readonly></textarea>
                    </div>  
                    <div class="col-sm-1" style='padding-top: 1rem'></div>
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="personnel">
                            Personnel:
                        </label>
                        <select name="personnel" id="personnel" class="form-control" required>
                        <option value="" selected disabled>-- SELECT --</option>
                            <option value="personnel1">personnel1</option>
                            <option value="personnel2">personnel2</option>
                        </select>

                        <label for="action" style="padding-top:1rem">
                            Action:
                        </label>
                        <select name="action" id="action" class="form-control" required>
                        <option value="" selected disabled>-- SELECT --</option>
                            <option value="action1">action1</option>
                            <option value="action2">action2</option>
                        </select>
                    </div> 

                    <!-- 4th row -->
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="document_type">
                            Tag Document Type As:
                        </label>
                        <select name="document_type" id="document_type" class="form-control" required>
                        <option value="" selected disabled>-- SELECT --</option>
                            <option value="For Compliance">For Compliance</option>
                            <option value="Confidential">Confidential</option>
                        </select>
                    </div>  
                    <div class="col-sm-1" style='padding-top: 1rem'></div>
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="geocoordinates">
                            Geo Coordinates:
                        </label>
                        <input type="text" class="form-control" name="longitude" id="longitude" readonly>
                        <input type="text" class="form-control" name="latitude" id="latitude" readonly>
                    </div>  
                    <div class="col-sm-1" style='padding-top: 1rem'></div>
                    <div class="col-sm-3" style='padding-top: 1rem'>
                        <label for="remarks">
                            Remarks:
                        </label>
                        <textarea name="remarks" id="remarks" rows="6" cols="50" class="form-control" readonly></textarea>

                        <label for="attachment" style='padding-top: 1rem'>
                            Attachment:
                        </label>
                        <input type="file" name="fileToUpload[]" id="fileToUpload" class="form-control" style="margin: 0px;" multiple>
                    </div>
                        
                    
                </div>  
            </div>

            <div class="col-sm-12" style="text-align:right; padding-top: 2rem; padding-right: 8rem;">
                <button type="submit" name="process_transaction" class="btn btn-success btn-icon-split" value="process_transaction"><span class="text"> <i class="fas fa-share-square"></i> Process</span></button>
            </div>
        </div>
    </div>
</div>

<script>
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
</script>