<?php
include("db/db.php");
?>
<!DOCTYPE html>
<html>
<head>
 
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
			
	

 
  <div class="wrapper">
  <div id="slider_image">
  <img src="F2.jpg"  width="800" height="200"/>
  <img src="F3.jpg"  width="800" height="200"/>
  <img src="F4.jpg"  width="800" height="200"/>
  <img src="F5.jpg"  width="800" height="200"/>
  
 </div>
   </div>
  
   
   	

	<div class="w">
   <h3 class="about2">
   <h2 class="about1">About Us</h2>
   <div class="para">
   <p>Agriculture is the backbone of the Indian Economy"- said Mahatma Gandhi six decades ago. 
   Even today, the situation is still the same, with almost the entire economy being sustained 
   by agriculture, which is the mainstay of the villages. It contributes 16% of the overall GDP
   and accounts for employment of approximately 52% of the Indian population. Rapid growth in
   agriculture is essential not only for self-reliance but also to earn valuable foreign exchange.</p><br>

<p>Indian farmers are second to none in production and productivity despite of the fact that millions
 are marginal and small farmers. They adopt improved agriculture technology as efficiently as farmers
 in developed countries. It is felt that with provision of timely and adequate inputs such as fertilizers
 , seeds, pesticides and by making available affordable agricultural credit /crop insurance,
 Indian farmers are going to ensure food and nutritional security to the Nation.</p><br> 
 <p>It is envisaged to make available relevant information and services to the farming community and private
 sector through the use of information and communication technologies, to supplement the existing delivery
 channels provided for by the department. Farmers’ Portal is an endeavour in this direction to create one 
 stop shop for meeting all informational needs relating to Agriculture, Animal Husbandry and Fisheries 
 sectors production, sale/storage of an Indian farmer. With this Indian Farmer will not be required to 
 sift through maze of websites created for specific purposes. </p><br>
<p>Once in the Farmers’ Portal, a farmer will be able to get all relevant information on specific subjects around his village/block /district or state.
 This information will be delivered in the form of text, SMS, email and audio/video in the language he or 
 she understands. These levels can be easily reached through the Map of India placed on the Home page.
 Farmers will also be able to ask specific queries as well as give valuable feedback through the Feedback 
 module specially developed for the purpose.</p>
   </div>
   </h3>
   
   <div class="box1">
		<h2><img src="eye.jpg" width="200" height="160"></h2>
		<h1>--Vision--</h1>
		<li>To establish a transforming Organization in 
		Agricultural industry which will enable Farmers,
		customers & stake holders to enjoy healthy & prosperous life.</li>
		
   </div>
   
    <div class="box2">
	<h2><img src="mission1.png" width="200" height="160"></h2>
		<h1>--Mission--</h1>
		
		<li>To connect Farmers with Customers by giving attractive value 
		to build long term business relations.</li>
		<li>To create region wise Farmers communities across Maharashtra which will 
		follow/ get/ implement innovative farming techniques developed by us.</li>
		<li>Increase shelf life of Fruit's freshness by developing innovative techniques.</li>
		
   </div>
   
    <div class="box3">
	<h2><img src="value.png" width="200" height="160"></h2>
		<h1>--Values--</h1>
		<li>Honesty</li>
		<li>Integrity</li>
		<li>Cleanliness</li>
		<li>Timeliness</li>
   </div>
   </div>
   
    
	
</body>					
</html>
