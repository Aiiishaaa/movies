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
    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- header section strats -->
    <header class="header_section ">
        <div class="container">
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
                            <a class="nav-link " href="index.php ">Accueil</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="browse.php">Catalogue</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="playlistP.php"><span class="sr-only ">Playlists publiques</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="contact.php">Contact</a>
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

    <!--  section playlistPublique  -->
    <div class="container-fluid">

	<h2 class="page-header text-center">Playlist</h2>
	<div class="row justify-content-center">
		<div class="col-sm-8 style_cart">
			<?php 
			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}

			?>
			<form method="POST" action="../shop/save_cart.php">
			<table class="table table-bordered table-striped">
				<thead>
					<th>Nom du film</th>
					<th>Durée</th>
				</thead>
				<tbody>
					<?php
						//initialize total
						$total = 0;
						if(!empty($_SESSION['cart'])){
						//connection
						$conn = Database::connect();
						//create array of initail qty which is 1
 						$index = 0;
 						if(!isset($_SESSION['qty_array'])){ //téléphone et combien de fois on l'a
 							$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						}
						//  var_dump($_SESSION['qty_array']);
						 //Implode : Rassemble les éléments d'un tableau en une chaîne //$_SESSION['cart'] nombre d'article
						 $statement = "SELECT * FROM smartphones WHERE id IN (".implode(',',$_SESSION['cart']).")";
						 $query = $conn->query($statement);
							while($item = $query->fetch()){
								?>
								<tr>
									<td>
										<a href="../shop/delete_item.php?id=<?php echo $item['id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></a>
									</td>
									<td><?php echo $item['name']; ?></td>
									<td><?php echo number_format($item['price'], 2); ?>€</td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
									<td><?php echo number_format($_SESSION['qty_array'][$index]*$item['price'], 2); ?>€</td>
									<?php $total += $_SESSION['qty_array'][$index]*$item['price']; ?>
								</tr>
								<?php
								$index ++;
							}
						}
						else{
							?>
							<tr>
								<td colspan="4" class="text-center">Aucun Film</td>
							</tr>
							<?php
						}
					?>
					<tr>

					</tr>
				</tbody>
			</table>
			<a href="../guest/index.php" class="view_cart_btn btn btn-primary"><span class="fas fa-arrow-left"></span> Retour</a>
			<a href="../shop/clear_cart.php" class="view_cart_btn btn btn-danger"><span class="fas fa-trash-alt"></span> supprimer votre playlist</a>
			</form>
		</div>
	</div>
</div>

    <section class="section_playlistPublique">
        <div class="container">
            <div id="playlist" class="row"></div>
        </div>
    </section>
    <!-- end playlistPublique section -->

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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
        getPlaylists();
    </script>
</body>

</html>