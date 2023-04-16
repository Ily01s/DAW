<?php

function getCourseById($id){
    include("db-connection.php");
    $query=$conection->prepare("SELECT * FROM COURSES WHERE id=:id");
    $query->bindParam(':id', $id);
    $query->execute();
    return $query->fetch(PDO::FETCH_LAZY);
}

function getAdminCourses($idAdmin){
    include("db-connection.php");
    $query=$conection->prepare("SELECT * FROM COURSES WHERE idAdmin=:idAdmin");
    $query->bindParam(':idAdmin', $idAdmin);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getCountAdminCourses($idAdmin){
    include("db-connection.php");
    $query=$conection->prepare("SELECT COUNT(*) as total FROM COURSES WHERE idAdmin=:idAdmin");
    $query->bindParam(':idAdmin', $idAdmin);
    $query->execute();
    return $query->fetch(PDO::FETCH_LAZY);
}

function getAllCourses(){
    include("db-connection.php");
    $query=$conection->prepare("SELECT * FROM COURSES");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function createCourse($idAdmin, $title, $type, $level,  $description, $thumbnail){
    include("db-connection.php");
    $query=$conection->prepare("INSERT INTO COURSES (idAdmin, title, type, level, description, thumbnail) VALUES (:idAdmin, :title, :type, :level, :description, :thumbnail)");
    $query->bindParam(':idAdmin', $idAdmin);
    $query->bindParam(':title', $title);
    $query->bindParam(':type', $type);
    $query->bindParam(':level', $level);
    $query->bindParam(':description', $description);
    $query->bindParam(':thumbnail', $thumbnail);
    $query->execute();
}

function updateCourse($id, $title, $type, $level, $description, $thumbnail){
    include("db-connection.php");
    $query=$conection->prepare("UPDATE COURSES SET title=:title, type=:type, level=:level, description=:description, thumbnail=:thumbnail WHERE id=:id");
    $query->bindParam(':title', $title);
    $query->bindParam(':type', $type);
    $query->bindParam(':level', $level);
    $query->bindParam(':description', $description);
    $query->bindParam(':thumbnail', $thumbnail);
    $query->bindParam(':id', $id);
    $query->execute();
}

function deleteCourse($id){
    include("db-connection.php");
    $query=$conection->prepare("DELETE FROM COURSES WHERE id=:id");
    $query->bindParam(':id', $id);
    $query->execute();
}



function getResourceById($id){
    include("db-connection.php");
    $query=$conection->prepare("SELECT * FROM RESOURCES WHERE id=:id");
    $query->bindParam(':id', $id);
    $query->execute();
    return $query->fetch(PDO::FETCH_LAZY);
}

function getCourseResources($idCourse){
    include("db-connection.php");
    $query=$conection->prepare("SELECT * FROM RESOURCES WHERE idCourse=:idCourse");
    $query->bindParam(':idCourse', $idCourse);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function createResource($idCourse, $name, $type, $url){
    include("db-connection.php");
    $query=$conection->prepare("INSERT INTO RESOURCES (idCourse, name, type, url) VALUES (:idCourse, :name, :type, :url)");
    $query->bindParam(':idCourse', $idCourse);
    $query->bindParam(':name', $name);
    $query->bindParam(':type', $type);
    $query->bindParam(':url', $url);
    $query->execute();
}

function updateResource($id, $name, $type, $url){
    include("db-connection.php");
    $query=$conection->prepare("UPDATE RESOURCES SET name=:name, type=:type, url=:url WHERE id=:id");
    $query->bindParam(':name', $name);
    $query->bindParam(':type', $type);
    $query->bindParam(':url', $url);
    $query->bindParam(':id', $id);
    $query->execute();
}

function deleteResource($id){
    include("db-connection.php");
    $query=$conection->prepare("DELETE FROM RESOURCES WHERE id=:id");
    $query->bindParam(':id', $id);
    $query->execute();
}

function deleteCourseResources($idCourse){
    include("db-connection.php");
    $query=$conection->prepare("DELETE FROM RESOURCES WHERE idCourse=:idCourse");
    $query->bindParam(':idCourse', $idCourse);
    $query->execute();
}
