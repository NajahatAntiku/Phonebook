<?php
//database connection is done in cartclass (this is done to avoid duplicate)

/**
*Order payment class to handle everything order and payment
*/
/**
 *@author David Sampah
 */
class payorder_class extends db_connection
{
	/**
	*method to insert new order 
	*takes customer id as a parameter
	*within the method, get todays date(use the date('Y-m-d') function), *generate a random number using rand() php function. The random generated *number will serve as invoice number. 
	*set the order status to 'paid'
	*write the insert sql
	*return the database method that returns the just inserted id
	*/
	
	//insert order method code goes here




	/**
	*method to insert new order detail
	*takes order id, product id, customer id and quantity
	*/
	
	//add to order details table code goes here

	


	/**
	*method to insert new payment
	*takes amount, customer id and order id
	*/
	
	//insert payment method goes here
}

?>