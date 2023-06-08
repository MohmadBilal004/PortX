<!-- CEYLON PORT X -->
<?php       
      include 'CONFIG.php';
?>
<!DOCTYPE html>
<html>
<title>VIEWS STOCK</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>   
 th, td {border-style: outset;}
</style>

<!-- NAVIGATION PANNEL -->
<div class="topnav"> 
  <a href="VIEWSTOCK.PHP">VIEW STOCK</a> <br>
  <a href="ADDSTOCK.PHP">ADD STOCK</a> <br>
  <a href="#ORDERS">ORDERS</a> <br>
  <a href="#STOCK_REPORT">STOCK REPORT</a> <br>
</div>

<body class="">
  <h1 align="center">VIEW STOCK DETAILS</h1>
  <h5 align="center">Ceylon Port X</h5>
  <table style="width:70%" align="center">
  <thead>
    <tr><button class="btn btn-danger"><a href='ADD.php' class="text-light"> ADD STOCK </a> </button>  </tr>
  <tr>
    <th>Stock ID</th>
    <th>Order ID</th>
    <th>Stock Type</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Product Description</th>
    <th>CRUD Option</th>
  </tr>
  </thead>
  <?php
      include 'config.php';
      $query = "SELECT * FROM stock_tbl";
      $query_run = mysqli_query($conn, $query);
      $check_data = mysqli_num_rows($query_run) > 0;
      if ($check_data) {
          while ($row = mysqli_fetch_array($query_run)) {   
            $StockID = $row['StockID'];
            $OrderID = $row['OrderID'];
            $Price = $row['Price'];
            $Qty = $row['Qty'];
            $StockType = $row['StockType'];
            $Product_Description = $row['product_Description'];    
    ?>

  <tr align="center">
    <td><?php echo $StockID ?></td>
    <td><?php echo $OrderID ?></td>
    <td><?php echo $Price ?></td>
    <td><?php echo $Qty ?></td>
    <td><?php echo $StockType ?></td>
    <td><?php echo $Product_Description ?></td>
  <td> 
      <button class="btn btn-success"><a href='UPDATE.php?edit=<?php echo $StockID ?>' class="text-light"> Update </a> </button> &nbsp; &nbsp;
      <button class="btn btn-danger"><a href='DELETE.php?del=<?php echo $StockID ?>' class="text-light"> Delete </a> </button>  
      
  </td>
  </tr> 
  <?php }}  // line 54,55 brackets ?>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  </table>
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Created by Team Ceylon Port X</p>
</body>
<!-- Need to add Footer ??? -->
</html>
