
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="/path/to/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="CSS/navigator.css" type="text/css">

<head>
  <link rel="icon" href="Images/My project5.png" type="image/gif">
  <title>Driver Report</title>

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
        <li><a href="#">Home</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Home</a></li>
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
        <a href="Report.php" class="w3-bar-item w3-button w3-padding-large w3-black">
          <img src="Images/4.png" width="100%">
          <p><b>Driver Report</b></p>
        </a>
        <a href="Registration.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <img src="Images/registration.png" width="100%">
          <p><b>Register Driver</b></p>
        </a>
        <a href="ViewRider.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <div class="notification">
            <img src="Images/UserList.png" width="150%">
            <p><b>View Riders</b></p>
          </div>
        </a>
       
        </a>
      </nav>
    </div>
    <!-- Navbar on small screens (Hidden on medium and large screens) -->
  </div>
    <!-- Navbar on small screens (Hidden on medium and large screens) -->

  <center>
    <h1>Driver Report</h1>
  </center>

  <br>
  <div class="container pb-5 mt-n2 mt-md-n3">
    <div class="row">


      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">License</th>
            <th scope="col">Location</th>
            <th scope="col">Delivery Count</th>
            <th scope="col">Comission per delivery</th>
            <th scope="col">Kilometers Driven</th>
            <th scope="col">Fuel Charges</th>
            <th scope="col">Service Charges</th>
            <th scope="col">Total Expense</th>
            <th scope="col">Print PDF</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'CONFIG.php';
       
          $query = "SELECT * FROM `drivertbl`";
          $query_run = mysqli_query($conn, $query);

         

        // Return result
          $check_data = mysqli_num_rows($query_run) > 0;
          if ($check_data) {
            while ($row = mysqli_fetch_array($query_run)) {
              $email = $row["Email"];
              $product = $row['Fuelcharges'] + $row['serviceCharges'];
          ?>
              <tr>
                <th scope="row"> <?php echo $row["Fname"]; ?></th>
                <td><?php echo $row["LName"]; ?></td>
                <td> <?php echo $row["Phone"]; ?></td>
                <td><?php echo $row["Licsense"]; ?></td>
                <td><?php echo $row["Location"]; ?></td>
                <th ><?php echo $row["Jobs"]; ?></td>
                <td><?php echo $row["Commission"]; ?></td>
                <td><?php echo $row["Kilometers"]; ?></td>
                <td><?php echo $row["Fuelcharges"]; ?></td>
                <td><?php echo $row["serviceCharges"]; ?></td>
                <td><?php echo $product; ?></td>
                <td><a href="print.php?id=<?php echo $email; ?>"><button type="button" class="w3-button w3-light-grey w3-padding-large"><i class="fa fa-print w3-large"></i>&nbsp;print pdf</button></a>
                </td>
              </tr>
          <?php }
          } ?>
        </tbody>
      </table>
    </div>
  </div>
  
</body>

</html>