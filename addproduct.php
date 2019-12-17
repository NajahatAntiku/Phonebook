<?php
//connect to the core file for general configuration
require("../settings/core.php");

//include the cart controller
require('../controllers/cartcontroller.php');

//include the product controller
require('../controllers/productcontroller.php');

//check for login
check_login();

//get customer ip
$customer_id = get_customer_id();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
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
		      <li class="active"><a href="addproduct.php">Add Product</a></li>
		      <li><a href="updateproduct.php">Manage Product</a></li>
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
		//check if the action is an update. to pupulate the form for updadte
		if (isset($_GET['ppid'])) {
			//get product id
			$pid = $_GET['ppid'];
			//run the function to get one product
			$result = view_one_product_fxn($pid);
			//store remaining product data in varible
			$pdid = $result[0]['product_id'];
			$ptitle = $result[0]['product_title'];
			$pprice = $result[0]['product_price'];
		}
	?>
	<!--Page Header-->
	<div class="panel panel-success">
  		<div class="panel-heading">
  			<?php echo (isset($pid))? 'Update Product' : 'Add New Product';?>
  		</div>
  		<div class="panel-body">
  			
  			<!--Contact Form-->
			<form class="form-inline" role="form" action="productproc.php">
			  <div class="form-group">
			    <label>Product Title:</label>
			    <input required type="text" class="form-control" name="protitle" value="<?php echo (isset($ptitle))? $ptitle : '';?>" id="pdtitle">
			  </div>
			  <div class="form-group">
			    <label>Product Price:</label>
			    <input maxlength="10" required type="number" step="any" class="form-control" name="proprice" value="<?php echo (isset($pprice))? $pprice : '';?>" id="pdprice">
			  </div>
			  <button type="submit" onclick="productvalidation()" class="btn btn-default" name="<?php echo (isset($pid))? 'uupd' : 'uadd';?>" > <?php echo (isset($pid))? 'Update Product' : 'Add New Product';?></button>
			  <input type="hidden" name="ponid" value="<?php echo (isset($pid))? $pid : '';?>">
			</form>

  		</div>
	</div>

</body>
</html>