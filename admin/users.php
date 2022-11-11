<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../guest/index.php');
} else {
    if ($_SESSION['status'] != "admin") {
        header('location: ../user/index.php');
    }
}
include('userlist.php');
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="Film, playlist,Free streaming " />
    <meta name="description" content=" Films en ligne " />
    <meta name="author" content="Aicha Takwa Naïm" />
    <link rel="shortcut icon" href="../images/favicon.ico" type="">
    <title> My Movies </title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet" />
</head>

<body>

    <header class="header_section">
        <div class="container ">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.php">
                    <span>
                        My Movies
                    </span>
                </a>
                <button class="navbar-toggler" type="button " data-toggle="collapse " data-target="#navbarSupportedContent " aria-controls="navbarSupportedContent " aria-expanded="false " aria-label="Toggle navigation ">
                    <span class=" "> </span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent ">
                    <ul class="navbar-nav mx-auto ">
                        <li class="nav-item active ">
                            <a class="nav-link " href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="users.php"> Gestion des utilisateurs <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="moviesrequest.php"> Demandes des utilisateurs</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 ">
                        <a href="../controller/logout.php" class="btn my-2 connexion my-sm-0 mr-3" type="submit">Se déconnecter</a>
                    </form>
                </div>
            </nav>
        </div>
    </header>
    <!-- End header section -->
    <section class="admin-section">
        <div class="container req-box">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-10 box1">
                        <h2> La liste contient </span><?php echo $total ?> utilisateur(s).</h2>
                        <?php
                        echo $list;
                        ?>
                    </div>
                </div>
            </form>
           <a href="#popup2" class=" mt-5 btn btn-success"> Ajouter nouveau compte</a>
        </div>
    </section>

        <div id="popup2" class="popup-overlay">
            <div class="log-popup">
                <h2>Ajouter nouveau compte</h2>
                <a class="close-window" href="#">&times;</a>
                <div class="log-content">
                    <form action="../controller/register.php" method="post">
                        <i class="fa fa-user icon"></i>
                        <input type="text" placeholder="Nom complet" name="fullname" class="log-input" required>
                        <br>
                        <i class="fa fa-envelope icon"></i>
                        <input type="email" placeholder="Mail" name="email" class="log-input" required>
                        <br>
                        <i class="fa fa-link icon"></i>
                        <input type="text" placeholder="Nom d'utilisateur " name="username" class="log-input" required>
                        <br>
                        <i class="fa fa-lock icon"></i>
                        <input type="password" placeholder="Mot de passe" name="password" class="log-input" required>
                        <br>
                        <input type="submit" value="S'inscrire" name="signup-btn" class="btn-log">
                    </form>
                </div>
            </div>
        </div>
        <div id="success" class="popup-overlay">
            <div class="log-popup">
                <h2>Success</h2>
                <a class="close-window" href="#">&times;</a>
                <div class="log-content">
                    <p>Le compte a été créé avec succès</p>
                </div>
            </div>
        </div>
        <div id="updatesuccess" class="popup-overlay">
            <div class="log-popup">
                <h2>Succès</h2>
                <a class="close-window" href="#">&times;</a>
                <div class="log-content">
                    <p>Les données de l'utilisateur ont été mises à jour avec succès !</p>
                </div>
            </div>
        </div>
        <div id="error" class="popup-overlay">
            <div class="log-popup">
                <h2>Succès</h2>
                <a class="close-window" href="#">&times;</a>
                <div class="log-content">
                    <p>Le nom d'utilisateur ou l'adresse électronique existe déjà ! <i class="fa fa-frown"></i></p>
                </div>
            </div>
        </div>

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>

</html>