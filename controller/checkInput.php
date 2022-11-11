<?php
function checkInput($data) 
{
  $data = trim($data); // Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
  $data = stripslashes($data); // Supprime les antislashs d'une chaîne
  $data = htmlspecialchars($data); // Convertit les caractères spéciaux en entités HTML
  return $data;
}
?>