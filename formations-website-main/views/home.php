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

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    //TODO - redirect unconnected user to login

    //CHANGE WINDOW TITLE WITH USER' ROLE
    $buffer = ob_get_contents();
    ob_end_clean();
    switch ($utilisateur['role']) {
        case 'etudiant':
            $buffer = str_replace("%TITLE%", "FormU - Dashboard", $buffer);
            break;
        case 'professeur':
            $buffer = str_replace("%TITLE%", "FormU - Vos Cours", $buffer);
            break;
        case 'administrateur':
            $buffer = str_replace("%TITLE%", "FormU - Tous les utilisateurs", $buffer);
            break;
    }
    echo $buffer;

} else if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['add-course'])) { //ADD USER COURSE TO USER'S LIST
        $donnees['course-id'] = $_POST['course-id'];

        $commandeSql = "INSERT INTO user_courses
    VALUES (default, ".$utilisateur['id'].", ".$donnees['course-id'].");";
        var_dump($commandeSql);

        try {
            $bdd->exec($commandeSql);
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
            die("");
        }
    } else if (isset($_POST['add-user'])) {
        $donnees["firstname"] = addslashes(htmlspecialchars($_POST["firstname"]));
        $donnees["name"] = addslashes(htmlspecialchars($_POST["name"]));
        $donnees["email"] = addslashes(htmlspecialchars($_POST["email"]));
        $donnees["password"] = md5(addslashes(htmlspecialchars($_POST["password"])));
        $donnees["role"] = addslashes(htmlspecialchars($_POST["role"]));

        $commandeSql = "INSERT INTO utilisateur (prenom,nom,email,mdp,date,role,token) VALUES('" . $donnees["firstname"] . "','" . $donnees["name"] . "','" . $donnees["email"] . "','" . $donnees["password"] . "','" . date("Y-m-d H:i:s") . "','" . $donnees["role"] . "','')";
        try {
            $bdd->exec($commandeSql);
        } catch (PDOException $e) {
            echo "Erreur : " + $e->getMessage();
            die("");
        }
    } else if(isset($_POST['edit-user'])) { //EDIT USER
        $donnees['id'] = addslashes(htmlspecialchars($_POST['user-id']));
        $donnees['name'] = addslashes(htmlspecialchars($_POST['name']));
        $donnees['firstname'] = addslashes(htmlspecialchars($_POST['firstname']));
        $donnees['password'] = md5(addslashes(htmlspecialchars($_POST['password'])));
        $donnees['email'] = addslashes(htmlspecialchars($_POST['email']));
        $donnees['role'] = addslashes(htmlspecialchars($_POST['role']));

        $commandeSql = "UPDATE utilisateur
        SET nom = '${donnees['name']}',
            prenom = '${donnees['firstname']}',
            mdp = '${donnees['password']}',
            email = '${donnees['email']}',
            role = '${donnees['role']}'
        WHERE id = ${donnees['id']};";

        try {
            $bdd->exec($commandeSql);
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
            die("");
        }
    } else if(isset($_POST['delete-user'])) {
        $donnees['id'] = addslashes(htmlspecialchars($_POST['user-id']));
        $commandeSql = "DELETE FROM user_courses WHERE idUser = ".$donnees['id'].";";
        try {$bdd->exec($commandeSql);}
        catch (PDOException $e) {echo "Erreur : " . $e->getMessage();die("");}

        $commandeSql = "DELETE FROM utilisateur WHERE id = ".$donnees['id'].";";
        try {$bdd->exec($commandeSql);}
        catch (PDOException $e) {echo "Erreur : " . $e->getMessage();die("");}

        try {
            $bdd->exec($commandeSql);
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
            die("");
        }
    }

    header('Location: home.php');
}
?>

<link rel="stylesheet" href="../assets/css/views/home.css">
<div class="TEeK6y">
    <aside class="Z9A69u">
        <a href="" class="RkKfUb">
            <?php include_once '../assets/icons/formu-logo.svg' ?>
        </a>
        <?php if ($utilisateur['role'] == 'etudiant') {?>
        <div class="VwBabc">
            <a href="home.php" class="tjJOER active">
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
        <?php if ($utilisateur['role'] == 'etudiant') { ?>
            <?php include_once "student_components/dashboard.php" ?>
        <?php } else if ($utilisateur['role'] == 'professeur') { ?>
            <?php include_once "teacher_components/teacher_courses.php" ?>
        <?php } else if ($utilisateur['role'] == 'administrateur') { ?>
            <?php include_once "admin_components/users_list.php" ?>
        <?php } ?>
    </main>
</div>
<script type="application/javascript" src="../assets/js/colormode.js"></script>
