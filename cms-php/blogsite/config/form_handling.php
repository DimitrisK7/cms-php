<?php

    include("db_connect.php");


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $form_type = $_POST["form_type"];

        $errors = array('username' => '', 'password' => '', 'email' => '');
        $username = $password = $email = '';

        //Register form handling
        if($form_type == "registerFormKey"){
            session_start();
            //Handling invalid or null inputs of the POST register request
            if(empty($_POST['email'])){
                $errors['email'] = "Email field cannot be empty. <br />";
            } else {
                $email = $_POST['email'];
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors['email'] = "Email must be in a correct form, ex: abc@gmail.com <br />";
                }
            }
            if(empty($_POST['username'])){
                $errors['username'] = "Username field cannot be empty. <br />";
            } else {
                $username = $_POST['username'];
                if(!preg_match('/^[a-zA-Z][a-zA-Z0-9_-]{3,19}$/', $username)){
                    $errors['username'] = "Username must contain only letters and numbers. <br />";
                }
            }
            if(empty($_POST['password'])){
                $errors['password'] = "Password field cannot be empty. <br />";
            } else {
                $password = trim($_POST['password']);
                
                if(!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,32}$/', $password)){
                    $errors['password'] = "Password must contain one upper case letter, one lower case and be 8-32 characters length long. <br />";
                }
            }

            /*If no errors occured in the validation of the register fields, prepare query to insert values in db, 
            else diplay error message and redirect.*/
            if(array_filter($errors)){
                $_SESSION['error_message']= "Registration unsuccessfull.";
                header('LOCATION: ../templates/register_login.php');
            } else {
                $email=mysqli_real_escape_string($conn,$_POST['email']);
                $username=mysqli_real_escape_string($conn,$_POST['username']);
                $password=mysqli_real_escape_string($conn,$_POST['password']);
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users(email,username,password) VALUES('$email','$username','$hashed_password')";
                
                //Connect to db and execute query, handle unsuccessful connection to db if it occurs.
                if(mysqli_query($conn,$sql)){
                    $_SESSION['error_message']= "Registration successfull.";
                    header('LOCATION: ../templates/register_login.php');
                }else{
                    echo 'query error: ' . mysqli_error($conn);
                }
            }
        }

        //Login form handling
        if($form_type == "loginFormKey"){

            session_start();

            $username = mysqli_real_escape_string($conn,trim($_POST['username']));
            $password = trim($_POST['password']);
            $user_role = 'user';

            //Check for null or valid inputs, else verify password and set GLOBAL SESSION variables accordingly for login.
            if(empty($username) || empty($password)){
                $_SESSION['error_message'] = "Username and password fields cannot be empty.";
                header("Location: ../templates/register_login.php");
            }else{
                $sql = "SELECT password,role FROM users WHERE username='$username'";
                
                $result = mysqli_query($conn,$sql);

                if($result->num_rows > 0){
                    $row = mysqli_fetch_assoc($result);
                    $returned_hashed_password = $row['password'];
                    $user_role = $row['role'];

                    if(password_verify($password, $returned_hashed_password)){
                        if($user_role == 'admin'){
                            $_SESSION['username'] = $username;
                            $_SESSION['user_role'] = $user_role;
                            header("Location: ../admin/admin.php");
                        } else {
                            $_SESSION['username'] = $username;
                            header("Location: ../user/index.php");
                        }
                    } else {
                        $_SESSION['error_message'] = "Invalid username or password.";
                        header("Location: ../templates/register_login.php");
                    }

                } else {
                    $_SESSION['error_message'] = "Username not found.";
                    header("Location: ../templates/register_login.php");
                }
            }
        }

    }
    

?>