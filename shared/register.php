<?php

$uname=$_POST['username'];
$upass=$_POST['password'];
$utype=$_POST['user_type'];

$encpass=md5($upass);

include_once "connection.php";

//$cur1=$my_sqli_query("select * from user where user_name='$uname'");
//my_sqli_num_rows($cur1);

$status=mysqli_query($conn,"insert into user(user_name,password,user_type) values('$uname','$encpass','$utype')");



if($status)
{
     if($status){
        $_SESSION['msg']= "Registration Successfull. Please Login Here";
          header("location:userlogin.php");
        }
}
else
{
    echo "Error in Registration";
    echo mysqli_error($conn);
}







?>