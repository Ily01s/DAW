<?php
global $bdd;
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $commandeSql = "SELECT c.*, c.nom AS courseName, uc.*, u.*
    FROM user_courses AS uc
    INNER JOIN cour AS c
        ON c.id = uc.idCour
    INNER JOIN utilisateur AS u 
        ON c.professeur = u.id
    WHERE uc.idUser = ${utilisateur['id']}
    LIMIT 4";



    try {
        $reponse = $bdd->query($commandeSql);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        die("");
    }
    $userCourses = $reponse->fetchAll();

    $commandeSql = "SELECT c.id, c.nom as courseName, u.nom, u.prenom
        FROM cour AS c
        INNER JOIN utilisateur AS u
            ON u.id = c.professeur
        WHERE c.id NOT IN (SELECT idCour
                          FROM user_courses
                          WHERE idUser = 1)
        ORDER BY c.Dtime
        LIMIT 12";

    try {
        $reponse = $bdd->query($commandeSql);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        die("");
    }
    $suggestedCourses = $reponse->fetchAll();
}
?>
<div class="cn72NH">
    <input class="rBWjB Ebw8nm" type="checkbox">
    <a href="#" class="TZhsuV">
        <?php if ($utilisateur['role'] == 'etudiant') { ?>
            <div class="pnq3xm student"></div>
        <?php } else if ($utilisateur['role'] == 'professeur') { ?>
            <div class="pnq3xm teacher"></div>
        <?php } else if ($utilisateur['role'] == 'administrateur') { ?>
            <div class="pnq3xm admin"></div>
        <?php } ?>
        <span class="LX3sX"><?php echo "${utilisateur['prenom']} ${utilisateur['nom']}" ?></span>
    </a>
    <a href="LOGOUT" class="xjkF40">Se déconnecter</a>
</div>
<div class="G6UVuY">
    <div class="yvqbR5">
        <div class="omEbdP">
            <div class="jDl5bi">
                <span>Vos Cours</span>
            </div>
            <a href="courses.php" class="wqnhLL">Voir Tout</a>
        </div>
        <?php if (isset($userCourses) and count($userCourses) > 0) { ?>
            <div class="hmtDtn">
                <?php foreach ($userCourses as $cour) { ?>
                    <a href="../data/COURS/<?php echo $cour['uid'] ?>/cours-admin-user.php" class="Uewlyw JuxKHN">
                        <img class="vpPmFM"
                             src="https://plubel-prod.u-bourgogne.fr/theme/image.php/maker/theme/1651798954/noimg">
                        <div class="wHplms">
                            <div class="DuLL0">
                                <span><?php echo $cour['courseName'] ?></span>
                            </div>
                            <div class="QGgCil">
                                <div>
                                    <?php if ($cour['role'] == 'etudiant') { ?>
                                        <div class="pnq3xm student"></div>
                                    <?php } else if ($cour['role'] == 'professeur') { ?>
                                        <div class="pnq3xm teacher"></div>
                                    <?php } else if ($cour['role'] == 'administrateur') { ?>
                                        <div class="pnq3xm admin"></div>
                                    <?php } ?>
                                </div>
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
                    <p>Vous n'avez aucun cours, c'est triste...</p>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="KtFzZg">
        <div class="A3G6MV">
            <div class="wtcRw6">
                <span>Suggestion de cours</span>
            </div>
            <div class="VR8qO0">
                <?php if (isset($suggestedCourses) && count($suggestedCourses) > 0) { ?>
                    <?php foreach ($suggestedCourses as $suggestedCourse) { ?>
                        <div class="TPmu3G">
                            <div class="oPg5ZK">
                                <div class="bTMICo">
                                    <span><?php echo $suggestedCourse['courseName'] ?></span>
                                </div>
                                <div class="g48DYL">
                                    <span><?php echo "${suggestedCourse['prenom']} ${suggestedCourse['nom']}" ?></span>
                                </div>
                            </div>
                            <form class="bRNJTz" action="" method="POST">
                                <input type="hidden" name="add-course">
                                <input type="hidden" name="course-id" value="<?php echo $suggestedCourse['id'] ?>">
                                <button class="XgFJnB" type="submit">Ajouter</button>
                            </form>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="X8Sg1">
                        <span class="L5ulbG">Aucun cours à ajouter à votre liste</span>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
