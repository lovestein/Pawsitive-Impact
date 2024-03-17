<?php
include('connection.php');

if(isset($_POST['deleteUserID'])){
    $user_id = $_POST['deleteUserID'];

    $sql="DELETE FROM `user_details` WHERE user_id = $user_id;";
    $result = mysqli_query($con,$sql);
}
?>