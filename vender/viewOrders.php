<?php

include "authguard.php";
include "menu.html";
$userid=$_SESSION['user_id'];

  ?>                 

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
<style >
       body{
          background: url(../shared/bgpink.jpg);
       }
    </style>
</head>
<body>
<script>
   
   function status_update($status){
       res=confirm("Are you sure want to Update Status="+status);
       if(res){
           window.location=`updateStatus.php?pid=${status}`;
       }
     }
   

   </script>
 

<div class="py-3">
          
 <div class="container justify_content-center">
               <div class="text-center text-capitalize text-white" >
                    <h3>Order Details</h3>
                </div>
        <div class="card ">
            <div class="card-body shadow">
          <?php
            if(isset($_SESSION['msg']))
             {
             ?> <div class='alert alert-danger alert-dismissible'>
                   <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>Hey! </strong><?php echo $_SESSION['msg'];?>
                </div>
                <?php
                unset($_SESSION['msg']);
               }
               ?>
                 
                <form action="order_details.php" method="POST">
               
                   <div class=" row align-items-center text-size=5" style="color:orange">
                   <div class="col-md-2">
                        <h4>Product ID</h4>
                    </div>

                    <div class="col-md-3">
                        <h4 >Product</h4>
                    </div>
                    <div class="col-md-2">
                        <h4>Name</h4>
                    </div>
                    <div class="col-md-2">
                        <h4>Price</h4>
                    </div>
                    
                    <div class="col-md-2">
                        <h4>Details<h4>
                    </div>
                    
                   </div>
                   
                   <?php 

                    

                      include_once "../shared/connection.php";

                      $sql_cursor=mysqli_query($conn,"select * from order_items join product on order_items.pid=product.pid where order_items.uploaded_by=$userid");

                     while($row=mysqli_fetch_assoc($sql_cursor)){

                     $pid=$row['pid'];
                     $name=$row['name'];
                     $details=$row['details'];
                     $price=$row['price'];
                     $impath=$row['img_path'];
                     $orderid=$row['order_id'];
                    ?>
                     <div class="card product_data shadow-sm mb-3">
                        <div class="row align-items-center">
                           
                           <div class="col-md-2">
                                <h6 class="text-center"><?= $pid?></h6>
                            </div>
                            <div class="col-md-3">
                                
                                <img src="<?=$row['img_path']?>" alt="Image" width="100px" height="60px">
                            </div>
                            <div class="col-md-2">
                                <h6><?= $name=$row['name']?></h6>
                            </div>
                            <div class="col-md-2">
                                <h6><?=$price=$row['price'];?></h6>
                            </div>
                           
                           
                          
                           <div class="col-md-2">
                                
                                <button type="submit" name='image' value="<?=$row['img_path']?>" class="btn btn-secondary text-white justify-content-center">Details</button>
                             
                            </div>
                         </div>
                            
                    </div>
                    <?php
                  
                     }
                    ?>

                 </div>
               </div>
                   
            </form>
            <div>
            <a href="home.php">
             <button class="btn btn-dark text-white float-end mt-5">Go Back</button>
            </a>
            </div>
            </div>
            
            </div>
       
          
          
        
   
   </div>
   
   
    </body>
</html>