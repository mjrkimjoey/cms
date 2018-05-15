<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
<?php 
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $user_email=$_POST['user_email']; 
    $user_phone_number=$_POST['user_phone_number']; 
    $user_password=$_POST['user_password']; 
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    
    if(!empty($username) && !empty($user_email) && !empty($user_phone_number) && !empty($user_password) && !empty($user_firstname) && !empty($user_lastname)){
        
     
    $username=mysqli_real_escape_string($connection,$username);
    $user_email=mysqli_real_escape_string($connection,$user_email);
    $user_phone_number=mysqli_real_escape_string($connection,$user_phone_number);
    $user_password =mysqli_real_escape_string($connection,$user_password);
    $user_firstname =mysqli_real_escape_string($connection,$user_firstname);
    $user_lastname=mysqli_real_escape_string($connection,$user_lastname);
    
    
    
    $query="SELECT randSalt FROM users";
    $select_randsalt_query=mysqli_query($connection,$query);
    if(!$select_randsalt_query){
        die("QUERY FAILED".mysqli_error($connection));
    }
    
    $row=mysqli_fetch_array($select_randsalt_query);
    $salt=$row['randSalt'];
    $user_password=crypt($user_password,$salt);   
     
    
    $query="INSERT INTO users(username,user_firstname,user_lastname,user_email,user_phone_number,user_password)";
    $query.="VALUES('{$username}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_phone_number}','{$user_password}')";
    
    $register_new_user=mysqli_query($connection, $query);
    if(!$register_new_user){
        die("QUERY FAILED".mysqli_error($connection));
       }
        
     $message="<p class='bg-success'>Registered sucessfully. Proceed to login <a href='index.php'>Here</a></p>";    
         
        
        
        
        
        
        
        
    } else{
        
        $message="<p class='bg-warning'>Feilds cannot be empty</p>";
    }
       
    
    
    
   
}
else{
        $message="";
    }
    
?>
  
    
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       <h6 class="text-center"><?php echo $message; ?></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">First Name</label>
                            <input type="text" name="user_firstname" id="user_firstname" class="form-control" placeholder="firstname">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Last name</label>
                            <input type="text" name="user_lastname" id="user_lastname" class="form-control" placeholder="lastname">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="user_email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Phone Number</label>
                            <input type="text" name="user_phone_number" id="phone_number" class="form-control" placeholder="+25471005678">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="user_password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


</div>
        </html>
        <?php  include "includes/footer.php";?>