<?php
	include 'admin/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>BP Accessories</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="plugins/slick-1.8.0/slick.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">


</head>

<body>

    <?php
	$getall = getAllSettings();
	$res = mysqli_fetch_assoc($getall);

	$back_img = $res['banner_back_img'];
    $back_img_src = 'admin/upload/setting_img/'.$back_img;

	$b_img = $res['banner_img'];
    $b_img_src = 'admin/upload/setting_img/'.$b_img;

    $sub_img = $res['subpage_back_img'];
    $sub_img_src = 'admin/upload/setting_img/'.$sub_img;
?>

    <div class="super_container">

        <!-- Header -->

        <header class="header">

            <!-- Top Bar -->

            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="images/phone.png"></div>
                                <?php echo $res['com_phone'] ?>
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a
                                    href=""><?php echo $res['com_email'] ?></a>
                            </div>
                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_user">
                                    <div class="user_icon"><a href="profile.php"><i class="fa fa-user"></i></a></div>
                                    <div><a href="auth/register/reg.php">Register</a></div>
                                    <div><a href="admin/login.php">Sign in</a></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Main -->

            <div class="header_main">
                <div class="container">
                    <div class="row">

                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="#">BP Acc</a></div>
                            </div>
                        </div>

                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form  method="POST" class="header_search_form clearfix">
                                            <input type="text"  class="header_search_input"
                                                placeholder="Search for products..." name="key" id="key">
                                            <button type="button" class="header_search_button trans_300" value="Submit" onclick="searchProduct(this.form)"><img src="images/search.png"></button>
                                        
                                            <div class="custom_dropdown">
                                                <div class="custom_dropdown_list">
                                                    <span class="custom_dropdown_placeholder clc">All Categories</span>

                                                    <ul class="custom_list clc">
                                                        <?php
														$fetchcat = getAllCategory();
														while($res1 = mysqli_fetch_assoc($fetchcat)){
                                                            $cat_id = $res1['cat_id'];
													?>
                                                        <li><a class="clc" href="shop.php?cat_id=<?php echo $cat_id; ?>"><?php echo $res1['cat_name'] ?></a>
                                                        </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cart -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <img src="images/cart.png" alt="">
                                            <div class="cart_count"><span>10</span></div>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="#">Cart</a></div>
                                            <div class="cart_price">$85</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->

            <nav class="main_nav">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="main_nav_content d-flex flex-row">

                                <!-- Categories Menu -->

                                <div class="cat_menu_container">
                                    <div
                                        class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                        <div class="cat_burger"><span></span><span></span><span></span></div>
                                        <div class="cat_menu_text">categories</div>
                                    </div>

                                    <ul class="cat_menu">

                                        <?php 
										$fetchcat = getAllCategory();
										while($res1 = mysqli_fetch_assoc($fetchcat)){
                                            $cat_id = $res1['cat_id'];
                                        ?>

                                        <li><a href="shop.php?cat_id=<?php echo $cat_id; ?>"><?php echo $res1['cat_name'] ?>
                                                <i class="fas fa-chevron-right ml-auto"></i></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>

                                <!-- Main Nav Menu -->

                                <div class="main_nav_menu ml-auto">
                                    <ul class="standard_dropdown main_nav_dropdown">
                                        <li><a href="index.php">Home<i class="fas fa-chevron-down"></i></a></li>
                                        <li class="hassubs">
                                            <a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>

                                            <ul>
													<?php 
														$fetchmod = getAllProductsByJoin();														
														while($res2 = mysqli_fetch_assoc($fetchmod)){
                                                            $mod_id = $res2['mod_id'];
													?>
                                                <li>
                                                    <a href="shop.php?mod_id=<?php echo $mod_id; ?>"><?php echo $res2['mod_name'] ?><i class="fas fa-chevron-down"></i></a>
                                                    <ul>
                                                        
                                                        <?php $fetchPro = getProductsByModel($mod_id);
                                                            while($res3 = mysqli_fetch_assoc($fetchPro)){
                                                                $p_id= $res3['p_id'];
                                                        ?>
                                                        
                                                        <li><a href="product.php?p_id=<?php echo $p_id; ?>"><?php echo $res3['p_name'] ?></i></a>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                            <?php } ?>
                                            </ul>

                                        </li>
                                        <li class="hassubs">
                                            <a href="shop.php">Shop</a>
                                        </li>
                                        <li class="hassubs">
                                            <a href="contact.php">contact</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Menu Trigger -->

                                <div class="menu_trigger_container ml-auto">
                                    <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                        <div class="menu_burger">
                                            <div class="menu_trigger_text">menu</div>
                                            <div class="cat_burger menu_burger_inner">
                                                <span></span><span></span><span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
		