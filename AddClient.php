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
    <title>kawelo Lawyers | Add Clients</title>
    <link rel="shortcut icon" href="http://localhost/Kawelo Lawyers/assets/images/logo/logo.png">

    <!-- DataTables -->
    <link href="http://localhost/Kawelo Lawyers/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/Kawelo Lawyers/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="http://localhost/Kawelo Lawyers/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!--styles-->
    <link href="http://localhost/Kawelo Lawyers/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="http://localhost/Kawelo Lawyers/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="http://localhost/Kawelo Lawyers/assets/css/icons.css" rel="stylesheet" type="text/css">

    <link href="http://localhost/Kawelo Lawyers/assets/css/style.css" rel="stylesheet" type="text/css">
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
                <a href="chat.php" class="waves-effect">
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
    <!-- Left Sidebar End -->
    <div class="content-page">
        <div class="content">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col text-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="Clients.html">Clients</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Clients</li>
                            </ol>
                        </nav>
                        <h4 class="page-title">Add Clients</h4>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col">
                                        <label for="FirstName">
                                            First Name
                                        </label>
                                        <input type="text" class="form-control" id="FirstName">
                                    </div>
                                    <div class="col">
                                        <label for="middleName">
                                            Other Name
                                        </label>
                                        <input type="text" class="form-control" id="otherName">
                                    </div>
                                    <div class="col">
                                        <label for="LastName">
                                            Last Name
                                        </label>
                                        <input type="text" class="form-control" id="LastName">
                                    </div>
                                    <div class="col">
                                        <label for="gender">
                                            Gender
                                        </label>
                                        <input type="text" class="form-control" id="gender">
                                    </div>
                                    <div class="col">
                                        <label for="PhoneNo">
                                            Phone NO:
                                        </label>
                                        <input type="tel" class="form-control" id="PhoneNo">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <!--
                                        <div class="col">
                                            <label for="HomeAd">
                                                Status active
                                            </label>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input tg ut" id="active1" name="act1">
                                                <label class="custom-control-label green" for="active1">Case Open</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="HomeAd">
                                                Status inactive
                                            </label>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input tg ut" id="Inactive" name="act2">
                                                <label class="custom-control-label red" for="Inactive">
                                                    <span class="greent">
                                                        Case Closed
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    -->
                                    
                                    <div class="col">
                                        <label for="Email">
                                            Email
                                        </label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="col">
                                        <label for="HomeD">
                                          Home Address
                                        </label>
                                        <input type="text" class="form-control" id="HomeAddress">
                                    </div>
                                    <div class="col">
                                        <label for="Pass">
                                            Residence
                                        </label>
                                        <input type="text" class="form-control" id="residence">
                                    </div>
                                    <div class="col">
                                        <label for="cases">
                                            Number Of Cases
                                        </label>
                                        <input type="number" min="0" datatype="int" class="form-control" id="cases">
                                    </div>
                                </div>


                                <div class="row mt-3 ml-auto">
                                    <button id="enter" type="button" class="btn btn-secondary">submit</button>
                                </div>
                            </form>
                            <span id="client_save"></span>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
<!-- jQuery  -->
<script type="text/javascript" src="http://localhost/Kawelo Lawyers/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="http://localhost/Kawelo Lawyers/js/inputFunctions.js"></script>
<script src="http://localhost/Kawelo Lawyers/assets/js/jquery.min.js"></script>
<script src="http://localhost/Kawelo Lawyers/assets/js/bootstrap.bundle.min.js"></script>
<script src="http://localhost/Kawelo Lawyers/assets/js/metismenu.min.js"></script>
<script src="http://localhost/Kawelo Lawyers/assets/js/jquery.slimscroll.js"></script>
<script src="http://localhost/Kawelo Lawyers/assets/js/waves.min.js"></script>

<!-- App js -->
<script src="http://localhost/Kawelo Lawyers/assets/js/app.js"></script>

<script>
    //toggle buttons
    $('.tg , .ut').change(function () {
        $('.tg').prop('checked', false);
        $(this).prop('checked', true);
        $('.ut').not(this).prop('checked', false);
    });

</script>
</body>
</html>
<?php } ?>