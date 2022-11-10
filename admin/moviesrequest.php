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

    <!-- contact section -->
    <section class="contact-section">
        <div class="container">
            <h1 class="contact_taital">Demandes des utilisateurs</h1>
            <div class="row">
                <?php
  include('../controller/connectdb.php');
                $sql = "SELECT * FROM contact";

                $result = $conn->query($sql);
                $list = '';
                $total = $result->num_rows;


                if ($result->num_rows > 0) {
                    // output data of each row
                    if ($row = $result->fetch_assoc()) {
                        $list = $list;
                        $list = $list . '<div class="col-md-6 col-lg-4">
        <table class="table table-dark mt-3 ">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Sujet</th>
                <th scope="col">Message</th>
                <th scope="col">Date</th>
            </tr>
        <tbody>
            <tr>
                <td>' . $row["fullname"] . '</td>
                <td>' . $row["email"] . '</td>
                <td>' . $row["Sujet"] . '</td>
                <td>' . $row["message"] . '</td>
                <td>' . $row["date"] . '</td>
            </tr>
            </tbody>
        </table>
        <a href="updatemoviesrequest.php?id=' . $row["Contactid"] . '" class="btn btn-primary">Modifier</a>
        <a  href="../controller/deletemoviesrequest.php?id=' . $row["ContactOd"] . '" class="btn btn-danger">Supprimer</a>
        ';
                    }
                } else {
                    echo "Il n'y a pas encore de demande via le formulaire de contact !";
                }
                $conn->close();
                ?>
                </tbody>
                </table>
            </div>
        </div>
        </div>
        </div>
        </div>

    </section>
    <!-- end contact section -->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>

</html>