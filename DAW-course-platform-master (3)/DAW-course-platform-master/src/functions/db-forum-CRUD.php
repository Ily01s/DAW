<?php

function getMessages(){
    include("db-connection.php");
    $query=$conection->prepare("SELECT forum_messages.message, students.user, students.id FROM forum_messages, students WHERE forum_messages.idStudent=students.id  ORDER BY forum_messages.date ASC");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function addMessage($idStudent, $message){
  include("db-connection.php");
  $query=$conection->prepare("INSERT INTO forum_messages (idStudent, message) VALUES (:idStudent, :message)");
  $query->bindParam(':idStudent', $idStudent);
  $query->bindParam(':message', $message);
  $query->execute();
}