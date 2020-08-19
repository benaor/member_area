<?php
session_start();

// if already connect 
if(isset($_SESSION['connect'])){
	header('location: index.php');
	exit();
}

require('src/connexionBDD.php');


    // If user complete all input 
    if( !empty($_POST['pseudo']) && 
        !empty($_POST['email']) && 
        !empty($_POST['password']) && 
        !empty($_POST['password_confirm'])){

            $pseudo             = htmlspecialchars($_POST['pseudo']);
            $email              = htmlspecialchars($_POST['email']);
            $password           = htmlspecialchars($_POST['password']);
            $password_confirm   = htmlspecialchars($_POST['password_confirm']);
    
            // Compare password and password_confirm 
            if($password == $password_confirm){

                //Check if email already exist
                $req = $bdd->prepare('SELECT COUNT(*) AS numberEmail FROM users WHERE email = ?');
                $req->execute(array($email));

                while($email_verif = $req->fetch()){

                    // If email already exist 
                    if($email_verif['numberEmail'] != 0){
                        
                        header('location: ?error=1&email=1');
                        exit();

                    } //if email already exist
                }

            } else { //compare password

                header('location: ?error=1&pass=1');
                exit();

            } // compare password 

            //SECRET HASH AND CRYPT PASSWORD
            $secret     = sha1($email).time();
            $password   = "25".sha1($password."5811")."44";

            //INSERT USER IN BDD
            $req = $bdd->prepare('INSERT INTO users(pseudo, email, password, key_secret) VALUES(?,?,?,?)');
            $value = $req->execute(array($pseudo, $email, $password, $secret));

            //Registration is a success
            header('location: ?success=1');
            exit();


        } // empty 4 $_POST
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="design/style.css">
    <link rel="stylesheet" href="../design/style.css">
</head>
<body>
	<header>
		<h1>Inscription</h1>
	</header>

	<div class="container">

        <p id="info">Bienvenue sur mon site, pour en voir plus, inscrivez-vous. Sinon, <a href="connexion.php">Connectez-vous.</a></p>
        
        <?php

            // If user have an error 
            if(isset( $_GET['error'] ) ){

                // If error is "pass"
                if( isset($_GET['pass']) ){

                    echo '<p id="error"> Les deux mots de passe ne sont pas identique ! </p>';

                } 

                //If error is "email" 
                else if( isset($_GET['email']) ){
        
                    echo '<p id="error"> Cette adresse email est déjà utilisé </p>';

                } 

                
            }

            //If the account is create
            else if( isset($_GET['success'])){
                
                echo '<p id="success"> Votre compte a bien été créé ! </p>';

            }
        ?>

	 	<div id="form">
			<form method="POST" action="registration.php">
				<table>
					<tr>
						<td>Pseudo</td>
						<td><input type="text" name="pseudo" placeholder="Ex : Nicolas" required></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" placeholder="Ex : example@google.com" required></td>
					</tr>
					<tr>
						<td>Mot de passe</td>
						<td><input type="password" name="password" placeholder="Ex : ********" required ></td>
					</tr>
					<tr>
						<td>Retaper mot de passe</td>
						<td><input type="password" name="password_confirm" placeholder="Ex : ********" required></td>
					</tr>
				</table>
				<div id="button">
					<button type='submit'>Inscription</button>
				</div>
			</form>
		</div>


	</div>
</body>
</html>