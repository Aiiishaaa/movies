<?php
$conn = new mysqli('localhost','root','','movies');

if ($conn->connect_error) {
   die(" Il y a un probleme de connexion à la base de données ! ".$conn->connect_error);
} else {
    echo " Connexion réussi à la base de données ! ";
}
?>