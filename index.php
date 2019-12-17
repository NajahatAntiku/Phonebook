<?php
	//start session
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ecommerce Exams</title>
	<meta charset="utf-8">
	
	<!--CDN Bootstrap and Jquery-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
</head>
<body>
	<!--Header-->
	<div class="container">
	  <div class="jumbotron">
	    <h1>Online Store System (OSS)</h1> 
	    <p>A simple online store system to demonstrate the theories and concepts of a full stack web application online business for ecommerce final examination 2019</p> 
	  </div>
	</div>

	<!--Menu-->
	<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">OSS</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li class="active"><a href="#">Home</a></li>
		      <li><a href="view/addproduct.php">Add Product</a></li>
		      <li><a href="view/updateproduct.php">Manage Products</a></li>
		      <li><a href="view/product.php">Products</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		      <li>
		      <?php 
		      //show login or logout
		      echo (isset($_SESSION["user_id"]))? "<a href='login/logout.php'><span class='glyphicon glyphicon-log-in'></span>Logout</a>" : "<a href='login/login.php'><span class='glyphicon glyphicon-log-in'></span>Login</a>";?>
		      </li>
		    </ul>
		    <!--Search form-->
		    <form class="navbar-form navbar-left" action="view/search.php">
		      <div class="form-group">
		        <input type="text" name="searcht" class="form-control" placeholder="Search">
		      </div>
		      <button type="submit" name="csearch" class="btn btn-default">Search</button>
		    </form>
		  </div>
	</nav> 
	<?php
		//welcome message to Admin
		echo "  Welcome - ";
		echo (isset($_SESSION["user_name"]))? $_SESSION['user_name']:'';
		//check if standard user
		if (isset($_SESSION["user_role"])) 
		{
			if ($_SESSION["user_role"] == 2) 
			{
				//standard user message
				echo "<br>Please note that you dont have permission to add a product or manage a product";
			}
		}
		
	?>
</body>
</html>