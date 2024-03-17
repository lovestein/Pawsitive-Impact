<?php
session_start();
include('connection.php');

if (isset($_POST['postAdoptionButton'])) {
    $animal_name = mysqli_escape_string($con, $_POST['addAnimalName']);
    $animal_type = $_POST['addAnimalType'];
    $animal_age = $_POST['addAnimalAge'];
    $animal_gender = $_POST['addAnimalGender'];
    $animal_breed =  mysqli_escape_string($con, $_POST['addAnimalBreed']);
    $animal_weight = $_POST['addAnimalWeight'];
    $kapon_date = $_POST['addAnimalKapon'];
    $arv_date = $_POST['addAnimalArv'];
    $deworm_date = $_POST['addAnimalDeworm'];

    // Animal Image Conversion
    $image = $_FILES['addAnimalImage']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    // To be inserted
    $animal_image_file_name = time() . '.' . $image_extension;


    $adoption_description = mysqli_escape_string($con, $_POST['addAdoptionDescription']);
    $adoption_status = $_POST['addAdoptionStatus'];

    $user_adoption_id = $_SESSION['auth_user']['user_id'];

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
        $last_animal_id = -=($con);

        $insert_adoption = "INSERT INTO `adoption_listing`(
            `animal_adoption_id`, 
            `user_adoption_id`, 
            `adoption_description`, 
            `adoption_status`) 
            VALUES (
                '$last_animal_id',
                '$user_adoption_id',
                '$adoption_description',
                '$adoption_status')";

        $insert_adoption_run = mysqli_query($con, $insert_adoption);

        if ($insert_adoption_run) {
            header('Location: user_adopt.php');
            $_SESSION['message'] = "Adoption Posted Successfully!";
            exit(0);
        } else {;
            header('Location: user_adopt.php');
            $_SESSION['message'] = "Something Went Wrong! Please Try Again.";
            exit(0);
        }
    }
}
