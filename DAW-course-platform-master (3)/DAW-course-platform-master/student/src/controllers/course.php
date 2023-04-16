<?php include("../templates/header.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php
include_once(APP_FUNCTIONS."/db-course-CRUD.php");
include_once(APP_FUNCTIONS."/db-admin-CRUD.php");
include_once(APP_FUNCTIONS."/db-student-course-CRUD.php");
if($_REQUEST){


    


    $courseId=$_REQUEST['courseId'];

    if(isset($_REQUEST['FFQCM'])){
      $qcm=UpdateFaitQCM($userId,$courseId);
    }

    //cours information
    $course=getCourseById($courseId);
    $teacher = getAdminIdById($course['idAdmin'])['user'];
    $inscriptionDate = getInscriptionDate($userId,$courseId)['date'];
    //resources information
    $resources=getCourseResources($courseId);
    $faitqcm=getInscriptionFaitQCM($userId,$courseId)['faitQCM'];



    if(isset($course))
        if(isset($faitqcm) && $faitqcm==0)
          include("../views/qcm-content.php"); 
        else
          include("../views/course-content.php");
}

?>
<?php include("../templates/footer.php"); ?>
