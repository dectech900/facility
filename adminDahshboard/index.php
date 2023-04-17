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
<?php include_once 'includes/head.php' ?>
  <body>
    <div class="wrapper">
      <div class="leftside">
        <?php include 'includes/sideNav.php'; ?>
      </div>
      <div class="rightside">
          <div class="boxContainer">
              <div class="box">
                  <div class="icon">
                  <i class="fas fa-users"></i>
                  </div>
                  <div class="info">
                    <h3>Total Guest</h3>
                    <h1><?= $usersCountGuest; ?></h1>
                  </div>
              </div>
              <div class="box">
                  <div class="icon">
                  <i class="fas fa-calendar-check"></i>
                  </div>
                  <div class="info">
                    <h3>Total Bookings</h3>
                    <h1><?= $bookingCount; ?></h1>
                  </div>
              </div>
              <div class="box">
                  <div class="icon">
                  <i class="fas fa-user-graduate"></i>
                  </div>
                  <div class="info">
                    <h3>Total Students</h3>
                    <h1>1</h1>
                  </div>
              </div>
          </div>


          <div class="bookingContainer">
              <div class="px-4 py-8 sm:px-0">
                  
                  <div class="flex flex-col">
                  <h1 class="py-3" style="font-size: 1.7rem;"><i class="fas fa-book"></i> Bookings</h1>

                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                            <tr>
                            
                              <th
                                scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              >
                                #
                              </th>
                              <th
                                scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              >
                                Facility
                              </th>
                              <th
                                scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              >
                                Email
                              </th>
                            
                              <th
                                scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              >
                                Booked Start date
                              </th>
                              <th
                                scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              >
                                Booked End date
                              </th>
                              <th
                                scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              >
                                Number of Date
                              </th>
                              <th
                                scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              >
                                Facility Price
                              </th>
                              <th
                                scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              >
                                Total Price
                              </th>
                             
                              <th
                                scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              >
                                Booked on
                              </th>
                             
                              
                                <th
                                scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              >
                                Action
                              </th>
                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                          <?php while($data = mysqli_fetch_assoc($queryBookings)): ?>
                                <tr>
                                 
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                 
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                     <?= $data['facility']; ?>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  <?= $data['email']; ?>
                                  </td>
                                  
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  <?= $data['start_date']; ?>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  <?= $data['end_date']; ?>
                                  </td>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  <?= $data['number_of_days']; ?>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  <?= $data['facilityPrice']; ?>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  <?= $data['total_price']; ?>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm ext-gray-500">
                                  <?= $data['created_at']; ?>
                               
                                  </td>
                                  
                                
                               <td class="px-6 py-4">
                                 <a  href="bookingDetailed.php?edit=<?= $data['id'] ?>" class="fas fa-eye"></a>
                              
                               <a href="index.php?del=<?= $data['id'] ?>" class="fas del fa-trash"></a>
                               </td>
                                </tr>
                         
        <?php endwhile; ?>
                        
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>


      </div>
    </div>




    <!-- Modal toggle -->
<!-- <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Toggle modal
</button> -->

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

  </body>
</html>
