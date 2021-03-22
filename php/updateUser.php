<?php

if (isset($_POST['update_user'])) {

    $Employee_no = $_POST['Employee_no'];
    $startDate = $_POST['date'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $home_address = $_POST['home_address'];
    $district = $_POST['district'];
    $role = $_POST['role'];
    //$image = $_FILES['employeePic']['name'];
    //$imagePath = "images/$image";
   // $image_tmp = $_FILES['employeePic']['tmp_name'];

    //move_uploaded_file($image_tmp, "images/$image");

    if (!empty($Employee_no) && !empty($startDate) && !empty($firstName) && !empty($lastName) && !empty($email) && !empty($phone_no) && !empty($home_address) && !empty($district) && !empty($role)) {
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
        } else {
            $update_user = "UPDATE users SET userID='$Employee_no', first_name='$firstName', last_name='$lastName', start_date='$startDate', email='$email', mobile_no='$phone_no', home_address='$home_address', role='$role' WHERE ID='$getID'";
            $run_users = mysqli_query($conn, $update_user);

            if ($run_users) {
                echo 
                    "
                        <div class=\"alert alert-success mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
                            <strong>Notification!</strong> User Update was Successfull!
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>
                    ";
            } else {
                echo 
                    "
                        <div class=\"alert alert-warning mx-3 mt-3 alert-dismissible fade show\" role=\"alert\">
                            <strong>Notification!</strong> Records were not Successfully Updated!
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
                    <strong>Notification!</strong> All fields are Required except the Picture Upload!
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
            ";
    }
}