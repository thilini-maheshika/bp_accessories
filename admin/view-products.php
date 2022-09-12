<?php
    require_once 'pages/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i> View Products <button class="btn btn-sm btn-default"><a
                        href="add-products.php">Add New</a></button></h1>
        </div>
        <div class="search-div">
            <div class="col-sm-9">
                All( <?php 
        $all=getAllProducts();
        $row=mysqli_num_rows($all);
          echo $row;
         ?> )
            </div>

            <div class="col-sm-3">
                <input type="text" id="search" name="search" class="form-control" placeholder="Search Posts">
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="filter-div">
            <form method="post">
                <div class="col-sm-2">
                    <select name="action" class="form-control">
                        <option>Bulk Action</option>
                        <option>Move to Trash</option>
                    </select>
                </div>

                <div class="col-sm-1">
                    <div class="row">
                        <button class="btn btn-default">Apply</button>
                    </div>
                </div>
            </form>

            <form method="post">
                <div class="col-sm-2">
                    <select name="dates" class="form-control">
                        <option>All Dates</option>
                        <option>No Dates Found</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select name="dates" class="form-control">
                        <option>All Categories</option>
                        <option>No Categories Found</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-default">Apply Filter</button>
                </div>
            </form>
            <div class="col-sm-3">
                <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li class="active"><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="content">
                <div class="table-responsive">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"> Product Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Stock Quantity</th>
                                <th>Waranty</th>
                                <th>Product Active</th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $getpro= getAllProducts();
                            while($row=mysqli_fetch_assoc($getpro)){

                              $p_id=$row['p_id'];
                              $img = $row['p_img'];
                              $img_src = "upload/Products/".$img;
                            
                        ?>

                            <tr>
                                <td>
                                    <a href="#"><?php echo $row['p_name']; ?></a>
                                </td>
                                <td>
                                    <a href="#"><?php echo $row['p_des']; ?></a>
                                </td>
                                <td>
                                    <select onchange='quickUpdateProduct(this, "<?php echo $pid; ?>","product_active")'
                                        id="product_active <?php echo $pid; ?>" class='form-control norad tx12'
                                        name="product_active" type='text' value="<?php echo $active; ?>">
                                        <option value="1" <?php if ($row['product_active']=="1") echo "selected"; ?>>
                                            ACTIVE</option>
                                        <option value="0" <?php if ($row['product_active']=="0") echo "selected"; ?>>
                                            OFFLINE</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="#"><?php echo $row['model']; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <a href="#"></a>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <a href="#"></a>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <a href="#"></a>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <a href="#"></a>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <a href="#"></a>
                                </td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="filter-div">
            <form method="post">
                <div class="col-sm-2">
                    <select name="action" class="form-control">
                        <option>Bulk Action</option>
                        <option>Move to Trash</option>
                    </select>
                </div>

                <div class="col-sm-1">
                    <div class="row">
                        <button class="btn btn-default">Apply</button>
                    </div>
                </div>
            </form>


            <div class="col-sm-3 col-sm-offset-6">
                <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li class="active"><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>