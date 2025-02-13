<?php

   
include_once "authguard.php";

include "menu.html";
include_once "../shared/connection.php";

         $pid=$_GET['pid'];
         $status=mysqli_query($conn,"SELECT * FROM `product` WHERE `pid` = $pid ");
          $row=mysqli_fetch_assoc($status);
       
          $name=$row['name'];
          $details=$row['details'];
          $price=$row['price'];
          $impath=$row['img_path'];

      
      echo "<div class='d-flex justify-content-center align-items-center vh-100'>
        <form action='update.php' class='bg-warning p-5'  method='POST' enctype='multipart/form-data'>
        <div class='text-center text-capitalize text-start'>
                <h2>Update Product</h2>
            </div>
          <div class='text-center text-white mt-5 display:inline-block'>
          <input  type='hidden' name='pid' value=$pid>
             <lable class='form-lable text-dark'>Name</lable>
              <input class='form-control mt-2' type='text' name='name' value='$name'  >
              <lable class='form-lable text-dark'>Price</lable>
              <input class='form-control mt-2' type=number name='price'  value=$price  >
              <lable class='form-lable text-dark'>Details</lable>
              <textarea name='details' class='form-control mt-1' cols='20' rows='5'>$details</textarea>
              <lable class='form-lable text-dark'>Image</lable>
              <input type='file' name='pdtimg' class='form-control mt-2'>
            <input type='hidden' name='impath_old' value=$impath class='form-control mt-2'>
            <td><img src=$impath style='width:150px '></td>
         
        <div class=.text-center.>
              
              <button class='btn btn-success mt-3'>Update</button>
         
        </div>

    </form>
    </div>
    
</div>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<style >
       body{
          background: url(../shared/dark.jpg);
       }
    </style>
</head>
<body>
  <script>
    function update()
    {
     

    if($status){
    $_SESSION['msg']="Product Details Edited successfully!";
      header("location:view.php");
    }
    else{
       mysqli_error($conn);
    }
    }
  </script>
</body>
</html>