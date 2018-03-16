<div class="">
    <!-- Website Overview -->
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Add Citizen</h3>
        </div>
        <div class="panel-body">
            <?php echo form_open('admins/addcitizen'); ?>
                <?php if($this->session->flashdata('error')): ?>
                    <span class="text-danger"><?php echo $this->session->flashdata('error') ?></span>
                <?php endif;?>
                <div class="form-group">
                <?php if($this->session->flashdata('error')): ?>
                    <span class="text-danger">*</span>
                <?php endif; ?>
                <label>Last Name</label>
                <input type="text" name="lastname" class="form-control">
                </div>
                <div class="form-group">
                <?php if($this->session->flashdata('error')): ?>
                <span class="text-danger">*</span>
                <?php endif; ?>
                <label>Firstname</label>
                <input type="text" name="firstname" class="form-control">
                <label>Middlename</label>
                <input type="text" name="middlename" class="form-control">
                <label>Contact</label>
                <input type="text" name="contact" class="form-control">
                <label>Address</label>
                <input type="text" name="address" class="form-control">
                </div>
                <input type="submit" class="btn btn-default" value="Submit">
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
