<?php

ini_set('display_errors', 1);
include_once '../../BDConnection/connectionBDD.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["validConnectionForm"])) {
        // Traiter le formulaire de connexion
        $email = $_POST["mail"];
        $password = md5($_POST["password"]);
        $commandeSql = "SELECT * FROM users WHERE mdp='" . $password . "' AND email='" . $email . "'";
        try {
            $reponse = $bdd->query($commandeSql);
            $utilisateur = $reponse->fetch();
            if ($utilisateur) {
                header('Location: home.php');
                $fin = time() + 60 * 60 * 24*365;
                setcookie("user",$email, $fin);
                setcookie("password",$password, $fin);
            } else {
                $error['user-not-found'] = true;
            }
        } catch (PDOException $e) {
            echo "Erreur : " + $e->getMessage();
            die("");
        }
    } else {
        // Traiter le formulaire d'inscription
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $num_etudiant = $_POST["num_etudiant"];
        $date_naissance = $_POST["date_naissance"];
        $mail = $_POST["mail"];
        $mot_de_passe = md5($_POST["mot_de_passe"]);
        $commandeSql = "INSERT INTO utilisateur (prenom,nom,email,mdp,date,role,token) VALUES('" . $prenom . "','" . $nom . "','" . $mail . "','" . $mot_de_passe . "','" . date("Y-m-d H:i:s") . "','etudiant','')";
        try {
            $bdd->exec($commandeSql);
            header('Location: qcm_profile.php');
            exit();
        } catch (PDOException $e) {
            echo "Erreur : " + $e->getMessage();
            die("");
        }
    }
}

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/CC.css">
    <title>Créer un compte</title>
  </head>
  <body>
  <div class="container">
        <div class="logo-container">
            <img src="../../assets/files/logo.png" alt="Logo du site" class="logo">
        </div>
        <div class= "creation-container">
        <h1>Créer un compte</h1>
        <form action="register.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="num_etudiant">Numéro étudiant:</label>
        <input type="text" id="num_etudiant" name="num_etudiant" required><br>

        <label for="date_naissance">Date de naissance:</label>
        <input type="date" id="date_naissance" name="date_naissance" required><br>

        <label for="mail">Mail:</label>
        <input type="email" id="mail" name="mail" required><br>

        <label for="mot_de_passe">Mot de passe:</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

        <button type="submit">créé votre compte</button>
    </div>
    </div>
    </form>
  </body>
</html>
