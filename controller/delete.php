<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../guest/index.php#popup1');
}

include('connectdb.php');
include('checkInput.php');
$id = checkInput($_CONTACT['id']);

$del = "DELETE  FROM contact WHERE ContactId= '$id'"; 
$result = $conn -> query($del);
header("Location: ../admin/formContact.php"); 
$conn->close();
?>