<?php include("../templates/header.php"); ?>
<?php
    include_once(APP_FUNCTIONS."/db-student-CRUD.php");
    include_once(APP_FUNCTIONS."/db-course-CRUD.php");
    
    $totalCourses = getCountAdminCourses($userId);
    $totalRegisteredStudents = getCountRegisteredStudents($userId);
?>
<?php include("../views/home-content.php"); ?>
<?php include("../templates/footer.php"); ?>