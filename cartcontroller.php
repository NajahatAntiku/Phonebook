<?php
//connect to the cart class, product class and orderpayment class
//this is done to avoid duplicate
//also the cart in needed on every page to show total cart count
require("../classes/cartclass.php");
require("../classes/productclass.php");
require("../classes/orderpaymentclass.php");

//add to cart function. takes product id and customer id
function add_to_cart_fxn($a, $b){
	//create an instance of cart class
	$newcart_object = new cart_class();
	
	//run the add to cart method
	$addcart = $newcart_object->add_to_cart($a, $b);
	if ($addcart) {
		//return query result (boolean)
		return $addcart;
	}else{
		return false;
	}
}

//check cart duplicate function. takes product id and customer id
function check_duplicate_fxn($a, $b){
	//create an instance of cart class
	$newcart_object = new cart_class();
	
	//run duplicate cart method giving it the two id's
	$checkcart = $newcart_object->check_cart_duplicate($a, $b);
	if ($checkcart) 
	{
		//run the number of rows method
		$checkrows = $newcart_object->db_count();

		//check if any record was returned
		if ($checkrows >= 1) {
			return true;
		}else{
			return false;
		}

	}
}

//count cart function - takes customer id
//count the cart item of a customer
function count_cart_fxn($a){
	
	//create an instance of the cart class
	$cart_object = new cart_class();

	//run the view cart method
	$card_records = $cart_object->view_cart_item($a);

	//check if the method worked
	if ($card_records) {
		
		//return count
		return $cart_object->db_count();
	}else{
		return false;
	}

}

//view cart function - takes the customer id
function view_all_cart_fxn($pin){
	//Create an array variable to hold list of cart items
	$cart_array = array();

	//create an instance of the cart class
	$cart_object = new cart_class();

	//run the view cart method
	$cart_record = $cart_object->view_cart_item($pin);

	//check if the method worked
	if ($cart_record) {

		//loop to see if there is more than one result
		//fetch one at a time
		while ($one_record = $cart_object->db_fetch()) {
			//Assign each result to the array
			$cart_array[] = $one_record;
		}
	}
	//return array
	return $cart_array;
}

//update a cart item function - takes product id, customer id and quantity
function update_cart_fxn($a, $b, $c){
	//create an instance of the cart class
	$cart_object = new cart_class();

	//run the update one cart method
	$update_cart = $cart_object->update_cart_quantity($a, $b, $c);

	//check if method worked
	if ($update_cart) {
		
		//return query result (boolean)
		return $update_cart;
	}else{
		//return false
		return false;
	}
}

//delete one cart item function - takes the product id and customer id
function delete_cart_fxn($a, $b){
	//create an instance of the cart class
	$cart_object = new cart_class();

	//run the delete one cart method
	$delete_cart = $cart_object->delete_cart_item($a, $b);

	//check if method worked
	if ($delete_cart) {
	
		//return query result (boolean)
		return $delete_cart;
	}else{
		//return false
		return false;
	}
}

//delete all cart item for a customer function - takes the customer id
function delete_all_cart_fxn($a){
	//create an instance of the cart class
	$cart_object = new cart_class();

	//run the delete all cart method
	$delete_cart = $cart_object->delete_all_cart_item($a);

	//check if method worked
	if ($delete_cart) {
	
		//return query result (boolean)
		return $delete_cart;
	}else{
		//return false
		return false;
	}
}
?>