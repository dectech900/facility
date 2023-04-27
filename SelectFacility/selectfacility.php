<?php
include '../config/db.php';
session_start();

if(isset($_SESSION['uid'])){
  $userType =  $_SESSION['user_type'];
  // $userName =  $_SESSION['fname'];
}else{
  header("Location: ../StudentLogin/studentlogin.php?error=login first");

}



?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="selectfacility.css">
        <title>Facilities</title>
        <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!--Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <body>
      

        <!--Select Facility-->
        <div class="grid">

          <!--Ovals-->
          <div class="cell" id="ovalcell"><p>Auditorium</p>
            <div class="menu">
                <a href="../BookingPage/booking.php?facility=Main Auditorium">Main Auditorium</a>
                <a href="../BookingPage/booking.php?facility=LBC Auditorium">LBC Auditorium </a>
                <a href="../BookingPage/booking.php?facility=Side Confrence Auditorium">Side Confrence Auditorium</a>
            </div>
          </div>

          <!--Rooms-->
          <div class="cell"><p>Rooms</p>
            <div class="menu" id="room">
              <a href="../BookingPage/booking.php?facility=Main Confrence Hall">Main Confrence Hall</a>
              <a href="../BookingPage/booking.php?facility=LBC Ground Floor">LBC Ground Floor</a>
              <a href="../BookingPage/booking.php?facility=LBC Second Floor">LBC Second Floor</a>
              <a href="../BookingPage/booking.php?facility=LBC Third  Floor">LBC Third  Floor</a>
              <a href="../BookingPage/booking.php?facility=LBC Forth  Floor">LBC Forth  Floor</a>
            </div>
          </div>

          <!--Indoor Halls-->
          <div class="cell"><p>Indoor courts</p>
            <div class="menu" id="indoor-halls">
              <a href="../BookingPage/booking.php?facility=Badminton Courts">Badminton Courts</a>
              <a href="../BookingPage/booking.php?facility=Martial Arts">Martial Arts</a>
              <a href="../BookingPage/booking.php?facility=Table Tennis">Table Tennis</a>
            </div>
          </div>



          <a href="../BookingPage/booking.php?facility=VolleyBall" class="cell" style=" text-decoration: none;">VolleyBall</a>
          <a href="../BookingPage/booking.php?facility=Astro Turf" class="cell astroturf "  style=" text-decoration: none;" >Astro Turf</a>
          <!-- <div class="cell" onclick="openBook()">Astro Turf</div> -->

          <!--Climbing Walls-->
          <div class="cell"><p>Car Park</p>
            <div class="menu" id="climbing-walls">
              <a href="../BookingPage/booking.php?facility=Administration Car Park">Administration Car Park</a>
              <a href="../BookingPage/booking.php?facility=Auditorium Car park">Auditorium Car park</a>
          </div>
          </div>
        </div>
        
        
        

      <!--Top Navigation Bar-->
      <nav class="nav-bar">
        <div id="logo"><a href="../index.html"><img src="../Images/UPSA Logo.png" alt="anulogo"></a></div>
        <div class="hamburger">
          <div class="line-1"></div>
          <div class="line-2"></div>
          <div class="line-3"></div>
        </div>
        <ul class="nav-links">

        <?php
  if(isset($_SESSION['uid'])){
    ?>

<li><a href="../StudentLogin/Mybookings.php" class="nav-link">MY BOOKINGS <span class="material-symbols-outlined"> calendar_month </span></i></a></li>
          <li><a href="../SelectFacility/selectfacility.php" class="nav-link">FACILITIES <i class="material-icons">house_siding</i></a></li>
          <li><a href="#" class="nav-link">CONTACTS <i class="material-icons">phone</i></a></li>
          <li><a href="#" class="nav-link">ADMISSIONS <i class="material-icons">school</i></a></li>
          <li><a href="#" class="nav-link">MEDIA<i class="material-icons">movie</i></a></li>
          <li><a href="../config/action.php?logout" class="nav-link">LOGOUT <span class="material-symbols-outlined">
logout
</span></a></li>
    <?php
  }else{
    ?>

<!-- <li><a href="../StudentLogin/Mybookings.php" class="nav-link">MY BOOKINGS</a></li> -->
          <!-- <li><a href="../SelectFacility/selectfacility.php" class="nav-link">FACILITIES</a></li> -->
          <li><a href="#" class="nav-link">CONTACTS</a></li>
          <li><a href="#" class="nav-link">ADMISSIONS</a></li>
          <li><a href="#" class="nav-link">MEDIA</a></li>
          <!-- <li><a href="../config/action.php?logout" class="nav-link">LOGOUT</a></li> -->
    <?php
  }
        ?>

        </ul>
        
      </nav>
  <button class="button button5"></button>
    
        <script src="../script.js"></script>
        <script src="selectfacility.js"></script>
        
    </body>
    
</html>


