<?php
    session_start();

    //If condition for Checking if User is Logged in
    if (!isset($_SESSION['userID'])) {
        echo "<script>alert('Please Login')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    } else {
    $userID = $_SESSION['userID'];
    require 'DB/connect.inc.php'; 
    require 'php/user_details.php';
?>
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>KAWELO LAWYERS</title>
    <link rel="shortcut icon" href="assets/images/logo/logo.png">


    <!-- DataTables -->
    <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!--styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">

    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

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
    <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
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
                        <a href="#" class="waves-effect">
                            <i class="fa fa-clock"></i><span> logs </span>
                        </a>
                    </li>


                </ul>

            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="page-title-box10">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Input Cases</h4>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="row">

                <div class="col-sm-12">
                    <div class="card shadow-sm">
                        <div class="card-body">

                            <form>

                                <div class="row">
                                    <div class="page-title-box10">
                                        <label class="page-title ml-3 font-10">Client &  Case Detail</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="Phone&Number">
                                           Client Full Name
                                        </label>
                                        <input name="full_name" type="text" class="form-control" id="full_name">
                                    </div>
                                    <div class="col">
                                        <label for="Category">
                                           Case Category
                                        </label>
                                        <input name="category" type="text" class="form-control" id="category">
                                    </div>
                                    <div class="col">
                                        <label for="Case">
                                           Case Type
                                        </label>
                                        <input name="case" type="text" class="form-control" id="case_type">
                                    </div>
                                    <div class="col">
                                        <label for="AssignTo">
                                           Assign To
                                        </label>
                                        <select name="assign" class="custom-select custom-select-sm" id="AssignTo">
                                            <option data-value="">Select One</option>
                                            <option data-value="Senior Counsel">Senior Counsel</option>
                                            <option data-value="Master Counsel">Master Counsel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 mt-3">
                                        <label for="Registration_no">
                                           Registration Number
                                        </label>
                                        <input name="registration_no" type="text" class="form-control" id="Registration_no">
                                    </div>
                                    <div class="col-3 mt-3">
                                        <label for="Registration_date">
                                           Registration Date
                                        </label>
                                        <input name="registration_date" type="date" class="form-control" id="Registration_date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="page-title-box10">
                                        <label class="page-title ml-3 font-10 ">Court details</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="CourtName">
                                           Court Name
                                        </label>
                                        <input name="court_name" type="text" class="form-control" id="CourtName">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="CourtNO">
                                           Court Number
                                        </label>
                                        <input name="court_no" type="text" class="form-control" id="CourtNO">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="Magistrate">
                                           Judge Name
                                        </label>
                                        <input name="judge_name" type="text" class="form-control" id="Judge_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="page-title-box10">
                                        <label class="page-title ml-3 font-10">Respondent and Filing </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="Respondent">
                                            Respondent's Name
                                        </label>
                                        <input name="respondent_name" type="text" class="form-control" id="Respondent">
                                    </div>
                                    <div class="col-3">
                                        <label for="Respondent">
                                            Filing Number
                                        </label>
                                        <input name="filing_no" type="text" class="form-control" id="Filling_No">
                                    </div>
                                    <div class="col-3">
                                        <label for="Respondent">
                                            Filing Date
                                        </label>
                                        <input name="filing_date" type="date" class="form-control" id="Filing_Date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="page-title-box10">
                                        <label class="page-title ml-3 font-10">Hearing Date's</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="Date">
                                            First Hearing Date
                                        </label>
                                        <input name="first" type="date" class="form-control" id="First_Date">
                                    </div>
                                    <div class="col-3">
                                        <label for="Next_Date">
                                            Next Hearing Date
                                        </label>
                                        <input name="next" type="date" class="form-control" id="Next_Date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="page-title-box10">
                                        <label class="page-title ml-3 font-10">Status</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="State">
                                            status
                                        </label>
                                        <input name="status" type="text" class="form-control" id="Status">
                                    </div>
                                </div>
                                <div class="row mt-3 ml-auto">
                                    <button id="save" name="enter" type="button" class="btn btn-secondary">submit</button>
                                </div>
                            </form>
                            <span id="save_status"></span>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

<!-- jQuery  -->
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/inputCase.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metismenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/waves.min.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>


</body>

</html>
<?php } ?>