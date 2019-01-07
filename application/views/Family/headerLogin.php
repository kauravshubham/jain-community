<!DOCTYPE html>
<html lang="eng"> 
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>JSC | Jain Community</title>
        <!--Favicon add--> 
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>jain_community/assets/img/fevicon.png">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <!--bootstrap Css-->
        <link href="<?php echo base_url(); ?>jain_community/assets/css/bootstrap.min.css" rel="stylesheet">
        <!--font-awesome Css-->
        <link href="<?php echo base_url(); ?>jain_community/assets/css/font-awesome.min.css" rel="stylesheet">
        <!--owl.carousel Css-->
        <link href="<?php echo base_url(); ?>jain_community/assets/css/owl.carousel.css" rel="stylesheet">
        <!--Slick Nav Css-->
        <link href="<?php echo base_url(); ?>jain_community/assets/css/slicknav.min.css" rel="stylesheet">
        <!--Animate Css-->
        <link href="<?php echo base_url(); ?>jain_community/assets/css/animate.css" rel="stylesheet">
        <!--Style Css-->
        <link href="<?php echo base_url(); ?>jain_community/assets/css/style.css" rel="stylesheet">
        <!--Responsive Css-->
        <link href="<?php echo base_url(); ?>jain_community/assets/css/responsive.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>jain_community/assets/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dropdown.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/member.js"></script>
        <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
    <body >
    <!--Theme Color Start-->
    <!-- <div class="Switcher">
         <i class="fa fa-cog fa-spin "></i>
        <h5 style="margin-bottom: 5px">Change Color</h5>
        <ul id="colors" data-dir="<?php echo base_url(); ?>jain_community/assets/css/themes/">
            <li class="theme-3"><span>y</span></li>
            <li class="theme-4"><span>y</span></li>
            <li class="theme-6"><span>p</span></li>
            <li class="theme-9"><span>p</span></li>
            <li class="theme-13"><span>p</span></li>
            <li class="theme-14"><span>p</span></li>
        </ul>
    </div> -->
    <!--Preloader start-->
    <div class="preloader">
        <div class="spinner">
          <div class="cube1"></div>
          <div class="cube2"></div>
        </div>
    </div>
    <!--Preloader end-->
    <div class="site"><!--for boxed Layout start-->

    <!--Scroll to top start-->
    <div class="scroll-to-top">
        <a href=""><i class="fa fa-caret-up"></i></a>
    </div><!--Scroll to top end-->
        <!--Support Bar Start-->
    <div class="support-bar">
        <div class="container">
            <div class="row">
            <div class="col-md-12 support-wrapper">
                <div class="row">
                <div class="col-md-6">
                    <div class="support-info">
                        <a href=""><p><i class="fa fa-comment"></i> Get Support</p></a>
                        <p><i class="fa fa-calendar"></i> Days Online:1720 </p>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="support-info right">
                        <p><i class="fa fa-phone"></i> (880)123456789</p>
                        <a href=""><p><i class="fa fa-envelope"></i> example@example.com</p></a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div><!--Support Bar End-->
<!--mobile logo -->
    <div class="mobile-logo">
        <a href="index-2.html"><img src="<?php echo base_url(); ?>jain_community/assets/img/mobile-logo.png" alt="Logo Image Will Be Here"></a>
    </div>

    <!--main menu start-->
    <nav class="main-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>jain_community/assets/img/logo.png" alt="Logo Image Will Be Here"></a>
                    </div>
                </div>
                <div class="col-md-8 text-right"> 
                    <nav>
                        <ul id="menu-bar">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>jain_community/about.html">About Us</a></li>
                        <li><a href="<?php echo base_url(); ?>jain_community/service.html">Service</a></li>
                        <li><a href="<?php echo base_url(); ?>jain_community/faq.html">Faq</a></li>
                        <li><a href="<?php echo base_url(); ?>/community/contact.html">Contact</a></li>
                        <li><a href="">Account <i class="fa fa-caret-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo base_url(); ?>login">Login</a></li>
                            <li><a href="<?php echo base_url(); ?>register">Register</a></li>
                        </ul>
                        </li>
                    </ul>
                    </nav>
                </div>
            </div>
        </div>
    </nav> 
    <?php if($this->native_session->get_flashdata('Family_Created')):?>
    <div class="alert alert-dismissible alert-danger">
        <?php echo "<p class='alert alert-info'>".$this->native_session->get_flashdata('Family_Created')."</p>";?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
  <?php endif; ?>
  <?php if($this->native_session->get_flashdata('Login_failed')):?>
  <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <?php echo "<p class=' alert alert-danger '>".$this->native_session->get_flashdata('Login_failed')."</p>";?>
  </div>
  <?php endif; ?>