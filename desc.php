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
<script src="jquery.js" type="text/javascript"></script>
<script src="cycle.js" type="text/javascript"></script>	
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#slider_image').cycle('fade');
		$("#slider_image").fadeIn("slow");
		$("#slider_image").fadeIn(2000);

	}
	);
</script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="jquery.wm-zoom-1.0.min.css">
</head>
<body>
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
			
<!--   parallax-window-->


 <div class="desc_page">  
         
   <?php
    if(isset($_GET['pro_id']))
    {
       $product_id = $_GET['pro_id'];
   $get_pro = "select * from products where product_id='$product_id'";
   $run_pro = mysqli_query($con, $get_pro);
   while ($row_fru=mysqli_fetch_array($run_pro))
   {
       $pro_id = $row_fru['product_id'];
       $product_title = $row_fru['product_title'];
       $product_img1 = $row_fru['product_img1'];
       $pro_desc = $row_fru['product_des'];
       $pro_price = $row_fru['product_price'];
    
       echo "
       <div class='wm-zoom-container demo'>
  <div class='wm-zoom-box'>
  <img id='image' src='product_images/$product_img1' class='wm-zoom-default-img'
       data-hight-src='product_images/$product_img1'
       data-loader-src='loader.gif'>
  </div>
  <div class='aboutp'>
      <span>About</span> <br>
      <p>$pro_desc</p>
     
  </div>
</div>
    <div class='product_des'>
     <h1>$product_title</h1>
     <li>Free Home Delivery</li>
     <li><span>MRP Rs.$pro_price
     <br>Inclusive of all taxes</span></li>
     <li>Standard Delivery</li>
   
   
    
     <button class='button'><a href='cart_details.php?pro_id=$product_id'>Buy Now</a></button>
  <button class='button'><a href='desc.php?add_cart=$product_id'>Add to cart</a></button>
  
  </div>";
      
   }
   }
   ?>
      <?php
if(isset($_GET['add_cart']))
{
    $p_id = $_GET['add_cart'];
    $check_pro = "select * from cart where ip_add='1' AND product_id='$p_id'";
    $run_check = mysqli_query($con,$check_pro);
    if(mysqli_num_rows($run_check)>0)
    {
        echo "";
    }
    else
    {
        $q = "insert into cart (product_id,ip_add) values ('$p_id','1')";
        $run_q = mysqli_query($con,$q);
    }
    echo "<script>window.open('desc.php?pro_id=$p_id,'_self')</script>";
}
     ?>
   </div>
    <script src="jquery-1.8.3.min.js"></script>
     
     <script src="jquery.wm-zoom-1.0.min.js"></script>
     
     <script type="text/javascript">
         $('.demo').WMZoom();
         $('.demo-2').WMZoom({
  config : {

    // stage size
  stageW : 500,
  stageH : 400,

  // set to true to enable the inner zoom mode
  inner  : false,

  // [top, right, bottom, left]
  position : 'right', 

  // margin
  margin : 10
    
  }
});
    </script>
      
		  
			
  
    
</body>
</html>