<?php include("../templates/header.php"); ?>

<?php
include_once(APP_FUNCTIONS."/db-student-course-CRUD.php");
    $courses=getFollowedCourses($userId);

?>
<?php include("../views/my-courses-content.php"); ?>
<?php include("../templates/footer.php"); ?>