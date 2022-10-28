<?php

   session_start();

   header('location: ../user/request.php#success');
   
   include('connectdb.php');

    // $fullname = $_POST['fullname'];
    // $email = $_POST['email'];
    // $username = $_POST['username'];
    // $password = $_POST['password'];

    $title = $_POST['title'];
    $message = $_POST['msg'];
    $user = $_SESSION['username'];

    //Validation
    // $q = "SELECT * FROM userdata WHERE Username = '$username' && Email = '$email'";

    // $res = $conn->query($q);
    // $num = mysqli_num_rows($res);  
    $sql = "INSERT INTO request (RequestUser,RequestTitle,RequestMessage) values('$user','$title','$message')";

    $result = $conn -> query($sql);

    // $result = $conn -> query($sql);
    // if ($num == 1) {
    //     echo "Duplicate data";
    // } else {
       
    // }
    $conn->close();
?>