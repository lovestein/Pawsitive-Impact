<?php
include('connection.php');

extract($_POST);

if (
    isset($_POST['adminFirstNameSend']) &&
    isset($_POST['adminLastNameSend']) &&
    isset($_POST['adminSexSend']) &&
    isset($_POST['adminBirthdateSend']) &&
    isset($_POST['adminAddressSend']) &&
    isset($_POST['adminContactSend']) &&
    isset($_POST['adminEmailSend']) &&
    isset($_POST['adminPasswordSend'])
) {
    $sql = "INSERT INTO `user_details`(
            `user_fname`, 
            `user_lname`, 
            `user_sex`, 
            `user_birthdate`, 
            `user_address`, 
            `user_contactno`, 
            `user_email`, 
            `user_password`)
        VALUES (
            '$adminFirstNameSend',
            '$adminLastNameSend',
            '$adminSexSend',
            '$adminBirthdateSend',
            '$adminAddressSend',
            '$adminContactSend',
            '$adminEmailSend',
            '$adminPasswordSend',
    )";

    $result = mysqli_query($con, $sql);
}
