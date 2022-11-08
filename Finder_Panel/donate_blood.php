<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>



 <!-- Blood Donation Center Table Data Load -->
 <?php
   $user_name       = $_SESSION['user_name'];
   $db              = new Database();
   $sql             = "SELECT * FROM tb_blood_donation_center WHERE is_verified = 1";
   $read_blood_donation_center = $db->select($sql);
  ?>







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blood Donation and Ambulance Service - Donate Blood</title>
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

      <a onclick="return confirm('Sure to logout?')" href="logout_finder.php" class="appointment-btn scrollto" style="background-color: #EE3D32;"><span class="d-none d-md-inline"></span> Logout</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="background: url('assets/img/bg-5.jpg') top center;">
    <div class="container">
      <h1 style="color: white;">Give Blood</h1>
      <h2 style="color: white;">Patients need your help.</h2>
      <a href="#testimonials" class="btn-get-started scrollto" style="background-color: #EE3D32;">Blood Donation Center</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">



    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
        <div class="container">

        <div class="section-title">
          <h2>Requirements</h2>
          <p>These are some of the requirements donors must meet to be eligible to donate blood based on their donation type.</p>
        </div>

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Requirements to Donate Blood</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Blood Donation Process</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0" style="border-left: 1px solid">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3 class="mb-4">Blood Donation Requirements</h3>
                    <p><i class="fa fa-hand-o-right" style="color: #2C4964;" aria-hidden="true"></i> Donate blood after every 120 days*</p>
                    <p><i class="fa fa-hand-o-right" style="color: #2C4964;" aria-hidden="true"></i> You must be in good health and feeling well**</p>
                    <p><i class="fa fa-hand-o-right" style="color: #2C4964;" aria-hidden="true"></i> You must be at least 16 years old in most states</p>
                    <p><i class="fa fa-hand-o-right" style="color: #2C4964;" aria-hidden="true"></i> You must weigh at least 110 lbs</p>

                    <br>
                    <h5 class="text-muted" style="font-family: inherit;"> <i class="fa fa-question-circle-o" aria-hidden="true"></i> If you have any questions regarding your eligibility, <br> please call us at (+88) 01918-125018</h5>
                    
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/bg-6.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3 class="mb-4">Donation Process</h3>                    
                    <p><i class="fa fa-hand-o-right" style="color: #2C4964;" aria-hidden="true"></i> Find any blood donation center.</p>
                    <p><i class="fa fa-hand-o-right" style="color: #2C4964;" aria-hidden="true"></i> Make an appointment.</p>
                    <p><i class="fa fa-hand-o-right" style="color: #2C4964;" aria-hidden="true"></i> Donation Blood.</p>


                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>

              <a href="#testimonials" class="appointment-btn scrollto mt-4"><span class="d-none d-md-inline">Find Blood Donation Center <i class="fa fa-level-down fa-fw" aria-hidden="true"></i></span></a>

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Appointment Section -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-title mb-3">
          <h2>Blood Donation Center</h2>
          <img src="assets/icons/blood-drop.png" width="50" height="50">
          <p>CHOOSE ANY BLOOD DONATION CENTER, WHERE YOU WANT TO DONATE.</p>
        </div>

        <div class="row">

          <?php if($read_blood_donation_center){ $i = 0; ?>
          <?php while($result = $read_blood_donation_center->fetch_assoc()){ $i = $i + 1; ?>
          <div class="col-lg-4 col-sm-6 col-md-6 col-12 mb-3 ml-2">
            <div class="card shadow" style="width: 25rem;">
              <img src="<?php echo '../Service_Panel/'.$result['donation_center_image']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title mb-3"><img src="assets/icons/blood-drop.png" width="25" height="25"> <b><?php echo $result['donation_center_name']; ?></b></h5>

                <p class="card-text mb-1"><i class="fa fa-map-marker" style="color: #196CB3;" aria-hidden="true"></i> <?php echo $result['donation_center_address']; ?></p>
                <p class="card-text mb-1"><i class="fa fa-phone" style="color: #196CB3;" aria-hidden="true"></i> <?php echo $result['donation_center_contact']; ?></p>
                <p class="card-text mb-1"><i class="fa fa-envelope" style="color: #196CB3;" aria-hidden="true"></i> <?php echo $result['donation_center_email']; ?></p>
                <p class="card-text mb-1"><i class="fa fa-calendar" style="color: #196CB3;" aria-hidden="true"></i> <?php echo $result['opening_hour']; ?></p>

                <a href="appointment_to_donate_blood.php?blood_donation_center_id=<?php echo $result['blood_donation_center_id']; ?>" class="btn px-4 py-2 mt-4 mb-2 btn-outline-danger" style="border-radius: 20px; font-size: 14px;"><span class="d-none d-md-inline">Appointment to Donate</span></a>
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
    </section><!-- End Testimonials Section -->


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