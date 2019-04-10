<?php
session_start();
include("db/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
 <?php
    if(isset($_REQUEST['c_login']))
    {
        $user=$_REQUEST['customer_email'];
        $pass=$_REQUEST['customer_pass'];
        $query=mysqli_query("select * from customer where customer_email='$user' AND customer_pass='$pass'");
        $rowcount=mysql_num_rows($query);
        if($rowcount==true)
        {
            echo "<script>window.open('index.php','_self')</script>";
        }
        else{
            echo "Your username or password is Wrong";
        }
    }
    ?>



</body>
</html>