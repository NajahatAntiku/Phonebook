<?php
//for header redirection
ob_start();

//start session
session_start();

//clear session - both methods used below are not standard
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

//redirect to login
header('Location: login.php');

?>