<?php
/*
// Récupérer les valeurs des champs du formulaire
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$num_etudiant = $_POST["num_etudiant"];
$date_naissance = $_POST["date_naissance"];
$mail = $_POST["mail"];
$mot_de_passe = $_POST["mot_de_passe"];

// Connectez-vous à la base de données
$servername = "localhost";
$username = "nom_utilisateur";
$password = "mot_de_passe";
$dbname = "nom_de_la_base_de_données";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifiez la connexion à la base de données
if (!$conn) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}

// Exécuter la requête SQL pour insérer les données dans la base de données
$sql = "INSERT INTO utilisateurs (nom, prenom, num_etudiant, date_naissance, mail, mot_de_passe) 
        VALUES ('$nom', '$prenom', '$num_etudiant', '$date_naissance', '$mail', '$mot_de_passe')";

if (mysqli_query($conn, $sql)) {
    echo "Le compte a été créé avec succès!";
} else {
    echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
}

// Fermer la connexion à la base de données
mysqli_close($conn);
*/
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/CC.css">
    <title>Créer un compte</title>
  </head>
  <body>
  <div class="container">
        <div class="logo-container">
            <img src="../../assets/files/logo.png" alt="Logo du site" class="logo">
        </div>
        <div class= "creation-container">
        <h1>Créer un compte</h1>
        <form action="register.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="num_etudiant">Numéro étudiant:</label>
        <input type="text" id="num_etudiant" name="num_etudiant" required><br>

        <label for="date_naissance">Date de naissance:</label>
        <input type="date" id="date_naissance" name="date_naissance" required><br>

        <label for="mail">Mail:</label>
        <input type="email" id="mail" name="mail" required><br>

        <label for="mot_de_passe">Mot de passe:</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

        <button type="submit">créé votre compte</button>
    </div>
    </div>
    </form>
  </body>
</html>
