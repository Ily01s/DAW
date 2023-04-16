<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    //ALL COURSES
    $commandeSql = "SELECT c.*, c.nom as courseName, u.nom, u.prenom
        FROM cour AS c
        INNER JOIN utilisateur AS u
            ON u.id = c.professeur
        WHERE professeur = ".$utilisateur['id']."
        ORDER BY c.nom";
    try {
        $reponse = $bdd->query($commandeSql);
    } catch (PDOException $e) {
        echo "Erreur : ".$e->getMessage();
        die("");
    }
    $courses = $reponse->fetchAll();
}


?>
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
        <a href="cours-admin.php" class="wqnhLL">Ajouter</a>
    </div>
    <?php if (isset($courses) && count($courses) > 0) { ?>
        <div class="BgoyPk">
            <?php foreach ($courses as $cour) {?>
                <div class="Uewlyw BQde2h">
                    <a href="../data/COURS/<?php echo $cour['uid'] ?>/cours-admin-user.php" class="wHplms bcgHpv">
                        <div class="DuLL0">
                            <span><?php echo $cour['courseName'] ?></span>
                        </div>
                        <div class="QGgCil">
                            <span><?php echo "${cour['prenom']} ${cour['nom']}" ?></span>
                        </div>
                    </a>
                    <div class="pcSHCU">
                        <?php if(($utilisateur['role'] == 'professeur' && $utilisateur['id'] == $cour['professeur']) || $utilisateur['role'] == 'administrateur') { ?>
                            <a href="../data/COURS/<?php echo $cour['uid'] ?>/cours-admin-prof.php" role="button" class="Q0zWnX"><?php include "../assets/icons/edit.svg" ?></a>
                            <form class="mPdJGF" action="" method="POST">
                                <input type="hidden" name="course-id" value="<?php echo $cour['id'] ?>">
                                <input type="hidden" name="delete-course" value="1">
                                <button class="jLdPxR"><?php include "../assets/icons/trash.svg" ?></button>
                            </form>
                        <?php } else if ($utilisateur['role'] == 'etudiant') { ?>
                            <?php if(isset($userCourses) && !in_array($cour['id'], $userCourses)) { ?>
                                <form class="bRNJTz" action="" method="POST">
                                    <input type="hidden" name="course-id" value="<?php echo $cour['id'] ?>">
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
                <p>Aucun cours n'a été trouvé.</p>
            </div>
        </div>
    <?php } ?>
</div>