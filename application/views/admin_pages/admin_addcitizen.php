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
                <?php if($this->session->flashdata('error')): ?>
                <span class="text-danger">*</span>
                <?php endif; ?>
                <label>Middlename</label>
                <input type="text" name="middlename" class="form-control">
                <?php if($this->session->flashdata('error')): ?>
                <span class="text-danger">*</span>
                <?php endif; ?>
                <label>Gender</label>
                
                <!--Radio group-->
                <div class="form-check">
                    <input name="gender" type="radio" class="with-gap" id="male" value="Male">
                    <label for="radio106">Male</label>
                </div>
                <div class="form-check">
                    <input name="gender" type="radio" class="with-gap" id="female" value="Female">
                    <label for="radio107">Female</label>
                </div>


                <!--Radio group-->
                
  </div>
                <?php if($this->session->flashdata('error')): ?>
                <span class="text-danger">*</span>
                <?php endif; ?>
                <label>Address</label>
                <input type="text" name="address" class="form-control">
                <label>Contact</label>
                <input type="text" name="contact" class="form-control">
                </div>
                <div class="float-right">
                <button type="submit" class="btn btn-primary mr-3 ">Submit</button>
                </div>
                <br><br>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
