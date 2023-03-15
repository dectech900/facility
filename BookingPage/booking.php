
<?php
include '../config/db.php';
session_start();

if(isset($_SESSION['uid'])){
  $uid = $_SESSION['uid'];
}

if(isset($_GET['facility'])){
  $facility = $_GET['facility'];

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
                    <p id="make-a">Make A Booking</p>

                    <div id="heading">
                      <div id="title">1</div>
                      <div id="subtitle">General Information</div>
                    </div>
                    
<div class="row">
 <div class="col-50">
  <div class="flname" id="fl-first">
    <label for="facility">Selected Facility</label>
    <input type="text" name="facility" value="<?= $facility; ?>" id="facility" readonly>
    <input type="hidden" name="uid" value="<?= $uid; ?>" id="" readonly>
  </div>
 </div>
</div>
                    <div class="row">
                      <div class="col-50">

                        <div class="flname" id="fl-first">
                          <label for="state">First Name</label>
                          <input type="text" name="firstname" id="state">
                        </div>
                      </div>

                      <div class="col-50">
                        <div class="flname" id="fl-last">
                          <label for="zip">Last Name</label>
                          <input type="text" name="lastname" id="zip">
                        </div>
                      </div>
                    </div>
                    
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email">
                    <label for="adr">Mobile Number</label>
                    <input type="text" id="adr" name="phone">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city">


                    <div id="heading" class="heading2">
                      <div id="title">2</div>
                      <div id="subtitle">Emergency Contact</div>
                    </div>
        
                    <label for="email">Contact Name</label>
                    <input type="text" id="email" name="ref_name">
                    <label for="adr">Relationship</label>
                    <input type="text" id="adr" name="ref_relationship">
                    <label for="city">Mobile Number</label>
                    <input type="text" id="city" name="ref_phone">


                    <div id="heading" class="heading2">
                      <div id="title">5</div>
                      <div id="subtitle">Timeslots Ranked By Preference</div>
                    </div>


                    <label for="email">Timeslot 1</label>
                    <input type="text" id="email" name="timeslot1" value="9/10/2021 12:00pm - 1:00pm" enable>
                    <label for="adr">Timeslot 2</label>
                    <input type="text" id="adr" name="timeslot2" value="9/10/2021 1:00pm - 2:00pm" enable>
                    <label for="city">Timeslot 3</label>
                    <input type="text" id="city" name="timeslot3" value="9/10/2021 12:00pm - 2:00pm" enable>

                  </div>
        
                  <div class="col-50">

                    <div id="heading" class="heading3">
                      <div id="title">3</div>
                      <div id="subtitle">Booking Information</div>
                    </div>


                    <div class="row">
                      <div class="col-50">
                        <div class="bookinfo" id="attendees">
                          <label for="expyear">Number of Attendees</label>
                          <input type="text" id="expyear" name="number_of_attendees">
                        </div>
                        
                      </div>
                      <div class="col-50">
                        <div class="bookinfo" id="courtsquant">
                          <label for="cvv">Number of Courts/Fields</label>
                          <input type="text" id="cvv" name="number_of_court" placeholder="Refer to info page">
                        </div>
                      </div>
                    </div>

              
                    <div id="heading" class="heading4">
                      <div id="title">4</div>
                      <div id="subtitle">Select Timeslot</div>
                    </div>

                    

                    <!-- Calendar -->
              <div class="movie-container">

              <h3>Select your event last period</h3>
                <!-- <ul class="showcase">
                  <li>
                    <div class="seat"></div>
                    <small>Available</small>
                  </li>
                  <li>
                    <div class="seat selected"></div>
                    <small>Selected Time</small>
                  </li>
                  <li>
                    <div class="seat occupied"></div>
                    <small>Unavailable</small>
                  </li>    
                </ul> -->
                
   <div class="cal-container">
    <!-- <div class="month">
      <select id="month-selector">
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October" selected>October</option>
        <option value="November">November</option>
        <option value="December">December</option>
      </select>
    </div>
    
                  <div class="rowcal">
                    <div class="day">MON</div>
                    <div class="day">TUE</div>
                    <div class="day">WED</div>
                    <div class="day">THU</div>
                    <div class="day">FRI</div>
                    <div class="day">SAT</div>
                    <div class="day">SUN</div>
                  </div>
    
                  <div class="rowcal">
                    <div class="date">4/10</div>
                    <div class="date">5/10</div>
                    <div class="date">6/10</div>
                    <div class="date">7/10</div>
                    <div class="date">8/10</div>
                    <div class="date">9/10</div>
                    <div class="date">10/10</div>
                  </div>
    
    
                  <div class="rowcal">
                      <div class="seat">10:00am</div>
                      <div class="seat">10:00am</div>
                      <div class="seat">10:00am</div>
                      <div class="seat">10:00am</div>
                      <div class="seat">10:00am</div>
                      <div class="seat">10:00am</div>
                      <div class="seat">10:00am</div>
                    </div>
                    <div class="rowcal">
                      <div class="seat">11:00am</div>
                      <div class="seat">11:00am</div>
                      <div class="seat">11:00am</div>
                      <div class="seat ">11:00am</div>
                      <div class="seat">11:00am</div>
                      <div class="seat">11:00am</div>
                      <div class="seat">11:00am</div>
                    </div>
                    <div class="rowcal">
                      <div class="seat ">12:00pm</div>
                      <div class="seat occupied">12:00pm</div>
                      <div class="seat">12:00pm</div>
                      <div class="seat">12:00pm</div>
                      <div class="seat">12:00pm</div>
                      <div class="seat occupied">12:00pm</div>
                      <div class="seat occupied">12:00pm</div>
                    </div>
                    <div class="rowcal">
                      <div class="seat">1:00pm</div>
                      <div class="seat">1:00pm</div>
                      <div class="seat">1:00pm</div>
                      <div class="seat">1:00pm</div>
                      <div class="seat">1:00pm</div>
                      <div class="seat">1:00pm</div>
                      <div class="seat">1:00pm</div>
                    </div>
                    <div class="rowcal">
                      <div class="seat">2:00pm</div>
                      <div class="seat">2:00pm</div>
                      <div class="seat occupied">2:00pm</div>
                      <div class="seat occupied">2:00pm</div>
                      <div class="seat">2:00pm</div>
                      <div class="seat">2:00pm</div>
                      <div class="seat">2:00pm</div>
                    </div>
                    <div class="rowcal">
                      <div class="seat occupied">3:00pm</div>
                      <div class="seat">3:00pm</div>
                      <div class="seat">3:00pm</div>
                      <div class="seat occupied">3:00pm</div>
                      <div class="seat occupied">3:00pm</div>
                      <div class="seat occupied">3:00pm</div>
                      <div class="seat">3:00pm</div>
                    </div> -->

                    <!-- <div>
                      <label for="fromDate">From</label>
                      <div class="fromDate">
                        <input type="datetime" name="fromDate" id="fromDate">
                      </div>
                    </div> -->
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


