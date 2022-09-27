<?php
	include 'template/header.php';
	include 'template/dependencies.php';
?>


	<!-- Cart -->

	<div class="cart_section">
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

				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="<?php echo $img_src?>" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text"><?php echo $row2['p_name']?></div>
										</div>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text">1</div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">Rs. <?php echo $row2['p_price']?></div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">Rs. <?php echo $row2['p_price']?></div>
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

						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">Buy now</button>
							<button type="button" class="button cart_button_checkout">Add to Cart</button>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<?php
	include 'template/footer.php';
?>