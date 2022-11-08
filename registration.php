<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

 ?>

<!--User registration section-->
<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  $db = new Database();
  $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
  date_default_timezone_set('Asia/Dhaka');

  if(isset($_POST['submit']))
  {
    if(checkEmail())
    {
      if(checkUsername())
      {
        if(matchPassword())
        {
          $name      = $_POST['name'];
          $email     = $_POST['email'];
          $phone     = $_POST['phone'];
          $address   = $_POST['address'];
          $user_name = $_POST['user_name'];
          $password  = $_POST['password'];
          $user_type = $_POST['user_type'];

          $sql = "INSERT INTO          tb_user(name,email,phone,address,user_name,password,user_type,entry_time)values('$name','$email','$phone','$address','$user_name','$password','$user_type','$current_datetime')";
          $insert_row = $db->insert($sql);

          if($insert_row)
          {
            ?>

           <script type="text/javascript">
             window.alert("Registration successfull, You may login now. Thank You!");
             window.location='login.php';
           </script>

           <?php

          }
          else {
            $msg = '<div class="alert alert-danger w-50 m-auto"><strong>Error !</strong> Something went wrong !</div><br />';
          }
        }
      }
    }
  }
  function checkEmail()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_user WHERE email='".$_POST['email']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning! This email already exist, Try another one pls.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
    }
  }
  function checkUsername()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_user WHERE user_name='".$_POST['user_name']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning ! This username already exist, Try another one pls.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
    }
  }
  function matchPassword(){
    if($_POST['password'] !== $_POST['confirm_password'])
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning ! Password and Confirm password should match.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
    }
  }
 ?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blood Donation and Ambulance Service - Registration</title>

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
<body class="hold-transition register-page">

  <br><br>
<div class="register-box">
  <div class="register-logo">
    <h1 class="logo me-auto">
        <a href="index.php"><img src="assets/img/nav_logo.png"> Blood Donation <br> <small class="mt-0 mb-0 py-0" style="font-size: 12px; margin-left: 45px;"><i class="fa fa-ambulance fa-2x" aria-hidden="true"></i> AMBULANCE SERVICE.</small></a>
    </h1>
  </div>

  <div class="card px-3 py-3">
    <div class="card-body register-card-body px-3 py-3">
      <p class="login-box-msg">Sign Up Here!</p>

      <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Your Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="phone" placeholder="Phone number" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <textarea rows="2" class="form-control" id="address" name="address" placeholder="Address" required></textarea>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-map-marker"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="user_name" placeholder="Username" required>
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
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="confirm_password" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" id="user_type" name="user_type" required>
            <option selected>Choose your type...</option>
            <option>Blood Doner</option>
            <option>Ambulance Service Owner</option>
            <option>Charity Owner</option>
            <option>General User</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Sign Up" required>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
      </div>

      <p class="text-muted d-inline">Already have an account? </p><a href="login.php">Login</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->


  <br><br><br>
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="login_registration_assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="login_registration_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="login_registration_assets/dist/js/adminlte.min.js"></script>
</body>
</html>
