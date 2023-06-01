<?php session_start();
    
    $Email = $_GET["id"];

    if(isset($_POST["Submitbtn"])){
        $Fname = $_POST["txtFname"];
        $Lname = $_POST["txtLname"];
        $nicNo = $_POST["txtNic"];
        $Licsense = $_POST["txtDLicsense"];
        $location = $_POST["lstLocation"];
        $Phone = $_POST["txtPhone"];
        $image = "uploads/".basename($_FILES["imageFile"]["name"]);
        move_uploaded_file($_FILES["imageFile"]["tmp_name"],$image);
        $deliveries = $_POST["txtjobs"];
        $kilometer = $_POST["txtkilometer"];
        $commission = $_POST["txtcomission"];
        $Fuelcharges =  $_POST["txtfuel"];
        $serviceCharges = $_POST["txtservice"];
    
        if(isset($_POST["male"]))
        {
            $gender = "Male";
        }
        else if(isset($_POST["female"]))
        {
            $gender = "Female";
        }

        $con = mysqli_connect("localhost","root","","portx");
	    if(!$con) {
	        die("Sorry !!! we are facing technical issue"); 
	    }

        $sql = "UPDATE `drivertbl` SET `Fname`='".$Fname."',`LName`='".$Lname."',`NICno`='".$nicNo."',`Licsense`='".$Licsense."',`Location`='".$location."',`Phone`='".$Phone."',`Gender`='".$gender."',`Photo`='".$image."',`Jobs`='".$deliveries."',`Kilometers`='".$kilometer."',`Fuelcharges`='".$Fuelcharges."',`serviceCharges`='".$serviceCharges."',`Commission`='".$commission."' WHERE `Email` = '$Email'";
                    
        if(mysqli_query($con,$sql)){
            echo "File Updated Successfully";
        }else{
            echo "Could not update Please check the form again";
        }
        
        }
?>