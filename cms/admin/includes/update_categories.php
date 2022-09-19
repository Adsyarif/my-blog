                            <!-- /.Edit Category-->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Edit Category</label>

                            <?php
                               
                               if(isset($_GET["edit"])){
                                    $cat_id = $_GET["edit"];

                                    $query_show = "SELECT * FROM categories ";
                                    $query_show .= "WHERE cat_id = $cat_id ";
                                    $select_edit_category_query = mysqli_query($connection, $query_show);
                                    while($row = mysqli_fetch_assoc($select_edit_category_query)){
                                        $cat_id = $row["cat_id"];
                                        $cat_title = $row["cat_title"];  
                                    
                            ?>

                                    <input value="<?php if(isset($cat_title)) echo $cat_title;?>" class="form-control" type="text" name="cat_title_update">

                            <?php    
                            }
                                }
                            ?>
                            <?php
                               if(isset($_POST['update'])){
                                $cat_title_edit = $_POST["cat_title_update"];
                        
                    
                                $query = "UPDATE categories ";
                                $query .= "SET cat_title = '$cat_title_edit' ";
                                $query .= "WHERE cat_id = $cat_id";
                                
                                $edit_category_query = mysqli_query($connection, $query);
                                    if(!$edit_category_query){
                                        die("Update query error");
                                    }
                    
                            }
                            ?>


                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update" value="Update">

                                </div>
                            </form>
                            <!--/.Edit Category Form-->