<?php
include("db/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<link rel="stylesheet" href="css/style.css">
</head>
<body>
    

<form method="post" action="insert_product.php" enctype="multipart/form-data">
    <table class="admin_table" width="700" align="left" border="1"  cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="2"><h2 class="thead">Insert New Product</h2></td>
        </tr>
        <tr>
           <td>Product Title</td>
            <td><input type="text" name="product_title"></td>
        </tr>
        <tr>
           <td>Product Category</td>
            <td><div class="select-style"><select name="product_cat" style="">
                <option>Select Category<i class="fa fa-chevron-circle-down" aria-hidden="true"></i></option>
    <?php
   $get_pro = "select * from category";
   $run_pro = mysqli_query($con, $get_pro);
   while ($row_fru=mysqli_fetch_array($run_pro))
   {
           $cat_id = $row_fru['cat_id'];
       $cat_title = $row_fru['cat_title'];
       
   echo "<option value='$cat_id'>$cat_title</option>";
       
   }
   ?>
            </select></td>
        </tr>
           <tr>
           <td>Product Image</td>
            <td><input type="file" name="product_img1"></td>
        </tr>
           <tr>
           <td>Product Price</td>
            <td><input type="textarea" name="product_price"></td>
        </tr>
           <tr>
           <td>Product Description</td>
            <td><textarea name="product_des" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>Keywords</td>
             <td><input type="text" name="user_keyword">
        </tr>
        <tr>
            <td colspan="2" align='center'><input type="submit" name="insert_product" value="Insert Product" style=" background-color: #008CBA;
    border: none;
    color: white;
    height: 40px;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;"></td>
        </tr>
    </table>
</form>
    </body>
</html>
<?php
    if(isset($_POST['insert_product']))
    {
          $product_title = $_POST['product_title'];
          $product_cat = $_POST['product_cat']; 
          $product_price = $_POST['product_price'];
          $product_des = $_POST['product_des'];
         $user_keyword= $_POST['user_keyword'];
          $status = 'on';
        $product_img1 = $_FILES['product_img1']['name'];
         $temp_name = $_FILES['product_img1']['tmp_name'];
        $path = "product_images/".$product_img1;
      
        
        if($product_title=='' or $product_cat=='' or $product_img='' or $product_price=='' or $user_keyword=='' or $product_des=='')
        {
            echo "<script>
                alert('Please fill all the fields!')
            </script>";
              exit();
        }
        
       else{
           move_uploaded_file($temp_name,$path);
           
           $insert_product = "insert into products (cat_id,product_title,date,product_img1,product_price,product_des,keyword,status) values ('$product_cat','$product_title','NOW()','$product_img1','$product_price','$product_des','$user_keyword','$status')";
           
           $run_product = mysqli_query($con,$insert_product);
           if($run_product)
           {
               echo "<script>
               alert('Product Inserted Succesfully')
               exit();
               </script>";
           }
       }
    }

?>
