<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style >
       body{
          background: url(../shared/dark.jpg);
       }
    </style>
</head>
<body>
  
<script>
   
    function confirmRemove(pid){
        res=confirm("Are you sure want to delete Product="+pid);
        if(res){
            window.location=`remove.php?pid=${pid}`;
        }
    }
   

</script>
</body>
</html>


<?php

  include "authguard.php";
  include "menu.html";
  include_once "../shared/connection.php";
  
  $user_id=$_SESSION['user_id'];
  if(isset($_SESSION['msg']))
  {
    ?> <div class='alert alert-danger alert-dismissible'>
    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
    <strong>Hey! </strong><?php echo $_SESSION['msg'];?>
  </div>
    <?php
    unset($_SESSION['msg']);
  }

  echo  "<div class='container mt-3 justify-content-center'>
        <div class='text-center text-capitalize text-danger'>
         <h2>Cart Items</h2>
          </div>
  <table class='table table-striped shadow'>

     <thead class='table-warning'>
        <tr class='text-success font-bold fs-5'>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Details</th>
            <th colspan='2'>Action</th>
        </tr>
    </thead>";
 
    $sql_cursor=mysqli_query($conn,"select * from cart join product on cart.pid=product.pid where user_id=$user_id");

    while($row=mysqli_fetch_assoc($sql_cursor)){

        $cartid=$row['cart_id'];
        $pid=$row['pid'];
        $name=$row['name'];
        $details=$row['details'];
        $price=$row['price'];
        $impath=$row['img_path'];
    
   
  echo "
        <tr> 
        <td><img style='width:100px ' src='$impath'> </td>
        <td class='text-white fs-5'>$name</td>
        <td class='text-white fs-5'>$price</td>
        <td text-details class='text-white fs-5'>$details</td>
        <td>
        <i onclick='confirmRemove($pid)' class='btn btn-warning'>Remove</i>
        </td>
     </tr>";  
  }
   echo "
   
     </table>
     <a href='checkout.php'>
      <button class='btn btn-success float-end mt-2'>Proceed to Check Out</button>
     </a>
    
     </div>
     
     </div>
     <div>
     <a href='home.php'>
     <button class='btn btn-primary text-white float-end mt-2 md-5'>Go Back</button>
      </a>
      </div>
     ";
?>