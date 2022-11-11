<?php
session_start();
include('connectdb.php');
include('checkInput.php');

    $username = checkInput($_POST['username']);
    $password = checkInput($_POST['password']);
    //Validation
    $q="SELECT * from user where username='".$username."' and password='".$password."' LIMIT 1";

    // $q = "SELECT * FROM users WHERE username = '$username' && password = '$password'";
    $db = config::getConnexion();
    $res=$db->query($q);

    // $num = mysqli_num_rows($res);   

    if ($res->num_rows =1) {

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