<?php
session_start();

//If condition for Checking if User is Logged in
if (!isset($_SESSION['userID'])) {
    require 'DB/connect.inc.php';
    require 'php/auth_login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>LAW OFFICE</title>
    <link rel="shortcut icon" href="assets/images/logo/logo.png">
    <!--styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>


        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="home-btn d-none d-sm-block">
                <a href="index.html" class="text-white"><i class="fas fa-home h2"></i></a>
            </div>
        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
                    <div class="card-body">
                        <div class="text-center m-t-0 m-b-15">
                                <a href="index.html" class="logo logo-admin"><img src="assets/images/logo/logo.png" alt="" height="24"></a>
                        </div>
                        <h5 class="font-18 text-center">Sign in to continue to Law firm.</h5>
                        <?php
                            //Login Function
                            if (isset($_POST['login'])) {
                                //Escape variables for Security
                                $userID =  mysqli_real_escape_string($conn, htmlentities($_POST['userID']));
                                $password = mysqli_real_escape_string($conn, htmlentities(sha1($_POST['password'])));
                                //$self = $_SERVER['PHP_SELF'];

                                echo Login($userID, $password, $conn);
                            }
                        ?>
                        <form class="form-horizontal m-t-30" method="POST" action="">
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>User ID</label>
                                    <input name="userID" class="form-control" type="text" required="" placeholder="User ID">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Password</label>
                                    <input name="password" class="form-control" type="password" required="" placeholder="Password">
                                </div>
                            </div>
    
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button name="login" class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
    
                            <div class="form-group row m-t-30 m-b-0">
                                <div class="col-sm-7">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                </div>
                                <div class="col-sm-5 text-right">
                                    <a href="pages-register.html" class="text-muted">Create an account</a>
                                </div>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metismenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/waves.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        
    </body>

</html>
<?php
} else {
    header("location:index.php");
}
?>