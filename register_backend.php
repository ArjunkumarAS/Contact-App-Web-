<?php
session_start();

$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'contact_table');

$email = $_POST["email"];
$password=$_POST["password"];
$secret=$_POST["secret"];
$s = "select * from register where email = '$email'";

$result=mysqli_query($con,$s);

$num=mysqli_num_rows($result);
if($num > 0)
{
    echo '<script>alert("This Email Id has already been registered.");</script>';
}
else if(!empty($email) && !empty($password) && !empty($secret)){

$reg="insert into register(email,password,secret) values ('$email','$password','$secret')";
mysqli_query($con,$reg);
echo '<script>alert("Registration successfull");</script>';

}
else{
    echo '<script>alert("Check whether the given values in registration form is valid.");</script>';
}

?>