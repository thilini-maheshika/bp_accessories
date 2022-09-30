<?php
if(session_id() == '') {
    session_start();
}

include 'admin/database.php';

if (isset($_GET['function_code']) && $_GET['function_code'] == 'orderAll') {
	orderPlace($_POST);
}

//order
function orderPlace($data){

	$cust_id = $data['cust_id'];
    $shipping_address = $data['address1'];
    $billing_address = $data['address2'];
    $total = $data['total'];

    $order_id = addOrders($cust_id,$shipping_address,$billing_address,$total);
    $getallCart = getAllCart($cust_id);


    while($res = mysqli_fetch_assoc($getallCart)){

		$p_id = $res['p_id'];
		$qnt = $res['qnt'];
		$p_price = $res['p_price'];

		addOrderItems($order_id, $p_id, $qnt, $p_price);
		productQtyReduce($p_id, $qnt); 
	}
	return deleteAllCartItems($cust_id);
}
 


















?>

