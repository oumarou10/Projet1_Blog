<?php
session_start();

require "../Modele/connexion.php";

if(isset($_POST['id_com']))
	{
		$id = $_POST['id_com'];
	}

//On va vérifier :
//Si le jeton est présent dans la session et dans le formulaire
if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token']))
{
	//Si le jeton de la session correspond à celui du formulaire
	if($_SESSION['token'] == $_POST['token'])
	{
		//On stocke le timestamp qu'il était il y a 15 minutes
		$timestamp_ancien = time() - (15*60);
		//Si le jeton n'est pas expiré
		if($_SESSION['token_time'] >= $timestamp_ancien)
		{
			$req_suppression = $bdd->prepare('DELETE FROM commentaires where id =:id');
			$req_suppression->bindParam(':id', $id, PDO::PARAM_INT);
			$req_suppression->execute();
		}
	}
}

header('Location: affichage_blog.php');
?>