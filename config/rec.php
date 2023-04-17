<?php
session_start();
include "db.php";

$_SESSION['error'] = "";
$_SESSION['success'] = "";

// function to sanitize input values
function sanitize($var){
    $var = strip_tags(htmlspecialchars($var));
    return $var;
}

if(isset($_POST['btn_loginStudent'])){
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $userType = mysqli_real_escape_string($conn, $_POST['user_type']);

   
   echo $student_id = sanitize($student_id);
   echo $password = sanitize($password);
   echo $userType = sanitize($userType);

    $sql = "SELECT * FROM users WHERE student_id = '$student_id' AND password = '$password'  ";
    $query = mysqli_query($conn, $sql);
  
    echo $count = mysqli_num_rows($query);

// die();

    if($count > 0){

        $row = mysqli_fetch_assoc($query);
        $_SESSION['uid'] =  $row['id'];
        $_SESSION['user_type'] =  $row['user_type'];
        $_SESSION['fname'] =  $row['name'];
        var_dump($row);
        
        if($_SESSION['user_type'] == 'STUDENT'){
            header("Location: ../SelectFacility/selectfacility.php?logged-in");
        }elseif ($_SESSION['user_type'] == 'ADMIN') {
            header("Location: ../adminDahshboard/index.php?logged-in");
        }else {
           //GUEST
           header("Location: ../guest/index.php?logged-in");
           
        }
        // header("Location: ../SelectFacility/selectfacility.php?logged-in");
        
        // die();
    }else{
        $_SESSION['error'] = "Oops Invalid login credentials.. Please try again";
        header("Location: ../StudentLogin/studentlogin.php?failed");
    }
}
if(isset($_POST['btn_loginSGuest'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // $userType = mysqli_real_escape_string($conn, $_POST['user_type']);

   
   echo $email = sanitize($email);
  
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);
  
    echo $count = mysqli_num_rows($query);

// die();

    if($count > 0){

        $row = mysqli_fetch_assoc($query);
        $_SESSION['uid'] =  $row['id'];
        $_SESSION['user_type'] =  $row['user_type'];
        $_SESSION['fname'] =  $row['name'];
        var_dump($row);
        
        if($_SESSION['user_type'] == 'GUEST'){
            header("Location: ../SelectFacility/selectfacility.php?logged-in");
        }else {
           //GUEST
           header("Location: ../guest/index.php?logged-in");
           
        }
      
    }else{
        echo'Ready to install';
        $sqlIn = "INSERT INTO `users`(`email`, `user_type`, `name`, `phone`, `student_id`, `password`) VALUES('$email', 'GUEST', 'Guest','', '', '')";
        $sqlQue = mysqli_query($conn,$sqlIn);
         print("Errors in the UPDATE query: ".mysqli_error($conn)."\n");
        // die();
        if($sqlQue){
            $_SESSION['uid'] =  mysqli_insert_id($conn);
            $_SESSION['user_type'] =  'GUEST';
            header("Location: ../SelectFacility/selectfacility.php?logged-in");
        }
        // $_SESSION['error'] = "Oops Invalid login credentials.. Please try again";
        // header("Location: ../StudentLogin/studentlogin.php?failed");
    }
}

if(isset($_POST['handleBookingSubmit'])){
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $facility = mysqli_real_escape_string($conn, $_POST['facility']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
     $phone = mysqli_real_escape_string($conn, $_POST['phone']);
      $facilityPrice = mysqli_real_escape_string($conn, $_POST['facilityPrice']);
    //   $ref_name = mysqli_real_escape_string($conn, $_POST['ref_name']);
    //  $ref_relationship = mysqli_real_escape_string($conn, $_POST['ref_relationship']);
    //  $ref_phone = mysqli_real_escape_string($conn, $_POST['ref_phone']);
    //  $timeslot1 = mysqli_real_escape_string($conn, $_POST['timeslot1']);
    //  $timeslot2 = mysqli_real_escape_string($conn, $_POST['timeslot2']);
    //  $timeslot3 = mysqli_real_escape_string($conn, $_POST['timeslot3']);
    //  $ref_phone = mysqli_real_escape_string($conn, $_POST['ref_phone']);
    //  $number_of_attendees = mysqli_real_escape_string($conn, $_POST['number_of_attendees']);
    //  $number_of_court = mysqli_real_escape_string($conn, $_POST['number_of_court']);
     $declare1 = mysqli_real_escape_string($conn, $_POST['declare1']);
     $declare2 = mysqli_real_escape_string($conn, $_POST['declare2']);
     $declare3 = mysqli_real_escape_string($conn, $_POST['declare3']);
     $fromDate = mysqli_real_escape_string($conn, $_POST['fromDate']);
     $toDate = mysqli_real_escape_string($conn, $_POST['toDate']);

     $booking_date = $fromDate.'  '.$toDate;

    $date1 = new DateTime($fromDate);
    $date2 = new DateTime($toDate);
    $interval = $date1->diff($date2);
    $totalDays = $interval->days;

    $bookingSql = "SELECT * FROM bookings";
    $query = mysqli_query($conn, $bookingSql);
    $data = mysqli_fetch_assoc($query);

    // $startDate = strtotime("14/04/2023"); // Convert the start date string to a Unix timestamp
    //     $endDate = strtotime("24/04/2023"); // Convert the end date string to a Unix timestamp
    //     $selectedDate = strtotime("25/04/2023"); // Convert the selected date string to a Unix timestamp

// Check if the selected date is within the allowed range
// if ($selectedDate >= $startDate && $selectedDate <= $endDate) {
//     // The selected date is within the allowed range, do whatever you need to do with it
//     echo "You selected: date taken" . $selectedDate;
// } else {
//     // The selected date is not within the allowed range, skip to the next available date
//     $nextAvailableDate = strtotime("+1 day", $endDate); // Calculate the next day after the end date
//     echo "Sorry, that date is not available. The next available date is: " . date("d/m/Y", $nextAvailableDate);
// }

$datesArr= [];

// while($data = mysqli_fetch_assoc($query)){
    
//    echo $startDate = explode(" ", $data['booking_time'])[0];
//    echo $endDate = explode(" ", $data['booking_time'])[1];
//     // array_push($datesArr, $datesFromDB);

//     if ($fromDate >= $startDate && $fromDate <= $endDate) {
//         // The selected date is within the allowed range, do whatever you need to do with it
//         echo "You selected: date taken" ;
//     } 
// }

while($data = mysqli_fetch_assoc($query)){
    
    $booking_time = $data['booking_time'];

    // echo $booking_time;

        // extract the start and end dates from the booking_time value
    //    echo $startDate = explode(" ", $booking_time)[0].'<br/>';
       echo $endDate = explode(" ", $booking_time)[1].'<br/>';

  
        // check if the selected date falls within the allowed range
        // if (strtotime($fromDate) >= strtotime($startDate) && strtotime($toDate) <= strtotime($endDate)) {
        //     echo "You selected a date that is already taken.";
        //     break;
        // }
    // }
}


// echo $fromDate;
// var_dump($datesArr);
// echo "";
// if (in_array($fromDate, $datesArr)) {
//     echo "The date 2023-04-16 is in the array";
// } else {
//     echo "The date 2023-04-16 is not in the array";
// }
// print_r($datesArr);
    // foreach ($data as $value) {
    //     // code to execute during each iteration
    //     if ($fromDate >= $data['booking_time'] && $fromDate <= $endDate) {
    //         // The selected date is within the allowed range, do whatever you need to do with it
    //         echo "You selected: date taken" . $selectedDate;
    //     } else {
    //         // The selected date is not within the allowed range, skip to the next available date
    //         $nextAvailableDate = strtotime("+1 day", $endDate); // Calculate the next day after the end date
    //         echo "Sorry, that date is not available. The next available date is: " . date("d/m/Y", $nextAvailableDate);
    //     }
    // }

  

// echo $totalDays;
 $totalPrice = number_format(intval($totalDays * $facilityPrice), 2, '.', ',');

die();


     $sql = "INSERT INTO `bookings`(`firstname`, `lastname`, `email`, `phone`, `facility`, `uid`,  `start_date`, `end_date`, `declaration1`, `declaration2`, `declaration3`, `facilityPrice`,`number_of_days`, `total_price`)
      VALUES ('$firstname', '$lastname','$email','$phone','$facility','$uid', '$fromDate', '$toDate', '$declare1', '$declare2','$declare3', '$facilityPrice', '$totalDays','$totalPrice')";
     $query = mysqli_query($conn, $sql);

    //  print("Errors in the UPDATE query: ".mysqli_error($conn)."\n");

    //  die();

     if($query){
         //send user to download their recipt

        header("Location: ../SelectFacility/selectfacility.php");
     }else {
        // print("Errors in the UPDATE query: ".mysqli_error($conn)."\n");
        // die();
        header("Location: ../BookingPage/booking.php");

     }

}


// Logout user
if(isset($_GET['logout'])){
    session_start();
    $_SESSION['uid'] = "";
    $_SESSION['user_type'] = "";
    $_SESSION['fname'] = "";
    session_destroy();
    session_unset();
    header("Location: ../index.html");
}
// Logout Admin
if(isset($_GET['logout-admin'])){
    session_start();
    $_SESSION['uid'] = "";
    $_SESSION['user_type'] = "";
    $_SESSION['fname'] = "";
    session_destroy();
    session_unset();
    header("Location: ../index.html");
}

