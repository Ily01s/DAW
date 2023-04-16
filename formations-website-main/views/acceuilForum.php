<?php
session_start();
include_once 'top-html.php';
include_once '../controllers/connexionBDD.php';
global $bdd;
if(!isset($_SESSION["sujet"])){
    $_SESSION['sujet'] = 0;
}

if($_SERVER['REQUEST_METHOD'] == "POST")
  {
	//echo ($_POST["ajoutField"]);
	if(!empty($_POST["ajoutField"])){
        $donnees["name"] = $_POST["ajoutField"];
        $commandeSql = "INSERT INTO sujet (nom) VALUES('" . $donnees["name"] . "')";
        try {
            $bdd->exec($commandeSql);
        } catch (PDOException $e) {
            echo "Erreur : " + $e->getMessage();
            die("");
        }
	}
}
$commandeSql = "SELECT * FROM sujet ";
    try {
		echo '<list>
				<header>
					Commande
				</header>
				<items>';
		foreach  ($bdd->query($commandeSql) as $row) {
			echo'<item data-name='.$row['id'].'>'.$row['nom'].'</item>';
		}
		echo'</items>
		</list>';
    } catch (PDOException $e) {
        echo "Erreur : " + $e->getMessage();
        die("");
    }
?>
<link rel="stylesheet" href="forum.css">
  <body>
  <div>
	<button type="button" class="newForum">nouveau sujet</button>
      <form class="cacher" action="" method="POST">
        <input type="text" name="ajoutField" value="" class="ajoutField">
        <button type="submit" name="ajout" class="ajout">Ajout</button>
      </form>
	</div>
	<script src="../jquery.js"></script>
    <script src="../tp2.js"></script>
	
  </body>
</html>
