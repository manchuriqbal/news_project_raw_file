<?php 

    include "config.php";
    $post_id = $_GET['id'];
    $category_id = $_GET['category_id'];

    $query1 = "SELECT * FROM post WHERE post_id = '{$post_id}'";
    $result1 = mysqli_query($connection, $query1);
    $row = mysqli_fetch_assoc($result1);

    unlink("upload/".$row['post_img']);

    $query = "DELETE FROM post WHERE post_id = '{$post_id}' ;";
    $query .= "UPDATE category SET post = post - 1 WHERE category_id = '{$category_id}'";

    $result = mysqli_multi_query($connection, $query) or die('Post delete query failed.');

    if ($result) {
        header('location: post.php');
    }
?>