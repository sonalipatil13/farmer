<?php
include("db/db.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<!--<div class="hd">
<img src="logo/farmer_logo2.png" alt="">
<img src="logo/farmer_logo3.png" alt="" width="1040">
</div>-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
<link href="css/style.css" rel="stylesheet" type="text/css">
<div class="loginbg">
<div class="loginbox">
			<img src="user.png" class="user">
			<h2>User Login</h2>
			<form action="validation.php" method="post" enctype="multipart/form-data">
				<p>Username</p>
				<input type="text" name="email" placeholder="Enter Username">
				<p>Password</p>
				<input type="password" name="password" placeholder="Enter password">
				<input type="submit" name="c_login" value="login">
				<a href="#">Lost your password?</a><br>
				<a href="registration.php">Create an account?</a>
			</form>
		</div>
		</div>
		
	<div class="Nav">
				<ul>
				<li class="active"><a href="index.php"><i class="fas fa-home"></i> HOME</a></li>
				<li><a href="product.php"><i class="fas fa-apple-alt"></i> PRODUCTS</a></li>
				<li><a href="about.php"><i class="fas fa-users"></i> ABOUT US</a></li>
				<li><a href="#"><i class="fas fa-sign-in-alt"></i> LOGIN</a>
				<ul>
					<li><a href="login.php">User </a></li>
					<li><a href="admin_login.php">Admin </a></li>
				</ul>
				</li>
				<li><a href=""><i class="fas fa-user-plus"></i> REGISTER</a>
				<ul>
					<li><a href="registration.php">User </a></li>
					<li><a href="#">Admin </a></li>
			</ul>
                    </li>
                    <li><a href="cart_details.php"><i class="fas fa-shopping-cart"></i> CART: <?php
if(isset($_GET['add_cart']))
{
    $get_items = "select * from cart where ip_add='1'";
    $run_items = mysqli_query($con,$get_items);
    $count_items = mysqli_num_rows($run_items);
}
else{
    
    $get_items = "select * from cart where ip_add='1'";
    $run_items = mysqli_query($con,$get_items);
    $count_items = mysqli_num_rows($run_items);
}
                        echo $count_items;

?></a></li>
                   <li><a href="">PRICE:<?php

$total = 0;
$sel_price = "select * from cart where ip_add='1'";
$run_price = mysqli_query($con,$sel_price);
while($record=mysqli_fetch_array($run_price))
{
    $pro_id = $record['product_id'];
    $pro_price = "select * from products where product_id='$pro_id'";
    $run_pro_price = mysqli_query($con,$pro_price);
    while($p_price=mysqli_fetch_array($run_pro_price))
    {
        $product_price=array($p_price['product_price']);
        $values = array_sum($product_price);
        $total +=$values;
    }
}
 echo "Rs." .$total;
?></a></li>
                    <li> 
                    <div class="topnav">
                    <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
                        </div></li>
                </ul>
    </div>
		
	
		
</body>		

</html>		
		