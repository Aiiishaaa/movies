<?php

   session_start();

   include('connectdb.php');
   include('checkInput.php');

    $fullname = checkInput($_POST['fullname']);
    $email = checkInput($_POST['email']);
    $username = checkInput(strtolower($_POST['username']));
    $password = checkInput($_POST['password']);

    //Validation
    $q = "SELECT * FROM user WHERE Username = '$username' OR Email = '$email'";

    $res = $conn->query($q);
    $num = mysqli_num_rows($res);  

    if ($num >= 1) {
        if ($_SESSION['username']=="admin") {
            header('location: ../users/index.php#error');
        } else {
            header('location: ../guest/index.php#error');
        }
    } else {
        $sql = "INSERT INTO user (Username,Password,Fullname,Email,status) values('$username','$password','$fullname','$email','user')";

        $result = $conn -> query($sql);

        if ($_SESSION['username']=="admin") {
            header('location: ../admin/users.php#success');
        } else {
            header('location: ../guest/index.php#success');
        }     
    }
    $conn->close();
?>