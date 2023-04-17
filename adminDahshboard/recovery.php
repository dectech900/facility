  

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
                                Booked period
                              </th>
                              <th scope="col" class="relative px-6 py-3">
                                <span class="text-gray-500 font-medium">Booked On</span>
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
                                  <?= $data['booking_time']; ?>
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
