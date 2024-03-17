<?php
session_start();
include('connection.php');

extract($_POST);

if (
    isset($_POST['addUserFirstName']) &&
    isset($_POST['addUserLastName']) &&
    isset($_POST['addUserGender']) &&
    isset($_POST['addUserBirthdate']) &&
    isset($_POST['addUserAddress']) &&
    isset($_POST['addUserContact']) &&
    isset($_POST['addUserEmail']) &&
    isset($_POST['addPassword']) &&
    isset($_POST['addConfirmPassword']) &&
    isset($_POST['addUserType'])
) {
    if ($addPassword == $addConfirmPassword) {
        // Check Email
        $checkEmail = "SELECT user_email FROM user_details WHERE user_email = '$addUserEmail'";
        $checkEmail_run = mysqli_query($con, $checkEmail);

        if (mysqli_num_rows($checkEmail_run) > 0) {
            // Email Already Exists
            header('Location: index.php');
            $_SESSION['message'] = "Email Already Exists. Please Try Again.";
            exit(0);
        } else {
            // Create User 
            $sql = "INSERT INTO `user_details`(
                    `user_fname`, 
                    `user_lname`, 
                    `user_gender`, 
                    `user_birthdate`, 
                    `user_address`, 
                    `user_contactno`, 
                    `user_email`, 
                    `user_password`, 
                    `user_type`) 
                VALUES (
                    '$addUserFirstName',
                    '$addUserLastName',
                    '$addUserGender',
                    '$addUserBirthdate',
                    '$addUserAddress',
                    '$addUserContact',
                    '$addUserEmail',
                    '$addPassword',
                    '$addUserType')";

            $result = mysqli_query($con, $sql);

            if ($result) {
                header('Location: index.php');
                $_SESSION['message'] = "Registered Successfully! Please Login.";
                exit(0);
            } else {
                header('Location: index.php');
                $_SESSION['message'] = "Something Went Wrong! Please Try Again.";
                exit(0);
            }
        }
    } else {
        header('Location: index.php');
        $_SESSION['message'] = "Password and Confirm Password Doesn't Match. Please Try Again.";
        exit(0);
    }
}
