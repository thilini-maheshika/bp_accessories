<?php 
	if(session_id() == '') {
		session_start();
	}
	
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
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'updateSettingsImage') {
    SettingsImageUpdate($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'regcustomer') {
    RegisterCustomer($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'contactmsg') {
    ContactFormMessage($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'msgnotify') {
    MessageNotification($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'msgDelete') {
	DeleteContactMsg($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'CustomerEdit') {
	 EditCustomer($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'checkPass') {
	PasswordCheckCust($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'emailCheck') {
	EmailCheckCust($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'customerDelete') {
	DeleteCustomer($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'profileImageEdit') {
	editProfileImage($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'cartItemDelete') {
	deleteCartItems($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'qntEdit') {
	editQuantity($_POST);
}

//order
function addOrders($cust_id, $shipping_address, $billing_address, $total){

	include 'connection.php';

	$sql = "INSERT INTO order_products(cust_id, total, shipping_address, billing_address, is_deleted, order_status, tracking_status, date_updated) VALUES('$cust_id', '$total', '$shipping_address', '$billing_address', 0 , 1 , 'Pending' , now())";
	$res =  mysqli_query($con, $sql);
	return mysqli_insert_id($con);

}

function addOrderItems($order_id,$p_id,$qnt,$p_price){

	include 'connection.php';

	$sql = "INSERT INTO order_items(order_id, p_id, qnt, p_price) VALUES('$order_id', '$p_id', '$qnt', '$p_price')";
	return mysqli_query($con, $sql);
}

function productQtyReduce($p_id, $qnt)
{
    include 'connection.php';

	$getProducts = "SELECT * FROM products WHERE p_id = '$p_id'";
	$res =  mysqli_query($con, $getProducts);
	$row = mysqli_fetch_assoc($res);

	$value = $row['p_qnt'] - $qnt;

    $sql = "UPDATE products SET p_qnt = '$value', date_updated = now() WHERE p_id = $p_id";
    return mysqli_query($con, $sql);	
}

function getAllOrdersByCustID($cust_id){

	include 'connection.php';

	$getord = "SELECT * FROM order_products WHERE cust_id = '$cust_id' AND is_deleted = '0' ORDER BY date_updated DESC";
	return mysqli_query($con,$getord);
}

function getAllOrderItemsBYOrder($order_id){
	include 'connection.php';

	$viewcat = "SELECT * FROM order_items join products on order_items.p_id = products.p_id WHERE order_items.order_id = '$order_id'";
	return mysqli_query($con,$viewcat);
}

//cart

function addtoCart($p_id, $customer, $p_price, $qnt){

	include 'connection.php';

	$cart = "INSERT INTO cart(p_id, cust_id, p_price, qnt, date_updated) VALUES('$p_id', '$customer', '$p_price', '$qnt', now())";
	$getcart= mysqli_query($con, $cart);
	$res= mysqli_insert_id($con);
	echo json_encode($res);
}

function getAllProductsByCart($cart_id){

	include 'connection.php';

	$cart = "SELECT * FROM cart join products on products.p_id = cart.p_id  WHERE cart.cart_id='$cart_id'";
	return mysqli_query($con,$cart);

}

function deleteCartItems($data){

	include 'connection.php';

	$cart_id=$data['cart_id'];

	$cart = "DELETE FROM cart where cart_id = $cart_id";
    return mysqli_query($con, $cart);
}

function deleteAllCartItems($cust_id){

	include 'connection.php';

	$cart = "DELETE FROM cart where cust_id = $cust_id"; 
    return mysqli_query($con, $cart);
}

function getAllCartItems(){

	include 'connection.php';

	$sql = "SELECT * FROM cart ";
	return mysqli_query($con,$sql);
}

function getAllCart($customer_id){

	include 'connection.php';

	$q1= "SELECT * FROM cart join products on products.p_id = cart.p_id join customers on customers.cust_id = cart.cust_id WHERE cart.cust_id='$customer_id'";
	return mysqli_query($con,$q1);
}

function getCartCount($customer_id){
	include 'connection.php';

	$q1= "SELECT * FROM cart WHERE cust_id='$customer_id'";
	$cartcount = mysqli_query($con,$q1);
	return mysqli_num_rows($cartcount);
}

function editQuantity($data){

	include 'connection.php';

	$cart_id = $data['cart_id'];
	$field = $data['field'];
    $value = $data['value']; 

	$qty= "UPDATE cart SET $field = '$value' , date_updated = now() WHERE cart_id = $cart_id ";
	return mysqli_query($con,$qty);

}

//Contact form

function ContactFormMessage($data){
	include 'connection.php';

	$name = $data['name'];
	$email = $data['email'];
	$phone = $data['phone'];
	$message = $data['message'];

	$sql = "INSERT INTO contactform(contact_name,contact_email,contact_phone,contact_msg,status,date_updated) 
	VALUES('$name','$email','$phone','$message', 0 ,now())";
	return mysqli_query($con, $sql);
		
}

function DeleteContactMsg($data){

	include 'connection.php';
	
	$contact_id = $data['contact_id'];
	
	$delpro="DELETE FROM contactform WHERE contact_id='$contact_id' ";
	return mysqli_query($con,$delpro);
}

function getAllMessages(){

	include 'connection.php';

	$msg = "SELECT * FROM contactform ";
	return mysqli_query($con,$msg);
}

function getAllMessagesByBell(){

	include 'connection.php';

	$msg = "SELECT * FROM contactform WHERE status='0'";
	return mysqli_query($con,$msg);
}

function MessageNotification(){

	include 'connection.php';

	$msg="UPDATE contactform SET status='1' WHERE status='0'";
	return mysqli_query($con,$msg);
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

function SettingsImageUpdate($data){

	include 'connection.php'; 

	$image = $_FILES['file']['name'];
	$field = $data['field'];

		$img = $_FILES['file']['name'];
		$target_dir = "upload/setting_img/";
		$target_file = $target_dir . basename($img);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif","jfif");
		move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img);

		if (in_array($imageFileType,$extensions_arr)) {
			$sql = "UPDATE settings SET $field = '$image'";
			return mysqli_query($con, $sql);
		}
}
 
//profile settings
function DeleteCustomer($data){

	include 'connection.php';

	$cust_id = $data['cust_id'];

	deleteCartItems($cust_id);

	$sql1 = "UPDATE customers SET is_deleted = '1' WHERE cust_id = $cust_id";
    return mysqli_query($con, $sql1);
}


function EditCustomer($data){
	include 'connection.php';

	$cust_id = $data['cust_id'];
	$field = $data['field'];
	$value = $data['value'];

	 $sql1 = "UPDATE customers SET $field = '$value' WHERE cust_id = $cust_id";
     return mysqli_query($con, $sql1);

}

function PasswordCheckCust($data){
	include 'connection.php';

	$cust_id = $data['cust_id'];
	$cust_password = $data['cust_password'];

	$q1 = "SELECT * FROM customers WHERE cust_id = '$cust_id' AND cust_password='$cust_password' AND is_deleted='0'";
	$check = mysqli_query($con,$q1);
	$count= mysqli_num_rows($check);

	echo json_encode($count);
}

function EmailCheckCust($data){
	include 'connection.php';

	$cust_id = $data['cust_id'];
	$cust_email = $data['cust_email'];

	$q1 = "SELECT * FROM customers WHERE cust_id = '$cust_id' AND cust_email='$cust_email' AND is_deleted='0'";
	$check = mysqli_query($con,$q1);
	$count= mysqli_num_rows($check);

	echo json_encode($count);
}

function editProfileImage($data){

	$cust_id = $data['cust_id'];
	$field = $data['field'];
	$image = $_FILES['file']['name'];

	include 'connection.php'; 

		$target_dir = "auth/upload/";
		$target_file = $target_dir . basename($img);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif","jfif");
		move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$img);

		if (in_array($imageFileType,$extensions_arr)) {
			$sql = "UPDATE customers SET $field = '$image' WHERE cust_id = $cust_id";
			return mysqli_query($con, $sql);
		}
}

//customer register

function checkCustByEmail($email){
	include 'connection.php';

	$q1 = "SELECT * FROM customers WHERE cust_email='$email' AND is_deleted='0'";
	$catName_check = mysqli_query($con,$q1);
	return mysqli_num_rows($catName_check);
}

function checkCustomerByID($cust_id){
	include 'connection.php';

	$q2 = "SELECT * FROM customers WHERE cust_id='$cust_id' AND is_deleted='0'";
	return mysqli_query($con,$q2);
}

function RegisterCustomer($data){

	include 'connection.php';

	$custname = $data['custname'];
	$email = $data['email'];
	$phone = $data['phone'];
	$address = $data['address'];
	$nic = $data['nic'];
	$password = $data['pass'];

	$count = checkCustByEmail($email);

	if($count == 0){
		$sql = "INSERT INTO customers(cust_name, cust_email, cust_phone, cust_address, cust_nic, cust_img, cust_password, is_deleted, date_updated) 
		VALUES('$custname', '$email', '$phone', '$address', '$nic' , NULL, '$password', 0 , now())";
		return mysqli_query($con, $sql);
	}else{
		echo json_encode($count);
	}
	
}

function getAllCustomers(){

	include 'connection.php';

	$customer = "SELECT * FROM customers WHERE is_deleted='0'";
	return mysqli_query($con,$customer);
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
			}else{
				$q1 = "SELECT * FROM customers WHERE cust_email='$uname' AND is_deleted='0'";
				$custname = mysqli_query($con,$q1);
        		$row = mysqli_fetch_assoc($custname);

				$_SESSION['customer'] = $row['cust_id'] ;
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

function getCategoryByLimit(){
	include 'connection.php';

	$fetchcat = "SELECT * FROM category WHERE is_deleted='0' LIMIT 5 ";
	return mysqli_query($con,$fetchcat);
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

function featuredProducts(){

	include 'connection.php';

	$viewcat = "SELECT * FROM products join category on category.cat_id = products.cat_id WHERE products.is_deleted = 0 AND products.p_active = '1' ORDER BY products.date_updated DESC ";
	return mysqli_query($con,$viewcat);
}


// Model //

function getAllModelbyID($mod_id){

	include 'connection.php';

	$viewmod = "SELECT * FROM model WHERE mod_id='$mod_id' AND is_deleted='0'";
	return mysqli_query($con,$viewmod);

}

function getAllModelByCategory($cat_id){

	include 'connection.php';

	$viewmod = "SELECT * FROM model JOIN category ON model.mod_id = '$cat_id ' WHERE products.is_deleted = 0 AND products.p_active = '1' ";
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

	$viewjoin = "SELECT * FROM products JOIN category ON products.cat_id = category.cat_id JOIN model ON products.model = model.mod_id WHERE products.is_deleted='0' AND products.p_active='1' GROUP BY category.cat_name";
	return mysqli_query($con,$viewjoin);

}

function getProductsByModel($mod_id){

	include 'connection.php';

	$viewcat = "SELECT * FROM products WHERE model='$mod_id' AND  products.is_deleted = 0 
	AND products.p_active = '1' ";
	return mysqli_query($con,$viewcat);
}

function getProductsByOrderASC(){

	include 'connection.php';

	$viewcat = "SELECT * FROM products WHERE products.is_deleted = 0 
	AND products.p_active = '1' ORDER BY p_name ASC ";
	return mysqli_query($con,$viewcat);
}

function getProductsByOrderPrice(){

	include 'connection.php';

	$viewcat = "SELECT * FROM products WHERE products.is_deleted = 0 
	AND products.p_active = '1' ORDER BY p_price ASC ";
	return mysqli_query($con,$viewcat);
}

function getProductsbycatID($cat_id){

	include 'connection.php';

	$viewcat = "SELECT * FROM products WHERE cat_id='$cat_id' AND  products.is_deleted = 0 
	AND products.p_active = '1' ";
	return mysqli_query($con,$viewcat);
}

function getAllProducts(){

	include 'connection.php';

	$viewpro = "SELECT * FROM products WHERE is_deleted='0' AND products.p_active='1' ";
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
	
	$delpro="UPDATE products SET is_deleted = 1  WHERE p_id=$p_id";
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

		
	$sql1 = "UPDATE products SET $field='$value' WHERE p_id='$p_id'";
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
			$sql = "UPDATE products SET p_img='$img'  WHERE p_id='$p_id'";
			return mysqli_query($con, $sql);
		}
}

function chooseNewProducts($p_id){

	include 'connection.php'; 

	$NewDate=Date('y:m:d', strtotime('-7 days'));

	$sql1 = "SELECT * FROM products WHERE p_id= '$p_id' AND NOT(date_updated < '$NewDate'  OR date_updated >  now()) ";
	return mysqli_query($con, $sql1);

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


//search 

function searchfunc($key){
	include 'connection.php';

	$search = "SELECT * FROM products JOIN category ON products.cat_id = category.cat_id JOIN model ON products.model = model.mod_id WHERE (products.p_name LIKE '%".$key."%' OR category.cat_name LIKE '%".$key."%' OR model.mod_name LIKE '%".$key."%') AND products.is_deleted='0' AND products.p_active='1' ";



	// $search = "SELECT * FROM products WHERE p_name LIKE '%".$key."%' AND AND is_deleted='0' AND p_active = '1'";
	return mysqli_query($con,$search);
}

 ?>
