

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_stock_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_uniqid` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





INSERT INTO `cart` (`cart_id`, `item_id`, `cart_qty`, `cart_stock_id`, `user_id`, `cart_uniqid`) VALUES
(10, 7, 1, 1, 1, '6268a664458e9');



CREATE TABLE `expired` (
  `exp_id` int(11) NOT NULL,
  `exp_itemName` varchar(50) NOT NULL,
  `exp_itemPrice` float NOT NULL,
  `exp_itemQty` int(11) NOT NULL,
  `exp_expiredDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;







CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` double NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `item_code` varchar(35) NOT NULL,
  `item_brand` varchar(50) NOT NULL,
  `item_grams` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_type_id`, `item_code`, `item_brand`, `item_grams`) VALUES
(7, 'Gabapentin', 61, 1, '557-11', 'Actavis', '400'),
(8, 'Paracetamol', 1, 1, '59477', 'Senica', '300');







CREATE TABLE `item_type` (
  `item_type_id` int(11) NOT NULL,
  `item_type_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





INSERT INTO `item_type` (`item_type_id`, `item_type_desc`) VALUES
(1, 'Tabletas'),
(2, 'Jarabe');







CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `item_code` varchar(35) NOT NULL,
  `generic_name` varchar(35) NOT NULL,
  `brand` varchar(35) NOT NULL,
  `gram` varchar(35) NOT NULL,
  `type` varchar(35) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `date_sold` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





INSERT INTO `sales` (`sales_id`, `item_code`, `generic_name`, `brand`, `gram`, `type`, `qty`, `price`, `date_sold`) VALUES
(1, '59477', 'Paracetamol', 'Senica', '300', 'Tabletas', 5, 1, '2022-04-19 21:26:24'),
(2, '59477', 'Paracetamol', 'Senica', '300', 'Tabletas', 2, 1, '2022-04-19 21:26:24'),
(3, '59477', 'Paracetamol', 'Senica', '300', 'Tabletas', 2, 1, '2022-04-19 22:21:32'),
(4, '59477', 'Paracetamol', 'Senica', '300', 'Tabletas', 2, 1, '2022-04-19 22:21:32'),
(5, '557-11', 'Gabapentin', 'Actavis', '400', 'Tabletas', 3, 61, '2022-04-25 01:46:50'),
(6, '557-11', 'Gabapentin', 'Actavis', '400', 'Tabletas', 3, 61, '2022-04-25 01:46:50'),
(7, '557-11', 'Gabapentin', 'Actavis', '400', 'Tabletas', 3, 61, '2022-04-25 01:47:53'),
(8, '59477', 'Paracetamol', 'Senica', '300', 'Tabletas', 2, 1, '2022-04-25 01:47:53'),
(9, '59477', 'Paracetamol', 'Senica', '300', 'Tabletas', 2, 1, '2022-04-25 01:47:54'),
(10, '557-11', 'Gabapentin', 'Actavis', '400', 'Tabletas', 3, 61, '2022-04-25 01:47:54'),
(11, '59477', 'Paracetamol', 'Senica', '300', 'Tabletas', 2, 1, '2022-04-25 01:47:54'),
(12, '557-11', 'Gabapentin', 'Actavis', '400', 'Tabletas', 1, 61, '2022-04-25 03:19:46'),
(13, '557-11', 'Gabapentin', 'Actavis', '400', 'Tabletas', 1, 61, '2022-04-25 03:19:46');







CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `stock_expiry` date NOT NULL,
  `stock_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stock_manufactured` date NOT NULL,
  `stock_purchased` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





INSERT INTO `stock` (`stock_id`, `item_id`, `stock_qty`, `stock_expiry`, `stock_added`, `stock_manufactured`, `stock_purchased`) VALUES
(1, 7, 2, '2017-09-15', '2022-04-27 02:19:00', '2017-05-19', '2017-05-20'),
(2, 8, 3, '2022-12-20', '2022-04-25 02:43:49', '2022-04-01', '2022-04-19'),
(3, 8, 1, '2022-09-27', '2022-04-25 01:47:41', '2022-04-01', '2022-04-19'),
(4, 7, 5, '2021-11-03', '2022-04-19 21:31:32', '2020-12-01', '2022-04-19'),
(5, 8, 1, '2022-09-21', '2022-04-21 06:11:38', '2022-01-26', '2022-04-21');







CREATE TABLE `suppliers` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `fax` varchar(200) NOT NULL,
  `info` text NOT NULL,
  `added_date` date NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





INSERT INTO `suppliers` (`id`, `name`, `address`, `telephone`, `fax`, `info`, `added_date`, `delete_status`) VALUES
(1, 'juan perez', 'dualshot@hotmail.com', '+51 985478987', '422208111', 'medicamentos por lotes', '2019-04-02', 0),
(2, 'debbi ssanti', 'debis@hotmail.com', '+51 986762212', '12341556', 'tabletas', '2022-04-20', 0);







CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_account` varchar(50) NOT NULL,
  `user_pass` varchar(35) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





INSERT INTO `user` (`user_id`, `user_account`, `user_pass`, `user_type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'admin2', '21232f297a57a5a743894a0e4a801fc3', 1);








ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);




ALTER TABLE `expired`
  ADD PRIMARY KEY (`exp_id`);




ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_type_id` (`item_type_id`);




ALTER TABLE `item_type`
  ADD PRIMARY KEY (`item_type_id`);




ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);




ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`);




ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);




ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);








ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;




ALTER TABLE `expired`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT;




ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;




ALTER TABLE `item_type`
  MODIFY `item_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;




ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;




ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;




ALTER TABLE `suppliers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;




ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;








ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);




ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_type_id`) REFERENCES `item_type` (`item_type_id`);




ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);
COMMIT;


