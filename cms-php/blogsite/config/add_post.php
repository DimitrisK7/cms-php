<?php

    include("db_connect.php");
    session_start();
    $post_category=mysqli_real_escape_string($conn,$_GET['category']);

    //Add post to the database in the correct category section
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        $content = mysqli_real_escape_string($conn,$_POST['content']);
        $creator = $_SESSION['username'];
        $category = $post_category;
    
        $sql = "INSERT INTO posts (post_title, post_content, post_creator, post_category) VALUES ('$title', '$content', '$creator', '$category')";
    
        if ($conn->query($sql) === TRUE) {
            header("LOCATION: ../user/categories.php?category=$post_category");
        } else {
            header("LOCATION: ../user/categories.php?category=$post_category");
        }
    
        $conn->close();
    }
?>