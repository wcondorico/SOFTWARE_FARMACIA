<?php 
require_once('../class/Stock.php');
require_once('../class/Cart.php');
if(isset($_POST['stock_id'])){
	$stock_id = $_POST['stock_id'];
	$cart_id = $_POST['cart_id'];
	$qty = $_POST['qty'];

	//
	$cqty = $stock->get_stockQty($stock_id);
	$currentQty = $cqty['stock_qty'];
	$qty += $currentQty;
	//
	$stock->update_stockQty($stock_id, $qty);
	//
	$deleteCart = $cart->delCart($cart_id);
}//

$stock->Disconnect();