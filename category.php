<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
            <?php
                  include "admin/config.php";

                  $limit = 5;

                  if (isset($_GET['page'])) {
                      $page_number = $_GET['page'];
                  } else {
                      $page_number = 1;
                  }
  
                  $offset = ($page_number - 1) * $limit;
                  if (isset($_REQUEST['category_id'])) {
                    $id = $_REQUEST['category_id'];
            
                 
                  $query = "SELECT post.post_id, post.post_title, post.post_desc,post.category, post.post_img, post.post_date,
                    category.category_name, user.username FROM post 
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.id
                    WHERE category.category_id = '{$id}' ORDER BY category_id DESC LIMIT {$offset}, {$limit}";
                  $result = mysqli_query($connection, $query) or die('Query Field');
                  $count = mysqli_num_rows($result);

                  if ($count > 0) {
                    $row = mysqli_fetch_assoc($result)
                    
            ?>


                  <h2 class="page-heading"><?php echo $row['category_name'] ?></h2>
                        <?php 
                            mysqli_data_seek($result, 0);
                            while ($row = mysqli_fetch_assoc($result)) {
                               
                        ?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href='single.php?id=<?php echo $row['post_id']?>'><img src="admin/upload/<?php echo $row['post_img'] ?>" alt=""/></a>
                            </div>

                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php?id=<?php echo $row['post_id']?>'><?php echo $row['post_title'] ?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php?category_id=<?php echo $row['category_id'] ?>'><?php echo $row['category_name'] ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php'><?php echo $row['username'] ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $row['post_date'] ?>
                                        </span>
                                    </div>
                                    <p class="description">
                                        Create applications, complete web systems and advanced reports with Business Intelligence concepts using our database-based PHP code generator..........
                                    </p>
                                    <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']?>'>read more</a>
                                </div>
                            </div>

                        </div>
                    </div>
        <?php 
                }
            }
        }
    ?>
                 
<?php
                if (isset($_REQUEST['category_id'])) {
                    $id = $_REQUEST['category_id'];
                $query2 = "SELECT * FROM post WHERE post.category = '{$id}' ORDER BY post_id DESC";
                $result2 = mysqli_query($connection, $query2) or die("Failed.");


                if (mysqli_num_rows($result2)) {
                    $total_user = mysqli_num_rows($result2);
                    $total_page = ceil($total_user / $limit);
                    echo '<ul class="pagination admin-pagination">';
                    if ($page_number > 1) {
                        echo '<li><a href="category.php?page=' . ($page_number - 1) . '">prev</a></li>';
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page_number) {
                            $active = "active";
                        } else {
                            $active = "";
                        }

                        echo '<li class="' . $active . '"><a href="category.php?id='.$id.'page=' . $i . '">' . $i . '</a></li>';
                    }

                    if ($total_page > $page_number) {
                        echo '<li><a href="category.php?page=' . ($page_number + 1) . '">next</a></li>';
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
