<?php
//database connection is done in cartclass (this is done to avoid duplicate)

/**
*Product class to handle everything product related
*/
/**
 *@author David Sampah
 */
class product_class extends db_connection
{
	/**
	*method to insert new product 
	*takes the title and price
	*/
	public function add_new_product($a, $b){

		//Write the insert sql
		$sql = "INSERT INTO products (`product_title`,`product_price`) VALUES('$a', '$b')";
		
		//execute the sql and return boolean
		return $this->db_query($sql);
	}

	/**
	*method to view all products 
	*/
	public function view_all_products(){
		//a query to get all products
		$sql = "SELECT * FROM products";

		//execute the query and return boolean
		return $this->db_query($sql);
	}

	/**
	*method to view one product base on id
	*takes product id
	*/
	public function view_one_product($pa){
		//a query to get one product base on id
		$sql = "SELECT * FROM products WHERE product_id=$pa";

		//execute the query and return boolean
		return $this->db_query($sql);
	}

	/**
	*method to search product
	*takes the search term
	*/
	public function search_a_product($sterm){
		//a query to search product matching term
		$sql = "SELECT * FROM products WHERE product_title LIKE '%$sterm%'";

		//execute the query and return boolean
		return $this->db_query($sql);
	}

	/**
	*method to update a product
	*takes the id, title and price
	*/
	public function update_one_product($a, $b, $c){
		//a query to update a product
		$sql = "UPDATE products SET `product_title`='$b', `product_price`='$c' WHERE product_id=$a";
		
		//execute the query and return boolean
		return $this->db_query($sql);
	}

	/**
	*method to delete a product using an id
	*takes the id
	*/
	public function delete_one_product($a){
		//a query to delete product using an id
		$sql = "DELETE from products WHERE product_id=$a";
		
		//execute the query and return boolean
		return $this->db_query($sql);
	}
}

?>