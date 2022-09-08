<?php
    require_once 'pages/header.php';
?>


<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Categories</h1>
		</div>
		
		<div class="col-sm-4 cat-form">
			<h3>Edit Category</h3>
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
					<button type="submit" name="submit" class="btn btn-primary">Edit Category</button>
				</div>
			</form>	

			<?php
						require_once 'connection.php';  

                        if(isset($_REQUEST['submit'])){
                    
                            $cat_id=$_REQUEST['cat_id'];
                            $cat_name=$_REQUEST['category_name'];
                            $cat_des=$_REQUEST['category_des'];
                    
                            $querygetcode="UPDATE category SET cat_name = '$cat_name', cat_des = '$cat_des'  WHERE cat_id = '$cat_id'";
                            $result=mysqli_query($con,$querygetcode);
                    
                            if ($result) {
                                echo "<script> Swal.fire({ icon: 'success', title: 'Updated Successfully', showConfirmButton: false, timer: 1500 }); </script>";
                              } else {
                                echo "<script> Swal.fire({ icon: 'warning', title: 'Try Again', showConfirmButton: false, timer: 1500 }); </script>";
                              }
                            
                        }
					?>


		</div>
	</div>
</div>

