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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to MoviesInfo</title>
    <link rel="stylesheet" href="../css/index.css">
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>

    <!-- Latest compiled and minified CSS -->
    <link rel=" stylesheet " href="../css/bootstrap.min.css ">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark fixed-top ">
        <!-- Brand/logo -->
        <a class="navbar-brand " href="#">
            <img src="../image/icon.png " alt="logo "> MoviesInfo
        </a>

        <!-- Links -->
        <ul class="navbar-nav mr-auto ">
        </ul>
        <!-- Links -->
        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link active " href="# ">Home</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="browse.php">Browse Movies</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="request.php">Request</a>
            </li>
            <li class="nav-item dropdown dropleft">
                <a class="nav-link" href="#" data-toggle="dropdown">
                    <img src="../image/default-user.png" style="width:30px; border-radius:50%;" alt="logo ">
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item disabled" style="color:silver; text-transform:lowercase;" href="#"><?php echo $_SESSION['username'] ?></a>
                    <a class="dropdown-item" style="color:#fff;" href="../controller/logout.php">Log Out</a>
                </div>
            </li>
        </ul>
    </nav>


    <header>
        <div class="container body ">
            <center>
                <div class=" inner-body ">
                    <h1 class="title ">Welcome,
                        <span style="color: #6AC045; text-transform:lowercase;"><?php echo $_SESSION['username'] ?></span>
                    </h1>
                    <p style="color: white" class="content">
                        Welcome to
                        <span style="font-weight:bold; color: #6AC045">MoviesInfo</span> | It is site where you can view information about your favourite movie. MoviesInfo
                        are best known for the excellent
                        <span style="font-weight:bold; color: #6AC045">Information</span> for each and every released and not released movies. We are providing this information
                        by the help of
                        <span style="font-weight:bold; color: #6AC045">MovieDB </span> which known for their movies resources.
                        <span style="font-weight:bold; color: #6AC045">Browse</span> Movie and get detail aspect of your favourite movie.
                    </p>
                </div>
                <div class="container">
                    <a href="browse.php" class="btn-main btn-main-primary">
                        Browse Movies Now
                    </a>
                </div>

            </center>
        </div>
    </header>

    <div class="about-box ">
        <center>
            <div class="about ">
                <h1>About this site</h1>
                <p class="about-content ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate nobis officiis, labore non molestias maxime,
                    corporis saepe voluptatibus culpa sequi minus vitae qui eos expedita quos placeat consectetur voluptas
                    ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus quos, aut voluptatum
                    a est distinctio cumque eveniet nisi. Soluta, aliquid tempora quae in reiciendis aut aliquam obcaecati
                    atque dolor perspiciatis?</p>
            </div>
        </center>
    </div>

    <div id="demo" class="carousel slide container" data-ride="carousel">
        <div class="ratedMoviesHead">
            <h1>Top Rated Movies</h1>
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
        <p>&copy; Copyright Developed by Genius Coders.</p>
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