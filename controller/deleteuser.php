<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../guest/index.php#popup1');
}

include('connectdb.php');
$id=$_REQUEST['id'];

$del = "DELETE  FROM users WHERE UserId= '$id'"; 
$result = $conn -> query($del);
header("Location: ../admin/users.php"); 
$conn->close();
?>