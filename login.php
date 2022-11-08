<?php
  session_start();
  include "include/Config.php";
  include "include/Database.php";
 ?>

 <!--User login section (USE BINARY KEYWORD FOR CASE SENSETIVE LOGIN INFORMATION)-->
 <?php
   $msg = "";
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
  if(isset($_POST['submit']))
  {
      $user_name = $_POST['user_name'];
      $password  = $_POST['password'];

      $sql = "SELECT * FROM tb_user WHERE BINARY user_name = '$user_name' AND BINARY password = '$password' LIMIT 1";

      $result = $db->link->query($sql) or die($this->link->error.__LINE__);

      if($result->num_rows != 0)
      {
        while($getData = $result->fetch_assoc())
        {
            $user_type = $getData['user_type'];
        }

        if($user_type == "Admin")
        {
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_type'] = $user_type;
            header('location: Admin_Panel/index.php');
        }
        else if($user_type == "Blood Doner" || $user_type == "Ambulance Service Owner" || $user_type == "Charity Owner")
        {
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_type'] = $user_type;
            header('location: Service_Panel/index.php');
        }
        else if($user_type == "General User")
        {
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_type'] = $user_type;
            header('location: Finder_Panel/index.php');
        }

      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissable w-100 m-auto" id="flash-msg"><strong><i class="fa fa-exclamation-triangle fa-fw"></i> </strong>Incorrect Username or Password. Try again please !</div><br />';
      }
  }
  ?>







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blood Donation and Ambulance Service - Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Favicons -->
  <link href="assets/favico_icon/blood-drop.png" rel="icon">
  <link href="assets/favico_icon/blood-drop.png" rel="apple-touch-icon">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="login_registration_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="login_registration_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="login_registration_assets/dist/css/adminlte.min.css">

  <!-- Fontawsome(v-4.7.0) -->
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">


</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h1 class="logo me-auto">
        <a href="index.php"><img src="assets/img/nav_logo.png"> Blood Donation <br> <small class="mt-0 mb-0 py-0" style="font-size: 12px; margin-left: 45px;"><i class="fa fa-ambulance fa-2x" aria-hidden="true"></i> AMBULANCE SERVICE.</small></a>
    </h1>
  </div>
  <!-- /.login-logo -->
  <?php echo $msg; ?>
  <div class="card px-3 py-3">
    <div class="card-body login-card-body px-3 py-3">
      <p class="login-box-msg">Sign In Here!</p>

      <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="input-group mb-3">
          <input type="user_name" class="form-control" name="user_name" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Sign In">
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-0">
        <p class="text-muted d-inline">Don't have an account?</p> <a href="registration.php">Create New Account</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="login_registration_assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="login_registration_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="login_registration_assets/dist/js/adminlte.min.js"></script>
</body>
</html>
