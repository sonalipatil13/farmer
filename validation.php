<?php
include("db/db.php");
?>
                     <?php
                    session_start();
if($con){
    echo"Connection Succesful";
}
     else{
         echo "no connection";
     }   

mysqli_select_db($con,'customer');
                    $email = $_POST['email'];
                        $pass = $_POST['password'];
                        $q = "select * from customer where customer_email = '$email' && customer_pass = '$pass'";
                        $result = mysqli_query($con,$q);
                        $num = mysqli_num_rows($result);
                        if($num == 1){
                           $_SESSION['username'] = $email;
                            header('location:index1.php');
                           
                          
                        }
                        else
                        {
                            header('location:login.php');
                            echo "Entered email or password is wrong";
                        }
                        
                        ?>