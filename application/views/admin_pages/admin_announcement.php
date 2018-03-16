

         <!--DataTables announcement-->
         <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Announcements Table</div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                
                <?php foreach($announcements as $announcement): ?>
                    <tr>
                    <td style="width: 20%"><?php echo $announcement['title'] ?></td>
                    <td style="width: 50%"><?php echo word_limiter($announcement['body'], 20); ?></td>
                    <td style="width: 30%" align="center">
                        <a href="<?php echo base_url('Admin_Pages/editannouncement/'.$announcement['id']);?>" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-fw fa-edit"></i> Edit</a>
                        <!-- <button type="button" class="btn btn-info btn-sm" data-toggle='modal' data-target="#editModal"><i class="fa fa-fw fa-edit"></i> Edit</button> -->
                        <button type="button" class="btn btn-danger btn-sm confirm-delete" data-url="<?php echo site_url('admins/deleteannouncement/')?>" data-id="<?php echo $announcement['id']; ?>"><i class="fa fa-fw fa-trash-o"></i> Delete</button>
                     </td>
                    </tr>
                <?php endforeach; ?>
                
                </tbody>
            </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated <?php echo $announcement['created_at'] ?></div>
        </div>
        <!-- Delete Modal-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body">Are you sure you want to delete this record?</div>
                        <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a style="color:white" class="btn btn-primary" id="btnConfirm">Confirm</a>
                        
                        </div>
                    </div>
                    </div>
        </div>

        