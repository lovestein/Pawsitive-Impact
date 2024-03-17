<?php
session_start();
include('connection.php');

if (isset($_POST['SendDonation'])) {
    $animal_donation_id = $_POST['animalID'];
    $donor_name = mysqli_escape_string($con, $_POST['addDonorName']);
    $payment_method = $_POST['addPaymentMethod'];
    $amount_donated = $_POST['addAmountDonated'];
    $donor_message = mysqli_escape_string($con, $_POST['addDonorMessage']);

    if ($donor_name == '') {
        $donor_name = "Anonymous";
        if ($donor_message == '') {
            $donor_message = "N/A";
        }
    }

    $insert_trasaction = "INSERT INTO `donation_transactions`(
        `animal_transaction_id`, 
        `donor_name`, 
        `payment_method`, 
        `amount_donated`, 
        `donation_message`) 
        VALUES (
            '$animal_donation_id',
            '$donor_name ',
            '$payment_method',
            '$amount_donated',
            '$donor_message')";

    $insert_trasaction_run = mysqli_query($con, $insert_trasaction);

    if ($insert_trasaction_run) {

        $update_donation = "UPDATE `donation_listing`
        SET amount_reached = (amount_reached + '$amount_donated')
        WHERE animal_donation_id = $animal_donation_id";

        $check_donation_status = "UPDATE `donation_listing`
        SET donation_status = CASE
            WHEN (amount_reached >= amount_needed) 
                THEN 'Finished' 
                ELSE donation_status 
                END";

        $update_donation_run = mysqli_query($con, $update_donation);
        $check_donation_status_run = mysqli_query($con, $check_donation_status);

        if ($update_donation) {
            header('Location: user_donate.php');
            $_SESSION['message'] = "Donation Sent Successfully! Thank You for Your Kindness!";
            exit(0);
        } else {
            header('Location: user_donate.php');
            $_SESSION['message'] = "Something Went Wrong! Please Try Again.";
            exit(0);
        }
    }
} else {
    header('Location: user_donate.php');
    $_SESSION['message'] = "Something Went Wrong! Please Try Again.";
    exit(0);
}
