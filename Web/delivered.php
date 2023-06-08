<?php
include 'count.php';
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="/path/to/bootstrap.min.css" rel="stylesheet">
<link href="/path/to/buttons.css" rel="stylesheet">

<head>
  <link rel="icon" href="img/logo.png" type="image/gif">
  <title>Delivered Order-ProtX</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<style>
   html{
    background-image:url('img/BG_all.jpg');
    background-repeat: no-repeat;
    background-size: cover;
  }
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
  .sales{
    background-color: rgba(255, 255, 255, 0.5);
  }
  .tbody-bg{
    background-color: rgba(0, 0, 0, 0.1);

  }

</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body class = sales>
  <div class="w3-black">
    <!-- Icon Bar (Sidebar - hidden on small screens) -->
    <div style="color:black">
      <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

        <a href="HOMEPAGE.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <i class="fa fa-home fa-3x "></i>
          <p><b>Home</b></p>
        </a>
        <a href="ORDER.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <div class="notification">
            <img src="img/My project.png" width="120%"><span class="badge"><?php echo $count; ?></span><br>
            <p><b>New</b></p>
          </div>
        </a>
        <a href="Corder.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <div class="notification">
            <img src="img/My project2.png" width="100%">
            <?php
            include 'count.php';
            if ($connt2 > 0) {
            ?>
              <span class="badge"><?php echo $connt2; ?></span><?php } ?>
            <p><b>Ready</b></p>
          </div>
          </a>
          <a href="Delivered.php" class="w3-bar-item w3-button w3-padding-large w3-black">
          <img src="img/My project3.png" width="100%">
          <p><b>Delivered</b></p>
        </a>
        <a href="sales.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <img src="img/My project6.png" width="100%">
            <p><b>Sales</b></p>
        </a>
          <a href="REPORTCHART.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <img src="img/4.png" width="80%">
          <p><b>Report</b></p>
        </a>
        
        <a href="login.html" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <i class="fa fa-sign-out fa-3x"></i>
          <p><b>Logout</b></p>
        </a>
      </nav>
    </div>
    <!-- Navbar on small screens (Hidden on medium and large screens) -->
    <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
      <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
        <a href="HOMEPAGE.html" class="w3-bar-item w3-button" style="width:25% !important"><b>Home</b></a>
        <a href="Add_stock.php" class="w3-bar-item w3-button" style="width:25% !important"><b>E-oreder</b></a>
        <a href="view_stock.php" class="w3-bar-item w3-button" style="width:25% !important">Ready Order</a>
        <a href="view_stock.php" class="w3-bar-item w3-button" style="width:25% !important">Delivered Order</a>
        <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">Report</a>
      </div>
    </div>
  </div>

  <center>
    <img src="img/logo.png" width="5%">
    <h1>Delivered</h1>
  </center>

  <br>
  <div class="container pb-5 mt-n2 mt-md-n3">
    <div class="row">


      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">OrderID</th>
            <th scope="col">BillID</th>
            <th scope="col">Delivered date</th>
            <th scope="col">Package</th>
            <th scope="col">Price</th>
            <th scope="col">Weight</th>
            <th scope="col">Payment_Method</th>
            <th scope="col">Status</th>
            <th scope="col">View</th>

          </tr>
        </thead>
        <tbody class= "tbody-bg" >
          <?php
          include 'CONFIG.php';
          $query = "SELECT * FROM `ordertbl` WHERE `Status`='Delivered'";
          $query_run = mysqli_query($conn, $query);
          $check_data = mysqli_num_rows($query_run) > 0;
          if ($check_data) {
            while ($row = mysqli_fetch_array($query_run)) {
          ?>


              <tr>
                <th scope="row"> <?php echo $row["OrdeID"]; ?></th>
                <td><?php echo $row["Bid"]; ?></td>
                <td> <?php echo $row["Delivereddate"]; ?></td>
                <td><?php echo $row["Package"]; ?></td>
                <td>Rs. <?php echo $row["Price"]; ?> /=</td>
                <th scope="row" style="color: red;"><?php echo $row["Weight"]; ?> Kg</td>
                <td><?php echo $row["Payment_Method"]; ?></td>
                <td style="color:green"><i class="fa fa-check-circle"></i> Delivered</td>
                <td><a href="delview.php?id=<?php echo $row["OrdeID"]; ?>"><button class="btn btn-outline-secondary btn-sm btn-block mb-2" type="button">
                      View</button></a></td>
              </tr>
          <?php }
          } ?>
        </tbody>
      </table>
    </div>
  </div>
  <center> <a href="HOMEPAGE.php"><button type="button" class="btn btn-secondary"><i class="fa fa-arrow-circle-left fa-3x"></i></button></a></center>


</body>

</html>