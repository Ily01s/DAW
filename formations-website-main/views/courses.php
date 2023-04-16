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

    $commandeSql = "SELECT c.*, c.nom AS courseName, uc.*, u.*
    FROM user_courses AS uc
    INNER JOIN cour AS c
        ON c.id = uc.idCour
    INNER JOIN utilisateur AS u 
        ON c.professeur = u.id
    WHERE uc.idUser = ${utilisateur['id']};";
    try {
        $reponse = $bdd->query($commandeSql);
    } catch (PDOException $e) {
        echo "Erreur : ".$e->getMessage();
        die("");
    }
    $userCourses = $reponse->fetchAll();
}

//CHANGE THE TITLE
$buffer=ob_get_contents();
ob_end_clean();
$buffer=str_replace("%TITLE%","FormU - Cours",$buffer);
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
                <a href="courses.php" class="tjJOER active">
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
                <a href="home.php" class="tjJOER active">
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
                <a href="home.php" class="tjJOER active">
                    <div class="pHqVuN">
                        <?php include '../assets/icons/user.svg' ?>
                        <?php include '../assets/icons/user-unactive.svg' ?>
                    </div>
                    <div class="Mg9BgH">Utilisateurs</div>
                </a>
                <a href="courses.php" class="tjJOER">
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
                    <span>Vos Cours</span>
                </div>
            </div>
            <?php if (isset($userCourses) && count($userCourses) > 0) { ?>
                <div class="BgoyPk">
                    <?php foreach ($userCourses as $cour) {?>
                        <a href="../data/COURS/<?php echo $cour['uid'] ?>/cours-admin-user.php" class="Uewlyw BQde2h">
                            <div class="wHplms">
                                <div class="DuLL0">
                                    <span><?php echo $cour['courseName'] ?></span>
                                </div>
                                <div class="QGgCil">
                                    <div><?php echo "${cour['prenom']} ${cour['nom']}" ?></div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="NDc9O3">
                    <div class="gtBdGf">
                        &#128557;
                    </div>
                    <div class="jzj6in">
                        <p>Aucun cours n'a été trouvé.</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
</div>
<script type="application/javascript" src="../assets/js/colormode.js"></script>
