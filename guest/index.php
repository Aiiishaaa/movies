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
    <meta name="keywords" content="Film, playlist,streaming, cinéma, synopsys, movies" />
    <meta name="author" content="Aicha Takwa Naïm" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Mymovies référence plus de 10 000 films. Vous pourrez consulter en détails les films,  résumé et bande-annonce.">
    <meta property="og:type" content="Mymovies">
    <meta property="og:title" content="Mymovies cinéma, consulter et regarder plus de 10000 films">
    <meta property="og:site_name" content="Mymovies">
    <meta property="og:url" content="https://mymovies.fr">
    <meta property="og:description" content="Mymovies référence plus de 10 000 films. Vous pourrez consulter en détails les films, synopsys et bande-annonce.">
    <meta property="og:image" content="https://mymovies.fr/logo.jpg">
    <meta property="twitter:title" content="Mymovies cinéma, consulter et regarder plus de 10000 films">
    <meta property="twitter:description" content="Mymovies référence plus de 10 000 films. Vous pourrez consulter en détails les films, synopsys et bande-annonce.">
    <meta property="twitter:site" content="@mymovies">
    <meta property="twitter:creator" content="@mymovies">
    <meta property="twitter:card" content="Summary_large_image">
    <meta property="twitter:image:src" content="https://mymovies.fr/logo.jpg">
    <link rel="shortcut icon" href="../images/favicon.ico" type="">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
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
                    <input type="submit" value="S'enregistrer" name="signup-btn" class="btn-log">
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
            <nav class="navbar navbar-expand-lg custom_nav-container aria-label="Breadcrumb">
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
                            <a class="nav-link " href="index.php">Accueil<span class="sr-only ">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="browse.php">Catalogue</a>
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
    <!-- start accueil section -->
    <section class="accueil_section">
        <div class="container ">
            <div class="row ">
                <div class="img-box col-md-6">
                    <img src="../images/logoMyMovies.svg" loading="lazy" data-src="logoMyMovies.svg" alt="logo_mymovies">
                </div>
                <div class=" col-md-6">
                    <div class="detail-box">
                        <div class="heading_container ">
                            <h1>
                                My Movies </h1>
                            <p>
                                C'est un site où vous pouvez consulter des informations sur votre film préféré et créer vos propres playlists </p>
                            <p> Movies est surtout connu pour l'excellente qualité de ses films.</p>
                            <div class="btn-box offset-lg-3">
                                <a href="browse.php" class="btn">
                                    Parcourez les films </a>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="demo" class="carousel slide container mt-4 mb-3" data-ride="carousel">
                    <div class="ratedMoviesHead mb-4">
                        <h2>Films les mieux notés</h2>
                    </div>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div id="topMovies1" class="row"></div>
                        </div>
                        <div class="carousel-item">
                            <div id="topMovies2" class="row"></div>
                        </div>
                        <div class="carousel-item">
                            <div id="topMovies3" class="row"></div>
                        </div>
                        <div class="carousel-item">
                            <div id="topMovies4" class="row"></div>
                        </div>
                        <div class="carousel-item">
                            <div id="topMovies5" class="row"></div>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- end  section -->

    <!-- footer section -->
    <footer class="footer_section ">
        <div class="container ">
            <div class="row ">
                <div class="col-md-4 footer-col ">
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
                            <h3>My Movies</h3>

                        </a>
                        <p>Plus de 10K films </p>
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
    <!-- jQery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous ">
    </script>
    <!-- bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js ">
    </script>
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js "></script>
    <!-- main js -->
    <script src="../js/main.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    <script>
        getTopMovies();
    </script>
</body>

</html>