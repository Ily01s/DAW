<?php

function getRecommendedCourses($idStudent, $interest, $level){
    include("db-connection.php");
    $query=$conection->prepare("SELECT * FROM COURSES WHERE type=:interest AND level=:level AND id NOT IN (SELECT idCourse FROM INSCRIPTIONS WHERE idStudent = :idStudent) ");
    $query->bindParam(':interest', $interest);
    $query->bindParam(':level', $level);
    $query->bindParam(':idStudent', $idStudent);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getFollowedCourses($idStudent){
  include("db-connection.php");
  $query=$conection->prepare("SELECT * FROM COURSES, INSCRIPTIONS WHERE COURSES.id=INSCRIPTIONS.idCourse AND INSCRIPTIONS.idStudent=:idStudent");
  $query->bindParam(':idStudent', $idStudent);
  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getCountFollowedCourses($idStudent){
    include("db-connection.php");
    $query=$conection->prepare("SELECT COUNT(*) as total FROM COURSES, INSCRIPTIONS WHERE COURSES.id=INSCRIPTIONS.idCourse AND INSCRIPTIONS.idStudent=:idStudent");
    $query->bindParam(':idStudent', $idStudent);
    $query->execute();
    return $query->fetch(PDO::FETCH_LAZY);
}

function getUnFollowedCourses($idStudent){
  include("db-connection.php");
  $query=$conection->prepare("SELECT * FROM COURSES WHERE id NOT IN (SELECT idCourse FROM INSCRIPTIONS WHERE idStudent = :idStudent)");
  $query->bindParam(':idStudent', $idStudent);
  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

function createInscription($idStudent, $idCourse){
  include("db-connection.php");
  $query=$conection->prepare("INSERT INTO INSCRIPTIONS (idStudent, idCourse) VALUES (:idStudent, :idCourse)");
  $query->bindParam(':idStudent', $idStudent);
  $query->bindParam(':idCourse', $idCourse);
  $query->execute();
}

function getInscriptionDate($idStudent, $idCourse){
  include("db-connection.php");
  $query=$conection->prepare("SELECT date FROM INSCRIPTIONS WHERE idStudent=:idStudent AND idCourse=:idCourse");
  $query->bindParam(':idStudent', $idStudent);
  $query->bindParam(':idCourse', $idCourse);
  $query->execute();
  return $query->fetch(PDO::FETCH_LAZY);
}

function getInscriptionFaitQCM($idStudent, $idCourse){
  include("db-connection.php");
  $query=$conection->prepare("SELECT faitQCM FROM INSCRIPTIONS WHERE idStudent=:idStudent AND idCourse=:idCourse");
  $query->bindParam(':idStudent', $idStudent);
  $query->bindParam(':idCourse', $idCourse);
  $query->execute();
  return $query->fetch(PDO::FETCH_LAZY);
}

function UpdateFaitQCM($idStudent, $idCourse){
  include("db-connection.php");
  $query=$conection->prepare("UPDATE INSCRIPTIONS SET faitQCM=1 WHERE idStudent=:idStudent AND idCourse=:idCourse");
  $query->bindParam(':idStudent', $idStudent);
  $query->bindParam(':idCourse', $idCourse);
  $query->execute();
}
