
<?php require_once APPROOT.'/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <!-- form card register -->
        <div class="card card-outline-secondary mt-5">
            <div class="card-header">
                <h3 class="mb-0">Sign Up</h3>
                <p class="mt-2">Please fill the fields below to register</p>
            </div>
            <div class="card-body">
                <form class="form" role="form" action="<?php echo URLROOT.'/users/register'?>" method="post">
                    <div class="form-group">
                        <label for="name">Name<sup>*</sup></label>
                        <input type="text" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" id="name" placeholder="Full name" name="name" value="<?php echo $data['name']?>">
                        <span class="invalid-feedback"><?php echo $data['name_err'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email<sup>*</sup></label>
                        <input type="text" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" id="email" placeholder="Email" name="email" value="<?php echo $data['email']?>">
                        <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password<sup>*</sup></label>
                        <input type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" name="password" value="<?php echo $data['password']?>">
                        <span class="invalid-feedback"><?php echo $data['password_err'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Verify password<sup>*</sup></label>
                        <input type="password" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" id="confirm_password" placeholder="Confirm Password" name="confirm_password" value="<?php echo $data['confirm_password']?>">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err'];?></span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg float-right">Register</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form card register -->

    </div>
</div>
<?php require_once APPROOT.'/views/inc/footer.php'; ?>