<?php
include("db/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Farmer's Kart</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="parallax.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div class="hd">
<img src="logo/farmer_logo4.png" alt="" height="100" width="250">
<img src="logo/farmer_logo3.png" alt="" height="100" width="1040">
</div>
   <!--<nav>
       
     
    
</nav>-->
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
      <button type="submit" name="search"><i class="fa fa-search" value="search"></i></button>
    </form>
  </div>
                        </div></li>
                </ul>
    </div>
			
<!--   parallax-window-->

<div class="hh1" data-parallax="scroll" data-image-src="products/p3.jpeg">

   <?php
    if(isset($_GET['search']))
    {
        $user_keyword = $_GET['user_query'];
        $get_products = "select * from products where keyword like '%$user_keyword%'";
   $run_pro = mysqli_query($con, $get_products);
   while ($row_fru=mysqli_fetch_array($run_pro))
   {
       $product_id = $row_fru['product_id'];
       $product_title = $row_fru['product_title'];
       $product_img1 = $row_fru['product_img1'];
       
   echo "
    <div class='gallery'>
  <img src='product_images/$product_img1' width='600' height='400'>
    <h3 class='desc'>$product_title</h3>
     <button class='button'><a href='product_page.html'>Buy Now</a></button>
  <button class='button'>Add to cart</button>
  </div>
   </div>";
   }
   }
   ?>
	</div> 	
   	
			
  
    
</body>
</html>