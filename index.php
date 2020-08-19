<?php
session_start();

// if already connect 
if(!isset($_SESSION['connect'])){
	header('location: connexion.php');
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="design/style.css">
</head>

<body>
    <header>
        <h1>Acceuil</h1>
    </header>

    <div class="container">
        <p id="info">Bienvenue sur mon site, si vous êtes ici, c'est que vous êtes connecté <br>
        <strong> vous êtes <?= $_SESSION['pseudo'] ?> </strong> <br>
        <a href="deconnexion.php">deconnectez-vous.</a></p>
	 	
    </div>
</body>

</html>