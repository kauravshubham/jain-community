<?php echo form_open('Admin/'); ?>
<?php echo validation_errors(); ?>
	<div class="form-body">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="<?php echo base_url(); ?>login/images/logo-light.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="<?php echo base_url(); ?>login/images/graphic2.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Admin</h3>
                        <p>Login</p>
                        <form>
                            <input class="form-control" type="text" name="username" placeholder="User Name" autofocus="true" required>
                            <input class="form-control" type="password" name="password" placeholder="Password"  required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> <a href="forget5.html">Forget password?</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <span>Or login with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo form_close(); ?> 