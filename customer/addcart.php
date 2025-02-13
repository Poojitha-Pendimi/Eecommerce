<?php

include "authguard.php";

$userid=$_SESSION['user_id'];
$pid=$_GET['pid'];

include_once "../shared/connection.php";

$status=mysqli_query($conn,"insert into cart(pid,user_id) values($pid,$userid)");
if($status){
    $_SESSION['msg']=" Item Added to Cart successfully!";
    header("location:home.php");
}
else{
    echo mysqli_error($conn);
}


?>