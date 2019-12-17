<?php
//connect to the core file for general configuration
require("../settings/core.php");

//include the controller
require('../controllers/cartcontroller.php');

//include the product controller
//require('../controllers/productcontroller.php');

//include the payment order controller
require('../controllers/payordercontroller.php');

//check for login
check_login();

//get customer id
$customer_id = get_customer_id();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
	<meta charset="utf-8">
	<!--CDN Bootstrap and Jquery-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="../js/contact.js"></script>

</head>
<body>

	<!--Menu-->
	<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">OSS</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li><a href="../index.php">Home</a></li>
		      <li><a href="addproduct.php">Add Product</a></li>
		      <li><a href="updateproduct.php">Manage Product</a></li>
		      <li><a href="product.php">Products</a></li>
		      <!--get the cart count-->
		      <li class="active"><a href="cart.php">Cart (<?php echo count_cart_fxn($customer_id);?>)</a></li>
		    </ul>
		    <!--Check for login-->
		    <ul class="nav navbar-nav navbar-right">
		      <li>
		      	<?php echo (isset($_SESSION["user_id"]))? "<a href='../login/logout.php'><span class='glyphicon glyphicon-log-in'></span>Logout</a>" : " ";?>
		      </li>
		    </ul>
		    <!--search form-->
		    <form class="navbar-form navbar-left" action="search.php">
		      <div class="form-group">
		        <input type="text" name="searcht" class="form-control" placeholder="Search">
		      </div>
		      <button type="submit" name="csearch" class="btn btn-default">Search</button>
		    </form>
		  </div>
	</nav> 

	<!--Payment body-->
	<div class="panel panel-success">
  		<div class="panel-heading">
 			Payment Update
  		</div>
  		<div class="panel-body">
  			
  			<?php
				
					//check for payment  

					//get amount from post
						
					//check if amount is 0

					//echo appropriate message
			
					//create a new order (insert into order table). this will returns order id

					//check if order id was returned
							
					//using order id move item from cart to orderdetails

					//set an index to help with the loop (check cart.php from line 159 for clue)
								
					//loop through product id
								
					//get quantity
									
					//insert into order details
									
					//update quantity index
									
					//delete from cart

					//check if delete worked
								
					//insert new payment record
									
					//check if payment worked
									
					//provide appropriate message
										
  			?>
  		</div>
	</div>
	
</body>
</html>