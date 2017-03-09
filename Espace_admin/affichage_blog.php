<?php session_start();
$token = uniqid(rand(), true);
$_SESSION['token'] = $token;
$_SESSION['token_time'] = time();

require "../Modele/connexion.php";

$req = $bdd->query('SELECT id, auteur, commentaire FROM commentaires');

$comments = $req->fetchAll();

$req->closeCursor();

// requete recuperer la liste des billets

$req2 = $bdd->query('SELECT id, titre, auteur, contenu, date_format(date_creation, \'%d/%m/%Y à %Hh:%imin:%ss\') AS date_modif from billets ORDER BY date_creation DESC LIMIT 0,5');

$billets = $req2->fetchAll();

$req2->closeCursor();

require '../Vue/affichageblog.php';

?>