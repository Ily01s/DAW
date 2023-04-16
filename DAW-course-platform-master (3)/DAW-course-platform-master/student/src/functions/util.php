<?php


function makeFileCompy($name, $tmpName, $errorName, $type){
    //la imagen que seleccionemos la movemos a la carpeta img
    $date=new DateTime();
    $fileName=($name!="")? $date->getTimestamp()."_".$name: $errorName;
    // echo "Hola ".$name." ".$tmpName;
    if($tmpName!=""){
        switch($type){
            case WORD_IMAGE:
                move_uploaded_file($tmpName, APP_IMAGES."/".$fileName);
                break;
            case WORD_PDF:
                move_uploaded_file($tmpName, APP_PDF."/".$fileName);
                break;
            case WORD_VIDEO:
                move_uploaded_file($tmpName, APP_VIDEOS."/".$fileName);
                break;

        }
        
    }
    return $fileName;
}

function makeImageCopy($name, $tmpName, $errorName){
    return makeFileCompy($name, $tmpName, $errorName, "image");
}

function makePdfCopy($name, $tmpName, $errorName){
    return makeFileCompy($name, $tmpName, $errorName, "pdf");
}

function makeVideosCopy($name, $tmpName, $errorName){
    return makeFileCompy($name, $tmpName, $errorName, "video");
}


function deletePdf($name){
    if(!is_null($name) && !empty($name) && file_exists(APP_PDF."/".$name)){
        unlink(APP_PDF."/".$name);
    }      
}

function deleteImage($name){
    if(!is_null($name) && !empty($name) && file_exists(APP_IMAGES."/".$name)){
        unlink(APP_IMAGES."/".$name);
    }      
}

function deleteVideo($name){
    if(!is_null($name) && !empty($name) && file_exists(APP_VIDEOS."/".$name)){
        unlink(APP_VIDEOS."/".$name);
    }      
}

function createStudentUserName($name, $lastName, $date){
    // $date = str_replace(["/","-"],"", $date);
    return strtolower($name.$lastName);
}

