<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


 <!-- Select Blood Donation Center Details -->
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
         $donation_center_name    = $getData['donation_center_name'];
         $donation_center_address = $getData['donation_center_address'];
         $donation_center_contact = $getData['donation_center_contact'];
         $donation_center_email   = $getData['donation_center_email'];
         $opening_hour            = $getData['opening_hour'];
         $owner_name              = $getData['owner_name'];
         $owner_contact           = $getData['owner_contact'];
         $donation_center_image   = $getData['donation_center_image'];
     }
   }
  ?>



<!--Update Blood Donation Center Details -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['update']))
   {
         $blood_donation_center_id = $_GET['blood_donation_center_id'];

         $donation_center_name    = $_POST['donation_center_name'];
         $donation_center_address = $_POST['donation_center_address'];
         $donation_center_contact = $_POST['donation_center_contact'];
         $donation_center_email   = $_POST['donation_center_email'];
         $opening_hour            = $_POST['opening_hour'];
         $owner_name              = $_POST['owner_name'];
         $owner_contact           = $_POST['owner_contact'];

         $tmp         = md5(time());
         $donation_center_image = $_FILES["donation_center_image"]["name"];

         if($donation_center_image != "")
         {
           $dst         = "./blood_donation_center_img/".$tmp.$donation_center_image;
           $dst_db      = "blood_donation_center_img/".$tmp.$donation_center_image;
           move_uploaded_file($_FILES["donation_center_image"]["tmp_name"],$dst);

           $sql = "UPDATE tb_blood_donation_center SET donation_center_name='$donation_center_name',donation_center_address='$donation_center_address',donation_center_contact='$donation_center_contact',donation_center_email='$donation_center_email',donation_center_image='$dst_db',opening_hour='$opening_hour',owner_name='$owner_name',owner_contact='$owner_contact'  WHERE blood_donation_center_id = $blood_donation_center_id";

           $update_row = $db->update($sql);
         }

           $sql = "UPDATE tb_blood_donation_center SET donation_center_name='$donation_center_name',donation_center_address='$donation_center_address',donation_center_contact='$donation_center_contact',donation_center_email='$donation_center_email',opening_hour='$opening_hour',owner_name='$owner_name',owner_contact='$owner_contact' WHERE blood_donation_center_id = $blood_donation_center_id";

           $update_row = $db->update($sql);

         if($update_row)
         {
         ?>
         <script type="text/javascript">

           window.alert("Blood Donation Center details updated successfully.");
           window.location='manage_donation_center.php';

         </script>
         <?php
         }
         else
         {
           $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong!</div><br />';
           echo $msg;
           return false;
         }
   }
   ?>









