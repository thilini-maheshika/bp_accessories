<?php
	include 'template/header.php';
	include 'template/dependencies.php';
    include 'auth/register/auth.php';
?>


<!-- Cart -->

<div class="cart_section">
    <div class="container">
        <div class="row">

            <?php 

				$getall = getAllCart($_SESSION['customer']);?>

            <div class="col-lg-10 offset-lg-1">
                <div class="cart_title">Shopping Cart</div>
                    <?php 
                        while($row2=mysqli_fetch_assoc($getall)){

                            $p_id = $row2['p_id'];
                            $img = $row2['p_img'];
                            $img_src = "admin/upload/Products/".$img;?>
                <div class="cart_container">

                    <div class="cart_items">
                        <ul class="cart_list">
                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="<?php echo $img_src?>" alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col" style="width:150px;">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text"><?php echo $row2['p_name']?></div>
                                    </div>
                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Quantity</div>
                                        <div class="cart_item_text"><?php echo $row2['qnt']?></div>
                                    </div>
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Price</div>
                                        <div class="cart_item_text">Rs. <?php echo $row2['p_price']?></div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Total</div>
                                        <div class="cart_item_text">Rs. <?php echo $row2['p_price']?></div>
                                    </div>

									<div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Delete</div>
                                        <div class="cart_item_text"><a onclick="deleteCart(<?php echo $row2['cart_id']?>)" class="text-danger"><i class="fas fa-trash "></i></a></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Order Total -->
                    <div class="order_total">

                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Order Total:</div>
                            <div class="order_total_amount">Rs. <?php echo $row2['p_price']?></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="card mb-2 mb-lg-0" style="border:none;">
                    <div class="card-body">
                        <p><strong>We accept</strong></p>
                        <img class="me-2" width="45px" src="images/visa.png" alt="Visa" />
                        <img class="me-2" width="45px" src="images/american-express.png" alt="American Express" />
                        <img class="me-2" width="45px" src="images/master-card.png" alt="Mastercard" />
                    </div>
                </div>
                <div class="cart_buttons">
                    <button type="button" class="button cart_button_clear">Continue Shooping</button>
                    <button type="button" class="button cart_button_checkout"><a href="checkout.php">Proceed to Checkout</a></button>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
	include 'template/footer.php';
?>
