<?php include "header.php"; 
    if ($_SESSION['role'] == '0') {
        header('location: post.php');
    }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>


<?php

if (isset($_REQUEST['submit'])) {
    include "config.php";

    $category_name = mysqli_real_escape_string($connection, $_POST['category_name']);

    $query = "SELECT category_name FROM category WHERE category_name='$category_name'";
    $result = mysqli_query($connection, $query) or die("query_failed");

    $count = mysqli_num_rows($result);
    echo $count;
    if ($count > 0) {
        echo "this name already used. try another one.";
    } else {
        $query1 = "INSERT INTO category(category_name) VALUES ('$category_name')";
        $result1 = mysqli_query($connection, $query1) or die("query_failed");
        if ($result1) {
            header("location: category.php");
        }
    }

}

?>

