<?php session_start();
   
    $Email = $_GET["id"];

    $con = mysqli_connect("localhost","root","","portx");
	 
	    if(!$con) {
	        die("Sorry !!! we are facing technical issue"); 
	    }

        $sql = "DELETE FROM `drivertbl` WHERE `Email` = '".$Email."'" ;
                    
        if(mysqli_query($con,$sql)){
            echo "File Deleted Successfully";
        }else{
            echo "Could not Delete";
        }
        header('Location:ViewRider.php');
     
?>