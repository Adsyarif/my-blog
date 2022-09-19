    <?php include "includes/db.php";?>
    <!-- Header -->
    <?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            
            
            
            
            
            <div class="col-md-8">
                
                <?php
                
         
         
                    if(isset($_POST['submit'])){
                        
                        $search = $_POST['search'];
                        
                        $query = "SELECT * FROM posts ";
                        $query .= "WHERE post_tags LIKE '%$search%' ";
            
                        $select_all_search = mysqli_query($connection, $query);
                        if(!$select_all_search){
                            die("Search query error!" . mysqli_error($connection));
                        }
                        $count = mysqli_num_rows($select_all_search); // for looking the number of discovery data
                        if($count == 0){
                            echo "<h1>No result</h1>";
                        }else{
                           
                            while($row = mysqli_fetch_assoc($select_all_search)){
                                $post_id = $row['post_id'];
                                $post_cat = $row['post_category_id'];
                                $post_title = $row['post_title'];
                                $post_auth = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];
                                $post_tags = $row['post_tags'];
                                $post_comment_count = $row['post_comment_count'];
                                $post_status = $row['post_status'];
                                
                ?>
                        
                                <h1 class="page-header">
                                    Page Heading
                                    <small>Secondary Text</small>
                                </h1>
                
                                <!-- First Blog Post -->
                                <h2>
                                    <a href="#"><?php echo $post_title; ?></a>
                                </h2>
                                <p class="lead">
                                    by <a href="index.php"><?php echo $post_auth; ?></a>
                                </p>
                                <p>tags: <?php echo $post_tags; ?></p>
                                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                                <hr>
                                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                                
                                <p><?php echo $post_content; ?></p>
                                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                
                                <hr>
        
                <?php
                            }
                        }
                    }
                ?>
                       <hr>
                    </div>
        
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>


        </div>
        <!-- /.row -->

        <hr>
        <!--Footer-->
        <?php include "includes/footer.php" ;?>