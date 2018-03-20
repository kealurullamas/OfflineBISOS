<div class="">
    
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Edit Citizen</h3>
        </div>
        <div class="panel-body">
            <?php echo form_open('admins/updatecitizen/'.$row['id']); ?>
                <?php if($this->session->flashdata('error')): ?>
                <span class="text-danger"><?php echo $this->session->flashdata('error') ?></span>
                <?php endif;?>
                <div class="form-group">
                <?php if($this->session->flashdata('error')): ?>
                <span class="text-danger">*</span>
                <?php endif; ?>
                <label>Last Name</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $row['lastname'] ?>">
                </div>
                <div class="form-group">
                <?php if($this->session->flashdata('error')): ?>
                <span class="text-danger">*</span>
                <?php endif; ?>
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $row['firstname']?>">
                </div>
                <div class="form-group">
                <?php if($this->session->flashdata('error')): ?>
                <span class="text-danger">*</span>
                <?php endif; ?>
                <label>Middle Name</label>
                <input name="middlename" class="form-control" value="<?php echo $row['middlename']?>">
                </div>
                <div class="form-group">
                <?php if($this->session->flashdata('error')): ?>
                <span class="text-danger">*</span>
                <?php endif; ?>
                <label>Address</label>
                <input name="address" class="form-control" value="<?php echo $row['address']?>">
                </div>
                <div class="form-group">
                <label>Contact</label>
                <input name="contact" class="form-control" value="<?php echo $row['contact']?>">
                </div>
                <div class="float-right">
                <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
