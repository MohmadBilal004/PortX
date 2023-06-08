<style>
body{
    background:#FOF;
    margin:10%;
}
table{
    background:#EEE;
    width:100;
    border:1px solid border-collapse:
}
td{
    border:1px solid #000;
    padding:10px;
}
tr{
    
}
</style>

<?php 
$invoice="0001";
$cname="Saidh Umar";
$pname="HDD";
$qty=55;
$cost=25;
$price=35.5;
$tc=$qty*$cost;
$tp=$qty*$price;
$np=$tp-$tc;
$date=date("y/m/d");
?>
<center><h1> Sales Report </h1>
<hr>
<table>
    <tr><td>Invoice Number</td><td><?php echo $invoice; ?></td></tr>
    <tr><td>Customer NAme</td><td><?php echo $cname; ?></td></tr>
    <tr><td>Product Name</td><td><?php echo $pname; ?></td></tr>
    <tr><td>Quantity</td><td><?php echo $qty; ?></td></tr>
    <tr><td>Price</td><td><?php echo $price; ?></td></tr>
    <tr><td>Toxvtal Cost</td><td><?php echo $tc; ?></td></tr>
    <tr><td>Total Price</td><td><?php echo $tp; ?></td></tr>
    <tr><td>Net Profit</td><td><?php echo $np; ?></td></tr>
    <tr><td>Sales Date</td><td><?php echo $date; ?></td></tr>
</table>





 