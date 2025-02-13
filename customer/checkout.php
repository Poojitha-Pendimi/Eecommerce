  <?php

include "authguard.php";
include "menu.html";

  ?>                 

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
<<style >
       body{
          background: url(../shared/bgwhite.webp);
       }
    </style>
</head>
<body>
    

   <div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="placeOrder.php" method="POST">
            <div class="row">
                  <div class="col-md-7 text-primary">
                    <h3 class="text-success">Basic Details</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Name</label>
                            <input type="text" name="name" required placeholder="Enter your Full Name" class="form-control"> 
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">E-mail</label>
                            <input type="text" name="email" required placeholder="Enter your Email" class="form-control"> 
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Phone</label>
                            <input type="number" name="phone" required placeholder="Enter your Phone Number" class="form-control"> 
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Pin Code</label>
                            <input type="text" name="pincode" required placeholder="Enter your Pin code" class="form-control"> 
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="fw-bold">Address</label>
                            <textarea name="address"  class="form-control" rows="5"></textarea> 
                        </div>
                    </div>
                  </div>
                  
                <div class="col-md-4  text-danger">
                    <h3 class="text-success">Order Details</h3>
                    <hr>
                   <div class=" row align-items-center">
                    <div class="col-md-4">
                        <h6>Product</h6>
                    </div>
                    <div class="col-md-4">
                        <h6>Name</h6>
                    </div>
                    <div class="col-md-4">
                        <h6>Price</h6>
                    </div>
                   </div>
                  
                   <?php 
                    

                      $userid=$_SESSION['user_id'];

                      include_once "../shared/connection.php";

                       $sql_cursor=mysqli_query($conn,"select * from cart join product on cart.pid=product.pid where user_id=$userid");

                       $total=0;
                     while($row=mysqli_fetch_assoc($sql_cursor)){

                     $cartid=$row['cart_id'];
                     $pid=$row['pid'];
                     $name=$row['name'];
                     $details=$row['details'];
                     $price=$row['price'];
                     $impath=$row['img_path'];
                    ?>
                     <div class="card product_data shadow-sm mb-3 text-dark">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <img src="<?=$row['img_path']?>" alt="Image" width="80px">
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
                    <h5>Total Price : <span class="float-end fw-bold Text-success"><?="RS. $total "?></span></h5>
                    <div class="">
                        <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100 mt-2 ">Confirm and Place Order | COD</button>
                    </div>
                </div>
                
            </div>
            </form>
        </div>
       
        </div>
        <a href='view.php'>
                    <button class='btn btn-primary text-white float-end mt-2 md-5'>Go Back</button>
                </a>
    </div>
  
   </div>
</body>
</html>