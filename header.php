<?php 
session_start();
include('pdo.php');
?>
<!doctype html>
<html lang="en">


<!-- Mirrored from demo.designing-world.com/bigshop-2.2.0/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Mar 2020 09:26:48 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Bienvenue sur le TD que je dois faire</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner-grow" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Header Area -->
    <header class="header_area">

        <!-- Main Menu -->
        <div class="bigshop-main-menu" id="sticker">
            <div class="container">
                <div class="classy-nav-container breakpoint-off">
                    <nav class="classy-navbar" id="bigshopNav">

                        <!-- Nav Brand -->
                        <a href="index.php" class="nav-brand"><img src="img/logo.png" style="width:100px" alt="logo"></a>

                        <!-- Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"></span>
                        </div>

                        <!-- Partie gauche du header -->
                        <div class="classy-menu">
                            <!-- Close -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">Accueil</a></li>
                                    <li><a href="#">Categorie</a>
                                        <ul class="dropdown">
                                            <li><a href="index.php#montres">Montres</a></li>
                                            <li><a href="index.php#maillots">Maillots</a></li>
                                            <li><a href="index.php#chaussures">Chaussures</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Partie droite du header -->
                        <div class="hero_meta_area ml-auto d-flex align-items-center justify-content-end">
                            <!-- Search -->
                            <div class="search-area">
                                <div class="search-btn"><i class="icofont-search"></i></div>
                                <!-- Form -->
                                <div class="search-form">
                                    <input type="search" class="form-control" placeholder="Search">
                                    <input type="submit" class="d-none" value="Send">
                                </div>
                            </div>


                           <!-- Cart -->
                            <div class="cart-area">
                                <a href="cart.php"><div class="cart--btn"><i class="icofont-cart"></i> <span class="cart_quantity">0</span></div></a>
                            </div>
							<div>
								<a href="connexion.php">Se connecter / S'inscrire </a>
							</div>				
							
							<div class="classy-navbar-toggler">
                            <span class="navbarToggler"></span>
								</div>

								<!-- Menu PROFIL -->
								<div class="classy-menu">
									<!-- Close -->
									<div class="classycloseIcon">
										<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
									</div>

									<!-- Nav -->
									<div class="classynav">
										<ul>
											<li><a href="#">Bienvenue, </a>
												<ul class="dropdown">
													<li><a href="profil.php">Profil</a></li>
													<li><a href="deconnexion.php">Se déconnecter</a></li>
												</ul>
											</li>
										</ul>
									</div>
								</div>					
							<?php 
							?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>