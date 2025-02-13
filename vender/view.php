<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css"> 
  <style >
       body{
          background: url(../shared/dark.jpg);
       }
    </style>
</head>
<body>
  
<script>
   
    function confirmDelete(pid){
        res=confirm("Are you sure want to delete Product="+pid);
        if(res){
            window.location=`delete.php?pid=${pid}`;
        }
    }
    function confirmEdit(pid){
        res=confirm("Are you sure want to Edit Product="+pid);
        if(res){
            window.location=`edit.php?pid=${pid}`;
        }
    }

</script>
</body>
</html>


<?php

  include "authguard.php";
  include "menu.html";
  include_once "../shared/connection.php";
  $userid=$_SESSION['user_id'];
     
  if(isset($_SESSION['msg']))
  {
    ?> <div class='alert alert-danger alert-dismissible'>
    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
    <strong>Hey! </strong><?php echo $_SESSION['msg'];?>
  </div>
    <?php
    unset($_SESSION['msg']);
  }
  echo  "<div class='container mt-3 '>
  <table class='table table-striped '>
    <thead class='table-warning'>
        <tr class='text-dark'>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Details</th>
            <th colspan='2'>Action</th>
        </tr>
    </thead>";
 
  $sql_cursor=mysqli_query($conn,"select * from product where uploaded_by=$userid");

  while($row=mysqli_fetch_assoc($sql_cursor))
  {
    $name=$row['name'];
    $details=$row['details'];
    $price=$row['price'];
    $impath=$row['img_path'];
    $pid=$row['pid'];

   
  echo "
        <tr> 
        <td><img style='width:100px ' src='$impath'> </td>
        <td class='text-white'>$name</td>
        <td class='text-white'>$price</td>
        <td text-details class='text-white fs-0'>$details</td>
        <td>
        <i onclick='confirmEdit($pid)' class='btn btn-secondary'>Edit</i>
        <i onclick='confirmDelete($pid)' class='btn btn-danger'>Delete</i>
        </td>
     </tr>";  
  }
   echo "</table>
   <a href='home.php'>
   <button class='btn btn-primary text-white float-end mt-5'>Go Back</button>
   </a>
   </div>
   ";

?>