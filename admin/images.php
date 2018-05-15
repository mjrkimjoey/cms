<?php include "includes/header.php";?>
 <html 
      
   <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>images</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="thumbnail-gallery.css">

</head>               
                          
                                  
                                                  
           <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin Panel</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <!--<li><a href="">Users online:<?php //echo users_online(); ?></a></li>-->
                <li><a href="">Users online:<?php echo users_online(); ?></a></li>
              <li><a href="posts.php?source=add_post"><i class="fa fa-fw fa-plus"></i>New Post</a>
               <li><a href="categories.php"><i class="fa fa-fw fa-plus"></i>Add category</a>
              </li>
                </li>
               
               <li><a href="../index.php"><i class="fa fa-fw fa-globe"></i>Homepage</a>
              </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'] ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            </div>
            <!-- /.navbar-collapse -->
        </nav>
      <body>
   <?php
          
    if(isset($_POST['submit'])){
$image_title=$_POST['title'];        
$image=$_FILES['image']['name'];
$image_temp=$_FILES['image']['tmp_name'];        
        
  move_uploaded_file($image_temp, "images/$image");      
  $query="INSERT INTO images(image,image_title)
  VALUES('{$image}','{$image_title}')";      
  $create_post_query=mysqli_query($connection, $query);      
   confirm_query($create_post_query);     
    }
    
             
          
          
          
          
          
          
          
          
          ?>   

<div class="container gallery-container">

    </div>
    <h1></h1>
     
<hr>
   <hr>
     <div class="upload" align='center'>
    <form action="" method="post" enctype="multipart/form-data">
    Select an image to upload:
    <input type="file" name="image" id="fileToUpload">
    <input type="text" class="" name="title" placeholder="enter image name">
    <input type="submit" value="Upload Image" name="submit">
    </form>
          </div>
   <hr>
   <hr>
   
<!--    <p class="page-description text-center">images With thier name</p>-->
    
    <div class="tz-gallery">
     
       
       <?php 
    
 
    
    
    
    
    
    
    
                   $query="SELECT * FROM images";     
                   $select_images_query=mysqli_query($connection,$query);    
                  
                    while ($row=mysqli_fetch_assoc($select_images_query)){
                      $image_id=$row['image_id'];
                      $image_title=$row['image_title'];
                      $image=$row['image'];
 
        ?>
       

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a class="lightbox" href="images/<?php echo $image;?>">
                        <img src="images/<?php echo $image;?>" alt="Bridge">
                    </a>
                    <div class="caption">
                        <h3><?php echo $image_title;?></h3>
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>-->
                    </div>
                </div>
            </div>
           <?php }?>
        </div>

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
         
          
            
</html>