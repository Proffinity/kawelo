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
    require 'php/table_function.php';
?>
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>kawelo Lawyers | Case</title>
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
                        <a href="#" class="waves-effect">
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
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Cases</h4>

                    </div>
                    <div class="col-sm-6">
                        <ul class="float-right nav">
                            
                            <li class="nav-item">
                                <a class="nav-link " href="#"><i class="mdi mdi-download-outline mdi-24px"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#"><i class="mdi mdi-content-save mdi-24px"></i></a>
                            </li>
                        </ul>

                    </div>

                </div>
                <!-- end row -->
            </div>
            <div class="row justify-content-center">
                <div class="col ">
    <div class="card m-b-30 shadow">
        <div class="card-body">

            <h4 class="mt-0 header-title">Cases Description</h4>
            <p class="sub-title">
                Cases Description... Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius facere nesciunt praesentium.
            </p>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-selected="false">
                        <span class="d-none d-md-block">Detail</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">
                        <span class="d-none d-md-block">History</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#messages" role="tab" aria-selected="true">
                        <span class="d-none d-md-block">Transfer</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                    </a>
                </li>
                <li class="nav-item ml-auto">
                    <a class="nav-link bg-light" data-toggle="tab" href="#settings" role="tab">
                        <span class="d-none d-md-block">Update Next Date <i class="mdi mdi-calendar-alert"></i></span><span class="d-block d-md-none"><i class="mdi mdi-settings h5"></i></span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane p-3 active" id="home" role="tabpanel">
                    <div class="row">
                        <div class="table-responsive col-sm-6">
                            <p class="header-title">
                                Case Details
                            </p>
                            <table class="table mb-0">
                                <?php
                                    if (isset($_GET['caseID'])) {
                                        $caseIDOne = $_GET['caseID'];

                                        $outputOne = getCaseDetailsOne($caseIDOne, $conn);
                                        echo "$outputOne";
                                    }
                                ?>
                            </table>
                        </div>

                        <div class="table-responsive col-sm-6">
                            <p class="header-title">
                                <span class="text-hide">...</span>
                            </p>
                            <table class="table mb-0 ">
                                <?php 

                                    $outputTwo = getCaseDetailsTwo($caseIDOne, $conn);
                                    echo "$outputTwo";
                                    
                                ?>
                            </table>
                        </div>
                    </div>


                </div>
                <div class="tab-pane p-3" id="profile" role="tabpanel">
                    <p class="mb-0">
                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla

                    </p>
                </div>
                <div class="tab-pane p-3 " id="messages" role="tabpanel">
                    <p class="mb-0">
                        Etsy mixtape wayfarers, ethical wes anderson tofu before they

                    </p>
                </div>
                <div class="tab-pane p-3" id="settings" role="tabpanel">
                    <p class="mb-0">
                        Trust fund seitan letterpress, keytar raw denim keffiyeh etsy

                    </p>
                </div>
            </div>

        </div>
    </div>

</div>

            </div>
            <div class="row align-content-center">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">
                            <?php
                                $outputThree = getPetitioner($caseIDOne, $conn);
                                echo "$outputThree";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metismenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/waves.min.js"></script>



        <script src="assets/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

</body>

</html>
<?php } ?>