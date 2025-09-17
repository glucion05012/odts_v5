<div class="content-wrapper">
    <?php if($this->session->tempdata('successmsg')): ?> 
        <script>
            alert('<?php echo $this->session->tempdata('successmsg'); ?>')
        </script>
        <?php unset($_SESSION['successmsg']);?>
    <?php endif; ?>

    <div class="container-fluid" style='padding: 2rem;'>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <a class="viewbtn btn btn-success btn-sm waves-effect waves-light" href="notice/so"><span class="btn-label"><i class="fas fa-plus"></i></span> Special Order</a>
                    <!-- <a class="viewbtn btn btn-success btn-sm waves-effect waves-light" href="notice/memo"><span class="btn-label"><i class="fas fa-plus"></i></span> Memorandum</a>
                    <a class="viewbtn btn btn-success btn-sm waves-effect waves-light" href="notice/nom"><span class="btn-label"><i class="fas fa-plus"></i></span> Notice of Meeting</a>
                    <a class="viewbtn btn btn-success btn-sm waves-effect waves-light" href="notice/letter"><span class="btn-label"><i class="fas fa-plus"></i></span> Letter</a> -->
                </div>

                <div class="trans-layout card  mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold"><i class="fas fa-clipboard"></i> SO/MEMO/NOM</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <table id="myTable" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Created By</th>
                            <th>No</th>
                            <th>Date</th>
                            <th>Subject</th>
                            <th>Location</th>
                            <th>Schedule</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($_SESSION['so_date']) AND $_SESSION['so_date'] == 1) : ?>
                            <?php foreach($notice_list as $nl) : ?>
                                    <tr class="table-active"> 
                                        <td><?php echo $nl['id']; ?></td>
                                        <td><?php echo $nl['type']; ?></td>
                                        <td>
                                        <?php 
                                                foreach($user_list as $ul){
                                                    if($ul['id'] == $nl['created_by']){
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
                                        <td><?php echo $nl['so_no']; ?></td>
                                        <td>
                                            <?php
                                                if($nl['so_date'] == ''){
                                                    echo '<p style="color:red"><i>For updating of date.</i></p>';
                                                }else{
                                                    echo date('F j, Y', strtotime($nl['so_date']));
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $nl['subject']; ?></td>
                                        <td><?php echo $nl['venue_nom']; ?></td>
                                        <td><?php echo $nl['date_nom']; ?></td>
                                        <td><?php echo $nl['status']; ?></td>
                                        <td>
                                            <a class="viewbtn btn btn-info btn-sm waves-effect waves-light" target="_blank" href="notice/so/view/<?php echo $nl['id']; ?>"><span class="btn-label"> View</a>
                                            <a class="viewbtn btn btn-info btn-sm waves-effect waves-light" target="_blank" href="all/<?php echo $nl['reference_no']; ?>"><span class="btn-label"> History</a>
                                            <?php if($nl['status'] == 'Pending' AND $nl['forwarded_to_id'] == $_SESSION['userid']) : ?>
                                                <a class="viewbtn btn btn-primary btn-sm waves-effect waves-light" href="" data-toggle='modal' data-target='#editSO-<?php echo $nl['id']; ?>'> Edit</a>
                                            <?php endif; ?>
                                            <a class="viewbtn btn btn-warning btn-sm waves-effect waves-light" href="" data-toggle='modal' data-target='#updateDate-<?php echo $nl['id']; ?>'> Update Date</a>
                                        </td>
                                    </tr>   
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?php foreach($notice_list as $nl) : ?>
                                <?php if($nl['created_by'] == $_SESSION['userid']) : ?>
                                    <tr class="table-active"> 
                                    <td><?php echo $nl['id']; ?></td>
                                        <td><?php echo $nl['type']; ?></td>
                                        <td>
                                        <?php 
                                                foreach($user_list as $ul){
                                                    if($ul['id'] == $nl['created_by']){
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
                                        <td><?php echo $nl['so_no']; ?></td>
                                        <td>
                                            <?php
                                                if($nl['so_date'] == ''){
                                                    echo '<p style="color:red"><i>For updating of date.</i></p>';
                                                }else{
                                                    echo date('F j, Y', strtotime($nl['so_date']));
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $nl['subject']; ?></td>
                                        <td><?php echo $nl['venue_nom']; ?></td>
                                        <td><?php echo $nl['date_nom']; ?></td>
                                        <td><?php echo $nl['status']; ?></td>
                                        <td>
                                            <a class="viewbtn btn btn-info btn-sm waves-effect waves-light" target="_blank" href="notice/so/view/<?php echo $nl['id']; ?>"><span class="btn-label"> View</a>
                                            <a class="viewbtn btn btn-info btn-sm waves-effect waves-light" target="_blank" href="all/<?php echo $nl['reference_no']; ?>"><span class="btn-label"> History</a>
                                            <?php if($nl['status'] == 'Pending' AND $nl['forwarded_to_id'] == $_SESSION['userid']) : ?>
                                                <a class="viewbtn btn btn-primary btn-sm waves-effect waves-light" href="" data-toggle='modal' data-target='#editSO-<?php echo $nl['id']; ?>'> Edit</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>   
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
        <?php foreach($notice_list as $nl) : ?>
            <div id="updateDate-<?php echo $nl['id']; ?>" class="modal fade" role="dialog">
                <form action="<?= base_url('Noticecontroller/updateSODate'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                Update S.O. Date
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">  
                                <div class="row" style="padding: 1rem">

                                    <div class="col-sm-4"  style="margin-top: 1rem">
                                        Date of S.O. :
                                    </div>
                                    
                                    <div class="col-sm-8">
                                        <input type="date" name="updatedDate" class="form-control" required></input>
                                        <input type="hidden" name="soDateid" class="form-control" value="<?php echo $nl['id']; ?>"></input>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input style="width: auto" type="submit" onclick="return confirm('Press OK to confirm return.')" value="Update" class="btn btn-warning" name="submit">
                                <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div id="editSO-<?php echo $nl['id']; ?>" class="modal fade" role="dialog">
                <form action="<?= base_url('Noticecontroller/updateSO'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-dialog modal-xl">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                Update S.O.
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">  
                                <div class="col-lg-12" style="margin-bottom: 3rem;">
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
                                            <textarea class="form-control" rows="5" name="subject" style="font-weight: bold; " required><?php echo $nl['subject']; ?></textarea>
                                            <input type="hidden" name="so_id" value="<?php echo $nl['id']; ?>">
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <b>CONTENT</b>
                                        </div>
                                        <div class="col-lg-1">
                                            <b>:</b>
                                        </div>
                                        <div class="col-lg-9" style="margin-top: 1rem;">
                                            <textarea id="contentText" class="form-control" rows="15" name="content" style="width: 210mm;" required><?php echo $nl['content']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input style="width: auto" type="submit" onclick="return confirm('Press OK to confirm Update.')" value="Update" class="btn btn-warning" name="submit">
                                <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>
</div>

