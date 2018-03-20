<div class="">
    <!-- Website Overview -->
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Edit News</h3>
        </div>
        <div class="panel-body">
            <?php echo form_open_multipart('admins/updatenews/'.$row['id']); ?>
                <?php if($this->session->flashdata('error')): ?>
                        <span class="text-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                        </span>
                <?php endif; ?>
                <div class="form-group">
                <?php if($this->session->flashdata('error')): ?>
                        <span class="text-danger">*</span>
                <?php endif; ?>
                <label>News Title</label>
                <input type="text" name="newstitle" class="form-control" value="<?php echo $row['title'] ?>">
                </div>
                <div class="form-group">
                <?php if($this->session->flashdata('error')): ?>
                        <span class="text-danger">*</span>
                <?php endif; ?>
                <label>News Body</label>
                <textarea name="newsbody" class="form-control"><?php echo $row['body'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Upload Image</label>
                    <input type="file" name="file" class="form-control-file" id="image_upload">
                </div>
                <div class="float-right">
                <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
