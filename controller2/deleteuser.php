<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../guest/index.php#popup1');
}


include "../core/userC.php";
$userC=new UserController();
if (isset($_REQUEST['id'])){
	$userC->supprimerUser($_REQUEST['id']);
	header('Location: afficherEmploye.php');
}

header("Location: ../admin/users.php"); 
$conn->close();
?>