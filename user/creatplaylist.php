<?php
     
     class Database
     {
         private static $dbHost = "localhost";
         private static $dbName = "mymovies";
         private static $dbUsername = "root";
         private static $dbUserpassword = "";
         
         private static $connection = null;
         
         public static function connect()
         {
             if(self::$connection == null)
             {
                 try
                 {
                   self::$connection = new PDO ("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
                 }
                 catch(PDOException $e)
                 {
                     die($e->getMessage());
                 }
             }
             return self::$connection;
         }
         
         public static function disconnect()
         {
             self::$connection = null;
         }
     
     }

    $nameError = $name = "";

    if(!empty($_POST)) 
    {
        $name               = $_POST['name'];
        $isSuccess          = true;
        
        if(empty($name)) 
        {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        
        if($isSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO playlist (playlist_name) values(?)");
            $statement->execute(array($name));
            Database::disconnect();
            header("Location: ../guest/playlistP.php");//REDIRECTION VERS LA PAGE home.php APRES AJOUT DE L'ITEM
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Créer une playlist</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="../css/styleAdmin.css">
    </head>
    
    <body>
         <div class="container insert admin">
            <div class="row justify-content-center">
               <div class="col-sm-10">
                <h1><strong>Créer une playlist</strong></h1>
                    <br>
                    <form class="form" action="../user/creatplaylist.php" role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Nom:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name;?>">
                                <span class="help-inline"><?php echo $nameError;?></span>
                            </div>
                            <br>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><span class="fas fa-pen"></span> Ajouter</button>
                                <a class="btn btn-primary" href="../guest/index.php"><span class="fas fa-arrow-left"></span> Retour</a>
                             </div>
                    </form>
                </div>
            </div>
        </div>  
    </body>
</html>