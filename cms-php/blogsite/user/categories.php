<?php

    include("../config/db_connect.php");

    //Get desired category and set query to fetch all posts from that category
    $post_category = mysqli_real_escape_string($conn,$_GET['category']);
    $sql = "SELECT * FROM posts WHERE post_category ='$post_category'";

    $result = mysqli_query($conn, $sql);    

    //Handle when someone ends on categories site without the category GET request so that insertion to db without
    //category isnt possible.
    function outOfBounds($post_category){
        if(empty($post_category)){
            echo "none";
        }
    }
?>

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
<body class="bg-light min-vh-100"> 
    <header class="container-fluid bg-dark ">
        
        <nav class="navbar navbar-expand-sm navbar-dark">

        <!------NAVIGATION BAR ELEMENTS ------>
        <div class="container-fluid">
            <a href="http://localhost/blogsite/user/index.php" class="navbar-brand display-6">BLOG</a>
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
        </div>

        </nav>
    </header>
</html>

    <div class="row ">
        <div class="container col-9 mt-3 border-end  rounded">
            <h2 class="border-bottom m-2 pb-2" style="text-decoration: underline; "><?php echo htmlspecialchars($post_category);?></h2>
            <?php
            //Check if result num of rows isnt empty meaning articles have been found
            if (mysqli_num_rows($result) > 0) {
                // Output data of each row to display the articles 
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='container border-bottom'>";
                    echo "<h2>" . htmlspecialchars($row["post_title"]) . "</h2>";
                    echo "<p style=\"word-break: break-all;\">" . htmlspecialchars($row["post_content"]) . "</p>";
                    echo "<p><em>by " . htmlspecialchars($row["post_creator"]) . " on " . $row["created_at"] . "</em></p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No articles found</p>";
            }

            mysqli_close($conn);
            ?>
        </div>
        
        <!--Add a post form -->
        <div class="container col-3 mt-3 justify-content-center" style="display: <?php outOfBounds($post_category)?>">
            <button onclick="toggleForm()" id="form-btn"class="btn bg-warning border">Add a post</button>
            <div id="form-container" class="form-container" style="display: none">
                <form action="../config/add_post.php?category=<?php echo $post_category?>" method="POST">
                    <label for="title">Title:</label><br>
                    <input type="text" id="title" name="title" required><br>
                    <label for="content">Content:</label><br>
                    <textarea id="content" name="content" rows="8" cols="30" required></textarea><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

    <?php include('../templates/footer.php');?>



<script>
        function toggleForm() {
            var formContainer = document.getElementById('form-container');
            if (formContainer.style.display === 'none' || formContainer.style.display === '') {
                formContainer.style.display = 'block';
                document.getElementById('form-btn').innerHTML = 'Close post form';
            } else {
                formContainer.style.display = 'none';
                document.getElementById('form-btn').innerHTML = 'Add a post';
            }
        }
</script>