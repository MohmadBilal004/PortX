<?php
include 'CONFIG.PHP';
// $connection = mysqli_connect("localhost","root","");
// $db = mysqli_select_db($connection,"dbcrud");

$deleteID = $_GET['del'];

$sql = "delete from stock_tbl where StockID = '$deleteID'";
$result = mysqli_query($connection,$sql);

if($result) {
            echo '<script> window.alert("Successfully record Deleted :) !!!")</script>';  
            echo '<script> location.replace("VIEWSTOCK.PHP")</script>';  
           } else {
           echo "Some thing Error :( " . $connection->error;
           }
?>