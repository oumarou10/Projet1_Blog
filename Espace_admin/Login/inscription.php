<?php
session_start();
$token = uniqid(rand(), true);
$_SESSION['token'] = $token;
$_SESSION['token_time'] = time();

require "../../Modele/connexion.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title> Page admin</title>
</head>

<body>

	<div align="right">
		<p><a href="connexion.php"> Déjà inscrit ? C'est içi ! </a></p>
	</div>

	<div align ="center">

		<h2> Inscription d'admin </h2>

			<form action="inscription_post.php" method="POST">
				<table>

					<tr>
						<td><label for="pseudo"> Pseudo :</label></td>
						<td><input type="text" name="pseudo"> <br></td>
					</tr>	

					<tr>
						<td><label for="email"> Email :</label></td>
						<td><input type="text" name="email"><br></td>
					</tr>
							
					<tr>	
						<td><label for="password"> Mot de passe :</label></td>
						<td><input type="password" name="pass"><br></td>
					</tr>

					<tr>
						<td><label for="pass_confirmation"> Confirmation :</label></td>
						<td><input type="password" name="pass_confirmation"></td>
					</tr>
								
					<tr>	
						<input type="hidden" name="token" id="token" value="<?php echo $token; ?>"/>
						<td><input type="submit" name="valider"></td>
					</tr>	

				</table>
			</form>
	</div>
</body>
</html>