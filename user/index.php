<?php 
session_start();
/*fonction qui supprime les tanbulations, sauts de ligne et retours à la ligne */
function ob_html_compress($buf){
    return str_replace(array("\n","\r","\t"),'',$buf);
}

ob_start('ob_html_compress');
?>
<?php 
$langs = array(
	"fr" => "mymovies.fr",
	"en" => "mymovies.com",
	"es" => "mymovies.es",
	"de" => "mymovies.de"
);

if(isset($_GET['lang']) && isset($langs[$_GET['lang']])){
	$current_lang = $_GET['lang'];
	$current_url = $langs[$current_lang];
} else {
	$current_lang = "fr";
	$current_url = "mymovies.fr";
}
if(isset($langs[$current_lang])) unset($langs[$current_lang]);
?>
<!DOCTYPE html>
<html lang="<?= $current_lang; ?>">
<head>
  <meta charset="UTF-8">
  <title> My Movies</title>
    <?php
    foreach($langs as $lang => $url){
      echo'<link rel="alternate" href="'.$url.'" hreflang="'.$lang.'">';
    }
    ?>
    <link rel="canonical" href="<?= $current_url; ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="keywords" content="Film, playlist,streaming, cinéma, synopsys, movies" />
    <meta name="author" content="Aicha Takwa Naïm" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Mymovies référence plus de 10 000 films. Vous pourrez consulter en détails les films, synopsys et bande-annonce. Regardez également votre film préféré en streaming.">
    <meta property="og:type" content="Mymovies">
    <meta property="og:title" content="Mymovies cinéma, consulter et regarder plus de 10000 films">
    <meta property="og:site_name" content="Mymovies">
    <meta property="og:url" content="https://mymovies.fr">
    <meta property="og:description" content="Mymovies référence plus de 10 000 films. Vous pourrez consulter en détails les films, synopsys et bande-annonce. Regardez également votre film préféré en streaming.">
    <meta property="og:image" content="https://mymovies.fr/logo.jpg">
    <meta property="twitter:title" content="Mymovies cinéma, consulter et regarder plus de 10000 films">
    <meta property="twitter:description" content="Mymovies référence plus de 10 000 films. Vous pourrez consulter en détails les films, synopsys et bande-annonce. Regardez également votre film préféré en streaming.">
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
                            <a class="nav-link " href="../user/index.php"> Données personnelles <span class="sr-only ">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../guest/browse.php"> Catalogue </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="playlist.php"> Playlists </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../user/contact.php"> Contact</a>
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
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://i.imgur.com/wvxPV9S.png"><span class="font-weight-bold"><?php echo $_SESSION['username']; ?></span><span class="text-black-50"></span><span> </span></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Paramètres du profil</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Nom </label><input type="text" class="form-control" value=""></div>
                            <div class="col-md-6"><label class="labels">Username</label><input type="text" class="form-control" value="<?php echo $_SESSION['username']; ?>"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mot de passe</label><input type="text" class="form-control" value=""></div>
                            <div class="col-md-12"><label class="labels">Email </label><input type="text" class="form-control" value=""></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Sauvegarder</button></div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Supprimer le compte</button></div>
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