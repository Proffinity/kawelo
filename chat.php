<?php
    session_start();

    //If condition for Checking if User is Logged in
    if (!isset($_SESSION['userID'])) {
        echo "<script>alert('Please Login')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    } else {
    $userID = $_SESSION['userID'];
    require 'DB/connect.inc.php';
    include('DB/database_connectionPDO.php'); 
    require 'php/user_details.php';
?>
<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title>kawelo Lawyers | Chat</title>
	<link rel="shortcut icon" href="http://localhost/Kawelo Lawyers/assets/images/logo/logo.png">
	<link rel="stylesheet" href="http://localhost/Kawelo Lawyers/assets/css/bootstrap-reboot.css">

	<!-- DataTables -->

	<!-- Responsive datatable examples -->
	<link href="http://localhost/Kawelo Lawyers/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

	<!--styles-->
	<link href="http://localhost/Kawelo Lawyers/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="http://localhost/Kawelo Lawyers/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
	<link href="http://localhost/Kawelo Lawyers/assets/css/icons.css" rel="stylesheet" type="text/css">

	<link href="http://localhost/Kawelo Lawyers/assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="http://localhost/Kawelo Lawyers/assets/emoji/lib/css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="http://localhost/Kawelo Lawyers/assets/emoji/lib/css/emoji.css" rel="stylesheet" type="text/css">
</head>
<body>

<!-- Begin page -->
<div id="wrapper">

	<!-- Top Bar Start -->
	<div class="topbar">

		<!-- LOGO -->
		<div class="topbar-left">
			<a href="index.html" class="logo">
                    <span class="logo-light">
                         kawelo Lawyers
                    </span>
				<span class="logo-sm">
                    <img src="assets/images/logo/logo_gray.png" class="img-fluid" height="70" width="52" alt="kawelo">
                </span>
			</a>
		</div>

		<nav class="navbar-custom">
			<ul class="navbar-right list-inline float-right mb-0">

				<!-- notification -->
				<li class="dropdown notification-list list-inline-item">
					<a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
						<i class="mdi mdi-bell-outline noti-icon"></i>
						<span class="badge badge-pill badge-danger noti-icon-badge">3</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
						<!-- item-->
						<h6 class="dropdown-item-text">
							Notifications
						</h6>
						<div class="slimscroll notification-item-list">
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item active">
								<div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
								<p class="notify-details"><b>notification messages</b><span class="text-muted">Dummy text of the printing</span></p>
							</a>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
								<p class="notify-details"><b>notification messages</b><span class="text-muted">Dummy text of the printing</span></p>
							</a>
						</div>
						<!-- All-->
						<a href="javascript:void(0);" class="dropdown-item text-center notify-all text-primary">
							View all <i class="fi-arrow-right"></i>
						</a>
					</div>
				</li>

				<li class="dropdown notification-list list-inline-item">
					<a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
						<img src="assets/images/logo/logo.png" class="mr-2 img-fluid" height="32" width="32" alt=""> 
						<?php
                           $role = User_role($userID, $conn);
                            echo "$role"." User";
                        ?>
						<span class="mdi mdi-chevron-down"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-sm-left p-2 nav">
						<a href="logout.php" class="nav-item align-items-center">
							<i class="mdi mdi-logout"></i> logout
						</a>
					</div>

				</li>

			</ul>

			<ul class="list-inline menu-left mb-0">
				<li class="float-left">
					<button class="button-menu-mobile open-left waves-effect">
						<i class="mdi mdi-menu"></i>
					</button>
				</li>
				<li class="d-none d-md-inline-block">
					<form role="search" class="app-search">
						<div class="form-group mb-0">
							<input type="text" class="form-control" placeholder="Search.." id="">
							<button type="submit"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</li>
			</ul>
		</nav>

	</div>
	<!-- Top Bar End -->

	<!-- ========== Left Sidebar Start ========== -->
	<div class="side-menu" id="sidebar-menu">
		<!-- Left Menu Start -->
		<ul class="metismenu" id="side-menu">

			<li class="hide-small">
				<div class="row">
					<div class="col ml-2 ">
						<img src="assets/images/icon-user.png"  class="img-fluid ml-3 shadow-smm" width="60" height="60" alt="user">
					</div>
					<div class="col text-white mr-4 pt-2">
						<p class="text-white-50">Welcome <br>
							<span class=" text-white font-12">
                                <?php
	                                 $name = User_details($userID, $conn);

	                                 echo "$name";
	                             ?>
                            </span>
						</p>
					</div>
				</div>

			</li>
			<li>
				<a href="index.php" class="waves-effect">
					<i class="icon-accelerator"></i><span class="badge badge-success badge-pill float-right">9+ something</span> <span> Dashboard </span>
				</a>
			</li>

			<li>
				<a href="cases.php" class="waves-effect">
					<i class="icon-hammer"></i><span> Cases </span>
				</a>
			</li>



			<li>
				<a href="appointments.php" class="waves-effect">
					<i class="icon-calendar"></i><span> Appointments </span>
				</a>
			</li>
			<li>
				<a href="users.php" class="waves-effect">
					<i class="icon-profile"></i><span> Users </span>
				</a>
			</li>
			<li>
				<a href="#" class="waves-effect">
					<i class="mdi mdi-message-outline"></i><span> Chat </span>
				</a>
			</li>
			<li>
				<a href="clients.php" class="waves-effect">
					<i class="fa fa-user-alt"></i><span> Clients </span>
				</a>
			</li>
			<li>
				<a href="logs.php" class="waves-effect">
					<i class="fa fa-clock"></i><span> logs </span>
				</a>
			</li>

		</ul>
	</div>
	<!-- Left Sidebar End -->
	<div class="content-page">
		<!-- Start content -->
		<div class="content">

			<div class="page-title-box10">
				<div class="row align-items-center">
					<div class="col-sm-6">
						<h6 class="page-title text-hide">Law Chat</h6>
					</div>
				</div>
			</div>

		<div class="card shadow">
			<div class="row g-0">
				<div class="col-12 col-lg-5 col-xl-3 border-right">

					<div class="px-4 d-none d-md-block">
						<div class="d-flex align-items-center">
							<div class="flex-grow-1">
								<input type="text" class="form-control my-3" placeholder="Search...">
							</div>

							<button type="button" class="btn btn-primary btn-sm">group chat <i class="fa fa-users"></i></button>
						</div>
					</div>

					<div id="user_details"></div>

					<hr class="d-block d-lg-none mt-1 mb-0">
				</div>
				<div class="col-12 col-lg-7 col-xl-9">
					<div id="user_model_details"></div>
				</div>
			</div>
		</div>
	</div>
	</div>


</div>
	<!-- jQuery  -->
	<script type="text/javascript" src="http://localhost/Kawelo Lawyers/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="http://localhost/Kawelo Lawyers/js/chatFunctions.js"></script>
	<script src="http://localhost/Kawelo Lawyers/assets/js/jquery.min.js"></script>
	<script src="http://localhost/Kawelo Lawyers/assets/js/bootstrap.bundle.min.js"></script>
	<script src="http://localhost/Kawelo Lawyers/assets/js/metismenu.min.js"></script>
	<script src="http://localhost/Kawelo Lawyers/assets/js/jquery.slimscroll.js"></script>
	<script src="http://localhost/Kawelo Lawyers/assets/js/waves.min.js"></script>

	<script src="assets/js/search.js"></script>
	<script src="assets/pages/dashboard.init.js"></script>

	<!-- App js -->
	<script src="assets/js/app.js"></script>
	<!-- Begin emoji-picker JavaScript -->
	<script src="assets/emoji/lib/js/config.js"></script>
	<script src="assets/emoji/lib/js/util.js"></script>
	<script src="assets/emoji/lib/js/jquery.emojiarea.js"></script>
	<script src="assets/emoji/lib/js/emoji-picker.js"></script>
	<!-- End emoji-picker JavaScript -->


	<!--custom js-->

	
	<script type="text/javascript">
		$(function () {
			$('.chat-messages').slimScroll({
				height: '300px'
			});
			$('.cc').slimscroll({
				height: '400px'
			});

			$("#list-search").filterElements({
				parentElementWrapper: "#my-list-items",
				childElementToFilter: '.list-group-item',
				caseInsensitive: true
			});
			$( "#txt1" ).emojionePicker();
		});

	</script>
	<script>
		$(function() {
			// Initializes and creates emoji set from sprite sheet
			window.emojiPicker = new EmojiPicker({
				emojiable_selector: '[data-emojiable=true]',
				assetsPath: 'assets/emoji/lib/img/',
				popupButtonClasses: 'fa fa-smile-o'
			});
			window.emojiPicker.discover();
		});
	</script>
</body>

</html>
<?php } ?>