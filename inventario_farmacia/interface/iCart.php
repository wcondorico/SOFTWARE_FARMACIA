<?php 
interface iCart{
	public function add_toCart($item_id, $qty, $stock_id, $user_id, $uniqid);
	public function all_cartDatas($user_id);
	public function delCart($cart_id);
	public function dellAllCart();
	public function allCart();
}