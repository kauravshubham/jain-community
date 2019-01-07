<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSC</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>tmp_login/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>tmp_login/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>tmp_login/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>tmp_login/css/iofrm-theme5.css">
</head>
<?php if($page_type==='admin_login'){ ?>
<body style="background-color: #0093FF">
	<?php if($this->native_session->get_flashdata('login_failed')):?>
  <?php echo "<p class='alert alert-danger'>".$this->native_session->get_flashdata('login_failed')."</p>";?>
  <?php endif; ?>
  <?php if($this->native_session->get_flashdata('login_success')):?>
  <?php echo "<p class='alert alert-success'>".$this->native_session->get_flashdata('login_success')."</p>";?>
  <?php endif; ?>
<?php }else{ ?>
	<body>
<?php } ?> 
	
