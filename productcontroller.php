<?php
//connection to the product class is done in the cart controller. to avoid duplicate

//insert product function. takes title and price
function insert_product_fxn($a, $b){
	//create an instance of product class
	$newprod_object = new product_class();
	
	//run the add product method
	$insertprod = $newprod_object->add_new_product($a, $b);

	//check if method worked
	if ($insertprod) {

		//return query result (boolean)
		return $insertprod;

	}else{

		return false;
	}
}

//search product function - takes the search term
function search_product_fxn($stm){
	//Create an array variable to hold list of search records
	$product_array = array();

	//create an instance of the product class
	$product_object = new product_class();

	//run the search product method
	$product_records = $product_object->search_a_product($stm);

	//check if the method worked
	if ($product_records) {
		
		//loop to see if there is more than one result
		//fetch one at a time
		while ($one_record = $product_object->db_fetch()) {
			
			//Assign each result to the array
			$product_array[] = $one_record;
		}
	}
	//return the array
	return $product_array;
}

//view all product function
function view_all_product_fxn(){
	//Create an array variable to hold list of products
	$product_array = array();

	//create an instance of the product class
	$product_object = new product_class();

	//run the view all product method
	$product_records = $product_object->view_all_products();

	//check if the method worked
	if ($product_records) {
		
		//loop to see if there is more than one result
		//fetch one at a time
		while ($one_record = $product_object->db_fetch()) {
			//Assign each result to the array
			$product_array[] = $one_record;
		}
	}
	//return the array
	return $product_array;
}

//view one product function - takes the id
function view_one_product_fxn($pin){
	//Create an array variable to the product key value pair
	$product_array = array();

	//create an instance of the product class
	$product_object = new product_class();

	//run the view one product method
	$product_record = $product_object->view_one_product($pin);

	//check if the method worked
	if ($product_record) {
		
		//fetch the result
		$one_record = $product_object->db_fetch();
		//assign to array
		$product_array[] = $one_record;
	}
	//return array
	return $product_array;
}

//update a product function - takes id, title and price
function update_product_fxn($a, $b, $c){
	//create an instance of the product class
	$product_object = new product_class();

	//run the update one product method
	$update_product = $product_object->update_one_product($a, $b, $c);

	//check if method worked
	if ($update_product) {
		
		//return query result (boolean)
		return $update_product;
	}else{
		//return false
		return false;
	}
}

//delete a product function - takes the id
function delete_product_fxn($a){
	//create an instance of the product class
	$product_object = new product_class();

	//run the delete one product method
	$delete_product = $product_object->delete_one_product($a);

	//check if method worked
	if ($delete_product) {
	
		//return query result (boolean)
		return $delete_product;
	}else{
		//return false
		return false;
	}
}
?>