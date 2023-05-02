<?php
if (isset($_COOKIE["user"]) && isset($_COOKIE["password"]) && $_COOKIE["user"]!= "" && $_COOKIE["password"]!= ""){
        $commandeSql = "SELECT * FROM utilisateur WHERE mdp='" . ($_COOKIE["password"]) . "' AND email='" . $_COOKIE["user"] . "'";
        try {
            $reponse = $bdd->query($commandeSql);
        } catch (PDOException $e) {
			$fin = time() + 60 * 60 * 24*365;
			setcookie("user","", $fin);
			setcookie("password","", $fin);
            echo "Erreur : " + $e->getMessage();
            die("");
        }
        $utilisateur = $reponse->fetch();
        if ($utilisateur) {
            header('Location: home.php');
        } else {
            $error['user-not-found'] = true;
        }
}	
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["validConnectionForm"])) {
        if ($_POST["password"] != "" && $_POST["email"] != "") {
            $donnees["email"] = addslashes(htmlspecialchars($_POST["email"]));
            $donnees["password"] = md5(addslashes(htmlspecialchars($_POST["password"])));

            $commandeSql = "SELECT * FROM utilisateur WHERE mdp='" . ($donnees["password"]) . "' AND email='" . $donnees["email"] . "'";
            try {
                $reponse = $bdd->query($commandeSql);
            } catch (PDOException $e) {
                echo "Erreur : " + $e->getMessage();
                die("");
            }
            $utilisateur = $reponse->fetch();
            if ($utilisateur) {
                header('Location: home.php');
				$fin = time() + 60 * 60 * 24*365;
				setcookie("user",$donnees["email"], $fin);
				setcookie("password",$donnees["password"], $fin);
            } else {
                $error['user-not-found'] = true;
            }
        }
    } else {
        if ($_POST["firstname"] != "" && $_POST["name"] != "" && $_POST["email"] != "" && $_POST["password"] != "") {
            $donnees["firstname"] = addslashes(htmlspecialchars($_POST["firstname"]));
            $donnees["name"] = addslashes(htmlspecialchars($_POST["name"]));
            $donnees["email"] = addslashes(htmlspecialchars($_POST["email"]));
            $donnees["password"] = md5(addslashes(htmlspecialchars($_POST["password"])));
            $donnees["role"] = "etudiant";

            $commandeSql = "INSERT INTO utilisateur (prenom,nom,email,mdp,date,role,token) VALUES('" . $donnees["firstname"] . "','" . $donnees["name"] . "','" . $donnees["email"] . "','" . $donnees["password"] . "','" . date("Y-m-d H:i:s") . "','" . $donnees["role"] . "','')";
            try {
                $bdd->exec($commandeSql);
            } catch (PDOException $e) {
                echo "Erreur : " + $e->getMessage();
                die("");
            }
        }
        header('Location: qcm_profile.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/login.css">
    <title>EduP</title>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="../../assets/files/logo.png" alt="Logo du site" class="logo">
        </div>
        <div class="login-container">
            <form action="" method="post">
                <h1>Login</h1>
                <div class="form-group">
                    <label for="username">mail</label>
                    <input type="text" name="mail" id="mail" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit">Connexion</button>
                <a href="../mdp_oublie.php">Mot de passe oublié?</a>
                <a href="./creation_compte.php">cree votre compte</a>
            </form>
        </div>
    </div>
</body>
</html>
