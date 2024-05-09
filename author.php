<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">


                <!-- post-container -->
                <div class="post-container">

<?php 

    include "admin/config.php";
    if (isset($_GET['id'])) {
        $author_id = $_GET['id'];

        $query = "SELECT * FROM user WHERE id={$author_id}";
        $result = mysqli_query($connection, $query) or die("author query failed.");
        
        $row = mysqli_fetch_assoc($result);
                


?>
                  <h2 class="page-heading"><?php echo strtoupper($row['username']) ?></h2>

<?php 
    include "admin/config.php";
    
    $limit = 5;

    if (isset($_GET['page'])) {
        $page_number = $_GET['page'];
    } else {
        $page_number = 1;
    }

    $offset = ($page_number - 1) * $limit;
    if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    
    $query2 = "SELECT post.post_id, post.post_title, post.post_desc,post.category, post.post_img, post.post_date,
    category.category_name, user.username, user.id FROM post 
    LEFT JOIN category ON post.category = category.category_id
    LEFT JOIN user ON post.author = user.id
    WHERE user.id = '{$id}' ORDER BY id DESC LIMIT {$offset}, {$limit}";
    $result2 = mysqli_query($connection, $query2) or die('Query Field');
    $count = mysqli_num_rows($result2);

    if ($count > 0) {
    while ($row2 = mysqli_fetch_assoc($result2)) {

                    

?>
                    <div class="post-content">

                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="single.php?id=<?php echo $row2['post_id']?>"><img src="admin/upload/<?php echo $row2['post_img']?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href="single.php?id=<?php echo $row2['post_id']?>"><?php echo $row2['post_title']?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php?category_id=<?php echo $row2['category'] ?>'><?php echo $row2['category_name']?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php?id=<?php echo $row2['id']?>'><?php echo $row2['username']?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $row2['post_date']?>
                                        </span>
                                    </div>
                                    <p class="description"> <?php echo substr($row2['post_desc'], 0, 150).'...'?> </p>
                                    <a class='read-more pull-right' href="single.php?id=<?php echo $row2['post_id']?>">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>


<?php
                }
           }
        }
    }

        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
        $query2 = "SELECT * FROM post WHERE post.author = '{$id}' ORDER BY post_id DESC";
        $result2 = mysqli_query($connection, $query2) or die("Failed.");


        if (mysqli_num_rows($result2)) {
            $total_user = mysqli_num_rows($result2);
            $total_page = ceil($total_user / $limit);
            echo '<ul class="pagination admin-pagination">';
            if ($page_number > 1) {
                echo '<li><a href="author.php?id='.$id.'&page=' . ($page_number - 1) . '">prev</a></li>';
            }
            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $page_number) {
                    $active = "active";
                } else {
                    $active = "";
                }

                echo '<li class="' . $active . '"><a href="author.php?id='.$id.'&page=' . $i . '">' . $i . '</a></li>';
            }

            if ($total_page > $page_number) {
                echo '<li><a href="author.php?id='.$id.'&page=' . ($page_number + 1) . '">next</a></li>';
            }
            echo '</ul>';
        }
    }
?>
                </div><!-- /post-container -->


            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
