<div class="message <?php echo ($message['id']== $userId)? "send":"";?>">
    <span><?php echo $message['user'];?></span>
    <div class="<?php echo ($message['id']== $userId)? "message-sent-text":"message-received-text";?>">
        <?php echo $message['message'];?>
    </div>
</div>