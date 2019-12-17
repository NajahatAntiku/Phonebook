<?php
//connect to database class
require("../settings/db_class.php");

/**
*Cart class to handle everything cart related
*/
/**
 *@author David Sampah
 *
 */
class cart_class extends db_connection
{
	/**
	*method to add to cart  
	*takes the product id and customer id
	*quantity is predefined as 1
	*/
	public function add_to_cart($a, $b){

		//Write the insert sql
		$sql = "INSERT INTO cart (`p_id`,`c_id`,`qty`) VALUES('$a', '$b', '1')";
		
		//execute the sql and return boolean
		return $this->db_query($sql);
	}

	/**
	*method to view cart item for a particular customer
	*takes customer id
	*/
	public function view_cart_item($a){
		//a query to get cart items
		$sql = "SELECT * FROM cart WHERE c_id='$a'";

		//execute the query and return boolean
		return $this->db_query($sql);
	}

	/**
	*method to check cart duplicate
	*takes customer id and product id
	*/
	public function check_cart_duplicate($a, $b){
		//a query to get cart items base the two id
		$sql = "SELECT * FROM cart WHERE p_id=$a AND c_id='$b'";

		//execute the query and return boolean
		return $this->db_query($sql);
	}

	/**
	*method to update cart quantity
	*takes product id, customer id and quantity
	*/
	public function update_cart_quantity($a, $b, $c){
		//a query to update a cart quantity
		$sql = "UPDATE cart SET `qty`='$c' WHERE p_id=$a AND c_id='$b'";
		
		//execute the query and return boolean
		return $this->db_query($sql);
	}

	/**
	*method to delete a cart item
	*takes product id, and customer id
	*/
	public function delete_cart_item($a, $b){
		//a query to delete a cart item base on both id
		$sql = "DELETE from cart WHERE p_id=$a AND c_id='$b'";
		
		//execute the query and return boolean
		return $this->db_query($sql);
	}

	/**
	*method to delete all cart item of a customer
	*takes customer id
	*/
	public function delete_all_cart_item($a){
		//a query to delete all cart item base on id
		$sql = "DELETE from cart WHERE c_id='$a'";
		
		//execute the query and return boolean
		return $this->db_query($sql);
	}

}

?>