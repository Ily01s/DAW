<?php include("../templates/header.php"); ?>
<?php 
    //getting all students from db
    include_once(APP_FUNCTIONS."/db-student-CRUD.php");
    include_once("../functions/util.php");
    $disciplines = getDisciplines();
    $students=getStudents();
    if($_POST){

        
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
            // copying the image on the folder
            $studentImageName=(isset($_FILES['studentImage']['name']))?$_FILES['studentImage']['name']:"";
            $studentImageTemp=(isset($_FILES['studentImage']['tmp_name']))?$_FILES['studentImage']['tmp_name']:"";
            $studentImage = makeImageCopy($studentImageName, $studentImageTemp, "");
            //create student username
            $studentUserName = createStudentUserName($_POST['studentName'],$_POST['studentLastName'], $_POST['studentDateOfBirth']);
            createStudent($studentUserName, 
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
    }
?>
<?php include("../views/students-content.php"); ?>
<?php include("../templates/footer.php"); ?>