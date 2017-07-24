<?php
session_start();
$_SESSION['logged'] = false;
if (!isset($_POST['submit'])) {
    header('location: ../404.html');
    $_SESSION['denied'] = false;
}else if(isset($_POST['submit'])) {
    $servername = 'localhost';
    $username = 'root';
    $password = '$-iOsApple';
    $database = 'SMDUKAN';

    $conn = new mysqli($servername, $username, $password, $database) or die($conn->connect_error);

    if (!$conn) {
        die ('Connection failed: ' . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM Admins WHERE username = ? AND password = ? LIMIT 1");
    $stmt->bind_param('ss', $user, $pass);

    $user = mysqli_real_escape_string($conn, stripslashes($_POST['username']));
    $pass = md5(mysqli_real_escape_string($conn, stripslashes($_POST['password'])));

    $_SESSION['username'] = $user;
    $stmt->execute();
    $stmt->store_result();
    echo $stmt->num_rows;

    if ($stmt->num_rows == 1) {
        $_SESSION['logged'] = true;
        $_SESSION['denied'] = false;
        echo 'Granted';
    } else {
        echo 'Denied';
        $_SESSION['denied'] = true;
        header('location: ../index.php');
    }
    $stmt->close();
    $conn->close();
    if ($_SESSION['logged'] && $_SESSION['logged'] == true) {
        header('location: pages/admin.php');
    }
}
?>