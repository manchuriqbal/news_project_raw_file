<?php include "header.php"; 
    if ($_SESSION['role'] == '0') {
        header('location: post.php');
    }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Editor</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="submit" class="btn btn-primary" value="Add" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>


<?php

if (isset($_REQUEST['submit'])) {
    include "config.php";

    $first_name = mysqli_real_escape_string($connection, $_POST['fname']);
    $last_name = mysqli_real_escape_string($connection, $_POST['lname']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, md5($_POST['password']));
    $role = mysqli_real_escape_string($connection, $_POST['role']);

    $query = "SELECT username FROM user WHERE username='$username'";
    $result = mysqli_query($connection, $query) or die("query_failed");

    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo "this username already used. try another one.";
    } else {
        $query1 = "INSERT INTO user(fname, lname, username, password, role) VALUES ('$first_name','$last_name','$username','$password','$role')";
        $result1 = mysqli_query($connection, $query1) or die("query_failed");
        if ($result1) {
            header("location: users.php");
        }
    }

}

?>
