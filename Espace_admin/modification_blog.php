<?php session_start();

require "../connexion_bdd.php";

if (isset($_GET['id']))
{
	$id = $_GET['id'];
}

$req3 = $bdd->prepare('SELECT titre, contenu FROM billets WHERE id = :id ');
$req3->execute(array('id' => $id ));

$donnees = $req3->fetch();

?>
<!DOCTYPE html>
<html>
<head>
	<title> Page billet blog </title>
</head>

<body>

<h1 align="center"> <?php echo "Bonjour " . $_SESSION['pseudo']; ?></h1>

<div align ="center">

	<h3> Modifications des billets </h3>
		
	<form action="modification_blog_post.php" method="POST">
				
		<table>

			<tr>	
				<td><input style="display: none;" type="text" name="id" value=" <?php echo  $id ?>"></td>
			</tr>	

			<tr>	
				<td align="right"><label>Titre :</label></td>	
				<td><input type="text" name="titre" value=" <?php echo  $donnees['titre'] ?>"></td>
			</tr>	

			<tr>	
				<td align="right"><label>Contenu :</label></td>	
				<td><input type="text" name="contenu" value="<?php echo  $donnees['contenu'] ?>"></td>
			</tr>	

			<tr>	
				<td align="right"><input type="submit" name="edit"></td>
			</tr>			
		</table>								
	</form>	 
</div>		
</body>
</html>