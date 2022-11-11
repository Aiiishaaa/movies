<?PHP


include('../controller/connectdb.php');

class UserController {
	function addUser(User$user) {
		try {
                $sql = "INSERT INTO user (name,username,email,password,status) values(
                    '" . $user->getName() . "',
                   '" . $user->getUsername() . "',
                   '" . $user->getEmail() . "',
                   '" . $user->getPassword() . "',
                   'user')";
                   $result = $this->executeSql( $sql );
                if ($_SESSION['username']=="admin") {
                    header('location: ../admin/users.php#success');
                } else {
                    header('location: ../guest/index.php#success');
                }     
			return true;
		}
		catch (Exception $e){
			return null;
			return $e->getMessage().' '.$sql;
		}
	}

	function executeSql($sql){
		$db = Config::getConnexion();
		$req=null;
		try{
			$req=$db->prepare($sql);
			$s=$req->execute();
		}
		catch (Exception $e){
			var_dump(" Erreur ! ".$e->getMessage());
		}
	}

    function afficherUsers(){


        $sql = "SELECT * FROM user WHERE status not like 'admin'";
		$db = config::getConnexion();


        try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }

    }
    function recupererUser($id){
        $sql = "SELECT * from user where id='$id'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function modifierUser(User $user){
		$sql="UPDATE user SET username=:username, name=:name, email=:email, password=:password where id= :id";
		$db = Config::getConnexion();
		$req=$db->prepare($sql);
try{		

    $req->bindValue(':id',$user->getId());
    $req->bindValue(':name',$user->getName());
    $req->bindValue(':username',$user->getUsername());
    $req->bindValue(':password',$user->getPassword());
    $req->bindValue(':email',$user->getEmail());
    // $req->bindValue(':status',$user->getStatus());
    $req->execute();
    return true;
      
		// $idd=$user->getId();
        // $name=$user->getName();
        // $username=$user->getUsername();
        // $password=$user->getPassword();
        // $email=$user->getEmail();


		// $datas = array(':idd'=>$idd, ':id'=>$id, ':name'=>$name,':username'=>$username,':password'=>$password,':email'=>$email);
		// $req->bindValue(':idd',$idd);
		// $req->bindValue(':id',$id);
		// $req->bindValue(':name',$name);
		// $req->bindValue(':username',$username);
		// $req->bindValue(':email',$email);
		// $req->bindValue(':password',$password);

        // $req->execute();
        // header('location: users.php#updatesuccess');
        // return true;
    }
    catch (Exception $e){
         $result = $req->queryString;
        return $e->getMessage().' '.$result;
    }
		
	}

    function supprimerUser($id){
        $sql = "DELETE  FROM user WHERE id= '$id'"; 
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}




	}





