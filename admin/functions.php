<?php 

function users_online(){
    global $connection;
   $session=session_id();
    $time=time();
    $time_out_seconds=300;
    $time_out=$time- $time_out_seconds;

        
        $query="SELECT * FROM users_online WHERE session='$session'";
        $send_query=mysqli_query($connection,$query);
        $count=mysqli_num_rows($send_query);
        
        if($count == NULL){
            
            
            mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES('$session','$time')");
        }else{
          mysqli_query($connection,"UPDATE users_online SET time='$time' WHERE session='$session'"); 
            
        }
        
        $users_online_query=mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'"); 
        return $count_user=mysqli_num_rows($users_online_query);  
    
    
}




function confirm_query($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED".mysqli_error($connection));
    }
}



/*function is_admin($username=''){
    global $connection;
    
    $query="SELECT user_role FROM users WHERE username= '$username' ";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    $row=mysqli_fetch_array($result);
    if($row['user_role' == 'admin']){
        
        return true;
        
    }else{
        
        return false;
    }
    
}*/










function insert_into_categories(){
    global $connection;
                            if(isset($_POST['submit'])){
                             $cat_title=$_POST['cat_title'] ;
                                if($cat_title ==""||empty($cat_title)){
                                    echo "This feild cant be empty";
                                }
                                else{
                                    $query="INSERT INTO categories(cat_title)";
                                    $query.="VALUE('{$cat_title}')";
                                    $create_category_query=mysqli_query($connection,$query);
                                    if(!$create_category_query){
                                        die('query failed'.mysqli_error($connection)); 
                                    }
                                    
                                }
                            }
}
                            
                            
function find_all_categories(){
    global $connection;
     
                      $query="SELECT * FROM categories";
                      $select_sidebar_categories_query=mysqli_query($connection,$query);
                                      
                      while ($row=mysqli_fetch_assoc($select_sidebar_categories_query)){
                      $cat_id=$row['cat_id'];
                      $cat_title=$row['cat_title'];
                          
                     echo"<tr>";
                     echo"<td>{$cat_id}</td>";
                     echo"<td>{$cat_title}</td>";
                     echo"<td><a href='categories.php?edit={$cat_id}'><i class='fa fa-pencil' ></i></a></td>";
                     echo"<td><a  onClick=\"javascript:return confirm('Are you sure you want to delete this category');\"href='categories.php?delete={$cat_id}'><i class='fa fa-trash' ></i></a></td>";     
                     echo"</tr>";
                  }
                                
                                
                } 
function the_delete_categories(){
    global $connection;
    
    if(isset($_GET['delete'])){
                                          $the_cat_id=$_GET['delete'];
                                          $query= "DELETE FROM categories WHERE cat_id ={$the_cat_id}";
                                          $query= mysqli_query($connection,$query);
                                          header("location:categories.php");
                                      }
    
    
    
}
?>
