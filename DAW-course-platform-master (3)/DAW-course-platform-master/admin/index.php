<?php 
if(isset($_SESSION['adminVerification']))
    header("Location:src/controllers/home.php");
else
    header("Location:src/controllers/signin.php");
?>