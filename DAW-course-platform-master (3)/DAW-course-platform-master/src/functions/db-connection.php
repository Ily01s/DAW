<?php
try{
    if ( ! defined( 'APP_ROOT' ) ) {
        include_once(  $_SERVER["DOCUMENT_ROOT"] . '/DAW-project/config.php' );
    }
    $conection=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
}catch(Exception $ex){
    echo $ex->getMessage();
}

