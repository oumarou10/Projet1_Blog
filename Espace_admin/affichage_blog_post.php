<?php
session_start();

require "../Modele/connexion.php";

$titre = htmlspecialchars($_POST['titre']);
$auteur = htmlspecialchars($_POST['auteur']);
$contenu = htmlspecialchars($_POST['contenu']);

if(isset($_POST['envoyer']))
{
	if (!empty($titre) AND !empty($auteur) AND !empty($contenu))
	{
		$requete = $bdd->prepare('INSERT into billets(titre, auteur, contenu, date_creation) 
								  VALUES(:titre,:auteur,:contenu,NOW())');

		$requete->bindParam(':titre', $titre, PDO::PARAM_STR);
		$requete->bindParam(':auteur', $auteur, PDO::PARAM_STR);
		$requete->bindParam(':contenu', $contenu, PDO::PARAM_STR);

		$requete->execute();
	}
}		

 

header('Location: affichage_blog.php');
?>