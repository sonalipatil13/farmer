<?php
session_start();
include("db/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <div class="hd">
<img src="logo/farmer_logo2.png" alt="">
<img src="logo/farmer_logo3.png" alt="" width="1040">
</div>
   
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <form action="cart_details.php" method="post" enctype="multipart/form-data">
				<table class="timetable_sub">
						<tr>
							
							<th>Product</th>
							<th>Product Name</th>
							<th>Price</th>
						    <th>Quantity</th>
							<th>Remove</th>
						</tr>
						

<?php
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
        $product_price = array($p_price['product_price']);
        $product_title = $p_price['product_title'];
        $product_image = $p_price['product_img1'];
        $each_price = $p_price['product_price'];
        $values = array_sum($product_price);
        $total +=$values;
   
?>
	
				<tr>
				
				<td><img src="product_images/<?php echo $product_image; ?>" width="80" height="80"></td>
    <td><?php echo $product_title?></td>
                    <td><?php echo "Rs." .$each_price ?></td>
                    <td><input type="text" name="qty" value="1" size="3"></td>
                    <?php
                    if(isset($_POST['update']))
                    {
                        $qty = $_POST['qty'];
                        $insert_qty = "update cart set qty='$qty' where ip_add='1'";
                        $run_qty = mysqli_query($con, $insert_qty);
                        $total= $total*$qty;
                    }
                    ?>
                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
						</tr>
						
<?php }} ?>
					<tr align="right">
						    <td colspan="4">Sub-Total:</td>
                        <td><?php echo "Rs.".$total ?></td>
						</tr>		
						<tr><td>
						    <input type="submit" name="update" value="Update Cart">
						</td>
						<td><input type="submit" name="continue" value="Continue Shopping"></td>
						<td><input type="submit" name="checkout" value="Checkout"></td>
						</tr>		
				</table>
				</form>
				
				<?php
    function updatecart()
{
    global $con;
if(isset($_POST['update']))
{
    foreach($_POST['remove'] as $remove_id)
    {
        $delete_product = "delete from cart where product_id='$remove_id'";
        $run_delete = mysqli_query($con,$delete_product);
        if($run_delete)
        {
            echo "<script>window.open('cart_details.php','_self')</script>";
        }
    }
    
    
}
                            if(isset($_POST['continue']))
    {
        echo "<script>window.open('fruit.php','_self')</script>";
    }
}
                           echo @$upt_crt=updatecart();
?>

    
    
</body>
</html>