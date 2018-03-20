<div class="">
    <!-- Website Overview -->
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Edit Announcement</h3>
        </div>
        <div class="panel-body">
            <?php echo form_open('admins/updateannouncement/'.$row['id']); ?>
                <?php if($this->session->flashdata('error')): ?>
                <span class="text-danger"><?php echo $this->session->flashdata('error') ?></span>
                <?php endif;?>
                <div class="form-group">
                <?php if($this->session->flashdata('error')): ?>
                <span class="text-danger">*</span>
                <?php endif; ?>
                <label>Announcement Title</label>
                <input type="text" name="announcementtitle" class="form-control" value="<?php echo $row['title'] ?>">
                </div>
                <div class="form-group">
                <?php if($this->session->flashdata('error')): ?>
                <span class="text-danger">*</span>
                <?php endif; ?>
                <label>Announcement Body</label>
                <textarea name="announcementbody" class="form-control"><?php echo $row['body']?></textarea>
                </div>
                <div class="float-right">
                <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
