<?php
include 'connection.php';

extract($_POST);
// $sql = "INSERT INTO `test` (`first_name`, `last_name`, `contact`) VALUES ('$sendFirstName' ,'$sendLastName', '$sendContact')";
// $result = mysqli_query($con, $sql);
// echo 'create user reached';

if (
    isset($_POST['sendFirstName']) && 
    isset($_POST['sendLastName']) && 
    isset($_POST['sendGender']) && 
    isset($_POST['sendContact']) &&
    isset($_POST['sendBirthdate']) &&
    isset($_POST['sendEmail']) &&
    isset($_POST['sendPassword'])
) {
   
    $sql = "INSERT INTO `test` (
        `first_name`, 
        `last_name`, 
        `gender`,
        `contact`,
        `birthdate`,
        `email`,
        `password`) 
        VALUES (
            '$sendFirstName' ,
            '$sendLastName', 
            '$sendGender', 
            '$sendContact', 
            '$sendBirthdate',
            '$sendEmail',
            '$sendPassword')";

    $result = mysqli_query($con, $sql);
}
