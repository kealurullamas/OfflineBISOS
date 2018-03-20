


<div class="">
    <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Added Successfully!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
    <?php endif;?>
  
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Add Announcement</h3>
        </div>
      
        <div class="panel-body">
        <?php echo form_open_multipart('admins/createannouncement'); ?>
                <div class="modal-body">
                    <div class="panel-body">
                                <?php if($this->session->flashdata('error')): ?>
                                <span class="text-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                                </span>
                                <?php endif; ?>
                                <div class="form-group">
                                <?php if($this->session->flashdata('error')): ?>
                                <span class="text-danger">*</span>
                                <?php endif; ?>
                                <label>Announcement Title</label>
                                <input type="text" name="announcementtitle"class="form-control">
                                </div>
                                <div class="form-group">
                                <?php if($this->session->flashdata('error')): ?>
                                <span class="text-danger">*</span>
                                <?php endif; ?>
                                <label>Announcement Body</label>
                                <textarea name="announcementbody" class="form-control" rows="10"></textarea>
                                </div>
                                <div class="float-right">
                                <button type="submit" class="btn btn-primary ">Submit</button>
                                </div>
                            
                    </div>
                
                </div>
                
                
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
