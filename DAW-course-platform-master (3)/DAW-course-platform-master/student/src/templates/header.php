<?php
if ( ! defined( 'APP_ROOT' ) ) {
    include_once(  $_SERVER["DOCUMENT_ROOT"] . '/DAW-project/config.php' );
}
include_once(APP_STUDENT."/student-config.php");
include_once(APP_FUNCTIONS."/util.php");

session_start();
    if(!isset($_SESSION['studentVerification'])){
        header("Location:../../index.php");
    }else{
        if($_SESSION['studentVerification']=="ok"){
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
    <link rel="stylesheet" href="../styles/forum-styles.css">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <title>Website Student</title>
    <link rel="stylesheet" href="<?php echo W_STYLES;?>/index-styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <header class="container__header">
        <nav class="nav__list">
            <li class="nav__item">
                <a class="nav__link" href="#"><strong>Student settings</strong></a>
            </li>
            <li class="nav__item">
                <a class="nav__link" href="<?php echo W_STUDENT;?>/src/controllers/home.php">Home</a>
            </li>
            <li class="nav__item"><a class="nav__link" href="<?php echo W_STUDENT;?>/src/controllers/my-courses.php">My
                    courses</a>
            </li>
            <li class="nav__item"><a class="nav__link"
                    href="<?php echo W_STUDENT;?>/src/controllers/search-courses.php">Search courses</a>
            </li>
            <li class="nav__item"><a class="nav__link"
                    href="<?php echo W_STUDENT;?>/src/controllers/forum.php">Forum</a>
            </li>
            <li class="nav__item">
                <a class="nav__link" href="<?php echo W_STUDENT;?>/src/controllers/signout.php">Sign out</a>
            </li>

            <div>
                <button class="switch">
                    <i class="bx bxs-sun" value="dark"></i>
                    <i class="bx bxs-moon" value="light"></i>
                </button>
            </div>
        </nav>
    </header>