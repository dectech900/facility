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
     $declare1 = mysqli_real_escape_string($conn, $_POST['declare1']);
     $declare2 = mysqli_real_escape_string($conn, $_POST['declare2']);
     $declare3 = mysqli_real_escape_string($conn, $_POST['declare3']);
     $fromDate = mysqli_real_escape_string($conn, $_POST['fromDate']);
     $toDate = mysqli_real_escape_string($conn, $_POST['toDate']);

     $booking_date = $fromDate.'  '.$toDate;

    $date1 = new DateTime($fromDate);
    $date2 = new DateTime($toDate);
    $interval = $date1->diff($date2);
   echo $totalDays = $interval->days;

    $bookingSql = "SELECT `start_date`, `end_date` FROM bookings WHERE `facility` = '$facility'";
    $query = mysqli_query($conn, $bookingSql);
    $data = mysqli_fetch_assoc($query);
    var_dump($data);
    if(mysqli_num_rows($query) > 1){

        while($data = mysqli_fetch_assoc($query)){

            // Convert date strings to Unix timestamps
      $stored_start_date = strtotime($data['start_date']);
      $stored_end_date = strtotime($data['end_date']);
      $user_start_date = strtotime($fromDate);
      $user_end_date = strtotime($toDate);
      
      // Check for overlap
      if (($user_start_date <= $stored_end_date && $user_end_date >= $stored_start_date) ||
          ($stored_start_date <= $user_end_date && $stored_end_date >= $user_start_date)) {
          // Show error message and prevent form submission
          // upsa_facility/BookingPage/booking.php?facility=LBC%20Second%20Floor
          header("Location: ../BookingPage/booking.php?facility=".$facility."&date_error=You can book within the selected date. Facility booked already chosse another date");
          // echo "Selected date range overlaps with stored date range.";
          exit;
      }
      
      }
    }else{
        $data = mysqli_fetch_assoc($query);
        // Convert date strings to Unix timestamps
        $stored_start_date = strtotime($data['start_date']);
        $stored_end_date = strtotime($data['end_date']);
        $user_start_date = strtotime($fromDate);
        $user_end_date = strtotime($toDate);
        
        // Check for overlap
        if (($user_start_date <= $stored_end_date && $user_end_date >= $stored_start_date) ||
            ($stored_start_date <= $user_end_date && $stored_end_date >= $user_start_date)) {
            // Show error message and prevent form submission
            // upsa_facility/BookingPage/booking.php?facility=LBC%20Second%20Floor
            header("Location: ../BookingPage/booking.php?facility=".$facility."&date_error=You can book within the selected date. Facility booked already chosse another date");
            // echo "Selected date range overlaps with stored date range.";
            exit;
        }
    }
    // $data = mysqli_fetch_assoc($query);






// echo $totalDays;
 $totalPrice = number_format(intval($totalDays * $facilityPrice), 2, '.', ',');


// die();

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

