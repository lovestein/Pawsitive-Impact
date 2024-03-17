<?php
session_start();
include('connection.php');

if (isset($_POST['loginButton'])) {
    $user_email = $_POST['userEmail'];
    $user_password = $_POST['userPassword'];

    $sql = "SELECT * FROM `user_details` WHERE user_email = '$user_email' AND user_password = '$user_password';";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $data) {
            $user_id = $data['user_id'];
            $user_name = $data['user_fname'] . ' ' . $data['user_lname'];
            $user_email = $data['user_email'];
            $user_type = $data['user_type'];
        }
        $_SESSION['auth'] = true;
        $_SESSION['auth_user_type'] = "$user_type"; // User | Admin
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_type' => $user_type
        ];

        if ($_SESSION['auth_user_type'] == 'Admin') {
            header("Location: admin_home.php");
            $_SESSION['message'] = "Welcome Admin.";
            exit(0);
        } else if ($_SESSION['auth_user_type'] == 'User') {
            header("Location: index.php");
            $_SESSION['message'] = "Successfully Logged In.";
            exit(0);
        }
    } else {
        header("Location: index.php");
        $_SESSION['message'] = "Invalid Email or Password.";
        exit(0);
    }
}



// if(isset($_POST['loginButton'])){
//     $user_email = $_POST['userEmail'];
//     $user_password = $_POST['userPassword'];

//     $sql="SELECT * FROM `user_details` WHERE user_email = '$user_email' AND user_password = '$user_password';";
//     $result = mysqli_query($con, $sql);
//     $user_type = mysqli_fetch_array($result);

//     if($user_type['user_type'] == "Admin"){
//         $_SESSION['user_email'] = $user_email;
//         header('Location: admin_home.php');
//     }
//     else if($user_type['user_type'] == "User"){
//         $_SESSION['user_email'] = $user_email;
//         header('Location: user_home.php');    
//     }
//     else{
//         $_SESSION['status'] = 'Email or Password is Invalid.';
//         header('Location: landing_page.php');   
//     }
// }
// else {
//     $_SESSION['messsage'] = "Access Not Allowed.";
//     header('Location: user_home.php');
// }
