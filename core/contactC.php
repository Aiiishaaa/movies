<?PHP


include('../controller/connectdb.php');

class ContactController {
	function addContact(Contact$contact) {
		try {

            $sql = "INSERT INTO contact (fullname, Email, Sujet, Message, Date)
              VALUES (
                '" . $contact->getFullname() . "',
                   '" . $contact->getEmail() . "',
                   '" . $contact->getSujet() . "',
                   '" . $contact->getMessage() . "',
                   '" . $contact->getDate() . "',
                )"; 
                $result = $this->executeSql( $sql );

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
	function afficherContacts(){


		$sql = "SELECT * FROM contact";

		$db = config::getConnexion();


        try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }

    }
  

	}





