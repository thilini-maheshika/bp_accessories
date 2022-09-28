<?php
if(session_id() == '') {
    session_start();
}
include '../admin/database.php';

if (isset($_REQUEST['p_id']) && isset($_REQUEST['p_price']) && isset($_SESSION['customer'])) {

    $qnt;

    if (isset($_REQUEST['qnt'])) {
        $qnt = $_REQUEST['qnt'];
    }
    else {
        $qnt = 1;
    }

    $p_id = $_REQUEST['p_id'];
    $p_price = $_REQUEST['p_price'];
    $customer = $_SESSION['customer'];

    return addtoCart($p_id, $customer, $p_price, $qnt);

}else{
    echo json_encode("Fail");
}

?>