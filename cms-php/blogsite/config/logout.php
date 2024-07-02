<?php

    //Empty SESSION array variables and end session.
    session_start();

    $_SESSION = array();

    session_destroy(); 


    header("Location: ../index.php");
    exit();

?>