<?php include("../templates/header.php"); ?>
<?php 
include_once(APP_FUNCTIONS."/db-forum-CRUD.php");

    $messages = getMessages();

?>
<?php include("../views/forum-content.php"); ?>
<script src="<?php echo STUDENT_SCRIPTS.'/forum.js'?>"></script>
<?php include("../templates/footer.php"); ?>