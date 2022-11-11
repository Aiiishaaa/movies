<?php
     
    require '../controller/connectdb.php';
    // PREMIER PASSAGE, ON INITIALISE TOUTES LES VARIABLES A ""
    $nameError = $name = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $isSuccess          = true;
        $isUploadSuccess    = false;
        
        if(empty($name)) 
        {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else
        {
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" && $imageExtension != "webp" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif .webp";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $imageError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($_FILES["image"]["size"] > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
        
        if($isSuccess && $isUploadSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO smartphones (name,description,price,marque,image) values(?, ?, ?, ?, ?)");
            $statement->execute(array($name,$description,$price,$marque,$image));
            Database::disconnect();
            header("Location: home.php");//REDIRECTION VERS LA PAGE home.php APRES AJOUT DE L'ITEM
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Burger Code</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="../css/styleAdmin.css">
        <?php include('../header/header.php'); ?>
    </head>
    
    <body>
        <div class="logo">
             <img class="img-fluid" src="../images/logo.webp" alt="phone_market_place">
        </div>
         <div class="container insert admin">
            <div class="row justify-content-center">
               <div class="col-sm-10">
                <h1><strong>Créer une playlist</strong></h1>
                    <br>
                    <form class="form" action="insert.php" role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Nom:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name;?>">
                                <span class="help-inline"><?php echo $nameError;?></span>
                            </div>
                            <br>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><span class="fas fa-pen"></span> Ajouter</button>
                                <a class="btn btn-primary" href="home.php"><span class="fas fa-arrow-left"></span> Retour</a>
                             </div>
                    </form>
                </div>
            </div>
        </div>  
    </body>
</html>