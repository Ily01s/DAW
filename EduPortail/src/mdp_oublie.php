<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["resetPassword"])) {
        $email = $_POST["email"];
        $commandeSql = "SELECT * FROM utilisateur WHERE email='" . $email . "'";
        try {
            $reponse = $bdd->query($commandeSql);
        } catch (PDOException $e) {
            echo "Erreur : " + $e->getMessage();
            die("");
        }
        $utilisateur = $reponse->fetch();
        if ($utilisateur) {
            $token = md5($utilisateur["mdp"] . time());
            $commandeSql = "UPDATE utilisateur SET token='" . $token . "' WHERE id=" . $utilisateur["id"];
            try {
                $bdd->exec($commandeSql);
            } catch (PDOException $e) {
                echo "Erreur : " + $e->getMessage();
                die("");
            }
            $to = $email;
            $subject = "Reset Password";
            $message = "Please click the following link to reset your password:\n\n";
            $message .= "http://example.com/reset_password.php?token=" . $token;
            $headers = "From: webmaster@example.com";
            mail($to, $subject, $message, $headers);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>EduP</title>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="../assets/files/logo.png" alt="Logo du site" class="logo">
        </div>
        <div class="mdp_oublie-container">
             <form action="" method="post">
             <h1>Forgot Password</h1>
             <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <button type="submit">Reset Password</button>
    </form>
</div>

    </div>
</body>
</html>