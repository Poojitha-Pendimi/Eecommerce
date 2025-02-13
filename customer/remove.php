<?php
include_once "authguard.php";
$pid=$_GET['pid'];

include_once "../shared/connection.php";

$status=mysqli_query($conn,"delete from cart where pid=$pid limit 1");

if($status){
    $_SESSION['msg']=" Product Removed from Cart successfully!";
    header("location:view.php");
}
else{
    echo mysqli_error($conn);
}

?>