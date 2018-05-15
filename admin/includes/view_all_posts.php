<?php
if(isset($_POST['checkBoxArray'])){
    
    
foreach($_POST['checkBoxArray']as $postValueId){
    
    
 $bulk_options=$_POST['bulk_options'];
    
    switch($bulk_options){
        case 'published':
            
$query= "UPDATE posts SET post_status='{$bulk_options}' WHERE post_id={$postValueId} ";

    $update_to_published_status=mysqli_query($connection,$query);
             confirm_query($update_to_published_status);
    
         break;
        case 'draft':
    $query= "UPDATE posts SET post_status='{$bulk_options}' WHERE post_id={$postValueId} ";

    $update_to_published_status=mysqli_query($connection,$query);
             confirm_query($update_to_published_status);        
            
       break;
            
        case 'delete':
            
$query= "DELETE FROM posts WHERE post_id={$postValueId} ";

$update_to_published_status=mysqli_query($connection,$query);
 confirm_query($update_to_published_status);   
            
            
        break;   
            
    }
  
}  
     
}

?>



<form action="" method="post">

<table class="table table-bordered table-hover">
                           
     <div id="bulkoptionsContainer" class="col-xs-4">
       <select class="form-control" name="bulk_options" id="">
           
         <option value="">select options</option>  
          <option value="published">Publish</option>   
          <option value="draft">Draft</option>   
           <option value="delete">Delete</option>  
       </select>  
         
         
         
         
     </div>                      
       <div  class="col-xs-4">                    
       <input type="submit" name="submit" class="btn btn-success" value="Apply">
                                          
                            <thead>
                                <tr>
                                    <th><input id="selectAllBoxes" type="checkbox"></th>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Edited by</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Views</th>
                                    <th>Date & Time </th>
                                    <th>View post</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                
         <?php 
                      $query="SELECT * FROM posts";
                      $select_posts=mysqli_query($connection,$query);
                                      
                      while ($row=mysqli_fetch_assoc($select_posts)){
                      $post_id=$row['post_id'];
                      $post_author=$row['post_author'];
                      $edited_by=$row['edit_by'];   
                      $post_title=$row['post_title'];
                      $post_category_id=$row['post_category_id'];
                      $post_status=$row['post_status'];
                      $post_image=$row['post_image'];
                      $post_tags=$row['post_tags'];
                      $post_comment_count=$row['post_comment_count'];
                      $post_views_count=$row['post_views_count'];
                      $time=$row['time'];
                          echo "<tr>";
                          ?>
                      
                          <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id;?>'>      
                                </td>
                                
                                
                               
                          
                          
                          <?php
                          echo "<td>$post_id</td>";
                          echo "<td>$post_author</td>";
                          echo "<td>$edited_by</td>";
                          echo "<td>$post_title</td>";
                      
                         
                        $query="SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                                     $select_categories_id = mysqli_query($connection,$query);
                                       
                                     while($row=mysqli_fetch_assoc($select_categories_id)){
                                     $cat_id=$row['cat_id'];
                                     $cat_title=$row['cat_title'];
                                     
                                     echo "<td>$cat_title</td>";
                                     
                                     }
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          echo "<td>$post_status</td>";
                          echo "<td><img width='100' height='50' src='../images/$post_image'></td>";
                          echo "<td>$post_tags</td>";
                          echo "<td>$post_comment_count</td>";
                          echo "<td>$post_views_count</td>";
                          echo "<td>$time</td>";
                          echo "<td><a href='../post.php?p_id={$post_id}'><i class='fa fa-'></i>View post</a></td>";
                          echo "<td><a href='posts.php?source=edit_post&p_id=$post_id'><i class='fa fa-pencil'></i></a></td>";
                          echo "<td><a  onClick=\"javascript:return confirm('Are you sure you want to delete this');\"href='posts.php?delete=$post_id'><i class='fa fa-trash'></i></a></td>";
                          echo"</tr>";
                      
                      }
                                ?>                    
                                   
                                
                            </tbody>
                        </table>
                        
                    </form>   
                      
                     
                    
                   
                  
 <?php
if(isset($_GET['delete'])){
    $the_post_id=$_GET['delete'];
    $query="DELETE FROM posts WHERE post_id='{$the_post_id}'";
    $delete_query=mysqli_query($connection, $query);
    header("location: posts.php");
}
    ?>