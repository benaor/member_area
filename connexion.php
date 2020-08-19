<?php
session_start();

// if already connect 
if(isset($_SESSION['connect'])){
	header('location: index.php');
	exit();
}

//Connexion database
require('src/connexionBDD.php');

    // If users try to login 
    if( !empty( $_POST['email'] ) && !empty( $_POST['password'] ) ){

        // Create variable
        $email      = $_POST['email'];
        $password   = $_POST['password'];

        //Crypt the password
        $password   = "25".sha1($password."5811")."44";

        $req = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $req->execute(array($email));

        while($user = $req->fetch() ){

            // if the password is correct 
            if($user['password'] == $password){

                $_SESSION['connect']   = 1;
                $_SESSION['pseudo']    = $user['pseudo'];
                header('location: ?success=1');

            } else {  // If password is incorrect 
            
                header('location: ?error=1');

            }
        }

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
        <h1>Connexion</h1>
    </header>

    <div class="container">
        <p id="info">Bienvenue sur mon site,si vous n'êtes pas inscrit, <a href="registration.php">inscrivez-vous.</a></p>
	 	
		<?php
			if(isset($_GET['error'])){
				echo'<p id="error">Nous ne pouvons pas vous authentifier.</p>';
			}
			else if(isset($_GET['success'])){
				echo'<p id="success">Vous êtes maintenant connecté.</p>';
			}
        ?>
        
        <div id="form">
            <form method="POST" action="connexion.php">
                <table>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" placeholder="Ex : example@google.com" required></td>
                    </tr>
                    <tr>
                        <td>Mot de passe</td>
                        <td><input type="password" name="password" placeholder="Ex : ********" required></td>
                    </tr>
                </table>
                <p><label><input type="checkbox" name="connect" checked>Connexion automatique</label></p>
                <div id="button">
                    <button type='submit'>Connexion</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>