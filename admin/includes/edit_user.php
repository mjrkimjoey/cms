<?php

   if(isset($_GET['edit_user'])){
$the_user_id=$_GET['edit_user'];
 
                      $query="SELECT * FROM users WHERE user_id=$the_user_id";
                      $select_users_query=mysqli_query($connection,$query);
                                      
                      while ($row=mysqli_fetch_assoc($select_users_query)){
                      $user_id=$row['user_id'];
                      $username=$row['username'];
                      $user_firstname=$row['user_firstname'];
                      $user_lastname=$row['user_lastname'];
                      $user_role=$row['user_role'];
                      $user_email=$row['user_email']; 
                      $user_phone_number=$row['user_phone_number'];   
                      $user_password=$row['user_password'];
                      }
   }
    
    if(isset($_POST['edit_user'])){

                $username=$_POST['username'];
                $user_firstname=$_POST['user_firstname'];
                $user_lastname=$_POST['user_lastname'];
                $user_email=$_POST['user_email'];
                $user_phone_number=$_POST['user_phone_number'];
                $user_role=$_POST['user_role'];
                $user_password=$_POST['user_password'];

        
    $query="SELECT randSalt FROM users";
    $select_randsalt_query=mysqli_query($connection,$query);
    if(!$select_randsalt_query){
        die("QUERY FAILED".mysqli_error($connection));
    }
         
    $row=mysqli_fetch_array($select_randsalt_query);
    $salt=$row['randSalt'];
    $hashed_password=crypt($user_password,$salt);      
        
        
        
        
        

              $query="UPDATE users SET ";
              $query.="username = '{$username}', ";
              $query.="user_firstname ='{$user_firstname}', ";
              $query.="user_lastname ='{$user_lastname}', ";
              $query.="user_role ='{$user_role}', ";
              $query.="user_password ='{$hashed_password}', ";
              $query.="user_phone_number ='{$user_phone_number}', ";
              $query.="user_email ='{$user_email}' ";
              $query.="WHERE user_id ={$the_user_id} ";
    
          $update_user_query=mysqli_query($connection, $query);
           confirm_query($update_user_query);
        
        echo "<p class='bg-success'>User updated successfully</p>";
          
          }
 





?>
   
   
   <form action="" method="post" enctype="multipart/form-data">
  
    <div class="form-group">
        <label for="post_author">Username</label>
        <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
    </div>
    
    
  <div class="form-group">
        <label for="user_firstname">FirstName</label>
        <input type="text"  value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
    </div>
     <div class="form-group">
        <label for="user_lastname">LastName</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_phone_number">Phone Number</label>
        <input type="text" value="<?php echo $user_phone_number; ?>" class="form-control" name="user_phone_number">
    </div>
    <div class="form-group">
       
     
            
            <select  name="user_role">
            <option value='<?php echo $user_role; ?>'><?php echo $user_role; ?></option>
            <option value='admin'>Admin</option>
            <option value='Author'>Author</option>
            <option value='subscriber'>subscriber</option>
            </select>
       </div>
     <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
    </div>
    
    

       
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
    </div>
</form>