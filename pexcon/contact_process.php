<?php
include_once ("admin/config.php");

    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];



   $sql ="INSERT INTO user_info(message,name,subject,email) VALUES ('" . $_POST["message"] . "','" . $_POST["name"] . "','" . $_POST["subject"] . "','" . $_POST["email"] . "')";
    if (mysqli_query($conn, $sql)) {

        } else {
             echo "Error: " . $sql . "" . mysqli_error($conn);
        }
    $conn->close();



?>