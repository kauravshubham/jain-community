<?php echo form_open_multipart('/register'); ?>
     
        <script>
        $(document).ready(()=>{
            $( "#d_o_b" ).datepicker({maxDate: "-21Y",changeMonth: true,changeYear: true,dateFormat:'yy-mm-dd' });
        })
        
      </script>
<!--header section start-->
		<section class="breadcrumb-section contact-bg section-padding">
			<div class="container">
			    <div class="row">
			        <div class="col-md-6 col-md-offset-3 text-center">
			            <h1>Register</h1>
			             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
			        </div>
			    </div>
			</div>
		</section><!--Header section end-->
      <?php
if(validation_errors()):?>
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
        <a href=""><img src="<?php echo base_url(); ?>jain_community/assets/img/logo.png" alt="Logo Image Will Be Here"></a>
          <form class="form-horizontal" method="post" action="#">
            
            <div class="form-group">
              <label for="membername" class="cols-sm-2 control-label">Name of Family Head</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input required type="text" class="form-control" name="membername" id="membername"  placeholder="Enter your Name"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="dob" class="cols-sm-2 control-label">Date of Birth</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                  <input required readonly type="text" class="form-control " name="dob" id="d_o_b" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="gender" class="cols-sm-2 control-label">Gender</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <input required type="radio"  name="gender"  value="Male" /> Male
                  <input required  type="radio"  name="gender" value="Female" /> Female
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="landmark" class="cols-sm-2 control-label">Landmark</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-landmark"></i></span>
                  <input required type="text" class="form-control" name="landmark" id="landmark"  placeholder="Enter your Landmark"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="state" class="cols-sm-2 control-label">State</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-map-marked-alt"></i></span>
                  <select required name="state" id="state" class="form-control" require><option>-State-</option></select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="city" class="cols-sm-2 control-label">City</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-city"></i></span>
                  <select required name="city" id="city" class="form-control" require><option>-City-</option></select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="ward" class="cols-sm-2 control-label">Ward</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-map-pin"></i></span>
                   <select required name="ward" id="ward" class="form-control" require><option>-Ward-</option></select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="landmark" class="cols-sm-2 control-label">Colony</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-archway"></i></span>
                   <select required name="colony" id="colony" class="form-control" require><option>-Colony-</option></select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="mobile" class="cols-sm-2 control-label">Mobile Number</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-mobile" aria-hidden="true"></i></span>
                  <input required name="mobile" required id="mobile" type="number" oninput="this.value=this.value.slice(0,this.maxLength)"  maxlength="10" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Email Address</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input required type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="subcast" class="cols-sm-2 control-label">Sub Cast</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-sitemap"></i></span>
                   <select required name="subcast" id="subcast" class="form-control" require><option>-Sub Cast-</option></select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="gotra" class="cols-sm-2 control-label">Gotra</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fab fa-joomla"></i></span>
                   <select required name="gotra" id="gotra" class="form-control" require><option>-Gotra-</option></select>
                </div>
              </div>
            </div>
           <div class="form-group">
              <label for="occupation" class="cols-sm-2 control-label">Occupation</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-user-md"></i></span>
                   <select required name="occupation" id="occupation" class="form-control" require><option>-Occupation-</option></select>
                </div>
              </div>
            </div>
             <div class="form-group">
              <label for="image" class="cols-sm-2 control-label">Image</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-image"></i></span>
                  <input required name="image" required type="file" placeholder="Only Image File" accept="image/jpg,image/png, image/jpeg" class="form-control" id="image">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input required id="password" name="password" class="form-control" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Password" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input required id="password_two" name="conf_password" class="form-control" type="password"  onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Verify Password" required>
                </div>
              </div>
            </div>

            <div class="form-group ">
              <button type="submit" class="submit-btn btn btn-lg btn-block login-button"><i class="fas fa-forward"></i> &nbsp;Next</button>
            </div>
          </form>
        </div>   
       </div>
		</div>
	</div>
</div>
<!--login section end-->
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
<?php echo form_close(); ?> -->
