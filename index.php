<?php
  session_start();
  include "include/Config.php";
  include "include/Database.php";
 ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blood Donation and Ambulance Service - Home</title>
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
        <a href="#">| About Us |</a> <a href="contacts.php">| Contacts |</a> <a href="login.php">| Login |</a>
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
          <li><a class="nav-link scrollto active" href="index.php">HOME</a></li>
          <li><a class="nav-link scrollto" href="donate_blood.php">DONATE BLOOD</a></li>
          <li><a class="nav-link scrollto" href="blood_doner.php">FIND BLOOD DONER</a></li>
          <li><a class="nav-link scrollto" href="ambulance_service.php">AMBULANCE SERVICE</a></li>
          <li><a class="nav-link scrollto" href="charity.php">DONATE MONEY</a></li>
          <li><a class="nav-link scrollto" href="#services">SERVICES</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="login.php" class="appointment-btn scrollto" style="background-color: #EE3D32;"><span class="d-none d-md-inline"></span>Register to Donate</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="background: url('assets/img/bg-5.jpg') top center;">
    <div class="container">
      <h1 style="color: white;">Donate Blood, Save a Live</h1>
      <h2 style="color: white;">One pint of blood can save the live.</h2>
      <a href="login.php" class="btn-get-started scrollto" style="background-color: #EE3D32;">Donate Now</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Who We Are ?</h3>
              <p>
                <i class="fa fa-angle-right fa-fw"></i> Your financial gift can help a thousand children who struggle from illnesses.
              </p>
              <p>
                <i class="fa fa-angle-right fa-fw"></i> Your donation can save one's live.
              </p>
              <p>
                <i class="fa fa-angle-right fa-fw"></i> We provide ambulance service 24/7. 
              </p>
              <div class="text-center">
                <a href="about_us.php" class="more-btn">Read More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <img src="assets/icons/blood-drop.png" width="60" height="60">
                    <h4 class="mt-4">DONATE BLOOD</h4>
                    <p>Donate blood today. Help save lives.</p>
                    <a href="donate_blood.php" class="appointment-btn scrollto">Read More</a>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <img src="assets/icons/ambulance (1).png" width="60" height="60">
                    <h4 class="mt-4">AMBULANCE SERVICE</h4>
                    <p>Take service anytime, we are 24 hour's open.</p>
                    <a href="ambulance_service.php" class="appointment-btn scrollto">Read More</a>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <img src="assets/icons/donate.png" width="60" height="60">
                    <h4 class="mt-4">DONATE MONEY</h4>
                    <p>Your financial gift can help people who need it most.</p>
                    <a href="charity.php" class="appointment-btn scrollto">Read More</a>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p>We are always looking for your help.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-tint"></i></div>
              <h4><a href="donate_blood.php">Blood Donation</a></h4>
              <p>An adequate amount of blood is needed in all health care facilities to meet the urgent need for patients facing trauma and other lifesaving procedures</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-ambulance"></i></div>
              <h4><a href="ambulance_service.php">Ambulance Service</a></h4>
              <p>They can provide first aid, emergency care, various medicines and life support, and carry patients to hospital.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-money"></i></div>
              <h4><a href="charity.php">Support People</a></h4>
              <p>The act of helping others, donating to charity, or volunteering your time, will give you an improved sense of wellbeing.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Departments</h2>
          <p>More ways to support people. Help People and be happy!</p>
        </div>

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">BLOOD DONATION</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">AMBULANCE SERVICE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">MONEY DONATION</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Donate Blood</h3>
                    <p>An adequate amount of blood is needed in all health care facilities to meet the urgent need for patients facing trauma and other lifesaving procedures, such as blood transfusions – which saves millions of lives each year. Donating blood is a simple procedure that can be done within an hour.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/bg-3.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Ambulance Service</h3>
                    <p>Emergency medical services (EMS), also known as ambulance services or paramedic services, are emergency services that provide urgent pre-hospital treatment and stabilisation for serious illness and injuries and transport to definitive care.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/ambulance_service.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Support People</h3>
                    <p>Your financial gift can help a thousand people who struggle from illnesses. Your gift can provide the necessary medicine, treatment, and other essentials.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/money_donation.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="login.php">Login</a></li>
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