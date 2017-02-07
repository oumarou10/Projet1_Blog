<?php session_start();

require "../../connexion_bdd.php";

?>	

<!DOCTYPE html>
<html>

<head>
	<title> Page connexion </title>
</head>

<body>

	<div align="right">

		<p><a href="inscription.php"> S'inscrire </a></p>	

	</div>

	<div align ="center">

		<h2> Connexion admin </h2>

		<form action="../indexx.php" method="POST">

			<table>

				<tr>
					<td><label for="pseudo"> Pseudo : </label></td>	
					<td><input type="text" name="pseudo"> <br></td>
				</tr>
						
				<tr>	
					<td><label for="password"> Mot de passe : </label></td>
					<td><input type="password" name="pass"><br></td>
				</tr>
						
				<tr>	
					<td><input type="submit" name="valider"></td>
				</tr>	
			</table>	
		</form>
	</div>
</body>
</html>	