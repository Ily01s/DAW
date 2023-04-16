<?php include("../templates/header.php"); ?>

<?php
include_once(APP_FUNCTIONS."/db-student-course-CRUD.php");
    $courses=getUnFollowedCourses($userId);

    if($_POST && $_POST['courseId']){
        include_once(APP_FUNCTIONS."/db-student-CRUD.php");
        include_once(APP_FUNCTIONS."/db-course-CRUD.php");
        $student = getStudentById($userId);
        $course = getCourseById($_POST['courseId']);


        if($student["level"] >= $course["level"]){
            createInscription($userId, $_POST['courseId']);
            header("Location:my-courses.php"); 
        }
        else{
            $messageError = "Not minimum level required to follow this course";
        }

    }

    if($_GET && $_GET['courseId']){
        include_once(APP_FUNCTIONS."/db-course-CRUD.php");
        $course = getCourseById($_GET['courseId']);
    }
?>

<?php include("../views/search-courses-content.php"); ?>
<?php include("../templates/footer.php"); ?>