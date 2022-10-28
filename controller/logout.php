<?php 

session_start();
session_destroy();
header('location: ../guest/index.php#popup1');
?>