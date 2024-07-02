<?php



?>

<!DOCTYPE html>
<html>
    <?php include('header.php');?>
    
    <?php if(!isset($_SESSION['username'])){include('forms.php');}?>
    
    <?php include('footer.php');?>
</html>