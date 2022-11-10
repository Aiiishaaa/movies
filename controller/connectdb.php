<?php
$conn = new mysqli('localhost','root','','mymovies');

if ($conn->connect_error) {
   die(" Il y a un probleme de connexion à la base de données ! ".$conn->connect_error);
} else {
    echo " Connexion réussi à la base de données ! ";
}
?>