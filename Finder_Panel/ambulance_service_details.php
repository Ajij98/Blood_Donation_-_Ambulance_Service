<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>



<!-- Select Ambulance Service Details -->
 <?php

   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['ambulance_service_id']))
   {

     $ambulance_service_id = $_GET['ambulance_service_id'];

     $sql     = "SELECT * FROM tb_ambulance_service WHERE ambulance_service_id = $ambulance_service_id";

     $result  = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {    
         $serivice_image         = $getData['serivice_image'];
         $ambulance_service_id   = $getData['ambulance_service_id'];
         $ambulance_service_name = $getData['ambulance_service_name'];
         $about_service          = $getData['about_service'];
         $service_address        = $getData['service_address'];
         $service_contact        = $getData['service_contact'];
         $service_opening_time   = $getData['service_opening_time'];
         $service_owner_name     = $getData['service_owner_name'];
         $owner_contact          = $getData['owner_contact'];
         $serivice_image         = $getData['serivice_image'];
         $service_owner_username = $getData['added_by'];
     }
   }
  ?>



  <!-- Service Review section -->
  <?php
    $user_name = $_SESSION['user_name'];
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_POST['submit']))
    {
          if(check_Duplicate_Review())
          {
            $ambulance_service_id   = $ambulance_service_id;
            $ambulance_service_name = $_POST['ambulance_service_name'];
            $rating_value           = $_POST['rating_value'];
            $comment                = $_POST['comment'];
            $reviewed_by            = $user_name;
            $service_owner_username = $service_owner_username;

            $sql = "INSERT INTO tb_ambulance_service_review(ambulance_service_id,ambulance_service_name,rating_value,comment,reviewed_by,service_owner_username,entry_time)values('$ambulance_service_id','$ambulance_service_name','$rating_value','$comment','$reviewed_by','$service_owner_username','$current_datetime')";
            $insert_row = $db->insert($sql);

            if($insert_row)
            {
            ?>

            <script type="text/javascript">

              window.alert("Review submitted successfully. Thanks for giving us your valuable feedback.");
              window.location="ambulance_service_details.php?ambulance_service_id=<?php echo $ambulance_service_id; ?>";

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
    }

    function check_Duplicate_Review()
    {
      $ambulance_service_id = $_GET['ambulance_service_id'];
      $user_name  = $_SESSION['user_name'];
      $db     = new Database();
      $sql    = "SELECT * FROM tb_ambulance_service_review WHERE ambulance_service_id=$ambulance_service_id AND reviewed_by='$user_name'";
      $result = $db->select($sql);
      if($result->num_rows > 0)
      {
        ?>

        <script type="text/javascript">

          window.alert("Warning! You already give your valable feedback, multiple feedback not allowed. Thank you!");
          window.location="ambulance_service_details.php?ambulance_service_id=<?php echo $ambulance_service_id; ?>";

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




   <!--Ambulance Service Review Load-->
 <?php
   $db   = new Database();
   $sql  = "SELECT * FROM tb_ambulance_service_review WHERE ambulance_service_id = $ambulance_service_id AND service_owner_username = '$service_owner_username'";
   $read_product_review = $db->select($sql);
  ?>



  <!-- Total Review Count -->
 <?php
     $db   = new Database();
     $sql  = "SELECT * FROM tb_ambulance_service_review WHERE ambulance_service_id = $ambulance_service_id";
     $read_total_review = $db->select($sql);
     if($read_total_review)
     {
       $total_review = $read_total_review->num_rows;
     }
     else
     {
       $total_review = 0;
     }
    ?>


    <!-- Total Rating Value Count -->
<?php
   $db   = new Database();
   $sql  = "SELECT sum(rating_value)rating_value FROM tb_ambulance_service_review WHERE ambulance_service_id = $ambulance_service_id";
   $sum_of_rating_value = $db->select($sql);

   while($getData = $sum_of_rating_value->fetch_assoc())
   {
     $total_rating = $getData['rating_value'];
   }
?>


<?php 
  
  error_reporting( error_reporting() & ~E_NOTICE );
  if ($total_rating == 0 AND $total_review == 0) 
  {
    $avg_rating = 0;
  }
  else
  {
    $avg_rating = (int) ($total_rating/$total_review);
  }

 ?>











<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blood Donation and Ambulance Service - Ambulance Service Details</title>
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
          <li><a class="nav-link scrollto active" href="ambulance_service.php">AMBULANCE SERVICE</a></li>
          <li><a class="nav-link scrollto" href="charity.php">DONATE MONEY</a></li>
          <li><a class="nav-link scrollto" href="#services">SERVICES</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a onclick="return confirm('Sure to logout?')" href="logout_finder.php" class="appointment-btn scrollto" style="background-color: #EE3D32;"><span class="d-none d-md-inline"></span>Logout</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <br><br><br><br>


<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <img src="<?php echo '../Service_Panel/'.$serivice_image; ?>">
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3 class="mt-0 pt-0"><img src="assets/icons/ambulance.png" width="40" height="40"> <?php echo $ambulance_service_name; ?></h3>
            <p><?php echo $about_service; ?></p>

            <p><i class="fa fa-map-marker" style="color: #196CB3;" aria-hidden="true"></i> <strong>Address:</strong> <?php echo $service_address; ?></p>

            <p><i class="fa fa-phone" style="color: #196CB3;" aria-hidden="true"></i> <strong>Contact Us:</strong> <?php echo $service_contact; ?></p>

            <p><i class="fa fa-calendar" style="color: #196CB3;" aria-hidden="true"></i> <strong>Service Time:</strong> <?php echo $service_opening_time; ?></p>

            <p>
              <a class="btn btn-outline-primary px-4 py-2 mt-3" style="border-radius: 20px; font-size: 14px;" data-toggle="collapse" href="#feedback" role="button" aria-expanded="false" aria-controls="feedback">Give Us Feedback</a> 
            </p>

            <div class="collapse" id="feedback">
              <div class="card card-body">
                <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                  <div class="row">
                    <div class="col-sm-6">
                      <label>Service Name *</label>
                      <input type="text" name="ambulance_service_name" class="form-control" value="<?php echo $ambulance_service_name; ?>" readonly>
                    </div>

                    <div class="col-sm-6">
                      <label>Rating <small>(Your rating will be converted to star)</small> *</label>
                      <select class="form-control" name="rating_value" required>
                        <option selected>Choose...</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>   
                  </div>

                  <label class="mt-3">Comment *</label>
                  <textarea class="form-control" name="comment" rows="5" placeholder="Type your valuable comment here..." required></textarea>

                  <input type="submit" name="submit" class="btn btn-primary px-4 py-2 mt-3" style="border-radius: 20px; font-size: 14px; color: white;" value="Submit Review">
               </form>
              </div>
            </div>


            <div class="accordion mt-3" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fa fa-plus text-danger"></i> <strong>Our Reviews (Total <?php echo $total_review; ?> Reviews)</strong>
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">

                      <?php if($read_product_review){ $i = 0; ?>
                      <?php while($result = $read_product_review->fetch_assoc()){ $i = $i + 1; ?>
                      <div class="col-12">
                        <div class="row">
                          <div class="col-lg-3">
                            <p class="mb-0"><?php echo $result['reviewed_by']; ?></p>
                            <p class="mt-0 mb-0">
                              <?php
                                                      $rating_value = $result['rating_value'];

                                                        if($rating_value == 1)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 2)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 3)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 4)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 5)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i>

                                                            <?php
                                                        }
                                                     ?>
                                                   </p>
                            <p class="mt-0"><?php echo $result['entry_time']; ?></p>
                          </div>
                          <div class="col-lg-9">
                            <p><?php
                                                      $rating_value = $result['rating_value'];

                                                        if($rating_value == 1)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-danger bg-danger" style="color: white;">Awful</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 2)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-warning bg-warning" style="color: white;">Poor</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 3)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-secondary bg-secondary" style="color: white;">Average</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 4)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-success bg-success" style="color: white;">Good</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 5)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-primary bg-primary" style="background-color:blue; color: white;">Excellent</div><br />';
                                                             echo $msg;
                                                        }
                                                     ?></p>
                            <p class="mt-0 mb-0"><?php echo $result['comment']; ?></p>
                          </div>
                        </div>
                        <hr class="mt-0">
                      </div>
                      <?php } ?>
                      <?php }else{ ?>
                      <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Review Found!</div><br />';
                        echo $msg; ?>
                      <?php } ?>

                    </div>
                  </div>
                </div>
            </div>


          </div>
        </div>

      </div>
    </section><!-- End About Section -->

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

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</php>