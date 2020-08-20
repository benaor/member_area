<?php

    if( isset( $_COOKIE['log'] ) && !isset( $_SESSION['connect'] ) ){

        //variable secret
        $secret = htmlspecialchars($_COOKIE['log']);

        //Connexion BDD
        require('src/connexionBDD.php');

        $req = $bdd->prepare('SELECT count(*) AS numberAccount FROM users WHERE key_secret = ?');
        $req->execute(array($secret));

        while($user = $req->fetch()){

            if($user['numberAccount'] == 1){
                
                $reqUser = $bdd->prepare('SELECT * FROM users WHERE key_secret = ?');
                $reqUser->execute(array($secret));
            
                while($userAccount = $reqUser->fetch()){
        
                    $_SESSION['connect'] = 1;
                    $_SESSION['pseudo']  = $userAccount['pseudo'];

                }
            }
            
        }

    }