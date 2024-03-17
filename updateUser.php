<?php
include('connection.php');

//Show Selected User Details
if (isset($_POST['userDetailsID'])) {
    $user_id = $_POST['userDetailsID'];

    $sql = "SELECT * FROM `user_details` WHERE user_id = $user_id;";

    $result = mysqli_query($con, $sql);
    $response = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }

    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = "Invalid or Data not Found!";
}

// Update Selected User Details
if (isset($_POST['hiddenUserID'])) {

    $unique = $_POST['hiddenUserID'];

    $firstName = $_POST['updateAdminFirstName'];
    $lastName = $_POST['updateAdminLastName'];
    $gender = $_POST['updateAdminGender'];
    $birthdate = $_POST['updateAdminBirthdate'];
    $address = $_POST['updateAdminAddress'];
    $contactno = $_POST['updateAdminContact'];
    $email = $_POST['updateAdminEmail'];
    $password = $_POST['updateAdminPassword'];
    $type = $_POST['updateUserType'];

    $sql = "UPDATE `user_details` SET 
    `user_fname`='$firstName',
    `user_lname`='$lastName ',
    `user_gender`='$gender',
    `user_birthdate`='$birthdate',
    `user_address`='$address',
    `user_contactno`='$contactno',
    `user_email`='$email',
    `user_password`='$password',
    `user_type`='$type' 
    WHERE `user_id` = $unique
    ";

    $result = mysqli_query($con, $sql);
}
