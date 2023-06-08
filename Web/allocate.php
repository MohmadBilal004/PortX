<?php

include 'CONFIG.php';



$id = $_POST['OrderID'];
$driver = $_POST['driver'];



$reg = "UPDATE `ordertbl` SET `DriverName`='$driver',`Status`='conformed' WHERE `OrdeID`='$id'";
$result = mysqli_query($conn, $reg);

if ($result === false) {
        echo $conn->error;
        echo $driver;
        exit;
}


if ($result) {
    header("location:ORDER.php");
}



?>