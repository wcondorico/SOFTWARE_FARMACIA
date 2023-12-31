<?php 
//
require_once('../class/Expired.php');
require_once('../class/Stock.php');
if(isset($_POST['stock_id'])){
	$stock_id = $_POST['stock_id'];

	//
	//
	$stockDetail = $stock->get_stockList($stock_id);
	$name = $stockDetail['item_name'];
	$price = $stockDetail['item_price'];
	$qty = $stockDetail['stock_qty'];
	$expiredDate = $stockDetail['stock_expiry'];

	$saveToExpired = $expired->add_expired($name, $price, $qty, $expiredDate);
	$delStock =	$stock->del_stockList($stock_id);
	$return['valid'] = false;
	if($delStock && $saveToExpired){
		$return['valid'] = true;
		$return['msg'] = "Eliminado correctamente!";
	}
	echo json_encode($return);
}//

$expired->Disconnect();//
