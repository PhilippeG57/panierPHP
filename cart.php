<?php
    include('pdo.php');
    include("header.php");


    if($nbProduit > 0){
?>

    <!-- Breadcumb Area -->
                <div class="col-12">
                    <br><h1 style="text-align:center">VOICI VOTRE PANIER</h1>
                </div>
    <!-- Breadcumb Area -->

    <!-- Cart Area -->
    <div class="cart_area section_padding_100_70 clearfix">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12">
                <?php
                if(isset($_GET['message']) && $_GET['message'] == "outstock"){ 
                ?>
                    <div class="alert alert-danger" role="alert">
                    Attention : stock insuffisant !
                    </div>
                <?php
                }
                ?>
				
                <?php
                if(isset($_GET['message']) && $_GET['message'] == "validate"){ 
                ?>
				<div class="alert alert-success" role="alert">
				  Votre panier à bien été mis à jour
				</div>
                <?php
                }
                ?>
                    <div class="cart-table">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-30">
                                <thead>
                                    <tr>
                                        <th scope="col"><i class="icofont-ui-delete"></i></th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
                                $total=0;
                                foreach($productPanier as $res){
                                    $total += $res['prixTotal'];
                                ?>                           
                                <tr>
                                        <th scope="row">
                                            <a href="delPanier.php?id=<?php echo $res['id'] ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce produit de votre panier ?')">
												<i class="icofont-close"></i>
											</a>
                                        </th>
                                        <td>
                                            <img src="img/<?php echo $res['image'] ?>" alt="Product">
                                        </td>
                                        <td>
                                            <a href="#"><?php echo $res['nom'] ?></a><br>
											<small>En stock : <?php echo $res['qtProduit'] ?></small>
                                        </td>
                                        <td><?php echo number_format($res['prix'], 2, ',', ' '); ?> €</td>
                                        <td>
                                            <div class="quantity">
                                                
												<a href="updateQt.php?panier=<?php echo $res['id']?>&action=remove" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce produit de votre panier ?')"	>
													<span style="font-size:25px; padding-right:20px">-</span> 
												</a>
												
												<?= $res['quantite'] ?>
												
												<a href="updateQt.php?panier=<?php echo $res['id']?>&action=add">
												 <span style="font-size:25px; padding-left:20px">+</span>
												</a>
                                            </div>
                                        </td>
                                        <td><?php echo number_format($res['prixTotal'], 2, ',', ' '); ?> €</td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="cart-apply-coupon mb-30">
                        <h6>Avez vous un coupon?</h6>
                        <p>Entrer le code de la remise</p>

                <?php
                if(isset($_GET['message']) && $_GET['message']=="invalidecode"){
                ?>
				<div class="alert alert-danger" role="alert">
				  Attention : le code remise saisi est incorrect !
				</div>
                <?php
                }
                if(!isset($_SESSION['couponCode'])){
                ?>
                        <!-- Form -->
                        <div class="coupon-form">
                            <form action="addCoupon.php?panier=" method="POST">
                                <input type="text" class="form-control" name="code" placeholder="Entrer le code">
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </form>
                        </div>
                <?php
                }
                else{
                ?>
				<!-- Form -->
                        <div class="coupon-form">
						    <span style="color:green; font-weight:bold">Coupon remise : <?= $_SESSION['couponCode'] ?> (-<?= $_SESSION['couponRegle'] ?>)</span>
						    <a href="delCoupon.php">[Supprimer ce coupon]</a>
						</div>
                <?php } ?>
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="cart-total-area mb-30">
                        <h5 class="mb-3">Total panier</h5>
                        <div class="table-responsive">
                            <table class="table mb-3">
                                <tbody>
                                    <tr>
                                        <td>TOTAL</td>
                                        <td><?php echo number_format($total, 2, ',', ' '); ?> €</td>
                                    </tr>
                                    <?php 
                                    if(isset($_SESSION['couponCode'])){
                                    ?>
									<tr>
                                        <td>Dont remise</td>
                                        <td>- <?php echo $_SESSION['couponRegle'] ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td>Frais de ports</td>
                                        <td>10.00 €</td>
                                    </tr>
									 <tr>
                                        <td>TOTAL HT</td>
                                        <td><?php
                                        $totalHt = $total/1.2;
                                        echo number_format($totalHt, 2, ',', ' '); ?> €
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TVA (20%)</td>
                                        <td>
                                        <?php
                                        $tva = $total - $totalHt;
                                        echo number_format($tva, 2, ',', ' '); ?> €
										</td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL TTC</td>
                                        <td><?php echo number_format($total+10, 2, ',', ' ') ?> €</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="checkout-1.html" class="btn btn-primary d-block">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
    <br>
    <?php
    }
    else{ 
        ?>
        <div class="col-12">
                <br><h1 style="text-align:center">VOTRE PANIER EST VIDE.</h1>
        </div><br><br>
    <?php } ?>
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


<!-- Mirrored from demo.designing-world.com/bigshop-2.2.0/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Mar 2020 09:27:21 GMT -->
</html>