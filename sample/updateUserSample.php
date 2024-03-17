<?php
include('connection.php');

//Show/Select User Details
if (isset($_POST['UserDetails'])) {
    $userID = $_POST['UserDetails'];

    $sql = "SELECT * FROM `test` WHERE id = $userID;";

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

// Update User Details

if(isset($_POST['hiddenID'])){
    $userID = $_POST['hiddenID'];

    $userFirstName = $_POST['update_first_name'];
    $userLastName = $_POST['update_last_name'];
    $userGender = $_POST['update_gender'];
    $userContact = $_POST['update_contact_no'];
    $userBirtdate = $_POST['update_birthdate'];
    $userEmail = $_POST['update_email'];
    $userPassword = $_POST['update_password'];

    $sql = "
    UPDATE `test` 
    SET 
        first_name = '$userFirstName',
        last_name = '$userLastName',
        gender = '$userGender',
        contact = '$userContact',
        birthdate = '$userBirtdate',
        email = '$userEmail',
        password = '$userPassword'
    WHERE id = $userID;
    ";

    $result = mysqli_query($con, $sql);
}