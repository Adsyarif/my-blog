  
     
     <div class="col-md-4">

        <!-- Blog Search Well -->
         <div class="well">
             <h4>Blog Search</h4>
             <!--Value = "" meaning the form return to the same page-->
             <form action="search.php" method="post">

                 <div class="input-group">
                     <input name="search" type="text" class="form-control">
                     <span class="input-group-btn">
                         <button name="submit" class="btn btn-default" type="submit">
                             <span class="glyphicon glyphicon-search"></span>
                         </button>
                     </span>
                 </div>
             </form> <!-- Search Form -->
             <!-- /.input-group -->
         </div>






         <!-- Blog Categories Well -->
         <div class="well">
             <h4>Blog Categories</h4>
             <div class="row">
                 <div class="col-lg-12">
                     <ul class="list-unstyled">
                     <?php
                    
                    $query = "SELECT * FROM categories";
                    $seletct_categories_slidebar_query = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($seletct_categories_slidebar_query)){
                        $cat_title = $row['cat_title'];
                        
                        echo "<li><a href='#'>{$cat_title}</li>";
                    }
                    
                
        ?>

                 </div>
                 
             </div>
             <!-- /.row -->
         </div>





         <!-- Side Widget Well -->
        <?php include "includes/widget.php";?>

     </div>