<!DOCTYPE html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Service Panel  - Update Blood Donation Center Details</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

		<!-- Fontawsome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header bg-info">
				<div class="logo-container">
					<a href="index.php" class="logo" style="color: #34495E; margin-bottom: 50px;">
						<h4><img src="assets/icon/nav_logo.png" height="30"> <strong>Blood Donation</strong><b style="color: #34495E;">.</b></h4>
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<!-- start: search & user box -->
				<div class="header-right">

					<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>

					<span class="separator"></span>

					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name" style="color: black;"><?php echo $_SESSION['user_name']; ?></span>
								<span class="role" style="color: black;"><?php echo $_SESSION['user_type']; ?></span>
							</div>

							<i class="fa custom-caret"></i>
						</a>

						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" onclick="return confirm('Sure to logout?')" href="logout_service_panel.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

					<div class="sidebar-header">
						<div class="sidebar-title" style="color: white;">
							MAIN MENU
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>

					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li>
										<a href="index.php">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li>
										<a href="pages-user-profile.php">
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>My Profile</span>
										</a>
									</li>
									<li>
										<a href="blood_doner.php">
											<i class="fa fa-tint" aria-hidden="true"></i>
											<span>Blood Doner</span>
										</a>
									</li>
									<li>
										<a href="blood_donation_center.php">
											<i class="fa fa-medkit" aria-hidden="true"></i>
											<span>Blood Donation Center</span>
										</a>
									</li>
									<li class="nav-active">
										<a href="manage_donation_center.php">
											<i class="fa fa-list" aria-hidden="true"></i>
											<span>Manage Blood Donation Center</span>
										</a>
									</li>
									<li>
										<a href="manage_doner_appointment.php">
											<i class="fa fa-list" aria-hidden="true"></i>
											<span>Manage Doner Appointment</span>
										</a>
									</li>
									<li>
										<a href="ambulance_service.php">
											<i class="fa fa-ambulance" aria-hidden="true"></i>
											<span>Ambulance Service</span>
										</a>
									</li>
									<li>
										<a href="manage_ambulance_service.php">
											<i class="fa fa-list" aria-hidden="true"></i>
											<span>Manage Ambulance Service</span>
										</a>
									</li>
									<li>
										<a href="add_charity.php">
											<i class="fa fa-money" aria-hidden="true"></i>
											<span>Charity Foundation</span>
										</a>
									</li>
									<li>
										<a href="manage_charity_foundation.php">
											<i class="fa fa-list" aria-hidden="true"></i>
											<span>Manage Charity Details</span>
										</a>
									</li>
									<li>
										<a href="manage_money_donation.php">
											<i class="fa fa-list" aria-hidden="true"></i>
											<span>Manage Donation</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-info-circle" aria-hidden="true"></i>
											<span>About Us</span>
										</a>
									</li>
									<li>
										<a onclick="return confirm('Sure to logout?')" href="logout_service_panel.php">
											<i class="fa fa-power-off" aria-hidden="true"></i>
											<span>Logout</span>
										</a>
									</li>

								</ul>
							</nav>

						</div>

					</div>

				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Update Blood Doantion Center Details</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Update Blood Donation Center Details</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
										<h2 class="panel-title">Blood Donation Center Details</h2>
									</header>
									<div class="panel-body">

										<form class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">							

											<div class="form-group">
													<label class="col-md-3 control-label" for="donation_center_name">* Blood Donation Center Name :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="donation_center_name" placeholder="Enter blood donation center name" value="<?php echo $donation_center_name; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-3 control-label" for="donation_center_address">* Donation Center Address :</label>
													<div class="col-md-6">
														<textarea class="form-control" rows="4" name="donation_center_address" placeholder="Enter blood donation center address" required><?php echo $donation_center_address; ?></textarea>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-3 control-label" for="donation_center_contact">* Donation Center Contact Number :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="donation_center_contact" placeholder="You can add multiple contact number" value="<?php echo $donation_center_contact; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-3 control-label" for="donation_center_email">* Doner Center E-mail :</label>
													<div class="col-md-6">
														<input type="email" class="form-control" name="donation_center_email" placeholder="Enter doner email name" value="<?php echo $donation_center_email; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-3 control-label" for="donation_center_image">* Donation Center Image :</label>
													<div class="col-md-6">
														<img src="<?php echo $donation_center_image; ?>" height="130" alt="blood_donation_center_img">
														<br><br>
														<input type="file" class="form-control" name="donation_center_image">
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-3 control-label" for="opening_hour">* Opening Hour :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="opening_hour" placeholder="Enter opening hour like (Sat - Thu, 08:00 AM - 12:00 PM )" value="<?php echo $opening_hour; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-3 control-label" for="owner_name">* Owner Full Name :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="owner_name" placeholder="Enter owner name" value="<?php echo $owner_name; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-3 control-label" for="owner_contact">* Owner Contact Number :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="owner_contact" placeholder="Enter owner contact number" value="<?php echo $owner_contact; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<div class="col-md-12 text-center">
														<input  type="submit" class="btn btn-warning" style="padding-left: 20px; padding-right: 20px;" name="update" value="Update Now">
													</div>
											</div>

										</form>

									</div>
								</section>
							</div>
						</div>


				</section>
			</div>


		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>

	</body>
</html>
