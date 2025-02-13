<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style >
      body{
         background: url(../shared/bgdoll.webp);
      }
   </style>
</head>
<body>

     <div class="container d-flex justify-content-center align-items-center min-vh-100">
       <?php
       $_SESSION['login_status']=true;
        if(isset($_SESSION['msg']))
          {
           ?> <div class='alert alert-success alert-dismissible'>
             <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
             <strong>Hey! </strong><?php echo $_SESSION['msg'];?>
             </div>
           <?php
            unset($_SESSION['msg']);
          }
           ?>
        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column " style="background: #ee4e76;">
          <div class="featured-image mb-lg-2 align-content-center">
           <img src="toys.jpg" class="img-fluid" style="width: 700px;">
          </div>
          <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Kids world</p>
         
      </div> 
      <div class="col-md-6  right-box">
       

            <form action="login.php" class="rounded-4 p-5 " style="background: rgb(243, 129, 234);" method="post" onsubmit="return validate()">
                <div class="text-center text-capitalize text-dark" >
                    <h3>Login Here...</h3>
                </div>
                 <div>
                <input required type="text" name="username" placeholder="User Name" class="form-control mt-5">
               </div>
               <div>
                <input required  minlength="4" type="password" name="password" placeholder="Password" class="form-control mt-3">
                </div>
            
                <div class="text-center mt-4">
                  <button class="btm btn-success">Sign Up</button>
                </div>
            </form>
            <div class="text-center mt-3">
              <h5 class=" fs-12 font-bold ">  New User? Click Here to <a href="register.html">Register</a></h5>
            </div>
           
            
           
        </div>  
      </div> 

     </div>
   </div>

</body>
</html>…