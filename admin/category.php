<?php
    require_once 'pages/header.php';
?>


<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Categories</h1>
		</div>
		
		<div class="col-sm-4 cat-form">
			<h3>Add New Category</h3>
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="category_name" id="category_name" class="form-control">
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" id="category_des" name="category_des" rows="5"></textarea>
				</div>

				<div class="form-group">
					<label>Image</label>
					<input type="file" id="file" name="file" /><br>
				</div>

				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-primary">Add New Category</button>
				</div>
			</form>	

			<?php
						if(isset($_POST['submit'])){

							$cat_name = $_REQUEST['category_name'];
							$cat_des = $_REQUEST['category_des'];

							if(isset($_FILES['file']) && !empty($_FILES['file']['name'])){
								$img = $_FILES['file']['name'];

								if(!empty($cat_name)){

									if(checkCatNamebyName($cat_name)>0){ 

										echo "<script> Swal.fire({ icon: 'warning', title: 'Your work has been Already saved', showConfirmButton: false, timer: 1500 }); </script>";
									}else{

											if(insertCategory($cat_name,$cat_des,$img)){
												echo "<script> Swal.fire({ icon: 'success', title: 'Your Category has been saved', showConfirmButton: false, timer: 1500 }); </script>";

											}else{
												echo '<script>
												alert("Category Saved is not Success");
												</script>';
											}
									}
								}else{ echo "<script>alert(\"Please Enter Categori Name\");</script>";}

							}else{ echo "<script>alert(\"Please select Image to Upload\");</script>";}
						}
					?>


		</div>

		<div class="col-sm-8 cat-view">
			<div class="row">
				<div class="col-sm-5 ">
					<input type="text" id="search" name="search" class="form-control" placeholder="Search Category">
				</div>	
			</div>

			<div class="content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>Image</th>
							<th>Delete</th>
							<th>Edit</th>
						</tr>
					</thead>

					<tbody>

						<?php 
							$getall = getAllCategory();

							while($row=mysqli_fetch_assoc($getall)){

								$img = $row['cat_img'];
								$img_src = "upload/category/".$img;?>
						<tr>
							<td> 
								<a href="#"><?php echo $row['cat_name']; ?></a>
							</td>
							<td><?php echo $row['cat_des']; ?></td>
							<td><img width="100px" src='<?php echo $img_src; ?>'></td>
							<td><h3><a style="text-decoration: none; color: #333; font-size: 20px;" 
							href="delete.php?cat_id=<?php echo $row['cat_id']; ?>">
							<i class="fa fa-trash" aria-hidden="true"></i></a></h3></td>
							
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>						
		</div>
	</div>
</div>

