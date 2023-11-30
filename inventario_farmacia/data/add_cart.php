<?php 
require_once('../class/Cart.php');
require_once('../class/Stock.php');
if(isset($_POST['stock_id'])){
	$stock_id = $_POST['stock_id'];
	$item_id = $_POST['item_id'];
	$cqty = $_POST['cqty'];//
	$user_id = $_SESSION['logged_id'];
	$nqty = $_POST['nqty'];//
	$uniqid = $_SESSION['uniqid'];
	//
	$saveToCart = $cart->add_toCart($item_id, $cqty, $stock_id, $user_id, $uniqid);

	//
	$updateStockQty = $stock->update_stockQty($stock_id, $nqty);

}//
$cart->Disconnect();