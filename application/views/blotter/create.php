
<div class="">
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissable fade show" role="alert">
            <strong>Added Successfully!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>
    <?php endif; ?>
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Add News</h3>
        </div>
        <div class="panel-body">
        <?php echo form_open_multipart('admins/createnews'); ?>
                <div class="modal-body">
                    <div class="panel-body">
                                <?php if($this->session->flashdata('error')): ?>
                                <span class="text-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                                </span>
                                <?php elseif($this->session->flashdata('errorfiletype')): ?>
                                <span class="text-danger">
                                <?php echo $this->session->flashdata('errorfiletype'); ?>
                                </span>
                                <?php endif; ?>
                                <div class="form-group">
                                <?php if($this->session->flashdata('error')): ?>
                                <span class="text-danger">*</span>
                                <?php endif; ?>
                                <label>Reason</label>
                                <input type="text" name="blotter-reason" class="form-control">
                                </div>
                                <div class="form-group">
                                <?php if($this->session->flashdata('error')): ?>
                                <span class="text-danger">*</span>
                                <?php endif; ?>
                                <label>Report Body</label>
                                <textarea name="newsbody" class="report-body" rows="10"></textarea>
                                </div>
                                <div class="float-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>                   
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

