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
    <link rel="stylesheet" href="style.css"> 
    <style >
       body{
          background: url(../shared/bgwhite.webp);
       }
    </style>
</head>
<body>
    <div class="container-fluid text-light py-2" style="background: rgb(248, 188, 243);">
        <header class="text-center  font-bold">
            <h1 class="display-6 text-dark " style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Kids World</h1>
        </header>
    </div>
    <div class="container my-3 bg-dark w-50 text-light py-3 rounded-4 shadow">
        <form action="upload.php" class="bg-dark p-4 rounded-5"  method="POST" enctype="multipart/form-data">
            <div class="text-center text-white">
                <h4 >Upload Products</h4>
            </div>
            <input type="text" placeholder="Product Name" name="name" class="form-control mt-3">
            <input type="number" placeholder="Product Price" name="price" class="form-control mt-2">
            <textarea name="details" cols="30" rows="5" placeholder="Product description..." class="form-control mt-2"></textarea>
            <input type="file" name="pdtimg" class="form-control mt-2">
    
            <div class="text-center">
            <button class="btn btn-warning mt-3">Upload</button>
            </div>
    
        </form>
    </div>
    
      
</body>
</html>