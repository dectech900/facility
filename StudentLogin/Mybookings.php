<?php
include '../config/db.php';
session_start();
if(isset($_SESSION['uid'])){
  $userType =  $_SESSION['user_type'];
  $userName =  $_SESSION['fname'];
   $uid = $_SESSION['uid'];
}else{
  header("Location: ../StudentLogin/studentlogin.php?error=login first");

}

$bookingSql = "SELECT * FROM bookings WHERE `uid` = '$uid'";
$query = mysqli_query($conn, $bookingSql);


// var_dump($booking);

?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Mybookings.css">
    <title>STUDENT</title>
    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    </head>
    <body>
      



      <!--Top Navigation Bar-->
      <nav class="nav-bar">
        <div id="logo"><a href="../index.html"><img src="../Images/UPSA Logo.png" alt="anulogo"></a></div>
        <div class="hamburger">
          <div class="line-1"></div>
          <div class="line-2"></div>
          <div class="line-3"></div>
        </div>
        <ul class="nav-links">
          <li><a href="Mybookings.php" class="nav-link">MY BOOKINGS</a></li>
          <li><a href="../SelectFacility/selectfacility.php" class="nav-link">FACILITIES</a></li>
          <li><a href="#" class="nav-link">CONTACTS</a></li>
          <li><a href="#" class="nav-link">ADMISSIONS</a></li>
          <li><a href="#" class="nav-link">MEDIA</a></li>
          <?php 
          if($uid){
            ?>
 <li><a href="../config/action.php?logout" class="nav-link">LOGOUT</a></li>
            <?php
          }else{
            echo '';
          }
          
          ?>
         

        </ul>
        
      </nav>

      <h1>My Bookings</h1>
      <table>
        <tr>
          <th>Facility</th>
          <th>Booking Date</th>
          <th>Attendees</th>
          <th>Booking Court</th>
          <th>Action</th>
        </tr>
        <?php while($booking = mysqli_fetch_assoc($query)): 
          //  var_dump($booking);
           ?>
          <tr>
          <td><?= $booking['facility'] ?></td>
          <td><?= $booking['booking_time'] ?></td>
          <td><?= $booking['booking_attendees'] ?></td>
          <td><?= $booking['booking_court'] ?></td>
          
          <td><a target="_blank"  href="../print.php?PrintBookReport=<?= $booking['id']; ?>">Print</a></td>
         
        </tr>
        <?php endwhile; ?>
       
     
      </table>
  <!-- <button class="button button5"></button> -->
    
        <script src="/script.js"></script>
        <script src="selectfacility.js"></script>
        
    </body>
    
</html>


