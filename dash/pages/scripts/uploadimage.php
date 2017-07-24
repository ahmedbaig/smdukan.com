<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    if (isset($_POST['submit'])) {
        if ($_FILES['upload_image']['size'] < 160000000) {
            $conn = null;
            require('acceptor.php');
            $imageName = mysqli_real_escape_string($conn, $_FILES['upload_image']['name']);
            $imageData = mysqli_real_escape_string($conn, file_get_contents($_FILES['upload_image']['tmp_name']));
            $imageType = mysqli_real_escape_string($conn, $_FILES['upload_image']['type']);

            if (substr($imageType, 0, 5) == "image") {
                $username = $_SESSION['username'];
                $sql = "UPDATE Admins SET imagename = '$imageName', imageloc = '$imageData', imagetype = '$imageType' WHERE username = '$username'";

                if ($conn->query($sql) == TRUE) {
                    $conn->close;
                    echo "<script>window.close();</script>";
                } else {
                    echo '<span>Upload Failed</span>';
                    echo $conn->error;
                }
            } else {
                echo '<span>Invalid File Type or size too big- Max 2mb allowed</span>';
                echo $conn->error;
            }
        } else {
            echo 'File size too large- Max 2mb allowed';
        }
    } else {
        session_destroy();
        header('location: ../../404.html');
    }
} else if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false){
    session_destroy();
    header('location: ../../404.html');
}
?>