<?php
require_once('../database/Database.php');
require_once('../interface/iSales.php');
class Sales extends Database implements iSales {
	public function new_sales($code,$generic,$brand,$gram,$type,$qty,$price)
	{
		$sql = "INSERT INTO sales(item_code,generic_name,brand,gram,type,qty,price)
				VALUES(?,?,?,?,?,?,?);";
		return $this->insertRow($sql, [$code,$generic,$brand,$gram,$type,$qty,$price]);
	}//

	public function daily_sales($date)
	{
		$sql = "SELECT *
				FROM sales
				WHERE DATE(`date_sold`) = ?";
		return $this->getRows($sql, [$date]);
	}//
}//
$sales = new Sales();

