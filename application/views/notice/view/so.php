<div class="content-wrapper">
    <style>
        .rectangle {
            position:relative;
        }

        .font{
            font-family: "Times New Roman", Times, serif !important;
            font-size: 20px !important;
            line-height: 1;
        }
        .hr{
            background-color: black; height: 1px; border: 0; 
        }
    </style>

    <div class="container-fluid">
        <button style="margin: 2rem" type="button" onclick="printDiv('printableArea')" class="btn btn-success" value="" ><i class='fa-solid fa-print' id="print"></i> Print</button>

        <p style="color:red; text-align:center;"><i>***For document layout concern. Please contact ORED Support.</i></p>
        <div id="printableArea">
            <div class="rectangle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="<?php echo base_url()."assets/"; ?>/header.png" alt="Responsive image" width="100%" >
                        </div>

                        <div class="col-lg-12  font">
                            <div  style="margin: 1rem 96px 0 96px;">
                                <div class="row">
                                    <div class="col-sm-12" style="text-align: right;margin-bottom: 2rem;">
                                        <?php
                                            if($view_so['so_date'] == ''){
                                                echo '<p style="color:red"><i>For information/reference only.</i></p>';
                                            }else{
                                                echo date('F j, Y', strtotime($view_so['so_date']));
                                            }
                                        ?>
                                    </div>

                                    <div class="col-sm-12" style="margin-bottom: 2rem;">
                                        <b>SPECIAL ORDER</b>
                                        <div class="input-group mb-3 form-outline w-50">
                                            <?php echo $view_so['so_no']; ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <b style="margin-left:35px;">SUBJECT</b>
                                    </div>
                                    <div class="col-sm-1">
                                        <b>:</b>
                                    </div>
                                    <div class="col-sm-9" style="text-align: justify;">
                                        <b><?php echo $view_so['subject']; ?></b>
                                    </div>
                                    
                                    <div class="col-sm-12" style=" white-space: pre-wrap; text-align: justify;">
                                        <p><?php echo $view_so['content']; ?></p>
                                    </div>
                                    
                                    <div class='col-sm-6'></div>
                                    <div class='col-sm-6'>
                                        <div class='col-sm-12' style='font-weight: bold; text-align:center;'>
                                            
                                            <?php if($view_so['status'] == 'Approved') : ?>
                                                <?php if ($view_so['date_approved'] > '2025-07-09') : ?>
                                                    <img src='<?php echo base_url()."assets/signatures/red2.png"; ?>' width='350' height='100' alt='signature'>
                                                <?php else : ?>
                                                    <img src='<?php echo base_url()."assets/signatures/red.png"; ?>' width='350' height='100' alt='signature'>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <div style="margin-top: 6rem;"></div>
                                            <?php endif; ?>
                                        </div>
                                        <?php if($view_so['status'] == 'Approved') : ?>
                                        <!-- BARCODE GENERATOR -->
                                        <div class="col-sm-12" style='margin-top:2rem;'>
                                        <!-- <img src='<?php echo base_url()."assets/"; ?>denr-logo.png' width='30' height='30'> -->
                                            <p style="text-align:center;">
                                            <span style="font-size: 7px;"><b>DENR NATIONAL CAPITAL REGION</b></span></p>

                                            <p style="text-align:center">
                                            <img src='https://quickchart.io/barcode?type=code128&text=SO <?php echo $view_so['so_no']; ?> - <?php echo $view_so['id']; ?>&includeText=true' width='230' height='40' alt='signature'></img>
                                            </p>
                                        </div>
                                        <?php else : ?>
                                        <div style="margin-top: 6rem;"></div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                        
                            </div>
                        </div>

                   
                    </div>  
                
                </div>
                <div class="col-lg-12" style="position:absolute; bottom:0; text-align:center;">
                    <img src="<?php echo base_url()."assets/"; ?>/footer.png" alt="Responsive image">
                </div>
        </div>
    </div>
</div>

<script>
    window.onbeforeunload = function () { $('#loading').show(); }

    $( document ).ready(function() {
        $('#loading').hide();
    });

    
    function printDiv(divName) {
        // let text = "Item will be removed from the inventory once the BOQ was printed\nClick OK to confirm?";
        let text = "Click OK to confirm print?";
        if (confirm(text) == true) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;


            var css = `@page 
                        {  
                            size: A4; 
                            margin: 0mm;  
                        }
                        
                        @media print {
                        div {
                        font-family: "Times New Roman", Times, serif !important;
                        font-size: 20px !important;
                        line-height: 1;
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