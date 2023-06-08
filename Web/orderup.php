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
    <title>Confom Order-ProtX</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
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

    body {
        margin: 0;
        padding: 0;

        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        overflow: hidden;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>
<div class="w3-black">
        <!-- Icon Bar (Sidebar - hidden on small screens) -->
        <div style="color:black">
      <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

        <a href="HOMEPAGE.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <i class="fa fa-home fa-3x "></i>
          <p><b>Home</b></p>
        </a>
        <a href="ORDER.php" class="w3-bar-item w3-button w3-padding-large w3-black">
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
        <a href="delivered.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
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

    <div class="w3-padding-large" id="main">
        <?php


        include 'config.php';
        $id = $_GET['id'];
        if (isset($_SESSION['my_variable'])) {
            // Use the session variable here
            $_SESSION['id'];
        }

        $OrderDate;
        $Package;
        $Price;
        $query = "SELECT * FROM `ordertbl` WHERE `OrdeID`= '$id'";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_array($query_run)) {
                $bid = $row["Bid"];
                $OrderDate = $row["OrderDate"];
                $Package = $row["Package"];
                $Weight = $row["Weight"];
                $Price = $row["Price"];
            }
        }

        $query = "SELECT * FROM `seller` WHERE `SellerID`= '$bid'";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_array($query_run)) {
                $zone = $row["Zone"];
            }
        }



        ?>

        <center>
            <img src="img/logo.png" width="5%">
            <h1>Order Details</h1>
        </center>
        <hr style="border:1px solid;">

        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-sm-10">
                    <h1><b>
                            <?php  ?>
                        </b></h1>
                </div>


            </div>
            <div class="row">
                <center>
                    <div class="card">
                        <div class="card-header">
                            <h1 align="center"> Update Details</h1>
                            <h5 align="center">Ceylon Port X</h>
                        </div>
                        <div class="card-body">
                            <br><br><br>
                            <form action="ordupdate.php?id=<?php echo ($id) ?>" method="post" align="center">
                                <div class="form-group">
                                    <label>Package : </label>
                                    <input type="text" name="txtstockid" class="form-control" placeholder="Enter Stock ID" value="<?php echo ($Package) ?>">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Weight : </label>
                                    <input type="text" name="txtorderid" class="form-control" placeholder="Enter Order ID" value="<?php echo ($Weight) ?>">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Price : </label>
                                    <input type="text" name="txtprice" class="form-control" placeholder="Enter Price" value="<?php echo ($Price) ?>">
                                </div>
                                <br>
                                <button class="btn btn-outline-secondary btn-sm btn-block mb-2" type="submit">
                                    Upadate</button>

                            </form>
                        </div>
                    </div>
            </div>
            </center>