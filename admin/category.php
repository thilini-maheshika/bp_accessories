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
			<form method="post" novalidateenctype="multipart/form-data" id="fileinfo">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="cat_name" id="cat_name" class="form-control">
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" id="cat_des" name="cat_des" rows="5"></textarea>
				</div>

				<div class="form-group">
					<label>Image</label>
					<input type="file" id="file" name="file" /><br>
				</div>

				<div class="form-group">
					<button type="submit" onclick="catForm()" id="submit" name="submit" class="btn btn-primary">Add New Category</button>
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

							<td><h3><a style="text-decoration: none; color: #333; font-size: 20px;">
							<?php if($row['is_deleted']=='0') :?>
							<button type="button" onclick="deleteCategory(<?php echo $row['cat_id']; ?>)">
							<i class="fa fa-trash" aria-hidden="true"></i></button>
							<?php endif ?>
						</a></h3></td>

							<td><h3><a style="text-decoration: none; color: #333; font-size: 20px;"
							href="edit.php?cat_id=<?php echo $row['cat_id']; ?> ">
							<i class="fa fa-edit" aria-hidden="true"></i></a></h3></td>
							
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>						
		</div>
	</div>
</div>

