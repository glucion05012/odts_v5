


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

    </style>

    <?php 
        foreach($dms_list as $dl){
            if($dl['id']==$dms_id){
                $reference_no = $dl['reference_no'];
                $date_created = $dl['timestamp_date_created'];
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
                            <h5 class="text-center font" style="text-align:left;padding-top:7px;"><b style="font-size:24px;">Disposition Form</b></h5>
                        </div>
                        <div class="col-lg-6">
                            <p><b>Date Created:</b> <?php 
                                                $unixTime = strtotime($date_created);
                                                $newDate = date("F j, Y h:i a", $unixTime);
                                                echo $newDate; 
                                            ?></p>
                        </div>
                        <div class="col-lg-6">
                            <p><b>ODTS No.</b>  <?php echo $reference_no; ?></p>
                        </div>
                        <div class="col-lg-6">
                            <p><b>Created By:</b> <?php 
                                                foreach($user_list as $ul){
                                                    if($ul['id'] == $created_by_id){
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
                                            ?></p>
                        </div>
                        <div class="col-lg-6">
                            <p><b>Status</b>  <?php echo $status; ?></p>
                        </div>
                        <div class="col-lg-12">
                            <hr class="hr" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <p><b>Subject/Title:</b> <?php echo $subject_name; ?></p>
                        </div>

                        <!-- QR CODE IMAGE -->
                        <div class="col-sm-4">
                            <img src='https://quickchart.io/qr?text=<?php echo base_url(); ?>validator/<?php echo base64_encode($dms_id); ?>' width='50' height='50' alt='signature'></img>
                            <?php echo $reference_no; ?>
                        </div>
                    </div>
                    <hr class="hr">

                    <p>
                    Officials/Personnel Concerned:<br><br>

                    Please accomplish and route this document properly w/ corresponding attachment(s). 
                    The official or employee in-charge to whom this document is routed shall act promptly and expeditiously w/o discrimination within three (3), seven (7), and twenty (20) 
                    working days for simple, complex, and highly technical applications, respectively, from receipt thereof as prescribed by the RA 11032 or 
                    <b>The Ease of Doing Business Act of 2018. Failure to do so is punishable by law under Section 22 of the said act.</b><br><br>

                    <b>For strict compliance.</b>
                    </p>

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <table id="myTable" class="table table-bordered table-lg" style="width: 100%;" cellspacing="1">
                                    <thead>
                                        <tr class="text-wrap" style="max-width: 100%;">
                                            <th class="text-center" colspan="4">ROUTED</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">FROM</th>
                                            <th class="text-center">DATE FORWARDED</th>
                                            <th class="text-center">TO</th>
                                            <th class="text-center">REMARKS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($dms_transaction_list as $dtl) : ?>
                                            <?php if($dtl['dms_id']==$dms_id) : ?>
                                            <tr class="text-wrap">
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
                                                        $unixTime = strtotime($dtl['timestamp_forwarded_date']);
                                                        $newDate = date("F j, Y h:i a", $unixTime);
                                                        echo $newDate; 
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
                                                <td style='text-align:center'>
                                                    [<?php echo $dtl['action_name']; ?>]<br>
                                                    <?php echo $dtl['remarks']; ?>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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