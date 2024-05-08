<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                  

        <?php 
            include "admin/config.php";
            $id = $_REQUEST['id'];

            $query = "SELECT post.post_id, post.post_title, post.post_desc,post.category, post.post_img, post.post_date,
                    category.category_name, user.username FROM post 
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.id
                    WHERE post.post_id = '{$id}'";
            $result = mysqli_query($connection, $query) or die('update query failed!');
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    

        
        ?>

                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo $row['post_title']?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo $row['category_name']?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php'><?php echo $row['username']?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date']?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php echo $row['post_img'] ?>" alt=""/>
                            <p class="description">
                            <?php echo $row['post_desc']?>
                            </p>
                        </div>
                    </div>
                    <!-- /post-container -->
        <?php 

                }
            }

        ?>
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
