<?php
//for header redirection
ob_start();

//start session - needed to capture login information 
session_start(); 

//connnect to the controller
require("../controllers/logincontroller.php");

//admin login
//admin@gmail.com
//pass:12345

//standard login
//standard@gmail.com
//pass:54321

//check if login button was clicked 
if (isset($_POST['ulogin'])) {
	
	//grab form details 
	$lemail = $_POST['umail'];
	$lpass = $_POST['upass'];

	//check if email exist
	$check_login = get_login_fxn($lemail);

	if ($check_login) {
		//email exist, continue to password
		//get password from database
		$hash = $check_login[0]['customer_pass'];

		//verify password
		if (password_verify($lpass, $hash)) 
		{
				//create session for id, role and name
				$_SESSION["user_id"] = $check_login[0]['customer_id'];
				$_SESSION["user_role"] = $check_login[0]['customer_role'];
				$_SESSION["user_name"] = $check_login[0]['customer_name'];

				//redirection to home page
				header('Location: ../index.php');
				
				//to make sure the code below does not execute after redirection use exit
				exit;
		} else 
		{
				//echo appropriate error
			    echo 'incorrect username or password';
		}

	} else{
		//echo appropriate error
		echo "incorrect username or password";
	}
}

?>