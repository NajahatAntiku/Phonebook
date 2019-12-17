<?php
//connect to the core file for general configuration
require("../settings/core.php");

//include the cart controller
require('../controllers/cartcontroller.php');

//connnect to the product controller
require("../controllers/productcontroller.php");

//check for login
check_login();

//get customer id
$customer_id = get_customer_id();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Product Processing</title>
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
		      <li class="active"><a href="addproduct.php">Add Product</a></li>
		      <li><a href="updateproduct.php">Manage Products</a></li>
		      <li><a href="product.php">Products</a></li>
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
		//check if submit button was clicked
		if (isset($_GET['uadd'])) {
			
			// grab form data
			$ptitle = $_GET['protitle'];
			$pprice = $_GET['proprice'];

			//insert new product
			$insert_prod = insert_product_fxn($ptitle,$pprice);

			//check if insert worked
			if ($insert_prod) 
			{
				//echo success
				echo "<div class='alert alert-success'>
  						<strong>Success!</strong> new product created.
					 </div>";
			}else{
				//echo failure
				echo "<div class='alert alert-danger'>
  						<strong>Danger!</strong> error creating product.
					 </div>";
			}
		
		//Updating a contact
		}elseif (isset($_GET['uupd'])) {
			// grab form data
			$pid = $_GET['ponid'];
			$ptitle = $_GET['protitle'];
			$pprice = $_GET['proprice'];


			//update contact
			$update_prod = update_product_fxn($pid,$ptitle,$pprice);

			//check if update worked
			if ($update_prod) {
				//echo success
				echo "<div class='alert alert-success'>
  						<strong>Success!</strong> Product updated.
					 </div>";
			}else{
				//echo failure
				echo "<div class='alert alert-danger'>
  						<strong>Danger!</strong> error updating product.
					 </div>";
			}
		}
	?>

</body>
</html>