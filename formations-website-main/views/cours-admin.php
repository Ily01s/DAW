<?php
include_once 'top-html.php';
include_once '../controllers/connexionBDD.php';
global $bdd;
session_start();


if(!isset($_SESSION["idUtilisateur"])){
    $_SESSION["idUtilisateur"] = 6;
}

$commandeSql = "SELECT * FROM utilisateur WHERE mdp='" . ($_COOKIE["password"]) . "' AND email='" . $_COOKIE["user"] . "'";
try {
    $reponse = $bdd->query($commandeSql);
} catch (PDOException $e) {
    $fin = time() + 60 * 60 * 24 * 365;
    setcookie("user", "", $fin);
    setcookie("password", "", $fin);
    echo "Erreur : ".$e->getMessage();
    die("");
}
$utilisateur = $reponse->fetch();
$_SESSION["idUtilisateur"] = $utilisateur['id'];

$_SESSION["coursID"] = uniqid();


//CHANGE THE TITLE
$buffer=ob_get_contents();
ob_end_clean();
$buffer=str_replace("%TITLE%","FormU - Créer un cour",$buffer);
echo $buffer;

?>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
<link rel="stylesheet" href="../assets/css/views/qcm-admin.css">
<link rel="stylesheet" href="../assets/css/views/cours-admin.css">
<link rel="stylesheet" href="../assets/css/views/password-manager.css">
<link rel="stylesheet" href="../../../assets/css/views/qcm-admin.css">
<link rel="stylesheet" href="../../../assets/css/views/cours-admin.css">
<link rel="stylesheet" href="../../../assets/css/views/password-manager.css">

<body onload="onLoad()">
    <div class="waQWu6">
        <header class="d-flex main-header">
            <a href="" class="formu-logo-wrap">
                <i>
                    <?php include_once '../assets/icons/formu-logo.svg' ?>
                </i>
            </a>
        </header>

        <div class="d-flex main-content-cours">

            <div class="wrap-cours">
                <h1 class="form-title d-flex">Création d'un cours</h1><br>

                <div class="div-part-tab">
                    <h3 class="table-part" id="editable0">Nom du cours</h3>
                    <button type="button" class="btn btn-full edit-btn table-part removable" id="btnEditCours" value="0"><i class="fa fa-pen"></i></button>
                </div>
                <div class="linebreak"></div>
                <div id="sections">
                </div>
                <div class="xzf89v">
                    <button type="button" class="btn btn-full btn-secondary btn-cap removable" id="btnAjoutSection">Ajouter une Section</button>
                    <button type="submit" name="validConnectionForm" class="btn btn-primary btn-full btn-cap removable" onclick="send();">confirmer</button>
                </div>
            </div>
        </div>

        <footer class="d-flex main-footer-wrap-qcm">
            <div class="footer-text-wrap-qcm">
                <div class="footer-text-qcm">FormU © <?php echo date("Y"); ?></div>
            </div>
        </footer>
    </div>

    <script src="../assets/js/jquery.js"></script>
    <script src="../../../assets/js/jquery.js"></script>
    <script type="application/javascript" src="../assets/js/cours-admin.js"></script>
    <script type="application/javascript" src="../../../assets/js/cours-admin.js"></script>
    <?php
        echo '<script type="text/javascript">'.'transfer('.$_SESSION["idUtilisateur"].',"'.$_SESSION["coursID"].'")'.'</script>';
    ?>
</body>
</html>