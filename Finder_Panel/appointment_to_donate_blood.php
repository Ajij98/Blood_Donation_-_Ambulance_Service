<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>



 <!-- Select Blood Donation Appointment Booking Details -->
 <?php

   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['blood_donation_center_id']))
   {

     $blood_donation_center_id = $_GET['blood_donation_center_id'];

     $sql     = "SELECT * FROM tb_blood_donation_center WHERE blood_donation_center_id = $blood_donation_center_id";

     $result  = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {  
         $blood_donation_center_id = $getData['blood_donation_center_id'];
         $donation_center_name     = $getData['donation_center_name'];
         $donation_center_address  = $getData['donation_center_address'];
         $donation_center_contact  = $getData['donation_center_contact'];
         $added_by                 = $getData['added_by'];
     }
   }
  ?>




  <!-- Add Blood Donation Appointment Booking Details Section -->
 <?php
   $user_name = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['submit']))
   {  
         $blood_donation_code      = rand(100000, 999999);
         $blood_donation_center_id = $blood_donation_center_id;
         $donation_center_name     = $_POST['donation_center_name'];
         $donation_center_address  = $donation_center_address;
         $donation_center_contact  = $donation_center_contact;
         $donation_center_added_by = $added_by;
         $doner_name               = $_POST['doner_name'];
         $doner_email              = $_POST['doner_email'];
         $doner_contact            = $_POST['doner_contact'];
         $doner_blood_group        = $_POST['doner_blood_group'];
         $blood_donation_date      = $_POST['blood_donation_date'];
         $donated_by               = $user_name;

         $sql = "INSERT INTO tb_blood_donation_appointmnet(blood_donation_code,doner_name,doner_email,doner_contact,doner_blood_group,blood_donation_date,donated_by,blood_donation_center_id,donation_center_name,donation_center_address,donation_center_contact,donation_center_added_by,entry_time)values('$blood_donation_code','$doner_name','$doner_email','$doner_contact','$doner_blood_group','$blood_donation_date','$donated_by','$blood_donation_center_id','$donation_center_name','$donation_center_address','$donation_center_contact','$donation_center_added_by','$current_datetime')";
         
         $insert_row = $db->insert($sql);

         if($insert_row)
         {
           ?>

           <script type="text/javascript">
             window.alert("Appointment Booked successfully. We will verify you appointment, it may take a little while to verify your appointment. Thank You!");
             window.location='appointment_to_donate_blood.php?blood_donation_center_id=<?php echo $blood_donation_center_id; ?>';
           </script>

          <?php
         }
         else 
         {
           $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong! Data not added.</div><br />';
           echo $msg;
           return false;
         }
   }

  ?>







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blood Donation and Ambulance Service - Appointment to Donate Blood</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/favico_icon/blood-drop.png" rel="icon">
  <link href="assets/favico_icon/blood-drop.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Fontawsome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">


</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="fa fa-envelope"></i> <a href="mailto:trana@example.com">nurshedtrena@gmail.com</a>
        <i class="fa fa-phone"></i> +880 1918-125018
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#">| About Us |</a> <a href="#">| Contacts |</a> <a onclick="return confirm('Sure to logout?')" href="logout_finder.php">| Logout |</a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto">
        <a href="index.php"><img src="assets/img/nav_logo.png"> Blood Donation <br> <small class="mt-0 mb-3 py-0" style="font-size: 12px; margin-left: 45px;"><i class="fa fa-ambulance fa-2x" aria-hidden="true"></i> AMBULANCE SERVICE.</small></a>
      </h1>


      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">HOME</a></li>
          <li><a class="nav-link scrollto active" href="donate_blood.php">DONATE BLOOD</a></li>
          <li><a class="nav-link scrollto" href="blood_doner.php">FIND BLOOD DONER</a></li>
          <li><a class="nav-link scrollto" href="ambulance_service.php">AMBULANCE SERVICE</a></li>
          <li><a class="nav-link scrollto" href="charity.php">DONATE MONEY</a></li>
          <li><a class="nav-link scrollto" href="#services">SERVICES</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a onclick="return confirm('Sure to logout?')" href="logout_finder.php" class="appointment-btn scrollto" style="background-color: #EE3D32;"><span class="d-none d-md-inline"></span>Logout</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="background: url('assets/img/bg-5.jpg') top center;">
    <div class="container">
      <h1 style="color: white;">Book an Appointment</h1>
      <h2 style="color: white;">Patients need your help.</h2>
      <a href="#appointment" class="btn-get-started scrollto" style="background-color: #EE3D32;">Make Appointment Now</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

