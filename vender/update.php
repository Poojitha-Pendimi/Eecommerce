<?php
  include_once "authguard.php";
  include_once "../shared/connection.php";


  $userid=$_SESSION['user_id'];
  $pid=$_POST['pid'];
  $name=$_POST['name'];
  $price=$_POST['price'];
  $details=$_POST['details'];
  $old_img=$_POST['impath_old'];
  
 
 $new_img=$_FILES['pdtimg']['name'];
 
 if($new_img!='')
 {
  $image = "../shared/images".$new_img;
 }
 else
 {
  $image = $old_img;
 }
   
   $status=mysqli_query($conn,"UPDATE `product` SET  `name` ='$name',`price`=$price,`details`='$details', `img_path`= '$image' WHERE `pid`=$pid");
  
  if($status)
  {
    if($_FILES['pdtimg']['name']!="")
    {
      move_uploaded_file($_FILES['pdtimg']['tmp_name'],$new_img);
      if(file_exists($old_img))
      {
          unlink($old_img);
      }
    }
  $_SESSION['msg']=" Product Details Updated successfully!";
  header("location:view.php");
  }
  else{
      echo mysqli_error($conn);
  }

?>