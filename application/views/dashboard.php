<style>
   iframe{
       height: 720px;
       width: 920px;
   }
</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-4">
            <div class="card" style="margin: 2rem;">
                <label style="padding: 10px; text-align:center">LOGGED IN</label>
                <table class="myTableSimple table table-striped table-bordered " cellspacing="0" width="100%" style="place-items:center;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($usersessions as $us) : ?>
                            <?php if($us['name'] != '') : ?>
                                <tr>
                                    <td><?php echo $us['name']; ?></td>
                                    <td style="text-align:center"><i class="fa-solid fa-user-check" style="color:green;"></i></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="col-lg-8">
            <div class="card" style="margin: 2rem;">
                <label style="padding: 10px; text-align:center">ANNOUNCEMENTS</label>
                <table class="myTableSimple table table-striped table-bordered " cellspacing="0" width="100%" style="place-items:center;">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Attachment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>---------</td>
                            <td>---------</td>
                            <td>---------</td>
                        </tr>
                        
                        <tr>
                            <td>---------</td>
                            <td>---------</td>
                            <td>---------</td>
                        </tr>
                        <tr>
                            <td>---------</td>
                            <td>---------</td>
                            <td>---------</td>
                        </tr>
                        <tr>
                            <td>---------</td>
                            <td>---------</td>
                            <td>---------</td>
                        </tr>
                        <tr>
                            <td>---------</td>
                            <td>---------</td>
                            <td>---------</td>
                        </tr>
                        <tr>
                            <td>---------</td>
                            <td>---------</td>
                            <td>---------</td>
                        </tr>
                        <tr>
                            <td>---------</td>
                            <td>---------</td>
                            <td>---------</td>
                        </tr>
                        <tr>
                            <td>---------</td>
                            <td>---------</td>
                            <td>---------</td>
                        </tr>
                        <tr>
                            <td>---------</td>
                            <td>---------</td>
                            <td>---------</td>
                        </tr>
                        <tr>
                            <td>---------</td>
                            <td>---------</td>
                            <td>---------</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        
        <!-- <div class="col-lg-12">
            <div class="card" style="margin: 2rem;">
                <div class="card card-body">
                    <iframe src="https://app.powerbi.com/view?r=eyJrIjoiYzY4ZGRjNTMtMTI1ZC00Zjk5LWFhZmMtNmVmNzQ0ZDM5YTRkIiwidCI6ImY2ZjRhNjkyLTQzYjMtNDMzYi05MmIyLTY1YzRlNmNjZDkyMCIsImMiOjEwfQ%3D%3D" frameborder="0" style="width:100%;"></iframe>
                </div>
            </div>
        </div> -->
    </div>
                
</div>