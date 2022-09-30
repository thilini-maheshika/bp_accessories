<?php
	include 'template/header.php';
	include 'template/dependencies.php';
    include 'auth/register/auth.php';
?>
<?php
    $cust=checkCustomerByID($_SESSION['customer']);

?>

<!-- Cart -->

<div class="cart_section">
    <div class="container">
        <div class="row">

            <?php 

				$getall = getAllCart($_SESSION['customer']);         

            ?>

            <div class="col-lg-12 ">
                <div class="cart_title">Shopping Cart</div>
                <?php 

                        $total = 0;
                        $ship_fee = $res['ship_fee'];

                        while($row2=mysqli_fetch_assoc($getall)){

                            $p_id = $row2['p_id'];
                            $img = $row2['p_img'];
                            $img_src = "admin/upload/Products/".$img;
                            
                            $sub_total = $row2['qnt'] * $row2['p_price'];
                            $total = $total + $sub_total ;
                            ?>

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
                                        <div class="cart_item_text">
                                            <input type="number" class="form-control"
                                                onchange="quantityChange(this, '<?php echo $row2['cart_id']; ?>', 'qnt');"
                                                name="qnt" id="qnt <?php echo $row2['cart_id']; ?>"
                                                value="<?php echo $row2['qnt']; ?>" style="width:100px;">
                                        </div>
                                    </div>
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Price</div>
                                        <div class="cart_item_text">Rs. <?php echo $row2['p_price']?></div>
                                    </div>

                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Sub Total</div>
                                        <div class="cart_item_text">Rs. <?php echo $sub_total; ?></div>
                                    </div>

                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Delete</div>
                                        <div class="cart_item_text"><a
                                                onclick="deleteCart(<?php echo $row2['cart_id']?>)"
                                                class="text-danger"><i class="fas fa-trash "></i></a></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Order Total -->
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Order Total:</div>
                            <div class="order_total_amount">Rs. <?php echo $sub_total;?></div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="col-lg-4 col-xl-3" style="margin-top:30px; margin-left:75%;">
                    <div class="d-flex justify-content-between" style="font-weight: 500;">
                        <p class="mb-2">Subtotal</p>
                        <p class="mb-2">Rs. <?php echo $total;?></p>
                    </div>

                    <div class="d-flex justify-content-between" style="font-weight: 500;">
                        <p class="mb-0">Shipping</p>
                        <p class="mb-0">Rs. <?php echo $ship_fee;?></p>
                    </div>

                    <hr class="my-4">

                            <?php $fullpay = $total + $ship_fee; ?>

                    <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                        <p class="mb-2">Total (tax included)</p>
                        <p class="mb-2">Rs. <?php echo $fullpay;?></p>
                    </div>

                </div>


                <div class="card mb-2 mb-lg-0" style="border:none;">
                    <div class="card-body">
                        <p><strong>We accept</strong></p>
                        <img class="me-2" width="45px" src="images/visa.png" alt="Visa" />
                        <img class="me-2" width="45px" src="images/american-express.png" alt="American Express" />
                        <img class="me-2" width="45px" src="images/master-card.png" alt="Mastercard" />
                    </div>
                </div>

                <?php
                    while($row3=mysqli_fetch_assoc($cust)){

                        $cust_id = $row3['cust_id'];
                ?>

                <div class="cart_buttons">
                    <button type="button" class="button cart_button"><a href="shop.php">Continue Shopping</a></button>
                    <button type="button" class="button cart_button_checkout"><a
                            href="checkout.php?cust_id=<?php echo $cust_id; ?>&total=<?php echo $fullpay ; ?>">
                            <div>
                                <span>Checkout</span>
                                <i class='far fa-arrow-alt-circle-right' style='font-size:24px'></i>
                                <span>Rs. <?php echo $fullpay;?></span>
                            </div>
                        </a></button>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>

<?php
	include 'template/footer.php';
?>