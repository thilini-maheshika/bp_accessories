<!-- Footer -->

<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="#"><img width="200px" src="images/logo.jpg" alt=""></a></div>
                    </div>

                    <div class="footer_phone"><?php echo $res['com_phone'] ?></div>
                    <div class="footer_contact_text">
                        <p><?php echo $res['com_address'] ?></p>

                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="<?php echo $res['fb']; ?>"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="<?php echo $res['insta']; ?>"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="<?php echo $res['google']; ?>"><i class="fab fa-google"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 offset-lg-3">
                <div class="footer_column">
                    <div class="footer_title">Find it Fast</div>
                    <?php
						$fetch = getCategoryByLimit();
						while($res1 = mysqli_fetch_assoc($fetch)){
                            $cat_id = $res1['cat_id'];
					?>
                    <ul class="footer_list">
                        <li><a href="shop.php?cat_id=<?php echo $cat_id; ?>"><?php echo $res1['cat_name']; ?></a></li>
                    </ul>
					<?php } ?>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Customer Care</div>
                    <ul class="footer_list">
                        <li><a href="profile.php">My Account</a></li>
                        <li><a href="order.php">Order Tracking</a></li>
                        <li><a href="contact.php">Q&A</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- Copyright -->

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col">

                <div
                    class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content">
                        Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved | Bpaccessories.com <i class="fa fa-heart" aria-hidden="true"></i>
                        BP Accessories </a>

                    </div>
                    <div class="logos ml-sm-auto">
                        <ul class="logos_list">
                            <li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
                            <li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
                            <li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/slick-1.8.0/slick.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/shop_custom.js"></script>
<script src="js/contact_custom.js"></script>
<script src="js/cart_custom.js"></script>
<script src="js/product_custom.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="admin/js/admin.js"></script>
<script src="plugins/iziToast-master/dist/js/iziToast.min.js"></script>


</body>

</html>