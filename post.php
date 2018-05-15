<?php
include "includes/db.php";
?>
    <?php
include"includes/header.php";
?>

    <body>

        <!-- Navigation -->
        <?php
        include "includes/navigation.php";
    ?>

            <!-- Page Content -->
            <div class="container">

                <div class="row">

                    <!-- Blog Entries Column -->
                    <div class="col-md-8">

                        <?php
                        if(isset($_GET['p_id'])){
                            $the_post_id=$_GET['p_id'];
                            
                            $view_query="UPDATE posts SET post_views_count=post_views_count + 1 WHERE post_id = $the_post_id";
                            $send_query=mysqli_query($connection,$view_query);
                            
                        
                        
                  $query="SELECT * FROM posts WHERE post_id=$the_post_id";
                  $select_all_posts_query=mysqli_query($connection,$query);
             
                  while ($row=mysqli_fetch_assoc($select_all_posts_query)){
                      $post_id=$row['post_id'];
                      $post_title=$row['post_title'];
                      $post_author=$row['post_author'];
                      $post_date=$row['post_date'];
                      $post_image=$row['post_image'];
                      $post_content=$row['post_content'];
                      
                      ?>

                            <!-- First Blog Post -->
                            <h2>
                                <?php echo"<a href='#'>{$post_title}</a>";?>

                            </h2>
                             <p class="lead">
                                by
                                <a href="author_post.php?author=<?php echo $post_author?>&p_id=<?php echo $post_id?>"><?php echo $post_author?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span>
                                <?php echo"<a href='#'>{$post_date}</a>";?></p>
                            <hr>
                            <img class="img-responsive" src="images/<?php echo "{$post_image}" ;?>" alt="">
                            <hr>
                            <p>
                                <?php echo "{$post_content}";?>
                            </p>
                            

                            <hr>
                            <?php }
                        
                        
                        
                        
                        
                        }else{
                            
                            header("Location:index.php");
                        }
                        
                        
                        
                        
                        ?>




                            <!-- Blog Comments -->



                            
<?php
                if(isset($_POST['comment'])){
            $comment_author=$_POST['comment_author'];
                $comment_email=$_POST['comment_email'];
                $comment_content=$_POST['comment_content'];
                $comment_post_id=$the_post_id;
                $comment_date= date('d-m-y');
                    
                    if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
                        
                           $the_post_id=$_GET['p_id'];
               
                                   
                                   
              
    
                $query="INSERT INTO comments(comment_author,comment_email,comment_content,comment_post_id,comment_date)";
                $query.="VALUES('{$comment_author}','{$comment_email}','{$comment_content}','{$comment_post_id}', now())";
                $create_comments_query=mysqli_query($connection, $query); 
    
                      if(!$create_comments_query){
                      die("QUERY FAILED".mysqli_error($connection));
    }             
    
        
                        $query= "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id= $the_post_id ";
                        $update_comment_count= mysqli_query($connection, $query);    
                }else{
                        
                        
                        
                    echo "<script>alert('Feilds cant be empty')</script>";    
                        
                        
                        
                        
                    }
    
    
                        
                        
                        
                        
                        
                    }
                        
                        
                        
?>
         





                            <!-- Comments Form -->
                            <div class="well">
                                <h4>Leave a Comment:</h4>
                                <form action="" method="post" role="form">

                                    <div class="form-group">
                                        <label>Full Name:</label>
                                        <input type="text" class="form-control" name="comment_author">
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" class="form-control" name="comment_email">
                                    </div>
                                    <div class="form-group">
                                        <label>Comment:</label>
                                        <textarea class="form-control" rows="3" name="comment_content"></textarea>
                                    </div>

                                    <button type="submit" name="comment" class="btn btn-primary">Submit</button>
                                </form>
                            </div>

                            <hr>
                            
                            <?php
                             //comments
                        
                  $query="SELECT * FROM comments WHERE comment_post_id= {$the_post_id} ";
                  $query .= "AND comment_status= 'approved' "; 
                  $query .= "ORDER by comment_id DESC ";
                  $select_comments_query=mysqli_query($connection, $query);
          
                      while($row= mysqli_fetch_assoc($select_comments_query)) {
                                   
                      $comment_author= $row['comment_author'];
                      $comment_content= $row['comment_content'];
                      $comment_date= $row['comment_date'];
     
                       ?>   
                          <div class="media">
                                <a class="pull-left" href="#">
                      
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $comment_author;?>
                                        <small><?php echo $comment_date  ;?></small>
                                    </h4>
                                    <?php echo $comment_content;?>  
                                </div>
                            </div>

                            <!-- Comment end -->
                            
                    
                     
                      
                       
                         
                  
                  
                  
                  
                  
                  
                  
                  
                  <?php } ?>



                    </div>
    <!-- Blog Sidebar Widgets Column -->

                    <!-- Blog Categories Well -->
                    <?php include "includes/sidebar.php";
                ?>

                </div>










                <!-- /.row -->

                <hr>

                <!-- Footer -->
                <?php
       include"includes/footer.php";
        ?>

            </div>
            <!-- /.container -->

            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
