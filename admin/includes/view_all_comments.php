 <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>email</th>
                                    <th>Status</th>
                                    <th>In Response To</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                
         <?php 
                      $query="SELECT * FROM comments";
                      $select_comments=mysqli_query($connection,$query);
                                      
                      while ($row=mysqli_fetch_assoc($select_comments)){
                      $comment_id=$row['comment_id'];
                      $comment_post_id=$row['comment_post_id'];
                      $comment_author=$row['comment_author'];
                      $comment_email=$row['comment_email'];
                      $comment_content=$row['comment_content'];
                      $comment_status=$row['comment_status'];
                      $comment_date=$row['comment_date'];
                     
                          echo "<tr>";
                          
                          echo "<td>$comment_id</td>";
                          echo "<td>$comment_author</td>";
                          echo "<td>$comment_content</td>";
                          echo "<td>$comment_email</td>";
                          echo "<td>$comment_status</td>";
                          
                      $query="SELECT * FROM posts WHERE post_id= {$comment_post_id}";
                      $select_posts_id=mysqli_query($connection,$query);
                    
                      while ($row=mysqli_fetch_assoc($select_posts_id)){
                          $post_id=$row['post_id'];
                          $post_title=$row['post_title']; 
                      
                          echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                      }
                          
                          echo "<td>$comment_date</td>";
                
                          
                          
                          
                      
                          
                          
                          
                          /*echo "<td>$post_title</td>";
                      
                         
                        $query="SELECT * FROM comments WHERE comment_id = {comment_post_id";
                                     $select_comments_id = mysqli_query($connection,$query);
                                       
                                     while($row=mysqli_fetch_assoc($select_comments_id)){
                                     $cat_id=$row['cat_id'];
                                     $cat_title=$row['cat_title'];
                                     
                                     echo "<td>$cat_title</td>";
                                     
                                     }
                          
                          
                          */
                          
                          
                          echo "<td><a href='comments.php?approve=$comment_id'><i class='fa fa-check'></i></a></td>";
                          echo "<td><a href='comments.php?unapprove=$comment_id'><i class='fa fa-remove'></i></a></td>";
                          echo "<td><a  onClick=\"javascript:return confirm('Are you sure you want to delete this comment');\"href='comments.php?delete=$comment_id'><i class='fa fa-trash'></i></a></td>";
                           
                          echo"</tr>";
                      
                      }
                                ?>                    
                                   
                                
                            </tbody>
                        </table>
                        
                       
                      
                     
                    
                   
                  
 <?php
if(isset($_GET['delete'])){
    $the_comment_id=$_GET['delete'];
    $query="DELETE FROM comments WHERE comment_id='{$the_comment_id}'";
    $delete_query=mysqli_query($connection, $query);
    header("location: comments.php");
}
   

if(isset($_GET['approve'])){
    $the_comment_id=$_GET['approve'];
    $query="UPDATE comments SET comment_status='approved' WHERE comment_id='{$the_comment_id}'";
    $approve_query=mysqli_query($connection, $query);
    header("location: comments.php");
}


if(isset($_GET['unapprove'])){
    $the_comment_id=$_GET['unapprove'];
    $query="UPDATE comments SET comment_status='unapproved' WHERE comment_id='{$the_comment_id}'";
    $disapprove_query=mysqli_query($connection, $query);
    header("location: comments.php");
}









?>