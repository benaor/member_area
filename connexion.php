
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
        <p id="info">Bienvenue sur mon site,si vous n'êtes pas inscrit, <a href="index.php">inscrivez-vous.</a></p>

        <div id="form">
            <form method="POST" action="connection.php">
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