<?php
include_once 'top-html.php';
include_once '../controllers/connexionBDD.php';
global $bdd;
session_start();


if(isset($_POST["btnChoix"]) and isset($_POST["choix"])){
    $_SESSION["qcm"] = $_POST["choix"];
    $_SESSION["numQuestion"] = 1;
    $_SESSION["reponses"] = [];
}
if(isset($_POST["btnContinue"])){
    $_SESSION["qcm"] = "";
}
if(!isset($_SESSION["qcm"])){
    $_SESSION["qcm"] = "Undefined.xml";
}
if(isset($_POST["btnNext"])){
    $question = $_SESSION["numQuestion"]-1;
    for($i= 0;$i<4;$i++){
        $_SESSION["reponses"][$question] = [];
        if(isset($_POST["reponse".$question."|".$i])){
            $_SESSION["reponses"][$question] = "OK";
            var_dump($_SESSION["reponses"][$question]);
            echo "OK !";
        }

    }
    echo "<br>";
    var_dump($_SESSION["reponses"]);

    // $_SESSION["reponses"][$_SESSION["numQuestion"] = $_POST[""]
    $_SESSION["numQuestion"]++;


}
if(isset($_POST["btnPrev"])){
    $_SESSION["numQuestion"]--;
}

// $_SESSION["qcm"] = "../assets/xml/qcmProfillage1.xml";
?>


<link rel="stylesheet" href="../assets/css/views/qcm.css">
<link rel="stylesheet" href="../assets/css/views/password-manager.css">
<body>
    <div class="d-flex main-content">
        <header class="d-flex main-header">
            <a href="" class="formu-logo-wrap">
                <i>
                    <?php include_once '../assets/icons/formu-logo.svg' ?>
                </i>
            </a>
        </header>
        <?php
        if (file_exists($_SESSION["qcm"])) {

            $qcm = simplexml_load_file($_SESSION["qcm"]);
            ?>
            <div class="d-flex password-form-wrap">
                <form class="qcm-form" action="" method="POST">
                <?php
                $intitule = $qcm->intitule;
                echo '<h1 class="form-title">'.$intitule.'</h1>';
                echo '<div>Nombre de questions : '.$qcm->nbQuestions.'</div>';

                $compteur = 0;
                foreach($qcm as $question){
                    if($question->ennonce && $_SESSION["numQuestion"] == $compteur){

                        $ennonceQuestion = $question->ennonce;
                        $reponsesQuestion = $question->reponse;

                        echo
                        '<div><br>'.$ennonceQuestion.'<br><br></div>';
                        for($i = 0;$i<4;$i++){
                            $validiteReponse = $question->reponse['reponse'];

                            echo
                            '<div class="form-item">
                               <div class="form-input-wrap checkBoxs">
                                    <input id="" type="checkbox" class="checkboxQCM" type="text" name="reponse'.($compteur-1).'|'.$i.'">'.($reponsesQuestion[$i]).'
                                </div>
                            </div>';
                        }

                    }
                    $compteur++;

                }


                ?>
                <div class="linebreak"></div>

                <?php
                    if($_SESSION["numQuestion"]>1 && $_SESSION["numQuestion"]<$compteur-1){
                        echo '<button type="submit" role="button" name="btnPrev"  class="btn btn-primary btn-full" id="btnPrev">Précédent</button>';
                    }
                    if($_SESSION["numQuestion"]<$compteur-1 && $_SESSION["numQuestion"]>0){
                        echo '<button type="submit" role="button" name="btnNext"  class="btn btn-primary btn-full" id="btnNext">Suivant</button>';
                    }
                    if($_SESSION["numQuestion"]>=$compteur-1){
                        echo '<button type="submit" role="button" name="btnNext"  class="btn btn-primary btn-full" id="btnFinish">Terminer</button>';
                    }
                    if($_SESSION["numQuestion"]>=$compteur){
                        echo '<button type="submit" role="button" name="btnContinue"  class="btn btn-primary btn-full" id="btnContinue">Faire un autre QCM</button>';
                    }
                    if($_SESSION["numQuestion"]==0){
                        echo '<button type="submit" role="button" name="btnNext"  class="btn btn-primary btn-full" id="btnNext">Commencer</button>';
                    }

                ?>

                </form>

            </div>
        <?php
        }else{
            ?>
            <div class="d-flex password-form-wrap">
                <form class="qcm-form" action="" method="POST">
                    <div class="form-title-wrap d-flex">
                        <h1>Choix du QCM de profillage</h1>
                    </div>

                    <?php

                    $commande_SQL = "SELECT * FROM qcm";
                    try {
                        $reponse = $bdd->query($commande_SQL);

                        $listeQCMs = $reponse->fetchAll();
                    } catch (PDOException $e) {
                        echo "Erreur : " + $e->getMessage();
                        die("");
                    }


                    $compteur = 0;
                    foreach($listeQCMs as $qcm){
                        $infosQCM = simplexml_load_file($qcm["fichier"]);
                        echo
                        '<div class="form-item">
                           <div class="form-input-wrap radios">
                                <input id="" type="radio" class="radiosQCM" type="text" value="'.$qcm["fichier"].'" name="choix">'.($infosQCM->intitule).'
                            </div>
                        </div>';
                        $compteur++;
                    }
                    ?>
                    <div class="linebreak"></div>
                    <button type="submit" role="button" name="btnChoix"  class="btn btn-primary btn-full" id="btnNext">Commencer</button>
                </form>
            </div>
            <?php
        }
        ?>
        <footer class="d-flex main-footer-wrap">
            <div class="footer-text-wrap">
                <div class="footer-text">FormU © <?php echo date("Y"); ?></div>
            </div>
        </footer>
    </div>
    <script type="application/javascript" src="../assets/js/qcm.js"></script>

</body>
