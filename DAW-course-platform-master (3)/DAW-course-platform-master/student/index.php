<?php 
if(isset($_SESSION['studentVerification']))
    header("Location:src/controllers/home.php");
else
    header("Location:src/controllers/signin.php");
?>