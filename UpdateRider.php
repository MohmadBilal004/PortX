<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/path/to/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <link href="CSS/additem.css" type="text/css" rel="stylesheet" />
    <link href="CSS/navigator.css" type="text/css" rel="stylesheet" />
  
    <title>Update Driver</title>
</head>


<style>
  .w3-row-padding img {
    margin-bottom: 12px
  }

  .w3-sidebar {
    width: 120px;
    background: #00ffff;
  }

  #main {
    margin-left: 150px
  }

  @media only screen and (max-width: 600px) {
    #main {
      margin-left: 0
    }
  }

  .notification {
    text-decoration: none;
    padding: 10px 20px;
    position: relative;
    display: inline-block;
    border-radius: 2px;
  }

  .notification .badge {
    position: absolute;
    top: -10px;
    right: -3px;
    padding: 5px 10px;
    border-radius: 50%;
    background-color: red;
    color: white;
  }
</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<body>


<?php
  $con = mysqli_connect("localhost","root","","portx");
	 
  if(!$con) {
    die("Sorry !!! we are facing technical issue"); 
  }
  $sql = "SELECT * FROM `drivertbl` WHERE `Email` = '".$_GET["id"]."'";
  $result = mysqli_query($con,$sql);

  if(mysqli_num_rows($result)>0)
	 {
		$row = mysqli_fetch_assoc($result);

  ?>
   
   <header>
    <nav>
    <input type ="checkbox" id = "check">
    <label for="check" class = "checkbtn">
        <i class = "fas fa-bars"></i>
    </label>
    <div class = "logo">
        <img src = "Images/DD.png">
    </div>
    <ul>
        <li><a class = "active" href="#">Home</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Seller Management</a></li>
        <li><a href="#">Buyer Management</a></li>
        <li><a href="#">Rider Managment</a></li>
        <li><a href="#">Home</a></li>
    </ul>
    </nav>
</header>



   <div class="w3-black">
    <!-- Icon Bar (Sidebar - hidden on small screens) -->
    <div style="color:black">
      <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

        <a href="HOMEPAGE.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <i class="fa fa-home fa-3x "></i>
          <p><b>Home</b></p>
        </a>
        <a href="Report.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <img src="Images/4.png" width="80%">
          <p><b>Report</b></p>
        </a>
        <a href="Registration.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <img src="Images/registration.png" width="100%">
          <p><b>Register Driver</b></p>
        </a>
        <a href="ViewRider.php" class="w3-bar-item w3-button w3-padding-large w3-black">
          <div class="notification">
            <img src="Images/UserList.png" width="100%">
            <p><b>View Riders</b></p>
          </div>
        </a>
        
   
  </div>

    <div class = "container">
        <form action="UpdateHandler.php?id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data">
            <h2>Driver Details Update Form</h2>
            <div class="content">
                <div class="input-box">
                    <label for="name">First Name</label>
                    <input type="text" placeholder="Enter your first name" id = "txtFname" name = "txtFname" value = "<?php echo $row["Fname"]; ?>" required>
                </div>
                <div class="input-box">
                    <label for="username">Last Name</label>
                    <input type="text" placeholder="Enter your last name" id = "txtLname"  name = "txtLname" value = "<?php echo $row["LName"]; ?>"required>
                </div>
                <div class="input-box">
                    <label for="nic">National Identity Card</label>
                    <input type="text" placeholder="Enter your NIC Number" id =  "txtNic" name = "txtNic" value = "<?php echo $row["NICno"]; ?>"required>
                </div>
                <div class="input-box">
                    <label for="Licsense">Driving Licsense</label>
                    <input type="text" placeholder="Enter your Driving Licsense" id = "txtDLicsense" name = "txtDLicsense" value = "<?php echo $row["Licsense"]; ?>"required>
                </div>

                <div class="input-box">
                    <label for="phonenumber">Phone Number</label>
                    <input type="tel" placeholder="Enter phone number" id = "txtPhone" name = "txtPhone" maxlength="10" value = "<?php echo $row["Phone"]; ?>" required>
                </div>
                <div class="input-box">
                    <label for="phonenumber">Number of kilometer driven</label>
                    <input type="number" placeholder="Enter Kilometer driven" id = "txtkilometer" name = "txtkilometer" value = "<?php echo $row["Kilometers"]; ?>" >
                </div>

                <div class="input-box">
                    <label for="phonenumber">Commission per kilometer</label>
                    <input type="tel" placeholder="Enter commission" id = "txtcomission" name = "txtcomission" value = "<?php echo $row["Commission"]; ?>">
                </div>  
 
                <div class="input-box">
                    <label for="phonenumber">Jobs Done</label>
                    <input type="number" placeholder="Number of Jobs Done" id = "txtjobs" name = "txtjobs" value = "<?php echo $row["Jobs"]; ?>">
                </div>


                <div class="input-box">
                    <label for="phonenumber">Fuel Charges</label>
                    <input type="number" placeholder="Enter Fuel charges" id = "txtfuel" name = "txtfuel" value = "<?php echo $row["Fuelcharges"]; ?>">
                </div>

                <div class="input-box">
                    <label for="phonenumber">Service Charges</label>
                    <input type="number" placeholder="Enter Service charges" id = "txtservice" name = "txtservice"value = "<?php echo $row["serviceCharges"]; ?>" >
                </div>


                <div class="input-box">
                <label>Location</label>
                <select name="lstLocation" value = "<?php echo $row["Location"]; ?>">
                    <option value="Colombo 1">Colombo 1</option>
                    <option value="Colombo 2">Colombo 2</option>
                    <option value="Colombo 3">Colombo 3</option>
                    <option value="Colombo 4">Colombo 4</option>
                    <option value="Colombo 5">Colombo 5</option>
                </select>
                </div>
           
                <div class="input-box">
                    <label>Profile picture</label>
                    <input type="file" placeholder="Upload your picture" id= "imageFile" name = "imageFile" value = "<?php echo $row["Photo"]; ?>">
                </div>
                
                <span class = "gender-title">Gender</span>
                <div class="gender-category">
                    <input type="radio" name="male" id="male">
                    <label for="gender">Male</label>
                    <input type="radio" name="female" id="female">
                    <label for="gender">Female</label>
                </div>

        
            </div>
                <button type = "submit" id = "Submitbtn" name = "Submitbtn" class = "Submitbtn">Update Details</button>   

            <?php
           }
              mysqli_close($con);
           ?>
        </form>
    </div>
</body>
</html>