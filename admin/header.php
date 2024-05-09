<?php 

    session_start();
    if (!isset($_SESSION['username'])) {
        header('location: index.php');
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News Site</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="../images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
            <div class=" col-md-offset-1 col-md-3">
                <h5><?php echo $_SESSION['username']?></h5>
            </div>
           


            <div class="col-md-offset-9  col-md-3">
                
                <a href="logout.php" class="admin-logout" >logout</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <center>
						   <ul class="admin-menu">
								<li>
									<a href="post.php">Post</a>
								</li>


                        <?php 
                            if ($_SESSION['role']== 1){
                                # code...
                            
                        ?>

								<li>
									<a href="category.php">Category</a>
								</li>
								<li>
									<a href="users.php">Users</a>
								</li>
                            
                            <?php

                            }
                            ?>

							</ul>
						<center>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
