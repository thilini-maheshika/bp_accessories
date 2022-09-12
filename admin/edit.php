<?php
    require_once 'pages/header.php';

	if(!isset($_REQUEST['cat_id'])){
		echo '<script>window.location.href="category.php"</script>';
	}

	$cat_id=$_REQUEST['cat_id'];
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i> Categories</h1>
        </div>

        <?php
		$getall = getAllCategorybyID($cat_id);

		if($row=mysqli_fetch_assoc($getall)){

			$img = $row['cat_img'];
			$img_src = "upload/category/".$img;?>


        <div class="col-sm-4 cat-form">
            <h3>Edit Category</h3>
            <div class="form-group">
                <label>Name</label>
                <input type="text" value="<?php echo $row['cat_name'] ?>"
                    onChange="CategoryEdit(this,<?php echo $cat_id; ?>,'cat_name')" id="cat_name <?php echo $cat_id; ?>"
                    name="category_name" class="form-control">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" onChange="CategoryEdit(this,<?php echo $cat_id; ?>,'cat_des')"
                    id="cat_des <?php echo $cat_id; ?>" name="category_des"
                    rows="5"><?php echo $row['cat_des'] ?></textarea>
            </div>
            <div class="form-group">
                <button type="button" onclick="window.location.href='category.php'" name="submit"
                    class="btn btn-primary">Back</button>
            </div>
        </div>

        <div class="col-sm-3">
        </div>
        <div class="col-sm-5 ">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">

                    <img width="50%" src='<?php echo $img_src; ?>'><br><br>
                    <input type="hidden" id="cat_id" name="cat_id" value="<?php echo $cat_id;?>" />
                    <input type="file" id="file" name="file" onchange="CategoryEditImage(this.form)" /><br>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</div>