<?php

session_start();
if (!isset($_SESSION["email"])) {
  header("Location:index.html");
}
$secret=$_SESSION["secret"];
?>

<html>
    <head>
        <title>Contacts List</title>
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
            
          a{
               float:right;
			   text-decoration: none;
			   font-weight:bold;
			   color:white;
			   padding: 5px 5px 5px 5px;
			   background-color:gray;
               }
          </style>
    </head>
    <body>
        <br><a href="logout.php">LOGOUT</a><br>
        <center><h1>Contact Form and Contact List Page</h1>
        <br><br><br>
        <h1> Add Contacts </h1>
        <br>
        <form action="addcontacts.php" method="post">
        <b>Name<b> &nbsp;&nbsp; <input type="text" name="cname" ><br><br>
        <b>Ph No<b> &nbsp;&nbsp; <input type="text" name="cph" ><br><br>
        <b>Email<b> &nbsp;&nbsp; <input type="text" name="cemail" ><br><br><br>
        <button type="submit" >Save</button><br><br>
        

        </form>
        <h1>My Contacts</h1><br><br>
    <table class="table table-striped table-dark">
    <thead style="text-align:center;">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Ph No</th>
      <th scope="col">Email</th>
      
	  
    </tr>
  </thead>
  <tbody style="text-align:center;">
	 <?php 
	   $con=mysqli_connect('localhost','root','');

	   mysqli_select_db($con,'contact_table');
	   $s = "select * from contact where secret='$secret'";

      $result=mysqli_query($con,$s);
	   foreach ($result as $r) {
		echo "<tr>";
	    echo "<td>".$r['cname']."</td>
      <td>".$r['cphone']."</td>
      <td>".$r['cemail']."</td>
     
    </tr>";
	   }
    ?> 
  </tbody>
</table>

        
       </center>
        


   </body>
</html>