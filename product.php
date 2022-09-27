<?php
	include 'template/header.php';
	include 'template/dependencies.php';
?>

<!-- Single Product -->

<div class="single_product">
    <div class="container">
        <div class="row">

			<?php 
			$p_id = $_REQUEST['p_id'];
			$getall = getAllProductsbyID($p_id);

			if($row2=mysqli_fetch_assoc($getall)){

				$p_id = $row2['p_id'];
				$cat_id = $row2['cat_id'];
				$img = $row2['p_img'];
				$img_src = "admin/upload/Products/".$img;?>

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <li><img src="<?php echo $img_src; ?>" alt=""></li>
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><img src="<?php echo $img_src; ?>" alt=""></div>
            </div>

			<?php
				$getcat = getAllCategorybyID($cat_id);
				if($row3=mysqli_fetch_assoc($getcat)){

					$cat_name = $row3['cat_name'];
			?>
            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category"><?php echo $row3['cat_name']; ?></div>
                    <div class="product_name"><?php echo $row2['p_name']; ?></div>
                    <div class="product_text">
                        <p><?php echo $row2['p_des']; ?></p>
                    </div>
                    <div class="order_info d-flex flex-row">
                        <form action="#">
                            <div class="clearfix" style="z-index: 1000;">

                                <!-- Product Quantity -->
                                <div class="product_quantity clearfix">
                                    <span>Quantity: </span>
                                    <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                </div>
                                
                            </div>

                            <div class="product_price">RS. <?php echo $row2['p_price']; ?></div>
                            <div class="button_container">
                                <button type="button" class="button cart_button"><a href="cart.php?p_id=<?php echo $p_id; ?>">Add to Cart</a></button>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
			<?php }} ?>
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