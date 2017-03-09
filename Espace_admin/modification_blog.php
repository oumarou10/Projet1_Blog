<?php session_start();

require "../Modele/connexion.php";

if (isset($_GET['id']))
{
	$id = $_GET['id'];
}

$req3 = $bdd->prepare('SELECT titre, contenu FROM billets WHERE id = :id ');
$req3->execute(array('id' => $id ));

$donnees = $req3->fetch();

require '../Vue/modicationblog.php';
