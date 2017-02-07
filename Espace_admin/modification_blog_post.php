<?php

require "../connexion_bdd.php";

// je verifier que tous les champs soient remplis puis je mets les POST dans des variables
	
if (isset($_POST['id']) AND isset($_POST['titre']) AND isset($_POST['contenu'])) 
{
	$id = htmlspecialchars($_POST['id']);
	$titre = htmlspecialchars($_POST['titre']);
	$contenu = htmlspecialchars($_POST['contenu']);
}


	
// Lorsque je valide si les champs commentaires sont remplis ma requete modifie le commentaire

if(isset($_POST['edit']))
{
	if (!empty($titre) AND !empty($contenu))
	{
	// Avec une requete préparéé je mets à jour la bdd avec les champs du formulaire

	$requetedit = $bdd->prepare('UPDATE `billets` SET `titre` =:titre, `contenu`=:contenu WHERE id = :id');
		

	$requetedit->bindParam(':titre', $titre, PDO::PARAM_STR);
	$requetedit->bindParam(':contenu', $contenu, PDO::PARAM_STR);
	$requetedit->bindParam(':id', $id, PDO::PARAM_INT);

	$requetedit->execute();
	}
}
	header('Location: affichage_blog.php');	
?>