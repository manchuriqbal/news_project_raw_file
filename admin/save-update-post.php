<?php 

if (isset($_REQUEST['submit'])) {
    include "config.php";
    if (empty($_FILES['new-image']['name'])) {
        $new_name = $_POST['old_image'];
    } else{
        $errors = array();

        $file_name = $_FILES['new-image']['name'];
        $file_size = $_FILES['new-image']['size'];
        $file_tmp = $_FILES['new-image']['tmp_name'];
        $file_type = $_FILES['new-image']['type'];
        $file_ext_parts = explode('.', $file_name);
        $file_ext = end($file_ext_parts);
    
        $extensions = array('jpg', 'png', 'jpeg');
    
        if(in_array($file_ext, $extensions) === false) {
            $errors[] = "This extension file is not allowed. Please choose a jpg or png file.";
        }
        if ($file_size > 2097152) {
            $errors[] = "File size must be 2 mb or lower.";
        }
        $new_name = time().'-'.basename($file_name);
        $target = "upload/".$new_name;
    
        if(empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
        
    }

    $post_id = $_POST['post_id'];
    $post_title = mysqli_real_escape_string($connection, $_POST['post_title']);
    $post_desc = mysqli_real_escape_string($connection, $_POST['post_desc']);
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $post_img = $_POST['old_image'];

    $query = "UPDATE post SET 
        post_title= '{$post_title}', 
        post_desc='{$post_desc}', 
        category='{$category}',
        post_img='{$new_name}' 
        WHERE post_id = '{$post_id}';";
    if ($category != $_POST['old_category'] ) {
        $query .= "UPDATE category SET post = post - 1 WHERE category_id = '{$_POST['old_category']}';";
        $query .= "UPDATE category SET post = post + 1 WHERE category_id = '{$category}';";
    }

    $result = mysqli_multi_query($connection, $query) or die('post update query failed');



    if ($post_img != $new_name) {
        unlink("upload/".$post_img);
    }

    if ($result) {
        header('location: post.php');
        exit();
    } else {
        echo "Query Faioled";
    }


}

?>

 