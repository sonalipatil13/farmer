<?php
include("db/db.php");
?>
                     <?php
                    session_start();
header('location:login.php');
if($con){
    echo"Connection Succesful";
}
     else{
         echo "no connection";
     }   

mysqli_select_db($con,'customer');
  $fname = $_POST['first'];
    $lname = $_POST['last'];
$email = $_POST['email'];
$pass = $_POST['password'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$dis = $_POST['dis'];
                        
                        $q = "select * from customer where name = '$name' && password = '$pass'";
                        $result = mysqli_query($con,$q);
                        $num = mysqli_num_rows($result);
                        if($num == 1){
                            echo "User name Already Taken";
                        }
                        else
                        {
                            $reg = "insert into customer(customer_first,customer_last,customer_email,customer_pass,mobile_number,customer_add,customer_city) values ('$fname','$lname','$email','$pass','$mobile','$address','$dis')";
                            mysqli_query($con,$reg);
                            echo "Registration Successful";
                        }
                        
                        ?>