<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>

  
  
 <?php

if(isset($_POST['submit'])){
    
    $msg=$_POST['body'];
    $subject=$_POST['subject'];
    $to='mjrkimjoey@gmail.com';
    $header="From: ".$_POST['email'];
    
    mail($to,$subject,$msg);
    
    $message="Mesage submited successfully, Thank you for your feedback";
    
    
}else{
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
                <h1>Contact Us</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                       <h6 class="text-center"><?php echo $message; ?></h6>
                        
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="body" name="body" cols="50" rows="10" placeholder="Enter your message"></textarea>
                        </div>
                        
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

 <html>
       <body>
           



           </div>


     </body>
       
        </html>
        <?php  include "includes/footer.php";?>