<?php

include "config/db.php";

if(isset($_GET['PrintBookReport'])){
	require 'fpdf/fpdf.php';
    $PrintBookReport = $_GET['PrintBookReport'];
   

    //make query to fectch data between the date specified
    $sql = "SELECT * FROM bookings WHERE id = '$PrintBookReport'";
    $query = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($query);
// var_dump($data);
    /*A4 width : 219mm*/
$fpdf = new FPDF('P', 'mm', 'A3');
$fpdf->addPage();

//add logo
// $fpdf->image('../../images/upsalogo.jpg', 120, 5, 60);
$fpdf->Ln(20);

$fpdf->setFont('Arial', 'B', 14);
$fpdf->cell(40, 10, '',0,0);
$fpdf->cell(10, 10, 'YOUR BOOKING REPORT', 0, 0, 'C');
$fpdf->cell(40, 10, '',0,1);

// $fromTo = "FROM ".$fromDate. " - TO ". $toDate;
$fromTo = "Title will be here";

$fpdf->cell(40, 10, '',0,0);
$fpdf->cell(10, 10, strtoupper($fromTo), 0, 0, 'C');
$fpdf->cell(40, 10, '',0,1);

$fpdf->cell(40, 10, '',0,0);
$fpdf->cell(10, 10,'UPSA FACILITY REPORT', 0, 0, 'C');
$fpdf->cell(40, 10, '',0,1);

$fpdf->Ln(10);

$fpdf->setFont('Arial', 'B', 13);

// $fpdf->cell( 130, 5, 'Street Address', 1, 0);
// $fpdf->cell(59, 5, '', 1, 1); //end line
/*Cell(width , height , text , border , end line , [align] )*/
// $fpdf->cell('20', 7, '', 0, 0);
// $fpdf->cell('30', 7, 'Parking Info', 0, 0);
// $fpdf->cell('20', 7, '', 0, 1);


$fpdf->Ln(5);
  

$fpdf->SetFont('Arial','B',11);
// /*Heading Of the table*/ CREATING TABLE HEADING
// $fpdf->Cell(10 ,10,'#',1,0,'C');
$fpdf->Cell(100 ,10,'Facility: '.$data['facility'],1,1,'C');
$fpdf->Cell(100 ,10,'Booking Start Date: '.$data['start_date'],1,1,'C');
$fpdf->Cell(100 ,10,'Booking End Date: '.$data['end_date'],1,1,'C');
$fpdf->Cell(100 ,10,'Number of Days: '.$data['number_of_days'],1,1,'C');
$fpdf->Cell(100 ,10,'Facility Price: '.$data['facilityPrice'],1,1,'C');
$fpdf->Cell(100 ,10,'Total Price: '.$data['total_price'],1,1,'C');

// $fpdf->Cell(80 ,10,'Facility: '.$data['facility'],1,1,'C');
// $fpdf->Cell(80 ,10,'Facility: '.$data['facility'],1,1,'C');







		



$fpdf->output();

}