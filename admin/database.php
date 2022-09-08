<?php 

if (isset($_GET['function_code']) && $_GET['function_code'] == 'categoryAdd') {
    addCategory($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'categoryDelete') {
    deleteCategory($_POST);
} 

function checkCatNamebyName($cat_name){
	include 'connection.php';

	$q1= "SELECT * FROM category WHERE cat_name='$cat_name'";
	$catName_check = mysqli_query($con,$q1);
	return mysqli_num_rows($catName_check);
}

function getAllCategory(){
	include 'connection.php';

	$viewcat = "SELECT * FROM category WHERE is_deleted='0'";
	return mysqli_query($con,$viewcat);
}

function addCategory($data)
{
	include 'connection.php';

	$cat_name = $data['cat_name'];
	$cat_des = $data['cat_des'];

	$count= checkCatNamebyName($cat_name);
	echo json_encode($count);

	if($count > 0){
		
	}else{

		$img = $_FILES['file']['name'];
		$target_dir = "upload/category/";
		$target_file = $target_dir . basename($img);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif","jfif");
		move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img);
		
		if (in_array($imageFileType,$extensions_arr)) {
			$sql = "INSERT INTO category(cat_name,cat_des,cat_img, is_deleted,date_updated) VALUES('$cat_name','$cat_des', '$img', 0 , now())";
			return mysqli_query($con, $sql);
		}
	}
	
}
function deleteCategory($data){

	include 'connection.php';

	$cat_id = $data['cat_id'];

	$delcat="UPDATE category SET is_deleted = 1 , date_updated = now() WHERE cat_id=$cat_id";
	return mysqli_query($con,$delcat);
}
 ?>