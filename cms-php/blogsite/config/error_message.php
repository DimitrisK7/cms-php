<?php   

       
        //Error message display in case of unsuccessful login attempt    
        if (isset($_SESSION['error_message'])) {
            echo "<p class='alert alert-danger'>" . $_SESSION['error_message'] . "</p>";
            unset($_SESSION['error_message']);
        }

?>