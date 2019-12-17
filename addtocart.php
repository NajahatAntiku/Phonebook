<?php
//connect to the core file for general configuration
require("../settings/core.php");

//include the cart controller
require('../controllers/cartcontroller.php');

//check for login
check_login();

//get customer id
$customer_id = get_customer_id();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart Processing</title>
	<meta charset="utf-8">
	<!--CDN Bootstrap and Jquery-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
		      <li><a href="updateproduct.php">Manage Products</a></li>
		      <li class="active"><a href="product.php">Products</a></li>
		      <!--get the cart count-->
		      <li><a href="cart.php">
		      	Cart (<?php echo count_cart_fxn($customer_id);?>)
		      </a></li>
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

	<?php
		

		//check if add to cart button was clicked
		if (isset($_GET['add_cart'])) 
		{	
			// grad user form data
			$prodid = $_GET['add_cart'];

			//run duplicate function
			$dupcart = check_duplicate_fxn($prodid, $customer_id);

			//check if there is a duplicate
			if ($dupcart) 
			{
				//echo duplicate
				echo "<div class='alert alert-danger'>
  						<strong>Danger!</strong> Item already in cart.
					 </div>";
			}else
			{
				//run add to cart function
				$addcart = add_to_cart_fxn($prodid, $customer_id);

				//check if add to cart worked
				if ($addcart) 
				{
					//echo success
					echo "<div class='alert alert-success'>
	  						<strong>Success!</strong> Added to cart.
						 </div>";
				}else
				{
					//echo failure
					echo "<div class='alert alert-danger'>
  							<strong>Danger!</strong> Failed to add to cart.
					 	</div>";
				}
			}
		}
	?>
</body>
</html>