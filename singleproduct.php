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
	<title>Single Product</title>
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

	<!--Content start here-->
	<div class="panel panel-success">
  	  <div class="panel-heading">Single Product Details</div>
  	  <div class="panel-body">

			<?php

				//get product id
				$pid = $_GET['viewid'];

				//run view one product function
				$product_list = view_one_product_fxn($pid);
				
				echo "<div class='container'>
					  <div class='row'>";

				//check if a product was found
				if ($product_list) {

						echo "<div class='col-md-4' style='margin-bottom:20px;'>
						            <svg class='bd-placeholder-img card-img-top' width='100%' height='225' xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='xMidYMid slice' focusable='false' role='img' aria-label='Placeholder: Thumbnail'><title>Placeholder</title><rect width='100%' height='100%' fill='#55595c'/><text x='50%' y='50%' fill='#eceeef' dy='.3em'>Thumbnail</text></svg>
						            <p class='card-text'>". $product_list[0]['product_title']." - GHC".$product_list[0]['product_price']."</p>
						            <a style='text-decoration: none; color:black;' href='addtocart.php?add_cart=$pid'>
						             <button type='button' class='btn btn-sm btn-outline-secondary'>Add to Cart</button>
						             </a>
						             <a style='text-decoration: none; color:black;' href='product.php'>
						             <button type='button' class='btn btn-sm btn-outline-secondary'>Go back</button>
						             </a>
						        </div>";
					
				}else{
					//echo appropriate result
					echo "No Product Found";
				}
				//end of product list
				echo "</div></div>";
			?>
	  </div>
	</div>
</body>
</html>