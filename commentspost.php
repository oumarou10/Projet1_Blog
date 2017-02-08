<?php

require "connexion_bdd.php";

$auteur = htmlspecialchars($_POST['auteur']);
$commentaire = htmlspecialchars($_POST['commentaire']);
$id_billet = htmlspecialchars($_POST['billet']);

if(isset($_POST['envoyer']))
{
	if (!empty($_POST['commentaire']))
	{
		$requete = $bdd->prepare('INSERT into commentaires(id_billet, auteur, commentaire, date_commentaire) 
								  VALUES(:billet,:auteur,:commentaire,NOW())');

		$requete->bindParam(':billet', $id_billet, PDO::PARAM_STR);
		$requete->bindParam(':auteur', $auteur, PDO::PARAM_STR);
		$requete->bindParam(':commentaire', $commentaire, PDO::PARAM_STR);

		$requete->execute();
	}
}

header('Location: index_blog.php');
?>