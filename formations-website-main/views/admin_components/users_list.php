<?php

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (!isset($_COOKIE["user"])) {
        header("Location: login.php");
    }

    //ALL USERS
    $commandeSql = "SELECT * FROM utilisateur";
    try {
        $reponse = $bdd->query($commandeSql);
    } catch (PDOException $e) {
        echo "Erreur : ".$e->getMessage();
        die("");
    }
    $users = $reponse->fetchAll();


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
    <div class="X8TW2F">
        <div class="PaiAg">
            <div class="jDl5bi">
                <span>Tous les Utilisateurs</span>
            </div>
            <button class="oJ2F7u">Ajouter</button>
        </div>
        <form action="" method="POST" class="Ro0m d-none">
            <input type="hidden" name="add-user" value="1">
            <div class="qocFB">
                <label>
                    <div>Nom</div>
                    <input type="text" name="name" value="" required>
                </label>
                <label>
                    <div>Prénom</div>
                    <input  type="text" name="firstname" value="" required>
                </label>
                <label>
                    <div>Mot de passe</div>
                    <input type="password" name="password" value="" required>
                </label>
                <label>
                    <div>E-mail</div>
                    <input type="text" name="email" value="" required>
                </label>
                <label>
                    <div>
                        Role
                    </div>
                    <select name="role">
                        <option value="etudiant">Étudiant</option>
                        <option value="professeur">Professeur</option>
                        <option value="administrateur">Administrateur</option>
                    </select>
                </label>
            </div>
            <div class="pcSHCU">
                <button type="submit" class="F1m6jB"><?php include "../assets/icons/congratulation-thin-icon.svg" ?></button>
                <button type="reset" class="jmLISb"><?php include "../assets/icons/cancel.svg" ?></button>
            </div>
        </form>
    </div>
    <?php if (isset($users) && count($users) > 0) { ?>
        <div class="BgoyPk">
            <?php foreach ($users as $user) {?>
                <div class="VRodxi Uewlyw BQde2h dQewHL">
                    <form action="" method="POST" class="HGyDl0">
                        <input type="hidden" name="edit-user" value="1">
                        <input type="hidden" name="user-id" value="<?php echo $user['id'] ?>">
                        <div class="qocFB">
                            <label>
                                <div>Nom</div>
                                <input type="text" name="name" value="<?php echo $user['nom'] ?>" disabled required>
                            </label>
                            <label>
                                <div>Prénom</div>
                                <input  type="text" name="firstname" value="<?php echo $user['prenom'] ?>" disabled required>
                            </label>
                            <label>
                                <div>Mot de passe</div>
                                <input type="password" name="password" value="<?php echo $user['mdp'] ?>" disabled required>
                            </label>
                            <label>
                                <div>E-mail</div>
                                <input type="text" name="email" value="<?php echo $user['email'] ?>" disabled required>
                            </label>
                            <label>
                                <div>
                                    Role
                                </div>
                                <select name="role" disabled>
                                    <option value="etudiant" <?php if($user['role'] == 'etudiant') {echo "selected"; } ?>>Étudiant</option>
                                    <option value="professeur" <?php if($user['role'] == 'professeur') {echo "selected"; } ?>>Professeur</option>
                                    <option value="administrateur" <?php if($user['role'] == 'administrateur') {echo "selected"; } ?>>Administrateur</option>
                                </select>
                            </label>
                        </div>
                        <?php if($utilisateur['id'] == $user['id']) { ?>
                            <div class="ncXuBX">Vous</div>
                        <?php } ?>
                        <?php if($user['id'] != $utilisateur['id']) { ?>
                        <div class="pcSHCU">
                            <button role="button" class="Q0zWnX"><?php include "../assets/icons/edit.svg" ?></button>
                            <button type="submit" class="F1m6jB UPd2p4"><?php include "../assets/icons/congratulation-thin-icon.svg" ?></button>
                            <button type="reset" class="jmLISb UPd2p4"><?php include "../assets/icons/cancel.svg" ?></button>
                        </div>
                        <?php } ?>
                    </form>
                    <?php if($utilisateur['role'] == 'administrateur' && $user['id'] != $utilisateur['id']) { ?>
                        <form class="mPdJGF" action="" method="POST">
                            <input type="hidden" name="delete-user" value="1">
                            <input type="hidden" name="user-id" value="<?php echo $user['id'] ?>">
                            <button class="jLdPxR"><?php include "../assets/icons/trash.svg" ?></button>
                        </form>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="NDc9O3">
            <div class="gtBdGf">
                &#128561;
            </div>
            <div class="jzj6in">
                <p>Comment est-ce possible, il est censé y avoir des utilisateur ?</p>
            </div>
        </div>
    <?php } ?>
</div>
<script type="application/javascript" src="../assets/js/user-list.js"></script>
