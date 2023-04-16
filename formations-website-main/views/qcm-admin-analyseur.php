<?php
    include_once 'top-html.php';
    include_once '../controllers/connexionBDD.php';
    global $bdd;
    
    $qcmID = $_GET["qcmID"];
    $userID = $_GET["idUtilisateur"];

    $xml = new SimpleXMLElement('<qcm/>');
    $xml->addAttribute('version', '1.1');

    $xml->addChild('intitule', $_GET['intitule']);


    $currentQuest = NULL;
    $currentRep = NULL;

    while($element = current($_GET)) {

        switch (key($_GET)[0]) {
            case 'q':
                $currentQuest = $xml->addChild('question');
                $currentQuest->addChild('ennonce', $element);
                break;
            case 'r':
                $currentRep = $currentQuest->addChild('reponse', $element);
                break;
            case 'j':
                $currentRep->addAttribute('reponse', 'juste');
                break;    
            case 'f':
                $currentRep->addAttribute('reponse', 'fausse');
                break;    
            default:
                break;
        }

        next($_GET);
    }


    try {
        $commandeSQL = "INSERT INTO qcm VALUES (${qcmID}, ${userID}, '${_GET['intitule']}')";

        $bdd->query($commandeSQL);
        echo "sucsses";
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->saveXML();
        $dom->save('../data/QCM/'.$qcmID.'.xml');
        header('Location: all-qcm.php');
        
    } catch (PDOException $e) {
        echo "Error message : ". $e->getMessage() ;
    };
   

?>