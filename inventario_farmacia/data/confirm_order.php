<?php 
require_once('../class/Cart.php');
require_once('../class/Sales.php');
if(isset($_POST['click'])){
	if($_POST['click'] == 'yes'){
		//
		$cartDetails = $cart->allCart();

		foreach ($cartDetails as $cd) {
			$code = $cd['item_code'];
			$generic = $cd['item_name'];
			$brand = $cd['item_brand'];
			$gram = $cd['item_grams'];
			$type = $cd['item_type_desc'];
			$cartQty = $cd['cart_qty'];
			$price = $cd['item_price'];

			$insertSale = $sales->new_sales($code,$generic,$brand,$gram,$type,$cartQty,$price);
			//
		}//

		//
		$delAllCart = $cart->dellAllCart();
		$return['valid'] = false;
		if($delAllCart){
			$return['valid'] = true;
			$return['msg'] = 'La transacción se agregó correctamente!';
		}
		echo json_encode($return);
	}//
}//