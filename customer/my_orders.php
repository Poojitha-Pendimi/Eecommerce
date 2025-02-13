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
  

</body>
</html>


<?php

  include "authguard.php";
  include "menu.html";
  include_once "../shared/connection.php";
  
  $user_id=$_SESSION['user_id'];

  echo  "<div class='container mt-3 '>
  <div class='text-center text-capitalize text-danger'>
                    <h3>Orders List</h3>
                </div>
  <table class='table table-striped shadow'>
    <thead class='table-warning'>
        <tr class='text-success font-bold fs-5'>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Created Date</th>
            <th>Status</th>
            <th>View</th>
        </tr>
    </thead>";
 
    $orders=mysqli_query($conn,"select * from orders where user_id=$user_id");

    if(mysqli_num_rows($orders)>0)
    {
      while($row=mysqli_fetch_assoc($orders))
      {

        $id=$row['order_id'];
        $name=$row['name'];
        $price=$row['total_price'];
        $created=$row['created_at'];
        $status=$row['status'];

        $_SESSION['oid']=$id;

        echo "
        <tr class='text-white'> 
        <td>$id </td>
        <td>$name</td>
        <td>$price</td>
        <td>$created</td>
        <td>$status</td>
        <td>
           <a href='order_details.php' class='btn btn-warning'>Veiw Details</a>
        </td>
     </tr>";  
      }
    }
    else{
      echo "<tr>
             <td colspan='5'>No Orders Yet </td>
             </tr>";
    }
   
 
  
   echo "</table>
   <div>
     <a href='home.php'>
     <button class='btn btn-primary text-white float-end mt-2 md-5'>Go Back</button>
      </a>
      </div>
   </div>";
?>