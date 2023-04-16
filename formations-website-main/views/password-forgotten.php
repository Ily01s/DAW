<?php
include_once 'top-html.php';
include_once '../controllers/connexionBDD.php';
global $bdd;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST["email"] != "") {
        $donnees["email"] = addslashes(htmlspecialchars($_POST["email"]));

        $commande_SQL = "SELECT * FROM utilisateur WHERE email='" . $donnees["email"] . "'";

        try {
            $reponse = $bdd->query($commande_SQL);
        } catch (PDOException $e) {
            echo "Erreur : " + $e->getMessage();
            die("");
        }
        $utilisateur = $reponse->fetch();

        if ($utilisateur) {
            $token = md5(time() . mt_rand());
            $commande_SQL = "UPDATE utilisateur SET token = '" . $token . "' WHERE email='" . $donnees["email"] . "'";

            try {
                $reponse = $bdd->query($commande_SQL);
            } catch (PDOException $e) {
                echo "Erreur : " + $e->getMessage();
                die("");
            }


            $to = $utilisateur["email"];
            $subject = "Changement de votre mot de passe";
            $message = "<p>Bonjour</p> ".$utilisateur["prenom"]." ".$utilisateur["nom"].", pour changer votre mot de passe cliquer <a href=\"password-reset.php?token=".$token."\">ici</a>.";
            $message = wordwrap($message, 70, "\r\n");
            $headers = "From: FORMU \r\nX-Mailer: PHP/" . phpversion()."\r\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\r\nContent-Disposition: inline\r\nContent-Transfer-Encoding: 8Bit\r\nDate: ".date("r")."\r\n";
            $mailSent = mail($to, $subject, $message, $headers);
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
    <?php if (isset($mailSent)) { ?>
        <?php if($mailSent == true) { ?>
        <div class="d-flex congratulation-content-wrap">
            <div class="congratulation-content">
                <div class="congratulation-icon-wrap d-flex">
                    <i class="congratulation-icon">
                        <?php include_once "../assets/icons/congratulation-thin-icon.svg" ?>
                    </i>
                </div>
                <div class="form-title-wrap d-flex">
                    <h1 class="form-title" style="text-align: center; width: 100%; margin-bottom: var(--spacing-xl);">
                        Mail envoyé !</h1>
                </div>
                <div class="form-subtitle-wrap d-flex">
                    <p class="form-subtitle">
                        Consultez votre courrier électronique correspondant à l'adresse
                        <?php if (isset($donnees["email"])) { ?><?= $donnees["email"] ?><?php } ?>.
                        Vous trouverez un lien permettant de réinitialiser votre mot de passe. Si le mail n'apparaît pas
                        dans les minutes qui suivent, vérifiez votre dossier spam.
                    </p>
                </div>
                <a href="login.php" type="submit" class="btn btn-primary btn-full">Connexion</a>
            </div>
        </div>
        <?php } else { ?>
        <div class="d-flex congratulation-content-wrap">
            <div class="email-not-sent">
                <div class="ens-icon-wrap">
                    <?php include_once '../assets/icons/error-icon.svg' ?>
                </div>
                <div class="ens-text-wrap">
                    <p class="ens-text">L'email n'a pas pu s'envoyer, réessayer plus tard.</p>
                    <div>
                        <a class="link" href="login.php">Retourner à l'acceuil</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    <?php } else { ?>
        <div class="d-flex password-form-wrap">
            <form class="password-form" action="" method="POST">
                <div class="form-title-wrap d-flex">
                    <h1 class="form-title">Mot de passe oublié</h1>
                </div>
                <div class="form-subtitle-wrap d-flex">
                    <p class="form-subtitle">
                        Saisissez l’adresse e-mail associée à votre compte. Un mail vous sera envoyé
                        afin que vous puissiez modifier votre mot de passe.
                    </p>
                </div>
                <div class="form-item">
                    <div class="form-label-wrap">
                        <label class="form-label" for="form-input-email">
                            <span class="form-label-text">Adresse e-mail</span>
                        </label>
                    </div>
                    <div class="form-input-wrap">
                        <input id="form-input-email" class="form-input" type="text" name="email" inputmode="email"
                               autocomplete="off" autocapitalize="none" autofocus>
                    </div>
                    <div class="form-feedback-wrap">
                        <div class="form-feedback">
                            <span class="form-feedback-text d-none">Adresse e-mail requise</span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-full">Envoyer</button>
            </form>
        </div>
    <?php } ?>
    <footer class="d-flex main-footer-wrap">
        <div class="footer-text-wrap">
            <div class="footer-text">FormU © <?php echo date("Y"); ?></div>
        </div>
    </footer>
</div>
<script type="application/javascript" src="../assets/js/password-forgotten.js"></script>
<script type="application/javascript" src="../assets/js/general.js"></script>
</body>
