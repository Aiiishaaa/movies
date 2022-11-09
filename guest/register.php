<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <section class="section_formulaire">
        <div class="formulaire ">
            <div class="forms">
                <div class="form login">
                    <a href="index.php" class="back-btn">
                        <img src="../images/favicon.ico" alt="logo" class="logo">
                    </a>
                    <span class="title">S'identifier</span>

                    <form action="#">
                        <div class="input-field">
                            <input type="text" placeholder="Adresse e-mail" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" class="password" placeholder="Mot de passe" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>

                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="logCheck">
                                <label for="logCheck" class="text">Rester connecté</label>
                            </div>

                            <a href="#" class="text">Mot de passe oublié</a>
                        </div>

                        <div class="input-field button">
                            <input type="button" value="S'identifier">
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">Nouveau chez My Movies ?
                        <a href="#" class="text signup-link">Créer un compte</a>
                    </span>
                    </div>
                </div>

                <!-- Registration Form -->
                <div class="form signup">
                    <a href="index.php" class="back-btn">
                        <img src="../images/favicon.ico" alt="logo" class="logo">
                    </a>
                    <span class="title">Créer un compte</span>

                    <form action="#">
                        <div class="input-field">
                            <input type="text" placeholder="Votre nom" required>
                            <i class="uil uil-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="text" placeholder="Adresse e-mail" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" class="password" placeholder="Mot de passe" required>
                            <i class="uil uil-lock icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" class="password" placeholder="Entrez le mot de passe à nouveau" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>

                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="termCon">
                                <label for="termCon" class="text">J'accepte les conditions de My Movies</label>
                            </div>
                        </div>

                        <div class="input-field button">
                            <input type="button" value="S'enregistrer">
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">
                            Vous possédez déjà un compte ?
                        <a href="#" class="text login-link"> Identifiez-vous</a>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="../js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- main js -->
    <script src="../js/main.js"></script>
</body>

</html>