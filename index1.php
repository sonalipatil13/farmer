<?php
include("db/db.php");
session_start();
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

</head>
<body>
   <link rel="stylesheet" href="css/style.css">
   <div class="hd">
<img src="logo/farmer_logo4.png" alt="" height="100" width="250">
<img src="logo/farmer_logo3.png" alt="" height="100" width="1040">
</div>
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
			


 
  <div class="wrapper">
  <div id="slider_image">
  <img src="F2.jpg"  width="800" height="200"/>
  <img src="F3.jpg"  width="800" height="200"/>
  <img src="F4.jpg"  width="800" height="200"/>
  <img src="F5.jpg"  width="800" height="200"/>
  
  </div>
   </div>



<div class="hh1" data-parallax="scroll" data-image-src="products/p1.jpeg">
<div class="hh" >
  <h1>Single touch Products</h1>
   <p>It is the process where Fruits - Veggies get minimal or no manual human touch so that end consumers experience natural freshness</p></div>
    <div class="Homebox1">
        
        
        <img src="himg1.png" alt="">
        <h2>- Tradional way -</h2>
        <p>Farmer<i class="fas fa-arrow-circle-right"></i>
                   Agent<i class="fas fa-arrow-circle-right"></i>Wholesaler <i class="fas fa-arrow-circle-right"></i> Semi Wholesalers<br> <i class="fas fa-arrow-circle-right"></i> Customer(Retail)<i class="fas fa-arrow-circle-right"></i>Consumer</p>
    </div>
    <div class="Homebox2">
        
        
        <img src="himg2.png" alt="">
        <h2>- Farmer’s Kart Way -</h2>
        
        <p>
             Farmer <i class="fas fa-arrow-circle-right"></i> Farmer's Kart <i class="fas fa-arrow-circle-right"></i> Customers
        </p>
    </div>
    <div class="Homebox3">
        <img src="himg3.png" alt="">
        <h2>--Features--</h2>
        
            <li>Reduce post harvest losses.</li>
            <li>Require less manpower.</li>
            <li>Natural freshness remains intact.</li>
        
    </div>
	</div>
    	
    <div class="d3" data-parallax="scroll" data-image-src="products/p5.jpeg">
        <h1>- Grade Neutral Buyings -</h1>
        <p>Supermarkets and other exporters purchase premium quality produce from farmers and lower quality produce leave with farmer which they sale to nearby wholesale market at very low rates which leads to low returns to farmers.</p>
   <h1>- Farmer’s Kart Innovative Way -</h1>
   <img src="himg4.png" alt="" width="700" height="300">
   <p>We purchase whole lot of produce from farmer at best price do sorting grading and packing at Kisan Mandi Facility centres and from there we take it our main distribution canter & then we distribute it to our various customers.
</p>
    </div>	
			
  
    
</body>
</html>