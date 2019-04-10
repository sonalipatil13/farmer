<?php
include("db/db.php");
?>
<!DOCTYPE html>
<html>
<head >

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
<link href="css/style.css" rel="stylesheet" type="text/css">

<div class="registration">
<form action="reg.php" method="post" enctype="multipart/form-data">
<table align="center" >

		<img src="reglogo.png" class="user">
		<center><th colspan="2"><h3>User Registration</h3></th></center>
		<tr><td><p>First Name</p>
			<input type="text" name="first" placeholder="Enter First Name"></td>
		<td><p>Last Name</p>
			<input type="text" name="last" placeholder="Enter Last Name"></td></tr>
		<tr><td><p>Mobile Number</p>
		<input type="number" name="mobile" placeholder="Enter Mobile Number"></td>
		<td><p>Email</p>
			<input type="text" name="email" placeholder="Enter Email"></td></tr>
		
		<tr><td><p>Password</p>
			<input type="password" name="password" placeholder="Enter Password"></td>
		<td><p>Confirm Password</p>
		<input type="password" name="password" placeholder="Enter Confirm Password"></td></tr>
		
	    <tr><div class="dist"><td>
		<select name="dis">
		<option>Select District</option>
	<option value="Mumbai">Mumbai</option>
	<option value="Pune">Pune</option>
	<option value="Nagpur">Nagpur</option>
	<option value="Solapur">Solapur</option>
	<option value="Thane">Thane</option>
	<option value="Chandrapur">Chandrapur</option>
	<option value="Amravati">Amravati</option>
	<option value="Sangli">Sangli</option>
	<option value="Beed">Beed</option>
	<option value="Latur">Latur</option>
	<option value="Nanded">Nanded</option>
	<option value="Wardha">Wardha</option>
	<option value="Akola">Akola</option>
	<option value="Sindhudurg">Sindhudurg</option>
	<option value="Ratnagiri">Ratnagiri</option>
	<option value="Raigarh">Raigarh</option>
		</select></td><td><p>Address</p><input type="text" name="address" placeholder="Address"></td></tr>
			</table>
	<input type="submit" name="" value="Sign up">
		</form></div>
		
		
	  <div class="hd">
<img src="logo/farmer_logo4.png" alt="" height="100" width="250">
<img src="logo/farmer_logo3.png" alt="" height="100" width="1040">
</div>
   <nav>
       
     
    
</nav>
				<div class="Navig">
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
    <form method="get" action="result.php" enctype="multipart/form-data">
      <input type="text" placeholder="Search.." name="user_query">
      <button type="submit" name="search"><i class="fa fa-search"></i></button>
    </form>
  </div>
                        </div></li>
                </ul>
    </div>
			  
</body>
</html>		


















