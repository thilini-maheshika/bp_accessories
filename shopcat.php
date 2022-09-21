<?php
	include 'template/header.php';
	include 'template/dependencies.php';
?>
<?php
    $cat_id = $_REQUEST['cat_id'];
    $getpro = getProductsbycatID($cat_id);
?>
<!-- Home -->

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?php echo $sub_img_src; ?>">
    </div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title"><?php echo $res['subpage_title'] ?></h2>
    </div>
</div>

<!-- Shop -->

<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Categories</div>
                        <ul class="sidebar_categories">

                            <?php
								$fetchcat = getAllCategory();
								while($res1 = mysqli_fetch_assoc($fetchcat)){
									$cat_id = $res1['cat_id'];
							?>
                            <li><a href="shopcat.php?cat_id=<?php echo $cat_id; ?>"><?php echo $res1['cat_name'] ?></a></li>
							<?php } ?>
                        </ul>
                    </div>

                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Brands</div>
                        <ul class="brands_list">

							<?php
								$fetchmod = getAllModel();
								while($res2 = mysqli_fetch_assoc($fetchmod)){
							?>

                            <li class="brand"><a href="#"><?php echo $res2['mod_name'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-9">

                <!-- Shop Content -->

                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>
							<?php 
								echo $row=mysqli_num_rows($getpro);;
                    		?>
							</span> products found</div>
							
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">Best Match<i class="fas fa-chevron-down"></span></i>
                                    <ul>
									<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "bestmatch" }'>Best Match
                                        </li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>Name
                                        </li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>
                                            Price</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product_grid">
                        <div class="product_grid_border"></div>

						<?php
							while($row2 = mysqli_fetch_assoc($getpro)){
								$p_id = $row2['p_id'];
								$img = $row2['p_img'];
								$img_src = "admin/upload/Products/".$img;
						?>

                        <!-- Product Item -->
                        <div class="product_item is_new">
                            <div class="product_border"></div>
                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img
                                    src="<?php echo $img_src;?>" ></div>
                            <div class="product_content">
                                <div class="product_price">RS.<?php echo $row2['p_price']?></div>
                                <div class="product_name">
                                    <div><a href="product.php?p_id=<?php echo $p_id; ?>" tabindex="0"><?php echo $row2['p_name']?></a></div>
                                </div>
                            </div>

                            <ul class="product_marks">
                                <li class="product_mark product_new">new</li>
                            </ul>
                        </div>
						<?php } ?>
                    </div>

                    <!-- Shop Page Navigation -->

                    <div class="shop_page_nav d-flex flex-row">
                        <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i
                                class="fas fa-chevron-left"></i></div>
                        <div class="page_next d-flex flex-column align-items-center justify-content-center"><i
                                class="fas fa-chevron-right"></i></div>
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