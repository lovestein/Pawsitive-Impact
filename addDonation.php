<?php
session_start();
include('connection.php');

if (isset($_POST['postDonationButton'])) {
    $animal_name = mysqli_escape_string($con, $_POST['addAnimalName']);
    $animal_type = $_POST['addAnimalType'];
    $animal_age = $_POST['addAnimalAge'];
    $animal_gender = $_POST['addAnimalGender'];
    $animal_breed = mysqli_escape_string($con, $_POST['addAnimalBreed']);
    $animal_weight = $_POST['addAnimalWeight'];
    $kapon_date = $_POST['addAnimalKapon'];
    $arv_date = $_POST['addAnimalArv'];
    $deworm_date = $_POST['addAnimalDeworm'];

    // Animal Image Conversion
    $image = $_FILES['addAnimalImage']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    // To be inserted
    $animal_image_file_name = time() . '.' . $image_extension;

    $donation_amount = $_POST['addDonationAmount'];
    $donation_description = mysqli_escape_string($con, $_POST['addDonationDescription']);
    $donation_status = $_POST['addDonationStatus'];

    $user_donation_id = $_SESSION['auth_user']['user_id'];

    $insert_animal = "INSERT INTO `animal_identification`(
            `animal_type`, 
            `animal_name`, 
            `animal_age`, 
            `animal_gender`, 
            `animal_breed`, 
            `animal_weight`, 
            `kapon_date`, 
            `arv_date`, 
            `deworm_date`, 
            `animal_image`) 
        VALUES (
            '$animal_type',
            '$animal_name',
            '$animal_age',
            '$animal_gender',
            '$animal_breed',
            '$animal_weight',
            '$kapon_date',
            '$arv_date',
            '$deworm_date',
            '$animal_image_file_name')";

    $insert_animal_run = mysqli_query($con, $insert_animal);

    if ($insert_animal_run) {
        // Move the uploaded image to uploads folder
        move_uploaded_file($_FILES['addAnimalImage']['tmp_name'], './uploads/animals/' . $animal_image_file_name);

        // Get the inserted animal's id
        $last_animal_id = mysqli_insert_id($con);

        $insert_donation = "INSERT INTO `donation_listing`(
                `animal_donation_id`, 
                `user_donation_id`, 
                `amount_needed`, 
                `donation_description`, 
                `donation_status`) 
            VALUES (
                '$last_animal_id',
                '$user_donation_id',
                '$donation_amount',
                '$donation_description',
                '$donation_status')";

        $insert_donation_run = mysqli_query($con, $insert_donation);

        if ($insert_donation_run) {
            header('Location: user_donate.php');
            $_SESSION['message'] = "Donation Posted Successfully!";
            exit(0);
        } else {
            header('Location: user_donate.php');
            $_SESSION['message'] = "Something Went Wrong! Please Try Again.";
            exit(0);
        }
    }
}
