<?php
    require_once 'pages/header.php';


?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10 title">
            <h1><i class="fa fa-bars"></i> Add New Product</h1>
        </div>

        <div class="col-sm-12">
            <div class="row">
                    <div class="col-sm-6">
                        <form method="post" novalidateenctype="multipart/form-data" id="productinfo">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="p_name" id="p_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="p_des" name="p_des" rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select type="text" class='form-control norad tx12' name="cat_name" id="cat_name">
                                    <option selected></option>
                                    <?php 
										$res=getAllCategory();
										$count=1;
										while($row=mysqli_fetch_assoc($res)){
											echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
											$count++;
										}
                          
									?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Brand</label>
                                <select type="text" class='form-control norad tx12' name="brand" id="brand">
                                    <option selected></option>
                                    <?php 
										$res=getAllModel();
										$count=1;
										while($row=mysqli_fetch_assoc($res)){
											echo "<option value='".$row['mod_id']."'>".$row['mod_name']."</option>";
											$count++;
										}
                          
									?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Price: Rs.</label>
                                <input type="number" class="form-control" id="p_price" name="p_price">
                            </div>

                            <div class="form-group">
                                <label>Stock Quantity</label>
                                <input type="number" name="p_qnt" id="p_qnt" class="form-control">
                            </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label>Waranty</label>
                            <input type="number" name="p_wrnt" id="p_wrnt" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Product Active</label><br>
                            <select type="text" class='form-control norad tx12' name="product_active"
                                id="product_active">
                                <option value="1" selected>In Stock</option>
                                <option value="0">Out of Stock</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" name="file" type="file" id="file"><br>
                        </div>

                        <div class="form-group">
                            <button type="button" onclick="productForm()" id="submit" name="submit"
                                class="btn btn-primary">Add New Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/app.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.fa-bars').click(function() {
        $('.sidebar').toggle();
    })
});
</script>

</body>

</html>