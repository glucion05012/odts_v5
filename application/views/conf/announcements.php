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
                    <a class="btn btn-success create-btn" href="" data-toggle='modal' data-target='#createAnn'> <i class="fas fa-plus"></i> Create</a>
                </div>

                <div class="trans-layout card  mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold"><i class="fas fa-bullhorn"></i> Bulletin</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <table id="myTable" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Location</th>
                            <th>Schedule</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($ann_list as $al) : ?>
                            <tr>
                                <td><?php echo $al['subject']; ?></td>
                                <td><?php echo $al['location']; ?></td>
                                <td><?php echo $al['schedule']; ?></td>
                                <td>
                                    <?php 
                                        if($al['status']==1){
                                            echo 'Active';
                                        }else{
                                            echo 'Inactive';
                                        } 
                                    ?>
                                </td>
                                <td>
                                    <?php if(isset($al['type'])) : ?>
                                        <div class="dropdown">
                                            <button class="btn btn-info btn-sm waves-effect waves-light" type="button" data-toggle="dropdown" aria-expanded="false">View <i class="far fa-caret-square-down"></i></button> 
                                            <ul class="dropdown-menu" style="max-height: 500px; overflow: auto; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(10px, 23px, 0px);" x-placement="bottom-start">
                                            <?php foreach($notice_list as $nl) : ?>   
                                                <?php if($al['type'] === $nl['id']) : ?>
                                                    <a target="_blank" href="<?php echo base_url(); ?>notice/so/view/<?php echo $nl['id']; ?>"><span class="btn-label"><?php echo $al['subject']; ?></a>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php else: ?>
                                        <div class="dropdown">
                                            <button class="btn btn-info btn-sm waves-effect waves-light" type="button" data-toggle="dropdown" aria-expanded="false">View <i class="far fa-caret-square-down"></i></button> 
                                            <ul class="dropdown-menu" style="max-height: 500px; overflow: auto; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(10px, 23px, 0px);" x-placement="bottom-start">
                                            <?php foreach($ann_attach_list as $aal) : ?>   
                                                <?php if($al['id'] === $aal['conf_announcements_id']) : ?>
                                                    <li>
                                                        <a href="<?php echo base_url($aal['file_location'].$aal['file_name']); ?>" target="_blank"><?php echo $aal['file_name']; ?></a>
                                                        <!-- <a href="<?php echo $aal['file_location'].$aal['file_name'] ?>" target="_blank"><?php echo $aal['file_name']; ?></a>  -->
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                    
                                    
                                    <a onclick="return confirm('Press OK to confirm archive?')" href="<?= base_url('Settingscontroller/ann_delete/'.$al['id']); ?>"><i style="color:red" class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    

    

    <div id="createAnn" class="modal fade" role="dialog">
        <form action="<?= base_url('Settingscontroller/ann_create'); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="modal-title">Add Bulletin</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">  
                        <div class="row">
                            <div class="col-sm-1">
                                Subject
                            </div>
                            <div class="col-sm-1">
                                :
                            </div>
                            <div class="col-sm-10" style="margin-bottom: 10px;">
                                <textarea name="subject" rows="6" cols="50" class="form-control" required></textarea>
                            </div>

                            <div class="col-sm-1">
                                Location
                            </div>
                            <div class="col-sm-1">
                                :
                            </div>
                            <div class="col-sm-5" style="margin-bottom: 10px;">
                                <input name="location" class="form-control" required></input>
                            </div>

                            <div class="col-sm-1">
                                Schedule
                            </div>
                            <div class="col-sm-1">
                                :
                            </div>
                            <div class="col-sm-3" style="margin-bottom: 10px;">
                                <input type="date" name="schedule" class="form-control" required></input>
                            </div>

                            <div class="col-sm-1">
                                Attachment
                            </div>
                            <div class="col-sm-1">
                                :
                            </div>
                            <div class="col-sm-10" style="margin-bottom: 10px;">
                                <input type="file" name="fileToUpload[]" id="fileToUpload" class="form-control" accept=".pdf" required>
                                <span class="element-to-paste-filename"></span>
                                <input type="button" value="Remove All" id="removeBtn" style="width:20%" name="removeBtn">
                            </div>

                           
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" onclick="return confirm('Press OK to Save.')">Post</button>
                        <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
    
</div>
<script>
    $(document).on('click', '#removeBtn', function(){ 
        // alert($(this).val());
        document.getElementById('fileToUpload').value = "";
        $(this).parents('.giz-upload').find('.element-to-paste-filename').text('');
        
    });
</script>

