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
			<form action=""	method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="category_name" id="category_name" class="form-control">
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="category_des" rows="5"></textarea>
				</div>

				<div class="form-group">
					<label>Image</label>
					<input type="file" name="file" /><br>
				</div>

				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-primary">Add New Category</button>
				

					<?php
						if(isset($_POST['submit'])){

							$cat_name = $_REQUEST['category_name'];
							$cat_des = $_REQUEST['category_des'];

							if(isset($_FILES['file']) && !empty($_FILES['file']['name'])){

								$img = $_FILES['file']['name'];
								$target_dir = "upload/category/";
								$target_file = $target_dir . basename($_FILES["file"]["name"]);
								$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
								$extensions_arr = array("jpg","jpeg","png","gif");


								if(!empty($cat_name)){
						
									$q1= "SELECT * FROM category WHERE cat_name='$cat_name'";
									$res1=mysqli_query($con,$q1);

									if(mysqli_num_rows($res1)>0){ 
										echo '<script>
											alert("Category already added");
										</script>';
									}else{

										$q2="INSERT INTO category(cat_name,cat_des,cat_img) values('$cat_name','$cat_des','$img')";
										$res2=mysqli_query($con,$q2);

										if (in_array($imageFileType,$extensions_arr)) {

											move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img);

											if($res2){
												echo '<script>
												 
												
												</script>';

											}else{
												echo '<script>
												alert("Category Saved is not Success");
												</script>';
											}
										}   
						
									}
								}else{ echo "<script>alert(\"Please Enter Categori Name\");</script>";}

							}else{ echo "<script>alert(\"Please select Image to Upload\");</script>";}
						}
					?>

				</div>
			</form>	


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

						<?php
							$count=1;
							$viewcat = "SELECT * FROM category";
							$viewresult = mysqli_query($con,$viewcat);
						?>

					<tbody>

						<?php 
							while($row=mysqli_fetch_assoc($viewresult)){

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
						<?php $count++; } ?>
					</tbody>
				</table>
			</div>						
		</div>
	</div>
</div>
