<?php
//connect to the core file for general configuration
require("../settings/core.php");

//include the controller
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
	<title>Cart Management</title>
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

	<!--Cart Managment-->
	<ul class='list-group'>
		<li>
			<a href='#' class='list-group-item active'>Cart Management</a>
		</li>
	</ul>
	<!--multipart/form-data allows for input elements with the same name be treated as an array. see prod[] and quaty[]-->
	<form enctype="multipart/form-data" method="post">
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Product Title</th>
		      <th scope="col">Quantity</th>
		      <th scope="col">Unit Price</th>
		      <th scope="col">Sub Total</th>
		      <th scope="col">Remove</th>
		    </tr>
		  </thead>
		  <tbody>

			<!--Get cart details-->
			<?php
				//set variable to monitor cart total 
				$total = 0;

				//run view all cart function 
				$catlist = view_all_cart_fxn($customer_id);
				
				//check if function worked
				if ($catlist) 
				{
					//loop through the cart result
					foreach ($catlist as $item) {

						//grab product id & quantity and assign to variable
						$productid = $item['p_id'];
						$prodqty = $item['qty'];
						
						//set product id as an hidden field
						echo "
						<input type='hidden' name='prod[]' value='$productid'></td>";

						//use the product id to get product details
						//run view one product fuction
						$prodetails = view_one_product_fxn($productid);

						//check if function worked
						if ($prodetails) 
						{
							//get product details and echo
							$ptitle = $prodetails[0]['product_title'];
							$pprice = $prodetails[0]['product_price'];
							$protatal = $pprice * $prodqty;
							echo "<tr><th scope='row'>";
						    echo (isset($ptitle))? $ptitle : '';
						    echo "</th><td>";
						    echo "<input type='text' name='quaty[]' size='4' value='";
						    echo (isset($prodqty))? $prodqty : '';
						    echo"'>";
						    echo "</td><td>";
						    echo (isset($pprice))? $pprice : '';
						    echo "</td><td>";
						    echo (isset($protatal))? $protatal : '';
						    echo "</td><td><a href='#' onclick='removecart($productid);'>remove</a></td></tr>";

						    //update total price
						    $total += $protatal;
						}

					}
				}
			?>
		    <tr>
		      <th scope="row"></th>
		      <td></td>
		      <td></td>
		      <td></td>
		      <!--Display total price-->
		      <td>Total Price : GHC <?php echo $total ?></td>
		    </tr>
		    <tr>
		      <th scope="row"></th>
		      <td></td>
		      <!--Submit buttons-->
		      <td><input type="submit" name="update_cart" value="Update Quantity" class="btn btn-default"></td>
		      <td><button class="btn btn-default"><a href="product.php" style="text-decoration: none; color: black;">Continue Shopping</a></button></td>
		      <td><button class="btn btn-default"><a href="checkout.php" style="text-decoration: none; color: black;">Checkout</a></button></td>
		    </tr>
		  </tbody>
		</table>
	</form>

<!--Update quantity code-->
<?php
	//check if it's and update  
	if (isset($_POST['update_cart'])) 
	{
		//set an index to help with the loop
		$qtyindex = 0;

		//loop through product id
		foreach($_POST['prod'] as $p_id)
		{
			//get next quantity
			$qty = $_POST['quaty'][$qtyindex];

			//update quantity
			$checkupdate = update_cart_fxn($p_id, $customer_id, $qty);

			//update quantity index
			$qtyindex++;
			
		}
		 //reload 
		echo "<script>window.open('cart.php','_self')</script>";
	}
?>
	
</body>
</html>