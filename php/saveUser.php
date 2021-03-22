<?php

if (isset($_POST['save_user'])) {

    $Employee_no = $_POST['Employee_no'];
    $startDate = $_POST['date'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $home_address = $_POST['home_address'];
    $district = $_POST['district'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $real_password = sha1($password);
    $image = $_FILES['employeePic']['name'];
    $imagePath = "images/$image";
    $image_tmp = $_FILES['employeePic']['tmp_name'];

    move_uploaded_file($image_tmp, "images/$image");

    if (!empty($Employee_no) && !empty($startDate) && !empty($firstName) && !empty($lastName) && !empty($email) && !empty($phone_no) && !empty($home_address) && !empty($district) && !empty($role) && !empty($password) && !empty($confirm_password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            echo 
                "
                    <div class=\"alert alert-warning mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
                        <strong>Notification!</strong> The Email address Format is Incorrect!
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                ";
        } elseif ($password!=$confirm_password) {
            echo 
                "
                    <div class=\"alert alert-warning mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
                        <strong>Notification!</strong> Your Passwords do not Match!
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                ";
        } else {
            $insert_users = "INSERT INTO users(userID,first_name,last_name,image_path,start_date,email,mobile_no,home_address,password,home_district,role) VALUES('$Employee_no','$firstName','$lastName','$image','$startDate','$email','$phone_no','$home_address','$real_password','$district','$role')";
            $run_users = mysqli_query($conn, $insert_users);

            if ($run_users) {
                echo 
                    "
                        <div class=\"alert alert-success mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
                            <strong>Notification!</strong> New user was Successfully Inserted!
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>
                    ";
            } else {
                echo 
                    "
                        <div class=\"alert alert-warning mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
                            <strong>Notification!</strong> Records were not Successfully Entered!
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>
                    ";
            }
        }
    } else {
        echo 
            "
                <div class=\"alert alert-warning mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
                    <strong>Notification!</strong> All fields are Required except the Picture Upload
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
            ";
    }
}