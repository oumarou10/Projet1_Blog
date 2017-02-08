<?php
session_start();

require "../connexion_bdd.php";

if(isset($_POST['id_bill']))
	{
		$id = $_POST['id_bill'];
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
			$delete = $bdd->prepare('DELETE FROM billets WHERE id = :id');
			$delete->bindParam(':id', $id, PDO::PARAM_INT);
			$delete->execute();
		}
	}
}

header('Location: affichage_blog.php');
?>