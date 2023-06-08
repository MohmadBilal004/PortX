<?php
include 'config.php';
$id = $_GET['id'];
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the values from the form
    $package = $_POST['txtstockid'];
    $weight = $_POST['txtorderid'];
    $price = $_POST['txtprice'];



    $sql = "UPDATE `ordertbl` SET `Package`='$package',`Price`='$price',`Weight`='$weight' WHERE `OrdeID`='$id'"; 

           if(mysqli_query($conn,$sql))
           {
                  echo '<script> window.alert("Inserted Succesfully : ) !!!") </script>' ;
                  echo '<script> location.replace("conformord.php?id='.$id.'")</script>';  
           }
           else
           {
                echo  '<script> window.alert("Insert Unsuccesfull : ( !!!") </script>' ;   $conn->error; 
           }

   
}
?>
