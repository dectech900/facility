<?php
include '../config/db.php';

if(isset($_GET['report']) && $_GET['report'] == 'TodayReport'){

  // $sql = "SELECT booked.id, booked.bus, booked.start_time, booked.location, booked.added_on, customers.firstname, customers.lastname, customers.email, customers.phone 
  // FROM booked, customers
  // WHERE (booked.customer = customers.id AND booked.added_on >= CURRENT_DATE())
  //  ORDER BY booked.added_on DESC";
  $sql = "SELECT * FROM bookings WHERE created_at >= CURRENT_DATE() ORDER BY created_at DESC";
    $bookingQuery = mysqli_query($conn, $sql);

    $output = "";
   
    if(mysqli_num_rows($bookingQuery) > 0){
      $count = 1;
        while($booking = mysqli_fetch_assoc($bookingQuery)){

            $output .= '

            <tr>
                   <td> '.$count.'</td>
               <td>  '.$booking['facility'].' </td>
              <td> '. $booking['email'].' </td>
              <td> '. $booking['start_date'].' </td>
              <td> '. $booking['end_date'].' </td>
              <td> '. $booking['number_of_days'].' </td>
              <td> '. $booking['facilityPrice'].' </td>
              <td> '. $booking['total_price'].' </td>
              <td> '. $booking['created_at'].' </td>
               
              </tr>
              
            ';
            $count++;
        }
        $output .= '
        <tr>
        <td colspan="9"><a href="print-action.php?reportPrintDate=Todayreport" target="_blank" class="btn btn-primary">Print</a></td>
        </tr>
        ';
      
       
    }else{
        $output .= "</p>No data available at the moment</p>";
    }

echo $output;


  }
  


// GENERATING REPORT BASED ON RANGE OF DATE

  if(isset($_GET['rangeReport']) && $_GET['rangeReport'] == 'rangeReport'){

    $fromDate = $_GET['fromDate'];
    $toDate = $_GET['toDate'];

$sql = "SELECT * FROM bookings WHERE created_at BETWEEN str_to_date('$fromDate', '%Y-%m-%d') AND str_to_date('$toDate', '%Y-%m-%d')";

$bookingQuery = mysqli_query($conn, $sql);

    //  print("Errors in the UPDATE query: ".mysqli_error($conn)."\n");
    //  die();


$output = "";

if(mysqli_num_rows($bookingQuery) > 0){
  $count = 1;
    while($booking = mysqli_fetch_assoc($bookingQuery)){

        $output .= '
        
        <tr>
               <td> '.$count.'</td>
              <td>  '.$booking['facility'].' </td>
              <td> '. $booking['email'].' </td>
              <td> '. $booking['start_date'].' </td>
              <td> '. $booking['end_date'].' </td>
              <td> '. $booking['number_of_days'].' </td>
              <td> '. $booking['facilityPrice'].' </td>
              <td> '. $booking['total_price'].' </td>
              <td> '. $booking['created_at'].' </td>
           
          </tr>
          
        ';
        $count++;
    }
    $output .= '
    <tr>
    <a href="print-action.php?reportPrintDate=RangeReport&fromDate='.$fromDate.'&toDate='.$toDate.'" target="_blank" class="btn btn-primary">Print</a>
    
    </tr>
    ';
  
   
}else{
    $output .= "</p>No data available at the moment</p>";
}
      
      echo $output;
    
    
    
  }
  

  ?>