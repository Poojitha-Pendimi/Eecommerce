<?php

session_start();
$_SESSION['login_status']=false;

$uname=$_POST['username'];
$upass=$_POST['password'];


$enc_password=md5($upass);

include_once "connection.php";

$sql_cursor=mysqli_query($conn,"select * from user where user_name='$uname' and password='$enc_password'");

$matched_row_count=mysqli_num_rows($sql_cursor);

if($matched_row_count==0)
{
  
    $_SESSION['msg']= "Invalid Credentials";
      header("location:userlogin.php");
}
else
{
  $_SESSION['msg']= "Login Success";
  header("location:userlogin.php");
    
      $row=mysqli_fetch_assoc($sql_cursor);
      $user_type=$row['user_type'];
      $user_id=$row['user_id'];
      $user_name=$row['user_name'];
      if( $user_type=="vender")
      {
        $_SESSION['login_status']=true;
        $_SESSION['user_id']=$user_id;
        $_SESSION['user_type']=$user_type;
        $_SESSION['user_name']=$user_name;

        header("location:../vender/home.php");
      }
      else if( $user_type=="customer")
      {
        $_SESSION['login_status']=true;
        $_SESSION['user_id']=$user_id;
        $_SESSION['user_type']=$user_type;
        $_SESSION['user_name']=$user_name;
        
        header("location:../customer/home.php");
      }
      
}

?>