<?php include_once('../templates/sign-header.php'); ?>
<?php
//signin validation
if($_POST){
    // echo 'Algo';
    $user=$_POST['user'];
    $password=$_POST['password'];

    //Checking the admin in the DB
    if(validString($user,WORD_USER_NAME) &&  validString($password,WORD_PASSWORD)){
        $student = getStudentIdByLogin($user, $password);

        //if admin exist in the db
        if(isset($student['id'])){
            $_SESSION['studentVerification']='ok';
            $_SESSION['user']=$user;
            $_SESSION['userId']=$student['id'];
            header('Location:home.php');
        }
        else
            $messageError='Error: user name or password are incorrects';
    }
    else
        $messageError='Error: user name or password are not set';
}
?>
<?php include_once('../forms/signin-form.php'); ?>
<?php include_once('../templates/sign-footer.php'); ?>