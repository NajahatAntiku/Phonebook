<?php
//connect to database class
require("../settings/db_class.php");

/**
*Login class to handle everything login related
*/
/**
 *@author David Sampah
 */
class login_class extends db_connection
{
	/**
	*metho to verify login
	*takes emal 
	*/
	public function verify_login($e){
		//a query to get all login information base on email
		$sql = "SELECT * FROM customer WHERE customer_email='$e'";

		//execute the query and return boolean
		return $this->db_query($sql);
	}
}

?>