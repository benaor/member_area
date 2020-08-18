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
		<h1>Inscription</h1>
	</header>

	<div class="container">

		<p id="info">Bienvenue sur mon site, pour en voir plus, inscrivez-vous. Sinon, <a href="connexion.php">Connectez-vous.</a></p>

	 	<div id="form">
			<form method="POST" action="index.php">
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