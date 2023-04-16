<?php

function defaultImage($type){
    switch (strtolower($type)){
        case 'student':
            return W_IMAGES.'/'.W_IMG_STUDENT;
            break;
        case 'course':
            return W_IMAGES.'/'.W_IMG_COURSE;
            break;
        case 'resource':
            return W_IMAGES.'/'.W_IMG_RESOURCE;
            break;
        default:
            return NULL;
            break;
    }
}

function defaultResourcePreview($type){
    switch (strtolower($type)){
        case 'pdf':
            return W_IMAGES.'/'.W_IMG_PDF;
            break;
        case 'image':
            return W_IMAGES.'/'.W_IMG_IMAGE;
            break;
        case 'video':
            return W_IMAGES.'/'.W_IMG_VIDEO;
            break;
        default:
            return NULL;
            break;
    }
}

function getDisciplines(){
    $myfile = fopen(APP_DATA_FILES."/disciplines.txt", "r") or die("Unable to open file!");
    $disciplines = array();
    while(!feof($myfile)){
        $text = fgets($myfile);
        if(!empty($text))
            $disciplines[] = trim($text);
    }
    fclose($myfile);
    sort($disciplines);
    array_unshift($disciplines, "Other");
    return $disciplines;
}


function verifyImage($name, $type){
    if(!is_null($name) && !empty(trim($name)) && file_exists(APP_IMAGES.'/'.$name))
        return W_IMAGES.'/'.$name;
    return defaultImage($type);
}


function validString($str, $type='plain text'){
    if(!$str || empty($str))
        return false;

    else
        switch ($type){
            case 'plain text':
                return verifyPlainText($str);
            break;

            case 'text':
                return verifyText($str);
            break;

            case 'user name':
                return purifyUserName($str);
            break;

            case 'password':
                return purifyPassword($str);
            break;

            case 'email':
                return purifyEmail($str);
            break;
        }

}

function verifyPlainText($str){
    if (preg_match('/^[A-Za-z ]*$/', $str))
        return true;
    return false;
}

function verifyText($str){
    if (preg_match('/^[^=]*$/', $str))
        return true;
    return false;
}

function purifyUserName($str){
    if (preg_match('/^[A-Za-z0-9_-]*$/', $str))
        return true;
    return false;
}

function purifyPassword($str){
    if (preg_match('/^[^;\&\?\*=]*$/', $str))
        return true;
    return false;
}

function purifyEmail($str){
    if (preg_match('/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/', $str))
        return true;
    return false;
}