<?php
    require_once 'pages/header.php';

	if(!isset($_REQUEST['mod_id'])){
		echo '<script>window.location.href="model.php"</script>';
	}

	$mod_id=$_REQUEST['mod_id'];
?>


<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Models</h1>
		</div>
		
		<?php
		$getall = getAllModelbyID($mod_id);

		if($row=mysqli_fetch_assoc($getall)){

			$img = $row['mod_img'];
			$img_src = "upload/model/".$img;?>


		<div class="col-sm-4 cat-form">
			<h3>Edit Model</h3>
			<div class="form-group">
				<label>Name</label>
				<input type="text" value="<?php echo $row['mod_name'] ?>" onchange="ModelEdit(this,<?php echo $mod_id;?>,'mod_name')" id="mod_name <?php echo $mod_id; ?>" name="mod_name" class="form-control">
			</div>

			<div class="form-group">
					<button type="button" onclick="window.location.href='model.php'" name="submit" class="btn btn-primary" >Back</button>
				</div>
		</div>

		<div class="col-sm-3">
		</div>
		<div class="col-sm-5 ">
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
						
						<img width="50%" src='<?php echo $img_src; ?>'><br><br>
						<input type="hidden" id="mod_id" name="mod_id" value="<?php echo $mod_id;?>"/>
						<input type="file" id="file" name="file" onchange="ModelEditImage(this.form)" /><br>
				</div>
			</form>
			</div>
	<?php } ?>
	</div>
</div>

