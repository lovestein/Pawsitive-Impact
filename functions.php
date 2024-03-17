<?php
session_start();

if (isset($_POST['logoutButton'])) {
    // session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user_type']);
    unset($_SESSION['auth_user']);


    header('Location: index.php');
    $_SESSION['message'] = "Logged Out Successfully.";
    exit(0);
}
