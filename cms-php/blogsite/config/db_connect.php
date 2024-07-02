<?php

    //Connect to database with given credentials, in case of error kill connection
	$conn = mysqli_connect('localhost','Jim','test','blog_db');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>