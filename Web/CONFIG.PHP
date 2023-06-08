<!-- CEYLON PORT X -->
<?php 

  // Method 01
  // $server ="localhost:3308"; 
  // $user = "root";
  // $pass = "";
  // $database = "stock_managment";
  // $conn = mysqli_connect($server,$user,$pass,$database); 
  // $db = mysqli_select_db($conn,$database);

  $conn = mysqli_connect("localhost:3306","root","","stock_managment");
  $db = mysqli_select_db($conn,"stock_managment");
  
  if (!$conn) {
    die ("<script>alert('Connection faild Please try again.')</script>");
  }

  ?>


<!--Each Member have to cover 
Database 
Business 
report genrate 
UI UX Design 
????? -->


