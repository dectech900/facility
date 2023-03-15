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
   echo $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
   echo $facility = mysqli_real_escape_string($conn, $_POST['facility']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
   echo $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
   echo $email = mysqli_real_escape_string($conn, $_POST['email']);
   echo  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    echo  $city = mysqli_real_escape_string($conn, $_POST['city']);
    echo  $ref_name = mysqli_real_escape_string($conn, $_POST['ref_name']);
    echo $ref_relationship = mysqli_real_escape_string($conn, $_POST['ref_relationship']);
    echo $ref_phone = mysqli_real_escape_string($conn, $_POST['ref_phone']);
    echo $timeslot1 = mysqli_real_escape_string($conn, $_POST['timeslot1']);
    echo $timeslot2 = mysqli_real_escape_string($conn, $_POST['timeslot2']);
    echo $timeslot3 = mysqli_real_escape_string($conn, $_POST['timeslot3']);
    echo $ref_phone = mysqli_real_escape_string($conn, $_POST['ref_phone']);
    echo $number_of_attendees = mysqli_real_escape_string($conn, $_POST['number_of_attendees']);
    echo $number_of_court = mysqli_real_escape_string($conn, $_POST['number_of_court']);
    echo $declare1 = mysqli_real_escape_string($conn, $_POST['declare1']);
    echo $declare2 = mysqli_real_escape_string($conn, $_POST['declare2']);
    echo $declare3 = mysqli_real_escape_string($conn, $_POST['declare3']);
     $fromDate = mysqli_real_escape_string($conn, $_POST['fromDate']);
     $toDate = mysqli_real_escape_string($conn, $_POST['toDate']);

    echo $booking_date = $fromDate.'  '.$toDate;

// die();

    //  $sql = "SELECT * FROM users WHERE student_id = '$student_id' AND password = '$password' AND user_type = '$userType' ";
     $sql = "INSERT INTO `bookings`(`firstname`, `lastname`, `email`, `phone`, `city`, `facility`, `uid`, `ref_name`, `ref_phone`, `ref_relationship`, `time_slot_1`, `time_slot_2`, `time_slot_3`, `booking_attendees`, `booking_court`, `booking_time`, `declaration1`, `declaration2`, `declaration3`)
      VALUES ('$firstname', '$lastname','$email','$phone','$city','$facility','$uid','$ref_name','$ref_phone','$ref_relationship','$timeslot1','$timeslot2','$timeslot3','$number_of_attendees','$number_of_court', '$booking_date', '$declare1', '$declare2','$declare3')";
     $query = mysqli_query($conn, $sql);

    //  print("Errors in the UPDATE query: ".mysqli_error($conn)."\n");

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

