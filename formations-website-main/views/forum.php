<?php
include_once 'top-html.php';
include '../controllers/connexionBDD.php';

global $bdd;
global $utilisateur;

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


//CHANGE THE TITLE
$buffer=ob_get_contents();
ob_end_clean();
$buffer=str_replace("%TITLE%","FormU - Forum",$buffer);
echo $buffer;


?>

<link rel="stylesheet" href="../assets/css/views/home.css">
<div class="TEeK6y">
    <aside class="Z9A69u">
        <a href="" class="RkKfUb">
            <?php include_once '../assets/icons/formu-logo.svg' ?>
        </a>
        <?php if ($utilisateur['role'] == 'etudiant') {?>
            <div class="VwBabc">
                <a href="home.php" class="tjJOER">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/dashboard.svg' ?>
                        <?php include '../assets/icons/dashboard-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">Dashboard</div>
                </a>
                <a href="courses.php" class="tjJOER">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/courses.svg' ?>
                        <?php include '../assets/icons/courses-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">Vos Cours</div>
                </a>
                <a href="all-courses.php" class="tjJOER">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/all-courses.svg' ?>
                        <?php include '../assets/icons/all-courses-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">Tous les Cours</div>
                </a>
                <a href="all-qcm.php" class="tjJOER">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/qcm.svg' ?>
                        <?php include '../assets/icons/qcm-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">QCM</div>
                </a>
                <div class="QN8etP"></div>
                <a href="forum.php" class="tjJOER active">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/forum.svg' ?>
                        <?php include '../assets/icons/forum-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH active">Forum</div>
                </a>
            </div>
        <?php } else if ($utilisateur['role'] == 'professeur') {?>
            <div class="VwBabc">
                <a href="home.php" class="tjJOER">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/courses.svg' ?>
                        <?php include '../assets/icons/courses-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">Vos Cours</div>
                </a>
                <a href="all-courses.php" class="tjJOER">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/all-courses.svg' ?>
                        <?php include '../assets/icons/all-courses-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">Tous les Cours</div>
                </a>
                <a href="all-qcm.php" class="tjJOER">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/qcm.svg' ?>
                        <?php include '../assets/icons/qcm-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">QCM</div>
                </a>
                <div class="QN8etP"></div>
                <a href="forum.php" class="tjJOER active">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/forum.svg' ?>
                        <?php include '../assets/icons/forum-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH active">Forum</div>
                </a>
            </div>
        <?php } else if ($utilisateur['role'] == 'administrateur') {?>
            <div class="VwBabc">
                <a href="home.php" class="tjJOER">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/user.svg' ?>
                        <?php include '../assets/icons/user-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">Utilisateurs</div>
                </a>
                <a href="all-courses.php" class="tjJOER">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/courses.svg' ?>
                        <?php include '../assets/icons/courses-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">Tous les Cours</div>
                </a>
                <a href="all-qcm.php" class="tjJOER">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/qcm.svg' ?>
                        <?php include '../assets/icons/qcm-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">QCM</div>
                </a>
                <div class="QN8etP"></div>
                <a href="forum.php" class="tjJOER active">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/forum.svg' ?>
                        <?php include '../assets/icons/forum-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">Forum</div>
                </a>
            </div>
        <?php } ?>
        <div class="Gtaxh">
            <div class="QN8etP"></div>
            <input class="rBWjB tjJOER" type="checkbox">
            <a href="LOUGOUT" class="fwSNG7">
                <div class="pHqVuN j4W2I">
                    <?php include '../assets/icons/logout.svg' ?>
                </div>
                <div class="Mg9BgH">Forum</div>
            </a>
        </div>
    </aside>
    <main class="s0ha4C">
        <?php //IF STUDENT ?>
        <?php // ELIF TEACHER ?>
        <?php // ELIF ADMIN ?>
        <?php //ENDIF ?>
    </main>
</div>
<script type="application/javascript" src="../assets/js/colormode.js"></script>
