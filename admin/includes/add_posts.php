<?php

if(isset($_POST['create_post'])){
            
                
                $post_title=$_POST['post_title'];
                $post_author=$_POST['post_author'];
                $post_category_id=$_POST['post_category'];
                $post_status=$_POST['post_status'];
                $post_image=$_FILES['post_image']['name'];
                $post_image_temp=$_FILES['post_image']['tmp_name'];
                
                $post_tags=$_POST['post_tags'];
                $post_content=$_POST['post_content'];
                $post_date= date('d-m-y');
                
    
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query="INSERT INTO posts(post_category_id,post_title,post_author,post_date,
    post_image,post_content,post_tags,post_status)";
    $query.="VALUES('{$post_category_id}','{$post_title}','{$post_author}', now() ,'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
    
    $create_post_query=mysqli_query($connection, $query); 
    confirm_query($create_post_query);
    
   $the_post_id=mysqli_insert_id($connection);
    
   echo "<p class='bg-success'>Post submitted successfly<a href='../post.php?p_id={$the_post_id}'> View Post </a> or <a href='posts.php?source=add_post'>Write more posts</a></p>";  
    
}
   
?>


    <form action="" method="post" enctype="multipart/form-data">


        <div class="form-group">
            <label for="post_title">Post title</label>
            <input type="text" class="form-control" name="post_title">
        </div>


        <div class="form-group">
            <label for="post_author">Post category</label><br>
            <select name="post_category" id="">
            <?php
            $query="SELECT * FROM categories";
            $select_categories= mysqli_query($connection,$query);
            
            confirm_query($select_categories);
            
            
            while($row=mysqli_fetch_assoc($select_categories)){
                $cat_id=$row['cat_id'];
                $cat_title=$row['cat_title'];
            
             
            echo "<option value='$cat_id'>{$cat_title}</option>";
            }
            
            ?>
            
            
        
            
            
            
            
            
        </select>
        </div>
        <div class="form-group">
            <label for="post_author">Post Athour</label>
            <input type="text" value="<?php echo $_SESSION['user_firstname']." ".$_SESSION['user_lastname'];?>" class="form-control" name="post_author">
        </div>


                <div class="form-group">
            <label for="post_author">Post Status</label><br>
            <select name="post_status" id="">
            
            <option value='draft'>Draft</option>
            <option value='published'>Publish</option>
            
 
        </select>
        </div>
        <div class="form-group">
            <label for="post_image">Post image</label>
            <input type="file" class="form-control" name="post_image">
        </div>
        <div class="form-group">
            <label for="post_tags">Post tags</label>
            <input type="text" class="form-control" name="post_tags">
        </div>
        <div class="form-group">
            <label for="post_content">Post content</label>
            <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
        </textarea>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_post" value="Submit">
        </div>
    </form>
