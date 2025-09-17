


<div class="content-wrapper">
    <style>
        .rectangle {
            border: 2px solid black;
            border-radius: 5px;
            width: 900px;
            min-height: 1000px;
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

<?php 
        foreach($dms_list_one_id as $dl){
            if($dl['id']==$dms_id){
                $reference_no = $dl['reference_no'];
                $date_created = $dl['timestamp_date_created'];
                $sub_category = $dl['sub_category'];
                $subject_name = $dl['subject_name'];
                $created_by_id = $dl['created_by_id'];
                $status = $dl['status'];
            }
        }
    ?>


    <div id="printableArea">
        <div class="container-fluid">
            <div class="rectangle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="<?php echo base_url()."assets/"; ?>/denr_header.png" alt="Responsive image" class="img-fluid m-3">
                        </div>
                        <div class="col-lg-12 mt-2 mb-3">
                            <h5 class="text-center font" style="text-align:left;padding-top:7px;"><b style="font-size:24px;">Acknowledgement Receipt</b></h5>
                        </div>
                        <div class="col-lg-12">
                            <div  style="margin: 5rem;">
                                <?php echo date('F j, Y'); ?>
                                <br><br>
                                Greetings!<br><br>

                                <p>
                                 This is to Acknowledge Receipt of your <?php echo $sub_category; ?> with Subject: <b><?php echo $subject_name; ?></b>, submitted on <?php 
                                                    $unixTime = strtotime($date_created);
                                                    $newDate = date("F j, Y h:i a", $unixTime);
                                                    echo $newDate; 
                                                ?>.
                                <br><br>
                                Your transaction has been tagged with Reference No. <b><?php echo $reference_no; ?></b>
                                <br><br>
                                    Should you have further clarification/inquiries, please  contact us through telephone nos.: 09285065682, or at email address: records.ncr@denr.gov.ph.
                                </p>

                                <!-- QR CODE IMAGE -->
                                <div class="col-sm-12" style='margin-top:2rem;'>
                                    <img src='https://quickchart.io/qr?text=<?php echo base_url(); ?>validator/<?php echo base64_encode($dms_id); ?>' width='150' height='150' alt='signature'></img>
                                    <?php echo $reference_no; ?>
                                    
                                    <p><img src='<?php echo base_url()."assets/"; ?>denr-logo.png' width='50' height='50'>
                                    <span style="font-size: 7px;">DENR NATIONAL CAPITAL REGION</span></p>
                                </div>

                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <button style="margin: 2rem" type="button" onclick="printDiv('printableArea')" class="btn btn-success" value="" ><i class='fa-solid fa-print' id="print"></i> Print</button>
</div>
<script>
    window.onbeforeunload = function () { $('#loading').show(); }

    $( document ).ready(function() {
        $('#loading').hide();
        
        // Force default theme for AR view (print document)
        forceDefaultTheme();
    });
    
    // Function to force default theme for AR view
    function forceDefaultTheme() {
        // Remove any theme classes from body
        document.body.classList.remove('christmas-theme', 'halloween-theme');
        
        // Remove theme decorations
        const decorations = document.querySelectorAll('.christmas-decoration, .halloween-decoration');
        decorations.forEach(decoration => decoration.remove());
        
        // Remove theme effects containers
        const snowContainer = document.getElementById('snowflake-container');
        const spiderContainer = document.getElementById('spider-container');
        if (snowContainer) snowContainer.remove();
        if (spiderContainer) spiderContainer.remove();
        
        // Reset body background to default
        document.body.style.background = '';
        document.body.style.overflowX = '';
        
        // Reset content wrapper styles
        const contentWrapper = document.querySelector('.content-wrapper');
        if (contentWrapper) {
            contentWrapper.style.minHeight = '';
            contentWrapper.style.height = '';
            contentWrapper.style.overflowY = '';
        }
        
        // Reset wrapper styles
        const wrapper = document.querySelector('.wrapper');
        if (wrapper) {
            wrapper.style.minHeight = '';
            wrapper.style.height = '';
        }
        
        console.log('AR View: Forced to default theme for print layout');
    }


    function printDiv(divName) {
        // let text = "Item will be removed from the inventory once the BOQ was printed\nClick OK to confirm?";
        let text = "Click OK to confirm print?";
        if (confirm(text) == true) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            document.title='Disposition Form <?php echo $reference_no; ?>'; 

            var css = `@page 
                        .treeClass{ white-space: nowrap;}  
                        table, th, td {
                        border: 1px solid black;
                        border-collapse: collapse;
                        margin-bottom: 1rem;
                        }`,
            // var css = '@media print {  * { margin-left: 100 !important; padding: 0 !important; }  #controls, .footer, .footerarea{ display: none; }  html, body { height:100%; overflow: hidden; background: #FFF; font-size: 9.5pt; } .template { width: auto; left:0; top:0; } img { width:80%; } li { margin: 0 0 10px 20px !important;}}',
            // var css = '@page { font-size: 8px; margin: 0px; } input {border:0;outline:0;} input:focus {outline:none!important;} .item{ width: 40px !important; white-space: nowrap;} .description{ width: 500px !important; white-space: nowrap;} .specs{ width: 500px !important; white-space: nowrap;} .qty{ width: 50px !important; white-space: nowrap;}',
               head = document.head || document.getElementsByTagName('head')[0],
                style = document.createElement('style');

            style.type = 'text/css';
            style.media = 'print';

            if (style.styleSheet){
            style.styleSheet.cssText = css;
            } else {
            style.appendChild(document.createTextNode(css));
            }

            head.appendChild(style);
            window.print();

            document.body.innerHTML = originalContents;
            location.reload();
        }

    }
    
</script>