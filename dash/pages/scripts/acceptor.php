<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    $servername = 'localhost';
    $username = 'root';
    $password = '$-iOsApple';
    $database = 'SMDUKAN';

    $conn = new mysqli($servername, $username, $password, $database) or die($conn->connect_error);

    if (!$conn) {
        die ('Connection failed: ' . $conn->connect_error);
    }
}else if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false){
    session_destroy();
    header('location: ../../../404.html');
}
?>
