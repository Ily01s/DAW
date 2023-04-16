<?php
include_once 'top-html.php';
include_once '../controllers/connexionBDD.php';
global $bdd;
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
<link rel="stylesheet" href="../assets/css/views/login.css">
<body>
<div class="d-flex main-content">
    <div class="left-side">
        <div class="d-flex ls-content">
            <div id="scene">
                <div data-depth="0.7" class="pink-circle"></div>
                <div data-depth="0.2" class="formu-logo-wrapper">
                    <?php include_once '../assets/icons/formu-logo.svg' ?>
                </div>
                <div data-depth="-0.7" class="blue-circle"></div>
            </div>
        </div>
    </div>
    <div class="right-side d-flex">
        <div class="login-form-wrapper">
            <form class="login-form" action="" method="POST">
                <h1 class="form-title">Connexion</h1>
                <?php
                    if(isset($error['user-not-found']) && $error['user-not-found'] == true) {
                ?>
                <div class="user-is-not-found">
                    <div class="unf-icon-wrap">
                        <?php include_once '../assets/icons/error-icon.svg' ?>
                    </div>
                    <div class="unf-text-wrap">
                        <p class="unf-text">Nous sommes désolé mais il semblerait que cet utilisateur n'existe pas.</p>
                    </div>
                </div>
                <?php
                    }
                ?>
                <div class="form-item">
                    <div class="form-label-wrap">
                        <label class="form-label" for="form-input-email">
                            <span class="form-label-text">Adresse e-mail</span>
                        </label>
                    </div>
                    <div class="form-input-wrap">
                        <input id="form-input-email" class="form-input" type="text" name="email"
                               autocomplete="off" autocapitalize="none" autofocus>
                    </div>
                    <div class="form-feedback-wrap">
                        <div class="form-feedback">
                            <span class="form-feedback-text d-none">Adresse e-mail requise</span>
                        </div>
                    </div>
                </div>
                <div class="form-item">
                    <div class="form-label-wrap">
                        <label class="form-label" for="form-input-password">
                            <span class="form-label-text">Mot de passe</span>
                        </label>
                    </div>
                    <div class="form-input-wrap">
                        <input id="form-input-password" class="form-input" type="password" name="password"
                               autocomplete="off" autocapitalize="none">
                        <button class="password-input-toggle" type="button">
                            Afficher
                        </button>
                    </div>
                    <div class="form-feedback-wrap">
                        <div class="form-feedback">
                            <span class="form-feedback-text d-none">Mot de passe requis</span>
                        </div>
                    </div>
                </div>
                <button type="submit" name="validConnectionForm" class="btn btn-primary btn-full">Suivant</button>
            </form>
            <p class="need-help d-flex">
                <a href="password-forgotten.php" class="link">Mot de passe oublié ?</a>
            </p>
            <div class="linebreak"></div>
            <button role="button" class="btn btn-full btn-secondary create-an-account-btn">Créer un compte</button>
        </div>
        <div class="signin-form-wrapper d-none">
            <h1 class="form-title">Créer un compte</h1>
            <form class="signin-form" action="" method="POST">
                <div class="form-item">
                    <div class="form-label-wrap">
                        <label class="form-label" for="form-input-firstname">
                            <span class="form-label-text">Prénom</span>
                        </label>
                    </div>
                    <div class="form-input-wrap">
                        <input id="form-input-firstname" class="form-input" type="text" name="firstname"
                               autocomplete="off" autocapitalize="none">
                    </div>
                    <div class="form-feedback-wrap">
                        <div class="form-feedback">
                            <span class="form-feedback-text d-none">Prénom requis</span>
                        </div>
                    </div>
                </div>
                <div class="form-item">
                    <div class="form-label-wrap">
                        <label class="form-label" for="form-input-name">
                            <span class="form-label-text">Nom</span>
                        </label>
                    </div>
                    <div class="form-input-wrap">
                        <input id="form-input-name" class="form-input" type="text" name="name"
                               autocomplete="off" autocapitalize="none">
                    </div>
                    <div class="form-feedback-wrap">
                        <div class="form-feedback">
                            <span class="form-feedback-text d-none">Nom requis</span>
                        </div>
                    </div>
                </div>
                <div class="form-item">
                    <div class="form-label-wrap">
                        <label class="form-label" for="form-input-sign-in-email">
                            <span class="form-label-text">Adresse e-mail</span>
                        </label>
                    </div>
                    <div class="form-input-wrap">
                        <input id="form-input-sign-in-email" class="form-input" type="text" name="email"
                               autocomplete="off" autocapitalize="none">
                    </div>
                    <div class="form-feedback-wrap">
                        <div class="form-feedback">
                            <span class="form-feedback-text d-none">Adresse e-mail requise</span>
                        </div>
                    </div>
                </div>
                <div class="form-item">
                    <div class="form-label-wrap">
                        <label class="form-label" for="form-input-sign-in-password">
                            <span class="form-label-text">Mot de passe</span>
                        </label>
                    </div>
                    <div class="form-input-wrap">
                        <input id="form-input-sign-in-password" class="form-input" type="password" name="password"
                               autocomplete="off" autocapitalize="none">
                        <button class="password-input-toggle" type="button">
                            Afficher
                        </button>
                    </div>
                    <div class="form-feedback-wrap">
                        <div class="form-feedback">
                            <span class="form-feedback-text d-none">Mot de passe requis</span>
                        </div>
                    </div>
                </div>
                <button name="validRegisterForm" type="submit" class="btn btn-primary btn-full">Créer mon compte
                </button>
            </form>
            <div class="linebreak"></div>
            <button role="button"
                    class="btn btn-full btn-secondary already-have-an-account-btn">Connexion
            </button>
        </div>
    </div>
</div>
<script type="application/javascript" src="../assets/js/general.js"></script>
<script type="application/javascript" src="../assets/js/login.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
<script>
    window.addEventListener('load', () => {
        document.title = 'FormU - Log In'
        var scene = document.getElementById('scene');
        var parallaxInstance = new Parallax(scene, {
            relativeInput: true
        });
    });
</script>
</body>

