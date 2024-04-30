<?php 
include "config.php";
session_start();

if (isset($_REQUEST['fileToUpload'])) {
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.', $file_name));

    $extensions = array('jpg', 'png', 'jpeg');

    if(!in_array($file_ext, $extensions)) {
        $errors[] = "This extension file is not allowed. Please choose a jpg or png file.";
    }
    if ($file_size > 2097152) {
        $errors[] = "File size must be 2 mb or lower.";
    }
    $new_name = time().'-'.basename($file_name);
    $target = "upload/".$new_name;

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, $target);
    } else {
        print_r($errors);
        die();
    }
}



    $post_title = mysqli_real_escape_string($connection, $_POST['post_title']);
    $post_desc = mysqli_real_escape_string($connection, $_POST['post_desc']);
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $date = date('Y-m-d');
    $author = $_SESSION['username'];

    $query = "INSERT INTO post (post_title, post_desc, category, post_date, author, post_img) 
        VALUES ('{$post_title}', '{$post_desc}', '{$category}', '{$date}', '{$author}', '{$new_name}');";
        
    $query .= "UPDATE category SET post = post + 1 WHERE category_id = '{$category}';";
    $result = mysqli_multi_query($connection, $query) or die('Insert query error');



    if ($result) {
        header('location: post.php');
    }


?>