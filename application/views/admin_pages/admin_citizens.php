        <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Updated Successfully!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <?php endif;?>
        <hr>
        <hr>
        

         <!--DataTables Card-->
         <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Citizens List</div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($citizens as $citizen): ?>
                    <tr>
                    <td style="width: 15%"><?php echo $citizen['lastname']; ?></td>
                    <td style="width: 15%"><?php echo $citizen['firstname']; ?></td>
                    <td style="width: 15%"><?php echo $citizen['middlename']; ?></td>
                    <td style="width: 20%"><?php echo word_limiter($citizen['address'], 5); ?></td>
                    <td style="width: 5%"><?php echo $citizen['contact'] ?></td>
                    <td style="width: 30%" align="center">
                        <button type="button" class="btn btn-success btn-sm view-profile" data-citizens='<?php echo json_encode($relations);?>' 
                        data-profile="<?php echo htmlspecialchars(json_encode($profile = [ 'id' => $citizen['id'], 'lastname' => $citizen['lastname'], 'firstname' => $citizen['firstname'],
                        'middlename' => $citizen['middlename'], 'address' => $citizen['address'], 'contact' => $citizen['contact'], 'name_slug'=>$citizen['name_slug'] ]));?>">
                        
                        <i class="fa fa-fw fa-user-o"></i> Profiles</button>
                        <a href="<?php echo base_url('admin_pages/editcitizen/'.$citizen['id']);?>" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-fw fa-edit"></i> Edit</a>
                        <button type="button" class="btn btn-danger btn-sm confirm-delete" data-url="<?php echo site_url('admins/deletecitizen/')?>" data-id="<?php echo $citizen['id'];?>"><i class="fa fa-fw fa-trash-o"></i> Delete</button>
                     </td>
                    </tr>
                <?php endforeach; ?>
                
                </tbody>
            </table>
            </div>
        </div>
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
        <!-- family modal -->
        <div class="modal fade" id="familyModal" tabindex="-1" role="dialog" aria-labelledby="familyLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xlg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            
                                <div class="row">
                                    <div class="col-6 col-md-4">
                                        <input type="text" readonly class="form-control" id="lastname" value="Last Name">
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <input type="text" readonly class="form-control" id="firstname" value="First Name">
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <input type="text" readonly class="form-control" id="middlename" value="Middle Name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 col-md-4 text-center small">Last Name</div>
                                    <div class="col-6 col-md-4 text-center small">First Name</div>
                                    <div class="col-6 col-md-4 text-center small">Middle Name</div>
                                </div>

                                <div class="row">
                                    <div class="col-6 col-md-4">
                                        <input type="text" readonly class="form-control" id="address" value="Address">
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <input type="text" readonly class="form-control" id="contact" value="Contact">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 col-md-4 text-center small">Address</div>
                                    <div class="col-6 col-md-4 text-center small">Contact</div>
                                </div>
                            
                            <hr>

                                <!--DataTables Family-->
                                <div class="card mb-3 mt-3">
                                <div class="card-header">
                                    <i class="fa fa-table"></i> Family List</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered" id="familyTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Relationship</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Relationship</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        
                                        
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" id="btnClose">Close</button>
                        
                        </div>
                    </div>
                    </div>
        </div>
    