<?php include "includes/header.php";?>
<?php
if(isset($_SESSION['username'])){
    
    $username=$_SESSION['username'];
    $query="SELECT * FROM users WHERE username = '{$username}'";
    $select_user_profile_query=mysqli_query($connection,$query);
    
    while($row=mysqli_fetch_array($select_user_profile_query)){
       $user_id=$row['user_id'];
                      $username=$row['username'];
                      $user_firstname=$row['user_firstname'];
                      $user_lastname=$row['user_lastname'];
                      $user_email=$row['user_email'];
                      $user_image=$row['user_image'];
                      $user_role=$row['user_role'];
                         
        
        
        
    }
    
}


    if(isset($_POST['update_profile'])){

                $username=$_POST['username'];
                $user_firstname=$_POST['user_firstname'];
                $user_lastname=$_POST['user_lastname'];
                $user_email=$_POST['user_email'];
                $user_role=$_POST['user_role'];
                $user_password=$_POST['user_password'];

              $query = "UPDATE users SET ";
              $query .="username = '{$username}', ";
              $query .="user_firstname ='{$user_firstname}', ";
              $query .="user_lastname ='{$user_lastname}', ";
              $query .="user_email ='{$user_email}', ";
              $query .="user_role ='{$user_role}', ";
              $query .="user_password ='{$user_password}' "; 
              $query .= "WHERE username = '{$username}' ";
    
              $update_user_query=mysqli_query($connection, $query);
           if(!$update_user_query){
    die("QUERY FAILED". mysqli_error($connection));
}
          
          }
 



















?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php";?>
        <!-- Navigation -->
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin area
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>
                      
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
       
     
            
            <select  name="user_role">
            <option value='<?php echo $user_role; ?>'><?php echo $user_role; ?></option>
            <option value='Admin'>Admin</option>
            <option value='Author'>Author</option>
            <option value='subscriber'>subscriber</option>
            </select>
       </div>
     <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    
    

       
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_profile" value="update profile">
    </div>
</form>  
               </div>
                </div>
                <!-- /.row -->
 
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

    <!-- /#wrapper -->
    <?php include "includes/footer.php";?>
