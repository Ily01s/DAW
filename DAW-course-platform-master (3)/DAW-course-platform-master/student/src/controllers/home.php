<?php include("../templates/header.php"); ?>

<?php
    include_once(APP_FUNCTIONS."/db-student-CRUD.php");
    include_once(APP_FUNCTIONS."/db-student-course-CRUD.php");

    $student = getStudentById($userId);
    $fallowedCourses = getCountFollowedCourses($userId);
    $recommendedCourses = getRecommendedCourses($userId, $student['interest'], $student['level']);

?>
<?php include("../views/home-content.php"); ?>
<?php include("../templates/footer.php"); ?>