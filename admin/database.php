<?php 
	session_start();
	
if (isset($_GET['function_code']) && $_GET['function_code'] == 'categoryAdd') {
    addCategory($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'categoryDelete') {
    deleteCategory($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'categoryEdit') {
    editCategory($_POST);
} else if (isset($_GET['function_code']) && $_GET['function_code'] == 'categoryImageEdit') {
    editCategoryImage($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'modelAdd') {
    addModel($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'modelDelete') {
    deleteModel($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'modelEdit') {
    editModel($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'modelImageEdit') {
    editModelImage($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'ProductAdd') {
    addProduct($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'proDelete') {
    deleteProduct($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'productEdit') {
    editProduct($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'productImageEdit') {
    editProductImage($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'galleryImageAdd') {
    addGallery($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'galleryDelete') {
    deleteGallery($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'loginAdmin') {
    adminLogin($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'updateSettings') {
    SettingsUpdate($_POST);
}

//settings

function getAllSettings(){

	include 'connection.php';

	$setting = "SELECT * FROM settings";
	return mysqli_query($con,$setting);

}

function SettingsUpdate($data){

	include 'connection.php';

	$field = $data['field'];
    $value = $data['value']; 

	$setup = "UPDATE settings SET $field = '$value' ";
	return mysqli_query($con,$setup);

}


//login

function adminLogin($data){

	include 'connection.php';

		$uname=$data['email'];
		$password=$data['password'];

	$q1= "SELECT * FROM customers WHERE cust_email='$uname' AND cust_password='$password' ";
	$login = mysqli_query($con,$q1);
	$count = mysqli_num_rows($login);

	if($count > 0){
		if($uname == 'admin'){
			$_SESSION['admin'] = $uname ;
		}
	}
	echo $count;


}	

//Category

function checkCatNamebyName($cat_name){
	include 'connection.php';

	$q1= "SELECT * FROM category WHERE cat_name='$cat_name' AND is_deleted='0'";
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

	$count = checkCatNamebyName($cat_name);
	

	if(	$count == 0){

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

	}else{
		echo json_encode($count);
	}
	
}

function deleteCategory($data){

	include 'connection.php';

	$cat_id = $data['cat_id'];

	$delcat="UPDATE category SET is_deleted = 1 , date_updated = now() WHERE cat_id=$cat_id";
	return mysqli_query($con,$delcat);
}

function editCategory($data){  

	include 'connection.php'; 

	$cat_id = $data['cat_id'];
    $field = $data['field'];
    $value = $data['value']; 

		
	$sql1 = "UPDATE category SET $field='$value' , date_updated = now()  WHERE cat_id='$cat_id'";
	return mysqli_query($con, $sql1);

}

function editCategoryImage($data){
	
	$cat_id=$data['cat_id'];

	include 'connection.php'; 

	$img = $_FILES['file']['name'];
		$target_dir = "upload/category/";
		$target_file = $target_dir . basename($img);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif","jfif");
		move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img);

		if (in_array($imageFileType,$extensions_arr)) {
			$sql = "UPDATE category SET cat_img='$img' , date_updated = now()  WHERE cat_id='$cat_id'";
			return mysqli_query($con, $sql);
		}

}


function getAllCategorybyID($cat_id){

	include 'connection.php';

	$viewcat = "SELECT * FROM category WHERE cat_id='$cat_id' AND is_deleted='0'";
	return mysqli_query($con,$viewcat);

}


// Model //

function getAllModelbyID($mod_id){

	include 'connection.php';

	$viewmod = "SELECT * FROM model WHERE mod_id='$mod_id' AND is_deleted='0'";
	return mysqli_query($con,$viewmod);

}

function checkModNamebyName($mod_name){
	include 'connection.php';

	$q1= "SELECT * FROM model WHERE mod_name='$mod_name' AND is_deleted='0'";
	$modName_check = mysqli_query($con,$q1);
	return mysqli_num_rows($modName_check);
}

function getAllModel(){
	include 'connection.php';

	$viewcat = "SELECT * FROM model WHERE is_deleted='0'";
	return mysqli_query($con,$viewcat);
}


function addModel($data)
{
	include 'connection.php';

	$mod_name = $data['mod_name'];

	$count = checkModNamebyName($mod_name);
	

	if(	$count == 0){

		$img = $_FILES['file']['name'];
		$target_dir = "upload/model/";
		$target_file = $target_dir . basename($img);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif","jfif");
		move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img);
	
		if (in_array($imageFileType,$extensions_arr)) {
			$sql = "INSERT INTO model(mod_name,mod_img, is_deleted,date_updated) VALUES('$mod_name', '$img', 0 , now())";
			return mysqli_query($con, $sql);
		}

	}else{
		echo json_encode($count);
	}
	
}

function deleteModel($data){

	include 'connection.php';

	$mod_id = $data['mod_id'];

	$delmod="UPDATE model SET is_deleted = 1 , date_updated = now() WHERE mod_id=$mod_id";
	return mysqli_query($con,$delmod);
}

function editModel($data){

	include 'connection.php'; 

	$mod_id = $data['mod_id'];
    $field = $data['field'];
    $value = $data['value']; 

		
	$sql1 = "UPDATE model SET $field='$value' , date_updated = now()  WHERE mod_id='$mod_id'";
	return mysqli_query($con, $sql1);

}


function editModelImage($data){

	$mod_id=$data['mod_id'];

	include 'connection.php'; 

	$img = $_FILES['file']['name'];
		$target_dir = "upload/model/";
		$target_file = $target_dir . basename($img);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif","jfif");
		move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img);

		if (in_array($imageFileType,$extensions_arr)) {
			$sql = "UPDATE model SET mod_img='$img' , date_updated = now()  WHERE mod_id='$mod_id'";
			return mysqli_query($con, $sql);
		}
}

//products

function checkProductNamebyName($p_name){
	include 'connection.php';

	$q1= "SELECT * FROM products WHERE p_name='$p_name' AND is_deleted='0'";
	$proName_check = mysqli_query($con,$q1);
	return mysqli_num_rows($proName_check);
}


function getAllProductsByJoin(){

	include 'connection.php';

	$viewpro = "SELECT * FROM products JOIN category ON products.cat_id = category.cat_id JOIN model ON products.model = model.mod_id WHERE products.is_deleted='0'";
	return mysqli_query($con,$viewpro);

}

function getAllProducts(){

	include 'connection.php';

	$viewpro = "SELECT * FROM products WHERE is_deleted='0'";
	return mysqli_query($con,$viewpro);

}

function addProduct($data){

	include 'connection.php';

	$p_name = $data['p_name'];
	$p_des = $data['p_des'];
	$cat_name = $data['cat_name'];
	$brand = $data['brand'];
	$p_price = $data['p_price'];
	$p_qnt = $data['p_qnt'];
	$p_waranty = $data['p_wrnt'];
	$p_active = $data['product_active'];

	$count = checkProductNamebyName($p_name);
	

	if(	$count == 0){

		$img = $_FILES['file']['name'];
		$target_dir = "upload/products/";
		$target_file = $target_dir . basename($img);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif","jfif");
		move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img);
	
		if (in_array($imageFileType,$extensions_arr)) {
			$sql = "INSERT INTO products(cat_id,p_name,p_des,model,p_img,p_price,p_qnt,p_waranty,p_active,is_deleted,date_updated) VALUES('$cat_name','$p_name','$p_des',$brand ,'$img','$p_price','$p_qnt','$p_waranty','$p_active', 0 , now())";
			return mysqli_query($con, $sql);
		}

	}else{
		echo json_encode($count);
	}
}

function deleteProduct($data){

	include 'connection.php';
	
	$p_id = $data['p_id'];
	
	$delpro="UPDATE products SET is_deleted = 1 , date_updated = now() WHERE p_id=$p_id";
	return mysqli_query($con,$delpro);
}

function getAllProductsbyID($p_id){

	include 'connection.php';

	$viewPro = "SELECT * FROM products WHERE p_id='$p_id' AND is_deleted='0'";
	return mysqli_query($con,$viewPro);
}

function editProduct($data){

	include 'connection.php'; 

	$p_id = $data['p_id'];
    $field = $data['field'];
    $value = $data['value']; 

		
	$sql1 = "UPDATE products SET $field='$value' , date_updated = now()  WHERE p_id='$p_id'";
	return mysqli_query($con, $sql1);

}

function editProductImage($data){

	$p_id=$data['p_id'];

	include 'connection.php'; 

	$img = $_FILES['file']['name'];
		$target_dir = "upload/products/";
		$target_file = $target_dir . basename($img);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif","jfif");
		move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img);

		if (in_array($imageFileType,$extensions_arr)) {
			$sql = "UPDATE products SET p_img='$img' , date_updated = now()  WHERE p_id='$p_id'";
			return mysqli_query($con, $sql);
		}
}

//gallery

function addGallery($data){

	include 'connection.php';

	$title = $data['title'];

		$img = $_FILES['file']['name'];
		$target_dir = "upload/gallery/";
		$target_file = $target_dir . basename($img);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif","jfif");
		move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img);
	
		if (in_array($imageFileType,$extensions_arr)) {
			$sql = "INSERT INTO gallery(title,g_img) VALUES('$title','$img')";
			return mysqli_query($con, $sql);
		}
}

function getAllGalleryImages(){

	include 'connection.php';

	$viewimg = "SELECT * FROM gallery";
	return mysqli_query($con,$viewimg);

}

function deleteGallery($data){

	include 'connection.php';
	
	$g_id = $data['g_id'];
	
	$delimg="DELETE FROM gallery WHERE g_id=$g_id ";
	return mysqli_query($con,$delimg);
}

 ?>
