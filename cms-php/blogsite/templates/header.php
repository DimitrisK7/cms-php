<?php

//Setting user information for display 
session_start();
$username = '';
$displayLogin = 'none';
$displayLogout = 'block';

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $displayLogout = 'none';
    $displayLogin= 'block';
}

$register = 'register';
$login = 'login';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog News</title>
    
    <link rel="stylesheet" href="http://localhost/blogsite/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="bg-light min-vh-100 "> 
    <header class="container-fluid bg-dark">
        
        <nav class="navbar navbar-expand-sm navbar-dark">

        <!------NAVIGATION BAR ELEMENTS ------>
            <div class="container-fluid">
                <a href="http://localhost/blogsite/index.php" class="navbar-brand display-6">BLOG</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav ">
                        <li class="text-light text-center m-auto lead" style="display: <?php echo $displayLogin; ?>">Hello, <?php echo $username; ?></li>
                        <li class="nav-item" style="display: <?php echo $displayLogout; ?>">
                            <a href="http://localhost/blogsite/templates/register_login.php?display=<?php echo $register;?>" class="nav-link" id="showRegisterForm">Register</a>
                        </li>
                        <li class="nav-item" style="display: <?php echo $displayLogout; ?>">
                            <a href="http://localhost/blogsite/templates/register_login.php?display=<?php echo $login;?>" class="nav-link" id="showLoginForm">Log in</a>
                        </li>
                        <li>
                            <form action="http://localhost/blogsite/config/logout.php" method="post">
                                <button type="submit" class="btn btn-danger btn-block mx-3" style="display: <?php echo $displayLogin;?>">Logout</button>
                        </form>
                        </li>
                    </ul>
                </div>
            </>
        </nav>
    </header>
                                
    
