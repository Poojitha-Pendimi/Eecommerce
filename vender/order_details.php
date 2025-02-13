<?php

include "authguard.php";
include "menu.html";
include_once "../shared/connection.php";

$userid=$_SESSION['user_id'];
$image=$_POST['image'];

$sql_cursor=mysqli_query($conn,"select * from order_items join orders on order_items.order_id=orders.order_id where order_items.uploaded_by=$userid");

while($row=mysqli_fetch_assoc($sql_cursor))
{          
            $orderid=$row['order_id'];
         
            $name=$row['name'];
            $email=$row['email'];
            $phone=$row['phone'];
            $pincode=$row['pincode'];
            $address=$row['address'];
 }
 

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
<div class="py-5">
    <div class="container ">
        <div class="card bg-dark  shadow">
            <div class="card-body">
                <form action="updateStatus.php" method="POST">
                   <div class="row">
                  <div class="col-md-7">
                    <h3 class="text-danger ">Customer Details</h3>
                    <hr>
                    <div class="row">
                       
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Name</label>
                            <input type="text" name="name" value="<?=$name?>" class="form-control"> 
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">E-mail</label>
                            <input type="text" name="email" value="<?=$email?>" class="form-control"> 
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Phone</label>
                            <input type="number" name="phone" value="<?=$phone?>" class="form-control"> 
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Pin Code</label>
                            <input type="text" name="pincode" value="<?=$pincode?>" class="form-control"> 
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="fw-bold">Address</label>
                            <textarea name="address"  class="form-control" rows="5"><?=$address?></textarea> 
                        </div>
                    </div>
                  </div>

                 
                   <div class="col-md-3 mb-3 h-300">
                       <img src="<?=$image?>" alt="Image" width="400">
                    </div>
                    <div class="container justify_content-center">
                 <form action="updateStatus.php" method="POST">
                   <div class="col mt-5">
                        <h2 class="text-danger">Status<h4>
                    </div>
                   <div class=" row align-items-center text-size=5" style="color:orange">
                  
                   <div class="col-md-2 mt-3">
                         <input type="hidden" name="orderid" value="<?=$orderid?>">
                            <select required name="status" class="form-select">
                                <option value="onProcessing">Select Order Status</option>
                                <option value="onProcessing">On Processing...</option>
                                <option value="outOfDelivery">Out of Delivery</option>
                                <option value="delivered">Delivered</option>
                            </select>      
                     </div>
                     <div class="col-md-2 mt-3">
                     <button class="btn btn-success">Update</button>
                     </div>
                  </div>
                </form>
          
           </div> 
                 
          
           
        </div>
        </div>
      </div>
        <a href="viewOrders.php">
             <button class="btn btn-primary text-white float-end mt-3">Go Back</button>
          </a>
     </div>
          
 </div>
   

  </body>
</html>


