<?php include "includes/header.php";?>


<body>
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
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>


                        <div class="col-xs-6">
                            <?php
                            insert_into_categories();
                            
                            ?>

                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="cat_title">Add category</label><br>
                                        <input type="text" class="form control " name="cat_title">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                                    </div>
                                </form>

                                <?php 
                                 if(isset($_GET['edit'])){
                                     $cat_id=$_GET['edit'];
                                    include "includes/update_categories.php";
                                   }
                                   ?>


                        </div>




                        <div class="col-xs-6">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category title</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                      find_all_categories();                
                     ?>


                                            <?php       //delete query categories
                                      the_delete_categories();
                                      
                                      ?>




                                    </tr>
                                </tbody>
                            </table>


                        </div>
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
