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



$usersBooking = "SELECT * FROM users WHERE user_type = 'STUDENT' ORDER BY created_at";
$query = mysqli_query($conn, $usersBooking);

//delete
if(isset($_GET['del'])){
  $del_id = $_GET['del'];
  $delSql = "DELETE FROM users WHERE id = '$del_id'";
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
          <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
<li><a href="students.php"><i class="fas fa-user-graduate"></i> Students</a></li>
<li><a href="guest.php"><i class="fas fa-user"></i> Guest</a></li>
<li><a href="../config/action.php?logout-admin"><i class="fas fa-sign-out-alt"></i> Logout</a></li>

            <li><a href=""></a></li>
            <li><a href=""></a></li>

          </ul>
        </nav>
      </div>
      <div class="rightside">
          <!-- <div class="boxContainer">
              <div class="box">
                  <div class="icon">
                    <img src="" alt="">
                  </div>
                  <div class="info">
                    <h3>Total Guest</h3>
                    <h1>1</h1>
                  </div>
              </div>
              <div class="box">
                  <div class="icon">
                    <img src="" alt="">
                  </div>
                  <div class="info">
                    <h3>Total Bookings</h3>
                    <h1>1</h1>
                  </div>
              </div>
              <div class="box">
                  <div class="icon">
                    <img src="" alt="">
                  </div>
                  <div class="info">
                    <h3>Total Students</h3>
                    <h1>1</h1>
                  </div>
              </div>
          </div> -->


          <div class="bookingContainer">
              <div class="px-4 py-8 sm:px-0">
                  
                  <div class="flex flex-col">
                    <h1 class="py-3" style="font-size: 1.7rem;"><i class="fas fa-user-graduate"></i>Students</h1>
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
                                Name
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
                              Phone
                              </th>
                              <th
                                scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              >
                                Student
                              </th>
                              <th scope="col" class="relative px-6 py-3">
                                <span class="text-gray-500 font-medium">Booked On</span>
                              </th>
                                <th
                                scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                              >
                                Created At
                              </th>
                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                          <?php while($data = mysqli_fetch_assoc($query)): ?>
                                <tr>
                                 
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                 
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                     <?= $data['name']; ?>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  <?= $data['email']; ?>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  <?= $data['phone']; ?>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                  <?= $data['student_id']; ?>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm ext-gray-500">
                                  <?= $data['created_at']; ?>
                                    <!-- <Link
                                      to="/student"
                                      class="text-indigo-600 hover:text-indigo-900"
                                    >
                                      <span></span>
                  <span class="bg-warning text-white px-2 py-1 rounded-full">In-Progress</span>
                                     
                                    </Link> -->
                                  </td>
                                  
                                
                               <td class="px-6 py-4">
                                 <!-- <a  href="bookingDetailed.php?edit=<?// $data['id'] ?>" class="fas fa-eye"></a> -->
                              
                               <a href="students.php?del=<?= $data['id'] ?>" class="fas del fa-trash"></a>
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
  </body>
</html>
