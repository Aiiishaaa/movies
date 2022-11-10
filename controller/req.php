<?php

   session_start();
    if (!isset($_SESSION['username'])) {
         header('location: ../guest/contact.php');
    } else {
         if ($_SESSION['status'] != "admin") {
              header('location: ../user/contact.php');
         }
    }
   
   include('connectdb.php');

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $Sujet = $_POST['sujet'];
    $message = $_POST['message'];
    $date = date("Y-m-d H:i:s");   
    $sql = "INSERT INTO contact (fullname, email, Sujet, message, date) VALUES ('$fullname', '$email', '$Sujet', '$message', '$date')"; 

    $result = $conn -> query($sql);

    $conn->close();