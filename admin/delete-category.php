<?php 

include "config.php";
if ($_SESSION['role'] == '0') {
    header('location: post.php');
}
$category_id = $_REQUEST['id'];
$query = "DELETE FROM category WHERE category_id = '$category_id'";
$result = mysqli_query($connection, $query);

if ($result) {
    header('location: category.php');
} else{
    echo "can't delete this item";
}

mysqli_close()


?>