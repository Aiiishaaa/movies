<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../guest/index.php');
}
else{ 
    if ($_SESSION['status'] != "admin") {
        header('location: ../user/index.php');
    }
}
    include('../controller/connectdb.php');
    //Validation
    $sql = "SELECT * FROM request"; 
    $result = $conn->query($sql);
    $list = '';
    if($result->num_rows > 0) {
        // output data of each row
         $index = 0;
         while($row = $result->fetch_assoc()) {
            $list = $list.'
            <div class="row box">
            <div class="col-md-2 box4">
             <img src="../image/default-user.png" alt="user" class="user-profile">
            </div>
            <div class="col-md-8 box5">
                <p> <span style="color: #9a9a9a;">Requested By '.$row["RequestUser"].'</span><br>
                 <span style="color: #9a9a9a;">Movie Title: </span>'.$row["RequestTitle"].'<br>
               <span style="color: #9a9a9a;">Request Message: </span>'.$row["RequestMessage"].'
                </p>
            </div>
            <div class="col-md-2 box5">
                <a href="../controller/delete.php?id='.$row["RequestId"].'" class="btn"> Confirm</a>
            </div>
        </div>            
            ';
        }
        
    } else {
        $list = "No Request for movies";
    }



    $conn->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="../css/index.css">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>

    <!-- Latest compiled and minified CSS -->
    <link rel=" stylesheet " href="../css/bootstrap.min.css ">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/moviesrequest.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark fixed-top ">
        <!-- Brand/logo -->
        <a class="navbar-brand " href="#">
            <img src="../image/icon.png " alt="logo "> MoviesInfo
        </a>

        <!-- Links -->
        <ul class="navbar-nav mr-auto ">
        </ul>
        <!-- Links -->
        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link" href="index.php ">Home</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="users.php">Manage Users</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" href="#">Movies Request</a>
            </li>
            <li class="nav-item dropdown dropleft">
                <a class="nav-link" href="#" data-toggle="dropdown">
                    <img src="../image/default-user.png" style="width:30px; border-radius:50%;" alt="logo ">
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item disabled" style="color:silver; text-transform:lowercase;" href="#"><?php echo $_SESSION['username'] ?></a>
                    <a class="dropdown-item" style="color:#fff;" href="../controller/logout.php">Log Out</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="container req-box" >
        <form action="" method="post">
            <div class="row">
                <div class="col-md-8 box1">
                    <h3 style="margin-bottom:50px;"><span style="font-weight:bold; color: #6AC045">Movies Request Pending</span></h3>
                    <?php 
                    echo $list;
                    ?>
                </div>
            </div>   
        </form>
    </div>


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>