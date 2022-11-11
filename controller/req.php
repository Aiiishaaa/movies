<?php
include "../entities/Contact.php";
include "../core/contactC.php";

   session_start();
    if (!isset($_SESSION['username'])) {
         header('location: ../guest/contact.php');
    } else {
         if ($_SESSION['status'] != "admin") {
              header('location: ../user/contact.php');
         }
    }
   
   include('connectdb.php');
   include('checkInput.php');

    $fullname = checkInput($_POST['fullname']);
    $email = checkInput($_POST['email']);
    $Sujet = checkInput($_POST['sujet']);
    $message = checkInput($_POST['message']);
    $date = date("Y-m-d H:i:s");  
    
    $contact1=new contact($_POST['fullname'],$_POST['email'],$_POST['sujet'],$_POST['message']);
    $contact1->setDate($date);
    $contact1C=new ContactController();
    $contact1C->addContact($contact1);

