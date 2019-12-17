<?php
//connect to the core file for general configuration
require("../settings/core.php");

//include the cart controller
require('../controllers/cartcontroller.php');

//include the product controller
require('../controllers/productcontroller.php');

//check for login
check_login();

//get customer id
$customer_id = get_customer_id();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Product</title>
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
		      <li class="active"><a href="updateproduct.php">Manage Product</a></li>
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
		//run the view all product function
		$product_list = view_all_product_fxn();
		
		//Page header
		echo "<ul class='list-group'>";
		echo "<li><a href='#' class='list-group-item active'>";
		echo 'Product List';
		echo "</a></li>";
		
		//check permission returns the user role number
		$u_perm = check_permission();

		//check if a product was found
		if ($product_list) {
			
			//loop through returned list of product
			foreach ($product_list as $product) {
				
				//grab product id
				$pid = $product['product_id'];

				//check for permission 
				//Admin can edit and delete
				//Standard can only add
				if ($u_perm == 1) {
					
					//admin user
					echo "<li class='list-group-item'>". $product['product_title']." - ".$product['product_price']." GHC - <a href='addproduct.php?ppid=$pid'>edit</a> | <a href='#' onclick='delproduct($pid)'>delete</a> </li>";
				}else{

					//standard user
					echo "<li class='list-group-item'>". $product['product_title']." - ".$product['product_price']."  GHC - You do no have permission to edit/delete </li>";
				}
				
			}
		}else{
			//echo appropriate message
			echo "<li>No Product Found</li>";
		}
		
		//end of list
		echo "</ul>";

	?>
</body>
</html>