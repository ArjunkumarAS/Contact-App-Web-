<?php

session_start();


$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'contact_table');
$email=$_POST["email"];
$password=$_POST["password"];
$s="select * from register where email='$email' && password='$password'";

$result=mysqli_query($con,$s) or die("failed to query database");

$num=mysqli_num_rows($result);
if($num > 0)
{
  while($row = $result->fetch_assoc())
 {
  $_SESSION['email']=$row["email"];
  $_SESSION['secret']=$row["secret"];
 }
  header('location:process.php');
}    
 else
 {
  
   header('location:login.php');
 }

?>