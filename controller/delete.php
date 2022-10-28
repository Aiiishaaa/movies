<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../guest/index.php#popup1');
}

include('connectdb.php');
$id=$_REQUEST['id'];

$del = "DELETE  FROM request WHERE RequestId= '$id'"; 
$result = $conn -> query($del);
header("Location: ../admin/moviesrequest.php"); 
$conn->close();
?>