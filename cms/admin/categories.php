<?php include "includes/admin_header.php";?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php";?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">

                        <!-- Create Category-->
                        <?php insert_category() ;?>
                        <!-- /.Create Category-->

                        <!--Delete Category-->
                        <?php delete_category() ;?>
                        <!-- /.Delete Category-->

                        <!--Add Category Form-->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="create" value="Add Category">

                            </div>
                            <!--/.Add Category Form-->
                        </form>
                        <!--Edit Category-->
                        <?php 
                                if(isset($_GET["edit"])){
                                    $cat_id = $_GET["edit"];
                            
                                    include "includes/update_categories.php" ;
                                }
                        ?>

                    </div>

                    <!--Table Categories-->
                    <div class="col-xs-6">


                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php //Find All Categories
                                    $query = "SELECT * FROM categories";
                                    $select_all_categories_admin = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($select_all_categories_admin)){
                                    $cat_id = $row["cat_id"];
                                    $cat_title = $row["cat_title"];
                                ?>
                                <tr>
                                    <td><?php echo $cat_id;?></td>
                                    <td><?php echo $cat_title;?></td>
                                    <td>
                                        <a href="categories.php?delete=<?php echo $cat_id;?>">Delete</a>
                                    </td>
                                    <td>
                                        <a href="categories.php?edit=<?php echo $cat_id;?>">Edit</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>



                            </tbody>
                        </table>



                    </div>
                    <!--/.Table Categories-->

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->


        <?php include "includes/admin_footer.php";?>