<?php
    require_once 'pages/header.php';
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Featured Models</h1>
		</div>
		
		<div class="col-sm-4 cat-form">
			<h3>Add New Model</h3>
			<form method="post" novalidateenctype="multipart/form-data" id="modinfo">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="mod_name" id="mod_name" class="form-control">
				</div>

				<div class="form-group">
					<label>Image</label>
					<input type="file" id="file" name="file" /><br>
				</div>

				<div class="form-group">
					<button type="button" onclick="modForm()" id="submit" name="submit" class="btn btn-primary">Add New Model</button>
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
							<th>Image</th>
							<th>Delete</th>
							<th>Edit</th>
						</tr>
					</thead>

					<tbody>

						<?php 
							$getall = getAllModel();

							while($row=mysqli_fetch_assoc($getall)){

								$img = $row['mod_img'];
								$img_src = "upload/model/".$img;?>
						<tr>
							<td> 
								<a href="#"><?php echo $row['mod_name']; ?></a>
							</td>

							<td><img width="100px" height="100px" src='<?php echo $img_src; ?>'></td>

							<td><h3><a style="text-decoration: none; color: #333; font-size: 20px;">
							<?php if($row['is_deleted']=='0') :?>
							<button type="button" onclick="ModelDelete(<?php echo $row['mod_id']; ?>)">
							<i class="fa fa-trash" aria-hidden="true"></i></button>
							<?php endif ?>
						</a></h3></td>

							<td><h3><a style="text-decoration: none; color: #333; font-size: 20px;">
							<button type="button" onclick="location.href='edit-model.php?mod_id=<?php echo $row['mod_id']; ?>'" >
							<i class="fa fa-edit" aria-hidden="true"></i></a></h3></td>						
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>						
		</div>
	</div>
</div>

