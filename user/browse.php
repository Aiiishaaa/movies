<?php

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
    <title>Films - My Movies</title>
    <!-- <link rel="stylesheet" href="https://bootswatch.com/4/cyborg/bootstrap.min.css">-->
    <!-- <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css"> -->

    <link rel="stylesheet" href="../css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark fixed-top ">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="index.php">
            <img src="../image/icon.png" alt="logo"> My Movies
        </a>

        <!-- Links -->
        <ul class="navbar-nav mr-auto">

        </ul>
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Films</a>
            </li>
            <li class="nav-item">
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


    <div class="container-fluid body">
        <div class="container">
            <div class="sbox">

                <div>
                    <center>
                        <div class="content">
                            <h1 style="color: white">Mo Movies: plus de 10 000 films disponible !</h1>
                            <p style="color: white">
                                Welcome to
                                <span style="font-weight:bold; color: #6AC045">MoviesInfo</span> | It is site where you can view information about your favourite movie.
                                MoviesInfo are best known for the excellent
                                <span style="font-weight:bold; color: #6AC045">Information</span> for each and every released and not released movies. We are providing
                                this information by the help of
                                <span style="font-weight:bold; color: #6AC045">MovieDB </span> which known for their movies resources.
                                <span style="font-weight:bold; color: #6AC045">Browse</span> Movie and get detail aspect of your favourite movie.
                            </p>
                        </div>
                    </center>
                    <form id="searchForm">
                        <input type="text" class="searchBox" placeholder="Recherche" id="searchText">
                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            <div id="movies" class="row"></div>
        </div>
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
        popularMovies();
    </script>
</body>

</html>