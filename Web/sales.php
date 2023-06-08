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
  .transparent-div {
    opacity: 0.5;
  }
  .sales{
    background-color: rgba(255, 255, 255, 0.5);
  }
  .tbody-bg{
    background-color: rgba(0, 0, 0, 0.1);

  }

  
</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
     //const monthDropdown = document.getElementById("month");
     //   const selectedMonth = monthDropdown.value;

        $(function() {
        $("#month").change(function() {
            GetAllDataRealtime();
        });
    });

    </script> 
    
  

<body class = sales >
<div >
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
        <a href="Delivered.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <img src="img/My project3.png" width="100%">
          <p><b>Delivered</b></p>
        </a>
        <a href="sales.php" class="w3-bar-item w3-button w3-padding-large w3-black">
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
    <h1>Sales Report</h1>
  </center>
  <div style="text-align:right; padding-right: 260px;">
  <form method="POST">
  <label for="month">Select a month:</label>
  <select id="month" name="month">
    <option value="">--Select--</option>
    <option value="1">January</option>
    <option value="2">February</option>
    <option value="3">March</option>
    <option value="4">April</option>
    <option value="5">May</option>
    <option value="6">June</option>
    <option value="7">July</option>
    <option value="8">August</option>
    <option value="9">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
  </select>
  <input type= "submit" name="submit" value ="OK"/>
  </form>
</div>
<br>
<div  class="container pb-5 mt-n2 mt-md-n3">
  <div class="row">
    <table  class="table">
      <thead class="thead-dark" >
        <tr>
          <th scope="col">No.Of Orders</th>
          <th scope="col">Amount</th>
          <th scope="col">Expenses</th>
        </tr>
      </thead>
      <tbody class= "tbody-bg" >
        <?php
          include 'CONFIG.php';
          if(isset($_POST['submit']) && !empty($_POST['month']))
          {
            $month = $_POST['month'];
            {
              switch ($month) {
                case 1:
                  echo "<strong>January</strong>";
                  break;
                case 2:
                  echo "<strong>February</strong>";
                  break;
                case 3:
                  echo "<strong>March</strong>";
                  break;
                case 4:
                  echo "<strong>April</strong>";
                  break;
                case 5:
                  echo "<strong>May</strong>";
                  break;
                case 6:
                  echo "<strong>June</strong>";
                  break;
                case 7:
                  echo "<strong>July</strong>";
                  break;
               case 8:
                  echo "<strong>Auguest</strong>";
                  break;
                case 9:
                  echo "<strong>September</strong>";
                  break;
                case 10:
                  echo "<strong>October</strong>";
                  break;
                case 11:
                  echo "<strong>November</strong>";
                  break;
                case 12:
                  echo "<strong>December</strong>";
                  break;
                default:
                  echo "<center>Invalid month</center>";
                  break;
              }
            }
            $query = "SELECT * FROM `ordertbl` WHERE `Status`='Delivered' AND MONTH(`Delivereddate`)='$month'";
            $query2 = "SELECT COUNT(`OrdeID`) as total_orders FROM `ordertbl` WHERE `Status`='Delivered' AND MONTH(`Delivereddate`)='$month'";
            $query3 = "SELECT SUM(`Price`) as total_amount FROM `ordertbl` WHERE `Status`='Delivered' AND MONTH(`Delivereddate`)='$month'";
          }
          else
          {
            $query = "SELECT * FROM `ordertbl` WHERE `Status`='Delivered'";
            $query2 = "SELECT COUNT(`OrdeID`) as total_orders FROM `ordertbl` WHERE `Status`='Delivered'";
            $query3 = "SELECT SUM(`Price`) as total_amount FROM `ordertbl` WHERE `Status`='Delivered'";
            $month = null;

          }

          $result1 = mysqli_query($conn, $query2);
          $result2 = mysqli_query($conn, $query3);

          $check_data = mysqli_num_rows($result1) > 0;

          $total_orders = 0;
          $total_amount = 0;
        
          if($check_data)
          {
            $row = mysqli_fetch_assoc($result1);
            $total_orders = $row['total_orders'];

            $row = mysqli_fetch_assoc($result2);
            $total_amount = $row['total_amount'];

          }
        ?>
        <!-- <div style="text-align: center; font-weight: bold;"><?php echo $month; ?></div> -->
        <tr>
          <td><?php echo $total_orders; ?></td>
          <td><?php echo $total_amount; ?></td>
          <td>Expenses data here</td>
        </tr>
      </tbody>
    </table>
    <a href="printSales.php?total_orders=<?php echo $total_orders; ?>&total_amount=<?php echo $total_amount; ?>&month=<?php echo $month; ?>"><button type="button" class="w3-button w3-light-grey w3-padding-large"><i class="fa fa-print w3-large"></i>&nbsp;print pdf</button></a>
     
  </div>
</div>
</div>

  <center> <a href="HOMEPAGE.php"><button type="button" class="btn btn-secondary"><i class="fa fa-arrow-circle-left fa-3x"></i></button></a></center>


</body>

</html>