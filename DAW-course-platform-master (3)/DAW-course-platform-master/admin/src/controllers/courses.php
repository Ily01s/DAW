<?php include("../templates/header.php"); ?>
<?php 
    //getting all Admin courses from db
    include_once(APP_FUNCTIONS."/db-course-CRUD.php");
    include_once("../functions/util.php");
    $disciplines = getDisciplines();
    $courses=getAdminCourses($userId);
    if($_POST){
        if( !validString( $_POST['courseTitle'],WORD_TEXT) )
            $messageError='Error: No valid Title';
        
        else if( !validString( $_POST['courseType'],WORD_PLAIN_TEXT) )
            $messageError='Error: No valid Type';
        
        else if( !validString( $_POST['courseDescription'],WORD_TEXT) )
            $messageError='Error: No valid description';

        else
        {
            // include("../functions/util.php");
            $courseImageName=(isset($_FILES['courseThumbnail']['name']))?$_FILES['courseThumbnail']['name']:"";
            $courseImageTemp=(isset($_FILES['courseThumbnail']['tmp_name']))?$_FILES['courseThumbnail']['tmp_name']:"";
            $courseImage = makeImageCopy($courseImageName, $courseImageTemp, "");

            createCourse($userId,
                        $_POST['courseTitle'], 
                        $_POST['courseType'], 
                        $_POST['courseLevel'], 
                        $_POST['courseDescription'], 
                        $courseImage);
            header("Location:courses.php");
        }
    }
?>

<?php include("../views/courses-content.php"); ?>
<?php include("../templates/footer.php"); ?>