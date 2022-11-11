<?PHP
include "../entities/User.php";
include "../core/userC.php";

if (isset($_POST['name']) and isset($_POST['username']) and isset($_POST['email']) and isset($_POST['password'])){
$user1=new user($_POST['name'],$_POST['username'],$_POST['email'],$_POST['password']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$user1C=new UserController();
$user1C->addUser($user1);
//header('Location: afficherEmploye.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>