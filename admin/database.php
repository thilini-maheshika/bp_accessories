<?php 


function insertCategory($cat_name,$cat_des,$img){

	include 'connection.php';

	$target_dir = "upload/category/";
	$target_file = $target_dir . basename($img);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$extensions_arr = array("jpg","jpeg","png","gif");
	move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img);

	if (in_array($imageFileType,$extensions_arr)) {
		$q2= "INSERT INTO category(cat_name,cat_des,cat_img) values('$cat_name','$cat_des','$img')";
		return mysqli_query($con,$q2);
	}

}

function checkCatNamebyName($cat_name){
	include 'connection.php';

	$q1= "SELECT * FROM category WHERE cat_name='$cat_name'";
	$catName_check = mysqli_query($con,$q1);
	return mysqli_num_rows($catName_check);
}

function getAllCategory(){
	include 'connection.php';

	$viewcat = "SELECT * FROM category";
	return mysqli_query($con,$viewcat);
}

 ?>