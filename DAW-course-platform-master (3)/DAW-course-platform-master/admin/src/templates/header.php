<?php
if ( ! defined( 'APP_ROOT' ) ) {
    include_once(  $_SERVER["DOCUMENT_ROOT"] . '/DAW-project/config.php' );
}
include_once(APP_ADMIN."/admin-config.php");
include_once(APP_FUNCTIONS."/util.php");

session_start();
    if(!isset($_SESSION['adminVerification'])){
        header("Location:../../index.php");
    }else{
        if($_SESSION['adminVerification']=="ok"){
            $user=$_SESSION["user"];
            $userId=$_SESSION["userId"];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if(isset($_COOKIE["mode"])) {
        if($_COOKIE["mode"]=="dark"){ ?>
            <link rel="stylesheet" href="<?php echo W_STYLES;?>/dark-mode.css">
        <?php } else { ?>
            <link rel="stylesheet" href="<?php echo W_STYLES;?>/light-mode.css">
    <?php } 
    } else {
        setcookie("mode", "dark", time() + 10000000);
        }
    ?>


    <link rel="stylesheet" href="<?php echo W_STYLES;?>/global.css">
    <link rel="stylesheet" href="<?php echo W_STYLES;?>/form-styles.css" />
    <link rel="stylesheet" href="../styles/global.css">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <title>Website Admin</title>
    <link rel="stylesheet" href="<?php echo W_STYLES;?>/index-styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <header class="container__header">
        <nav class="nav__list">
            <li class="nav__item"><a class="nav__link" href="#"><strong>Admin settings</strong></a></li>
            <li class="nav__item"><a class="nav__link" href="<?php echo W_ADMIN;?>/src/controllers/home.php">Home</a>
            </li>
            <li class="nav__item"><a class="nav__link"
                    href="<?php echo W_ADMIN;?>/src/controllers/courses.php">Courses</a></li>
            <li class="nav__item"><a class="nav__link"
                    href="<?php echo W_ADMIN;?>/src/controllers/students.php">Students</a></li>
            <li class="nav__item"><a class="nav__link" href="<?php echo W_ADMIN;?>/src/controllers/signout.php">Sign
                    out</a>
                </li>
            <div>
                <button class="switch">
                    <i class="bx bxs-sun" value="dark"></i>
                    <i class="bx bxs-moon" value="light"></i>
                </button>
            </div>
        </nav>
    </header>