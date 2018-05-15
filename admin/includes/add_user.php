<?php
if(isset($_POST['add_user'])){
            
                
                $username=$_POST['username'];
                $user_firstname=$_POST['user_firstname'];
                $user_lastname=$_POST['user_lastname'];
                $user_email=$_POST['user_email'];
                $user_phone_number=$_POST['user_phone_number'];
                $user_role=$_POST['user_role'];
                $user_password=$_POST['user_password'];
                //$user_image=$_FILES['user_image']['name'];
                //$user_image_temp=$_FILES['user_image']['tmp_name'];
                
               
                
    
    
    //move_uploaded_file($user_image_temp, "../images/$user_image");
    
    $query="INSERT INTO users(username,user_firstname,user_lastname,user_email,user_phone_number,user_role,user_password)";
    $query.="VALUES('{$username}','{$user_firstname}','{$user_lastname}','{$user_email}','$user_phone_number','{$user_role}','{$user_password}')";
    $create_user_query=mysqli_query($connection, $query); 
    confirm_query($create_user_query);
    
    echo "user has been created succesfully: " . " ". "<a href='users.php'>View all users</a> ";
}
   
?>
   
   
   <form action="" method="post" enctype="multipart/form-data">
    
    
   
       
 
    <div class="form-group">
        <label for="post_author">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    
    
  <div class="form-group">
        <label for="user_firstname">FirstName</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
     <div class="form-group">
        <label for="user_lastname">LastName</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
         <div class="form-group">
        <label for="user_phone_number">Phone Number</label>
        <input type="text" class="form-control" name="user_phone_number">
    </div>
    <div class="form-group">
       
     
            
            <select  name="user_role">
            
            <option value='admin'>Admin</option>
            <option value='Author'>Author</option>
            <option value='subscriber'>subscriber</option>
            </select>
       </div>
     <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    
    

       
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
    </div>
</form>