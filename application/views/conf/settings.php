<div class="content-wrapper">
    <div class="row">
        <!-- TABLE OF ACTION -->
            <div class="col-lg-6">
                <div class="card m-2" style="background-color:#ffffff;">
                    <div class="card-body">
                        <h5 class="card-title mb-4" style="color:#ff6634; font-size:20px;">
                            Action Configuration &nbsp; 
                            <a href='' data-toggle='modal' data-target='#add_action' title='Add Action'>
                                <i class="fa-solid fa-circle-plus"></i>
                            </a>
                        </h5>
                        <div class="mb-4"></div>
                        <table id="myTable" class="table table-responsive table-hover table-striped table-bordered table-sm" cellspacing="1" width="100%">
                            <thead>
                                <tr class="text-wrap" style="max-width: 100%;">
                                    <th scope="col">No</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1; ?>
                                <?php foreach($action as $act): ?>
                                    <tr class="text-wrap">
                                        <td><?php echo $counter++ ;?></td>
                                        <td><?php echo $act['action'];?></td>
                                        <td>
                                            <a class='btn btn-success' href='' data-toggle='modal' data-target='#edit-<?php echo $act['id'] ?>' title='Edit details'><i class="fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!-- END OF TABLE FOR ACTION -->

        <!-- TABLE OF CATEGORY -->
        <div class="col-lg-6">
           <!-- Main Category Card -->
                <div class="card m-2" id="category-card" style="background-color:#ffffff;">
                    <div class="card-body">
                        <h5 class="card-title mb-4" style="color:#ff6634; font-size:20px;">
                            Category &nbsp;
                            <a href='' data-toggle='modal' data-target='#add_category' title='Add Action'>
                                <i class="fa-solid fa-circle-plus"></i>
                            </a>
                        </h5>
                        <div class="mb-4"></div>
                        <table id="configTB" class="table table-responsive table-hover table-striped table-bordered table-sm" cellspacing="1" width="100%">
                            <thead>
                                <tr class="text-wrap" style="max-width: 100%;">
                                    <th scope="col">No</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $main_counter = 1;?>
                                <?php foreach($category as $cat): ?>
                                    <tr class="text-wrap">
                                        <td><?php echo $main_counter++?></td>
                                        <td><?php echo $cat['main_category']; ?></td>
                                        <td>
                                            <a class='btn btn-success' href='' data-toggle='modal' data-target='#edit_cat-<?php echo $cat['id'] ?>' title='Edit details'>
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <button class='btn btn-info' type='button' title="View Sub Category" onclick="toggleCategorySub(<?php echo $cat['id']; ?>)">
                                                <i class="fa-solid fa-list-ul"></i> 
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            <!-- Sub-Category Card -->
                <?php foreach($category as $cat): ?>
                    <div class="card m-2" id="sub-category-card-<?php echo $cat['id']; ?>" style="display: none; background-color: #f8f9fa;">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#ff6634; font-size:20px;">
                                Sub Categories for <?php echo $cat['main_category']; ?> &nbsp;
                                <a href='' data-toggle='modal' data-target='#add_sub_category-<?php echo $cat['id'] ?>' title='Add Action'>
                                    <i class="fa-solid fa-circle-plus"></i>
                                </a> 
                            </h5>
                            <div class="mb-5"></div>
                            <div class="table-responsive">
                                <table id="subcatTB-<?php echo $cat['id']; ?>" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Sub Category</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $has_sub_categories = false;
                                        $counter = 1;
                                        foreach($sub_category as $sub): 
                                            if($cat['id'] == $sub['cat_id']):
                                                $has_sub_categories = true;
                                        ?>
                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                <td><?php echo $sub['sub_category']; ?></td>
                                                <td>
                                                    <a class='btn btn-success' href='' data-toggle='modal' data-target='#edit-sub-<?php echo $sub['id']; ?>' title='Edit details'>
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php 
                                            endif;
                                        endforeach; 

                                        if(!$has_sub_categories): ?>
                                            <tr>
                                                <td colspan="3" class="text-center">No Sub-Categories</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <button class="float-left btn btn-secondary m-2" onclick="toggleCategorySub(<?php echo $cat['id']; ?>)">
                                <i class="fa-solid fa-angles-left"></i>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>

        </div>


        <!-- END OF TABLE FOR CATEGORY -->
    </div>

    <!-- ADD MODAL FOR ACTION -->
        <div class="modal fade" id="add_action" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <form action="<?= base_url("Settingscontroller/add_action");?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Action</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-2" style="margin-bottom: 10px; margin-top: 5px">
                                    Action:
                                </div>
                                <div class="col-md-10" style="margin-bottom: 10px; margin-top: 5px">
                                    <input type="text" style="width:300px;" class="form-control" name="action" required>
                                    <!-- <textarea class="form-control" name="action" rows="2" cols="50"></textarea> -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <!-- END OF ADD MODAL FOR ACTION -->

    
    <!-- EDIT MODAL ACTION -->
        <?php foreach( $action as $act) : ?>
            <div class="modal fade" id="edit-<?php echo $act['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <form action="<?= base_url("Settingscontroller/edit_action/" . $act['id']);?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Action</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-2" style="margin-bottom: 10px; margin-top: 5px">
                                        Action:
                                    </div>
                                    <div class="col-md-10" style="margin-bottom: 10px; margin-top: 5px">
                                        <input type="text" style="width:300px;" value="<?php echo $act['action']; ?>" class="form-control" name="action" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <!-- END EDIT MODAL ACTION -->

    <!-- ADD CATEGORY -->
        <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <form action="<?= base_url("Settingscontroller/add_category");?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-2" style="margin-bottom: 10px; margin-top: 5px">
                                    Category: 
                                </div>
                                <div class="col-lg-8" style="margin-bottom: 10px; margin-top: 5px">
                                    <input type="text" class="form-control" style="width:300px;" name="category" required>
                                    <!-- <textarea class="form-control" name="action" rows="2" cols="50"></textarea> -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <!-- END OF ADD CATEGORY -->

    <!-- EDIT MODAL CATEGORY -->
    <?php foreach( $category as $cat) : ?>
            <div class="modal fade" id="edit_cat-<?php echo $cat['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <form action="<?= base_url("Settingscontroller/edit_category/" . $cat['id']);?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-2" style="margin-bottom: 10px; margin-top: 5px">
                                        Category:
                                    </div>
                                    <div class="col-md-10" style="margin-bottom: 10px; margin-top: 5px">
                                        <input type="text" style="width:300px;" value="<?php echo $cat['main_category']; ?>" class="form-control" name="main_category" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <!-- END EDIT MODAL CATEGORY -->

     <!-- ADD MODAL FOR SUB CATEGORY -->
    <?php foreach($category as $cat): ?>
        <div class="modal fade" id="add_sub_category-<?php echo $cat['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <form action="<?= base_url("Settingscontroller/add_sub_cat");?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Sub Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" name="cat_id" value="<?php echo $cat['id'] ?>">
                                    <div class="col-md-3" style="margin-bottom: 10px; margin-top: 5px">
                                        Sub Category:
                                    </div>
                                    <div class="col-md-9" style="margin-bottom: 10px; margin-top: 5px">
                                        <input type="text" style="width:300px;" class="form-control" name="sub_category" required>
                                        <!-- <textarea class="form-control" name="action" rows="2" cols="50"></textarea> -->
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <!-- END OF ADD MODAL FOR SUB CATEGORY -->

    <!-- EDIT MODAL SUB CATEGORY -->
    <?php foreach( $sub_category as $sub) : ?>
            <div class="modal fade" id="edit-sub-<?php echo $sub['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <form action="<?= base_url("Settingscontroller/edit_sub_category/" . $sub['id']);?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Sub Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-2" style="margin-bottom: 10px; margin-top: 5px">
                                        Category:
                                    </div>
                                    <div class="col-md-10" style="margin-bottom: 10px; margin-top: 5px">
                                        <input type="text" style="width:300px;" value="<?php echo $sub['sub_category']; ?>" class="form-control" name="sub_category" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <!-- END EDIT MODAL SUB CATEGORY -->



</div>


<script>
    function toggleCategorySub(categoryId) {
    var categoryCard = document.getElementById('category-card');
    var subCategoryCard = document.getElementById('sub-category-card-' + categoryId);

    if (categoryCard.style.display === "none") {
        categoryCard.style.display = "block";  
        subCategoryCard.style.display = "none"; 
    } else {
        categoryCard.style.display = "none";  
        subCategoryCard.style.display = "block"; 
    }
}


</script>
