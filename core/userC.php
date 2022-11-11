<?PHP


include('../controller/connectdb.php');

class UserController {
	function addUser(User$user) {
		try {

            // $q = "SELECT * FROM users WHERE Username = '$user->getUsername()' OR Email = '$user->getEmail()'";

            // $res = $conn->query($q);
            // $num = mysqli_num_rows($res);  


            // if ($num >= 1) {
            //     if ($_SESSION['username']=="admin") {
            //         header('location: ../users/index.php#error');
            //     } else {
            //         header('location: ../guest/index.php#error');
            //     }
            // } else {
                $sql = "INSERT INTO users (name,username,email,password,status) values(
                    '" . $user->getName() . "',
                   '" . $user->getUsername() . "',
                   '" . $user->getEmail() . "',
                   '" . $user->getPassword() . "',
                   'user')";
                   $result = $this->executeSql( $sql );

                // $result = $conn -> query($sql);
           
                if ($_SESSION['username']=="admin") {
                    header('location: ../admin/users.php#success');
                } else {
                    header('location: ../guest/index.php#success');
                }     
            // }
            // $conn->close();
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

    function afficherEmployes(){


        $sql = "SELECT * FROM users WHERE status not like 'admin'";
		$db = config::getConnexion();
        try{
            $result=$db->query($sql);
            $total = $result->num_rows;
            $list = '';
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $list = $list . '
                    <table class="table table-dark mt-3 ">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Mot de passe</th>
                            <th scope="col">Statut</th>
                        </tr>
                    <tbody>
                        <tr>
                            <td>' . $row["username"] . '</td>
                            <td>' . $row["name"] . '</td>
                            <td>' . $row["email"] . '</td>
                            <td>' . $row["password"] . '</td>
                            <td>' . $row["status"] . '</td>
                        </tr>
                        </tbody>
                  </table>
                  <a href="updateuser.php?id=' . $row["id"] . '" class="btn btn-primary">Modifier</a>
                  <a  href="../controller/deleteuser.php?id=' . $row["id"] . '" class="btn btn-danger">Supprimer</a>
                  ';
                  return $list;
                }
            } else {
                echo "Il n'y a pas encore de compte créé !";
            }
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	

        }	
	}





