<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


 <!-- Charity Foundation Card Data Load -->
 <?php
   $user_name       = $_SESSION['user_name'];
   $db              = new Database();
   $sql             = "SELECT * FROM tb_charity_foundation WHERE is_verified = 1";
   $read_charity_foundation = $db->select($sql);
  ?>









<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blood Donation and Ambulance Service - Money Donation</title>
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
          <li><a class="nav-link scrollto" href="donate_blood.php">DONATE BLOOD</a></li>
          <li><a class="nav-link scrollto" href="blood_doner.php">FIND BLOOD DONER</a></li>
          <li><a class="nav-link scrollto" href="ambulance_service.php">AMBULANCE SERVICE</a></li>
          <li><a class="nav-link scrollto active" href="charity.php">DONATE MONEY</a></li>
          <li><a class="nav-link scrollto" href="#services">SERVICES</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a onclick="return confirm('Sure to logout?')" href="logout_finder.php" class="appointment-btn scrollto" style="background-color: #EE3D32;"><span class="d-none d-md-inline"></span>Logout</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="background: url('assets/img/charity-6.jpg') top center;">
    <div class="container">
      <h1 style="color: white;">Support People</h1>
      <h2 style="color: white;">Your financial gift can help thousands of people.</h2>
      <a href="#donation" class="btn-get-started scrollto" style="background-color: #EE3D32;">Donate Now</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">



    <!-- ======= Appointment Section ======= -->
    <section id="donation" class="appointment section-bg">
        <div class="container">

        <div class="section-title">
          <h2>Support Us</h2>
          <img src="assets/icons/donate.png" width="50" height="50">
          <p>More ways to help us. Please donate!</p>
        </div>

        <div class="row">

          <?php if($read_charity_foundation){ $i = 0; ?>
          <?php while($result = $read_charity_foundation->fetch_assoc()){ $i = $i + 1; ?>
          <div class="col-lg-4 col-sm-6 col-md-6 col-12 mb-3 ml-2">
            <div class="card shadow" style="width: 25rem;">
              <img src="<?php echo '../Service_Panel/'.$result['foundation_image'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title mb-3"><img src="assets/icons/donate.png" width="25" height="25"> <b><?php echo $result['charity_foundation_name']; ?></b></h5>

                <p class="card-text mb-1"><i class="fa fa-map-marker" style="color: #196CB3;" aria-hidden="true"></i> <?php echo $result['foundation_address']; ?></p>
                <p class="card-text mb-1"><i class="fa fa-phone" style="color: #196CB3;" aria-hidden="true"></i> <?php echo $result['contact_number']; ?></p>
                <p class="card-text mb-1"><i class="fa fa-envelope" style="color: #196CB3;" aria-hidden="true"></i> <?php echo $result['email']; ?></p>

                <a href="charity_details.php?foundation_id=<?php echo $result['foundation_id']; ?>" class="btn px-4 py-2 mt-4 mb-2 btn-outline-danger" style="border-radius: 20px; font-size: 14px;"><span class="d-none d-md-inline">Donate Now</span></a>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php }else{ ?>
          <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
            echo $msg; ?>
          <?php } ?>


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