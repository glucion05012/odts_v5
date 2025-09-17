<style>
    .nextPrev {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.modal-title {
    margin: 0 auto; 
    flex-grow: 1; 
    text-align: center;
}

.pdf-frame {
    width: 100%;
    height: 500px; 
    border: none;
    font-size:10px;

}
#frame { 
    zoom: 0.75; 
    -moz-transform: scale(0.75); 
    -moz-transform-origin: 0 0; 
}
</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-4">
            <?php  
            $active = 0;
            $inactive = 0;
            foreach($usersessions as $us){
                if($us['session_id'] != ''){
                    $active++;
                }else{
                    $inactive++;
                }
            };
            ?>
            
            <div class="card" style="margin: 2rem;">
                <div style="margin: 1rem;">
                    <div class="row" style="margin-top: .5rem; margin-left: .5rem; margin-right: .5rem">
                        <div class="col-lg-6">
                            <div class="card" style="background-color:#CBF3E3">
                                <h4 style="text-align:center"><b>Active</b></h4> 
                                <p style="text-align:center"><?php echo $active; ?></p> 
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card" style="background-color:#FFCCCB">
                                <h4 style="text-align:center"><b>Inactive</b></h4> 
                                <p style="text-align:center"><?php echo $inactive; ?></p> 
                            </div>
                        </div>
                    </div>
                    
                    <label style="padding: 10px; text-align:center">LOGGED IN</label>
                    <table class="myTableSimple table table-striped table-bordered " cellspacing="0" width="100%" style="place-items:center;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th id="sort_asc">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($usersessions as $us) : ?>
                                <?php if($us['session_id'] != '') : ?>
                                    <tr>
                                        <td><?php echo $us['name']; ?></td>
                                        <td style="text-align:center"><i class="fa-solid fa-user-check" style="color:green;"></i></td>
                                    </tr>
                                <?php else :?>
                                    <tr>
                                        <td><?php echo $us['name']; ?></td>
                                        <td style="text-align:center">Logged Out</td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Announcement Modal -->
        <div class="modal fade" id="announcementModal" tabindex="-1" role="dialog" aria-labelledby="announcementTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header d-flex justify-content-between align-items-center">
                      

                        <h4 class="modal-title text-center flex-grow-1">
                            <i class="nav-icon fa fa-bullhorn"></i> ANNOUNCEMENT
                        </h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">  
                        <div class="row">
                            <div class="col-lg-2"><b>Posted By</b></div>
                            <div class="col-lg-4 mb-2">
                                <input type="text" name="announce_posted_by" class="form-control" disabled>
                            </div>
                            <div class="col-lg-2"><b>Date Posted</b></div>
                            <div class="col-lg-4 mb-2">
                                <input type="text" name="announce_date_posted" class="form-control" disabled>
                            </div>

                            <div class="hr-sect"></div>
                            <div class="col-lg-12 mb-12">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-lg-3"><b>Subject</b></div>
                                            <div class="col-lg-9">
                                                <textarea name="announce_subject" rows="6" cols="50" class="form-control" style="margin-bottom: 10px;" disabled></textarea>
                                            </div>

                                            <div class="col-lg-3"><b>Location</b></div>
                                            <div class="col-lg-9">
                                                <input type="text" name="announce_location" class="form-control" style="margin-bottom: 10px;" disabled>
                                            </div>

                                            <div class="col-lg-3"><b>Schedule</b></div>
                                            <div class="col-lg-9">
                                                <input type="text" name="announce_schedule" class="form-control" style="margin-bottom: 10px;" disabled>
                                            </div>

                                            <div class="col-lg-3"><b>Attachment</b></div>
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <a class="btn btn-sm btn-info" target="_blank" id="announce_attachment"><i class="fa-solid fa-file-invoice"></i>  View</a>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div id="link299"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div id="announce_attachment_frame" style="display: none;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons Row -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <button id="prevAnnouncement" class="btn btn-secondary" title="Previous">
                                <i class="fa-solid fa-caret-left"></i>
                            </button>

                            <button id="nextAnnouncement" class="btn btn-secondary" title="Next">
                                <i class="fa-solid fa-caret-right"></i>
                            </button>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <!-- <div class="d-flex align-items-center" style="align-items:center;">
                            <button id="prevAnnouncement" class="btn btn-primary" disabled><i class="fa-solid fa-caret-left"></i></button>
                            <button id="nextAnnouncement" class="btn btn-primary"><i class="fa-solid fa-caret-right"></i></button>
                        </div> -->
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Announcement Modal -->
        
        <div class="col-lg-8">
            <div class="card" style="margin: 2rem;">
                <div class="row" style="margin: 1rem;">
                    <div class="col-lg-12" style="padding: 10px; text-align:center">
                        <label >BULLETIN</label>
                    </div>
                    <div class="col-lg-12">
                        <table id="noticeTable" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Attachment</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php if($_SESSION['userid'] == 1520) : ?>
        <div class="col-lg-12">
            <div class="card" style="margin: 2rem;">
                <div class="card card-body">
                    <iframe title="ODTS_v5 Transaction Monitoring Report" width="1140" height="541.25" src="https://app.powerbi.com/reportEmbed?reportId=de26eb3b-6057-449e-a0d5-11fecd89da42&autoAuth=true&ctid=c06b207e-47e3-4692-b805-7e725715e9c4" frameborder="0" allowFullScreen="true"></iframe>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
         
    <div id="viewNotice" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="modal-title"><i class="nav-icon fa fa-bullhorn"></i> Bulletin</h4>
                        </div>
                    </div>
                </div>

                <!-- Modal body -->
                <div class="modal-body">  
                    <div class="row">
                        <div class="col-lg-2">
                            <b>Posted By</b>
                        </div>
                        <div class="col-lg-4" style="margin-bottom: 10px;">
                            <input type="text" name="posted_by" class="form-control" disabled ></input>
                        </div>
                        <div class="col-lg-2">
                            <b>Date Posted</b>
                        </div>
                        <div class="col-lg-4" style="margin-bottom: 10px;">
                            <input type="text" name="date_posted" class="form-control" disabled></input>
                        </div>
                        
                        <div class="hr-sect"></div>
                        
                        <div class="col-lg-2">
                            <b>Subject</b>
                        </div>
                        <div class="col-lg-10" style="margin-bottom: 10px;">
                            <textarea name="subject" rows="6" cols="50" class="form-control" disabled></textarea>
                        </div>

                        <div class="col-lg-2">
                            <b>Location</b>
                        </div>
                        <div class="col-lg-5" style="margin-bottom: 10px;">
                            <input type="text" name="location" class="form-control" disabled></input>
                        </div>

                        <div class="col-lg-2">
                            <b>Schedule</b>
                        </div>
                        <div class="col-lg-3" style="margin-bottom: 10px;">
                            <input type="text" name="schedule" class="form-control" disabled></input>
                        </div>

                        <div class="col-lg-2">
                            <b>Attachment</b>
                        </div>
                        <div class="col-lg-10" style="margin-bottom: 10px;">
                        <a class="btn btn-sm btn-info mr-auto" target="_blank" id="attachment" > View</a>
                        </div>

                    
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- <?php if($_SESSION['userid'] != 1520) : ?>
        <div id="loading">
            <img id="loading-image" height="100px" src="<?php echo base_url()."assets/"; ?>dots.gif" alt="Loading..." />
            <h5 id="loading-text" style='color:white'>UNDER MAINTENANCE</h5>
        </div>
    <?php endif; ?> -->


