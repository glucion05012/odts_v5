<div class="content-wrapper">
    <style>
        .rectangle {
            border: 2px solid black;
            border-radius: 5px;
            width: 900px;
            min-height: 1300px;
            margin: 20px auto;
            transition: margin-left 0.3s ease;
            padding: 10px;
            background:white;
            position:relative;
        }

        .font{
            font-family: "Times New Roman", Times, serif;
        }
        .hr{
            background-color: black; height: 1px; border: 0; 
        }
        .container-fluid {
            font-size: 20px !important;
        }
    </style>

    <div class="container-fluid">
        <div class="rectangle">
            <div class="container">
                <form action="<?= base_url('Noticecontroller/create_so'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="<?php echo base_url()."assets/"; ?>header.png" alt="Responsive image" width="100%" >
                        </div>

                        <!-- <div class="col-lg-12 text-right">
                            <p style="margin-top: 1rem; margin-right: 5rem;">
                                <?php echo date('F j, Y'); ?>
                            </p>
                        </div> -->
                       
                        <div class="col-lg-12" style="margin-bottom: 3rem;">
                            <div  style="margin: 1rem 3rem 0 3rem;text-align:center">
                                <b>SPECIAL ORDER</b>
                                <br><br>

                                <div class="row">
                                    <div class="col-lg-2">
                                        <b>SUBJECT</b>
                                    </div>
                                    <div class="col-lg-1">
                                        <b>:</b>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" rows="5" name="subject" style="font-weight: bold; " required></textarea>
                                    </div>
                                    
                                    <div class="col-lg-12" style="margin-top: 1rem;">
                                        <textarea id="contentText" class="form-control" rows="15" name="content" style="width: 210mm;" required></textarea>
                                    </div>
                                    
                                    <div class='col-lg-6'style="margin-top: 2rem;"></div>
                                    <div class='col-lg-6'style="margin-top: 2rem;">
                                        <div class='col-sm-12' style='font-weight: bold; text-align:center;'>
                                            <div style="margin-top: 6rem;"></div>
                                        </div>
                                        <div class='col-sm-12' style='font-weight: bold; text-align:center;'>
                                            ATTY. MICHAEL DRAKE P. MATIAS
                                        </div>
                                        <div class='col-sm-12' style='font-style: italic; text-align:center;'>
                                            Regional Executive Director
                                        </div>
                                    </div>
                                </div>
                        
                            </div>
                        </div>

                        <div class="col-lg-12" style="text-align:center;">
                            <img src="<?php echo base_url()."assets/"; ?>/footer.png" alt="Responsive image">
                        </div>
                        
                    </div>  

                    <hr>

                    <div class="row" style="margin: 3rem;">
                        <div class="col-lg-12">
                            <label style="color:red">SO Details:</label>
                        </div>
                        <div class="col-sm-5">
                                <p style="margin-top: 1rem; margin-right: 5rem;">
                                    <label>Location: </label> <span style="color:red">*</span>
                                    <input name="location" class="form-control" required></input>
                                </p>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-5">
                                <p style="margin-top: 1rem; margin-right: 5rem;">
                                    <label>Schedule: </label> <span style="color:red">*</span>
                                    <input type="date" name="schedule" class="form-control" required></input>
                                </p>
                            </div>

                            <div class="col-sm-12"><hr></div>

                            <!-- 1st row -->
                            <div class="col-sm-5">
                                <label style="color:red">Approval Details:</label> 
                            </div>  
                            <div class="col-sm-1"></div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-5">
                                <label for="division">
                                    Division: <span style="color:red">*</span>
                                </label>
                                <select name="division" id="division" class="form-control" required>
                                <option value="" selected disabled>-- SELECT --</option>
                                </select>
                            </div>  

                            <!-- 2nd row --> 
                            <div class="col-sm-5" style='padding-top: 1rem'>
                                <label for="office">
                                    Select Office: <span style="color:red">*</span>
                                </label>
                                <select name="office_id" id="office" class="form-control" required>
                                    <option value="" selected disabled>-- SELECT --</option>
                                    <?php foreach($office_list as $ol) : ?>
                                        <option value="<?= $ol['office_id']; ?>" ><?= $ol['abbreviation']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>  
                            <div class="col-sm-1" style='padding-top: 1rem'></div>
                            <div class="col-sm-1" style='padding-top: 1rem'></div>
                            <div class="col-sm-5" style='padding-top: 1rem'>
                                <label for="section">
                                    Section: <span style="color:red">*</span>
                                </label>
                                <select name="section" id="section" class="form-control" required>
                                <option value="" selected disabled>-- SELECT --</option>
                                </select>
                            </div>  

                            <!-- 3rd row -->
                            <div class="col-sm-5" style='padding-top: 1rem'>
                                <label for="office_address">
                                    Address:
                                </label>
                                <textarea name="office_address" id="office_address" rows="6" cols="50" class="form-control" readonly></textarea>
                            </div>  
                            <div class="col-sm-1" style='padding-top: 1rem'></div>
                            <div class="col-sm-1" style='padding-top: 1rem'></div>
                            <div class="col-sm-5" style='padding-top: 1rem'>
                                <label for="personnel">
                                    Personnel: <span style="color:red">*</span>
                                </label>
                                <select name="personnel_id" id="personnel" class="form-control" required>
                                <option value="" selected disabled>-- SELECT --</option>
                                </select>

                                <label for="action" style="padding-top:1rem">
                                    Action: <span style="color:red">*</span>
                                </label>
                                <select name="action_id" id="action" class="form-control" required>
                                    <option value="" selected disabled>-- SELECT --</option>
                                    <?php foreach($action_list as $al) : ?>
                                        <option value="<?= $al['id']; ?>" ><?= $al['display']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div> 

                            <!-- 4th row -->
                            <div class="col-sm-5" style='padding-top: 1rem'>
                                <label for="geocoordinates">
                                    Geo Coordinates:
                                </label>
                                <input type="text" class="form-control" name="longitude" id="longitude" readonly>
                                <input type="text" class="form-control" name="latitude" id="latitude" readonly>
                            </div>  
                            <div class="col-sm-1" style='padding-top: 1rem'></div>
                            <div class="col-sm-1" style='padding-top: 1rem'></div>
                            <div class="col-sm-5" style='padding-top: 1rem'>
                                <label for="remarks">
                                    Remarks: <span style="color:red">*</span>
                                </label>
                                <textarea name="remarks" id="remarks" rows="6" cols="50" class="form-control" required></textarea>
                            </div>

                            
                        </div>  
                    </div>

                    <div style="text-align: right; margin: 1rem;">
                        <button type="submit" style="margin-top: 1rem;" class="btn btn-success" onclick="return confirm('Press OK to confirm request?')">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.onbeforeunload = function () { $('#loading').show(); }

    $( document ).ready(function() {
        $('#loading').hide();
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

    document.getElementById('contentText').addEventListener('keydown', function(e) {
    if (e.key == 'Tab') {
        e.preventDefault();
        var start = this.selectionStart;
        var end = this.selectionEnd;

        // set textarea value to: text before caret + tab + text after caret
        this.value = this.value.substring(0, start) +
        "\t" + this.value.substring(end);

        // put caret at right position again
        this.selectionStart =
        this.selectionEnd = start + 1;
    }
    });
    
</script>