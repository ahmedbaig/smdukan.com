<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    if (isset($_GET['id'])) {
        require ('acceptor.php');
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM Admins WHERE id = '$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_array()){
                $imageData = $row[11];
                $imageType = $row[12];
                header("content-type: $imageType");
                echo $imageData;
                $conn->close;
            }
        } else {
            echo "No data found in database!";
        }
    } else {
        echo "FATAL ERROR!";
    }
} else if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false){
    session_destroy();
    header('location: ../../../404.html');
}
?>
