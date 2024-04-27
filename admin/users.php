<?php include "header.php";?>


  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">


                <?php
                  include "config.php";
                  $query = "SELECT * FROM user ORDER BY id DESC";
                  $result = mysqli_query($connection, $query);
                  $count = mysqli_num_rows($result);

                  if ($count > 0) {
                    
                ?>

                  <table class="content-table">
                      <thead>
                          <th>DB ID</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>

                      <?php 
                        while ($row = mysqli_fetch_assoc($result)) {
                          

                      ?>
                    <tr>
                        <td class='id'> <?php echo $row['id'] ?></td>
                        <td> <?php echo $row['fname'] ." ". $row['lname']?> </td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php
                        
                        if ($row['role'] >0 ) {
                          echo "Admin";
                        } else {
                          echo "Editor";
                        }
                        
                        
                        ?>
                        </td>
                        <td class='edit'><a href='update-user.php?id='><i class='fa fa-edit'></i></a></td>
                        

                        <td class='delete'><a onclick="return confirm('Are You Sure?')" href='delete-user.php?id='><i class='fa fa-trash-o'></i></a></td>
                    </tr>

              <?php 
                    }
                  }
              ?>



                      <!-- <li class="active"><a>1</a></li> -->
                    


              </div>
          </div>
      </div>
  </div>



