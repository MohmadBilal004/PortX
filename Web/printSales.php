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

$monthNames = array(
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December'
);

$total_orders = $_GET['total_orders'];
$total_amount = $_GET['total_amount'];
$month = $_GET['month'];

$monthName = isset($monthNames[$month]) ? $monthNames[$month] : '';

// Database Connection 
include 'CONFIG.php';
// Select data from MySQL database
$id = $_GET['id'];
$select = "SELECT * FROM `ordertbl` WHERE `OrdeID`= '$id'";
$result = $conn->query($select);

while ($row = $result->fetch_object()) {
    $total_orders = $row->total_orders;
    $total_amount = $row->total_amount;
}

$pdf = new PDF();
$pdf->AddPage();

$header = array('Month', 'Total Orders', 'Total Amount', 'Total Expenses');
$data = array(array($monthName, $total_orders, $total_amount));

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Total Sales Details', 0, 1, 'C');
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('', 'B');

foreach ($header as $col) {
    $pdf->Cell(40, 7, $col, 1);
}
$pdf->Ln();

foreach ($data as $row) {
    foreach ($row as $col) {
        $pdf->Cell(40, 6, $col, 1);
    }
    $pdf->Ln();
}

ob_end_clean();
$pdf->Output();
