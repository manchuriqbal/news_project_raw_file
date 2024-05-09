<?php include "header.php"; 
    if ($_SESSION['role'] == '0') {
        header('location: post.php');
    }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Update User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">


                  <?php 

                    include "config.php";
                    $id = $_REQUEST['id'];

                    $query = "SELECT * FROM user WHERE id = '$id'";
                    $result = mysqli_query($connection, $query);
                    $count = mysqli_num_rows($result);
                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            

                ?>
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER["PHP_SELF"]?>" method ="POST" autocomplete="off">
                  <div class="form-group">
                          <input type="hidden" name="id" value="<?php echo $row['id'] ?>" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" value="<?php echo $row['fname'] ?>" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" value="<?php echo $row['lname'] ?>" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Username" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >

                            <?php 
                                if ($row['role'] == 1) {
                                   echo "<option value='0' >Editor</option>
                                    <option value='1' selected>Admin</option>";
                                } else {
                                    echo "<option value='0' selected>Editor</option>
                                     <option value='1' >Admin</option>";
                                 }
                            ?>
                              <!-- <option value="0">Editor</option>
                              <option value="1">Admin</option> -->
                          </select>
                      </div>
                      <input type="submit"  name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                   <!-- Form End-->

                   <?php 
                        }
                    }
                   ?>
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>


<?php 

if (isset($_POST['submit'])) {
    include "config.php";
    
    $id = mysqli_real_escape_string($connection,$_POST['id']);
    $first_name = mysqli_real_escape_string($connection, $_POST['fname']);
    $last_name = mysqli_real_escape_string($connection, $_POST['lname']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $role = mysqli_real_escape_string($connection, $_POST['role']);


    $query1 = "UPDATE user SET 
    fname = '{$first_name}', 
    lname = '{$last_name}', 
    username = '{$username}', 
    role = '{$role}' WHERE id = '{$id}'";
    
    $result1 = mysqli_query($connection, $query1) or die("Query Failed");
    if ($result1) {
       header('location: users.php');
    }

}


?>