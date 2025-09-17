<!DOCTYPE html>
<html>
<head>
<title>DNIIS - Online Validator</title>
<link rel="icon" href="<?php echo base_url()."assets/"; ?>denr-emb-logo.gif" type="image/x-icon">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!-- Font Awesome Icons -->
<!--  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/fontawesome-free/css/all.min.css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<!-- JQUERY ALERT -->
<script src="<?php echo base_url()."assets/"; ?>js/jAlert.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/jAlert.css" />
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-color: white;
  min-height: 80%;
  background-position: center;
  background-size: cover;
}
</style>
</head>
<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
  
  <div class="w3-display-middle">
        <h5 style="text-align:center; color: green">DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES</h5>
        <p style="text-align:center">National Capital Region</p>
        <h1 class="w3-jumbo w3-animate-top" style="text-align:center">
            <img src="<?php echo base_url()."assets/"; ?>denr-emb-logo.gif" alt="Logo" class="brand-image "
                style="height:100px; width: 100px;">
        </h1>
        <p style="text-align:center">ONLINE DOCUMENT VERIFICATION</p>
        <hr class="w3-border-grey" style="margin:auto;width:100%;">
                <?php 
                    foreach($dms_list_one_id as $dl){
                        if($dl['id']==$dms_id){
                            $reference_no = $dl['reference_no'];
                            $date_created = $dl['timestamp_date_created'];
                            $subject_name = $dl['subject_name'];
                            $created_by_id = $dl['created_by_id'];
                            $status = $dl['status'];
                        }
                    }
                ?>
<br>
            <h1 style="text-align:center">
                <?php 
                    if(isset($reference_no)){
                        echo $reference_no.' <i class="fa fa-check-circle" aria-hidden="true" style="color:green"></i>'; 
                    }else{
                        echo 'Invalid! <i class="fa fa-times-circle" style="color:red"></i>'; 

                    }; 
                ?> 
            </h1>
    </div>
  </div>
</div>

</body>
</html>

<script>
    window.onbeforeunload = function () { $('#loading').show(); }

    $( document ).ready(function() {
        $('#loading').hide();
    });
</script>