<?php

    $displayError = 'none';
    
    //Display error message if an error occured during register post action in form_handling.php
    if(isset($_SESSION['error_message'] )){
        $displayError = 'block';
    }else{
        $displayError = 'none';
    }
    

?>

<!--REGISTER FORM -->
<div class="container my-5 flex-grow-1" id="registerForm" style="display: none">
    <div class="row gx-5 ">
        <div class="col text-center bg-grey rounded border border-dark m-2 ">
            <h4 class="display-4">About Us</h4>
            <p>This is a blogsite about world news, sports, culture and politics where the opinions of people matter.<br>
            Join now and share your thoughts on what's going on in the world. 
            </p>
        </div>
        <div class="col bg-secondary rounded border border-secondary m-2 ">
            <h3 class="mt-3 text-center display-6">REGISTER</h3>
            <form action="../config/form_handling.php" method="POST">
                <input type="hidden" name="form_type" value="registerFormKey">
                <div class="form-floating  mb-3 mt-3 ">
                    <input type="email" class="form-control " id="email" placeholder="Enter email" name="email" required>
                    <label for="email" >Email</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="username" class="form-control" id="username" placeholder="Enter username" name="username" required>
                    <label for="username" class="form-label">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
                    <label for="pwd" class="form-label">Password</label>
                </div>
                    <button type="submit" class="btn btn-primary mb-3 text-right ">Register</button>
            </form>
            </div>
        </div>
    </div>

    <!-- LOGIN FORM -->
    <div class="container my-5 flex-grow-1" id="loginForm" >
        <div class="row gx-5">
            <div class="col text-center bg-grey rounded border border-secondary m-2">
                <h4 class="display-4">About Us</h4>
                <p>This is a blogsite about world news, sports, culture and politics where the opinions of people matter.<br>
                Join now and share your thoughts on what's going on in the world. 
                </p>
            </div>
            <div class="col bg-secondary rounded border border-secondary m-2">
                <h3 class="mt-3 text-center display-6">LOGIN</h3>
                <form action="../config/form_handling.php" method="POST">
                    <input type="hidden" name="form_type" value="loginFormKey">
                    <div class="form-floating mb-3 mt-3">
                        <input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
                        <label for="username" class="form-label">Username</label>
                        
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                        <label for="pwd" class="form-label">Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3 text-right">Login</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <p style="display: <?php echo $displayError?>"><?php include("../config/error_message.php"); ?></p>
    </div>
</div>

<script>
        // Script to show desired form (login/register). 
        document.getElementById('showRegisterForm').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('registerForm').style.display = 'block';
        });

        document.getElementById('showLoginForm').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            document.getElementById('registerForm').style.display = 'none';
            document.getElementById('loginForm').style.display = 'block';
        });
    </script>