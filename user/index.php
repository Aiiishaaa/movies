<?php

// session_start();
// if (!isset($_SESSION['username'])) {
//     header('location: ../guest/index.php#popup1');
// }

session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../guest/index.php');
}
else{ 
    if ($_SESSION['status'] == "admin") {
        header('location: ../admin/index.php');
    }
}


?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - My Movies</title>
    <link rel="stylesheet" href="../css/index.css">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>

    <!-- Latest compiled and minified CSS -->
    <link rel=" stylesheet " href="../css/bootstrap.min.css ">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark fixed-top ">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">
            <img class="logo_mymovies" src="../image/logoMyMovies.svg" alt="logo"> My Movies
        </a>

        <!-- Links -->
        <ul class="navbar-nav mr-auto ">
        </ul>
        <!-- Links -->
        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link active" href="# ">Accueil</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="browse.php">Films</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="request.php">Faire une demande</a>
            </li>
            <li class="nav-item dropdown dropleft">
                <a class="nav-link" href="#" data-toggle="dropdown">
                    <img src="../image/default-user.png" style="width:30px; border-radius:50%;" alt="logo ">
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item disabled" style="color:silver; text-transform:lowercase;" href="#"><?php echo $_SESSION['username'] ?></a>
                    <a class="dropdown-item" style="color:#fff;" href="../controller/logout.php">Deconnexion</a>
                </div>
            </li>
        </ul>
    </nav>


    <header>
        <div class="container body ">
            <center>
                <div class=" inner-body ">
                    <h1 class="title ">Bonjour,
                        <span style="color: #FBA609; text-transform:lowercase;"><?php echo $_SESSION['username'] ?></span>
                    </h1>
                    <p style="color: white" class="content">
                        Bienvenue chez
                        <span style="font-weight:bold; color: #FBA609">My movies</span> La référence du cinéma mondial
                    </p>
                </div>
                <div class="container">
                    <a href="browse.php" class="btn-main btn-main-primary">
                        Consulter nos films
                    </a>
                </div>
            </center>
        </div>
    </header>

    <div class="about-box ">
        <center>
            <div class="about ">
                <h1>À propos</h1>
                <p class="about-content ">MyMovies est une entreprise française créée à Nice en 1997 par John Doe appartenant au secteur d'activité des industries créatives. Elle est spécialisée dans la distribution et l'exploitation d'œuvres cinématographiques et télévisuelles par le biais d'une plateforme dédiée au service de vidéo à la demande. Son siège social se situe à Sophia-Antipolis. Initialement, l'entreprise était uniquement présente dans le secteur de l'exploitation commerciale par la fourniture d'un service en ligne de location et d'achat de DVD livrés à domicile. Elle a ensuite proposé la location moyennant un abonnement mensuel. Son service de vidéo à la demande par abonnement commence en 2007. Depuis, l'entreprise s'est lancée dans la distribution d'un grand nombre de films. Aujourd'hui MyMovies souhaite faire évoluer son marché en créant sa propre plateforme de streaming multi-plateforme</p>
            </div>
        </center>
    </div>

    <div id="demo" class="carousel slide container" data-ride="carousel">
        <div class="ratedMoviesHead">
            <h1>Top Films</h1>
        </div>
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
            <li data-target="#demo" data-slide-to="4"></li>
        </ul>

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

    <div class="footer">
        <p>My Movies © Tous droit réservés</p>
    </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
        getTopMovies();
    </script>
</body>

</html>