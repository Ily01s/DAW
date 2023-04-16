<?php
if ( ! defined( 'APP_ROOT' ) ) {
    include_once(  $_SERVER["DOCUMENT_ROOT"] . '/DAW-project/config.php' );
}

include_once(APP_FUNCTIONS."/db-course-CRUD.php");
include_once(APP_FUNCTIONS."/util.php");

function sendCards($courseId){
    $resources=getCourseResources($courseId);
    foreach($resources as $resource){
        include("../templates/resource-preview-card.php");
    }
}
if($_POST){
    $action=(isset($_POST['action']))?$_POST['action']:"";
    switch($action){
        case 'addResource':
            include("../functions/util.php");
            $resourceUrlName=(isset($_FILES['resourceUrl']['name']))?$_FILES['resourceUrl']['name']:"";
            $resourceUrlTemp=(isset($_FILES['resourceUrl']['tmp_name']))?$_FILES['resourceUrl']['tmp_name']:"";

            switch($_POST['resourceType']){
                case "PDF":
                    $resourceUrl = makePdfCopy($resourceUrlName, $resourceUrlTemp, "");
                    break;

                case "IMAGE":
                    $resourceUrl = makeImageCopy($resourceUrlName, $resourceUrlTemp, "");
                    break;

                case "VIDEO":
                    $resourceUrl = makeVideosCopy($resourceUrlName, $resourceUrlTemp, "");
                    break;
            }
            createResource($_POST['courseId'], $_POST['resourceName'], $_POST['resourceType'], $resourceUrl);
            sendCards($_POST['courseId']);
            break;

        case 'deleteResource':
            include("../functions/util.php");
            switch($_POST['resourceType']){
                case "PDF":
                    deletePdf($_POST['resourceUrl']);
                    break;

                case "IMAGE":
                    deleteImage($_POST['resourceUrl']);
                    break;

                case "VIDEO":
                    deleteVideo($_POST['resourceUrl']);
                    break;
            }
            deleteResource($_POST['resourceId']);
            sendCards($_POST['courseId']);
            break;

        case 'editResource':
            updateResource($_POST['resourceId'], $_POST['resourceName'], $_POST['resourceType'], $_POST['resourceUrl']);
            sendCards($_POST['courseId']);
            break;
    }
}
