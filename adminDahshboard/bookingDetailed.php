<?php
include '../config/db.php';
session_start();
if(isset($_SESSION['uid'])){
  $userType =  $_SESSION['user_type'];
  $userName =  $_SESSION['fname'];
   $uid = $_SESSION['uid'];
}else{
  header("Location: ../MemberLogin/memberlogin.html?error=login first");

}

if(isset($_GET['edit'])){
$edit_id = $_GET['edit'];
}

$bookingSql = "SELECT * FROM bookings WHERE  id = '$edit_id'";
$query = mysqli_query($conn, $bookingSql);

$booking = mysqli_fetch_assoc($query);


//delete
if(isset($_GET['del'])){
  $del_id = $_GET['del'];
  $delSql = "DELETE FROM bookings WHERE id = '$del_id'";
  $delQuery =  mysqli_query($conn, $delSql);
  if($delQuery){
    header('Location: index.php?message=Deleted successfully');
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <link rel="stylesheet" href="admin.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="wrapper">
      <div class="leftside">
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="../config/action.php?logout">Logout</a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>

          </ul>
        </nav>
      </div>
      <div class="rightside">
       
      <a href="index.php" type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2 mr-2 mt-2 ml-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Dark</a>
        <!-- <a href="index.php" class="back">back</a> -->

<div style="width: 60%; margin: 0 auto">
      <h1 class="text-center text-3xl">Booking Detailed</h1>

      <h1 class="">Booking Info</h1>
        <div class="grid my-2">
          <div class="name font-bold">Facility Name</div>
          <div class="value "><?= $booking['facility'] ?></div>

        </div>

        <div class="grid my-2">
          <div class="name font-bold"> Booking Attendees</div>
          <div class="value "><?= $booking['booking_attendees'] ?></div>
        </div>
        <div class="grid my-2">
          <div class="name font-bold"> Booking Court</div>
          <div class="value "><?= $booking['booking_court'] ?></div>
        </div>

        <div class="grid my-2">
          <div class="name font-bold"> Booking Time</div>
          <div class="value "><?= $booking['booking_time'] ?></div>
        </div>

        <div class="grid my-2">
          <div class="name font-bold"> Time Slot 1</div>
          <div class="value "><?= $booking['time_slot_1'] ?></div>
        </div>
        <div class="grid my-2">
          <div class="name font-bold"> Time Slot 2</div>
          <div class="value "><?= $booking['time_slot_2'] ?></div>
        </div>
        <div class="grid my-2">
          <div class="name font-bold"> Time Slot 3</div>
          <div class="value "><?= $booking['time_slot_3'] ?></div>
        </div>

        <hr/>
        <h1 class="">Customer Info</h1>
        <div class="grid my-2">
          <div class="name font-bold"> First name</div>
          <div class="value "><?= $booking['firstname'] ?></div>
        </div>
        <div class="grid my-2">
          <div class="name font-bold"> Last name</div>
          <div class="value "><?= $booking['lastname'] ?></div>
        </div>
        <div class="grid my-2">
          <div class="name font-bold"> Email Address</div>
          <div class="value "><?= $booking['email'] ?></div>
        </div>
        <div class="grid my-2">
          <div class="name font-bold"> Phone Number</div>
          <div class="value "><?= $booking['phone'] ?></div>
        </div>
        <div class="grid my-2">
          <div class="name font-bold"> City</div>
          <div class="value "><?= $booking['city'] ?></div>
        </div>
        <div class="grid my-2">
          <div class="name font-bold"> Reference Name</div>
          <div class="value "><?= $booking['ref_name'] ?></div>
        </div>
        <div class="grid my-2">
          <div class="name font-bold"> Reference Phone</div>
          <div class="value "><?= $booking['ref_phone'] ?></div>
        </div>
        <div class="grid my-2">
          <div class="name font-bold"> Reference Relationship</div>
          <div class="value "><?= $booking['ref_relationship'] ?></div>
        </div>

        <hr/>
        <h1 class="">Declarations</h1>
        <div class="grid my-2">
          <div class="name font-bold"> Declaration 1</div>
          <div class="value "><?php if($booking['declaration1'] == 'on'){echo 'True';}else{echo 'False';} ?></div>
        </div>
        <div class="grid my-2">
          <div class="name font-bold"> Declaration 2</div>
          <div class="value "><?php if($booking['declaration2'] == 'on'){echo 'True';}else{echo 'False';} ?></div>
        </div>
        <div class="grid my-2">
          <div class="name font-bold"> Declaration 3</div>
          <div class="value "><?php if($booking['declaration3'] == 'on'){echo 'True';}else{echo 'False';} ?></div>
        </div>

</div>
      </div>
    </div>








<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
  </body>
</html>
