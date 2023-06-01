<?php session_start();
if(isset($_POST["Submitbtn"])){
    $Fname = $_POST["txtFname"];
    $Lname = $_POST["txtLname"];
    $nicNo = $_POST["txtNic"];
    $Licsense = $_POST["txtDLicsense"];
    $Location = $_POST["lstLocation"];
    $Email = $_POST["txtEmail"];
    $Phone = $_POST["txtPhone"];
    $image = "uploads/".basename($_FILES["imageFile"]["name"]);
    move_uploaded_file($_FILES["imageFile"]["tmp_name"],$image);
    $jobs = $_POST["txtjobs"];
    $kilometer = $_POST["txtkilometer"];
    $fuel = $_POST["txtfuel"];
    $service = $_POST["txtservice"];
    $commission = $_POST["txtcomission"];

    if(isset($_POST["male"]))
    {
        $gender = "Male";
    }
    else if(isset($_POST["female"]))
    {
        $gender = "Female";
    }

    $con = mysqli_connect("localhost", "root", "", "portx");

    if(!$con){
        die("Cannot connect to Database Server"); 
    }

    $sql = "INSERT INTO `drivertbl`(`Fname`, `LName`, `NICno`, `Licsense`, `Location`, `Email`, `Phone`, `Gender`, `Photo`, `Jobs`, `Kilometers`, `Fuelcharges`, `serviceCharges`, `Commission`) VALUES ('".$Fname."','".$Lname."','".$nicNo."','".$Licsense."','".$Location."','".$Email."','".$Phone."','".$gender."','".$image."','".$jobs."','".$kilometer."','".$fuel."','".$service."','".$commission."')"; 
    mysqli_query($con, $sql);

  
}

    
 
?>