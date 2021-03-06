
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/adminlte/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Job Portal</b> Company</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Company Registration</p>

    <form method="post" action="register-addcompany.php">
      <!-- Register form success -->
      <?php 
      if (isset($_SESSION['registerError'])) {
        ?>
        <div class="alert alert-warning">
        <p class="text-center">Email Already Exist! Choose A Different Email!</p>
        </div>
      <?php
      unset($_SESSION['registerError']);
    }
    ?>

      <div class="form-group has-feedback">
        <input type="companyname" class="form-control" id="companyname" name="companyname" placeholder="Company Name" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="companyusername" class="form-control" id="companyusername" name="companyusername" placeholder="Company User Name" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="companyemail" class="form-control" id="companyemail" name="companyemail" placeholder="Company Email" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="companypassword" name="companypassword" placeholder="Company Password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Company Sign Up</button>
        <p class="text-center"><a href="login.php" class="text-center">Company Login if registered</a></p>
      </div>
    </form>
    <br>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/adminlte/adminlte.min.js"></script>
<!-- iCheck -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script type="text/javascript">
      $(function() {
        $("#successMessage:visible").fadeOut(8000);
      });
    </script>
</body>
</html>
