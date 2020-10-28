<?php
include_once("config.php");

$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"delete from user_info where id = '$id'"); // delete query

if($del)
{
    mysqli_close($conn);
    header("location:list_user_info.php"); // redirects to all records page
    exit;
}
else
{
    echo "Error deleting record"; // display error message if not delete
}


