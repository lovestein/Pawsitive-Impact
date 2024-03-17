<?php
include('connection.php');

extract($_POST);

if(
    isset($_POST['addAdminFirstName']) &&
    isset($_POST['addAdminLastName']) &&
    isset($_POST['addAdminGender']) &&
    isset($_POST['addAdminBirthdate']) &&
    isset($_POST['addAdminAddress']) &&
    isset($_POST['addAdminContact']) &&
    isset($_POST['addAdminEmail']) &&
    isset($_POST['addAdminPassword']) &&
    isset($_POST['addUserType']) 
)
{
    $sql = "
    INSERT INTO `user_details`(
        `user_fname`, 
        `user_lname`, 
        `user_gender`, 
        `user_birthdate`, 
        `user_address`, 
        `user_contactno`, 
        `user_email`, 
        `user_password`, 
        `user_type`
        ) 
        VALUES (
            '$addAdminFirstName',
            '$addAdminLastName',
            '$addAdminGender',
            '$addAdminBirthdate',
            '$addAdminAddress',
            '$addAdminContact',
            '$addAdminEmail',
            '$addAdminPassword',
            '$addUserType')
    ";

    $result = mysqli_query($con, $sql);
}