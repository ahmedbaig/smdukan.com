<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    if (isset($_POST['protector']) && $_POST['protector'] == true) {
        $user = $_SESSION['username'];
        $conn = null;
        require('acceptor.php');
        $name = mysqli_real_escape_string($conn, stripslashes($_POST['name']));
        $number = mysqli_real_escape_string($conn, stripslashes($_POST['number']));
        $id = mysqli_real_escape_string($conn, stripslashes($_POST['id']));
        $item = mysqli_real_escape_string($conn, stripslashes($_POST['item']));
        $entrydate = mysqli_real_escape_string($conn, stripslashes($_POST['entrydate']));
        $installments = mysqli_real_escape_string($conn, stripslashes($_POST['installments']));
        $formula = mysqli_real_escape_string($conn, stripslashes($_POST['formula']));
        $amount = mysqli_real_escape_string($conn, stripslashes($_POST['amount']));
        $downpayment = mysqli_real_escape_string($conn, stripslashes($_POST['downpayment']));
        $remaining = mysqli_real_escape_string($conn, stripslashes($_POST['remaining']));

        $sql = "INSERT INTO dataSheet (customerName, customerID, contactNo, item, lastUpdated, installments, installmentPlan, amount, remaining, downpayment) 
        VALUES ('$name', '$id', '$number', '$item', '$entrydate', '$installments', '$formula', '$amount', '$remaining', '$downpayment')";

        if ($conn->query($sql) == true) {
            echo 'Updated';
            $sql = "SELECT * FROM Admins WHERE username='$user' LIMIT 1";
            $result = $conn->query($sql);
            if($row = $result->fetch_assoc()) {
                $total = $row['totalEntries'];
                $total += 1;
                $sql = "UPDATE Admins SET totalEntries='$total' WHERE username='$user'";
                if ($conn->query($sql) == true) {
                    echo ' & Total Entries made are ' . $total;
                }
            }
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