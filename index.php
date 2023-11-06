<?php 
include('pdo.php');
include('header.php');
?>

<br><h1 style="text-align:center">BIENVENUE CHEZ ADIDAS.</h1><br><br>
    <!-- New Arrivals Area -->
		<!-- ZONE MONTRES -->
        <div class="container" id="montres">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals">
                        <h5>Montres</h5>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="new_arrivals_slides owl-carousel">
                  		<?php
						// REQUETE + boucle pour afficher les produits
                        $stmt = $pdo->prepare('SELECT * from produits WHERE categorie="montre" ORDER BY recommande DESC');
                        $stmt->execute();
                        $montres = $stmt->fetchALL();

                        foreach($montres as $res){
						?>

                        <!-- Single Product -->
                        <div class="single-product-area">
                            <div class="product_image">
                                <!-- Product Image -->
                                <img class="normal_img" src="img/<?=$res['image']?>" alt="">
                            </div>
							
								<!-- Product Badge -->
                                <?php if($res["recommande"]=="oui"){ ?>
                                <div class="product_badge">
                                    <span>Recommandé</span>
                                </div>
                                <?php } ?>

								
                            <!-- Product Description -->
                            <div class="product_description">
                                <!-- Add to cart -->
                                <div class="product_add_to_cart">
                                    <a href="addPanier2.php?id=<?= $res['id']?>&prix=<?= $res['prix']?>"><i class="icofont-shopping-cart"></i> Ajouter au panier</a>
                                </div>

                                <!-- Quick View -->
                                <div class="product_quick_view">
                                    <a href="details.php?id=<?= $res['id']?>"><i class="icofont-eye-alt"></i> Détail</a>
                                </div>

                               
                                <a href="details.php?id=<?= $res['id'] ?>"><?= $res['nom'] ?></a>
                                <h6 class="product-price"><?= number_format($res['prix'], 2, ',', ' '); ?> €</h6>
                            </div>
                        </div>					
						
                        <?php   
                        //FERMETURE DE BOUCLE
                             }
                        ?>                   
                    </div>
                </div>
            </div>
        </div>		 
		<br>
		<!-- ZONE MAILLOTS -->

		<div class="container" id="maillots">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals">
                        <h5>Maillots</h5>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="new_arrivals_slides owl-carousel">
                  		<?php
						// REQUETE + boucle pour afficher les maillots
                        $stmt = $pdo->prepare('SELECT * from produits WHERE categorie="maillot" ORDER BY recommande DESC');
                        $stmt->execute();
                        $maillots = $stmt->fetchALL();
                        foreach($maillots as $res){
						?>

                        <!-- Single Product -->
                        <div class="single-product-area">
                            <div class="product_image">
                                <!-- Product Image -->
                                <img class="normal_img" src="img/<?=$res['image']?>" alt="">
                            </div>
							
								<!-- Product Badge -->
                                <?php if($res["recommande"]=="oui"){ ?>
                                <div class="product_badge">
                                    <span>Recommandé</span>
                                </div>
                                <?php } ?>

								
                            <!-- Product Description -->
                            <div class="product_description">
                                <!-- Add to cart -->
                                <div class="product_add_to_cart">
                                    <a href="addPanier2.php?id=<?= $res['id']?>&prix=<?= $res['prix']?>"><i class="icofont-shopping-cart"></i> Ajouter au panier</a>
                                </div>

                                <!-- Quick View -->
                                <div class="product_quick_view">
                                    <a href="details.php?id=<?= $res['id']?>"><i class="icofont-eye-alt"></i> Détail</a>
                                </div>

                               
                                <a href="details.php?id=<?= $res['id'] ?>"><?= $res['nom'] ?></a>
                                <h6 class="product-price"><?= number_format($res['prix'], 2, ',', ' '); ?> €</h6>
                            </div>
                        </div>						
						
						<?php
						// Fermeture boucle
                            }
						?>                    
                    </div>
                </div>
            </div>
        </div>
		<br>
		<!-- ZONE CHAUSSURES -->
		<div class="container"  id="chaussures">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals">
                        <h5>Chaussures</h5>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="new_arrivals_slides owl-carousel">
                  		<?php
						// REQUETE + boucle pour afficher les chaussures
                        $stmt = $pdo->prepare('SELECT * from produits WHERE categorie="chaussure" ORDER BY recommande DESC');
                        $stmt->execute();
                        $chaussures = $stmt->fetchALL();

                        foreach($chaussures as $res){
						?>

                        <!-- Single Product -->
                        <div class="single-product-area">
                            <div class="product_image">
                                <!-- Product Image -->
                                <img class="normal_img" src="img/<?=$res['image']?>" alt="">
                            </div>
							
								<!-- Product Badge -->
                                <?php if($res["recommande"]=="oui"){ ?>
                                <div class="product_badge">
                                    <span>Recommandé</span>
                                </div>
                                <?php } ?>

								
                            <!-- Product Description -->
                            <div class="product_description">
                                <!-- Add to cart -->
                                <div class="product_add_to_cart">
                                    <a href="addPanier2.php?id=<?= $res['id']?>&prix=<?= $res['prix']?>"><i class="icofont-shopping-cart"></i> Ajouter au panier</a>
                                </div>

                                <!-- Quick View -->
                                <div class="product_quick_view">
                                    <a href="details.php?id=<?= $res['id']?>"><i class="icofont-eye-alt"></i> Détail</a>
                                </div>

                               
                                <a href="details.php?id=<?= $res['id'] ?>"><?= $res['nom'] ?></a>
                                <h6 class="product-price"><?= number_format($res['prix'], 2, ',', ' '); ?> €</h6>
                            </div>
                        </div>						
						
						<?php
						// FERMETURE BOUCLE
                                }
						?>                    
                    </div>
                </div>
            </div>
        </div>

    <!-- New Arrivals Area -->

    <!-- Footer Area -->
    <footer class="footer_area section_padding_100_0">
        <div class="container">
            <div class="row">
                <!-- Single Footer Area -->
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="single_footer_area mb-100">
                        <div class="footer_heading mb-4">
                            <h6>Contact Us</h6>
                        </div>
                        <ul class="footer_content">
                            <li><span>Address:</span> Lords, London, UK - 1259</li>
                            <li><span>Phone:</span> 002 63695 24624</li>
                            <li><span>FAX:</span> 002 78965 369552</li>
                            <li><span>Email:</span> support@example.com</li>
                        </ul>
                        <div class="footer_social_area mt-15">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Area -->
                <div class="col-12 col-sm-6 col-md col-lg-4 col-xl-2">
                    <div class="single_footer_area mb-100">
                        <div class="footer_heading mb-4">
                            <h6>Information</h6>
                        </div>
                        <ul class="footer_widget_menu">
                            <li><a href="#"><i class="icofont-rounded-right"></i> Your Account</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Free Shipping Policy</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Your Cart</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Return Policy</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Free Coupon</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Delivary Info</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Single Footer Area -->
                <div class="col-12 col-sm-6 col-md col-lg-4 col-xl-2">
                    <div class="single_footer_area mb-100">
                        <div class="footer_heading mb-4">
                            <h6>Account</h6>
                        </div>
                        <ul class="footer_widget_menu">
                            <li><a href="#"><i class="icofont-rounded-right"></i> Product Support</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Terms &amp; Conditions</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Help</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Payment Method</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Affiliate Program</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Single Footer Area -->
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-2">
                    <div class="single_footer_area mb-100">
                        <div class="footer_heading mb-4">
                            <h6>Support</h6>
                        </div>
                        <ul class="footer_widget_menu">
                            <li><a href="#"><i class="icofont-rounded-right"></i> Payment Method</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Help</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Product Support</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Terms &amp; Conditions</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Privacy Policy</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> Affiliate Program</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Single Footer Area -->
                <div class="col-12 col-md-7 col-lg-8 col-xl-3">
                    <div class="single_footer_area mb-50">
                        <div class="footer_heading mb-4">
                            <h6>Join our mailing list</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="form-control mail" placeholder="Your E-mail Addrees">
                                <button type="submit" class="submit"><i class="icofont-long-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="single_footer_area mb-100">
                        <div class="footer_heading mb-4">
                            <h6>Download our Mobile Apps</h6>
                        </div>
                        <div class="apps_download">
                            <a href="#"><img src="img/core-img/play-store.png" alt="Play Store"></a>
                            <a href="#"><img src="img/core-img/app-store.png" alt="Apple Store"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer_bottom_area">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Copywrite -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite_text">
                            <p>Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#">Designing World</a></p>
                        </div>
                    </div>
                    <!-- Payment Method -->
                    <div class="col-12 col-md-6">
                        <div class="payment_method">
                            <img src="img/payment-method/paypal.png" alt="">
                            <img src="img/payment-method/maestro.png" alt="">
                            <img src="img/payment-method/western-union.png" alt="">
                            <img src="img/payment-method/discover.png" alt="">
                            <img src="img/payment-method/american-express.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/default/classy-nav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/default/scrollup.js"></script>
    <script src="js/default/sticky.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jarallax.min.js"></script>
    <script src="js/jarallax-video.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/default/active.js"></script>

</body>
</html>