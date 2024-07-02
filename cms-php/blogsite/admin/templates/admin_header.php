<?php

session_start();
$username = '';
$displayLogin = 'none';
$displayLogout = 'block';

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $displayLogout = 'none';
    $displayLogin= 'block';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog News | Admin</title>
    
    <link rel="stylesheet" href="http://localhost/blogsite/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="bg-light "> 
    <header class="container-fluid bg-dark ">
        
        <nav class="navbar navbar-expand-sm navbar-dark">

        <!------NAVIGATION BAR ELEMENTS ------>
        <div class="container-fluid">
            <a href="http://localhost/blogsite/admin/admin.php" class="navbar-brand display-6">BLOG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav ">
                    <li class="text-light text-center m-auto lead" style="display: <?php echo $displayLogin; ?>">Admin <?php echo $username; ?></li>
                    
                    <form action="http://localhost/blogsite/config/logout.php" method="post">
                         <button type="submit" class="btn btn-danger btn-block mx-3" style="display: <?php echo $displayLogin;?>">Logout</button>
                    </form>
                    </li>
                </ul>
            </div>
        </div>

        </nav>
    </header>
</html>