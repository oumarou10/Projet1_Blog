<?php

/* **************************************************  CONNEXION A LA BASE DE DONNEES ******************************************* */

require "connexion_bdd.php";
					
/* **************************************************  PAGINATION ***************************************** */	

$nbParPage = 5; // on met dans une variable le nombre de msg qu'on veut par page
					
$req3 = $bdd->query('SELECT COUNT(id) as nbBillets from billets'); // on récupère toutes les entrées dans une variable

$nbTotalMsg = $req3->fetch(); 

$noTotal = $nbTotalMsg['nbBillets'];

$numPage = 1; // variable contenu le numero de la page courante

// on determine le nombre de messages par page

$nbBillets = 3 ;//$nbTotalMsg/$nbParPage;
					
if(isset($_GET['p']) && 0 < $_GET['p'] && $_GET['p'] <= $nbBillets)
{
	$numPage = $_GET['p'];
}

else
{
	$numPage = 1;
}

$req = $bdd->query('SELECT id, titre, auteur, contenu, date_format(date_creation, \'%d/%m/%Y à %Hh:%imin:%ss\') AS date_modif FROM billets ORDER BY date_creation DESC LIMIT '.($numPage-1)*$nbParPage .', '.$nbParPage.'');

/* **************************************************  REQUETE recupérant les informations ***************************************** */	

$donnees = $req->fetchAll();

$req->closeCursor();

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title> Blog </title>
</head>

<body>

	<h1>Mon super blog</h1>

	<p> <a href="Espace_admin/Login/connexion.php"> Lien vers page admin </a> </p>

	<p>Derniers billets du blog :</p>

	<?php

	foreach ($donnees as $donnees) {
	?>		
		<div>
			<h3><?php echo htmlspecialchars($donnees['auteur']) .' '. htmlspecialchars($donnees['titre']) . ' Le ' . $donnees['date_modif']; ?></h3>
		</div>	
					
		<div>
			<p> <?php echo $donnees['contenu']; ?> </p>
			<p> <a href="comments.php?id=<?php echo $donnees['id']; ?>"> Commentaires du billet </a> </p>
			<hr />
		</div>

	<?php	
	}
		for ($i=1; $i < $nbBillets ; $i++) 
		{ 
			echo "<a href=\"index_blog.php?p=$i\">$i/</a> ";
		}
	?>	

</body>
</html>