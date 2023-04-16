<form class="form__data" action="" method="POST" enctype="multipart/form-data" id="formSendMessage">
    <div class="fields field-forum">
        <label for="textMessage">Type:</label>
        <input type="text" name="textMessage" id="textMessage" placeholder="Message"/>
    </div>
    <button type="submit" name="sendMessage" value="sendMessage" id="btnSendMessage"
    class="btn__submit btn__save btn__small">Send</button>
    <input type="hidden" name="idStudent" value="<?php echo $userId; ?>"/>
</form>