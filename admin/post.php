<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">

                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>

                          <tr>
                              <td class='id'>1</td>
                              <td><img height="50px" src="../images/post_1.jpg"></td>
                              <td>Post Title</td>
                              <td>Category Name</td>
                              <td>This is my post</td>
                              <td>manchur</td>

<td class='edit'><a href='update-post.php?id='><i class='fa fa-edit'></i></a></td>
<td class='delete'><a onclick="return confirm('Are You Sure?')" href='delete-post.php?id='><i class='fa fa-trash-o'></i></a></td>


                          </tr>

                      </tbody>

                  </table>

              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
