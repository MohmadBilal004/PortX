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
    <title>Driver Registration</title>
</head>
<body>


<script>
        function validateInput() {
            var input = document.getElementById("txtNic").value;
            if (input.length === 12 && !input.endsWith("x") && !input.endsWith("v")) {
                alert("Input should end with 'x' or 'v'!");
            }
        }
    </script>

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
          <p><b>Driver Report</b></p>
        </a>
        <a href="Registration.php" class="w3-bar-item w3-button w3-padding-large w3-black">
          <img src="Images/registration.png" width="80%">
          <p><b>Register Driver</b></p>
        </a>
        <a href="ViewRider.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <div class="notification">
            <img src="Images/UserList.png" width="120%"><span class="badge"></span><br>
            <p><b>View Riders</b></p>
          </div>
        </a>
    
        </a>
      </nav>
    </div>
    <!-- Navbar on small screens (Hidden on medium and large screens) -->

  </div>

  

    <div class = "container">
        <form action="RegistrationHandler.php" method="post" enctype="multipart/form-data">
            <h2>Driver Registration Form</h2>
            <div class="content">
                <div class="input-box">
                    <label for="name">First Name</label>
                    <input type="text" placeholder="Enter your first name" id = "txtFname" name = "txtFname" required>
                </div>
                <div class="input-box">
                    <label for="username">Last Name</label>
                    <input type="text" placeholder="Enter your last name" id = "txtLname"  name = "txtLname" required>
                </div>
                <div class="input-box">
                    <label for="nic">National Identity Card</label>
                    <input type="text" placeholder="Enter your NIC Number" id =  "txtNic" name = "txtNic" maxlength="12"  minlength = "10"required>
                </div>

                <div class="input-box">
                    <label for="Licsense">Driving Licsense</label>
                    <input type="text" placeholder="Enter your Driving Licsense" id = "txtDLicsense" name = "txtDLicsense" required>
                </div>

                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter valid Email address" id = "txtEmail" name = "txtEmail" required>
                </div>
                <div class="input-box">
                    <label for="phonenumber">Phone Number</label>
                    <input type="tel" placeholder="Enter phone number" id = "txtPhone" name = "txtPhone" maxlength="10" minlength = "10" required>
                </div>
                <div class="input-box">
                    <label for="phonenumber">Kilometer driven</label>
                    <input type="number" placeholder="Enter Kilometer driven" id = "txtkilometer" name = "txtkilometer" >
                </div>

                <div class="input-box">
                    <label for="phonenumber">Commission per kilometer</label>
                    <input type="number" placeholder="Enter commission" id = "txtcomission" name = "txtcomission" >
                </div>

                <div class="input-box">
                    <label for="phonenumber">Jobs Done</label>
                    <input type="number" placeholder="Number of Jobs Done" id = "txtjobs" name = "txtjobs" >
                </div>

                <div class="input-box">
                    <label for="phonenumber">Fuel Charges</label>
                    <input type="number" placeholder="Enter Fuel charges" id = "txtfuel" name = "txtfuel" >
                </div>

                <div class="input-box">
                    <label for="phonenumber">Service Charges</label>
                    <input type="number" placeholder="Enter Service charges" id = "txtservice" name = "txtservice" >
                </div>

                <div class="input-box">
                <label>Location</label>
                <select name="lstLocation">
                    <option value="Colombo 1">Colombo 1</option>
                    <option value="Colombo 2">Colombo 2</option>
                    <option value="Colombo 3">Colombo 3</option>
                    <option value="Colombo 4">Colombo 4</option>
                    <option value="Colombo 5">Colombo 5</option>
                </select>
                </div>

                
           
                <div class="input-box">
                    <label>Profile picture</label>
                    <input type="file" placeholder="Upload your picture" id= "imageFile" name = "imageFile">
                </div>
                
                <span class = "gender-title">Gender</span>
                <div class="gender-category">
                    <span for="gender">Male</span>
                    <input type="radio" name="male" id="male" >
                    <br>
                    <span for="gender">Female</span>
                    <input type="radio" name="female" id="female" >   
                </div>
                
                
            </div>
            <div class="alert">
                <p>By clicking Sign up, you agree to our  <a href="#">terms</a> , <a href="#">privacy policy</a> and  <a href="#">cookies policy </a>. You may recieve sms notifications from  us and can opt out at any time.
                </p>
            </div> 
                <button type = "submit" id = "Submitbtn" name = "Submitbtn" class = "Submitbtn" onclick="validateInput()">Register</button>   
        </form>
    </div>


    <script>
    const radioButtons = document.querySelectorAll('input[type="radio"]');   // this function is for the radio group since both the radio button is not having same name both the values are able to be selected.This function is to avoid that.

    radioButtons.forEach(function(radioButton) {
      radioButton.addEventListener('click', function() {   
        // Uncheck all radio buttons
        radioButtons.forEach(function(rb) {
          rb.checked = false;
        });

        // Check the selected radio button
        this.checked = true;
      });
    });
    


  </script>


</body>
</html>