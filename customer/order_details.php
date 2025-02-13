<?php

include "authguard.php";
include "menu.html";

  ?>                 

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
<style >
       body{
          background: url(../shared/bgmulty.jpg);
       }
    </style>
</head>
<body>
    

   <div class="py-2">
    <div class="container justify_content-center">
    <div class="text-center text-capitalize text-dark" >
                    <h2>Order Details</h2>
                </div>
        <div class="card">
            <div class="card-body shadow">
                <form action="my_orders.php" method="POST">
                 
                   <div class=" row align-items-center text-primary" style="color:orange">
                  
                    <div class="col-md-4">
                        <h4 >Product</h4>
                    </div>
                    <div class="col-md-4">
                        <h4>Name</h4>
                    </div>
                    <div class="col-md-4">
                        <h4>Price</h4>
                    </div>
                   </div>
                  
                   <?php 

                      $o_id= $_SESSION['oid'];

                      include_once "../shared/connection.php";

                       $sql_cursor=mysqli_query($conn,"select * from order_items join product on order_items.pid=product.pid where order_id=$o_id");

                       $total=0;
                     while($row=mysqli_fetch_assoc($sql_cursor)){

                     $pid=$row['pid'];
                     $name=$row['name'];
                     $details=$row['details'];
                     $price=$row['price'];
                     $impath=$row['img_path'];
                    ?>
                     <div class="card product_data shadow-sm mb-3">
                        <div class="row align-items-center">
                            
                            <div class="col-md-4">
                                <img src="<?=$row['img_path']?>" alt="Image" width="100px">
                            </div>
                            <div class="col-md-4">
                                <h5><?= $name=$row['name']?></h5>
                            </div>
                            <div class="col-md-4">
                                <h5><?=$price=$row['price'];?></h5>
                            </div>
                           
                        </div>
                     
                   </div>
                   <?php
                     $total +=$row['price'];
                     }
                      $_SESSION['total_price']=$total;
                       ?>
                    <h4>Total Price : <span class="fw-bold Text-success"><?="RS. $total "?></span></h4>
                    
                        <button type="submit" class="btn btn-primary float-end mt-2">Go Back</button>

               
                 
           
            </div>
            </form>
        </div>
        </div>
    </div>
   </div>
</body>
</html>