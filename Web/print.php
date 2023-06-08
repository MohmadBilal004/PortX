<?php
ob_start();
require('pdf/fpdf.php');

class PDF extends FPDF {
    function Header() {
        // Add your header code here
    }

    function Footer() {
        // Add your footer code here
    }
}

// Database Connection 
include 'CONFIG.php';
// Select data from MySQL database
$id = $_GET['id'];
$select = "SELECT * FROM `ordertbl` WHERE `OrdeID`= '$id'";
$result = $conn->query($select);

while ($row = $result->fetch_object()) {
    $bid = $row->Bid;
    $OrderDate = $row->OrderDate;
    $DeliverDate = $row->Delivereddate;
    $Package = $row->Package;
    $Weight = $row->Weight;
    $Price = $row->Price;
    $rider = $row->DriverName;
    $PaymentMethod = $row->Payment_Method;
}

$pdf = new PDF();
$pdf->AddPage();

$header = array('Business ID', 'Order Date', 'Delivered Date', 'Package', 'Weight', 'Price', 'Payment Method', 'Rider name');
$data = array(array($bid, $OrderDate, $DeliverDate, $Package, $Weight, $Price, $PaymentMethod, $rider));

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Delivered Order Details', 0, 1, 'C');
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('', 'B');

foreach($header as $col) {
    $pdf->Cell(40, 7, $col, 1);
}
$pdf->Ln();

foreach($data as $row) {
    foreach($row as $col) {
        $pdf->Cell(40, 6, $col,1);
    }
    $pdf->Ln();
}

ob_end_clean();
$pdf->Output();
