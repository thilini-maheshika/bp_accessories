<?php
	include 'template/header.php';
?>

<?php
     $res4=getAllProducts();
?>

<?php
    $getFea= featuredProducts();
?>

<!-- Banner -->

<div class="banner">

    <div class="banner_background" style="background-image:url('<?php echo $back_img_src; ?>')"></div>
    <div class="container fill_height">
        <div class="row fill_height">
            <div class="banner_product_image"><img width="100%" src='<?php echo $b_img_src; ?>'></div>
            <div class="col-lg-5 offset-lg-4 fill_height">
                <div class="banner_content">
                    <h1 class="banner_text"><?php echo $res['banner_title'] ?></h1>
                    <div class="banner_product_name"><?php echo $res['banner_pname'] ?></div>
                    <div class="button banner_button"><a href="shop.php">Shop Now</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Deals of the week -->

<div class="deals_featured">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                <!-- Deals -->

                <div class="deals" style="margin-top:10%;">
                    <div class="deals_title">Featured Product of the Week</div>
                    <div class="deals_slider_container">

                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">

                            <?php
                                $count = 0;
                                while($row2=mysqli_fetch_assoc($getFea)){

                                    if($count < 8){
                                        $p_id = $row2['p_id'];
                                        $img = $row2['p_img'];
                                        $img_src = "admin/upload/Products/".$img;

                            ?>

                            <!-- Deals Item -->
                            <div class="owl-item deals_item">
                                <div class="deals_image"><img src="<?php echo $img_src; ?>"></div>
                                <div class="deals_content">
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                    </div>
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_name"><a
                                                href="product.php?p_id=<?php echo $p_id; ?>"><?php echo $row2['p_name']; ?></a>
                                        </div>
                                        <div class="deals_item_price ml-auto">RS.<?php echo $row2['p_price']; ?></div>
                                    </div>

                                </div>
                            </div>
                            <?php } $count++; } ?>
                        </div>

                    </div>

                    <div class="deals_slider_nav_container">
                        <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i>
                        </div>
                        <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i>
                        </div>
                    </div>
                </div>

                <!-- Featured -->
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs">
                            <ul class="clearfix">
                                <li class="active">Featured</li>
                            </ul>
                        </div>

                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider">

                                <?php 
                                $count=0;
                                while($row=mysqli_fetch_assoc($res4)){ 
                                        $p_id = $row['p_id'];
                                        $img = $row['p_img'];
                                        $img_src = "admin/upload/Products/".$img; 
                                        
                                    if(!$row['p_qnt'] == 0){   
                                        if($count < 8 || $count < 4){
                                        ?>

                                <!-- Slider Item -->
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div
                                        class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div
                                            class="product_image d-flex flex-column align-items-center justify-content-center">
                                            <img src="<?php echo $img_src ?>" width="200px"></div>
                                        <div class="product_content">
                                            <div class="product_price discount">
                                                <span>RS.<?php echo $row['p_price'] ?></span></div>
                                            <div class="product_name">
                                                <div><a
                                                        href="product.php?p_id=<?php echo $p_id; ?>"><?php echo $row['p_name'] ?></a>
                                                </div>
                                            </div>
                                            <div class="product_extras">
                                                <button class="product_cart_button">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } $count++; }} ?>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Popular Categories -->

    <div class="popular_categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="popular_categories_content">
                        <div class="popular_categories_title">Popular Categories</div>
                        <div class="popular_categories_slider_nav">
                            <div class="popular_categories_prev popular_categories_nav"><i
                                    class="fas fa-angle-left ml-auto"></i></div>
                            <div class="popular_categories_next popular_categories_nav"><i
                                    class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                        <div class="popular_categories_link"><a href="shop.php">full catalog</a></div>
                    </div>
                </div>

                <!-- Popular Categories Slider -->

                <div class="col-lg-9">
                    <div class="popular_categories_slider_container">
                        <div class="owl-carousel owl-theme popular_categories_slider">

                            <?php 
                            $fetchPopular = getAllCategory();
                            while($row3=mysqli_fetch_assoc($fetchPopular)){
                                $cat_id = $row3['cat_id'];
                                $img = $row3['cat_img'];
                                $img_src = "admin/upload/category/".$img; 

                        ?>
                            <!-- Popular Categories Item -->
                            <div class="owl-item">
                                <div
                                    class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img src='<?php echo $img_src ?>'></div>
                                    <div class="popular_category_text"><a
                                            href="shop.php?cat_id=<?php echo $cat_id; ?>"><?php echo $row3['cat_name'] ?></a>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hot New Arrivals -->
    <div class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Hot New Arrivals</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="viewed_slider_container">

                        <!-- Recently Viewed Slider -->

                        <div class="owl-carousel owl-theme viewed_slider">

                            <?php 
                                $getFea= featuredProducts();
                                while($row4 = mysqli_fetch_assoc($getFea)){

                                    $p_id = $row4['p_id'];
                                    $img = $row4['p_img'];
                                    $img_src = "admin/upload/Products/".$img;
                                    
                                    
                        ?>

                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div
                                    class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="<?php echo $img_src; ?>"></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price"><span><?php echo $row4['p_price']; ?></span></div>
                                        <div class="viewed_name"><a
                                                href="product.php?p_id=<?php echo $p_id; ?>"><?php echo $row4['p_name']; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands -->

    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brands_slider_container">

                        <!-- Brands Slider -->

                        <div class="owl-carousel owl-theme brands_slider">

                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="images/brands_1.jpg" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="images/brands_2.jpg" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="images/brands_3.jpg" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="images/brands_4.jpg" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="images/brands_5.jpg" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="images/brands_6.jpg" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="images/brands_7.jpg" alt=""></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="images/brands_8.jpg" alt=""></div>
                            </div>

                        </div>

                        <!-- Brands Slider Navigation -->
                        <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
	include 'template/footer.php';
?>