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

    $sql = "SELECT * FROM users WHERE student_id = '$student_id' AND password = '$password' AND user_type = '$userType' ";
    $query = mysqli_query($conn, $sql);
  
    echo $count = mysqli_num_rows($query);

// die();

    if($count > 0){

        $row = mysqli_fetch_assoc($query);
        $_SESSION['uid'] =  $row['id'];
        $_SESSION['user_type'] =  $row['user_type'];
        $_SESSION['fname'] =  $row['name'];
        var_dump($row);
        
        header("Location: ../SelectFacility/selectfacility.php?logged-in");
        
        // die();
    }else{
        $_SESSION['error'] = "Oops Invalid login credentials.. Please try again";
        header("Location: ../StudentLogin/studentlogin.html?failed");
    }
}

if(isset($_POST['handleBookingSubmit'])){
   echo $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
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



    //  $sql = "SELECT * FROM users WHERE student_id = '$student_id' AND password = '$password' AND user_type = '$userType' ";
     $sql = "INSERT INTO `bookings`(`firstname`, `lastname`, `email`, `phone`, `city`, `ref_name`, `ref_phone`, `ref_relationship`, `time_slot_1`, `time_slot_2`, `time_slot_3`, `booking_attendees`, `booking_court`, `booking_time`, `declaration1`, `declaration2`, `declaration3`)
      VALUES ('$firstname', '$lastname','$email','$phone','$city','$ref_name','$ref_phone','$ref_relationship','$timeslot1','$timeslot2','$timeslot3','$number_of_attendees','$number_of_court', '', '$declare1', '$declare2','$declare3')";
     $query = mysqli_query($conn, $sql);

    //  print("Errors in the UPDATE query: ".mysqli_error($conn)."\n");

     if($query){
        header("Location: ../SelectFacility/selectfacility.php");
     }else {
        // print("Errors in the UPDATE query: ".mysqli_error($conn)."\n");
        // die();
        header("Location: ../BookingPage/booking.html");

     }

}


// Logout user
if(isset($_POST['logout'])){
    session_start();
    $_SESSION['uid'] = "";
    $_SESSION['user_type'] = "";
    $_SESSION['fname'] = "";
    session_destroy();
    session_unset();
    header("Location: ../studentlogin.html");
}

