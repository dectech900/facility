<?php
include '../config/db.php';

if(isset($_GET['reportPrintDate']) && $_GET['reportPrintDate'] == 'Todayreport'){
	
	    require '../fpdf/fpdf.php';
        $sql = "SELECT * FROM bookings WHERE created_at >= CURRENT_DATE() ORDER BY created_at DESC";
        $bookingQuery = mysqli_query($conn, $sql);
    
    
 
 /*A4 width : 219mm*/
$fpdf = new FPDF('P', 'mm', 'A3');
$fpdf->addPage();

//add logo
// $fpdf->image('../../images/upsa-logo.jpg', 70, 5, 60);
$fpdf->Ln(17);

$fpdf->setFont('Arial', 'B', 10);

// $fpdf->cell( 130, 5, 'Street Address', 1, 0);
// $fpdf->cell(59, 5, '', 1, 1); //end line
/*Cell(width , height , text , border , end line , [align] )*/
$fpdf->cell('100', 7, '', 0, 0);
$fpdf->cell('30', 7, 'Daily Report on facility Bookings ', 0, 0);
$fpdf->cell('100', 7, '', 0, 1);



$fpdf->Ln(10);
  

$fpdf->SetFont('Arial','B',10);
// /*Heading Of the table*/ CREATING TABLE HEADING
// $fpdf->Cell(10 ,10,'#',1,0,'C');
$fpdf->Cell(60 ,10,'Facility',1,0,'C');
$fpdf->Cell(50 ,10,' Email',1,0,'C');
$fpdf->Cell(47 ,10,' Phone',1,0,'C');

$fpdf->Cell(25 ,10,'Start Date',1,0,'C');
$fpdf->Cell(25 ,10,'End Date',1,0,'C');
$fpdf->Cell(10 ,10,'Days',1,0,'C');
$fpdf->Cell(25 ,10,'Price',1,0,'C');
$fpdf->Cell(25 ,10,'Total_price',1,0,'C');
// $fpdf->Cell(36 ,10,'Book Time',1,0,'C');
$fpdf->Cell(40 ,10,'Created On',1,1,'C');


/*Heading Of the table end*/
$fpdf->SetFont('Arial','',8);

    while ($booking = mysqli_fetch_assoc($bookingQuery)) {
       
		// $fpdf->Cell(10 ,10,'1',1,0);
		$fpdf->Cell(60 ,10,$booking['facility'],1,0,'C');
		$fpdf->Cell(50 ,10,$booking['email'],1,0,'C');
		$fpdf->Cell(47 ,10,$booking['phone'],1,0,'C');
		// $fpdf->Cell(36 ,10,$booking['customer_phone'],1,0,'C');
		$fpdf->Cell(25 ,10,$booking['start_date'],1,0,'C');
		$fpdf->Cell(25 ,10,$booking['end_date'],1,0,'C');
		$fpdf->Cell(10 ,10,$booking['number_of_days'],1,0,'C');
		$fpdf->Cell(25 ,10,$booking['facilityPrice'],1,0,'C');
		$fpdf->Cell(25 ,10,$booking['total?_price'],1,0,'C');
		$fpdf->Cell(40 ,10,$booking['created_at'],1,1,'C');
	
		// $fpdf->Cell(37 ,10,$allocation->added_on,1,0,'R');
		// $fpdf->Cell(37 ,10,$allocation->unallocated_on,1,1,'R');
	}
		

$fpdf->output();


}elseif (isset($_GET['reportPrintDate']) && $_GET['reportPrintDate'] == 'RangeReport') {
	   require '../fpdf/fpdf.php';
	 $fromDate = $_GET['fromDate'];
	  $toDate = $_GET['toDate'];


      $sql = "SELECT * FROM bookings WHERE created_at BETWEEN str_to_date('$fromDate', '%Y-%m-%d') AND str_to_date('$toDate', '%Y-%m-%d')";
      $bookingQuery = mysqli_query($conn, $sql);



 /*A4 width : 219mm*/
$fpdf = new FPDF('P', 'mm', 'A3');
$fpdf->addPage();

//add logo
// $fpdf->image('../../images/upsa-logo.jpg', 70, 5, 60);
$fpdf->Ln(17);

$fpdf->setFont('Arial', 'B', 13);

$rangeDescription = "FACILITY BOOKING REPORT FROM: ".$fromDate.' To: '.$toDate;



$fpdf->cell('70', 7, '', 0, 0);
$fpdf->cell('30', 7, $rangeDescription, 0, 0);
$fpdf->cell('100', 7, '', 0, 1);



$fpdf->Ln(10);
  

$fpdf->SetFont('Arial','B',10);
// /*Heading Of the table*/ CREATING TABLE HEADING
// $fpdf->Cell(10 ,10,'#',1,0,'C');
$fpdf->Cell(60 ,10,'Facility',1,0,'C');
$fpdf->Cell(50 ,10,' Email',1,0,'C');
$fpdf->Cell(47 ,10,' Phone',1,0,'C');

$fpdf->Cell(25 ,10,'Start Date',1,0,'C');
$fpdf->Cell(25 ,10,'End Date',1,0,'C');
$fpdf->Cell(10 ,10,'Days',1,0,'C');
$fpdf->Cell(25 ,10,'Price',1,0,'C');
$fpdf->Cell(25 ,10,'Total Price',1,0,'C');
// $fpdf->Cell(36 ,10,'Book Time',1,0,'C');
$fpdf->Cell(40 ,10,'Created On',1,1,'C');


/*Heading Of the table end*/
$fpdf->SetFont('Arial','',8);

    while ($booking = mysqli_fetch_assoc($bookingQuery)) {
       
		// $fpdf->Cell(10 ,10,'1',1,0);
		$fpdf->Cell(60 ,10,$booking['facility'],1,0,'C');
		$fpdf->Cell(50 ,10,$booking['email'],1,0,'C');
		$fpdf->Cell(47 ,10,$booking['phone'],1,0,'C');
		// $fpdf->Cell(36 ,10,$booking['customer_phone'],1,0,'C');
		$fpdf->Cell(25 ,10,$booking['start_date'],1,0,'C');
		$fpdf->Cell(25 ,10,$booking['end_date'],1,0,'C');
		$fpdf->Cell(10 ,10,$booking['number_of_days'],1,0,'C');
		$fpdf->Cell(25 ,10,$booking['facilityPrice'],1,0,'C');
		$fpdf->Cell(25 ,10,$booking['total_price'],1,0,'C');
		$fpdf->Cell(40 ,10,$booking['created_at'],1,1,'C');
	
	}
		

$fpdf->output();

}

?>