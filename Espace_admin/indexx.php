<?php
session_start();

require "../Modele/connexion.php";
$pass_hache = htmlspecialchars(sha1($_POST['pass']));
$pseudo = htmlspecialchars($_POST['pseudo']);

if (isset($_POST['valider'])) 
{
	// Vérification des identifiants
	$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND pass = :pass');
	$req->execute(array(
	    'pseudo' => $pseudo,
	    'pass' => $pass_hache));

	$resultat = $req->fetch();

	if (!$resultat)
	{
	    echo 'Mauvais identifiant ou mot de passe !';
	}
	
	else
	{
	    $_SESSION['id'] = $resultat['id'];
	    $_SESSION['pseudo'] = $pseudo;
	    
	    header('location:affichage_blog.php');
	}
}