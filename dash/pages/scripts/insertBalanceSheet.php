<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    if (isset($_POST['protector']) && $_POST['protector'] == true) {
        $user = $_SESSION['username'];
        $conn = null;
        require('acceptor.php');
        $description = mysqli_real_escape_string($conn, stripslashes($_POST['description']));
        $date = mysqli_real_escape_string($conn, stripslashes($_POST['date']));
        $debit = mysqli_real_escape_string($conn, stripslashes($_POST['debit']));
        $withdraw = mysqli_real_escape_string($conn, stripslashes($_POST['withdraw']));
        $balance = mysqli_real_escape_string($conn, stripslashes($_POST['balance']));

        $sql = "INSERT INTO balanceSheet(date, description, debit, withdraw, balance)
        VALUES('$date', '$description', '$debit', '$withdraw', '$balance')";
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