<?php
    require_once "connection.php";
    include "database.php";
    include "admin.php";
    
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN DASHBOARD | BP Accessories</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">	
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
</head>
<body>

<div class="sidebar">
	<ul class="sidebar-menu">
		<li><a href="index.php" class="dashboard"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
		<li class="treeview">
            <a href="#">
              <i class="fa fa-bookmark-o"></i> <span>Products</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="category.php"><i class="fa fa-plus-circle"></i>Categories</a></li>
              <li><a href="model.php"><i class="fa fa-plus-circle"></i>Models</a></li>
              <li><a href="add-products.php"><i class="fa fa-plus-circle"></i>Add Products</a></li>
              <li><a href="view-products.php"><i class="fa fa-eye"></i>View Products</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-image"></i> <span>Gallery</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="add-gallery.php"><i class="fa fa-plus-circle"></i>Add Images</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-file"></i> <span>Orders</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-eye"></i>View Orders</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-file"></i> <span>Messages</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>            
        </li>

        <li class="treeview">
            <a href="settings.php">
              <i class="fa fa-gear"></i> <span>Settings</span>
              <span class="pull-right-container">
              </span>
            </a>
        </li>
        
        <li class="treeview">
            <a href="#">
              <i class="fa fa-address-book"></i> <span>Active User</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-edit"></i>Edit Profile</a></li>
              <li><a href="pages/logout.php"><i class="fa fa-power-off"></i>Log Out</a></li>
            </ul>
        </li>		
	</ul>
</div>

<!-------footer----------->

<footer>
	<div class="col-sm-6">
		Copyright &copy; 2022 <a href="http://www.bpaccessories.com">BPAccessories.com</a> All rights reserved. 
	</div>
	<div class="col-sm-6">
		<span class="pull-right">Version 2.2.3</span>
	</div>
</footer>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/app.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
<script type="text/javascript" src="js/admin.js"></script>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
   <script src="assets/plugin/iziToast-master/dist/js/iziToast.min.js" type="text/javascript"></script>

</body>
</html>