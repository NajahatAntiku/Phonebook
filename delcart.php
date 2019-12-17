<?php
//connect to the core file for general configuration
require("../settings/core.php");

//include the cart controller
require('../controllers/cartcontroller.php');

//get customer id
$customer_id = get_customer_id();

//get post data
$productid = $_POST['ppid'];


//call the function to delete from car - takes an id and ip
$del_cart = delete_cart_fxn($productid, $customer_id);

//check if delete cart worked
if ($del_cart) {
	return true;
}else{
	return false;
}



?>