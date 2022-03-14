<?php

session_start();
if (!isset($_SESSION["email"])) {
  header("Location:index.html");
}

$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'contact_table');
$cname = $_POST["cname"];
$cph=$_POST["cph"];
$secret=$_SESSION["secret"];
$cemail=$_POST["cemail"];
if(!empty($cname) && !empty($cname) && !empty($cname) && !empty($cemail))
{
  $reg="insert into contact(secret,cname,cphone,cemail) values ('$secret','$cname','$cph','$cemail')";
  mysqli_query($con,$reg);
  header("Location:process.php");
}
else{
  echo '<script>alert("Check whether the given values for adding contacts is valid.");</script>';
}

?>