</div>

<script>
     $(window).on('load', function() {
        if(<?php echo count($ann_list); ?> != 0){
            $('#bulletinCarousel').modal('show');
        } 
        
        $('.carousel').carousel({
            interval: false,
        });
    });

    $(document).ready(function(e){
        var base_url = "<?php echo base_url();?>";
        $('#noticeTable').DataTable({
            'pageLength': 3,
            'serverSide': true,
            'ordering': false,
            "bDestroy": true,
            "lengthMenu": [ [3], [3] ],
            'order': [],
            'ajax': {
                url : base_url+'Dashboardcontroller/notice_list_ajax',
                type : 'POST'
            },
            language: {
                searchPlaceholder: 'Search Subject Name',
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><div class="loading-text">Loading...</div> '
            },
            "pagingType":"simple",
        });
    });

    $(document).on('click', '#viewBtn', function() {
        var id = $(this).val();
        var base_url = "<?php echo base_url();?>";
        $.ajax({
                url: base_url + "Dashboardcontroller/notice_list_ajax_one/" + id,
                method: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    $('#viewNotice').modal('show');

                    if (data != 0) {
                    
                        var attach_url = '';
                        if(data[0].type == null){
                            attach_url = base_url + data[0].notice_attach_one_location + data[0].notice_attach_one_file_name;
                        }else{
                            attach_url = base_url + "notice/so/view/" + data[0].type;
                        }

                        $('input[name=posted_by]').val(data[0].created_by_id);
                        $('input[name=date_posted]').val(data[0].date_posted);
                        $('textarea[name=subject]').val(data[0].subject);
                        $('input[name=location]').val(data[0].location);
                        $('input[name=schedule]').val(data[0].schedule);
                        $('#attachment').attr("href", attach_url)
                    } else {
                        console.log("No record exists", "Error");
                    }
                }
            });

            // history table
            var base_url = "<?php echo base_url();?>";
            $('#historyTable').DataTable({
                'order': [[0, "desc"]],
                "bDestroy": true,
                'ajax': {
                    url : base_url+'Inboxcontroller/dms_history_list_ajax_all/' + id,
                    type : 'POST',
                },
            });
    });


    // Announcement modal
    let i = 0; 

    $(document).ready(function () {

        // Swal.fire({
        //     icon: "info",
        //     title: "Advisory!",
        //     html: `
        //     <img src="<?php echo base_url(); ?>assets/sona.jpg" alt="Notice" style="width: 100%; height: auto; border-radius: 10px;">
        //     `,
        //     width: '800px', // Increase modal width here
        //     confirmButtonText: "Ok",
        //     customClass: {
        //         confirmButton: "btn btn-primary"
        //     },
        //     showCloseButton: true,
        //     allowOutsideClick: false
        // });


        fetchAnnouncement(i); 

        function fetchAnnouncement(index) {
            $.ajax({
                url: "<?= base_url('Dashboardcontroller/get_announcement_by_index/') ?>" + index,
                type: "GET",
                dataType: "json",
                success: function (announcement) {
                    if (announcement) {
                        showAnnouncement(announcement);
                        $("#announcementModal").modal("show");
                        console.log(announcement);
                        console.log(announcement.type);
                        console.log(announcement.status);
                    } else {
                        $("#nextAnnouncement").prop("disabled", true);
                    }
                },
                error: function () {
                    console.log("Failed to fetch announcement.");
                }
            });
        }

        function formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('en-US', options);
        }

        function showAnnouncement(announcement) {
            $("input[name='announce_posted_by']").val(announcement.name);
            $("input[name='announce_date_posted']").val(formatDate(announcement.date_created));
            $("textarea[name='announce_subject']").val(announcement.subject);
            $("input[name='announce_location']").val(announcement.location);
            $("input[name='announce_schedule']").val(formatDate(announcement.schedule));

           
           if(announcement.id==299){
            $("#link299").html('<h5><a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSe1HCcM7ndyfEn0ytmgaanjWslnsesHb0KNINQ8J49yQwHJVQ/viewform?pli=1&pli=1">SURVEY LINK HERE</a></h5>');
           }else{
            $("#link299").html('');
           }
                
                let attachmentPath = "";
                
                if (announcement.type == null || announcement.type === "") {
                    if (announcement.file_name && announcement.file_name.trim() !== "") {
                        let encodedFileName = encodeURIComponent(announcement.file_name);
                        attachmentPath = "<?= base_url('assets/attachments/announcements/') ?>" + encodedFileName;
                    } else {
                        $("#announce_attachment").hide();
                        $("#announce_attachment_frame").html("").hide();
                    }
                } else {
                    attachmentPath = "<?= base_url('notice/so/view/') ?>" + announcement.type;
                }

                $("#announce_attachment").attr("href", attachmentPath).show();
                $("#announce_attachment_frame").html(
                    `<iframe id="frame" src="${attachmentPath}" class="pdf-frame"></iframe>`
                ).show();
           

            $("#prevAnnouncement").prop("disabled", i === 0);
            $("#nextAnnouncement").prop("disabled", false);

        }

        // Next Announcement
        $("#nextAnnouncement").click(function () {
            i++;
            fetchAnnouncement(i);
        });

        // Previous Announcement
        $("#prevAnnouncement").click(function () {
            if (i > 0) {
                i--;
                fetchAnnouncement(i);
            }
        });
    });

</script>