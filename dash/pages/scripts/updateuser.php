<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    if (isset($_POST['id'])) {
        $user = $_SESSION['username'];
        $conn = null;
        require('acceptor.php');
        $id = mysqli_real_escape_string($conn, stripslashes($_POST['id']));
        $firstname = mysqli_real_escape_string($conn, stripslashes($_POST['firstname']));
        $lastname = mysqli_real_escape_string($conn, stripslashes($_POST['lastname']));
        if (stripslashes($_POST['password']) == 'null_void(0)') {
            $sql = "UPDATE Admins SET firstname = '$firstname', lastname = '$lastname' WHERE username = '$user' AND id = '$id'";
        } else if (stripslashes($_POST['password']) != 'null_void(0)') {
            $password = md5(mysqli_real_escape_string($conn, stripslashes($_POST['password'])));
            $sql = "UPDATE Admins SET firstname = '$firstname', lastname = '$lastname', password = '$password' WHERE username = '$user' AND id = '$id'";
        }

        if ($conn->query($sql) == true) {
            echo 'Updated';
            $conn->close;
        } else {
            $conn->error;
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