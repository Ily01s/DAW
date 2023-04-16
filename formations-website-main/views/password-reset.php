<?php
include_once 'top-html.php';
include_once '../controllers/connexionBDD.php';
global $bdd;
global $utilisateur;

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if(!isset($_GET["token"])){
        die("AUCUN TOKEN PRESENT");
    }
    $donnees["token"] = addslashes(htmlspecialchars($_GET["token"]));
    $commande_SQL = "SELECT * FROM utilisateur WHERE token='".$donnees["token"]."'";
    try {
        $reponse = $bdd->query($commande_SQL);
        $utilisateur = $reponse->fetch();
    } catch (PDOException $e) {
        echo "Erreur : " + $e->getMessage();
        die("");
    }
    if (!$utilisateur) {
        die("UTILISATEUR NON TROUVE");
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["formResetPassword"])) {
        if ($_POST["password"] != "" && $_POST["second-password"] != "") {
            $donnees['id'] = $_POST['id'];
            $donnees["password"] = md5(addslashes(htmlspecialchars($_POST["password"])));
            $commande_SQL = "UPDATE utilisateur SET mdp = '" . $donnees["password"] . "' WHERE id='" . $donnees["id"] . "'";

            try {
                $reponse = $bdd->query($commande_SQL);
                $passwordReseted = true;
            } catch (PDOException $e) {
                echo "Erreur : " + $e->getMessage();
                die("");
            }
        }
    }
}
?>
<link rel="stylesheet" href="../assets/css/views/password-manager.css">
<body>
<div class="d-flex main-content">
    <header class="d-flex main-header">
        <a href="login.php" class="formu-logo-wrap">
            <i>
                <?php include_once '../assets/icons/formu-logo.svg' ?>
            </i>
        </a>
    </header>
    <div class="d-flex password-form-wrap">
        <?php if (isset($passwordReseted) && $passwordReseted == true) { ?>
            <div class="d-flex congratulation-content-wrap">
                <div class="congratulation-content">
                    <div class="congratulation-icon-wrap d-flex">
                        <i class="congratulation-icon">
                            <?php include_once "../assets/icons/congratulation-thin-icon.svg" ?>
                        </i>
                    </div>
                    <div class="form-title-wrap d-flex">
                        <h1 class="form-title">Votre mot de passe à été modifié !</h1>
                    </div>
                    <div class="form-subtitle-wrap d-flex">
                        <p class="form-subtitle">
                            Félicitation ! Votre mot de passe à bien été modifié, vous pouvez
                            désormais vous connecter avec ce dernier.
                        </p>
                    </div>
                    <a href="login.php" type="submit" class="btn btn-primary btn-full">Connexion</a>
                </div>
            </div>
        <?php } else { ?>
            <form class="password-form" action="" method="POST">
                <div class="form-title-wrap d-flex">
                    <h1 class="form-title">Rénitialisation du mot de passe</h1>
                </div>
                <div class="form-subtitle-wrap d-flex">
                    <p class="form-subtitle">
                        Saisissez votre nouveau mot de passe dans les deux
                        champs qui se trouvent ci-dessous. Nous vous conseillons de choisir un mot de passe robuste pour
                        plus de sécurité:
                        <br>- Au moins 8 caractères
                        <br>- Au moins 1 chiffre
                        <br>- Au moins un caractère spécial
                    </p>
                </div>
                <input type="hidden" name="id" value="<?php if (isset($utilisateur["id"])) { ?><?= $utilisateur["id"] ?><?php } ?>">
                <input type="hidden" name="token" value="<?php if (isset($utilisateur["token"])) { ?><?= $utilisateur["token"] ?><?php } ?>">
                <div class="form-item">
                    <div class="form-label-wrap">
                        <label class="form-label" for="form-input-password">
                            <span class="form-label-text">Mot de passe</span>
                        </label>
                    </div>
                    <div class="form-input-wrap">
                        <input id="form-input-password" class="form-input" type="password" name="password"
                               inputmode="password" autocomplete="off" autocapitalize="none" autofocus>
                    </div>
                    <div class="form-feedback-wrap">
                        <div class="form-feedback">
                            <span class="form-feedback-text d-none">Mot de passe requis</span>
                        </div>
                    </div>
                </div>
                <div class="form-item">
                    <div class="form-label-wrap">
                        <label class="form-label" for="form-input-second-password">
                            <span class="form-label-text">Confirmation de mot de passe</span>
                        </label>
                    </div>
                    <div class="form-input-wrap">
                        <input id="form-input-second-password" class="form-input" type="password" name="second-password"
                               inputmode="password" autocomplete="off" autocapitalize="none">
                    </div>
                    <div class="form-feedback-wrap">
                        <div class="form-feedback">
                            <span class="form-feedback-text d-none">Mot de passe de confirmation vide</span>
                        </div>
                    </div>
                </div>
                <button type="submit" name="formResetPassword" class="btn btn-primary btn-full">Envoyer</button>
            </form>
        <?php } ?>
    </div>
    <footer class="d-flex main-footer-wrap">
        <div class="footer-text-wrap">
            <div class="footer-text">FormU © <?php echo date("Y"); ?></div>
        </div>
    </footer>
</div>
<script type="application/javascript" src="../assets/js/general.js"></script>
<script type="application/javascript" src="../assets/js/password-reset.js"></script>
</body>
