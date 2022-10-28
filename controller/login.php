<?php
session_start();
include('connectdb.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    //Validation
    $q = "SELECT * FROM userdata WHERE Username = '$username' && Pass = '$password'";

    $res = $conn->query($q);
    $num = mysqli_num_rows($res);  

    if ($num == 1) {

       $_SESSION['username'] = strtolower($username);
        
       if ($_SESSION['username']=="admin") {
            header('location: ../admin/index.php');
            $_SESSION['status'] = 'admin';
       } else {
            header('location: ../user/index.php');
            $_SESSION['status'] = 'user';
       }
    } else {
        header('location: ../guest/index.php#error1');
    }
    $conn->close();
?>