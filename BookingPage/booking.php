
<?php
include '../config/db.php';
session_start();

if(isset($_SESSION['uid'])){
 echo $uid = $_SESSION['uid'];
}

if(isset($_GET['facility'])){
  $facility = $_GET['facility'];
  

}
$facilityPrice = 0;
if($facility === 'LBC Auditorium'){
$facilityPrice = 500;
}else if($facility === 'Main Auditorium'){
  $facilityPrice = 200;
}else if($facility === 'Side Confrence Auditorium'){
  $facilityPrice = 250;
  
}
else if($facility === 'LBC Ground Floor'){
  $facilityPrice = 550; 
}
else if($facility === 'LBC Second Floor'){
  $facilityPrice = 550; 
}
else if($facility === 'Astro Turf'){
  $facilityPrice = 800; 
}



?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="booking.css">
        <title>Bookings</title>
        <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!--Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
       
    <body>

        <!--Booking Page-->

        <!-- Booking Form -->
        <div class="row">
          <div class="col-75">
            <div class="container">
            
              <!-- <form action="../ConfirmationPage/confirm.html"> -->
              <form method="POST" action="../config/action.php">
              
                <div class="row">
                  <div class="col-50">
                    <button class="button button5"></button>
                    <p id="make-a">Make A Booking </p>
                    <input type="text" name="facility" value="<?= $facility; ?>" id="facility" readonly>
                        <input type="hidden" name="uid" value="<?= $uid; ?>" id="" readonly>
                    <div id="heading">
                      <div id="title">1</div>
                      <div id="subtitle">General Information</div>
                    </div>
                    
<div class="row">
 <div class="col-50">
  <div class="flname" id="fl-first">
  </div>
 </div>
</div>
                    <div class="row">
                      <div class="col-50">

                        <div class="flname" id="fl-first">
                        <label for="fname"><i class="fa fa-user"></i> First Name</label>
                          <input type="text" name="firstname" id="state">
                        </div>
                      </div>

                      <div class="col-50">
                        <div class="flname" id="fl-last">
                          <label for="zip"><i class="fa fa-user"></i> Last Name </label>
                          <input type="text" name="lastname" id="zip">
                        </div>
                      </div>
                    </div>
                    
                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                    <input type="text" id="email" name="email">
                    <label for="adr"><i class="fa fa-phone"></i>Mobile Number</label>
                    <input type="text" id="adr" name="phone">


                    <div id="heading" class="heading2">
                      <div id="title">5</div>
                      <div id="subtitle">Auxiliary Options</div>
                    </div>


                    <label for="hostel-facility">CCTV Cameras</label>
                    <input type="checkbox" id="hostel-facility" name="hostel-facility">
                    <label for="hostel-facility">External peripheral </label>
                    <input type="checkbox" id="hostel-facility" name="hostel-facility">


                  </div>
        
                  <div class="col-50">

                    <div id="heading" class="heading3">
                      <div id="title">3</div>
                      <div id="subtitle">Booking Information</div>
                      
                    </div>

                    <div>
                      <h3>&#8373;<?= $facilityPrice?></h3>
                      <input type="hidden" name="facilityPrice" value="<?= $facilityPrice; ?>">
                    </div>


                    

              
                    <div id="heading" class="heading4">
                      <div id="title">4</div>
                      <div id="subtitle">Select Timeslot</div>
                    </div>

                    

                    <!-- Calendar -->
              <div class="movie-container">
              <div class="row">
                      <div class="col-50">
                        <div class="date" id="">
                          <label for="fromDate">From</label>
                          <input type="date" id="fromDate" name="fromDate">
                        </div>
                        
                      </div>
                      <div class="col-50">
                        <div class="date" id="">
                          <label for="toDate">To</label>
                          <input type="date" id="toDate" name="toDate" >
                        </div>
                
   <div class="cal-container">

                      </div>
                    </div>

                </div>
              </div>

              


              <div id="note">
                <p>Note:</p>
                <ul>
                  <li>All visitors must check in via Receipt Code or QR code. </li>
                  <li>All UPSA facilities must be booked prior to use, no walk-in bookings will be permitted.</li>
                </ul>
              </div>

              

              <label id="declare">
                <p>Declaration:</p>
                <input type="checkbox" name="declare1" required /> I consent to the policies and regulations of reserving the facility. <br>
                <input type="checkbox" name="declare2" required /> By making a booking request, you are agreeing to follow the COVID protocols established by UPSA Facility. <br>
                <input type="checkbox" name="declare3" required /> Please make sure that all the fields have been completed before moving forward. Thank you.
              </label>


              <div class="row">
                <div class="col-50">
                  <input type="submit" value="CONFIRM" name="handleBookingSubmit" class="btn">
                </div>
                <div class="col-50">
                  <input type="Reset" value="CANCEL" class="btn">
                </div>
              </div>
                  </div>
              </div>
              </form>
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
          

          <script src="/script.js"></script>     
          <script src="booking.js"></script>   
    </body>
    
</html>


