<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../guest/index.php#popup1');
}

include('connectdb.php');
$id=$_REQUEST['id'];

$del = "DELETE  FROM user WHERE user_id= '$id'"; 
$result = $conn -> query($del);
header("Location: ../admin/users.php"); 
$conn->close();
?>