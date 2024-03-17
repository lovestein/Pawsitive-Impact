<?php
$servername = "localhost";
$username = 'root';
$password = '';
$dbname = 'pawsitive_impact';

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    // echo "Connected Successfully.";
    die("Connection Failed!" . mysqli_connect_error());
}
