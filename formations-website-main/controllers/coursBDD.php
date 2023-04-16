<?php
    include_once 'connexionBDD.php';
    global $bdd;
    
    $a=date("Y-m-d H:i:s");
    $userID = $_POST["idUtilisateur"];
    $uid = $_POST["uidCours"];
    $nom = $_POST["titre"];

    $commandeSql = "INSERT INTO cour VALUES (default, ${userID}, '${uid}', '${nom}', '${a}', NULL)";
    try {
        $bdd->exec($commandeSql);
    } catch (PDOException $e) {
        try {

            $commandeSql = "UPDATE cour SET nom='$nom', Dtime='$a' WHERE uid='$uid'";
            var_dump($commandeSql);
            $bdd->query($commandeSql);

        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo "already exists " ;
        };
    };

    if (!file_exists('../data/COURS/'.$uid)) {
        mkdir('../data/COURS/'.$uid, 0777, true);
    }

    $data1 = '<!doctype html>'.PHP_EOL.'<html lang="fr" dir="ltr" data-theme="light">'.PHP_EOL.$_POST["Dom1"].PHP_EOL.'</html>';
    $data2 = '<!doctype html>'.PHP_EOL.'<html lang="fr" dir="ltr" data-theme="light">'.PHP_EOL.$_POST["Dom2"].PHP_EOL.'</html>';

    file_put_contents('../data/COURS/'.$uid.'/cours-admin-prof.php', $data1);
    file_put_contents('../data/COURS/'.$uid.'/cours-admin-user.php', $data2);


    for ($i=0; $i < $_POST["NbFiles"]; $i++) { 
        if ( 0 < $_FILES['file'.$i]['error'] ) {
            echo 'Error: ' . $_FILES['file'.$i]['error'] . '<br>';
        }
        else {
            move_uploaded_file($_FILES['file'.$i]['tmp_name'], '../data/COURS/'.$uid.'/'. $_FILES['file'.$i]['name']);
        }
    }
    
?>