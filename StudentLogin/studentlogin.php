<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="studentlogin.css">
        <title>STUDENT</title>
        <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!--Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        </head>
    <body>

          <!--Student Login-->
          <div class="select-membership">
            <div id="circle">
              <i id="user" class="material-icons">account_circle</i>
              <p id="signin">Sign In</p>

               <!--Error Message-->
               <?php
               if(isset($_GET['failed'])){
                 ?>
             <div id="error_message" style=" ">
                 <p style="border: 2px dotted red; color: red; text-align:center; padding: 10px 0px; border-radius: 4pc; background:white; position:relative; top: -50px;"><?php echo 'Please your student Id / Password is incorrect' ?></p>
              </div>
                 <?php
               }else{
                 echo '';
               }
               ?>

              
              

              <!--Login Form-->
            
              <form method="POST" action="../config/action.php">
                <label for="fname">Student ID</label>
                <input type="text" id="stuid" name="student_id" placeholder="Student ID">
            
                <label for="lname">Password</label>
                <input type="password" id="pass" name="password" placeholder="Password">
                <input type="hidden" id="" name="user_type" value="STUDENT"/>
              
                <input id="sub2" name="btn_loginStudent" type="submit" value="LOG IN"></input>
              </form>
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
          <li><a href="../StudentLogin/Mybookings.php" class="nav-link">MY BOOKINGS <span class="material-symbols-outlined"> calendar_month </span></a></li>

          <li><a href="../SelectFacility/selectfacility.php" class="nav-link">FACILITIES <span class="material-symbols-outlined">
home_work
</span></a></li>

          <li><a href="#" class="nav-link">CONTACTS <i class="material-icons">phone</i></a></li>
          <li><a href="#" class="nav-link">ADMISSIONS <i class="material-icons">school</i></a></li>
            <li><a href="#" class="nav-link">MEDIA <i class="material-icons">movie</i></a></li>
            <!-- <li><a href="../config/action.php?logout" class="nav-link">LOGOUT</a></li> -->

          </ul>
        </nav>
        <button class="button button5"></button>
        
          <script src="/script.js"></script>
          <script src="../StudentLogin/studentLogin.js"></script>
        
    </body>


    
</html>


