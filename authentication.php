<?php
// session_start();


if (!isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Login to Access Dashboard";
    header('Location: index.php');
    exit(0);
} else {
    if ($_SESSION['auth_user_type'] != "Admin") {
        $_SESSION['message'] = "Unauthorized Access. Please Login First.";
        header('Location: index.php');
        exit(0);
    }
}
