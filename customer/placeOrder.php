<?php

include "authguard.php";
include "menu.html";
include_once "../shared/connection.php";

$userid=$_SESSION['user_id'];
$total_price=$_SESSION['total_price'];

$sql_cursor=mysqli_query($conn,"select * from cart join product on cart.pid=product.pid where user_id=$userid");
if(isset($_POST['placeOrderBtn']))
{          
           
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $pincode=$_POST['pincode'];
            $address=$_POST['address'];

   $insert_query_run=mysqli_query($conn,"insert into orders(user_id,name,email,phone,address,pincode,total_price) values($userid,'$name','$email',$phone,'$address',$pincode,$total_price)");
  
   if($insert_query_run)
   {
      $order_id=mysqli_insert_id($conn);
 
      while($row=mysqli_fetch_assoc($sql_cursor))
      {
         $pid=$row['pid'];
         $price=$row['price'];
         $uploaded_by=$row['uploaded_by'];
         $insert_items_query_run=mysqli_query($conn,"insert into order_items(order_id,pid,price,uploaded_by) values('$order_id','$pid','$price',$uploaded_by)");
      }
        $_SESSION['msg']="Order Placed Successfully";
      header("location:my_orders.php");
      die();
    }
   else{
      echo mysqli_error($conn);
   }
  
    }
   else
   {
    $_SESSION['msg']=" Order Placed successfully!";
    header('location: home.php');
   }


?>