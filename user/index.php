<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="Film, playlist,Free streaming" />
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
                        <li class="nav-item ">
                            <a class="nav-link " href="user.php"> Données personnelles </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="playlist.php"> Playlists </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="contact.php"> Contact</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 ">
                        <a href="../controller/logout.php" class="btn my-2 connexion my-sm-0 mr-3" type="submit">Se déconnecter</a>
                    </form>
                </div>
            </nav>
        </div>
    </header>
    <!-- User section -->
    <section class="user_section ">
        <div class="container ">
            <div class="row ">
                <div class="col-md-12 ">
                    <div class="user_profile ">
                        <div class="user_img ">
                            <img src="../images/user.png " alt="user_img " />
                        </div>
                        <div class="user_title
                            <h2> <?php echo $_SESSION['user']['username']; ?> </h2>
                            <p> <?php echo $_SESSION['user']['email']; ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- end  user section -->

    <!-- footer section -->
    <footer class="footer_section">
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
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>

</html>