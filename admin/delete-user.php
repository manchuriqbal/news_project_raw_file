<?php
    include "config.php";
    $id = $_GET['id'];

    $query = "DELETE FROM user WHERE id = '{$id}'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header('location: users.php');
    } else {
        echo "Delete Failed!";
    }

?>