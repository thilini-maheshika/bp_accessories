<?php
	include 'template/header.php';
	include 'template/dependencies.php';
?>
<!-- Contact Info -->


<!-- Contact Form -->

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="contact_form_container">
                    <div class="contact_form_title">Pre Order Product</div>
                    <?php
                    $getall = getAllProductsbyID($_REQUEST['p_id']);

                    if($row=mysqli_fetch_assoc($getall)){

                        $img = $row['p_img'];
                        $img_src = "admin/upload/products/".$img;?>

                            <div class="row">
                            <div class="col-lg-12 ">
                                <div class="cart_container">
                                    <div class="cart_title">Shopping Cart</div>
                                    <div class="cart_items">
                                        <ul class="cart_list">
                                            <li class="cart_item clearfix">
                                                <div class="cart_item_image"><img src="<?php echo $img_src?>" alt=""></div>
                                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                    <div class="cart_item_name cart_info_col">
                                                        <div class="cart_item_title">Name</div>
                                                        <div class="cart_item_text"><?php echo $row['p_name']?></div>
                                                    </div>
                                                    <div class="cart_item_price cart_info_col">
                                                        <div class="cart_item_title">Price</div>
                                                        <div class="cart_item_text">Rs. <?php echo $row['p_price']?></div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Order Total -->
                                    <div class="order_total">

                                        <div class="order_total_content text-md-right">
                                            <div class="order_total_title">Order Total:</div>
                                            <div class="order_total_amount">Rs. <?php echo $total;?></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                  


                            </div>

                    <form method="post" novalidateenctype="multipart/form-data" id="productinfo">
                        <div
                            class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="hidden" name="p_id" id="p_id" value="<?php echo $p_id; ?>" class="contact_form_name input_field"
                                placeholder="Enter Your name">
                            <input type="hidden" name="p_price" id="p_price" value="<?php echo $row['p_price']?>" class="contact_form_name input_field"
                                placeholder="Enter Your name">
                            <input type="text" name="name" id="name" class="contact_form_name input_field"
                                placeholder="Enter Your name">
                            <input type="text" name="email" id="email"
                                class="contact_form_email input_field" placeholder="Your email">
                            <input type="text" name="phone" id="phone"
                                class="contact_form_phone input_field" placeholder="Your phone number">
                        </div>
                        <div class="contact_form_text">
                            <textarea id="address" class="text_field contact_form_message" name="address"
                                rows="4" placeholder="Address"></textarea>
                        </div>
                        <div class="contact_form_button">
                            <button type="button" class="button contact_submit_button"
                                onclick="preOrder(this.form)">Send Message</button>
                        </div>
                    </form>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

    <!-- Gallery -->
    <?php 
		include 'gallery.php';
	?>
    <!-- Gallery -->

    <!-- Map -->

    <div class="contact_map">
        <div id="google_map" class="google_map">
            <div class="map_container">
                <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.100765790619!2d79.9880149!3d6.87853!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae251f75a088045%3A0x47317049c049208b!2sBp%20accessories!5e0!3m2!1sen!2slk!4v1665981141843!5m2!1sen!2slk" width="100%" height="80%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
	include 'template/footer.php';	
?>