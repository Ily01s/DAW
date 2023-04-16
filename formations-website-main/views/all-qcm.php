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
    echo "Erreur : " + $e->getMessage();
    die("");
}
$utilisateur = $reponse->fetch();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (!isset($_COOKIE["user"])) {
        header("Location: login.php");
    }

    //ALL QCM
    $commandeSql = "SELECT qcm.*, qcm.nom as qcmName, u.nom, u.prenom
        FROM qcm
        INNER JOIN utilisateur AS u
            ON u.id = qcm.professeur
        ORDER BY qcm.nom";
    try {
        $reponse = $bdd->query($commandeSql);
    } catch (PDOException $e) {
        echo "Erreur : ".$e->getMessage();
        die("");
    }
    $qcms = $reponse->fetchAll();

} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['delete-qcm'])) { //DELETE QCM
        $donnees['qcm-id'] = $_POST['qcm-id'];
        $commandeSql = "DELETE FROM qcm WHERE id = ".$donnees['qcm-id'].";";
        try {$bdd->exec($commandeSql);}
        catch (PDOException $e) {echo "Erreur : " . $e->getMessage();die("");}
    }
    header('Location: all-qcm.php');
}


//CHANGE THE TITLE
$buffer=ob_get_contents();
ob_end_clean();
$buffer=str_replace("%TITLE%","FormU - QCM",$buffer);
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
                <a href="all-qcm.php" class="tjJOER active">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/qcm.svg' ?>
                        <?php include '../assets/icons/qcm-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">QCM</div>
                </a>
                <div class="QN8etP"></div>
                <a href="forum.php" class="tjJOER">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/forum.svg' ?>
                        <?php include '../assets/icons/forum-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">Forum</div>
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
                <a href="all-qcm.php" class="tjJOER active">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/qcm.svg' ?>
                        <?php include '../assets/icons/qcm-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">QCM</div>
                </a>
                <div class="QN8etP"></div>
                <a href="forum.php" class="tjJOER">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/forum.svg' ?>
                        <?php include '../assets/icons/forum-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">Forum</div>
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
                <a href="all-qcm.php" class="tjJOER active">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/qcm.svg' ?>
                        <?php include '../assets/icons/qcm-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">QCM</div>
                </a>
                <div class="QN8etP"></div>
                <a href="forum.php" class="tjJOER">
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
        <div class="cn72NH">
            <input class="rBWjB Ebw8nm" type="checkbox">
            <a href="#" class="TZhsuV">
                <?php if($utilisateur['role'] == 'etudiant') { ?>
                    <div class="pnq3xm student"></div>
                <?php } else if ($utilisateur['role'] == 'professeur') {?>
                    <div class="pnq3xm teacher"></div>
                <?php } else if ($utilisateur['role'] == 'administrateur') { ?>
                    <div class="pnq3xm admin"></div>
                <?php } ?>
                <span class="LX3sX"><?php echo "${utilisateur['prenom']} ${utilisateur['nom']}" ?></span>
            </a>
            <a href="LOGOUT" class="xjkF40">Se déconnecter</a>
        </div>
        <div>
            <div class="omEbdP">
                <div class="jDl5bi">
                    <span>QCM</span>
                </div>
                <?php if ($utilisateur['role'] == 'professeur' || $utilisateur['role'] == 'administrateur') {?>
                    <a href="qcm-admin.php" class="wqnhLL">Ajouter</a>
                <?php } ?>
            </div>
            <?php if (isset($qcms) && count($qcms) > 0) { ?>
                <div class="BgoyPk">
                    <?php foreach ($qcms as $qcm) {?>
                        <div class="Uewlyw BQde2h">
                            <a href="../data/QCM/<?php echo $qcm['id'] ?>.xml" class="wHplms bcgHpv">
                                <div class="DuLL0">
                                    <span><?php echo $qcm['qcmName'] ?></span>
                                </div>
                                <div class="QGgCil">
                                    <span><?php echo "${qcm['prenom']} ${qcm['nom']}" ?></span>
                                </div>
                            </a>
                            <div class="pcSHCU">
                                <?php if(($utilisateur['role'] == 'professeur' && $utilisateur['id'] == $qcm['professeur']) || $utilisateur['role'] == 'administrateur') { ?>
                                    <form class="mPdJGF" action="" method="POST">
                                        <input type="hidden" name="qcm-id" value="<?php echo $qcm['id'] ?>">
                                        <input type="hidden" name="delete-qcm" value="1">
                                        <button class="jLdPxR"><?php include "../assets/icons/trash.svg" ?></button>
                                    </form>
                                <?php } else if ($utilisateur['role'] == 'etudiant') { ?>
                                    <?php if(isset($userCourses) && !in_array($qcm['id'], $userCourses)) { ?>
                                        <form class="bRNJTz" action="" method="POST">
                                            <input type="hidden" name="course-id" value="<?php echo $qcm['id'] ?>">
                                            <button class="XgFJnB" type="submit">Ajouter</button>
                                        </form>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="NDc9O3">
                    <div class="gtBdGf">
                        &#128557;
                    </div>
                    <div class="jzj6in">
                        <p>Aucun QCM n'a été trouvé.</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
</div>
<script type="application/javascript" src="../assets/js/colormode.js"></script>
