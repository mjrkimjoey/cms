 <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>user_Id</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>User_image</th>
                                    <th>User_role</th>
                                    <th>Edit</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>                                   

                                </tr>
                            </thead>
                            <tbody>
                                
         <?php 
                      $query="SELECT * FROM users";
                      $select_users=mysqli_query($connection,$query);
                                      
                      while ($row=mysqli_fetch_assoc($select_users)){
                      $user_id=$row['user_id'];
                      $username=$row['username'];
                      $user_firstame=$row['user_firstname'];
                      $user_lastname=$row['user_lastname'];
                      $user_email=$row['user_email'];
                      $user_phone_number=$row['user_phone_number'];
                      $user_image=$row['user_image'];
                      $user_role=$row['user_role'];
                     
                          echo "<tr>";
                          
                          echo "<td>$user_id</td>";
                          echo "<td>$username</td>";
                          echo "<td>$user_firstame</td>";
                          echo "<td>$user_lastname</td>";
                          echo "<td>$user_email</td>";
                          echo "<td>$user_phone_number</td>";
                          echo "<td>$user_image</td>";
                          echo "<td>$user_role</td>";
                          echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'><i class='fa fa-pencil'></i></a></td>";
                          echo "<td><a href='users.php?approve=$user_id'><i class='fa fa-check'></i></a></td>";
                          echo "<td><a href='users.php?unapprove=$user_id'><i class='fa fa-remove'></i></a></td>";
                          echo "<td><a  onClick=\"javascript:return confirm('Are you sure you want to delete this user');\"href='users.php?delete=$user_id'><i class='fa fa-trash'></i></a></td>";
                   
                          echo"</tr>";
                      
                      }
                                ?>                    
                                   
                                
                            </tbody>
                        </table>
                        
                       
                      
                     
                    
                   
                  
 <?php
if(isset($_GET['delete'])){
    if(isset($_SESSION['user_role'])){

    if($_SESSION['user_role']=='admin'){
        
    
    
    $the_user_id=mysqli_real_escape_string($connection,$_GET['delete']);
    $query="DELETE FROM users WHERE user_id='{$the_user_id}'";
    $delete_query=mysqli_query($connection, $query);
    header("location: users.php");
}}}
   
/*
if(isset($_GET['approve'])){
    $the_comment_id=$_GET['approve'];
    $query="UPDATE comments SET comment_status='approved' WHERE comment_id='{$the_comment_id}'";
    $approve_query=mysqli_query($connection, $query);
    header("location: user.php");
}


if(isset($_GET['unapprove'])){
    $the_comment_id=$_GET['unapprove'];
    $query="UPDATE comments SET comment_status='unapproved' WHERE comment_id='{$the_comment_id}'";
    $disapprove_query=mysqli_query($connection, $query);
    header("location: user.php");
}

*/







?>