<?php include_once("../templates/sign-header.php"); ?>

<?php
//signin validation
if($_POST){
    $user=$_POST['user'];
    $password=$_POST['password'];

    //Checking the admin data in the DB
    if(validString($user,WORD_USER_NAME) &&  validString($password,WORD_PASSWORD)){

        include("../functions/db-admin-CRUD.php");
        createAdmin($user,$password);
        $admin = getAdminIdByLogin($user, $password);

        if(isset($admin["id"])){
            $_SESSION['adminVerification']="ok";
            $_SESSION['user']=$user;
            $_SESSION['userId']=$admin["id"];
            header('Location:home.php');
        }else{
            $messageError="Error: Admin has not been created";
        }
    }    
    else
    $messageError='Error: Not valid values';
}
?>
<?php include_once("../forms/signup-form.php"); ?>
<?php include_once("../templates/sign-footer.php"); ?>