<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">



<!-- REQUIRED SCRIPTS -->

<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>



<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Custom CSS -->
<!-- <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/login.css"> -->

<!-- DataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

<!-- Table to CSV JQ -->
<script src="<?php echo base_url()."assets/"; ?>js/table2csv.js" type="text/javascript"></script>

<!-- Font Awesome Icons -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<!-- IonIcons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<!-- Charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<!-- JQUERY ALERT -->
<script src="<?php echo base_url()."assets/"; ?>js/jAlert.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/jAlert.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- DROP ZONE -->
<link href="https://iis.emb.gov.ph/embis/assets/common/dropzone/dropzone.css" rel="stylesheet">
<script src="https://iis.emb.gov.ph/embis/assets/common/dropzone/dropzone.min.js"></script>

</head>

<style>
table {
  table-layout:fixed;
}
table td {
  word-wrap: break-word;
  max-width: 210px;
  font-weight: normal;
}
label {
    color: gray;
}
input {
  width: -webkit-fill-available;
}
body.swal2-shown > [aria-hidden='true'] {
  transition: 0.1s filter;
  filter: blur(3px);
}

 /* dropzone */
 div.dropzone_table {
    display: table;
    white-space: nowrap;
  }
  div.dropzone_table .file-row {
    display: table-row;
  }
  div.dropzone_table .file-row > div {
    display: table-cell;
    vertical-align: top;
  }
  div.dropzone_table .file-row:nth-child(odd) {
    background: #f9f9f9;
  }
.modal-header{
  background-color: #7E3608 !important;
  color: #FFF !important;
}

/* Custom CSS for active tab styling */
.nav-tabs .nav-link {
      background-color: #f8f9fa;
      border: 1px solid #ddd;
      color: #495057;
      border-radius: 5px 5px 0 0;
    }

    .nav-tabs .nav-link.active {
      background-color: #be9a83;
      color: white;
      border-color: black;
    }

    .tab-content {
      border: 1px solid #ddd;
      border-top: none;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 0 0 5px 5px;
    }

    /* Hover effect for tabs */
    .nav-tabs .nav-link:hover {
      background-color: #e2e6ea;
    }

    .card-header{
      color: #f8f9fa !important;
      background-color: #7E3608;
    }

    .main-sidebar{
      background-color: #3d1903 !important;
    }
</style>
<body>

<!-- ---------------------------- loading ---------------------------- -->
<style>

#loading {
position: fixed;
display: block;
width: 100%;
height: 100%;
top: 0;
left: 0;
text-align: center;
opacity: 0.9;
background-color: black;
z-index: 1039;
}

#loading-image {
margin: 0;
position: absolute;
top: 50%;
left: 50%;
-ms-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
z-index: 100;
}

#loading-text {
margin: 0;
position: absolute;
top: 58%;
left: 50%;
-ms-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
z-index: 100;
}
</style>
<div id="loading">
<!-- https://gifer.com/en/gifs/christmas#google_vignette -->
<img id="loading-image" height="100px" src="<?php echo base_url()."assets/"; ?>loading-christmas.gif" alt="Loading..." />
<h5 id="loading-text" style='color:white'>Loading . . .</h5>
</div>
<!-- ---------------------------- loading ---------------------------- -->