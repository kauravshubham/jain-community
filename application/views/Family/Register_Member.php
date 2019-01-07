<?php echo form_open_multipart('/add_first_member'); ?>
        <script>
        $(document).ready(()=>{
            $( "#d_o_b" ).datepicker({maxDate: "-18Y",changeMonth: true,changeYear: true,dateFormat:'yy-mm-dd' });
        })
          
      </script>
<!--header section start-->
		<section class="breadcrumb-section contact-bg section-padding">
			<div class="container">
			    <div class="row">
			        <div class="col-md-6 col-md-offset-3 text-center">
			            <h1> Add Family Member</h1>
			             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
			        </div>
			    </div>
			</div>
		</section><!--Header section end-->
<?php if($error && validation_errors()):?>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo validation_errors(); ?>
</div>
<?php endif;?>  
<input  type="hidden" name="error" value='TRUE'>
<!--login section start-->
<div class="login-section section-padding login-bg">
	<div class="container">
		<div class="row">
			 <div class="col-md-6 col-md-offset-3">
      <div class="main-login main-center">
        <a href=""><img src="<?php echo base_url(); ?>jain_community/assets/img/logo.png" alt="Logo Image Will Be Here"></a>
          <form class="form-horizontal" method="post" action="#">
            
            <div class="form-group">
              <label for="membername" class="cols-sm-2 control-label">Name of Family Member</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input required type="text" class="form-control" name="member_name" id="membername"  placeholder="Enter your Name"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="dob" class="cols-sm-2 control-label">Date of Birth</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                  <input required readonly='true' type="date" class="form-control " name="Birth_date" id="d_o_b" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="gender" class="cols-sm-2 control-label">Gender</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <input  type="radio" disabled  name="gender"  value="Male" /> Male
                  <input checked disabled  type="radio"  name="member_gender" value="Female" /> Female
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="member_relation" class="cols-sm-2 control-label">Relation</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input required  type='text' class="form-control" name="member_relation" value="Wife" readonly>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="mobile" class="cols-sm-2 control-label">Mobile Number</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-mobile" aria-hidden="true"></i></span>
                  <input  name="member_mobile"  id="mobile" type="number" oninput="this.value=this.value.slice(0,this.maxLength)"  maxlength="10" class="form-control">
                </div>
              </div>
            </div>
           <div class="form-group">
              <label for="occupation" class="cols-sm-2 control-label">Occupation</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-user-md"></i></span>
                   <select required name="member_occupation" id="occupation" class="form-control" require><option>-Occupation-</option></select>
                </div>
              </div>
            </div>
             <div class="form-group">
              <label for="image" class="cols-sm-2 control-label">Image</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-image"></i></span>
                  <input required name="member_image" required type="file" placeholder="Only Image File" accept="image/jpg,image/png, image/jpeg" class="form-control" id="image">
                </div>
              </div>
            </div>
            <div class="form-group ">
              <button type="submit" class="submit-btn btn btn-lg btn-block login-button">Submit</button>
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
