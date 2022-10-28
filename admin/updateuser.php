
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

$id=$_REQUEST['id'];
$query = "SELECT * from userdata where UserId='$id'"; 
$r = $conn -> query($query);
$row = $r->fetch_assoc();

if (isset($_POST['update'])) {
    $fullname=$_POST['fname'];
    $email = $_POST['email'];
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];

    //Validation
    $q = "SELECT * FROM userdata WHERE Username = '$username' OR Email = '$email'";

    $res = $conn->query($q);
    $num = mysqli_num_rows($res);  

    if ($num > 1) {
            echo "error";
            header('location: users.php#error');
    } else {
        //$sql = "INSERT INTO userdata (Username,Pass,Fullname,Email) values('$username','$password','$fullname','$email')";

        $sql = "UPDATE userdata SET Fullname='$fullname',Username='$username',Pass = '$password', Email='$email' WHERE UserId='$id'";

        $result = $conn -> query($sql);

            header('location: users.php#updatesuccess');  
    }
}

    

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>

    <!-- Latest compiled and minified CSS -->
    <link rel=" stylesheet " href="../css/bootstrap.min.css ">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/popup.css">
    <link rel="stylesheet" href="../css/request.css">

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
                <a class="nav-link active " href="# ">Home</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="users.php">Manage Users</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="moviesrequest.php">Movies Request</a>
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

    <header>
        <div class="container req-box" >
        <center><h3 style="margin-bottom:50px;"><span style="font-weight:bold; color: #6AC045">Update User Data</span></h3></center>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6 box1">
                        
                        <label for="title">Fullname:</label><br>
                        <input type="text" name="fname" class="input" value="<?php echo $row['Fullname'];?>" required  ><br>
                        <label for="title">Email:</label><br>
                        <input type="email" name="email" class="input" value="<?php echo $row['Email'];?>" required><br>
                    
                    </div>
                    <div class="col-md-6 box1">
                        <label for="title">Username:</label><br>
                        <input type="text" name="username" class="input" value="<?php echo $row['Username'];?>" required><br>
                        <label for="title">Password:</label><br>
                        <input type="text" name="password" class="input" value="<?php echo $row['Pass'];?>" required><br>
                        <input type="submit"  class="btn" name="update" value="Update User Data">
                    </div>
                </div>   
            </form>
        </div>
    </header>

    <div class="footer">
        <p>&copy; Copyright Developed by Genius Coders.</p>
    </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>