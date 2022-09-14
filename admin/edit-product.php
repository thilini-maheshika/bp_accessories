<?php
    require_once 'pages/header.php';

	if(!isset($_REQUEST['p_id'])){
		echo '<script>window.location.href="view-product.php"</script>';
	}
	$p_id = $_REQUEST['p_id'];
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i>Edit Products</h1>
        </div>

        <?php
		$getall = getAllProductsbyID($p_id);

		if($row=mysqli_fetch_assoc($getall)){

			$img = $row['p_img'];
			$img_src = "upload/products/".$img;?>


        <div class="col-sm-5 cat-form">
            <div class="form-group">
                <label>Name</label>
                <input type="text" value="<?php echo $row['p_name'] ?>"
                    onChange="ProductEdit(this,<?php echo $p_id;?>,'p_name')" id="p_name <?php echo $p_id; ?>"
                    name="p_name" class="form-control">
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" value="<?php echo $row['p_des'] ?>"
                    onChange="ProductEdit(this,<?php echo $p_id;?>,'p_des')" id="p_des <?php echo $p_id; ?>"
                    name="p_des" class="form-control">
            </div>

            <div class="form-group">
                <label>Category</label>
                <input type="text" value="<?php 

				$getcatall = getAllCategory();
				if($row1=mysqli_fetch_assoc($getcatall))

				echo $row1['cat_name'] ?>" onChange="ProductEdit(this,<?php echo $cat_id; ?>,'cat_name')"
                    id="cat_name <?php echo $cat_id; ?>" name="cat_name" class="form-control">
            </div>

            <div class="form-group">
                <label>Brand</label>
                <input type="text" value="<?php 

				$getmodall = getAllModel();
				if($row2=mysqli_fetch_assoc($getmodall))

				echo $row2['mod_name'] ?>" onChange="ProductEdit(this,<?php echo $mod_id; ?>,'mod_name')"
                    id="mod_name <?php echo $mod_id; ?>" name="mod_name" class="form-control">
            </div>

            <div class="form-group">
                <label>Price: Rs.</label>
                <input type="text" value="<?php echo $row['p_price'] ?>"
                    onChange="ProductEdit(this,<?php echo $p_id;?>,'p_price')" id="p_price <?php echo $p_id; ?>"
                    name="p_price" class="form-control">
            </div>

            <div class="form-group">
                <label>Stock Quantity</label>
                <input type="text" value="<?php echo $row['p_qnt'] ?>"
                    onChange="ProductEdit(this,<?php echo $p_id;?>,'p_qnt')" id="p_qnt <?php echo $p_id; ?>"
                    name="p_qnt" class="form-control">
            </div>

			<div class="form-group">
                <label>Waranty</label>
                <input type="text" value="<?php echo $row['p_waranty'] ?>"
                    onChange="ProductEdit(this,<?php echo $p_id;?>,'p_waranty')" id="p_waranty <?php echo $p_id; ?>"
                    name="p_waranty" class="form-control">
            </div>

			<div class="form-group">
                <label>Waranty</label>
                <select onChange='ProductEdit(this, "<?php echo $p_id; ?>","p_active")'
                    id="p_active <?php echo $pid; ?>" class='form-control norad tx12' name="p_active" type='text'
                    value="<?php echo $p_active; ?>">
                    <option value="1" <?php if ($row['p_active']=="1") echo "selected"; ?>>Active</option>
                    <option value="0" <?php if ($row['p_active']=="0") echo "selected"; ?>>Deactive</option>
                </select>
            </div>

        </div>

        <div class="col-sm-7 ">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group" style="margin-top: 7%;">

                    <img width="50%" src='<?php echo $img_src; ?>'><br><br>
                    <input type="hidden" id="p_id" name="p_id" value="<?php echo $p_id;?>" />
                    <input type="file" id="file" name="file" onchange="ProductEditImage(this.form)" /><br>
                </div>
            </form>

            <div class="form-group">
                <button type="button" onclick="window.location.href='view-products.php'" name="submit"
                    class="btn btn-primary">Back</button>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</div>