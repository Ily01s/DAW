<?php include("../templates/header.php"); ?>
<?php 
//update course
// print_r($_REQUEST);
include_once(APP_FUNCTIONS."/db-course-CRUD.php");
include_once("../AJAX/AJAX-resources.php");
include_once("../functions/util.php");
$disciplines = getDisciplines();
if($_POST){//cuando terminamos de editar el curso lo guardamos en la db (posiblemente esto no va aqui)

    $action=(isset($_POST['action']))?$_POST['action']:"";

    switch($action){
        case "save":

            if( !validString( $_POST['courseTitle'],WORD_TEXT) )
            $messageError='Error: No valid Title';
        
            else if( !validString( $_POST['courseType'],WORD_PLAIN_TEXT) )
                $messageError='Error: No valid Type';
            
            else if( !validString( $_POST['courseDescription'],WORD_TEXT) )
                $messageError='Error: No valid description';

            else
            {
                $courseImageName=(isset($_FILES['courseThumbnail']['name']))?$_FILES['courseThumbnail']['name']:"";
                $courseImageTemp=(isset($_FILES['courseThumbnail']['tmp_name']))?$_FILES['courseThumbnail']['tmp_name']:"";
                $courseImage = makeImageCopy($courseImageName, $courseImageTemp, "");
                if(empty($courseImage))
                    $courseImage=$_POST['courseThumbnail_res'];
                else
                    deleteImage($_POST['courseThumbnail_res']);
                
                updateCourse($_POST['courseId'],
                            $_POST['courseTitle'], 
                            $_POST['courseType'], 
                            $_POST['courseLevel'], 
                            $_POST['courseDescription'], 
                            $courseImage);
                header("Location:courses.php");
            }
            break;

        case "cancel":
            header("Location:courses.php");
            break;    

        case "delete":
            deleteImage($_POST['courseThumbnail_res']);
            deleteCourse($_POST['courseId']);
            header("Location:courses.php"); 
            break;    
    }
}
//show course information to edit
if($_REQUEST){
    $courseId=$_REQUEST['courseId'];

    //cours information
    $course=getCourseById($courseId);

    //resources information
    $resources=getCourseResources($courseId);

    if(isset($course)){
        include("../views/course-edition.php");
    } 
}
?>
<script src="<?php echo ADMIN_SCRIPTS.'/resources.js'?>"></script>
<?php include("../templates/footer.php"); ?>