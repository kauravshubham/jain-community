
	<section class="breadcrumb-section contact-bg section-padding">
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-md-offset-3 text-center">
                  <h1>Login</h1>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
              </div>
          </div>
      </div>
    </section><!--Header section end-->
<?php if(validation_errors()):?>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo validation_errors(); ?>
</div>
<?php endif;?>  
<!--login section start-->
<div class="login-section section-padding login-bg">
  <div class="container">
    <div class="row">
       <div class="col-md-6 col-md-offset-3">
         <div class="main-login main-center">
           <?php echo form_open('/login'); ?>
        <a href=""><img src="<?php echo base_url(); ?>jain_community/assets/img/logo.png" alt="Logo Image Will Be Here"></a>
          <form class="form-horizontal" method="post">

            <div class="form-group">
              <label for="mobile" class="cols-sm-2 control-label">Your Mobile Number</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                  <input required type="text" class="form-control" name="mobile" id="mobile"  placeholder="Enter your Mobile Number"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input required type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                </div>
              </div>
            </div>

            <div class="form-group ">
              <button type="submit" class="submit-btn btn btn-lg btn-block login-button">Login</button>
            </div>
          </form>
        </div>
       </div>
    </div>
  </div>
</div>
<!--login section end-->
<?php echo form_close(); ?> 
 <!--pament method section start-->
    <section class="section-padding payment-method payment-bg">
           <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                         <h2>payment method</h2>
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                     </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="payment-logo">
                        <img src="<?php echo base_url(); ?>jain_community/assets/img/client3.png"  alt="Payment Method Logo">
                        <img src="<?php echo base_url(); ?>jain_community/assets/img/client4.png"  alt="Payment Method Logo">
                        <img src="<?php echo base_url(); ?>jain_community/assets/img/client2.png"  alt="Payment Method Logo">
                        <img src="<?php echo base_url(); ?>jain_community/assets/img/client1.png"  alt="Payment Method Logo">
                    </div>
                </div>
            </div>
         </div>
    </section><!--pament method section end-->
 