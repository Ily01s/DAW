<?php
include_once 'top-html.php';
include_once '../controllers/connexionBDD.php';
global $bdd;
session_start();

$commandeSql = "SELECT * FROM utilisateur WHERE mdp='" . ($_COOKIE["password"]) . "' AND email='" . $_COOKIE["user"] . "'";
try {
    $reponse = $bdd->query($commandeSql);
} catch (PDOException $e) {
    $fin = time() + 60 * 60 * 24 * 365;
    setcookie("user", "", $fin);
    setcookie("password", "", $fin);
    echo "Erreur : " + $e->getMessage();
    die("");
}
$utilisateur = $reponse->fetch();

$_SESSION["idUtilisateur"] = $utilisateur['id'];

if(!isset($_SESSION["idUtilisateur"])){
    $_SESSION["idUtilisateur"] = $utilisateur['id'];

}

$_SESSION["qcmID"] = rand(100000000000,999999999999);

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">

<link rel="stylesheet" href="../assets/css/views/qcm-admin.css">

<link rel="stylesheet" href="../assets/css/views/password-manager.css">



<body>
    
    <header class="d-flex main-header">
            <a href="" class="formu-logo-wrap">
                <i>
                    <?php include_once '../assets/icons/formu-logo.svg' ?>
                </i>
            </a>
    </header>
    
    <div class="d-flex main-content-qcm">
        
        
        <div class="form-wrap-qcm">
            

            <form class="qcm-form" action="qcm-admin-analyseur.php">

                <h1 class="form-title d-flex password-form-wrap">Nouveau QCM</h1><br>
                <input type="hidden" name="idUtilisateur" value="<?= $_SESSION["idUtilisateur"] ?>" >
                <input type="hidden" name="qcmID" value="<?= $_SESSION["qcmID"] ?>" >


                <div id="questions">
                    <div class="form-item">
                        <div class="form-label-wrap">
                            <label class="form-label" for="intitule">
                                <span class="form-label-text">Nom du QCM</span>
                            </label>
                        </div>
                        <div class="form-input-wrap">
                            <input type="text" class="form-input" name="intitule" 
                                autocomplete="off" autocapitalize="none">
                        </div>
                    </div>
                </div>
                <div class="linebreak"></div>

                <button type="button" class="btn btn-full btn-secondary" id="btnAjout">Ajouter une Question</button>
                <button type="submit" name="validConnectionForm" class="btn btn-primary btn-full">confirme</button>

            </form>

        </div>
    </div>

    <footer class="d-flex main-footer-wrap-qcm">
            <div class="footer-text-wrap-qcm">
                <div class="footer-text-qcm">FormU © <?php echo date("Y"); ?></div>
            </div>
    </footer>
    
    <script src="../assets/js/jquery.js"></script>
    <script type="application/javascript" src="../assets/js/qcm-admin.js"></script>

</body>