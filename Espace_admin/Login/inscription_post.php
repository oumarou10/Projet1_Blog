<?php
session_start();

require "../../Modele/connexion.php";


$pseudo = htmlspecialchars($_POST['pseudo']);
$pass_hache = htmlspecialchars(sha1($_POST['pass']));
$pass_2 = htmlspecialchars(sha1($_POST['pass_confirmation']));
$email = htmlspecialchars($_POST['email']);


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
			// On fait une condition sur le submit
			if ($_POST['valider']) 
			{
				// ON verifie dans un repmier temps que les champs ne sont 
				if (!empty($pseudo) and !empty($pass_hache) and !empty($email))
				{
					if ($pass_hache == $pass_2)
					{
						$requete = $bdd->prepare('INSERT into membres(pseudo,pass,email,date_inscription) 
								  VALUES(:pseudo,:pass,:email,CURDATE())');
						$requete->execute(array(
						'pseudo' => $pseudo,
						'pass' => $pass_hache,
						'email' => $email
						));
		
					}	
				}		
			}
			
		}
	}
}

header('location : inscription.php');
?>