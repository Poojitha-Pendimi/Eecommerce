<?php
include_once "authguard.php";
$pid=$_GET['pid'];

include_once "../shared/connection.php";

$status=mysqli_query($conn,"delete from product where pid=$pid");

if($status){
    $_SESSION['msg']=" Product Deleted successfully!";
    header("location:view.php");
}
else{
    echo mysqli_error($conn);
}

?>