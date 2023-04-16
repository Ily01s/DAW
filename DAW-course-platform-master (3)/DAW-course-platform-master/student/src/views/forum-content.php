<div class="container__fluid">
    <div>
        <div id="forumContainer" class="forum__container">
            <div id="messagesContainer" class="messages__container">
                <?php foreach($messages as $message){ ?>
                <?php include("../templates/forum-message.php"); ?>
                <?php } ?>
            </div>
            <?php include("../forms/forum-send-massage-form.php"); ?> 
        </div>
