<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


 <!-- Select Charity Foundation Details -->
 <?php

   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['foundation_id']))
   {

     $foundation_id = $_GET['foundation_id'];

     $sql     = "SELECT * FROM tb_charity_foundation WHERE foundation_id = $foundation_id";

     $result  = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {
         $charity_foundation_name = $getData['charity_foundation_name'];
         $about_foundation        = $getData['about_foundation'];
         $foundation_address      = $getData['foundation_address'];
         $contact_number          = $getData['contact_number'];
         $email                   = $getData['email'];
         $foundation_opening_hour = $getData['foundation_opening_hour'];
         $organization_type       = $getData['organization_type'];
         $social_media_link       = $getData['social_media_link'];
         $foundation_owner_name   = $getData['foundation_owner_name'];
         $owner_email             = $getData['owner_email'];
         $owner_contact_number    = $getData['owner_contact_number'];
         $owner_nid_number        = $getData['owner_nid_number'];
         $foundation_image        = $getData['foundation_image'];
         $way_of_payment          = $getData['way_of_payment'];
     }
   }
  ?>



<!--Update Charity Foundation Details -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['update']))
   {
         $foundation_id = $_GET['foundation_id'];

         $charity_foundation_name = $_POST['charity_foundation_name'];
         $about_foundation        = $_POST['about_foundation'];
         $foundation_address      = $_POST['foundation_address'];
         $contact_number          = $_POST['contact_number'];
         $email                   = $_POST['email'];
         $foundation_opening_hour = $_POST['foundation_opening_hour'];
         $organization_type       = $_POST['organization_type'];
         $social_media_link       = $_POST['social_media_link'];
         $foundation_owner_name   = $_POST['foundation_owner_name'];
         $owner_email             = $_POST['owner_email'];
         $owner_contact_number    = $_POST['owner_contact_number'];
         $owner_nid_number        = $_POST['owner_nid_number'];
         $way_of_payment          = $_POST['way_of_payment'];

         $tmp         = md5(time());
         $foundation_image = $_FILES["charity_foundation_img"]["name"];

         if($foundation_image != "")
         {
           $dst         = "./charity_foundation_img/".$tmp.$foundation_image;
           $dst_db      = "charity_foundation_img/".$tmp.$foundation_image;
           move_uploaded_file($_FILES["charity_foundation_img"]["tmp_name"],$dst);

           $sql = "UPDATE tb_charity_foundation SET charity_foundation_name='$charity_foundation_name',foundation_image='$dst_db',about_foundation='$about_foundation',foundation_address='$foundation_address',contact_number='$contact_number',email='$email',foundation_opening_hour='$foundation_opening_hour',organization_type='$organization_type',social_media_link='$social_media_link',foundation_owner_name='$foundation_owner_name',owner_email='$owner_email',owner_contact_number='$owner_contact_number',owner_nid_number='$owner_nid_number',way_of_payment='$way_of_payment' WHERE foundation_id = $foundation_id";

           $update_row = $db->update($sql);
         }

           $sql = "UPDATE tb_charity_foundation SET charity_foundation_name='$charity_foundation_name',about_foundation='$about_foundation',foundation_address='$foundation_address',contact_number='$contact_number',email='$email',foundation_opening_hour='$foundation_opening_hour',organization_type='$organization_type',social_media_link='$social_media_link',foundation_owner_name='$foundation_owner_name',owner_email='$owner_email',owner_contact_number='$owner_contact_number',owner_nid_number='$owner_nid_number',way_of_payment='$way_of_payment' WHERE foundation_id = $foundation_id";

           $update_row = $db->update($sql);

         if($update_row)
         {
         ?>
         <script type="text/javascript">

           window.alert("Charity Foundation details updated successfully.");
           window.location='manage_charity_foundation.php';

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

		<title>Service Panel  - Update Foundation Details</title>
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


	    <!-- Summernote Plugin File (Only js without bootstrap)-->
	    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
	    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>



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
									<li>
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
									<li class="nav-active">
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
						<h2>Update Foundation Details</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Update Foundation Details</span></li>
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
										<h2 class="panel-title">Update Foundation Details</h2>
									</header>
									<div class="panel-body">

										<form class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">							

											<div class="form-group">
													<label class="col-md-4 control-label" for="charity_foundation_name">* Charity Foundation Name :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="charity_foundation_name" placeholder="Enter charity foundation name" value="<?php echo $charity_foundation_name; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-4 control-label" for="charity_foundation_img">* Charity Foundation Image :</label>
													<div class="col-md-6">
														<img src="<?php echo $foundation_image; ?>" height="130" alt="charity_foundation_img">
														<br><br>
														<input type="file" class="form-control" name="charity_foundation_img">
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-4 control-label" for="about_foundation">* About Foundation :</label>
													<div class="col-md-6">
														<textarea class="form-control" rows="4" name="about_foundation" placeholder="About charity foundation" required><?php echo $about_foundation; ?></textarea>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-4 control-label" for="foundation_address">* Foundation Address :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="foundation_address" placeholder="Enter foundation address" value="<?php echo $foundation_address; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-4 control-label" for="contact_number">* Conact No. :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="contact_number" placeholder="Enter foundation contact number" value="<?php echo $contact_number; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-4 control-label" for="email">* E-mail :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="email" placeholder="Enter foundation email" value="<?php echo $email; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-4 control-label" for="foundation_opening_hour">* Opening Hour :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="foundation_opening_hour" placeholder="Enter foundation opening hour" value="<?php echo $foundation_opening_hour; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-4 control-label" for="organization_type">* Organization Type :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="organization_type" placeholder="Enter organization type" value="<?php echo $organization_type; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-4 control-label" for="social_media_link">* Social Media Link (Facebook - If Any) :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="social_media_link" placeholder="Enter social media link, if any" value="<?php echo $social_media_link; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-4 control-label" for="foundation_owner_name">* Foundation Owner Name :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="foundation_owner_name" placeholder="Enter foundation owner name" value="<?php echo $foundation_owner_name; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-4 control-label" for="owner_email">* Owner E-mail :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="owner_email" placeholder="Enter owner email" value="<?php echo $owner_email; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-4 control-label" for="owner_contact_number">* Owner Contact No. :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="owner_contact_number" placeholder="Enter owner contact number" value="<?php echo $owner_contact_number; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-4 control-label" for="owner_nid_number">* Owner NID Number :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="owner_nid_number" placeholder="Enter owner nid number" value="<?php echo $owner_nid_number; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-4 control-label" for="owner_nid_number">* Way of Payment :</label>
													<div class="col-md-6">
														<textarea class="form-control" name="way_of_payment" id="way_of_payment" required><?php echo $way_of_payment; ?></textarea>
													</div>
											</div>

											<div class="form-group">
													<div class="col-md-12 text-center">
														<input  type="submit" class="btn btn-warning" style="padding-left: 20px; padding-right: 20px;" name="update" value="Update Now">
													</div>
											</div>

										</form>

										<!-- Script for Summernote -->
		                                <script>
		                                  $('#way_of_payment').summernote({
		                                    placeholder: 'Type way of payment...',
		                                    tabsize: 0,
		                                    height: 250,
		                                    toolbar: [
		                                      ['style', ['style']],
		                                      ['font', ['bold', 'underline', 'clear']],
		                                      ['color', ['color']],
		                                      ['para', ['ul', 'ol', 'paragraph']],
		                                      ['table', ['table']],
		                                      ['insert', ['link', 'picture', 'video']],
		                                      ['view', ['fullscreen', 'codeview', 'help']]
		                                    ]
		                                  });
		                                </script>

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
