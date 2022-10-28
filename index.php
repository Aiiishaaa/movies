<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: guest/index.php');
}
elseif (isset($_SESSION['username']) == "admin") {
    header('location: admin/index.php');
}
else{ 
    header('location: user/index.php');
}


?>