<?php
    require_once 'pages/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10 title">
            <h1><i class="fa fa-bars"></i> DASHBOARD</h1>
        </div>

        <div class="col-sm-12">
            <div class="content">
                <h2>Welcome to Dashboard</h2>
                <p class="welcome-text">We,ve assembled some links for you to get started.</p>


                <div class="row" style="margin-top:-5%;">
                    <div class="col-md-12">
                        <!-- dblue -->
                        <a href="category.php" class="btn btn-dblue btn-lg" role="button"
                            style="margin-left:20px; margin-top:3%;"><span
                                class="glyphicon glyphicon-plus green"></span> <br />Add <br />Category</a>
                        <a href="category.php" class="btn btn-dblue btn-lg" role="button"
                            style="margin-left:20px; margin-top:3%;"><span
                                class="glyphicon glyphicon-edit yellow"></span> <br />Edit <br />Category</a>
                        <a href="model.php" class="btn btn-dblue btn-lg" role="button"
                            style="margin-left:20px; margin-top:3%;"><span
                                class="glyphicon glyphicon-plus green"></span> <br />Add <br />Brands</a>
                        <a href="messages.php" class="btn btn-dblue btn-lg" role="button"
                            style="margin-left:20px; margin-top:3%;"><span class="glyphicon glyphicon-envelope"></span>
                            <br />View<br />Messages</a>

                        <!-- dred -->
                        <a href="add-product.php" class="btn btn-dred btn-lg" role="button"
                            style="margin-left:20px; margin-top:3%;"><span
                                class="glyphicon glyphicon-plus green"></span> <br />Add <br /> Product</a>
                        <a href="edit-product.php" class="btn btn-dred btn-lg" role="button"
                            style="margin-left:20px; margin-top:3%;"><span
                                class="glyphicon glyphicon-edit yellow"></span> <br />Edit <br />Product</a>
                        <a href="add-gallery.php" class="btn btn-dred btn-lg" role="button"
                            style="margin-left:20px; margin-top:3%;"><span class="glyphicon glyphicon-eye-open"></span>
                            <br />View <br />Gallery</a>
                        <a href="settings.php" class="btn btn-dred btn-lg" role="button"
                            style="margin-left:20px; margin-top:3%;"><span
                                class="glyphicon glyphicon-cog glyphsize black"></span> <br />Manage <br /> Settings</a>
                    </div>
                </div>
            </div>


            <div class="col-sm-9" style="margin-top:5%; margin-left:25%;">
                <div class="row">
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile ">
                            <a href="#">
                                <div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div>
                            </a>
                            <?php 
								$all=getAllCustomers();
								echo $row=mysqli_num_rows($all);;
							?>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded"> Customers</div>
                                <div class="circle-tile-number text-faded "><?php echo $row; ?></div>
                                <a class="circle-tile-footer" href="viewcustomer.php">More Info<i
                                        class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile ">
                            <a href="#">
                                <div class="circle-tile-heading dark-blue"><i
                                        class="fa fa-shopping-cart fa-fw fa-3x"></i></div>
                            </a>
							<?php 
								$allorder=getAllOrders();
								echo $row1=mysqli_num_rows($allorder);;
							?>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded"> Orders</div>
                                <div class="circle-tile-number text-faded "><?php echo $row1; ?></div>
                                <a class="circle-tile-footer" href="orders.php">More Info<i
                                        class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile ">
                            <a href="#">
                                <div class="circle-tile-heading dark-blue"><i
                                        class="fa fa-envelope-open-o fa-fw fa-3x"></i></div>
                            </a>
							<?php 
								$allmsg=getAllMessages();
								echo $row2=mysqli_num_rows($allmsg);;
							?>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded"> Messages</div>
                                <div class="circle-tile-number text-faded "><?php echo $row2; ?></div>
                                <a class="circle-tile-footer" href="messages.php">More Info<i
                                        class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <style>
        .black {
            color: #000;
        }

        .red {
            color: #F00;
        }

        .dgreen {
            color: #060;
        }

        .green {
            color: #0F0;
        }

        .blue {
            color: #00F;
        }

        .mblue {
            color: #09F;
        }

        .yellow {
            color: #FF0;
        }

        .purple {
            color: #609;
        }

        .lilac {
            color: #C6F;
        }

        .orange {
            color: #F90;
        }

        .choc {
            color: #330;
        }

        /* Button Colours */
        .btn-dblue {
            color: #ffffff;
            background-color: #5D6D7E;
            border-color: #5D6D7E;
        }

        .btn-dblue:hover,
        .btn-dblue:focus,
        .btn-dblue:active,
        .btn-dblue.active,
        .open .dropdown-toggle.btn-dblue {
            color: #ffffff;
            background-color: #18148C;
            border-color: #000A7A;
        }

        .btn-dblue:active,
        .btn-dblue.active,
        .open .dropdown-toggle.btn-dblue {
            background-image: none;
        }

        .btn-dblue.disabled,
        .btn-dblue[disabled],
        fieldset[disabled] .btn-dblue,
        .btn-dblue.disabled:hover,
        .btn-dblue[disabled]:hover,
        fieldset[disabled] .btn-dblue:hover,
        .btn-dblue.disabled:focus,
        .btn-dblue[disabled]:focus,
        fieldset[disabled] .btn-dblue:focus,
        .btn-dblue.disabled:active,
        .btn-dblue[disabled]:active,
        fieldset[disabled] .btn-dblue:active,
        .btn-dblue.disabled.active,
        .btn-dblue[disabled].active,
        fieldset[disabled] .btn-dblue.active {
            background-color: #1B23BD;
            border-color: #000A7A;
        }

        .btn-dblue .badge {
            color: #1B23BD;
            background-color: #ffffff;
        }

        .btn-dred {
            color: #ffffff;
            background-color: #5D6D7E;
            border-color: #5D6D7E;
        }

        .btn-dred:hover,
        .btn-dred:focus,
        .btn-dred:active,
        .btn-dred.active,
        .open .dropdown-toggle.btn-dred {
            color: #ffffff;
            background-color: #7A2435;
            border-color: #69021F;
        }

        .btn-dred:active,
        .btn-dred.active,
        .open .dropdown-toggle.btn-dred {
            background-image: none;
        }

        .btn-dred.disabled,
        .btn-dred[disabled],
        fieldset[disabled] .btn-dred,
        .btn-dred.disabled:hover,
        .btn-dred[disabled]:hover,
        fieldset[disabled] .btn-dred:hover,
        .btn-dred.disabled:focus,
        .btn-dred[disabled]:focus,
        fieldset[disabled] .btn-dred:focus,
        .btn-dred.disabled:active,
        .btn-dred[disabled]:active,
        fieldset[disabled] .btn-dred:active,
        .btn-dred.disabled.active,
        .btn-dred[disabled].active,
        fieldset[disabled] .btn-dred.active {
            background-color: #B50D2E;
            border-color: #69021F;
        }

        .btn-dred .badge {
            color: #B50D2E;
            background-color: #ffffff;
        }

        .circle-tile {
            margin-bottom: 15px;
            text-align: center;
        }

        .circle-tile-heading {
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 100%;
            color: #FFFFFF;
            height: 80px;
            margin: 0 auto -40px;
            position: relative;
            transition: all 0.3s ease-in-out 0s;
            width: 80px;
        }

        .circle-tile-heading .fa {
            line-height: 80px;
        }

        .circle-tile-content {
            padding-top: 50px;
        }

        .circle-tile-number {
            font-size: 26px;
            font-weight: 700;
            line-height: 1;
            padding: 5px 0 15px;
        }

        .circle-tile-description {
            text-transform: uppercase;
        }

        .circle-tile-footer {
            background-color: rgba(0, 0, 0, 0.1);
            color: rgba(255, 255, 255, 0.5);
            display: block;
            padding: 5px;
            transition: all 0.3s ease-in-out 0s;
        }

        .circle-tile-footer:hover {
            background-color: rgba(0, 0, 0, 0.2);
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
        }

        .circle-tile-heading.dark-blue:hover {
            background-color: #2E4154;
        }

        .circle-tile-heading.green:hover {
            background-color: #138F77;
        }

        .circle-tile-heading.orange:hover {
            background-color: #DA8C10;
        }

        .circle-tile-heading.blue:hover {
            background-color: #2473A6;
        }

        .circle-tile-heading.red:hover {
            background-color: #CF4435;
        }

        .circle-tile-heading.purple:hover {
            background-color: #7F3D9B;
        }

        .tile-img {
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
        }

        .dark-blue {
            background-color: #34495E;
        }
        </style>