<!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Make an Appointment</h2>
          <p>Make appointment to donate blood in blood center.</p>
        </div>

        <div class="col-8 m-auto shadow px-4 py-4" style="border-radius: 5px;">
          <form class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
            <div class="col-md-12 form-group mt-3">
              <label>Blood Donation Center*</label>
              <input style="border-radius: 20px;" type="text" name="blood_donation_center_name" class="form-control" id="blood_donation_center_name" value="<?php echo $donation_center_name; ?>" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label>Doner Name*</label>
              <input style="border-radius: 20px;" type="text" name="doner_name" class="form-control" id="doner_name" placeholder="Enter Blood Doner Name" required>
            </div>
            <div class="col-md-6 form-group">
              <label>Doner E-Mail*</label>
              <input style="border-radius: 20px;" type="email" name="doner_email" class="form-control" id="doner_email" placeholder="Enter Blood Doner E-Mail" required>
            </div>
            
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label>Doner Contact No.*</label>
              <input style="border-radius: 20px;" type="text" name="doner_contact" class="form-control" id="doner_contact" placeholder="Enter Blood Doner Contact Number" required>
            </div>
            <div class="col-md-6 form-group">
              <label>Blood Group*</label>
              <select style="border-radius: 20px;" class="form-control" name="doner_blood_group" required>
                <option selected>Choose...</option>
                <option>A(+ve)</option>
                <option>B(+ve)</option>
                <option>AB(+ve)</option>
                <option>O(+ve)</option>
                <option>A(-ve)</option>
                <option>B(-ve)</option>
                <option>AB(-ve)</option>
                <option>O(-ve)</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 form-group">
              <label>Blood Donation Date* (Ex: mm/dd/yyyy)</label>
              <input style="border-radius: 20px;" type="date" name="blood_donation_date" class="form-control" id="blood_donation_date"  required>
            </div>
          </div>

          <div class="text-center mt-3"><input  type="submit" class="btn btn-primary" style="border-radius: 25px; padding-left: 20px; padding-right: 20px;" name="submit" value="Make an Apppointment"></div>
        </form>

        <a href="view_blood_donation.php" class="btn btn-dark px-3" style="border-radius: 20px; font-size: 13px;"><i class="fa fa-eye fa-fw"></i> View My Donation</a>

        </div>

      </div>
    </section><!-- End Appointment Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-contact">
            <h1 class="logo me-auto">
              <a href="index.php"><img src="assets/img/nav_logo.png"> Blood Donation <br> <small class="mt-0 mb-3 py-0" style="font-size: 12px; margin-left: 45px;"><i class="fa fa-ambulance fa-2x" aria-hidden="true"></i> AMBULANCE SERVICE.</small></a>
            </h1>
            <p>
              Chattogram, Bangladesh <br><br>
              <strong><i class="fa fa-phone fa-fw"></i></strong> +880 1918-125018<br>
              <strong><i class="fa fa-envelope fa-fw"></i></strong> nurshedtrena@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="donate_blood.php">Donate Blood</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="blood_doner.php">Find Blood Doner</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="ambulance_service.php">Ambulance Service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="charity.php">Donate Money</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Contacts</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Logout</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="donate_blood.php">Blood Donation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="ambulance_service.php">Ambulance Service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="charity.php">Support People</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>


    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          <?php echo date("Y"); ?> &copy; Copyright <strong><span>PCIU</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Developed by <a href="#">Nurshed Trena</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</php>