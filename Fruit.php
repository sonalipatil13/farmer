<?php
include("db/db.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<div class="hd">
<img src="logo/farmer_logo4.png" alt="" height="100" width="250">
<img src="logo/farmer_logo3.png" alt="" height="100" width="1040">
</div>
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

 <link href="css/style.css" rel="stylesheet" type="text/css">
</head>


<body>
         <nav>
       
       <a class="logout" href=""><?php echo'Welcome! ' .$_SESSION['username'];?></a>
   <a class="logout" href="">Logout</a>
    
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
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
                        </div></li>
                </ul>
    </div>
			
			
<div class="slideshow-container">

  
  <div class="wrapper">
  <div id="slider_image">
  <img src="F2.jpg"  width="800" height="200"/>
  <img src="F3.jpg"  width="800" height="200"/>
  <img src="F4.jpg"  width="800" height="200"/>
  <img src="F5.jpg"  width="800" height="200"/>
  
  </div>
   </div>
   </div>
   
   <div class="fruit">
   <h3>Fruits</h3>
    </div>
   
   <?php
   $get_pro = "select * from products";
   $run_pro = mysqli_query($con, $get_pro);
   while ($row_fru=mysqli_fetch_array($run_pro))
   {
       $product_id = $row_fru['product_id'];
       $product_title = $row_fru['product_title'];
       $product_img1 = $row_fru['product_img1'];
       
   echo "
    <div class='gallery'>
    
  
   <img src='product_images/$product_img1' width='600' height='400'>
    <h3 class='desc'>$product_title</h3>
     <button class='button'><a href='desc.php?pro_id=$product_id'>Buy Now</a></button>
  <button class='button'><a href='fruit.php?add_cart=$product_id'>Add to cart</a></button>
  </div>
   ";
       
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
    echo "<script>window.open('fruit.php','_self')</script>";
}
?>
  
  
    
  
</body>					
</html>






