<?php

function getAdminIdByLogin($adminName, $adminPassword){
    include("db-connection.php");
    $query=$conection->prepare("SELECT id FROM admins WHERE user=:user AND password=:password");
    $query->bindParam(':user', $adminName);
    $query->bindParam(':password', $adminPassword);
    $query->execute();
    return $query->fetch(PDO::FETCH_LAZY);
}

function getAdminIdById($id){
    include("db-connection.php");
    $query=$conection->prepare("SELECT * FROM admins WHERE id=:id");
    $query->bindParam(':id', $id);
    $query->execute();
    return $query->fetch(PDO::FETCH_LAZY);
}

function createAdmin($adminName, $adminPassword){
    include("db-connection.php");
    $query=$conection->prepare("INSERT INTO admins (user, password) VALUES (:user, :password)");
    $query->bindParam(':user', $adminName);
    $query->bindParam(':password', $adminPassword);
    $query->execute();
}


?>