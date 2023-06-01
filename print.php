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
$select = "SELECT * FROM `drivertbl` WHERE `Email` = '$id'";
$result = $conn->query($select);

while ($row = $result->fetch_object()) {
    $Fname = $row->Fname;
    $LName = $row->LName;
    $Phone = $row->Phone;
    $Licsense = $row->Licsense;
    $Location = $row->Location;
    $Jobs = $row->Jobs;
    $Commission = $row->Commission;
    $Kilometers = $row->Kilometers;
    $Fuelcharges = $row->Fuelcharges;
    $serviceCharges = $row->serviceCharges;

}

$pdf = new PDF();
$pdf->AddPage();

$header = array('First Name', 'Last Name', 'Phone Number', 'Licsense', 'Location', 'Deliveries', 'Commission', 'Kilometers', 'Fuel Charges', 'Services Charges');
$data = array(array($Fname, $LName, $Phone, $Licsense, $Location, $Jobs, $Commission, $Kilometers, $Fuelcharges,  $serviceCharges));

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
