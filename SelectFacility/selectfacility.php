<?php
include '../config/db.php';

if(isset($_SESSION['uid'])){
  $userType =  $_SESSION['user_type'];
  $userName =  $_SESSION['fname'];
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
    <body>
      

        <!--Select Facility-->
        <div class="grid">

          <!--Ovals-->
          <div class="cell" id="ovalcell"><p>Auditorium</p>
            <div class="menu">
                <a href="../BookingPage/booking.html">Main Auditorium</a>
                <a href="../BookingPage/booking.html">LBC Auditorium </a>
                <a href="../BookingPage/booking.html">Side Confrence Auditorium</a>
            </div>
          </div>

          <!--Rooms-->
          <div class="cell"><p>Rooms</p>
            <div class="menu" id="room">
              <a href="../BookingPage/booking.html">Main Confrence Hall</a>
              <a href="../BookingPage/booking.html">LBC Ground Floor</a>
              <a href="../BookingPage/booking.html">LBC Second Floor</a>
              <a href="../BookingPage/booking.html">LBC Third  Floor</a>
              <a href="../BookingPage/booking.html">LBC Forth  Floor</a>
            </div>
          </div>

          <!--Indoor Halls-->
          <div class="cell"><p>Indoor courts</p>
            <div class="menu" id="indoor-halls">
              <a href="../BookingPage/booking.html">Badminton Courts</a>
              <a href="../BookingPage/booking.html">Martial Arts</a>
              <a href="../BookingPage/booking.html">Table Tennis</a>
            </div>
          </div>


          <div class="cell" onclick="openBook()">VolleyBall</div>
          <div class="cell" onclick="openBook()">Astro Turf</div>

          <!--Climbing Walls-->
          <div class="cell"><p>Car Park</p>
            <div class="menu" id="climbing-walls">
              <a href="../BookingPage/booking.html">Administration Car Park</a>
              <a href="../BookingPage/booking.html">Auditorium Car park</a>
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
          <li><a href="#" class="nav-link">ABOUT</a></li>
          <li><a href="#" class="nav-link">FACILITIES</a></li>
          <li><a href="#" class="nav-link">CONTACTS</a></li>
          <li><a href="#" class="nav-link">ADMISSIONS</a></li>
          <li><a href="#" class="nav-link">MEDIA</a></li>
          <li><a href="#" class="nav-link">ALUMNI</a></li>
        </ul>
        
      </nav>
  <button class="button button5"></button>
    
        <script src="/script.js"></script>
        <script src="selectfacility.js"></script>
        
    </body>
    
</html>


