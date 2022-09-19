<?php
    function insert_category(){
        global $connection;
        if(isset($_POST["create"])){
            // $cat_id=$_POST["cat_id"];
            $cat_title=$_POST["cat_title"];

            if(!$cat_title){
                echo "Field cannot be empty!";
            }else{
                $query = "INSERT INTO categories ";
                $query .= "(cat_title) ";
                $query .= "VALUES ('$cat_title')";
                
                $create_category_query = mysqli_query($connection, $query);
                if(!$create_category_query){
                    die("Create category faled" . mysqli_error($connection));
                }
            }
        }
    
    }


    function delete_category(){
        global $connection;
        if(isset($_GET["delete"])){
            $the_cat_id=$_GET["delete"];
            // $cat_title=$_POST["cat_title"];

            $query = "DELETE FROM categories ";
            $query .= "WHERE cat_id = $the_cat_id";
                
            $delete_category_query = mysqli_query($connection, $query);
            header("Location: categories.php");
            if(!$delete_category_query){
                die("Delete category faled" . mysqli_error($connection));
            }
        }   
    }


    function view_all_post(){
        global $connection;
        $query = "SELECT * FROM posts";
        $select_all_categories_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_all_categories_query)){
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
            echo "<tr>";
            echo "<td>$post_id</td>";
            echo "<td>$post_auth</td>";
            echo "<td>$post_title</td>";
            echo "<td>$post_cat</td>";
            echo "<td>$post_status</td>";
            echo "<td><img src='../images/$post_image' width='100' alt='post_picture'></td>";
            echo "<td>$post_tags</td>";
            echo "<td>$post_comment_count</td>";
            echo "<td>$post_date</td>";
            echo "</tr>";
        }
    }

    function add_post(){
        global $connection;
        if(isset($_POST["create_post"])){
        
            $post_title = $_POST['post_title'];
            $post_auth = $_POST['post_author'];
            $post_cat_id = $_POST['post_category_id'];
            $post_status = $_POST['post_status'];
     
            $post_image = $_FILES['post_image']['name'];
            $post_image_temp = $_FILES['post_image']['tmp_name'];
            move_uploaded_file($post_image_temp, "../images/$post_image");
    
            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];
            $post_date = date('d-m-y');
            $post_comment_count = 4;
    
            $query = "INSERT INTO posts ";
            $query .= "(post_category_id, post_title, post_author, post_date, post_image, ";
            $query .= "post_content, post_tags, post_comment_count, post_status) ";
            $query .= "VALUES ($post_cat_id, '$post_title', '$post_auth', now(), '$post_image', ";
            $query .= "'$post_content', '$post_tags', '$post_comment_count', '$post_status') ";
            
            $add_post_query = mysqli_query($connection, $query);
            if(!$add_post_query){
                die("Add post error");
            }else{
                echo "Post has been created";
            }
        }
    }
?>