<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Service Panel  - Manage Money Donation</title>
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
							<figure class="profile-picture">
								<img src="assets/images/profile_img.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name" style="color: black;">Nurshed Trena</span>
								<span class="role" style="color: black;">Service Panel</span>
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
									<a role="menuitem" tabindex="-1" href="pages-signin.html"><i class="fa fa-power-off"></i> Logout</a>
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
									<li>
										<a href="manage_charity_foundation.php">
											<i class="fa fa-list" aria-hidden="true"></i>
											<span>Manage Charity Details</span>
										</a>
									</li>
									<li class="nav-active">
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
										<a href="#">
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
						<h2>Manage Money Donation</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Manage Money Donation</span></li>
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
										<h2 class="panel-title">Donation List</h2>
									</header>
									<div class="panel-body">
										<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
											<thead>
												<tr>
													<th>Payment Id</th>
													<th>Payment Code</th>
													<th>Foundation Name</th>
													<th>Foundation Code</th>
													<th>Total Amount</th>
													<th>Bank Acc. No. / TrxID</th>
													<th>Payment Screenshot</th>
													<th>Doner Name</th>
													<th>Doner Contact</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

												<tr>
													<td class="text-primary" style="font-weight: bold;">Payment Id-1</td>
													<td>330214</td>
													<td style="font-weight: bold;">১ টাকায় আহার</td>
													<td>332510</td>	
													<td class="text-success" style="font-weight: bold;">10,000 Tk.</td>
													<td class="text-success">8DGX9RT3UV</td>			
													<td><img src="img/bkash_payment.jpg" height="100" alt="furniture"></td>
													<td>Nurshed Trena</td>
													<td>01852154866</td>
													<td><a href="#" title="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a></td>
												</tr>
												
											</tbody>
										</table>
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
