<?php

include "authguard.php";

$userid=$_SESSION['user_id'];

$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];

echo "<br>";
//print_r($_FILES);

print_r($_FILES['pdtimg']['tmp_name']);

 $dest_file_path="../shared/images".$_FILES['pdtimg']['name'];

 move_uploaded_file($_FILES['pdtimg']['tmp_name'],$dest_file_path);

include_once "../shared/connection.php";
$status=mysqli_query($conn,"insert into product(name,price,details,img_path,uploaded_by) values('$name',$price,'$details','$dest_file_path',$userid)");
if($status){
    
    $_SESSION['msg']=" Data uploaded successfully!";
    header("location:view.php");
}
else{
    echo mysqli_error($conn);
}



?>





