<?php
include('../controller/connectdb.php');
//Validation
$sql = "SELECT * FROM userdata"; 
$result = $conn->query($sql);
$list = '';
$total = $result->num_rows;

if($result->num_rows > 0) {
    // output data of each row
     while($row = $result->fetch_assoc()) {
        $list = $list.'
        <div class="row box">
        <div class="col-md-2 box4">
         <img src="../image/default-user.png" alt="user" class="user-profile">
        </div>
        <div class="col-md-6 box5">
            <p> <span style="color: #9a9a9a;">Name: </span> '.$row["Fullname"].'<br>
             <span style="color: #9a9a9a;">Username: </span>'.$row["Username"].'<br>
           <span style="color: #9a9a9a;">Email Address: </span>'.$row["Email"].'<br>
           <p> <span style="color: #9a9a9a;">Password: </span> '.$row["Pass"].'
            </p>
        </div>
        <div class="col-md-4 box5">
            <a href="../controller/deleteuser.php?id='.$row["UserId"].'" class="btn btn-danger"> Delete</a>
            <a href="updateuser.php?id='.$row["UserId"].'" class="btn"> Update</a>
        </div>
    </div>            
        ';
    }
    
} else {
    $list = "There is no account created yet";
}

// $_SESSION['list']= $list;
// $_SESSION['total']= $total;


$conn->close();
?>