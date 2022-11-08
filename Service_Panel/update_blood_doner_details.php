<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


 <!-- Select Blood Doner Details -->
 <?php

   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['blood_doner_id']))
   {

     $blood_doner_id = $_GET['blood_doner_id'];

     $sql     = "SELECT * FROM tb_blood_doner WHERE blood_doner_id = $blood_doner_id";

     $result  = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {
         $doner_name        = $getData['doner_name'];
         $doner_email       = $getData['doner_email'];
         $doner_phone_no    = $getData['doner_phone_no'];
         $doner_blood_group = $getData['doner_blood_group'];
         $doner_address     = $getData['doner_address'];
         $doner_image       = $getData['doner_image'];
     }
   }
  ?>



<!--Update Blood Doner Details -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['update']))
   {
         $blood_doner_id = $_GET['blood_doner_id'];

         $doner_name        = $_POST['doner_name'];
         $doner_email       = $_POST['doner_email'];
         $doner_phone_no    = $_POST['doner_phone_no'];
         $doner_blood_group = $_POST['doner_blood_group'];
         $doner_address     = $_POST['doner_address'];

         $tmp         = md5(time());
         $doner_image = $_FILES["doner_image"]["name"];

         if($doner_image != "")
         {
           $dst         = "./blooddoner_img/".$tmp.$doner_image;
           $dst_db      = "blooddoner_img/".$tmp.$doner_image;
           move_uploaded_file($_FILES["doner_image"]["tmp_name"],$dst);

           $sql = "UPDATE tb_blood_doner SET doner_name='$doner_name',doner_email='$doner_email',doner_phone_no='$doner_phone_no',doner_image='$dst_db',doner_blood_group='$doner_blood_group',doner_address='$doner_address' WHERE blood_doner_id = $blood_doner_id";

           $update_row = $db->update($sql);
         }


          $sql = "UPDATE tb_blood_doner SET doner_name='$doner_name',doner_email='$doner_email',doner_phone_no='$doner_phone_no',doner_blood_group='$doner_blood_group',doner_address='$doner_address' WHERE blood_doner_id = $blood_doner_id";

           $update_row = $db->update($sql);

         if($update_row)
         {
         ?>
         <script type="text/javascript">

           window.alert("Blood Doner details updated successfully.");
           window.location='blood_doner.php';

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

		<title>Service Panel  - Update Blood Doner Details</title>
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
									<li class="nav-active">
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
						<h2>Update Blood Doner Details</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>update Blood Doner Details</span></li>
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
										<h2 class="panel-title">Doner Details</h2>
									</header>
									<div class="panel-body">

										<form class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">							

											<div class="form-group">
													<label class="col-md-3 control-label" for="doner_name">* Doner Full Name :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="doner_name" placeholder="Enter blood doner name" value="<?php echo $doner_name; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-3 control-label" for="doner_email">* Doner E-mail ID :</label>
													<div class="col-md-6">
														<input type="email" class="form-control" name="doner_email" placeholder="Enter doner email name" value="<?php echo $doner_email; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-3 control-label" for="doner_contact_no">* Doner Contact No. :</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="doner_phone_no" placeholder="Enter doner contact number" value="<?php echo $doner_phone_no; ?>" required>
													</div>
											</div>

											<div class="form-group">
													<label class="col-md-3 control-label" for="doner_image">* Doner Image :</label>
													<div class="col-md-6">
														<img src="<?php echo $doner_image; ?>" height="130" style="border: 3px solid #0088CC;" alt="blood_doner">
														<br><br>
														<input type="file" class="form-control" name="doner_image">
													</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label" for="doner_blood_group">* Doner Blood Group :</label>
												<div class="col-md-6">
													<select class="form-control" name="doner_blood_group" required>
														<option selected><?php echo $doner_blood_group; ?></option>
														<option>Choose...</option>
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

											<div class="form-group">
													<label class="col-md-3 control-label" for="doner_address">* Doner Address :</label>
													<div class="col-md-6">
														<textarea class="form-control" rows="4" name="doner_address" placeholder="Enter doner address details" required><?php echo $doner_address; ?></textarea>
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
