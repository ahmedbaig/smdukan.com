<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    if (isset($_POST['id']) && $_POST['id'] == 10) {
        $user = $_SESSION['username'];
        $conn = null;
        require('acceptor.php');
        $username = mysqli_real_escape_string($conn, stripslashes($_POST['username']));
        $firstname = mysqli_real_escape_string($conn, stripslashes($_POST['firstname']));
        $lastname = mysqli_real_escape_string($conn, stripslashes($_POST['lastname']));
        $password = md5(mysqli_real_escape_string($conn, stripslashes($_POST['password'])));
        $job = mysqli_real_escape_string($conn, stripslashes($_POST['designation']));
        $totalEntries = mysqli_real_escape_string($conn, stripslashes($_POST['totalEntries']));
        $joinDate = mysqli_real_escape_string($conn, stripslashes($_POST['joinDate']));
        $CNIC = mysqli_real_escape_string($conn, stripslashes($_POST['CNIC']));
        $PhoneNo = mysqli_real_escape_string($conn, stripslashes($_POST['PhoneNo']));
        $access = mysqli_real_escape_string($conn, stripslashes($_POST['access']));

        $sql = "INSERT INTO Admins (username, password, firstname, lastname, designation, totalEntries, joinDate, CNIC, PhoneNo, access) 
        VALUES ('$username', '$password', '$firstname', '$lastname', '$job', '$totalEntries', '$joinDate', '$CNIC', '$PhoneNo', '$access') ";

        if ($conn->query($sql) == true) {
            echo 'Updated';
            $conn->close;
        } else {
            echo $conn->error;
            echo 'failed';
        }
    } else {
        session_destroy();
        header('location: ../../../404.html');
    }
} else
    if (!isset($_SESSION['logged']) || $_SESSION['logged'] == false) {
        session_destroy();
        header('location: ../../../404.html');
    }
?>