<?php
include_once "authguard.php";
include_once "../shared/connection.php";

$status=$_POST['status'];
$order_id=$_POST['orderid'];



$status=mysqli_query($conn,"update `orders` set `status`='$status' where `order_id`=$order_id");

if($status){
    $_SESSION['msg']=" Status Updated Successfully!";
    header("location:viewOrders.php");
    
}
else{
    echo mysqli_error($conn);
}

?>