<?php
//include the cart controller
require('../controllers/cartcontroller.php');

//include the product controller
require('../controllers/productcontroller.php');

//get post data
$productid = $_POST['ppid'];

//call the function to delete product - takes an id
$del_product = delete_product_fxn($productid);

//check if delete function worked
if ($del_product) 
{
	return true;
}else{
	return false;
}

?>