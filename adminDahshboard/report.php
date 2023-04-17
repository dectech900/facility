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



$bookingSql = "SELECT * FROM bookings ORDER BY created_at";
$queryBookings = mysqli_query($conn, $bookingSql);
$bookingCount = mysqli_num_rows($queryBookings);

$users = "SELECT * FROM users WHERE user_type = 'STUDENT' ORDER BY created_at";
$queryUser = mysqli_query($conn, $users);
$usersCount = mysqli_num_rows($queryUser);

$usersGuest = "SELECT * FROM users WHERE user_type = 'GUEST' ORDER BY created_at";
$queryUserGuest = mysqli_query($conn, $usersGuest);
$usersCountGuest = mysqli_num_rows($queryUserGuest);

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
<?php include 'includes/head.php' ?>
  <body>
    <div class="wrapper">
      <div class="leftside">
        <?php include 'includes/sideNav.php'; ?>
      </div>
      <div class="rightside">
      <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Reports</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Generate Report</li>
                        </ol>

                        <hr>
                  <div class="row">
                    <div class="col-md-4">
                        <h4>Daily Report</h4>
                      
                    <button type="button" class="btn btn-primary" style="background: blue" onclick="generateTodayReport()">Generate</button>
               
                    </div>

                    <div class="col-md-4">
                        <h4>Range Report</h4>
                        
                            <input type="date" name="fromDate" id="fromDate" class="form-control form-group" placeholder="">
                            <input type="date" name="toDate" id="toDate" class="form-control form-group" placeholder="">
                    <button class="btn btn-primary form-group"  style="background: blue"  type="button" onclick="generateReportByRange()">Generate</button>

                    </div>

                </div>
                <hr><br>

                <div class="reportDisplaySection" id="">
     <table class="table table-bordered" id="dataTable" width="100%" data-order='[[ 1, "asc" ]]' data-page-length='5' cellspacing="0">
     <thead >
                
                <th>#</th>
                <th>Facility</th>
                <th> Email</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Number of days</th>
                <th>Facility Price</th>
                <th>Total Price</th>
    
                <th>Booked Date</th>
         
               
                   
                </thead>
    
                <tbody id="tableDataReport">
    
                </tbody>

            </table>
              <!--  <a href="" class="btn btn-primary">Print</a> -->
</div>
                       
                    </div>
                </main>

      </div>
    </div>






<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Terms of Service
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
       <div>
            
       </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>



<script>
    function openEditUsersModal(id) {

        var data = {'id': id};
         $.ajax({
            url: '../modal/viewBookingModal.php',
            method : 'post',
            data : data,
            success : function(data){
                $("body").append(data);
                $("#defaultModal").modal('show');
            },
            error: function(){
                alert('error occured');
            }
        });
    }
</script>



<script>  
                function generateTodayReport(){
             let  tableDataReport = document.getElementById('tableDataReport');
            var report = "TodayReport";
            
                  if(report == ''){
                    tableDataReport.innerHTML = '';
                  }
                    var xhr = new XMLHttpRequest();
                    // console.log(xhr);
                
                    xhr.open("POST","action.php?report="+report, true);
                    xhr.onload = function(){
                        if(this.readyState == 4 && this.status == 200){
                             tableDataReport.innerHTML = this.responseText;
                            console.log(this.responseText);
                            
                        }
                    }
            
                    xhr.send();
                }
            </script>
            
            <script>
                function generateReportByRange(){
             let  tableDataReport = document.getElementById('tableDataReport');
              let  fromDate = document.getElementById('fromDate').value;
               let  toDate = document.getElementById('toDate').value;
            
            var report = "rangeReport"; 
            
                  if(report == ''){
                    tableDataReport.innerHTML = '';
                  }
                    var xhr = new XMLHttpRequest();
                    // console.log(xhr);
                
                    xhr.open("POST","action.php?rangeReport="+report+"&fromDate="+fromDate+"&toDate="+toDate, true);
                    xhr.onload = function(){
                        if(this.readyState == 4 && this.status == 200){
                             tableDataReport.innerHTML = this.responseText;
                            console.log(this.responseText);
                            
                        }
                    }
            
                    xhr.send();
                }
            </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
  </body>
</html>
