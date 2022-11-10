<?php

   session_start();

   header('location: ../user/contact.php#success');
   
   include('connectdb.php');

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $Subjet= $_POST['Sujet'];
    $message = $_POST['msg'];
    $user = $_SESSION['username'];

    //Validation
    // $q = "SELECT * FROM userdata WHERE Username = '$username' && Email = '$email'";

    // $res = $conn->query($q);
    // $num = mysqli_num_rows($res);  
    $sql = "INSERT INTO contact (ContactName,ContactEmail,ContactSujet,ContactMessage) values('$user','$title','$message')";

    $result = $conn -> query($sql);

    // $result = $conn -> query($sql);
    // if ($num == 1) {
    //     echo "Duplicate data";
    // } else {
       
    // }
    $conn->close();
?>