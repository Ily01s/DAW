<?php
if ( ! defined( 'APP_ROOT' ) ) {
    include_once(  $_SERVER["DOCUMENT_ROOT"] . '/DAW-project/config.php' );
}

include_once(APP_FUNCTIONS."/db-forum-CRUD.php");
include_once(APP_FUNCTIONS."/util.php");

function sendMessages($idStudent){
    $messages = getMessages();
    $userId=$idStudent;
    foreach($messages as $message)
        include("../templates/forum-message.php");
}
if($_POST){
    $action=(isset($_POST['action']))?$_POST['action']:"";
    switch($action){
        case 'sendMessage':
            if( validString( $_POST['textMessage'],WORD_TEXT) )
                addMessage($_POST['idStudent'], $_POST['textMessage']);
            sendMessages($_POST['idStudent']);
            break;

        case 'refreshMessages':
            sendMessages($_POST['idStudent']);
            break;
    }
}
