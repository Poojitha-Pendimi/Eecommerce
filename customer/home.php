<?php
include_once "authguard.php";
include "menu.html";
$userid=$_SESSION['user_id'];

include_once "../shared/connection.php";

?>

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
   <div class="py-2">
    <div class="container">
        <div class="col-md-12">
            <h1 class="text-danger text-center" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Kids World</h1>
            <hr>
            <?Php
            if(isset($_SESSION['msg']))
             {
               ?> <div class='alert alert-danger alert-dismissible'>
               <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>Hey! </strong><?php echo $_SESSION['msg'];?>
               </div>
                <?php
               unset($_SESSION['msg']);
                }  ?>
          <div class="row">
            <?php
            $sql_cursor=mysqli_query($conn,"select * from product");

            while($row=mysqli_fetch_assoc($sql_cursor)){
            
                $pid=$row['pid'];
                $name=$row['name'];
                $details=$row['details'];
                $price=$row['price'];
                $impath=$row['img_path'];
            ?>
                    <div class="col-md-3 mb-2">
                        <div class="card shadow  d-flex flex-column h-100">
                             <div class="card-body">
                                <h3 style="color:darkgreen"><?=$name?></h3>
                             <img class='w-100' src=<?=$impath?>>
                             <h3 class="price mt-2"  style="color:blueviolet">RS. <?= $price?>/-</h3>
                             <div class="card-text mt-3"><?= $details?></div>
                             
                             </div>
                             <div class="mt-2 d-flex  justify-content-center">
                             <a href="addcart.php?pid=<?=$pid?>">
                                <button class="btn  bg-warning">Add to Cart</button>
                              </a>  
                             </div>
                        </div>
                    </div>
                    <?php
                     }
                     ?>
                
            
            </div>
        </div>
    </div>
   </div>
  
</body>
</html>
