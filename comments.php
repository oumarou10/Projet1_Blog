<?php

require "connexion_bdd.php";

$req = $bdd->prepare('SELECT auteur, commentaire, date_format(date_commentaire, \'%d/%m/%Y à %Hh:%imin:%ss\') AS date_modif FROM commentaires WHERE id_billet = :id ORDER BY date_commentaire');	
$req->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$req->execute();

$donnees = $req->fetchAll();
$req->closeCursor();

?>		

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title> Commentaires </title>
</head>
<body>	

<?php  

foreach ($donnees as $donnees)
	{
?>
		<p> Auteur : <?php echo htmlspecialchars($donnees['auteur']); ?> </p>
		<p> Commentaires : <?php echo nl2br(htmlspecialchars($donnees['commentaire'])) . ' le ' . $donnees['date_modif'];?> </p>
		<?
	}
?>						

<form action="commentspost.php" method="POST">

	<input style="display: none;" type="text" name="billet" value="<?php if(isset($_GET['id'])) { echo $_GET['id'];} ?>">

	<label> Pseudo </label> <input type="text" name="auteur">
	<label> Email </label> <input type="email" name="email">
	<label> Commentaire* </label> <input type="text" name="commentaire">
	<input type="submit" name="envoyer">
			
</form>

	<p><a href="index_blog.php"> Retourner aux billets </a></p>

</body>
</html>