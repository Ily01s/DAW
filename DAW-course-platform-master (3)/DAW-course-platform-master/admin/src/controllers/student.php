<?php include("../templates/header.php"); ?>
<?php 
//update student
include_once(APP_FUNCTIONS."/db-student-CRUD.php");
include_once("../functions/util.php");
$disciplines = getDisciplines();
if($_POST){//cuando terminamos de editar el curso lo guardamos en la db (posiblemente esto no va aqui)

    $action=(isset($_POST['action']))?$_POST['action']:"";
    switch($action){
        case "save":
            if( !validString( $_POST['studentName'],WORD_PLAIN_TEXT) )
            $messageError='Error: No valid Name';
        
            else if( !validString( $_POST['studentLastName'],WORD_PLAIN_TEXT) )
                $messageError='Error: No valid Laste Name';

            else if( !validString( $_POST['studentDateOfBirth'],WORD_TEXT) )
                $messageError='Error: No valid date of birth';

            else if( !validString( $_POST['studentEmail'],WORD_EMAIL) )
                $messageError='Error: No valid email';


            else if( !validString( $_POST['studentPassword'],WORD_PASSWORD) )
                $messageError='Error: No valid password';

            else if( !validString( $_POST['studentInterest'],WORD_PLAIN_TEXT) )
                $messageError='Error: No valid interest';

            else
            {
                $studentImageName=(isset($_FILES['studentImage']['name']))?$_FILES['studentImage']['name']:"";
                $studentImageTemp=(isset($_FILES['studentImage']['tmp_name']))?$_FILES['studentImage']['tmp_name']:"";
                $studentImage = makeImageCopy($studentImageName, $studentImageTemp, "");
                if(empty($studentImage))
                    $studentImage=$_POST['studentImage_res'];
                else
                    deleteImage($_POST['studentImage_res']);

                updateStudent($_POST['studentId'], 
                            $_POST['studentUser'], 
                            $_POST['studentPassword'], 
                            $_POST['studentName'], 
                            $_POST['studentLastName'],
                            $_POST['studentGender'], 
                            $_POST['studentDateOfBirth'], 
                            $_POST['studentEmail'], 
                            $_POST['studentLevel'], 
                            $_POST['studentInterest'],
                            $studentImage);
                header("Location:students.php");
            }
            break;

        case "cancel":
            header("Location:students.php");
            break;    

        case "delete":
            deleteImage($_POST['studentImage_res']);
            deleteStudent($_POST['studentId']);
            header("Location:students.php");
            break;    
    }
    // include("../views/student-edition.php");
}
//show course information to edit
if($_REQUEST){
    $studentId=$_REQUEST['studentId'];

    //cours information
    $student=getStudentById($studentId);

    if(isset($student)){
        include("../views/student-edition.php");
    }
}
?>
<?php include("../templates/footer.php"); ?>