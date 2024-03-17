<?php
include('connection.php');

if(isset($_POST['sendDeleteUser'])){
    $unique = $_POST['sendDeleteUser'];

    $sql="DELETE FROM `test` WHERE id = $unique;";
    $result = mysqli_query($con,$sql);
}
?>