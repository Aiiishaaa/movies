<?php
session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['status'] == "admin") {
        header('location: ../admin/index.php');
    } else {
        header('location: ../user/index.php');
    }
}
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
    <link href="../css/style.css" rel="stylesheet" />

</head>

<body>
        <!-- Pop up boxes for login and registration -->
        <div id="popup1" class="popup-overlay">
        <div class="log-popup">
            <h2>Se connecter</h2>
            <a class="close-window" href="#">&times;</a>
            <div class="log-content">
                <form action="../controller/login.php" method="post">
                    <i class="fa fa-user icon"></i>
                    <input type="text" placeholder="Username" name="username" class="log-input" required>
                    <br>
                    <i class="fa fa-lock icon"></i>
                    <input type="password" placeholder="Password" name="password" class="log-input" required>
                    <br>
                    <input type="submit" value="Se connecter" name="signup-btn" class="btn-log">
                </form>
            </div>
        </div>
    </div>

    <div id="popup2" class="popup-overlay">
        <div class="log-popup">
            <h2>Créer un compte</h2>
            <a class="close-window" href="#">&times;</a>
            <div class="log-content">
                <form action="../controller/register.php" method="post">
                    <i class="fa fa-user icon"></i>
                    <input type="text" placeholder="Nom" name="fullname" class="log-input" required>
                    <br>
                    <i class="fa fa-envelope icon"></i>
                    <input type="email" placeholder="Email" name="email" class="log-input" required>
                    <br>
                    <i class="fa fa-link icon"></i>
                    <input type="text" placeholder="Username" name="username" class="log-input" required>
                    <br>
                    <i class="fa fa-lock icon"></i>
                    <input type="password" placeholder="Password" name="password" class="log-input" required>
                    <br>
                    <input type="checkbox" name="chkbox" required>J'accepte les termes et conditions
                    <br>
                    <input type="submit" value="S'enregistrer"" name="signup-btn" class="btn-log">
                </form>
            </div>
        </div>
    </div>
    <div id="success" class="popup-overlay">
        <div class="log-popup">
            <h2>Bravo!</h2>
            <a class="close-window" href="#">&times;</a>
            <div class="log-content">
                <p>Votre compte a été créé avec succès! Merci de vous connecter <i class="fa fa-smile"></i></p>
                </p>
                <a href="#popup1" class="btn-main btn-main-primary">
                    Se connecter
                </a>
            </div>
        </div>
    </div>
    <div id="error" class="popup-overlay">
        <div class="log-popup">
            <h2>Erreur</h2>
            <a class="close-window" href="#">&times;</a>
            <div class="log-content">
                <p>Le nom d'utilisateur ou l'adresse électronique existe déjà ! <i class="fa fa-frown"></i></p>
            </div>
        </div>
    </div>
    <div id="error1" class="popup-overlay">
        <div class="log-popup">
            <h2>Erreur</h2>
            <a class="close-window" href="#">&times;</a>
            <div class="log-content">
                <p>Compte introuvable !<i class="fa fa-frown"></i></p>
                </p>
            </div>
        </div>
    </div>
    <!-- End of Pop up boxes for login and registration -->
    <!-- header section strats -->
    <header class="header_section ">
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
                            <a class="nav-link " href="index.php ">Accueil </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="browse.php"><span class="sr-only ">Catalogue</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="playlistP.php">Playlists publiques</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="contact.php ">Contact</a>
                        </li>
                    </ul>
                    <form class="form-inline ">
                        <button class="btn my-2 my-sm-0 nav_search-btn " type="submit ">
                            <i class="fa fa-search "></i>
                        </button>
                    </form>
                    <a href="#popup1" class="connexion">
                        <i class="fa fa-user"></i> Se connecter
                    </a>
                    <a href="#popup2" class="connexion">
                        <i class="fa fa-user"></i> Créer un compte
                    </a>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->

    <!--  start category section -->
    <section class="browse-section">
        <div class="container-fluid">
            <div class="container">
                <div class="sbox">
                    <div class="row">
                        <h1 class="offset-lg-3">My Movies : plus de 10K films</h1>
                        <p class="offset-lg-3">Parcourez notre base de données de films et trouvez votre film préféré</p>
                    </div>
                    <div class="container">
                        <div class="mt-4 row height d-flex justify-content-center align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <form id="searchForm">
                                    <input type="text" class="searchBox" placeholder="Chercher un film " id="searchText">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div id="movies" class="row"></div>
            </div>
        </div>
    </section>

    <!-- footer section -->
    <footer class="footer_section ">
        <div class="container ">
            <div class="row ">
                <div class="col-md-4 footer-col">
                    <div class="footer_contact ">
                        <h4>
                            Contactez-nous
                        </h4>
                        <div class="contact_link_box ">

                            <a href=" ">
                                <i class="fa fa-phone " aria-hidden="true "></i>
                                <span>
                                    06.00.00.00.00
                                </span>
                            </a>
                            <a href=" ">
                                <i class="fa fa-envelope " aria-hidden="true "></i>
                                <span>
                                    contact@mymovies.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col ">
                    <div class="footer_detail ">
                        <a href="index.php" class="footer-logo ">
                            <img src="../images/favicon.ico" alt=" ">
                            <h4>My Movies</h4>
                        </a>
                        <p>
                            Plus de 10K films </p>
                        <div class="footer_social ">
                            <a href=" ">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href=" ">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href=" ">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col ">
                    <div class="footer_link ">
                        <h4>
                            Liens utiles
                        </h4>
                        <ul>
                            <li>
                                <a href=" ">
                                    Politique de cookies
                                </a>
                            </li>
                            <li>
                                <a href=" ">
                                    Conditions d'utilisation
                                </a>
                            </li>
                            <li>
                                <a href=" ">
                                    Mentions légales
                                </a>
                            </li>
                            <li>
                                <a href=" ">
                                    Politique de confidentialité
                                </a>
                            </li>
                            <li>
                                <a href=" ">
                                    Plan du site
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </footer>
    <!-- footer section -->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
        popularMovies();
    </script>
</body>

</html>